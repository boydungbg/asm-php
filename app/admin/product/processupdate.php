<?php
require('../../common/test_connection.php');
$sql = "select productImage from lechidung_product where productID = '" . $_GET["id"] . "'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $productImage = $row["productImage"];
    }
}
if (file_exists("../" . $productImage)) {
    unlink("../" . $productImage);
    $sql = "update lechidung_product set productImage = '" . $target_getImg . "', productPrice = '" . $_POST['productprice'] . "', productSale = '" . $_POST['productsale'] . "' where productID = " . $_GET["id"];
    if (mysqli_query($conn, $sql) == true) {
        header("Location: ../../../app/admin/product/display.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
