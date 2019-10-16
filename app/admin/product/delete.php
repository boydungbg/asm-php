<?php
require("../../common/test_connection.php");
$sql = "select productImage from lechidung_product where productID = '" . $_GET["id"] . "'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $productImage = $row["productImage"];
    }
}
if (file_exists("../" . $productImage)) {
    unlink("../" . $productImage);
}
$sql = "DELETE FROM lechidung_product WHERE productID = '" . $_GET["id"] . "'";
if ($conn->query($sql) == true) {
    header("Location: ../../../app/admin/product/display.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
