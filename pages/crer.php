<?php
include __DIR__ . '/../../koneksi.php';

function showError($message) {
    echo "
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f8f8f8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .error-box {
            background: #ffe5e5;
            border: 1px solid #ff4d4d;
            color: #cc0000;
            padding: 20px 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(255,0,0,0.2);
            text-align: center;
        }
        .error-box a {
            display: inline-block;
            margin-top: 15px;
            text-decoration: none;
            color: #0066cc;
        }
    </style>
    <div class='error-box'>
        <h2>⚠ $message</h2>
        <a href='../../pages/register.php'>← Kembali ke Register</a>
    </div>";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $password = $_POST['password'];
    $role = 'konsumen';

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    if (!$koneksi) {
        die("Koneksi database gagal: " . mysqli_connect_error());
    }

    // Cek apakah username atau email sudah digunakan
    $query = "SELECT username, email FROM user WHERE username = ? OR email = ?";
    $cekStmt = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($cekStmt, "ss", $username, $email);
    mysqli_stmt_execute($cekStmt);
    $result = mysqli_stmt_get_result($cekStmt);

    if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
        if ($data['username'] === $username) {
            showError("Username sudah digunakan!");
        } elseif ($data['email'] === $email) {
            showError("Email sudah terdaftar!");
        }
    }
    mysqli_stmt_close($cekStmt);

    // statement
    $stmt = mysqli_prepare($koneksi, "
        INSERT INTO user (username, email, password, role) 
        VALUES (?, ?, ?, ?)
    ");

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssss", $username, $email, $hashed_password, $role);

        if (mysqli_stmt_execute($stmt)) {
            // Tutup statement dan koneksi
            mysqli_stmt_close($stmt);
            mysqli_close($koneksi);

            // Redirect ke halaman login
            header('Location: ../../pages/login.php');
            exit;
        } else {
            echo "Gagal mengeksekusi query: " . mysqli_stmt_error($stmt);
        }
    } else {
        echo "Gagal menyiapkan statement: " . mysqli_error($koneksi);
    }
}
?>