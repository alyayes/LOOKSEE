<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
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
            width: 70%;
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
        
    </style>
</head>
<body>
    

    <div class="profile-header">
        <div class="back">
            <a href="to1.html"><i class='bx bx-arrow-back'></a></i>
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
        <div class="tab" onclick="showTab('aboutMe')">About Me</div>
    </div>

    <div id="myStyle" class="content">
        <div class="gallery">
            <div class="card">
                <div class="image-placeholder">
                    <a href="detailTO.html"><img src="cute.jpg"></a>
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
