<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $status = $_POST['status'];
    $avatar = $_FILES['avatar']['name'];
    $tmp = $_FILES['avatar']['tmp_name'];

    move_uploaded_file($tmp, "uploads/" . $avatar);

    $query = "INSERT INTO user (avatar, username, name, email, status)
              VALUES ('$avatar', '$username', '$name', '$email', '$status')";
    mysqli_query($koneksi, $query);
}

header("Location: user.php");
?>
