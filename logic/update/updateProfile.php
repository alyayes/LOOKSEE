<?php
session_start();
require_once '../../koneksi.php';

// Cek apakah user sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: ../../pages/login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Ambil data dari form
$username   = $_POST['username'] ?? '';
$name       = $_POST['name'] ?? '';
$email      = $_POST['email'] ?? '';
$bio        = $_POST['bio'] ?? '';
$birthday   = $_POST['birthday'] ?? '';
$country    = $_POST['country'] ?? '';
$phone      = $_POST['phone'] ?? '';
$website    = $_POST['website'] ?? '';
$twitter    = $_POST['twitter'] ?? '';
$facebook   = $_POST['facebook'] ?? '';
$instagram  = $_POST['instagram'] ?? '';

// Validasi sederhana
if (empty($username) || empty($email)) {
    $_SESSION['error'] = "Username dan Email wajib diisi!";
    header("Location: ../../pages/settingProfile.php");
    exit();
}

// Inisialisasi foto profil
$profile_picture = null;

// Proses upload foto jika ada
if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) {
    $fileTmpPath = $_FILES['profile_picture']['tmp_name'];
    $fileName    = $_FILES['profile_picture']['name'];
    $fileSize    = $_FILES['profile_picture']['size'];
    $fileType    = $_FILES['profile_picture']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));

    $allowedExts = ['jpg', 'jpeg', 'png', 'gif'];
    $maxSize = 800 * 1024; // 800KB

    if (in_array($fileExtension, $allowedExts) && $fileSize <= $maxSize) {
        $newFileName = 'profile_' . $user_id . '.' . $fileExtension;
        $uploadFileDir = '../../uploads/';
        $dest_path = $uploadFileDir . $newFileName;

        if (!is_dir($uploadFileDir)) {
            mkdir($uploadFileDir, 0777, true);
        }

        if (move_uploaded_file($fileTmpPath, $dest_path)) {
            $profile_picture = $newFileName;
        } else {
            $_SESSION['error'] = "Gagal memindahkan file upload.";
            header("Location: ../../pages/settingProfile.php");
            exit();
        }
    } else {
        $_SESSION['error'] = "Format file tidak valid atau ukuran terlalu besar.";
        header("Location: ../../pages/settingProfile.php");
        exit();
    }
}

// Siapkan query SQL
if ($profile_picture) {
    $query = "UPDATE user SET 
                username = ?, 
                name = ?, 
                email = ?, 
                bio = ?, 
                birthday = ?, 
                country = ?, 
                phone = ?, 
                website = ?, 
                twitter = ?, 
                facebook = ?, 
                instagram = ?,
                profile_picture = ?
              WHERE user_id = ?";

    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("ssssssssssssi", $username, $name, $email, $bio, $birthday, $country, $phone, $website, $twitter, $facebook, $instagram, $profile_picture, $user_id);
} else {
    $query = "UPDATE user SET 
                username = ?, 
                name = ?, 
                email = ?, 
                bio = ?, 
                birthday = ?, 
                country = ?, 
                phone = ?, 
                website = ?, 
                twitter = ?, 
                facebook = ?, 
                instagram = ?
              WHERE user_id = ?";

    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("sssssssssssi", $username, $name, $email, $bio, $birthday, $country, $phone, $website, $twitter, $facebook, $instagram, $user_id);
}

// Eksekusi query
if ($stmt->execute()) {
    $_SESSION['success'] = "Profil berhasil diperbarui!";
} else {
    $_SESSION['error'] = "Gagal memperbarui profil: " . $stmt->error;
}

$stmt->close();
$koneksi->close();

// Redirect kembali ke halaman setting
header("Location: ../../pages/settingProfile.php");
exit();
?>
