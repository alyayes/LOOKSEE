<?php
session_start();
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
        <a href='../../pages/login.php'>← Kembali ke Login</a>
    </div>";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = mysqli_prepare($koneksi, "SELECT * FROM user WHERE username = ?");
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['role'] = $row['role'];

            if ($row['role'] === 'konsumen') {
                header("Location: ../../pages/index.php?page=home");
                exit;
            } elseif ($row['role'] === 'admin') {
                header("Location: ../../index.php?page=dashboard");
                exit;
            } else {
                showError("Role tidak diizinkan.");
            }
        } else {
            showError("Password salah!");
        }
    } else {
        showError("Username tidak ditemukan!");
    }
}
?>
