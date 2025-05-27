<?php
include '../koneksi.php';

$page_woman = isset($_GET['page_woman']) ? (int)$_GET['page_woman'] : 1;
$limit = 4;
$offset_woman = ($page_woman - 1) * $limit;

$page_man = isset($_GET['page_man']) ? (int)$_GET['page_man'] : 1;
$offset_man = ($page_man - 1) * $limit;

$sql_woman = "SELECT * FROM produk_looksee WHERE kategori IN ('Wanita', 'Woman') LIMIT $limit OFFSET $offset_woman";
$result_woman = $koneksi->query($sql_woman);

$sql_man = "SELECT * FROM produk_looksee WHERE kategori IN ('Pria', 'Man') LIMIT $limit OFFSET $offset_man";
$result_man = $koneksi->query($sql_man);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOOKSEE</title>
    <link rel="stylesheet" href="../assets/css/home.css">
</head>
<body>


<section class="main-home">
        <div class="main-text">
            <div class="slider">
                <h5>New Collection</h5>
                <h1>New Woman Tops <br> Collection</h1>
                <p>Outfit the Day, Own the Mood!</p>
                <a href="#mood" class="main-btn">Suits the Mood<i class='bx bx-right-arrow-alt'></i></a>
                <a href="#latest-product" class="main-btn">Shop Now<i class='bx bx-right-arrow-alt'></i></a>
            </div>
        </div>
</section>

<!-- Penjelasan Singkat Website -->
<section class="main-about">
    <div class="main-about-us">
        <h2>Why <Span>Choose Us?</Span></h2>      
        <p><d>LOOKSEE</d> is an innovative fashion platform that provides outfit recommendations for campus activities. 
            We offer a personalization feature that allows users to customize their outfit concepts according to their mood. ... <a href="index.php?page=aboutLaPe"><i>Learn More</i></a>
        </p> <br>
        <div class="about-icon">
            <h>
                <i class='bx bx-wink-smile'> Full Personalization</i>
                <p>The recommended outfit truly matches each user's mood, providing freedom of expression and a unique appearance.</p>
                <br>
                <i class='bx bx-trending-up'> Current Trends</i>
                <p>Always stay updated with the latest fashion trends and provide outfit recommendations that make you feel confident on campus.</p>
                <br>
                <i class='bx bx-wallet'> Quality Assurance and Budget-Friendly</i>
                <p>All product recommendations are from trusted brands with high quality, and they fit various budgets suitable for students.</p>
            </h>
        </div>
    </div>
</section>

<!-- Woman Section -->
<section class="recommend-product" id="latest-product">
    <div class="text">
        <h2>Latest <span>Products</span></h2>
        <h3>Woman</h3>
    </div> 
    <div class="product-grid">
        <?php while($row = $result_woman->fetch_assoc()): ?>
        <div class="product-card">
            <div class="product-image">
                <img src="../uploads/<?= htmlspecialchars($row['gambar_produk']) ?>" alt="<?= htmlspecialchars($row['nama_produk']) ?>">
            </div>
            <div class="product-details">
                <h4><?= htmlspecialchars($row['nama_produk']) ?></h4>
                <p>Rp. <?= number_format($row['harga'], 0, ',', '.') ?></p>
                <div class="actions">
                    <button class="btn favorite-btn" onclick="addToFavorites('<?= htmlspecialchars($row['nama_produk']) ?>')">Add to Favorite</button>
                    <button class="btn buy-now-btn"><a href="<?= htmlspecialchars($row['link_produk']) ?>">Go To Product</a></button>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
    </div><br>
    <div class="page-btn">
        <?php
        $res = $koneksi->query("SELECT COUNT(*) as total FROM produk_looksee WHERE kategori IN ('Wanita', 'Woman')");
        $total_pages = ceil($res->fetch_assoc()['total'] / $limit);
        for ($i = 1; $i <= $total_pages; $i++): ?>
            <span onclick="goToPage('page_woman', <?= $i ?>)"> <?= $i ?> </span>
        <?php endfor; ?>
    </div>
</section>

<section class="recommend-product" id="recommend">
    <div class="text">
        <h3>Man</h3>
    </div>
    <div class="product-grid">
        <?php while($row = $result_man->fetch_assoc()): ?>
        <div class="product-card">
            <div class="product-image">
                <img src="../uploads/<?= htmlspecialchars($row['gambar_produk']) ?>" alt="<?= htmlspecialchars($row['nama_produk']) ?>">
            </div>
            <div class="product-details">
                <h4><?= htmlspecialchars($row['nama_produk']) ?></h4>
                <p>Rp. <?= number_format($row['harga'], 0, ',', '.') ?></p>
                <div class="actions">
                    <button class="btn favorite-btn" onclick="addToFavorites('<?= htmlspecialchars($row['nama_produk']) ?>')">Add to Favorite</button>
                    <button class="btn buy-now-btn"><a href="<?= htmlspecialchars($row['link_produk']) ?>">Go To Product</a></button>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
    </div><br>
    <div class="page-btn">
        <?php
        $resMan = $koneksi->query("SELECT COUNT(*) as total FROM produk_looksee WHERE kategori IN ('Pria', 'Man')");
        $total_pages_man = ceil($resMan->fetch_assoc()['total'] / $limit);
        for ($i = 1; $i <= $total_pages_man; $i++): ?>
            <span onclick="goToPage('page_man', <?= $i ?>)"> <?= $i ?> </span>
        <?php endfor; ?>
        <?php if ($page_man < $total_pages_man): ?>
            <span onclick="goToPage('page_man', <?= $page_man + 1 ?>)">&#8594;</span>
        <?php endif; ?>
    </div>
</section>

<!-- Script scroll dan pagination -->
<script>
function goToPage(param, value) {
    const url = new URL(window.location.href);
    url.searchParams.set('page', 'home');
    url.searchParams.set(param, value);
    url.hash = '';
    window.location.href = url.toString();
}

window.addEventListener('DOMContentLoaded', () => {
    const params = new URLSearchParams(window.location.search);
    if (params.has('page_woman')) {
        const target = document.getElementById('latest-product');
        if (target) {
            window.scrollTo({ top: target.offsetTop, behavior: 'auto' });
        }
    }
    if (params.has('page_man')) {
        const target = document.getElementById('recommend');
        if (target) {
            window.scrollTo({ top: target.offsetTop, behavior: 'auto' });
        }
    }
});
</script>
</body>
</html>
