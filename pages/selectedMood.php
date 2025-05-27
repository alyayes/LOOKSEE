<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "looksee"; 

$koneksi = new mysqli($servername, $username, $password, $dbname);

if ($koneksi->connect_error) {
    die("koneksi gagal: " . $koneksi->connect_error);
}

$allowed_moods = ['very happy', 'happy', 'netral', 'sad', 'very sad'];
$mood = isset($_GET['mood']) ? strtolower($_GET['mood']) : 'happy';
if (!in_array($mood, $allowed_moods)) $mood = 'happy';

$limit = 8; 
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $limit;

$stmt = $koneksi->prepare("SELECT * FROM produk_looksee WHERE mood = ? LIMIT ?, ?");
$stmt->bind_param("sii", $mood, $offset, $limit);
$stmt->execute();
$result = $stmt->get_result();

$sql_count = "SELECT COUNT(*) AS total FROM produk_looksee WHERE mood = ?";
$stmt_count = $koneksi->prepare($sql_count);
$stmt_count->bind_param("s", $mood);
$stmt_count->execute();
$result_count = $stmt_count->get_result();
$row_count = $result_count->fetch_assoc();
$total_products = $row_count['total'];
$total_pages = ceil($total_products / $limit);

$products = [];
while ($row = $result->fetch_assoc()) {
    $products[] = [
        'gambar_produk' => $row['gambar_produk'],
        'nama_produk' => $row['nama_produk'],
        'marketplace' => $row['platform'],  
    ];
}

$stmt->close();
$stmt_count->close();
$koneksi->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Selected Mood | LOOKSEE</title>
  <link rel="stylesheet" href="../assets/css/selectedMood.css">
  <link rel="prekoneksi" href="https://fonts.googleapis.com">
  <link rel="prekoneksi" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Jost:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
</head>
<body>

<div class="main-content">
  <div class="container">
    <h2>Featured Products for Mood: <span id="moodName"><?php echo ucfirst($mood); ?></span></h2>
    <div class="product-grid" id="productContainer">
      <?php if (count($products) > 0): ?>
        <?php foreach ($products as $product): ?>
          <div class="product-card">
            <img src="../assets/pics/<?php echo $product['gambar_produk']; ?>" alt="<?php echo $product['nama_produk']; ?>" class="product-image">
            <div class="product-info">
              <h3 class="product-name"><?php echo $product['nama_produk']; ?></h3>
              <p class="product-marketplace"><?php echo $product['marketplace']; ?></p>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <p>No products found for this mood.</p>
      <?php endif; ?>
    </div>

    <!-- Pagination -->
    <div class="pagination">
      <?php for ($i = 1; $i <= $total_pages; $i++): ?>
        <a href="selectedMood.php?page=<?php echo $i; ?>&mood=<?php echo $mood; ?>" class="<?php echo $i == $page ? 'active' : ''; ?>"><?php echo $i; ?></a>
      <?php endfor; ?>
    </div>
  </div>
</div>

</body>
</html>
