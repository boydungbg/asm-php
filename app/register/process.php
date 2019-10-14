<?php
try {
    require('../common/test_connection.php');
    $first_name = $_POST['fname'];
    $last_name = $_POST['lname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hashpassword = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO lechidung_users (user_fname,user_lname,user_username,user_email,user_pass,user_level)";
    if ($username == 'admin') {
        $query .= "VALUES(?,?,?,?,?,1)";
    } else {
        $query .= "VALUES(?,?,?,?,?,2)";
    }
    $stmt = $conn->prepare($query);

    $stmt->bind_param("sssss", $first_name, $last_name, $username, $email, $hashpassword);
    if ($stmt->execute()) {
        header("location: ../../app/login/login.php");
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
