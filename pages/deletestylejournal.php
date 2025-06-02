<?php
include "../koneksi.php"; 

$id = $_GET['id'];

$getImg = $koneksi->query("SELECT image FROM stylejournal WHERE id_journal = $id");
if ($getImg && $row = $getImg->fetch_assoc()) {
    $imagePath = $row['image'];
    
    if (file_exists($imagePath)) {
        unlink($imagePath);
    }
}

$sql = "DELETE FROM stylejournal WHERE id_journal = $id";
if ($koneksi->query($sql)) {
    echo "<script>alert('Article successfully deleted!'); window.location.href='../index.php?page=stylejournal';</script>";
} else {
    echo "Error: " . $koneksi->error;
}

$koneksi->close();
?>
