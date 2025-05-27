<?php
include(__DIR__ . '/../koneksi.php');

// Proses tambah produk
if (isset($_POST['btnSubmit'])) {
  $nama_produk = $_POST['nama_produk'];
  $deskripsi = $_POST['deskripsi'];
  $harga = $_POST['harga'];
  $kategori = $_POST['kategori'];
  $mood = $_POST['mood']; // TAMBAHAN
  $platform = $_POST['id_platform'];
  $link_produk = $_POST['link_produk'];

  // Upload gambar
  $target_dir = "../uploads/";
  $nama_file = time() . "_" . basename($_FILES["gambar_produk"]["name"]);
  $target_file = $target_dir . $nama_file;

  if (move_uploaded_file($_FILES["gambar_produk"]["tmp_name"], $target_file)) {
    $gambar_produk = $nama_file;
  } else {
    echo "Upload gambar gagal.";
    exit;
  }

  // Simpan ke database
  $stmt = $koneksi->prepare("INSERT INTO produk_looksee (
        gambar_produk, nama_produk, deskripsi, harga, kategori, mood, id_platform, link_produk
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

  $stmt->bind_param(
    "sssdsiss",
    $gambar_produk,
    $nama_produk,
    $deskripsi,
    $harga,
    $kategori,
    $mood,
    $id_platform,
    $link_produk
  );

  if ($stmt->execute()) {
    echo "<script>alert('Produk berhasil ditambahkan!'); window.location.href='product.php';</script>";
  } else {
    echo "Error: " . $stmt->error;
  }
  $stmt->close();
}

// Ambil semua data produk
/*$sql = "SELECT * FROM produk_looksee";*/
$sql = "SELECT 
    p.id_produk, 
    p.nama_produk, 
    p.deskripsi, 
    p.harga, 
    p.kategori, 
    p.mood, 
    p.gambar_produk, 
    p.link_produk, 
    p.id_platform AS produk_platform_id, 
    pl.platform,
    pl.id_platform AS platform_id
FROM produk_looksee p
JOIN platform pl ON p.id_platform = pl.id_platform";

$result = $koneksi->query($sql);
?>

<style>
  * {
    box-sizing: border-box;
  }

  #myInput {
    background-image: url('/css/searchicon.png');
    background-position: 10px 10px;
    background-repeat: no-repeat;
    width: 45%;
    font-size: 16px;
    padding: 12px 20px 12px 40px;
    border: 1px solid #ddd;
    margin-bottom: 5px;
    margin-top: 20px;
  }

  #myTable {
    border-collapse: collapse;
    width: 100%;
    border: 1px solid #ddd;
    font-size: 18px;
    margin-bottom: 50px;
    /* Berikan jarak bawah */
  }

  #myTable th,
  #myTable td {
    text-align: left;
    padding: 12px;
    border: 1px solid #ddd;
  }

  #myTable tr {
    border-bottom: 1px solid #ddd;
  }

  #myTable tr.header,
  #myTable tr:hover {
    background-color: rgb(255, 234, 247);
  }
</style>

<div class="propic">
  <section>
    <button type="button" class="btn btn-primary" onclick="window.location.href='index.php?page=addproduct';">
      <i class='bx bx-plus'></i> Add Product
    </button>
  </section>

  <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for product..." title="Type in a name" />
  <table id="myTable">
    <tr class="header">
      <th style="width:12%;">Product</th>
      <th style="width:11%;">Product Name</th>
      <th style="width:13%;">Description</th>
      <th style="width:11%;">Price</th>
      <th style="width:8%;">Category</th>
      <th style="width:9%;">Mood</th>
      <th style="width:9%;">Platform</th>
      <th style="width:10;">Link Product</th>
      <th style="width:17;">Action</th>
    </tr>

    <tbody>
      <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
          <td><img src="uploads/<?= $row['gambar_produk'] ?>" width="60" height="60" alt="Gambar Produk">
          </td>
          <td><?= $row['nama_produk'] ?></td>
          <td><?= $row['deskripsi'] ?></td>
          <td>Rp <?= number_format($row['harga'], 0, ',', '.') ?></td>
          <td><?= $row['kategori'] ?></td>
          <td><?= $row['mood'] ?></td>
          <td><?= htmlspecialchars($row['platform']) ?></td>
          <td><a href="<?= $row['link_produk'] ?>" target="_blank">Lihat Produk</a></td>
          <td>
            <a href="index.php?page=editproduct&id=<?= $row['id_produk']; ?>" class="btn btn-success">Edit</a>
            <a href="pages/deleteproduct.php?id=<?= $row['id_produk'] ?>" class="btn btn-danger"
              onclick="return confirm('Yakin hapus produk ini?')">Hapus</a>
          </td>
        </tr>
      <?php endwhile; ?>
    </tbody>