<?php
require('../common/test_connection.php');
$sql = "select * from lechidung_users where user_level = 2;";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
  echo "<table class='table table-hover'>
    <thead class='thead-dark'>
      <tr>
        <th scope='col'>#</th>
        <th scope='col'>Edit</th>
        <th scope='col'>Delete</th>
        <th scope='col'>First name</th>
        <th scope='col'>Last name</th>
        <th scope='col'>Email</th>
        <th scope='col'>Register Date</th>
      </tr>
    </thead>";
  while ($row = mysqli_fetch_assoc($result)) {
    $STT++;
    echo " <tbody>
    <tr>
      <th scope='row'>" . $STT . "</th>
      <td><a href='../../app/admin/user/update.php?id= " . $row["user_id"] . "' onclick='return checkupdate()'>Edit</a></td>
      <td><a href='../../app/admin/user/delete.php?id= " . $row["user_id"] . "' onclick='return checkdelete()'>Delete</a></td>
      <td>" . $row["user_fname"] . "</td>
      <td>" . $row["user_lname"] . "</td>
      <td>" . $row["user_email"] . "</td>
      <td>" . $row["user_registerdate"] . "</td>
    </tr>
  </tbody>";
  }
  echo "</table>";
}
