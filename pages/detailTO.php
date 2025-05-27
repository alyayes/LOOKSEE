<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Post</title>
    <link rel="stylesheet" href="assets/css/detailTO.css" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
   
</head>

<body>
    

    <div class="container">
        <div class="back">
            <a href="to1.html"><i class='bx bx-arrow-back'></a></i>
        </div>
        <div class="image-section">
            <img src="cute.jpg" alt="Post Image">
        </div>
        <div class="content-section">
            <div>
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
                    <div class="container">
                      <span><i class='bx bx-store-alt'></i> 
                      <a href="#" class="details-product" onclick="openModal()">Details Product</a></span>
                      <span><i class='bx bx-happy'></i>
                      <a href="#" class="mood-button">Very Happy</a></span>
                    </div>
                </div>
            </div>

            <div>
                <div class="post-actions">
                    <div class="likes-comments">
                        <span><div class="like"><i class='bx bxs-heart'></i></div></i> 600</span>
                        <span><i class='bx bx-message-rounded'></i> 199</span>
                        <span><i class='bx bx-share-alt'></i> 500</span>
                    </div>
                </div>

                <div class="post-footer" id="comment-section">
                    <p class="comments"><strong>dalfmnwrh</strong> Prettyyyyy</p>
                    <div class="comment-replies">
                        <p><strong>itsmoona_</strong> Cuteee</p>
                        <p><strong>meow</strong> agree</p>
                        <p><strong>rawr</strong> ofc!!</p>
                    </div>
                </div>
                <div class="comment-input">
                    <input type="text" id="comment-input" placeholder="Write a comment...">
                    <button onclick="addComment()">Post</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="productModal" class="modal">
        <div class="modal-content">
            <span class="close-btn" onclick="closeModal()">&times;</span>
            <h2>Detail Product</h2>
            <ul class="product-list">
                <li>
                    <span>Pinky Cardigan</span>
                    <a href="https://shopee.co.id/"><button class="go-to-product">Go To Product</button></a>
                </li>
                <li>
                    <span>Blue Jeans</span>
                    <a href="https://shopee.co.id/"><button class="go-to-product">Go To Product</button></a>
                </li>
                <li>
                    <span>Inner White</span>
                    <a href="https://shopee.co.id/"><button class="go-to-product">Go To Product</button></a>
                </li>
            </ul>
        </div>
    </div>
    
</div>
    <script>
        // Menambahkan komentar baru
        function addComment() {
            const commentInput = document.getElementById('comment-input');
            const commentText = commentInput.value.trim();

            if (commentText) {
                const commentSection = document.getElementById('comment-section');
                const newComment = document.createElement('p');
                newComment.className = 'comments';
                newComment.innerHTML = `<strong>livvietwalrose</strong> ${commentText}`;

                commentSection.appendChild(newComment);
                commentInput.value = '';
            }
        }

        // Modal logic
        function openModal() {
            document.getElementById('productModal').style.display = 'flex';
        }

        function closeModal() {
            document.getElementById('productModal').style.display = 'none';
        }

        // Close modal when clicking outside of it
        window.onclick = function(event) {
            const modal = document.getElementById('productModal');
            if (event.target === modal) {
                modal.style.display = 'none';
            }
        }
    </script>
<!--Script Like-->
    <script>
        // Pilih elemen dengan class "like"
        const likeIcon = document.querySelector('.like');

        // Tambahkan event listener untuk klik
        likeIcon.addEventListener('click', () => {
            likeIcon.classList.toggle('clicked');
        });

        // Tambahkan efek hover menggunakan JavaScript
        likeIcon.addEventListener('mouseover', () => {
            likeIcon.classList.add('hovered');
        });

        likeIcon.addEventListener('mouseout', () => {
            likeIcon.classList.remove('hovered');
        });

    </script>

</body>
</html>
