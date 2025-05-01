<?php
include "views/header.php";

$allowed_pages = [
    'dashboard' => 'pages/dashboard.php',
    'analytics' => 'pages/analytics.php',
    'products' => 'pages/products.php',
    'users' => 'pages/users.php',
    'complaint' => 'pages/complaint.php',
    'activity_user' => 'pages/activity_user.php',
    'user_post' => 'pages/user_post.php'
];

if (isset($_GET['page'])) {
    $page = $_GET['page'];
    
    if (array_key_exists($page, $allowed_pages)) {
        include $allowed_pages[$page];
    } else {
        echo "<h2>404 - Halaman Tidak Ditemukan</h2>";
    }
} else {
    include "pages/dashboard.php"; // default ke dashboard
}

include "views/footer.php";
?>
