<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="assets/images/favicon-32x32.png" type="image/png"/>

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
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
<link href="assets/css/app.css" rel="stylesheet">
<link href="assets/css/post.css" rel="stylesheet">
<link href="assets/css/icons.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<!-- Theme Style CSS -->
<link rel="stylesheet" href="assets/css/dark-theme.css"/>
<link rel="stylesheet" href="assets/css/semi-dark.css"/>
<link rel="stylesheet" href="assets/css/header-colors.css"/>
<!--JS-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<title>USERS</title>
</head>

<body>
    
  <div class="grid">
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
            <a href="index.html">
              <i class='bx bx-home-alt'></i>
              <div class="menu-title">Dashboard</div>
            </a>
            <a href="analytics.html">
              <i class='bx bxs-bar-chart-alt-2'></i>
              <div class="menu-title">Analytics</div>
            </a>
            <a href="product.html">
              <i class='bx bxs-shopping-bags'></i>
              <div class="menu-title">Products</div>
            </a>
            <a href="user.html">
              <i class='bx bxs-group' ></i>
              <div class="menu-title">Users</div>
            </a>
            <a href="keluhan.html">
              <i class='bx bx-note'></i>
              <div class="menu-title">Complaint page</div>
            </a>
            <a href="userpic.html">
              <i class='bx bxs-t-shirt'></i>
              <div class="menu-title">User Post</div>
            </a>
            <a href="activitylog.html">
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
                  <a class="nav-link" href="avascript:;"><i class='bx bx-search'></i>
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
                    <a href="javascript:;">
                      <div class="msg-header">
                        <p class="msg-header-title">My Cart</p>
                        <p class="msg-header-badge">10 Items</p>
                      </div>
                    </a>
                    <div class="header-message-list">
                      <a class="dropdown-item" href="javascript:;">
                        <div class="d-flex align-items-center gap-3">
                          <div class="position-relative">
                            <div class="cart-product rounded-circle bg-light">
                              <img src="assets/images/products/11.png" class="" alt="product image">
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <h6 class="cart-product-title mb-0">Men White T-Shirt</h6>
                            <p class="cart-product-price mb-0">1 X $29.00</p>
                          </div>
                          <div class="">
                            <p class="cart-price mb-0">$250</p>
                          </div>
                          <div class="cart-product-cancel"><i class="bx bx-x"></i>
                          </div>
                        </div>
                      </a>
                      <a class="dropdown-item" href="javascript:;">
                        <div class="d-flex align-items-center gap-3">
                          <div class="position-relative">
                            <div class="cart-product rounded-circle bg-light">
                              <img src="assets/images/products/02.png" class="" alt="product image">
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <h6 class="cart-product-title mb-0">Men White T-Shirt</h6>
                            <p class="cart-product-price mb-0">1 X $29.00</p>
                          </div>
                          <div class="">
                            <p class="cart-price mb-0">$250</p>
                          </div>
                          <div class="cart-product-cancel"><i class="bx bx-x"></i>
                          </div>
                        </div>
                      </a>
                      <a class="dropdown-item" href="javascript:;">
                        <div class="d-flex align-items-center gap-3">
                          <div class="position-relative">
                            <div class="cart-product rounded-circle bg-light">
                              <img src="assets/images/products/03.png" class="" alt="product image">
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <h6 class="cart-product-title mb-0">Men White T-Shirt</h6>
                            <p class="cart-product-price mb-0">1 X $29.00</p>
                          </div>
                          <div class="">
                            <p class="cart-price mb-0">$250</p>
                          </div>
                          <div class="cart-product-cancel"><i class="bx bx-x"></i>
                          </div>
                        </div>
                      </a>
                      <a class="dropdown-item" href="javascript:;">
                        <div class="d-flex align-items-center gap-3">
                          <div class="position-relative">
                            <div class="cart-product rounded-circle bg-light">
                              <img src="assets/images/products/04.png" class="" alt="product image">
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <h6 class="cart-product-title mb-0">Men White T-Shirt</h6>
                            <p class="cart-product-price mb-0">1 X $29.00</p>
                          </div>
                          <div class="">
                            <p class="cart-price mb-0">$250</p>
                          </div>
                          <div class="cart-product-cancel"><i class="bx bx-x"></i>
                          </div>
                        </div>
                      </a>
                      <a class="dropdown-item" href="javascript:;">
                        <div class="d-flex align-items-center gap-3">
                          <div class="position-relative">
                            <div class="cart-product rounded-circle bg-light">
                              <img src="assets/images/products/05.png" class="" alt="product image">
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <h6 class="cart-product-title mb-0">Men White T-Shirt</h6>
                            <p class="cart-product-price mb-0">1 X $29.00</p>
                          </div>
                          <div class="">
                            <p class="cart-price mb-0">$250</p>
                          </div>
                          <div class="cart-product-cancel"><i class="bx bx-x"></i>
                          </div>
                        </div>
                      </a>
                      <a class="dropdown-item" href="javascript:;">
                        <div class="d-flex align-items-center gap-3">
                          <div class="position-relative">
                            <div class="cart-product rounded-circle bg-light">
                              <img src="assets/images/products/06.png" class="" alt="product image">
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <h6 class="cart-product-title mb-0">Men White T-Shirt</h6>
                            <p class="cart-product-price mb-0">1 X $29.00</p>
                          </div>
                          <div class="">
                            <p class="cart-price mb-0">$250</p>
                          </div>
                          <div class="cart-product-cancel"><i class="bx bx-x"></i>
                          </div>
                        </div>
                      </a>
                      <a class="dropdown-item" href="javascript:;">
                        <div class="d-flex align-items-center gap-3">
                          <div class="position-relative">
                            <div class="cart-product rounded-circle bg-light">
                              <img src="assets/images/products/07.png" class="" alt="product image">
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <h6 class="cart-product-title mb-0">Men White T-Shirt</h6>
                            <p class="cart-product-price mb-0">1 X $29.00</p>
                          </div>
                          <div class="">
                            <p class="cart-price mb-0">$250</p>
                          </div>
                          <div class="cart-product-cancel"><i class="bx bx-x"></i>
                          </div>
                        </div>
                      </a>
                      <a class="dropdown-item" href="javascript:;">
                        <div class="d-flex align-items-center gap-3">
                          <div class="position-relative">
                            <div class="cart-product rounded-circle bg-light">
                              <img src="assets/images/products/08.png" class="" alt="product image">
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <h6 class="cart-product-title mb-0">Men White T-Shirt</h6>
                            <p class="cart-product-price mb-0">1 X $29.00</p>
                          </div>
                          <div class="">
                            <p class="cart-price mb-0">$250</p>
                          </div>
                          <div class="cart-product-cancel"><i class="bx bx-x"></i>
                          </div>
                        </div>
                      </a>
                      <a class="dropdown-item" href="javascript:;">
                        <div class="d-flex align-items-center gap-3">
                          <div class="position-relative">
                            <div class="cart-product rounded-circle bg-light">
                              <img src="assets/images/products/09.png" class="" alt="product image">
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <h6 class="cart-product-title mb-0">Men White T-Shirt</h6>
                            <p class="cart-product-price mb-0">1 X $29.00</p>
                          </div>
                          <div class="">
                            <p class="cart-price mb-0">$250</p>
                          </div>
                          <div class="cart-product-cancel"><i class="bx bx-x"></i>
                          </div>
                        </div>
                      </a>
                    </div>
                    <a href="javascript:;">
                      <div class="text-center msg-footer">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                          <h5 class="mb-0">Total</h5>
                          <h5 class="mb-0 ms-auto">$489.00</h5>
                        </div>
                        <button class="btn btn-primary w-100">Checkout</button>
                      </div>
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
                <li><a class="dropdown-item d-flex align-items-center" href="javascript:;"><i class="bx bx-cog fs-5"></i><span>Settings</span></a>
                </li>
                <li><a class="dropdown-item d-flex align-items-center" href="javascript:;"><i class='bx bxs-grid'></i><span>Activity Log</span></a>
                </li>
                              <li><a class="dropdown-item d-flex align-items-center" href="message.html"><i class='bx bx-message-dots'></i></i><span>Message</span></a>
                </li>
                  <div class="dropdown-divider mb-0"></div>
                </li>
                <li><a class="dropdown-item d-flex align-items-center" href="javascript:;"><i class="bx bx-log-out-circle"></i><span>Logout</span></a>
                </li>
              </ul>
            </div>
          </nav>
        </div>
        <!--end dropdown-->
      </header>
      <!--end header -->
      <style>
  * {
    box-sizing: border-box;
  }

  #myInput {
    background-image: url('/css/searchicon.png');
    background-position: 10px 10px;
    background-repeat: no-repeat;
    width: 45%;
    font-size: 16px;
    padding: 12px 20px 12px 40px;
    border: 1px solid #ddd;
    margin-bottom: 12px;
    margin-top: 20px;
  }

  #myTable {
    border-collapse: collapse;
    width: 100%;
    border: 1px solid #ddd;
    font-size: 18px;
    margin-bottom: 50px; /* Berikan jarak bawah */
  }

  #myTable th,
  #myTable td {
    text-align: left;
    padding: 12px;
    border: 1px solid #ddd;
  }

  #myTable tr {
    border-bottom: 1px solid #ddd;
  }

  #myTable tr.header,
  #myTable tr:hover {
    background-color: rgb(255, 234, 247);
  }
</style>

      <div class="pospic">
        <section>
          <button type="button" class="btn btn-primary" onclick="window.location.href='adduser.html';">
            <i class='bx bx-plus'></i> Add Post
          </button>
        </section>
        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names..." title="Type in a name" />
        <table id="myTable">
          <tr class="header">
            <th style="width:15%;">Picture Post</th>
            <th style="width:10%;">User</th>
			<th style="width:15%;">Posting Date</th>
            <th style="width:20%;">Mood</th>
            <th style="width:20%;">Action</th>
          </tr>
          <tr>
            <td><img src="assets/pics to/to6.jpg" class="pospic" alt="Younjung" width="50" /></td>
            <td>@inayoy</td>
            <td>22 July 2024</td>
			<td><span class="tag happy">happy</span></td>
            <td>
              <button type="button" class="btn btn-success">
                <i class="bi bi-pencil-square"></i>
              </button>
              <button type="button" class="btn btn-danger" onclick="showPopup()">
                <i class="bi bi-trash"></i>
              </button>
              <script>
                function showPopup() {
                  Swal.fire({
                    title: "Do you want to delete this post?",
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: "Yes",
                    denyButtonText: `No`,
                  }).then((result) => {
                    if (result.isConfirmed) {
                      Swal.fire("Deleting the post was successful!", "", "Deleting the product was successful!");
                    } else if (result.isDenied) {
                      Swal.fire("Delete failed post", "", "info");
                    }
                  });
                }
              </script>
              <button type="button" class="btn btn-primary" onclick="window.location.href='detail3.html';">
                <i class="bi bi-eye"></i>
              </button>
            </td>
          </tr>
          <tr>
            <td><img src="assets/pics to/to5.jpg" class="pospic" alt="Younjung" width="50" /></td>
            <td>@alyoy</td>
            <td>13 Sept 2024</td>
			<td><span class="tag happy">happy</span></td>
            <td>
              <button type="button" class="btn btn-success">
                <i class="bi bi-pencil-square"></i>
              </button>
              <button type="button" class="btn btn-danger" onclick="showPopup()">
                <i class="bi bi-trash"></i>
              </button>
              <script>
                function showPopup() {
                  Swal.fire({
                    title: "Do you want to delete this post?",
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: "Yes",
                    denyButtonText: `No`,
                  }).then((result) => {
                    if (result.isConfirmed) {
                      Swal.fire("Deleting the post was successful!", "", "Deleting the product was successful!");
                    } else if (result.isDenied) {
                      Swal.fire("Delete failed post", "", "info");
                    }
                  });
                }
              </script>
              <button type="button" class="btn btn-primary" onclick="window.location.href='detail3.html';">
                <i class="bi bi-eye"></i>
              </button>
            </td>
          </tr>
		  <tr>
            <td><img src="assets/pics to/to4.jpg" class="pospic" alt="Younjung" width="50" /></td>
            <td>@twalrose</td>
            <td>25 Sept 2024</td>
			<td><span class="tag very-happy">very happy</span></td>
            <td>
              <button type="button" class="btn btn-success">
                <i class="bi bi-pencil-square"></i>
              </button>
              <button type="button" class="btn btn-danger" onclick="showPopup()">
                <i class="bi bi-trash"></i>
              </button>
              <script>
                function showPopup() {
                  Swal.fire({
                    title: "Do you want to delete this post?",
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: "Yes",
                    denyButtonText: `No`,
                  }).then((result) => {
                    if (result.isConfirmed) {
                      Swal.fire("Deleting the post was successful!", "", "Deleting the product was successful!");
                    } else if (result.isDenied) {
                      Swal.fire("Delete failed post", "", "info");
                    }
                  });
                }
              </script>
              <button type="button" class="btn btn-primary" onclick="window.location.href='twalrose.html';">
                <i class="bi bi-eye"></i>
              </button>
            </td>
          </tr>
		  <tr>
            <td><img src="assets/pics to/to3.jpg" class="pospic" alt="Younjung" width="50" /></td>
            <td>@dalfoy</td>
            <td>4 Oct 2024</td>
			<td><span class="tag very-sad">very sad</span></td>
            <td>
              <button type="button" class="btn btn-success">
                <i class="bi bi-pencil-square"></i>
              </button>
              <button type="button" class="btn btn-danger" onclick="showPopup()">
                <i class="bi bi-trash"></i>
              </button>
              <script>
                function showPopup() {
                  Swal.fire({
                    title: "Do you want to delete this post?",
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: "Yes",
                    denyButtonText: `No`,
                  }).then((result) => {
                    if (result.isConfirmed) {
                      Swal.fire("Deleting the post was successful!", "", "Deleting the product was successful!");
                    } else if (result.isDenied) {
                      Swal.fire("Delete failed post", "", "info");
                    }
                  });
                }
              </script>
              <button type="button" class="btn btn-primary" onclick="window.location.href='detail3.html';">
                <i class="bi bi-eye"></i>
              </button>
            </td>
          </tr>
		  <tr>
            <td><img src="assets/pics to/to2.jpg" class="pospic" alt="Younjung" width="50" /></td>
            <td>@sanha</td>
            <td>29 Oct 2024</td>
			<td><span class="tag neutral">neutral</span></td>
            <td>
              <button type="button" class="btn btn-success">
                <i class="bi bi-pencil-square"></i>
              </button>
              <button type="button" class="btn btn-danger" onclick="showPopup()">
                <i class="bi bi-trash"></i>
              </button>
              <script>
                function showPopup() {
                  Swal.fire({
                    title: "Do you want to delete this post?",
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: "Yes",
                    denyButtonText: `No`,
                  }).then((result) => {
                    if (result.isConfirmed) {
                      Swal.fire("Deleting the post was successful!", "", "Deleting the product was successful!");
                    } else if (result.isDenied) {
                      Swal.fire("Delete failed post", "", "info");
                    }
                  });
                }
              </script>
              <button type="button" class="btn btn-primary" onclick="window.location.href='detail3.html';">
                <i class="bi bi-eye"></i>
              </button>
            </td>
          </tr>
		  <tr>
            <td><img src="assets/pics to/to1.jpg" class="pospic" alt="Younjung" width="50" /></td>
            <td>@haejun</td>
            <td>8 Nov 2024</td>
			<td><span class="tag sad">sad</span></td>
            <td>
              <button type="button" class="btn btn-success">
                <i class="bi bi-pencil-square"></i>
              </button>
              <button type="button" class="btn btn-danger" onclick="showPopup()">
                <i class="bi bi-trash"></i>
              </button>
              <script>
                function showPopup() {
                  Swal.fire({
                    title: "Do you want to delete this post?",
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: "Yes",
                    denyButtonText: `No`,
                  }).then((result) => {
                    if (result.isConfirmed) {
                      Swal.fire("Deleting the post was successful!", "", "Deleting the product was successful!");
                    } else if (result.isDenied) {
                      Swal.fire("Delete failed post", "", "info");
                    }
                  });
                }
              </script>
              <button type="button" class="btn btn-primary" onclick="window.location.href='detail3.html';">
                <i class="bi bi-eye"></i>
              </button>
            </td>
          </tr>
        </table>
      </div>
      
      <script>
        function myFunction() {
          var input, filter, table, tr, td, i, j, txtValue;
          input = document.getElementById("myInput");
          filter = input.value.toUpperCase();
          table = document.getElementById("myTable");
          tr = table.getElementsByTagName("tr");
      
          for (i = 1; i < tr.length; i++) {
            tr[i].style.display = "none"; // Hide all rows by default
            td = tr[i].getElementsByTagName("td");
            for (j = 0; j < td.length; j++) {
              if (td[j]) {
                txtValue = td[j].textContent || td[j].innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                  tr[i].style.display = ""; // Show row if match found
                  break;
                }
              }
            }
          }
        }
      </script>
      
        
<!--Footer-->
<footer class="page-footer">
	<p class="mb-0">Copyright &copy 2024 LOOKSEE. All Right Reserved.</p>
</footer>

<!-- Bootstrap JS -->
<script src="assets/js/bootstrap.bundle.min.js"></script>
<!--plugins-->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/simplebar.min.js"></script>
<script src="assets/js/metisMenu.min.js"></script>
<script src="assets/js/perfect-scrollbar.js"></script>
<script src="assets/js/jquery-jvectormap-2.0.2.min.js"></script>
  <script src="assets/js/jquery-jvectormap-world-mill-en.js"></script>
<script src="assets/js/chart.js"></script>
<script src="assets/js/index.js"></script>
<!--app JS-->
<script src="assets/js/app.js"></script>
<script>
  new PerfectScrollbar(".app-container")
</script>

</body>
</html>
