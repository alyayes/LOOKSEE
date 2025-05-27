<?php
include "../koneksi.php"; 

$id = $_GET['id'];

$getImg = $koneksi->query("SELECT gambar_produk FROM produk_looksee WHERE id_produk = $id");
if ($getImg && $row = $getImg->fetch_assoc()) {
    $imagePath = $row['gambar_produk'];
    
    if (file_exists($imagePath)) {
        unlink($imagePath);
    }
}

$sql = "DELETE FROM produk_looksee WHERE id_produk = $id";
if ($koneksi->query($sql)) {
    echo "<script>alert('Produk berhasil dihapus!'); window.location.href='../index.php?page=product';</script>";
} else {
    echo "Error: " . $koneksi->error;
}

$koneksi->close();
?>
