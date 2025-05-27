<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Raw LOOKSEE</title>
    <link rel="stylesheet" href="css/to2.css">

  
    <!--font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=favorite" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" 
    integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF@nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <!--sidebar-->
   

    <!-- box icon -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
</head>
<body>
    <header>
        <a href="home.html" class="logo"><img src="logo.jpg" href="1.html">LOOKSEE</a>

        <ul class="navmenu">
            <li><a href="home.html">Home</a></li>
            <li><a href="mood.html">Find Your Style!</a></li>
            <!--dropdown categories-->
            <li class="dropdown">
                <a class="dropbtn">Categories</a>
                <div class="dropdown-content">
                    <div class="dropdown-submenu">
                        <a href="#" class="submenu-title">Woman</a>
                        <a href="topWoman.html">Top</a>
                        <a href="#">Dress</a>
                        <a href="#">Sweater</a>
                        <a href="#">Pants</a>
                        <a href="#">Outer</a>
                    </div>
                    <div class="dropdown-submenu">
                        <a href="#" class="submenu-title">Man</a>
                        <a href="#">Top</a>
                        <a href="#">Pants</a>
                        <a href="#">Jackets</a>
                    </div>
                </div>
                <li><a href="LaPe/trendsNow.html">Trends Now</a></li>
                <li><a href="to.html"><span>Today's Outfit</span></a></li>
        </ul>

        <div class="nav-icon">
            <a href="#"><i class='bx bx-search'></i></a>
            <a href="#"><i class='bx bx-heart'></i></a>
            <a href="login.html"><i class='bx bx-user'></i></a>
        </div>
    </header>

    <!-- Sidebar -->
    <div class="w3-sidebar w3-light-grey w3-bar-block" style="width:4%"> <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <a href="to1.html" class="w3-bar-item w3-button"><i class='bx bx-bell'></i></a>
        <a href="to2.html" class="w3-bar-item w3-button"><i class='bx bx-plus-circle'></i></a>
        <a href="to3.html" class="w3-bar-item w3-button"><i class='bx bxs-videos'></i></a>
    </div>
    
    <!-- Page Content -->
   

    

    <!--TODAYS OUTFIT-->
    <section class="to">
        <div style="margin-left:4%">
            <div class="container">
                <div class="card">
                  <h3>Upload Files</h3>
                  <div class="drop_box">
                    <header>
                      <h4>Select photo here</h4>
                    </header>
                    <input type="file" hidden accept=".jpg,.jpeg" id="fileID" style="display:none;">
                    <button class="btn">Choose File</button>
                  </div>
                </div>
              </div>
        </div>

    </section>

   
<!--Footer-->
    <footer id="footer">
        			
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Service</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Online Help</a></li>
								<li><a href="#">Contact Us</a></li>
								<li><a href="#">Order Status</a></li>
								<li><a href="#">Change Location</a></li>
								<li><a href="#">FAQ’s</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Quick Shop</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Tops</a></li>
								<li><a href="#">Outer</a></li>
								<li><a href="#">Women</a></li>
								<li><a href="#">Sweater</a></li>
								<li><a href="#">Men</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Policies</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Terms of Use</a></li>
								<li><a href="#">Privecy Policy</a></li>
								<li><a href="#">Refund Policy</a></li>
								<li><a href="#">Billing System</a></li>
								<li><a href="#">Ticket System</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>About Shopper</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Company Information</a></li>
								<li><a href="#">Careers</a></li>
								<li><a href="#">Store Location</a></li>
								<li><a href="#">Affillate Program</a></li>
								<li><a href="#">Copyright</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2024 LOOKSEE Inc. All rights reserved.</p>
					<p class="pull-right"><span><a target="_blank" href="http://www.themeum.com"></a></span></p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	

  

    
      <!-- https://bytewebster.com/ -->
      <!-- https://bytewebster.com/ -->
      <!-- https://bytewebster.com/ -->
        <script src="./assets/js/script.js"></script>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script src="1.js"></script>
</body>
</html>