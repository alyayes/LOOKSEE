<?php
include __DIR__ . '/../koneksi.php';

if (!isset($_GET['id'])) {
    echo "Journal ID not found!";
    exit;
}

$id = intval($_GET['id']);

// Ambil data berdasarkan ID
$stmt = $koneksi->prepare("SELECT * FROM stylejournal WHERE id_journal=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$journal = $result->fetch_assoc();
$stmt->close();

if (!$journal) {
    echo "Journal data not found!";
    exit;
}

if (isset($_POST['btnSubmit'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $oldImage = $_POST['imageLama'];
    $image = $oldImage;

    // Cek jika ada gambar baru diupload
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $target_dir = __DIR__ . '/../uploads/';
        $filename = time() . "_" . basename($_FILES["image"]["name"]);
        $target_file = $target_dir . $filename;

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $image = $filename;

            // Hapus gambar lama jika berbeda
            $old_path = $target_dir . $oldImage;
            if ($oldImage && file_exists($old_path) && $oldImage !== $filename) {
                unlink($old_path);
            }
        } else {
            echo "<script>alert('Image upload failed.');</script>";
        }
    }

    $stmt = $koneksi->prepare("UPDATE stylejournal SET title=?, content=?, image=? WHERE id_journal=?");
    $stmt->bind_param("sssi", $title, $content, $image, $id);

    if ($stmt->execute()) {
        echo "<script>alert('Journal updated successfully!'); window.location.href='index.php?page=stylejournal';</script>";
        exit;
    } else {
        echo "Update failed: " . $stmt->error;
    }
    $stmt->close();
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

  .preview-img {
    max-width: 150px;
    margin-bottom: 10px;
    border-radius: 6px;
    display: block;
  }
</style>

<div class="form-container">
  <form action="index.php?page=editstylejournal&id=<?= $id ?>" method="POST" enctype="multipart/form-data">

    <!-- Judul Artikel -->
    <div class="mb-3">
      <label for="title" class="form-label">Title Article</label>
      <input type="text" class="form-control" id="title" name="title" value="<?= htmlspecialchars($journal['title']) ?>" required>
    </div>

    <!-- Isi Artikel -->
    <div class="mb-3">
      <label for="content" class="form-label">Content</label>
      <textarea class="form-control" id="content" name="content" rows="6" required><?= htmlspecialchars($journal['content']) ?></textarea>
    </div>

    <!-- Upload Gambar -->
    <div class="mb-3">
      <label for="image" class="form-label"></label>
      <input class="form-control" type="file" id="image" name="image" accept="image/*">
    </div>

    <!-- Preview Gambar Lama -->
    <?php if ($journal['image']): ?>
      <div class="mb-3">
        <img src="uploads/<?= $journal['image'] ?>" class="preview-img" alt="Gambar Jurnal">
      </div>
      <input type="hidden" name="imageLama" value="<?= $journal['image'] ?>">
    <?php endif; ?>

    <!-- Tombol -->
    <div class="d-flex justify-content-end">
      <button type="reset" class="btn btn-secondary me-2">Reset</button>
      <button type="submit" name="btnSubmit" class="btn btn-primary">Save</button>
    </div>

  </form>
</div>
