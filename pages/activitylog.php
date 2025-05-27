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
          <button type="button" class="btn btn-primary" onclick="window.location.href='adduser.html';">
            <i class='bx bx-plus'></i> Add Activity
          </button>
        </section>

        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names..." title="Type in a name" />
        <table id="myTable">
          <tr class="header">
            <th style="width:20%;">Date</th>
            <th style="width:25%;">Author</th>
            <th style="width:20%;">IP Address</th>
            <th style="width:17%;">Type</th>
            <th style="width:20%;">Action</th>
          </tr>
          <tr>
            <td>2024-03-13 09:11</td>
            <td><img src="assets/images/younjung.jpg" alt="Younjung" width="50" /> Younjung</td>
            <td>192.168.125.10</td>
            <td>User</td>
            <td>Profile Update</td>
            </tr>
            <tr>
            <td>2024-04-26 10:25</td>
            <td><img src="assets/images/moeum.jpg" alt="Younjung" width="50" /> Moeum</td>
            <td>192.168.127.10</td>
            <td>User</td>
            <td>Logout</td>
            </tr>
            <tr>
            <td>2024-4-30 00:02</td>
            <td><img src="assets/images/sanha.jpg" alt="Younjung" width="50" /> Sanha</td>
            <td>192.168.10.12</td>
            <td>User</td>
            <td>Change username</td>
            </tr>
            <tr>
            <td>2024-05-6 08:22</td>
            <td><img src="assets/images/imsol.jpg" alt="Younjung" width="50" /> Imsol</td>
            <td>172.168.10.2</td>
            <td>User</td>
            <td>Profile Update</td>
            </tr>
            <tr>
            <td>2024-06-9 22:31</td>
            <td><img src="assets/images/heedo.jpg" alt="Younjung" width="50" /> Taeri</td>
            <td>192.168.125.12</td>
            <td>User</td>
            <td>Change username</td>
            </tr>
            <tr>
            <td>2024-07-13 09:22</td>
            <td><img src="assets/images/haejun.jpg" alt="Younjung" width="50" /> Haejun</td>
            <td>192.168.11.3</td>
            <td>User</td>
            <td>Profile Update</td>
            </tr>
            
        </table>
      </div>
      
       

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
