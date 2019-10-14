<?php
require('../common/test_connection.php');
$sql = "select * from lechidung_product;";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
  echo "<table class='table table-hover'>
    <thead class='thead-dark'>
      <tr>
        <th scope='col'>#</th>
        <th scope='col'>Edit</th>
        <th scope='col'>Delete</th>
        <th scope='col'>Name</th>
        <th scope='col'>Image</th>
        <th scope='col'>Price</th>
        <th scope='col'>Sale</th>
      </tr>
    </thead>";
  $STT = 0;
  while ($row = mysqli_fetch_assoc($result)) {
    $STT++;
    echo " <tbody>
    <tr>
      <th scope='row'>" . $STT . "</th>
      <td><a href='../../app/admin/product/update.php?id= " . $row["productID"] . "' onclick='return checkupdate()'>Edit</a></td>
      <td><a href='../../app/admin/product/delete.php?id= " . $row["productID"] . "' onclick='return checkdelete()'>Delete</a></td>
      <td>" . $row["productName"] . "</td> 
      <td class='d-inline-block text-truncate' style='width: 250px;'>" . $row["productImage"]   . "</td>
      <td>" . $row["productPrice"] . "</td>
      <td>" . $row["productSale"] . "</td>
    </tr>
  </tbody>";
  }
  echo "</table>";
}
