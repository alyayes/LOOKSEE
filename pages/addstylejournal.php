<?php
include(__DIR__ . '/../koneksi.php');

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $imageName = null;

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = __DIR__ . '/../uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $imageName = basename($_FILES['image']['name']);
        $targetFile = $uploadDir . $imageName;

        if (!move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
            $errors[] = "Gagal mengunggah gambar.";
        }
    }

    if (empty($title) || empty($content)) {
        $errors[] = "Judul dan konten tidak boleh kosong.";
    }

    if (empty($errors)) {
        $stmt = $koneksi->prepare("INSERT INTO stylejournal (title, content, image) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $title, $content, $imageName);

        if ($stmt->execute()) {
            echo "<script>window.location.href='index.php?page=stylejournal';</script>";
            exit;
        } else {
            $errors[] = "Gagal menyimpan data ke database.";
        }

        $stmt->close();
    }
}
?>

  <style>
    body {
      background-color: #f8f9fa;
    }
    .form-container {
      max-width: 1050px;
      margin-right: 20%;
      margin: 40px auto;
      margin-top: 7%;
      margin-left: 20%;
      background: rgb(255, 244, 252);
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
  </style>
</head>
<body>

  <div class="form-container">
    <form method="POST" enctype="multipart/form-data">

      <!-- Judul Artikel -->
      <div class="mb-3">
        <label for="title" class="form-label">Title Article</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Masukkan judul artikel" required>
      </div>

      <!-- Isi Artikel -->
      <div class="mb-3">
        <label for="content" class="form-label">Content</label>
        <textarea class="form-control" id="content" name="content" rows="6" placeholder="Tulis isi artikel di sini" required></textarea>
      </div>

      <!-- Upload Gambar -->
      <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <input class="form-control" type="file" id="image" name="image" accept="image/*">
      </div>

      <div class="d-flex justify-content-end">
        <button type="reset" class="btn btn-secondary me-2">Reset</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>

    </form>
  </div>

