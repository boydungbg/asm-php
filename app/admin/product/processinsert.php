<?php
try {
    require('../../Common/test_connection.php');
    $productName = $_POST['productname'];
    $productImg = $target_getImg;
    $productPrice = $_POST['productprice'];
    $productSale = $_POST['productsale'];
    $hashpassword = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO lechidung_product (productName,productImage,productPrice,productSale)";
    $query .= "VALUES(?,?,?,?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssss", $productName, $productImg, $productPrice, $productSale);
    if ($stmt->execute()) {
        header("Location: ../../../app/admin/admin.php");
        exit();
    } else {
        $errorstring = "<p class='text-center col-sm-8' style='color:red'>";
        $errorstring .= "System Error<br />You could not be registered due ";
        $errorstring .= "to a system error. We apologize for any inconvenience.</p>";
        exit();
    }
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}
$stmt->close();
$conn->close();
