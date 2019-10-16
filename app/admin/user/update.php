<?php
require('../../common/session.php');
require('../../common/test_connection.php');
$sql = "select * from lechidung_users where user_username = '" . $user_checked . "';";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['user_level'] == 2) {
            header("location: ../../../app/user/shopdungct.php");
        }
    }
}
?>
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
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Admin</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link href="../../../public/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="../../../public/css/style.css" rel="stylesheet">
    <link href="../../../public/css/all-themes.css" rel="stylesheet" />
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
</head>

<body>

    <body class="theme-red">
        <!-- Page Loader -->
        <div class="page-loader-wrapper">
            <div class="loader">
                <div class="preloader">
                    <div class="spinner-layer pl-red">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>
                </div>
                <p>Please wait...</p>
            </div>
        </div>
        <!-- #END# Search Bar -->
        <!-- Top Bar -->
        <nav class="navbar">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a id="text-white" href="../../../app/admin/admin.php">Admin Shop DungCT</a>
                </div>
                <div class="collapse navbar-collapse" id="navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                    <li> <a href="../../../app/login/logout.php"><button type="button" class="icon-signout btn btn-large btn-primary">Logout</button></a></li>                    </ul>
                </div>
            </div>
        </nav>
        <!-- #Top Bar -->
        <section>
            <!-- Left Sidebar -->
            <aside id="leftsidebar" class="sidebar">
                <!-- User Info -->
                <div class="user-info">
                    <div class="image">
                        <img src="../../../public/img/imgUsers/68378441_662085174278896_6502441750110404608_o.jpg" width="46" height="44" alt="User" />
                    </div>
                    <div class="info-container">
                        <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $login_session ?></div>
                        <div class="email"><?php echo $login_session1 ?></div>
                    </div>
                </div>
                <!-- #User Info -->
                <!-- Menu -->
                <div class="menu">
                    <ul class="list">
                        <li class="header">Menu Control</li>
                        <li>
                            <a href="../../../app/admin/admin.php">
                                <i class="icon-home material-icons"></i>
                                <span>Home</span>
                            </a>
                        </li>
                        <li class="active">
                            <a href="../../../app/admin/user/display.php">
                                <i class="icon-user  material-icons"></i>
                                <span>Manager Users</span>
                            </a>
                        </li>
                        <li>
                            <a href="../../../app/admin/product/display.php">
                                <i class=" icon-shopping-cart material-icons"></i>
                                <span>Manager Products</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- #Menu -->
                <!-- Footer -->
                <div class="legal">
                    <div class="copyright">
                        &copy; 2016 - 2017 <a href="javascript:void(0);">Admin Shop DungCT</a>.
                    </div>
                    <div class="version">
                        <b>Version: </b> 1.0.5
                    </div>
                </div>
                <!-- #Footer -->
            </aside>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div id="login-column" class="col-md-8">
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
                                <a href="../../../app/admin/user/display.php"><button type="button" class="btn btn-success">Return</button></a>
                                <input type="submit" name="Update" class="btn btn-info btn-md" onclick="return checkupdate()" value="Update">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- Jquery Core Js -->
        <script src="../../../public/plugins/jquery/jquery.min.js"></script>
        <!-- Waves Effect Plugin Js -->
        <script src="../../../public/plugins/node-waves/waves.js"></script>
        <!-- Custom Js -->
        <script src="../../../public/js/admin.js"></script>
    </body>

</html>