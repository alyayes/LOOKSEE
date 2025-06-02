    <?php
    session_start();
    require_once '../koneksi.php';

    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit();
    }

    $user_id = $_SESSION['user_id'];

    // Ambil data user dari database
    $query = "SELECT * FROM user WHERE user_id = ?";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc(); // <== ini yang membuat $user tersedia
    } else {
        $_SESSION['error'] = "Data pengguna tidak ditemukan.";
        header("Location: login.php");
        exit();
    }

    $stmt->close();

    $profilePicture = !empty($user['profile_picture']) ? '../uploads/' . htmlspecialchars($user['profile_picture']) : '../assets/images/default-profile.png';
    ?>

    <!--Website: wwww.codingdung.com-->
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Profile | LOOKSEE</title>
        <link rel="stylesheet" href="../assets/css/settingProfile.css">
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">

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

    </head>
    <body>
        <header>
            <div class="container">
                <div class="navbar">
                    <div class="logo">
                        <a href=""><img src="../assets/images/logoHeader.png" width="120px"></a>
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
                                    <a href="login.html">Login/SignUp</a>
                                </div>
                            </div>
                        </i>
                    </div>
                    <img src="menu.png" class="menu-icon" onclick="menutoggle()">
                </div>
            </div>
        </header>

        <!-- Potongan dalam <body> -->
        <div class="container light-style flex-grow-1 container-p-y">
            <h4 class="font-weight-bold py-3 mb-4">Account settings</h4>
            <form action="../logic/update/updateProfile.php" method="POST" enctype="multipart/form-data">
                <div class="card overflow-hidden">
                    <div class="row no-gutters row-bordered row-border-light">
                        <div class="col-md-3 pt-0">
                            <div class="list-group list-group-flush account-settings-links">
                                <!-- Tab Navigation -->
                                <a class="list-group-item list-group-item-action active" data-toggle="list" href="#account-general">General</a>
                                <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-change-password">Change password</a>
                                <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-info">Info</a>
                                <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-social-links">Social links</a>
                                <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-connections">Connections</a>
                                <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-notifications">Notifications</a>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="tab-content">
                                <!-- GENERAL -->
                                <div class="tab-pane fade active show" id="account-general">
                                    <div class="card-body media align-items-center">
                                        <img src="<?= $profilePicture ?>" alt="Profile Picture" style="
                                            width: 120px;
                                            height: 120px;
                                            object-fit: cover;
                                            border-radius: 50%;
                                            display: block;
                                        ">
                                        <div class="media-body ml-4">
                                            <label class="btn btn-outline-primary">
                                                Upload new photo
                                                <input type="file" class="account-settings-fileinput" name="profile_picture">
                                            </label>
                                            <button type="button" class="btn btn-default md-btn-flat" onclick="resetPhoto()">Reset</button>
                                            <div class="text-light small mt-1">Allowed JPG, GIF or PNG. Max size of 800K</div>
                                        </div>
                                    </div>
                                    <hr class="border-light m-0">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label class="form-label">Username</label>
                                            <input type="text" name="username" class="form-control mb-1" value="<?= htmlspecialchars($user['username']) ?>">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Name</label>
                                            <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($user['name']) ?>">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">E-mail</label>
                                            <input type="email" name="email" class="form-control mb-1" value="<?= htmlspecialchars($user['email']) ?>" readonly>
                                        </div>
                                    </div>
                                </div>

                                <!-- CHANGE PASSWORD -->
                                <div class="tab-pane fade" id="account-change-password">
                                    <div class="card-body pb-2">
                                        <div class="form-group">
                                            <label class="form-label">Current password</label>
                                            <input type="password" name="current_password" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">New password</label>
                                            <input type="password" name="new_password" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Repeat new password</label>
                                            <input type="password" name="confirm_password" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <!-- INFO -->
                                <div class="tab-pane fade" id="account-info">
                                    <div class="card-body pb-2">
                                        <div class="form-group">
                                            <label class="form-label">Bio</label>
                                            <textarea name="bio" class="form-control" rows="5"><?= htmlspecialchars($user['bio']) ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Birthday</label>
                                            <input type="date" name="birthday" class="form-control" value="<?= htmlspecialchars($user['birthday']) ?>">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Country</label>
                                            <select class="custom-select" name="country">
                                                <option <?= $user['country'] == 'Indonesia' ? 'selected' : '' ?>>Indonesia</option>
                                                <option <?= $user['country'] == 'USA' ? 'selected' : '' ?>>USA</option>
                                                <option <?= $user['country'] == 'Canada' ? 'selected' : '' ?>>Canada</option>
                                                <option <?= $user['country'] == 'Germany' ? 'selected' : '' ?>>Germany</option>
                                                <option <?= $user['country'] == 'France' ? 'selected' : '' ?>>France</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Phone</label>
                                            <input type="text" name="phone" class="form-control" value="<?= htmlspecialchars($user['phone']) ?>">
                                        </div>
                                    </div>
                                </div>

                                <!-- SOCIAL LINKS -->
                                <div class="tab-pane fade" id="account-social-links">
                                    <div class="card-body pb-2">
                                        <div class="form-group">
                                            <label class="form-label">Twitter</label>
                                            <input type="text" name="twitter" class="form-control" value="<?= htmlspecialchars($user['twitter']) ?>">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Facebook</label>
                                            <input type="text" name="facebook" class="form-control" value="<?= htmlspecialchars($user['facebook']) ?>">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Instagram</label>
                                            <input type="text" name="instagram" class="form-control" value="<?= htmlspecialchars($user['instagram']) ?>">
                                        </div>
                                    </div>
                                </div>

                                <!-- CONNECTIONS & NOTIFICATIONS (jika ingin disimpan juga bisa tambahkan `name`) -->
                                <div class="tab-pane fade" id="account-connections">
                                <div class="card-body">
                                    <button type="button" class="btn btn-twitter">Connect to
                                        <strong>Twitter</strong></button>
                                </div>
                                <hr class="border-light m-0">
                                <div class="card-body">
                                    <h5 class="mb-2">
                                        <a href="javascript:void(0)" class="float-right text-muted text-tiny"><i
                                                class="ion ion-md-close"></i> Remove</a>
                                        <i class="ion ion-logo-google text-google"></i>
                                        You are connected to Google:
                                    </h5>
                                    <a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                        data-cfemail="f9979498818e9c9595b994989095d79a9694">[email&#160;protected]</a>
                                </div>
                                <hr class="border-light m-0">
                                <div class="card-body">
                                    <button type="button" class="btn btn-facebook">Connect to
                                        <strong>Facebook</strong></button>
                                </div>
                                <hr class="border-light m-0">
                                <div class="card-body">
                                    <button type="button" class="btn btn-instagram">Connect to
                                        <strong>Instagram</strong></button>
                                </div>
                            </div>


                                <div class="tab-pane fade" id="account-notifications">
                                <div class="card-body pb-2">
                                    <h6 class="mb-4">Activity</h6>
                                    <div class="form-group">
                                        <label class="switcher">
                                            <input type="checkbox" class="switcher-input" checked>
                                            <span class="switcher-indicator">
                                                <span class="switcher-yes"></span>
                                                <span class="switcher-no"></span>
                                            </span>
                                            <span class="switcher-label">Email me when someone comments on my article</span>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="switcher">
                                            <input type="checkbox" class="switcher-input" checked>
                                            <span class="switcher-indicator">
                                                <span class="switcher-yes"></span>
                                                <span class="switcher-no"></span>
                                            </span>
                                            <span class="switcher-label">Email me when someone answers on my forum
                                                thread</span>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="switcher">
                                            <input type="checkbox" class="switcher-input">
                                            <span class="switcher-indicator">
                                                <span class="switcher-yes"></span>
                                                <span class="switcher-no"></span>
                                            </span>
                                            <span class="switcher-label">Email me when someone follows me</span>
                                        </label>
                                    </div>
                                </div>
                                <hr class="border-light m-0">
                                <div class="card-body pb-2">
                                    <h6 class="mb-4">Application</h6>
                                    <div class="form-group">
                                        <label class="switcher">
                                            <input type="checkbox" class="switcher-input" checked>
                                            <span class="switcher-indicator">
                                                <span class="switcher-yes"></span>
                                                <span class="switcher-no"></span>
                                            </span>
                                            <span class="switcher-label">News and announcements</span>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="switcher">
                                            <input type="checkbox" class="switcher-input">
                                            <span class="switcher-indicator">
                                                <span class="switcher-yes"></span>
                                                <span class="switcher-no"></span>
                                            </span>
                                            <span class="switcher-label">Weekly product updates</span>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="switcher">
                                            <input type="checkbox" class="switcher-input" checked>
                                            <span class="switcher-indicator">
                                                <span class="switcher-yes"></span>
                                                <span class="switcher-no"></span>
                                            </span>
                                            <span class="switcher-label">Weekly blog digest</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                                
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit -->
                <div class="text-right mt-3">
                    <button type="submit" class="btn btn-primary">Save changes</button>&nbsp;
                    <button type="button" class="btn btn-default" onclick="window.location.reload()">Cancel</button>
                </div>
            </form>
        </div>


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

        <!---js for toggle menu--->
        <script>
            var MenuItems = document.getElementById("MenuItems");

            MenuItems.style.maxHeight = "0px";

            function menutoggle(){
                if(MenuItems.style.maxHeight == "0px")
                    {
                        MenuItems.style.maxHeight = "200px";
                    }
                else
                    {
                        MenuItems.style.maxHeight = "0px"
                    }
            }
        </script>

        <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
        <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript">

        </script>

    </body>

    </html>