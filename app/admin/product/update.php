<?php
require('../../common/session.php');
require('../../common/test_connection.php');
$sql = "select * from lechidung_users where user_username = '" . $user_checked . "';";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['user_level'] == 2) {
            header("location: ../../app/user/shopdungct.php");
        }
    }
}
?>
<?php
require('../../common/test_connection.php');
$sql = "select * from lechidung_product where productID = '" . $_GET["id"] . "'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $productName = $row["productName"];
        $productImage = $row["productImage"];
        $productPrice = $row["productPrice"];
        $productSale = $row["productSale"];
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productImage = $productPrice = $productsale = "";
    $productImageErr = $productPriceErr = $productsaleErr = "";
    $CheckErr = 0;
    if (empty($_POST["productprice"])) {
        $productPriceErr = "Không được bỏ trống";
        $CheckErr = 1;
    } else {
        $productPrice = check_input($_POST["productprice"]);
        if (!preg_match("/^([0-9']+)$/", $productPrice)) {
            $productPriceErr = "Gía sản phẩm không hợp lệ";
            $CheckErr = 1;
        }
    }
    if (!empty($_POST["productsale"])) {
        $productsale = check_input($_POST["productsale"]);
        if (!preg_match("/^([0-9']+)$/", $productsale)) {
            $productsaleErr = "Sale sản phẩm không hợp lệ";
            $CheckErr = 1;
        }
        if ($productsale > 100) {
            $productsaleErr = "Số sale không hợp lệ";
            $CheckErr = 1;
        }
    }
    if ($CheckErr == 0) {
        $target_uploadImg = "../../../public/img/imgProducts/" . basename($_FILES["productImg"]["name"]);
        $target_getImg = "../../public/img/imgProducts/" . basename($_FILES["productImg"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_uploadImg, PATHINFO_EXTENSION));
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["productImg"]["tmp_name"]);
            if ($check !== false) {
                $uploadOk = 1;
            } else {
                $productImageErr = "Tập tin không phải là một hình ảnh.";
                $uploadOk = 0;
            }
        }
        if (file_exists($target_uploadImg)) {
            $productImageErr = "Xin lỗi, tập tin đã tồn tại.";
            $uploadOk = 0;
        }
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            $productImageErr = "Xin lỗi, tập tin của bạn quá lớn.";
            $uploadOk = 0;
        }
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        ) {
            $productImageErr = "Xin lỗi, chỉ cho phép JPG, JPEG, PNG.";
            $uploadOk = 0;
        }
        if ($uploadOk == 0) {
            $productImageErr = "Xin lỗi, tập tin của bạn không được tải lên.";
        } else {
            if (move_uploaded_file($_FILES["productImg"]["tmp_name"], $target_uploadImg)) {
                require('processupdate.php');
            } else {
                $productImageErr = "Xin lỗi, đã xảy ra lỗi khi tải lên tệp của bạn.";
            }
        }
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
                        <li> <a href="../../../app/login/logout.php"><button type="button" class="icon-signout btn btn-large btn-primary">Logout</button></a></li>
                    </ul>
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
                        <li>
                            <a href="../../../app/admin/user/display.php">
                                <i class="icon-user  material-icons"></i>
                                <span>Manager Users</span>
                            </a>
                        </li>
                        <li class="active">
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
                        <form id="login-form" class="form" action="" method="post" enctype="multipart/form-data">
                            <h3 class="text-center text-info">Update Product</h3>
                            <div class="form-group">
                                <label for="productname" class="text-info">Product name:</label><br>
                                <input type="text" name="productname" id="productname" class="form-control" disabled value="<?php echo $productName; ?>">
                            </div>
                            <div class=" form-group">
                                <label for="productImg" class="text-info">Product new image:</label>
                                <input type="file" name="productImg" id="productImg" class="form-control-file">
                                <span style=" color:red"><?php echo $productImageErr; ?></span>
                            </div>
                            <div class=" form-group">
                                <label for="productImg" class="text-info">Product old image:</label>
                                <br>
                                <img src="<?php echo "../" . $productImage ?>" width="40%">
                            </div>
                            <div class="form-group">
                                <label for="productprice" class="text-info">Product price:</label><br>
                                <input type="text" name="productprice" id="productprice" class="form-control" value="<?php echo $productPrice; ?>">
                                <span style=" color:red"> <?php echo $productPriceErr; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="productsale" class="text-info">Product sale:</label><br>
                                <input type="text" name="productsale" id="productsale" class="form-control" value="<?php echo $productSale; ?>">
                                <span style=" color:red"> <?php echo  $productsaleErr; ?></span>
                            </div>
                            <div class="form-group">
                                <a href="../../../app/admin/product/display.php"><button type="button" class="btn btn-success">Return</button></a>
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="Update">
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
