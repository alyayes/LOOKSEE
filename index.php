<?php
include "views/header1.php";

if (isset($_GET['page'])) {
    $page = $_GET['page'];
    $allowed_pages = ['dashboard', 'analytics', 'product', 'addproduct', 'editproduct', 'deleteproduct', 'user', 'add_user', 'edit_user', 'delete_user', 'stylejournal', 'addstylejournal', 'userpic', 'activitylog', 'uploads', 'login'];

    if (in_array($page, $allowed_pages)) {
        include "pages/$page.php";
    } else {
        echo "<h2>404 - Halaman Tidak Ditemukan</h2>";
    }
} else {
    include "pages/dashboard.php";
}

include "views/footer1.php";
?>
