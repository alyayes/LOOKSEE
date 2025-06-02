<?php
include(__DIR__ . '/../koneksi.php');

// Proses tambah journal
if (isset($_POST['btnSubmit'])) {
  $title = $_POST['title'];
  $content = $_POST['content'];

  // Upload gambar
  $target_dir = "../uploads/";
  $nama_file = time() . "_" . basename($_FILES["image"]["name"]);
  $target_file = $target_dir . $nama_file;

  if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    $image = $nama_file;
  } else {
    echo "Image upload failed.";
    exit;
  }

  // Simpan ke database
  $stmt = $koneksi->prepare("INSERT INTO stylejournal (title, content, image) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $title, $content, $image);

  if ($stmt->execute()) {
    echo "<script>alert('Journal added successfully!'); window.location.href='stylejournal.php';</script>";
  } else {
    echo "Error: " . $stmt->error;
  }

  $stmt->close();
}

// Ambil semua data journal
$sql = "SELECT * FROM stylejournal";
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
    margin-bottom: 12px;
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

  .btn-action {
    width: 40px;
    height: 40px;
    padding: 0;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    margin-right: 5px;
  }
</style>

<div class="propic">
  <section>
    <button type="button" class="btn btn-primary" onclick="window.location.href='index.php?page=addstylejournal';">
      <i class='bx bx-plus'></i> Add Journal
    </button>
  </section>

  <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for journal..." title="Type in a name" />
  <table id="myTable">
    <tr class="header">
      <th style="width:8%;">Image</th>
      <th style="width:10%;">Title</th>
      <th style="width:20%;">Content</th>
      <th style="width:10%;">Action</th>
    </tr>


    <tbody>
      <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
          <td>
            <img src="uploads/<?= $row['image'] ?>" width="60" height="60" alt="Gambar Journal">
          </td>
          <td><?= $row['title'] ?></td>
          <td><?= $row['content'] ?></td>
          <td>
            <a href="index.php?page=editstylejournal&id=<?= $row['id_journal']; ?>" class="btn btn-success btn-action"
              title="Edit">
              <i class='bx bx-edit'></i>
            </a>
            <a href="pages/deletestylejournal.php?id=<?= $row['id_journal'] ?>" class="btn btn-danger btn-action" title="Hapus"
              onclick="return confirm('Are you sure you want to delete this journal?')">
              <i class='bx bx-trash'></i>
            </a>
          </td>
        </tr>
      <?php endwhile; ?>
    </tbody>