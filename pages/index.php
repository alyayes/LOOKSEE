<?php
include "../views/header2.php";

if (isset($_GET['page'])) {
	$page = $_GET['page'];
	$allowed_pages = ['home', 'trendsNow', 'to1', 'styleJournal', 'aboutLape', 'contact', 'profile', 'profile2', 'profile3', 'fav'];
	
	if(in_array($page, $allowed_pages)) {
		include "$page.php";
	} else {
		echo "<h2>404 - Halaman Tidak Ditemukan</h2>";
	}		
} else {
	include "home.php";
} 

include "../views/footer.php";
?>