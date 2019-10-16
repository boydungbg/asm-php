<?php
require('../../Common/test_connection.php');
$sql = "update lechidung_users set user_fname = '" . $_POST["fname"] . "', user_lname = '" . $_POST["lname"] . "', user_email = '" . $_POST["email"] . "',user_pass='" . password_hash($_POST["password"], PASSWORD_DEFAULT) . "' where user_id = " . $_GET["id"];
if (mysqli_query($conn, $sql) == true) {
    header("Location: ../../../app/admin/user/display.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
