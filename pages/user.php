
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
          <button type="button" class="btn btn-primary" onclick="window.location.href='index.php?page=adduser';">
            <i class='bx bx-plus'></i> Add User
          </button>
        </section>

        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names..." title="Type in a name" />
        <table id="myTable">
          <tr class="header">
            <th style="width:10%;">Avatar</th>
            <th style="width:15%;">Username</th>
            <th style="width:20%;">Name</th>
            <th style="width:20%;">Email</th>
            <th style="width:15%;">Status</th>
            <th style="width:20%;">Action</th>
          </tr>
          <tr>
            <td><img src="assets/images/younjung.jpg" alt="Younjung" width="50" /></td>
            <td>@younjungie</td>
            <td>Go Younjung</td>
            <td>younjungie@gmail.com</td>
            <td><span class="badge bg-gradient-quepal text-white shadow-sm w-100">Active</span></td>
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
                    title: "Do you want to delete this user?",
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: "Yes",
                    denyButtonText: `No`,
                  }).then((result) => {
                    if (result.isConfirmed) {
                      Swal.fire("Deleting the user was successful!", "", "Deleting the product was successful!");
                    } else if (result.isDenied) {
                      Swal.fire("Delete failed user", "", "info");
                    }
                  });
                }
              </script>
              <button type="button" class="btn btn-primary" onclick="window.location.href='younjung.html';">
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

