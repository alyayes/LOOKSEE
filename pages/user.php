<?php
include(__DIR__ . '/../koneksi.php');

// Ambil semua data user
$sql = "SELECT * FROM user";
$result = $koneksi->query($sql);
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
    margin-bottom: 50px;
    /* Berikan jarak bawah */
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

  .btn-action {
    width: 40px;
    height: 40px;
    padding: 0;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    margin-right: 5px;
  }
</style>


<div class="propic">
  <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for users..." title="Type in a name" />

  <table id="myTable">
    <tr class="header">
      <th>Username</th>
      <th>Name</th>
      <th>Email</th>
      <th>Profile Picture</th>
      <th>Role</th>
      <th>Birthday</th>
      <th>Country</th>
      <th>Phone</th>
    </tr>

    <tbody>
      <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
          <td><?= $row['username'] ?></td>
          <td><?= $row['name'] ?></td>
          <td><?= $row['email'] ?></td>
          <td>
            <?php if (!empty($row['profile_picture'])): ?>
              <img src="uploads/<?= $row['profile_picture'] ?>" width="50" height="50" alt="Profile Picture">
            <?php else: ?>
              <em>No Image</em>
            <?php endif; ?>
          </td>
          <td><?= $row['role'] ?></td>
          <td><?= $row['birthday'] ?></td>
          <td><?= $row['country'] ?></td>
          <td><?= $row['phone'] ?></td>
          
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>

<script>
function myFunction() {
  const input = document.getElementById("myInput");
  const filter = input.value.toUpperCase();
  const table = document.getElementById("myTable");
  const tr = table.getElementsByTagName("tr");

  for (let i = 1; i < tr.length; i++) {
    const td = tr[i].getElementsByTagName("td")[2]; // filter by name column
    if (td) {
      const txtValue = td.textContent || td.innerText;
      tr[i].style.display = txtValue.toUpperCase().indexOf(filter) > -1 ? "" : "none";
    }
  }
}
</script>
