<?php
include(__DIR__ . '/../koneksi.php');

?>

  <style>
    body {
      background-color: #f8f9fa;
    }
    .form-container {
      max-width: 800px;
      margin-right: 20%;
      margin: 40px auto;
      background: #ffffff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
  </style>
</head>
<body>

  <div class="form-container">
    <h2 class="mb-4 text-center">Form Artikel - Style Journal</h2>
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

      <!-- Status Artikel -->
      <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select class="form-select" id="status" name="status" required>
          <option value="draft">Draft</option>
          <option value="published">Published</option>
        </select>
      </div>

      <!-- Tanggal Dibuat -->
      <div class="mb-3">
        <label for="created_at" class="form-label">Date</label>
        <input type="date" class="form-control" id="created_at" name="created_at" value="<?= date('Y-m-d') ?>" required>
      </div>

      <!-- Tombol -->
      <div class="d-flex justify-content-end">
        <button type="reset" class="btn btn-secondary me-2">Reset</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>

    </form>
  </div>

  <!-- Bootstrap JS (Opsional) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


