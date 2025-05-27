<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    mysqli_query($koneksi, "DELETE FROM user WHERE id_user=$id");
}

header("Location: user.php");
?>
