<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--favicon-->
	<link rel="icon" href="assets/images/favicon-32x32.png" type="image/png"/>
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
	
	<!--plugins-->
	<link href="assets/css/jquery-jvectormap-2.0.2.css" rel="stylesheet"/>
	<link href="assets/css/simplebar.css" rel="stylesheet" />
	<link href="assets/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="assets/css/metisMenu.min.css" rel="stylesheet"/>
	<!-- loader-->
	<link href="assets/css/pace.min.css" rel="stylesheet"/>
	<script src="assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/bootstrap-extended.css" rel="stylesheet">
	<link href="assets/css/app.css" rel="stylesheet">
	<link href="assets/css/icons.css" rel="stylesheet">

	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="assets/css/dark-theme.css"/>
	<link rel="stylesheet" href="assets/css/semi-dark.css"/>
	<link rel="stylesheet" href="assets/css/header-colors.css"/>

	<title>ADMIN</title>

</head>
<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<img src="assets/images/logo.png" class="logo-icon" alt="logo icon">
				</div>
				<div>
					<h4 class="logo-text">LOOKSEE</h4>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
				</div>
			 </div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
				<li>
					<a href="index.php">
						<i class='bx bx-home-alt'></i>
						<div class="menu-title">Dashboard</div>
					</a>
					<a href="index.php?page=analytics">
						<i class='bx bxs-bar-chart-alt-2'></i>
						<div class="menu-title">Analytics</div>
					</a>
					<a href="index.php?page=product">
						<i class='bx bxs-shopping-bags'></i>
						<div class="menu-title">Products</div>
					</a>
					<a href="index.php?page=user">
						<i class='bx bxs-group' ></i>
						<div class="menu-title">Users</div>
					</a>
					<a href="index.php?page=stylejournal">
						<i class='bx bx-note'></i>
						<div class="menu-title">Style Journal</div>
					</a>
					<a href="index.php?page=userpic">
						<i class='bx bxs-t-shirt'></i>
						<div class="menu-title">Today's Outfit</div>
					</a>
					<a href="index.php?page=activitylog">
						<i class='bx bxs-grid'></i>
						<div class="menu-title">Activity User</div>
					</a>
				</li>	
			</ul>
			<!--end navigation-->
		</div>
		<!--end sidebar wrapper -->
		<!--start header -->
		<header>
			<div class="topbar d-flex align-items-center">
				<nav class="navbar navbar-expand gap-3">
					<div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
					</div>

					 

					  <div class="top-menu ms-auto">
						<ul class="navbar-nav align-items-center gap-1">
							<li class="nav-item mobile-search-icon d-flex d-lg-none" data-bs-toggle="modal" data-bs-target="#SearchModal">
								<a class="nav-link" href="javascript:;"><i class='bx bx-search'></i>
								</a>
							</li>
							<li class="nav-item dropdown dropdown-laungauge d-none d-sm-flex">
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="avascript:;" data-bs-toggle="dropdown"><img src="assets/flags/4x3/idn.svg" width="22" alt="">
								</a>
								<ul class="dropdown-menu dropdown-menu-end">
									<li><a class="dropdown-item d-flex align-items-center py-2" href="assets/flags/4x3/idn.svg"><img src="assets/flags/4x3/idn.svg" width="20" alt=""><span class="ms-2">Indonesia</span></a>
									</li>
									<li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img src="assets/images/county/01.png" width="20" alt=""><span class="ms-2">English</span></a>
									</li>
									<li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img src="assets/images/county/02.png" width="20" alt=""><span class="ms-2">Catalan</span></a>
									</li>
									<li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img src="assets/images/county/03.png" width="20" alt=""><span class="ms-2">French</span></a>
									</li>
									<li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img src="assets/images/county/04.png" width="20" alt=""><span class="ms-2">Belize</span></a>
									</li>
									<li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img src="assets/images/county/05.png" width="20" alt=""><span class="ms-2">Colombia</span></a>
									</li>
									<li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img src="assets/images/county/06.png" width="20" alt=""><span class="ms-2">Spanish</span></a>
									</li>
									<li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img src="assets/images/county/07.png" width="20" alt=""><span class="ms-2">Georgian</span></a>
									</li>
									<li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img src="assets/images/county/08.png" width="20" alt=""><span class="ms-2">Hindi</span></a>
									</li>
								</ul>
							</li>

							<!--dark mode-->
							<li class="nav-item dark-mode d-none d-sm-flex">
								<a class="nav-link dark-mode-icon" href="javascript:;"><i class='bx bx-moon'></i>
								</a>
							</li>

							<!--dropdown menu-->
								<div class="dropdown-menu dropdown-menu-end p-0">
									<div class="app-container p-2 my-2">
									</div>
								</div>
							
							<li class="nav-item dropdown dropdown-large">
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" data-bs-toggle="dropdown"><span class="alert-count">8</span>
									<i class='bx bx-bell'></i>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<a href="javascript:;">
										<div class="msg-header">
											<p class="msg-header-title">Notifications</p>
											<p class="msg-header-badge">8 New</p>
										</div>
									</a>
									<div class="header-notifications-list">
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="assets/images/sanha.jpg" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Sanha <span class="msg-time float-end">5 sec
												ago</span></h6>
													<p class="msg-info">Is this product still available?</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-danger text-danger">dc
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">New like! <span class="msg-time float-end">2 min
												ago</span></h6>
													<p class="msg-info">You have recived new like</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="assets/images/imsol.jpg" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Imsol<span class="msg-time float-end">14
												sec ago</span></h6>
													<p class="msg-info">Many desktop publishing packages</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-success text-success">
													<img src="assets/images/app/outlook.png" width="25" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Account Created<span class="msg-time float-end">28 min
												ago</span></h6>
													<p class="msg-info">Successfully created new email</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-info text-info">Ss
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">New Product Approved <span
												class="msg-time float-end">2 hrs ago</span></h6>
													<p class="msg-info">Your new product has approved</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="assets/images/somin.jpg" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Somin<span class="msg-time float-end">15
												min ago</span></h6>
													<p class="msg-info">Making this the first true generator</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-primary">
													<img src="assets/images/app/github.png" width="25" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">New 24 authors<span class="msg-time float-end">1 day
												ago</span></h6>
													<p class="msg-info">24 new authors joined last week</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="assets/images/yijin.jpg" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Yijin<span class="msg-time float-end">6 hrs
												ago</span></h6>
													<p class="msg-info">It was popularised in the 1990s</p>
												</div>
											</div>
										</a>
									</div>
									<a href="javascript:;">
										<div class="text-center msg-footer">
											<button class="btn btn-primary w-100">View All Notifications</button>
										</div>
									</a>
								</div>
							</li>
							
							
							<li class="nav-item dropdown dropdown-large">
								
								<div class="dropdown-menu dropdown-menu-end">
									
										<div class="msg-header">
											<p class="msg-header-title">My Cart</p>
										</div>
										<h1>200 USER</h1>
										<h1>ONLINE</h1>
									
									<div class="header-message-list">
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center gap-3">
												<div class="position-relative">
															</a>
								</div>
							</li>
						</ul>
					</div>
					<div class="user-box dropdown px-3">
						<a class="d-flex align-items-center nav-link dropdown-toggle gap-3 dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							<img src="assets/images/aya.jpg" class="user-img" alt="user avatar">
							<div class="user-info"></div>
						</a>
						<ul class="dropdown-menu dropdown-menu-end">
							<li><a class="dropdown-item d-flex align-items-center" href="user-profile.html"><i class="bx bx-user fs-5"></i><span>Profile</span></a>
							</li>
                            <li><a class="dropdown-item d-flex align-items-center" href="message.html"><i class='bx bx-message-dots'></i></i><span>Message</span></a>
							</li>
								<div class="dropdown-divider mb-0"></div>
							</li>
							<li><a class="dropdown-item d-flex align-items-center" href= "pages/login.php"><i class="bx bx-log-out-circle"></i><span>Logout</span></a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
			<!--end dropdown-->
		</header>
		<!--end header -->
	</div>