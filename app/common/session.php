<?php
session_start();
if (!isset($_SESSION['login_user'])) {
    header("location:  ../../app/login/login.php");
} else {
    require('test_connection.php');
    $user_check = $_SESSION['login_user'];
    $sql = "select * from lechidung_users where user_username = '" . $user_check . "';";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $login_session = $row['user_fname'] . " " . $row['user_lname'];
        $login_session1 = $row['user_email'];
        $user_checked = $row['user_username'];
    }
}
