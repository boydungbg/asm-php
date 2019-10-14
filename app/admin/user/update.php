<?php
require('../../common/test_connection.php');
$sql = "select * from lechidung_users where user_id = '" .  $_GET["id"] . "';";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $fname = $row["user_lname"];
        $lname = $row["user_fname"];
        $username = $row["user_username"];
        $email = $row["user_email"];
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $lname = $email = $password = $Repassword = "";
    $fnameErr = $lnameErr  = $emailErr = $passwordErr = "";
    $CheckErr = 0;
    if (empty($_POST["fname"])) {
        $fnameErr = "Không được bỏ trống";
        $CheckErr = 1;
    } else {
        $fname = check_input($_POST["fname"]);
        if (!preg_match("/^([a-zA-Z' ]+)$/", $fname)) {
            $fnameErr = "Tên không hợp lệ";
            $CheckErr = 1;
        }
    }
    if (empty($_POST["lname"])) {
        $lnameErr = "Không được bỏ trống";
        $CheckErr = 1;
    } else {
        $lname = check_input($_POST["lname"]);
        if (!preg_match("/^([a-zA-Z' ]+)$/", $lname)) {
            $lnameErr = "Tên không hợp lệ";
            $CheckErr = 1;
        }
    }
    if (empty($_POST["email"])) {
        $emailErr = "Không được bỏ trống";
        $CheckErr = 1;
    } else {
        $email = check_input($_POST["email"]);
        $sql = "select * from lechidung_users where user_email = '" .  $email . "';";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                if ($email != $row["user_email"]) {
                    $emailErr = "Email đã tồn tại";
                    $CheckErr = 1;
                }
            }
        }
    }
    if (empty($_POST["password"]) || empty($_POST["re-password"])) {
        $passwordErr = "Password không giống nhau";
        $CheckErr = 1;
    } else {
        $password = check_input($_POST["password"]);
        $Repassword = check_input($_POST["re-password"]);
        if ($password != $Repassword) {
            $passwordErr = "Password không giống nhau";
            $CheckErr = 1;
        }
    }
    if ($CheckErr == 0) {
        require('processupdate.php');
    }
}
function check_input($data)
{
    $data = trim($data);
    $data = htmlspecialchars($data);
    $data = stripslashes($data);
    return $data;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update User</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>
    <div id="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">
                            <h3 class="text-center text-info">Update User</h3>
                            <div class="form-group">
                                <label for="fname" class="text-info">First Name:</label><br>
                                <input type="text" name="fname" id="fname" class="form-control" value="<?php echo $fname; ?>">
                                <?php echo $fnameErr; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="lname" class="text-info">Last Name:</label><br>
                                <input type="text" name="lname" id="lname" class="form-control" value="<?php echo $lname; ?>">
                                <?php echo $lnameErr; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="username" class="text-info">User Name:</label><br>
                                <input type="text" name="username" id="username" class="form-control" disabled value="<?php echo $username; ?>">
                            </div>
                            <div class="form-group">
                                <label for="email" class="text-info">Email:</label><br>
                                <input type="email" name="email" id="email" class="form-control" value="<?php echo $email; ?>">
                                <?php echo $emailErr; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="re-password" class="text-info">Re-Password:</label>
                                <input type="password" name="re-password" id="re-password" class="form-control">
                                <?php echo $passwordErr; ?></span>
                            </div>
                            <div class="form-group">
                                <a href="../../../app/admin/admin.php"><button type="button" class="btn btn-success">Return</button></a>
                                <input type="submit" name="Update" class="btn btn-info btn-md" onclick="return checkupdate()" value="Update">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>