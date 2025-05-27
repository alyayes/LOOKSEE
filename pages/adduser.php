<div class="add-product-container">
        <!-- Photo Section -->
        <div class="photo-section">
          <label for="productPhoto">
            <div class="upload-box">
              <i class="bx bx-upload"></i>
              <p>Click to upload photo</p>
            </div>
          </label>
          <input type="file" id="productPhoto" accept="image/*" hidden>
          <img id="photoPreview" src="" alt="Product Preview" class="hidden">
        </div>
      
        <!-- Form Section -->
        <div class="form-section">
          <h2><b>Add User</b></h2>
          <form id="addProductForm">
            <!-- Product Name -->
            <div class="form-group">
              <label for="productName">Name</label>
              <input type="text" id="productName" placeholder="Enter product name" required>
              <label for="productName">Username</label>
              <input type="text" id="productName" placeholder="Enter category" required>
              <label for="productName">Email</label>
              <input type="text" id="productName" placeholder="Enter platform" required>
              <label for="productName">Account ID</label>
              <input type="text" id="productName" placeholder="Enter link product" required>
            </div>
      
            <!-- Submit Button -->
            <button type="submit">Add User</button>
          </form>
        </div>
      </div>
      
      <style>
        /* General Body Styles */
        body {
          font-family: Arial, sans-serif;
          margin: 0;
          padding: 0;
          background-color: #f5f5f5;
          display: flex;
          justify-content: center;
          align-items: center;
          height: 100vh;
        }
      
        /* Add Product Container */
        .add-product-container {
          display: flex;
          background: #fff;
          padding: 10px;
          margin-left: 310px;
          margin-top: 40px; 
          border-radius: 8px;
          box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
          max-width: 900px;
          width: 1000%;
          gap: 10px;
        }
      
        /* Photo Section */
        .photo-section {
          flex: 1;
          text-align: center;
        }
      
        .upload-box {
          width: 130%;
          height: 200px;
          border: 2px dashed #ccc;
          border-radius: 8px;
          display: flex;
          flex-direction: column;
          justify-content: center;
          align-items: center;
          cursor: pointer;
          color: #999999;
        }
      
        .upload-box i {
          font-size: 24px;
        }
      
        .upload-box:hover {
          border-color: #ff5ed7;
          color: #ff7bb9;;
        }
      
        #photoPreview {
          width: 150%;
          max-height: 150px;
          object-fit: cover;
          border-radius: 8px;
          margin-top: 10px;
        }
      
        .hidden {
          display: none;
        }
      
        /* Form Section */
        .form-section {
          flex: 1;
        }
      
        .form-section h2 {
          margin-bottom: 20px;
          color: #333;
        }
      
        .form-group {
          margin-bottom: 15px;
          text-align: left;
        }
      
        .form-group label {
          display: block;
          margin-bottom: 5px;
          font-weight: bold;
          color: #333;
        }
      
        .form-group input {
          width: 100%;
          padding: 10px;
          border: 1px solid #ccc;
          border-radius: 5px;
          font-size: 14px;
        }
      
        button {
          width: 100%;
          padding: 10px;
          border: none;
          border-radius: 5px;
          background-color: #ff7bb9;
          color: white;
          font-size: 16px;
          cursor: pointer;
        }
      
        button:hover {
          background-color: #ff5ed7;
        }
      </style>
      
      <script>
        const productPhoto = document.getElementById('productPhoto');
        const photoPreview = document.getElementById('photoPreview');
      
        productPhoto.addEventListener('change', function () {
          const file = this.files[0];
          if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
              photoPreview.src = e.target.result;
              photoPreview.classList.remove('hidden');
            };
            reader.readAsDataURL(file);
          }
        
        });
      </script>
      
        

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
