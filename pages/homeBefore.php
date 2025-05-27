<?php
$is_logged_in = isset($_SESSION['username']);

include_once __DIR__ . '/../koneksi.php';

if (!isset($koneksi)) {
    die("Koneksi ke database gagal.");
}

$limit = 4;
$page_woman = isset($_GET['page_woman']) ? (int)$_GET['page_woman'] : 1;
$offset_woman = ($page_woman - 1) * $limit;

$page_man = isset($_GET['page_man']) ? (int)$_GET['page_man'] : 1;
$offset_man = ($page_man - 1) * $limit;

$sql_woman = "SELECT * FROM produk_looksee WHERE kategori = 'Wanita' LIMIT $limit OFFSET $offset_woman";
$result_woman = $koneksi->query($sql_woman);

$sql_man = "SELECT * FROM produk_looksee WHERE kategori = 'Pria' LIMIT $limit OFFSET $offset_man";
$result_man = $koneksi->query($sql_man);

if (isset($_POST['add_to_favorite']) && $is_logged_in) {
    $product_name = $_POST['product_name'];
    $product_image = $_POST['product_image'];
    $username = $_SESSION['username'];

    $stmt = $koneksi->prepare("INSERT INTO favorites (username, product_name, product_image) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $product_name, $product_image);
    
    echo $stmt->execute() ? "Produk berhasil ditambahkan ke favorit!" : "Gagal menambahkan produk ke favorit.";
    exit;
}
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOOKSEE</title>

    <!--font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=favorite" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" 
    integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF@nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <!-- box icon -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

	<!--Rating Icon-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.6.0/css/fontawesome.min.css">
</head>
<body>
    <header>
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <a href=""><img src="../assets/images/logoHeader.png" width="125px"></a>
                </div>
                <nav>
                    <ul id="MenuItems">
                        <li><a href="#">Home</a></li>
                        <li class="dropdown">
                            <a class="dropbtn">Trends Now</a>
                            <div class="dropdown-content">
                                <div class="dropdown-submenu">
                                    <a href="#" class="submenu-title">Woman</a>
                                </div>
                                <div class="dropdown-submenu">
                                    <a href="#" class="submenu-title">Man</a>
                                </div>
                            </div>
                        </li>
                        <li><a href="#">Today's Outfit</a></li>
                        <li><a href="#">Style Journal</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </nav>
                <div class="nav-icon">
                    <a href="#"><i class='bx bx-search'></i></a>
                    <a href="#"><i class='bx bx-heart'></i></a>
                    <a href="#"><i class='bx bx-bell'></i></a>
                    <i class="dropdown">
                        <i class='bx bx-user'>
                        <div class="dropdown-profile">
                            <div class="dropdown-profile-submenu">
                                <a href="login.php">Login/SignUp</a>
                            </div>
                        </div>
                     </i>
                </div>
                <img src="../assets/images/menuHeader.png" class="menu-icon" onclick="menutoggle()">
            </div>
        </div>
    </header>

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
                <img src="../assets/images/<?= htmlspecialchars($row['gambar_produk']) ?>" alt="<?= htmlspecialchars($row['nama_produk']) ?>">
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
		$res = $koneksi->query("SELECT COUNT(*) as total FROM produk_looksee WHERE kategori = 'Wanita'");
		$total_pages = ceil($res->fetch_assoc()['total'] / $limit);
		for ($i = 1; $i <= $total_pages; $i++): ?>
			<span onclick="goToPage('page_woman', <?= $i ?>)"> <?= $i ?> </span>
		<?php endfor; ?>
	</div>

</section>

<!-- Man Section -->
<section class="recommend-product" id="recommend">
    <div class="text">
        <h3>Man</h3>
    </div>
    <div class="product-grid">
        <?php while($row = $result_man->fetch_assoc()): ?>
        <div class="product-card">
            <div class="product-image">
                <img src="../assets/images/<?= htmlspecialchars($row['gambar_produk']) ?>" alt="<?= htmlspecialchars($row['nama_produk']) ?>">
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
        $resMan = $koneksi->query("SELECT COUNT(*) as total FROM produk_looksee WHERE kategori = 'Pria'");
        $total_pages_man = ceil($resMan->fetch_assoc()['total'] / $limit);
        for ($i = 1; $i <= $total_pages_man; $i++): ?>
            <span onclick="window.location.href='home.php?page_man=<?= $i ?>#recommend'"><?= $i ?></span>
        <?php endfor; ?>
        <?php if ($page_man < $total_pages_man): ?>
            <span onclick="window.location.href='home.php?page_man=<?= $page_man + 1 ?>#recommend'">&#8594;</span>
        <?php endif; ?>
    </div>
</section>

<!-- MOOD -->
<section class="mood-product" id="mood">
    <div class="mood-slider-container">
        <h2>Let's Find an Outfit That Suits With Your Mood!</h2><br>
        <div id="very-happy"><img src="../assets/gif/sangatSenang.gif" width="150" height="150" alt="Mood Animation"></div>
        <div id="happy"><img src="../assets/gif/senang.gif" width="150" height="150" alt="Mood Animation"></div>
        <div id="netral"><img src="../assets/gif/biasa.gif" width="150" height="150" alt="Mood Animation"></div>
        <div id="sad"><img src="../assets/gif/sedih.gif" width="150" height="150" alt="Mood Animation"></div>
        <div id="very-sad"><img src="../assets/gif/sangatSedih.gif" width="150" height="150" alt="Mood Animation"></div>
        
        <div class="slider">
            <input type="range" min="0" max="4" value="2" class="slider-input" id="moodSlider">
            <div class="mood-labels">
                <div class="mood very-sad" data-mood="Very Sad">😢</div>
                <div class="mood sad" data-mood="Sad">☹️</div>
                <div class="mood netral" data-mood="Netral">😐</div>
                <div class="mood happy" data-mood="Happy">😊</div>
                <div class="mood very-happy" data-mood="Very Happy">😁</div>
            </div>
        </div>
        <button id="submitMood">Is It Your Mood?</button>
    </div>

    <script src="../assets/js/mood.js"></script>
</section>

<!-- 3 Brand / Toko --> 
<div class="center-text">
    <h3>0ur Partner</h3>
    <h3>0ur Platform</h3>
</div>
<div class="baru">
    <sbj>
        <a href="https://www.instagram.com/satriabandungjaya/" class="brand-toko"><img src="../assets/images/sbj.jpg"></a>
    </sbj>
    <section class="brand" id="brand">
        <a href="https://shopee.co.id/" class="brand-toko"><img src="../assets/images/shopee.jpg"></a>
        <a href="https://www.tokopedia.com/" class="brand-toko"><img src="../assets/images/tokped.jpg"></a>
    </section>
</div>

<!-- Pop-up ketika pengguna belum login -->
<div id="loginPopup" class="popup">
    <div class="popup-content">
        <h4>Please login to access this feature</h4>
        <div class="tombol-btn">
            <a href="login.php" class="btn login-btn">Login Now</a>
            <button class="btn close-btn" onclick="closePopup()">Close</button>
        </div>
    </div>
</div>

<script>
    function showLoginPopup() {
        document.getElementById('loginPopup').style.display = 'flex';
    }

    function closePopup() {
        document.getElementById('loginPopup').style.display = 'none';
    }

    <?php if (!$is_logged_in): ?>
    document.addEventListener('DOMContentLoaded', () => {
        const allButtons = document.querySelectorAll('a.btn, a.main-btn, button.favorite-btn, button.buy-now-btn, .page-btn span, #submitMood');
        
        allButtons.forEach(button => {
            if (button.classList.contains('login-btn')) return;

            button.addEventListener('click', (e) => {
                e.preventDefault();
                showLoginPopup();
            });
        });
    });
    <?php endif; ?>
</script>
<script src="js/mood.js"></script>

<style>
/* CSS untuk Pop-up */
.popup {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
}

.popup-content {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: white;
    padding: 20px;
    border-radius: 8px;
    text-align: center;
    width: 300px;
    height: 120px;
}

.popup .close-btn {
    position: absolute;
    top: 5px;
    right: 30px;
    font-size: 20px;
    cursor: pointer;
}

.login-btn {
    position: absolute;
    top: 5px;
    right: 50%;
    font-size: 20px;
    cursor: pointer;
    background-color: rgb(250, 156, 211);
    color: white;
}
.login-btn:hover {
    background-color: rgb(248, 99, 186);
}
.tombol-btn .btn {
    display: inline-block;
    margin: 5px;
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    justify-content: center;
    align-items: center;
    gap: 25px;
    margin-top: 15%;
}
</style>
<script>
function goToPage(param, value) {
    const url = new URL(window.location.href);
    url.searchParams.set('page', 'home');
    url.searchParams.set(param, value);
    url.hash = ''; // clear hash to prevent auto-scroll
    window.location.href = url.toString();
}

window.addEventListener('DOMContentLoaded', () => {
    // Manual scroll ke elemen target tanpa animasi (jika ada page_woman di URL)
    const params = new URLSearchParams(window.location.search);
    if (params.has('page_woman')) {
        const target = document.getElementById('latest-product');
        if (target) {
            window.scrollTo({
                top: target.offsetTop,
                behavior: 'auto' // no animation
            });
        }
    }
});
</script>

<script>
function addToFavorites(productName) {
    const productImage = document.querySelector(`#product-${productName} img`).src; // Mengambil gambar produk
    const formData = new FormData();
    formData.append("product_name", productName);
    formData.append("product_image", productImage);
    formData.append("add_to_favorite", true);

    // Mengirimkan data ke server menggunakan AJAX
    fetch("home.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        alert(data); // Menampilkan pesan sukses atau gagal
    })
    .catch(error => {
        console.error("Error:", error);
    });
}

</script>
</body>
<!--Footer-->
<div class="garis">
</div>

<div class="footer">
    <div class="container">
        <div class="row">
            <div class="footer-col-1">
                <h3>Contact Us</h3>
                <ul>
                    <li><a href="#">Address : Faculty of Applied Science, Telkom University.</a></li>
                    <li><a href="#">Phone : (+62) 821 2345 6789</a></li>
                    <li><a href="#">Email : looksee@gmail.com</a></li>
                </ul>
            </div>
            <div class="footer-col-2">
                <img src="../assets/images/logoFooter.png">
                <p>Our Purpose Is To Help Users Discover and Explore the Best Outfit Recommendations.</p>
            </div>
            <div class="footer-col-3">
                <h3>Quick Shop</h3>
                <ul>
                    <li><a href="#">Man</a></li>
                    <li><a href="#">Woman</a></li>
                    <li><a href="#">Trends Now</a></li>
                </ul>
            </div>
            <div class="footer-col-4">
                <h3>My Account</h3>
                <ul>
                    <li><a href="#">My Account</a></li>
                    <li><a href="#">Product's Favorite</a></li>
                    <li><a href="#">Notification</a></li>
                </ul>
            </div>
        </div>
        <hr>
        <p class="Copyright">Copyright © 2024 LOOKSEE. All rights reserved.</p>
    </div>
</div>

</html>
