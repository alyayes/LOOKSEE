<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Raw LOOKSEE</title>
    <link rel="stylesheet" href="css/profile.css">

  
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
    
    
    <div class="profile-header">
        <div class="profile-picture">
            <img src="profil.jpeg" alt="Profile">
        </div>
        <h1>Livvie Twalrose</h1>
        <p>@ivyrosy | she/her</p>
        <p>You have no bio yet.</p>
        <button class="edit-profile"><a href="LOOKSEE/profile.html">Edit Profile</button></a>
    </div>

    <div class="tabs">
        <div class="tab active" onclick="showTab('style')">My Style</div>
        <div class="tab" onclick="showTab('about')">About Me</div>
    </div>

    <div id="style" class="content">
        <p>My Style content coming soon...</p>
    <div id="about" class="content" style="display: none;">

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
    <div class="upload">
        <div class="upload-container">
            <input type="file" id="imageUpload" accept="image/*" style="display: none;">
            <button id="uploadBtn" class="post-style-button"><i class='bx bx-upload'>
                
            </i></button>
            <div id="previewContainer" class="upload"></div>

        </div>
    </div>

    
    <script>
        document.getElementById('uploadBtn').addEventListener('click', function() {
            document.getElementById('imageUpload').click();
        });

        document.getElementById('imageUpload').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const previewContainer = document.getElementById('previewContainer');
                    const imgElement = document.createElement('img');
                    imgElement.src = e.target.result;
                    imgElement.classList.add('uploaded-image');
                    previewContainer.innerHTML = ('post.html'); // Clear previous preview
                    previewContainer.appendChild(imgElement);

                    // Store the image in localStorage to share across pages
                    localStorage.setItem('post.html', e.target.result);
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
   

    
<!--Footer-->
    
		
	

  

    
      <!-- https://bytewebster.com/ -->
      <!-- https://bytewebster.com/ -->
      <!-- https://bytewebster.com/ -->
        <script src="./assets/js/script.js"></script>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script src="1.js"></script>

</body>
</html>

