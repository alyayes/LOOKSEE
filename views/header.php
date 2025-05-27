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
                                <a href="../pages/login.php">Login/SignUp</a>
                            </div>
                        </div>
                     </i>
                </div>
                <img src="../assets/images/menuHeader.png" class="menu-icon" onclick="menutoggle()">
            </div>
        </div>
    </header>