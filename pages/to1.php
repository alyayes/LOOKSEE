<?php include '../koneksi.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Raw LOOKSEE</title>
  <link rel="stylesheet" href="../assets/css/to.css">

      <!-- Main Content -->
      <main>
    <div class="gallery">
      <?php
      $sql = "SELECT * FROM posts ORDER BY created_at DESC";
      $result = $koneksi->query($sql);

      while ($row = $result->fetch_assoc()) {
        $username = htmlspecialchars($row['username']);
        $image = htmlspecialchars($row['image_post']);
        $caption = htmlspecialchars($row['caption']);
        $mood = strtolower(str_replace(' ', '-', $row['mood']));
        $likes = rand(100, 600); // Dummy like count
        $profilePic = "../assets/images/profil.jpeg"; // Ganti dengan real user image jika ada
      ?>
        <div class="card">
          <div class="image-placeholder">
          <a href="detailTO.php?id_post=<?= $row['id_post'] ?>">
          <img src="../uploads/<?= $image ?>">
              <p><i class='bx bx-heart'> <?= $likes ?></i></p>
            </a>
          </div>
          <div class="title-card">
            <p><strong><?= $caption ?></strong></p>
          </div>
          <div class="title-card">
            <img src="<?= $profilePic ?>"><p><?= $username ?></p>
            <span class="tag <?= $mood ?>"><?= $row['mood'] ?></span>
          </div>
        </div>
      <?php } ?>
    </div>
  </main>






    <!-- https://bytewebster.com/ -->
    <!-- https://bytewebster.com/ -->
    <!-- https://bytewebster.com/ -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
</body>
</html>