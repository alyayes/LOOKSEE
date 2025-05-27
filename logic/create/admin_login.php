<?php
session_start();
include __DIR__ . '/../update/db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $captcha_input = $_POST['captcha_input'];

    if ($captcha_input != $_SESSION['captcha']) {
        die("❌ CAPTCHA SALAH!");
    }

    $stmt = mysqli_prepare($koneksi, "SELECT * FROM pengguna WHERE email = ?");
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        if (password_verify($password, $row['password']) && $row['role'] === 'admin') {
            $_SESSION['otp'] = rand(100000, 999999); // OTP 6 digit
            $_SESSION['temp_admin'] = $row; // simpan data sementara
            // ⚠ Simulasikan pengiriman OTP ke email (atau tampilkan saja)
            echo "✅ LOGIN BERHASIL.<br>Kode OTP Anda: <strong>" . $_SESSION['otp'] . "</strong><br>";
            echo "<form method='POST' action='admin_verify_otp.php'>
                    <input type='text' name='otp_input' placeholder='Masukkan OTP'>
                    <button type='submit'>Verifikasi OTP</button>
                  </form>";
            exit;
        } else {
            echo "❌ LOGIN GAGAL! PASSWORD SALAH ATAU BUKAN ADMIN.";
            exit;
        }
    } else {
        echo "❌ EMAIL TIDAK DITEMUKAN!";
        exit;
    }
} else {
    echo "⚠ AKSES TIDAK VALID.";
}
?>

<!-- //abc -->
