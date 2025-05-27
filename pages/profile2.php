    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        
header {
    position: sticky;
    z-index: 100;
    top: 0;
    background-color: white;
    
}
.navbar {
    display: flex;
    align-items: center;
    padding: 20px;
    z-index: 50;
}
.logo {
    margin-left: 5%;
    margin-bottom: -3%;
    margin-top: -15px;
}
.logo img {
    max-width: 65%;
    margin-top: -17%;
}
nav {
    flex: 1;
    text-align: right;
}
nav ul {
    display: inline-block;
    list-style-type: none;
}
nav ul li {
    display: inline-block;
    margin-right: 25px;
}
nav ul li a {
    color: black;
}
nav ul li a:hover, nav ul li a.active {
    color: rgb(250, 156, 211);
} 

.nav-icon{
    display: flex;
    align-items: center;
}
.nav-icon i{
    margin-right: 20px;
    color: #2c2c2c;
    font-size: 25px;
    font-weight:400;
    transition: all .42s ease;
}
.nav-icon i:hover{
    transform: scale(1.1);
    color: rgb(250, 156, 211);
}
.dropdown {
    position: relative;
}
.dropdown:hover .dropdown-content {
    display: block;
}
.dropdown-content .submenu-title {
    color: black;
    font-size: 15px;
}
.dropdown-content {
    display: none;
    position: absolute;
    text-align: center;
    top: 100%;
    left: 0;
    background-color: white;
    padding: 10px;
    border-radius: 5px;
    box-shadow: 0px 4px 8px gray (0, 0, 0, 0.2);
    z-index: 100;
}
.dropdown-profile {
    display: none;
    position: absolute;
    top: 10px;
    left: 0;
    background-color: white;
    padding: 10px;
    border-radius: 10px;
    box-shadow: 0px 4px 8px gray(0, 0, 0, 0.2);
}
.dropdown-content .dropdown-profile-submenu {
    display: flex;
    flex-direction: column;
    gap: 5px; 
}
.dropdown-content .submenu-title {
    color: black;
    font-size: 15px;
}
.dropdown-product-submenu {
    color: black;
    font-size: 15px;
}
.dropdown-content a {
    color: black;
    padding: 5px 0;
    transition: 0.3s;
}
.dropdown-profile a {
    color: black;
    padding: 5px;
    margin-between-text: 0;
    transition: 0.3s;
    font-size: 15px;
}
.dropdown-content a:hover {
    color: rgb(250, 156, 211);
}
.dropdown-profile a:hover {
    color: rgb(250, 156, 211);
}
.dropdown:hover .dropdown-content {
    display: block;
}
.dropdown:hover .dropdown-profile {
    display: block;
}

        body {
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
            font-family: 'Jost', sans-serif;

        }


        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #fff;
            padding: 10px 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .navbar .logo {
            font-size: 24px;
            font-weight: bold;
            color: #ff89a1;
        }

        .navbar nav a {
            margin: 0 10px;
            text-decoration: none;
            color: #333;
            font-size: 14px;
        }

        .navbar .icons {
            display: flex;
            align-items: center;
        }

        .navbar .icons i {
            margin-left: 15px;
            font-size: 18px;
            color: #333;
            position: relative;
        }

        .navbar .icons .notification {
            background-color: #ff89a1;
            color: #fff;
            font-size: 12px;
            border-radius: 50%;
            padding: 3px 5px;
            position: absolute;
            top: -5px;
            right: -10px;
        }

        .profile-header {
            text-align: center;
            background-color: #ffd3e0;
            padding: 40px 20px;
        }

        .profile-header .profile-picture {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 4px solid #fff;
            overflow: hidden;
            margin: 0 auto;
        }

        .profile-header .profile-picture img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .profile-header h1 {
            font-size: 24px;
            color: #333;
            margin: 10px 0 5px;
        }

        .profile-header p {
            font-size: 14px;
            color: #777;
        }

        .edit-profile {
            margin-top: 10px;
            display: inline-block;
            padding: 8px 16px;
            font-size: 14px;
            color: #333;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
            cursor: pointer;
        }
        .edit-profile a{
            color: black;
            text-decoration: none;

        }

        .box {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 25px;
        }

        .box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 10px;
        }

        .tabs {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .tabs .tab {
            flex: 1;
            text-align: center;
            padding: 15px;
            font-weight: bold;
            cursor: pointer;
            border-bottom: 3px solid transparent;
            background-color: #fff;
        }

        .tabs .tab.active {
            border-bottom: 3px solid #ff89a1;
            color: #ff89a1;
        }

        .content .tabs .tab {
            flex: 1;
            text-align: center;
            padding: 15px;
            font-weight: bold;
            cursor: pointer;
            border-bottom: 3px solid transparent;
            background-color: #fff;
        }

        .content .tabs .tab.active {
            border-bottom: 3px solid #ff89a1;
            color: #ff89a1;
        }

        .content {
            margin: 20px auto;
            width: 55%;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
            padding-left: 
        }

        .content .about-item {
            margin-bottom: 10px;
            font-size: 14px;
            color: #333;
        }

        .content .about-item strong {
            color: #000;
        }
        /* Post Style Button */
        .post-style-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #e97da3;
            color: white;
            border: none;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 24px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            cursor: pointer;
        }

        .post-style-button:hover {
            background-color: #d4668e;
        }
        .post-style-button {
    position: fixed;
    bottom: 20px;
    right: 20px;
    background-color: #e97da3;
    color: white;
    border: none;
    border-radius: 50%;
    width: 60px;
    height: 60px;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 24px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.post-style-button:hover {
    background-color: #d4668e;
}

.post-style-button:hover::after {
    content: "Upload Style"; /* Teks yang akan ditampilkan */
    position: absolute;
    bottom: 80px; /* Jarak dari tombol */
    background-color: #e97da3;
    color: white;
    padding: 5px 10px;
    border-radius: 5px;
    font-size: 14px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    white-space: nowrap;
    z-index: 1000;
}
.gallery {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 2%;
}


.image-placeholder img {
  max-width: 100%;
  border-radius: 3px
}
.back {
    padding: 10px;
    font-size: 24px;
    cursor: pointer;
    list-style:none;
    text-decoration: none;
    margin-left: -100%;
    margin-top: -3.5%;
}
.back a {
    color: black;
}

.card {
  background-color: white;
  border-radius: 10px;
  padding: 8px;
  box-shadow: 0px 2px px rgba(0, 0, 0, 0.1);
  text-align: center;
  font-family: "Jost", sans-serif;

}
.card:hover {
  border: 1px solid rgb(0, 0, 0, 0.2);
  cursor: pointer;
}



.title-card {
    display: flex;
    align-items: center;
    justify-content: space-between;
}
.title-card a {
  color: black;
}

.card .title-card i:hover, .card .title-card a:active {
  color: rgb(250, 156, 211);
  cursor: pointer;
}
.card {
    background-color: white;
    border: 1px solid #ddd;
    border-radius: 10px;
    padding: 5px;
    box-shadow: 0 2px px rgba(0, 0, 0, 0.1);
    text-align: center;
  }
  
  .title-card {
      display: flex;
      align-items: center;
      justify-content: space-between;
  }
  .card .image-placeholder img {
    max-width: 100%;
    max-height: 100%;
    border-radius: 3px
  }
  
  .card .image-placeholder p {
    position: absolute;
    margin-top: -45px;
    margin-left: 10px;
    color:rgb(241, 241, 241);
    font-family: "Jost", sans-serif;
  
  }
  
  .card .title-card p {
    font-size: 14px;
    margin-left: ;
    text-align: left;
  
  }
  .card .title-card h3 {
    text-align: left;
  }
  .card .title-card img {
    max-width: 10%;
    max-height: 10%;
    border-radius: 50%;
  }
  .card p {
    margin: 5px 0;
    text-align: left;
  }
  .card i {
    margin: 5px 0;
    text-align: right;
  }
  
  .tag {
    display: inline-block;
    padding: 5px 10px;
    border-radius: 20px;
    font-size: 12px;
    color: black;
    text-align: right;
  }
  
  .tag.happy {
      background-color:rgb(244, 196, 212);
  }
  
  .tag.very-happy {
    background-color:rgb(243, 147, 182);
  
  }
  
  .tag.very-sad {
    background-color:rgb(191, 218, 240);
  }
  
  .tag.neutral {
    background-color:rgb(237, 209, 138);
  }
  
  .tag.sad {
    background-color:rgb(114, 184, 237);
  }
  
.post-header {
    display: flex;
    align-items: center;
    margin-bottom: 10px;
}
.post-header a {
    color: black;
    text-decoration: none;
    font-family: 'Arial', sans-serif;
}

.profile-pic {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    margin-right: 10px;
}

.username {
    font-weight: bold;
    font-size: 14px;
    color: #333;
}

.timestamp {
    font-size: 12px;
    color: #aaa;
    margin-left: auto;
}

.post-caption {
    font-size: 14px;
    color: #333;
    margin-bottom: 10px;
    line-height: 1.5;
}
.capt {
    position: relative;
}
.poster img {
    max-width: 45%;
    margin-left: 52px;
    border-radius: 7px;
}
.post-caption {
    font-size: 14px;
    color: #333;
    margin-bottom: 8px;
    line-height: 1.5;
    margin-left: 50px;
    margin-top: -5px;
}
.capt {
    position: relative;
}

.post-tags {
    color: #0095f6;
    cursor: pointer;
}
.post-actions {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-left: 70px;
    margin-top:10px;
}

.likes-comments {
    display: flex;
    align-items: center;
    gap: 15px;
    cursor: pointer;

}

.likes-comments span {
    display: flex;
    align-items: center;
    font-size: 14px;
    color: #333;
}

        
    </style>
</head>

<body>
    

    <div class="profile-header">
        <div class="back">
            <a href="home.html"><i class='bx bx-arrow-back'></a></i>
        </div>
        <div class="profile-picture">
            <img src="profil.jpeg" alt="Profile">
        </div>
        <h1>Livvie Twalrose</h1>
        <p>@ivyrosy | she/her</p>
        <p>You have no bio yet.</p>
        <button class="edit-profile"><a href="LOOKSEE/profile.html">Edit Profile</button></a>
    </div>

    <div class="tabs">
        <div class="tab active" onclick="showTab('myStyle')">My Style</div>
        <div class="tab" onclick="showTab('myGallery')">My Gallery</div>
        <div class="tab" onclick="showTab('aboutMe')">About Me</div>
    </div>

    <div id="myStyle" class="content">
        <div class="posting">
            <div class="post-header">
                <a href="profile2.html">
                    <img src="profil.jpeg" alt="Profile Picture" class="profile-pic">
                    <div class="username">livvietwalrose
                    </a>
                        <div class="timestamp">25-01-25</div>
                    </div>
            </div>

            <div class="capt">
                <p class="post-caption">Cute outfit for Monday! I love ittttt!!! Thanks to @alyoy for recommend me this outfit! 
                    <span class="post-tags">#fyp #veryhappy</span>
                </p>
            </div>

            <div class="poster">
                <img src="cute.jpg">
            </div>
            

            <div class="post-actions">
                <div class="likes-comments">
                    <span><div class="like"><i class='bx bxs-heart'></i></div></i> 600</span>
                    <span><i class='bx bx-message-rounded'></i> 199</span>
                    <span><i class='bx bx-share-alt'></i> 500</span>
                </div>
            </div>
        </div>

        
        <div class="box">

        </div>
    </div>

    <div id="fav" class="content" style="display: none;">
        <div class="tabs">
            <div class="tab active" onclick="showTab('style')">Style</div>
            <div class="tab" onclick="showTab('products')">Products</div>
        </div>
    </div>

    <div id="aboutMe" class="content" style="display: none;">
        <div class="about-item">
            <strong>Member Since:</strong><br>
            June 4, 2025
        </div>
        <div class="about-item">
            <strong>Social Accounts:</strong><br>
            <i class='bx bxl-instagram'></i> : @ivyrosy<br>
            <i class='bx bx-envelope'></i> : livvietwalrose@gmail.com
        </div>
    </div>

    <div id="myGallery" class="content" style="display: none;">
        <div class="about-item">
            <div class="gallery">
                <div class="image-placeholder">
                    <a href="detailTO.html"><img src="cute.jpg"></a>
                </div>               
            </div>
        </div>
    </div>

    <!-- Post Style Button -->
    <button class="post-style-button" onclick="uploadStyle()">+</button>

    <script>
        function showTab(tabId) {
            document.querySelectorAll('.content').forEach(content => {
                content.style.display = 'none';
            });

            document.getElementById(tabId).style.display = 'block';

            document.querySelectorAll('.tab').forEach(tab => {
                tab.classList.remove('active');
            });

            document.querySelector(`.tab[onclick="showTab('${tabId}')"]`).classList.add('active');
        }
    </script>
</body>
</html>
