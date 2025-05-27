<?php
include(__DIR__ . '/../koneksi.php');

// Proses tambah artikel
if (isset($_POST['btnSubmit'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $created_at = date('Y-m-d'); // format tanggal hari ini

    // Upload gambar
    $target_dir = "../uploads/";
    $nama_file = time() . "_" . basename($_FILES["image"]["name"]);
    $target_file = $target_dir . $nama_file;

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        $image = $nama_file;
    } else {
        echo "Upload gambar gagal.";
        exit;
    }

    // Simpan ke database
    $stmt = $koneksi->prepare("INSERT INTO artikel (title, content, image, created_at) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $title, $content, $image, $created_at);

    if ($stmt->execute()) {
        echo "<script>alert('Artikel berhasil ditambahkan!'); window.location.href='stylejournal.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>
  
      
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

      <div class="baru">
        <section>
          <button type="button" class="btn btn-primary" onclick="window.location.href='index.php?page=addstylejournal';">
            <i class='bx bx-plus'></i> Add Article
          </button>
        </section>

        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for article..." title="Type in a name" />
        <table id="myTable">
          <tr class="header">
            <th style="width:14%;">Title</th>
            <th style="width:25%;">Date</th>
            <th style="width:25%;">Status</th>
            <th style="width:20%;">Action</th>
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
