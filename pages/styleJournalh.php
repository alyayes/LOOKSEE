<?php
require_once '../koneksi.php';

// --- AWAL BLOK PHP UNTUK PENGAMBILAN DATA ---
// Query untuk mengambil data dari tabel stylejournal
$sql = "SELECT id_journal, title, content, image FROM stylejournal ORDER BY id_journal ASC"; // Anda bisa mengganti ORDER BY sesuai kebutuhan
$result = $koneksi->query($sql);

$articles_data = [];
if ($result && $result->num_rows > 0) {
    // Ambil semua data dan simpan dalam array
    while($row = $result->fetch_assoc()) {
        $articles_data[] = $row;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Style Journal | LOOKSEE</title>
    <link rel="stylesheet" href="StyleJournal.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=favorite" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" 
    integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF@nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

</head>
<body>
    <header>
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <a href=""><img src="LOGO11.png" width="125px"></a>
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
                        <li><a href="StyleJournal.php">Style Journal</a></li> <li><a href="#">About</a></li>
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
                                <a href="login.html">Login/SignUp</a>
                            </div>
                        </div>
                       </i>
                </div>
                <img src="menu.png" class="menu-icon" onclick="menutoggle()">
            </div>
        </div>
    </header>

        <div class="offer">
            <div class="small-container">
                <div class="row">
                    <div class="col-2">
                        <h1>Fashion Insights</h1>
                        <p>Explore tips, tricks, and trends to elevate your style!</p>
                    </div>
                </div>
            </div>
        </div>
    
        <main>
            <?php
            // --- AWAL BLOK PHP UNTUK MENAMPILKAN ARTIKEL ---
            if (!empty($articles_data)) {
                $article_count = 0;
                $articles_per_page = 6; // Jumlah artikel per halaman (sesuaikan dengan desain Anda)

                foreach ($articles_data as $article) {
                    // Tentukan nomor halaman untuk atribut data-page
                    $page_for_article = floor($article_count / $articles_per_page) + 1;
            ?>
            <article class="blog-post" data-page="<?php echo $page_for_article; ?>">
                <img src="../uploads/<?php echo htmlspecialchars($article['image']); ?>" alt="<?php echo htmlspecialchars($article['title']); ?>">
                <h2><?php echo htmlspecialchars($article['title']); ?></h2>
                <p>
                    <?php 
                    // Menampilkan ringkasan konten, misal 150 karakter pertama
                    // htmlspecialchars untuk keamanan, nl2br untuk mempertahankan baris baru jika ada
                    $summary = substr($article['content'], 0, 150);
                    echo nl2br(htmlspecialchars($summary));
                    if (strlen($article['content']) > 150) {
                        echo "...";
                    }
                    ?>
                </p>
                <a href="detail_journal.php?id=<?php echo $article['id_journal']; ?>">Read More</a>
            </article>
            <?php
                    $article_count++;
                }
            } else {
                echo "<p style='text-align:center; margin: 20px;'>No journal entries found.</p>";
            }
            // --- AKHIR BLOK PHP UNTUK MENAMPILKAN ARTIKEL ---
            ?>
        </main>
        
    <div class="row-btn">
        <div class="page-btn" id="pagination">
            <?php
            // --- AWAL BLOK PHP UNTUK MEMBUAT TOMBOL PAGINASI ---
            if (!empty($articles_data)) {
                $total_articles = count($articles_data);
                // articles_per_page harus sama dengan yang digunakan saat menampilkan artikel
                $articles_per_page = 6; // Pastikan nilai ini konsisten
                $total_pages = ceil($total_articles / $articles_per_page); 

                for ($i = 1; $i <= $total_pages; $i++) {
                    // Halaman pertama akan aktif secara default
                    $active_class = ($i == 1) ? 'active' : ''; 
                    echo '<span class="page-number ' . $active_class . '" data-page="' . $i . '">' . $i . '</span>';
                }
                // Tampilkan tombol "next" jika ada lebih dari 1 halaman
                if ($total_pages > 1) {
                    echo '<span class="page-next">&#8594;</span>';
                }
            }
            // --- AKHIR BLOK PHP UNTUK MEMBUAT TOMBOL PAGINASI ---
            ?>
        </div>
    </div>

    
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
                <img src="LOOK_SEE_LOGO_1__1_-removebg-preview.png">
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

    <script>
        var MenuItems = document.getElementById("MenuItems");
        MenuItems.style.maxHeight = "0px";

        function menutoggle(){
            if(MenuItems.style.maxHeight == "0px") {
                MenuItems.style.maxHeight = "200px";
            } else {
                MenuItems.style.maxHeight = "0px";
            }
        }
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const paginationContainer = document.getElementById('pagination'); 
            const articles = document.querySelectorAll('.blog-post');
            
            function showPage(page) {
                articles.forEach((article) => {
                    if (article.dataset.page === page.toString()) {
                        article.style.display = 'block'; 
                    } else {
                        article.style.display = 'none';
                    }
                });

                const pageNumbersInContainer = paginationContainer.querySelectorAll('.page-number');
                pageNumbersInContainer.forEach((num) => {
                    num.classList.remove('active');
                });
                const currentPageButton = paginationContainer.querySelector(`.page-number[data-page="${page}"]`);
                if (currentPageButton) currentPageButton.classList.add('active');
            }

            paginationContainer.addEventListener('click', function(event) {
                const target = event.target;

                if (target.classList.contains('page-number')) {
                    const page = parseInt(target.dataset.page);
                    showPage(page);
                } else if (target.classList.contains('page-next')) {
                    const currentPageActive = paginationContainer.querySelector('.page-number.active');
                    if (currentPageActive) {
                        const currentPage = parseInt(currentPageActive.dataset.page);
                        const totalPageSpans = paginationContainer.querySelectorAll('.page-number').length;
                        if (currentPage < totalPageSpans) {
                             showPage(currentPage + 1);
                        }
                    }
                }
            });
            
            if (articles.length > 0) { 
                 showPage(1);
            }
        });
    </script>

<?php
// --- AWAL BLOK PHP UNTUK MENUTUP KONEKSI ---
// Pastikan variabel $conn ada dan merupakan objek koneksi sebelum menutup
if (isset($conn) && $conn instanceof mysqli) {
    $conn->close();
}
// --- AKHIR BLOK PHP UNTUK MENUTUP KONEKSI ---
?>
</body>
</html>