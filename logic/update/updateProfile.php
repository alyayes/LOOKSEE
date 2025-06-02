<?php
session_start();
require_once '../../koneksi.php'; // 1. Memuat koneksi database

// 2. Mengecek apakah pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: ../../pages/login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// 3. Mengambil data pengguna saat ini dari database (untuk perbandingan dan default)
$stmt_old_user = $koneksi->prepare("SELECT username, profile_picture, password FROM user WHERE user_id = ?");
$stmt_old_user->bind_param("i", $user_id);
$stmt_old_user->execute();
$result_old_user = $stmt_old_user->get_result();
$old_user_data = $result_old_user->fetch_assoc();
$stmt_old_user->close();

if (!$old_user_data) {
    $_SESSION['error'] = "Data pengguna tidak ditemukan.";
    header("Location: ../../pages/login.php");
    exit();
}
$current_db_username = $old_user_data['username'];
$stored_password_hash = $old_user_data['password'];
$current_profile_picture = $old_user_data['profile_picture'];

// 4. Mengambil data yang dikirim dari formulir
$username   = $_POST['username'] ?? '';
$name       = $_POST['name'] ?? '';
$bio        = $_POST['bio'] ?? '';
$birthday   = $_POST['birthday'] ?? '';
$country    = $_POST['country'] ?? '';
$phone      = $_POST['phone'] ?? '';
$twitter    = $_POST['twitter'] ?? '';
$facebook   = $_POST['facebook'] ?? '';
$instagram  = $_POST['instagram'] ?? '';

// Data password dari form
$current_password = $_POST['current_password'] ?? '';
$new_password     = $_POST['new_password'] ?? '';
$confirm_password = $_POST['confirm_password'] ?? '';

// 5. Validasi dasar (contoh: username dan nama tidak boleh kosong)
if (empty($username)) {
    $_SESSION['error'] = "Username wajib diisi!";
    header("Location: ../../pages/settingProfile.php");
    exit();
}
if (empty($name)) {
    $_SESSION['error'] = "Nama wajib diisi!";
    header("Location: ../../pages/settingProfile.php");
    exit();
}

// 6. Validasi jika username diubah: pastikan tidak sama dengan username pengguna lain
if ($username !== $current_db_username) {
    $stmt_check_username = $koneksi->prepare("SELECT user_id FROM user WHERE username = ?");
    $stmt_check_username->bind_param("s", $username);
    $stmt_check_username->execute();
    $result_check_username = $stmt_check_username->get_result();
    if ($result_check_username->num_rows > 0) {
        $_SESSION['error'] = "Username '" . htmlspecialchars($username) . "' sudah digunakan. Pilih username lain.";
        header("Location: ../../pages/settingProfile.php");
        exit();
    }
    $stmt_check_username->close();
}

// 7. Logika untuk mengubah password
$update_password = false;
$password_hash_to_save = null;
if (!empty($current_password) || !empty($new_password) || !empty($confirm_password)) {
    if (!password_verify($current_password, $stored_password_hash)) {
        $_SESSION['error'] = "Password lama salah!";
        header("Location: ../../pages/settingProfile.php");
        exit();
    }
    if ($new_password !== $confirm_password) {
        $_SESSION['error'] = "Konfirmasi password tidak cocok!";
        header("Location: ../../pages/settingProfile.php");
        exit();
    }
    if (empty($new_password)) {
        $_SESSION['error'] = "Password baru tidak boleh kosong jika ingin diubah!";
        header("Location: ../../pages/settingProfile.php");
        exit();
    }
    $password_hash_to_save = password_hash($new_password, PASSWORD_DEFAULT);
    $update_password = true;
}

// 8. Logika untuk mengunggah atau mereset foto profil
$profile_picture_to_save_db = $current_profile_picture; // Default: tidak berubah
$new_profile_picture_was_set = false;
$uploadFileDir = '../../uploads/';

if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) {
    $fileTmpPath = $_FILES['profile_picture']['tmp_name'];
    $fileNameCmps = explode(".", $_FILES['profile_picture']['name']);
    $fileExtension = strtolower(end($fileNameCmps));
    $allowedExts = ['jpg', 'jpeg', 'png', 'gif'];
    $maxSize = 800 * 1024; // 800KB

    if (in_array($fileExtension, $allowedExts) && $_FILES['profile_picture']['size'] <= $maxSize) {
        // Gunakan nama acak agar tidak bentrok, dan mudah dihapus nanti
        $newFileName = 'profile_' . $user_id . '_' . time() . '.' . $fileExtension;
        $dest_path = $uploadFileDir . $newFileName;

        if (!is_dir($uploadFileDir)) {
            mkdir($uploadFileDir, 0777, true);
        }

        if (move_uploaded_file($fileTmpPath, $dest_path)) {
            // Hapus file lama jika bukan default
            if (
                $current_profile_picture &&
                file_exists($uploadFileDir . $current_profile_picture) &&
                strpos($current_profile_picture, 'default') === false
            ) {
                unlink($uploadFileDir . $current_profile_picture);
            }

            $profile_picture_to_save_db = $newFileName;
            $new_profile_picture_was_set = true;
        } else {
            $_SESSION['error'] = "Gagal memindahkan file upload.";
            header("Location: ../../pages/settingProfile.php");
            exit();
        }
    } else {
        $_SESSION['error'] = "Format file tidak valid atau ukuran melebihi 800KB.";
        header("Location: ../../pages/settingProfile.php");
        exit();
    }
} elseif (isset($_POST['reset_photo_flag']) && $_POST['reset_photo_flag'] == '1') {
    // Reset ke default: hapus file dan kosongkan kolom database
    if (
        $current_profile_picture &&
        file_exists($uploadFileDir . $current_profile_picture) &&
        strpos($current_profile_picture, 'default') === false
    ) {
        unlink($uploadFileDir . $current_profile_picture);
    }
    $profile_picture_to_save_db = ''; // atau 'default-profile.png' kalau kamu punya default
    $new_profile_picture_was_set = true;
}

// 9. Mempersiapkan query UPDATE secara dinamis
$query_parts = [ // Kolom yang selalu dipertimbangkan untuk diupdate
    "username = ?", "name = ?", "bio = ?", "birthday = ?",
    "country = ?", "phone = ?", "twitter = ?", "facebook = ?", "instagram = ?"
];
$params = [$username, $name, $bio, $birthday, $country, $phone, $twitter, $facebook, $instagram];
$types = "sssssssss";

// Tambahkan 'profile_picture' ke query jika ada perubahan foto
if ($new_profile_picture_was_set || $profile_picture_to_save_db !== $current_profile_picture) {
    $query_parts[] = "profile_picture = ?";
    $params[] = $profile_picture_to_save_db;
    $types .= "s";
}

// Tambahkan 'password' ke query jika password diubah
if ($update_password && $password_hash_to_save) {
    $query_parts[] = "password = ?";
    $params[] = $password_hash_to_save;
    $types .= "s";
}

// Hanya jalankan query jika ada sesuatu yang diubah
if (!empty($query_parts)) {
    $query = "UPDATE user SET " . implode(", ", $query_parts) . " WHERE user_id = ?";
    $params[] = $user_id; // Tambahkan user_id di akhir untuk klausa WHERE
    $types .= "i";       // Tambahkan tipe integer untuk user_id

    $stmt = $koneksi->prepare($query);
    if (!$stmt) {
        $_SESSION['error'] = "Gagal menyiapkan statement: " . $koneksi->error;
    } else {
        $stmt->bind_param($types, ...$params);
        if ($stmt->execute()) {
            $_SESSION['success'] = "Profil berhasil diperbarui!";
            // Perbarui data di session jika perlu (username, foto profil)
            if ($username !== $current_db_username) {
                $_SESSION['username'] = $username;
            }
            if ($new_profile_picture_was_set) {
                $_SESSION['profile_picture'] = $profile_picture_to_save_db;
            }
        } else {
            $_SESSION['error'] = "Gagal memperbarui profil: " . $stmt->error;
        }
        $stmt->close();
    }
} else {
    $_SESSION['info'] = "Tidak ada perubahan data untuk disimpan.";
}


$koneksi->close();
// 10. Mengarahkan kembali pengguna ke halaman pengaturan profil
header("Location: ../../pages/settingProfile.php");
exit();
?>