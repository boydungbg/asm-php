<?php
require("../../common/test_connection.php");
$sql = "delete from lechidung_users where user_id = " .  $_GET["id"];
if (mysqli_query($conn, $sql)) {
    header("Location: ../../../app/admin/user/display.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
