<!DOCTYPE html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productName = $productImage = $productPrice = $productsale = "";
    $productNameErr = $productImageErr = $productPriceErr = $productsaleErr = "";
    $CheckErr = 0;
    if (empty($_POST["productname"])) {
        $productName = "Không được bỏ trống";
        $CheckErr = 1;
    } else {
        $productName = check_input($_POST["productname"]);
        if (!preg_match("/^([a-zA-Z0-9' ]+)$/", $productName)) {
            $productNameErr = "Tên sản phẩm không hợp lệ";
            $CheckErr = 1;
        }
    }
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
            $productImageErr = "Xin lỗi, tập tin của bạn không được tải lên.";
            $uploadOk = 0;
        }
        if ($uploadOk == 0) {
            $productImageErr = "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($_FILES["productImg"]["tmp_name"], $target_uploadImg)) {
                require('processinsert.php');
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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Insert Product</title>
</head>

<body>
    <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center mt-5">
            <div id="login-column" class="col-md-6">
                <div id="login-box" class="col-md-12">
                    <form id="login-form" class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                        <h3 class="text-center text-info">Insert Product</h3>
                        <div class="form-group">
                            <label for="productname" class="text-info">Product name:</label><br>
                            <input type="text" name="productname" id="productname" class="form-control">
                            <span style="color:red"> <?php echo $productNameErr; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="productImg" class="text-info">Product image:</label>
                            <input type="file" name="productImg" id="productImg" class="form-control-file">
                            <span style="color:red"><?php echo $productImageErr; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="productprice" class="text-info">Product price:</label><br>
                            <input type="text" name="productprice" id="productprice" class="form-control">
                            <span style="color:red"> <?php echo $productPriceErr; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="productsale" class="text-info">Product sale:</label><br>
                            <input type="text" name="productsale" id="productsale" class="form-control">
                            <span style="color:red"> <?php echo  $productsaleErr; ?></span>
                        </div>
                        <div class="form-group">
                            <a href="../../../app/admin/admin.php"><button type="button" class="btn btn-success">Return</button></a>
                            <input type="submit" name="submit" class="btn btn-info btn-md" value="Insert Product">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>