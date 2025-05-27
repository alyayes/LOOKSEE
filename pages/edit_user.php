<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id_user'];
    $username = $_POST['username'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $status = $_POST['status'];

    if (!empty($_FILES['avatar']['name'])) {
        $avatar = $_FILES['avatar']['name'];
        $tmp = $_FILES['avatar']['tmp_name'];
        move_uploaded_file($tmp, "uploads/" . $avatar);

        $query = "UPDATE user SET avatar='$avatar', username='$username', name='$name', email='$email', status='$status' WHERE id_user=$id";
    } else {
        $query = "UPDATE user SET username='$username', name='$name', email='$email', status='$status' WHERE id_user=$id";
    }

    mysqli_query($koneksi, $query);
}

header("Location: user.php");
?>
