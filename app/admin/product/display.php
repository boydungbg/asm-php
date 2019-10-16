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
        <div class="block-header">
          <a href="../../../app/admin/product/insert.php"><button type="button" class="btn btn-success">Insert Product</button></a>
        </div>
        <div class="row clearfix">
          <?php
          require('../../common/test_connection.php');
          $page = 1;
          $limit = 10;
          $arrs_list = mysqli_query($conn, "select * from lechidung_product;");
          $total_record = mysqli_num_rows($arrs_list);
          $total_page = ceil($total_record / $limit);
          if (isset($_GET["page"]))
            $page = $_GET["page"];
          if ($page < 1) $page = 1;
          if ($page > $total_page) $page = $total_page;
          $start = ($page - 1) * $limit;
          $sql = "select * from lechidung_product ORDER BY productID DESC limit " . $start . "," . $limit . " ;";
          $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result) > 0) {
            echo "<table class='table table-hover'>
    <thead class='thead-dark'>
      <tr>
        <th scope='col'>#</th>
        <th scope='col'>Name</th>
        <th scope='col'>Image</th>
        <th scope='col'>Price</th>
        <th scope='col'>Sale</th>
        <th scope='col'>Edit</th>
        <th scope='col'>Delete</th>
      </tr>
    </thead>";
            $STT = 0;
            while ($row = mysqli_fetch_assoc($result)) {
              $STT++;
              echo " <tbody>
    <tr>
      <th scope='row'>" . $STT . "</th>
      <td>" . $row["productName"] . "</td> 
      <td>        <img src=../" . $row["productImage"]   . " width='50%'/></td>
      <td>" . $row["productPrice"] . "</td>
      <td>" . $row["productSale"] . "</td>
      <td><a class='btn btn-info' href='../../../app/admin/product/update.php?id= " . $row["productID"] . "' onclick='return checkupdate()'>Edit</a></td>
      <td><a class='btn btn-danger' href='../../../app/admin/product/delete.php?id= " . $row["productID"] . "' onclick='return checkdelete()'>Delete</a></td>
    </tr>
  </tbody>";
            }
            echo "</table>";
          }
          ?>
          <div class="row">
            <div class="col-12 col-md-12">
              <div class="JustifyCenter">
                <ul class="pagination">
                  <li><a href="../../../app/admin/product/display.php?page=<?php echo $page - 1; ?>">Previous</a></li>
                  <?php for ($i = 1; $i <= $total_page; $i++) { ?>
                    <li <?php if ($page == $i) echo "class='active'"; ?>><a href="../../../app/admin/product/display.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                  <?php } ?>
                  <li><a href="../../../app/admin/product/display.php?page=<?php echo $page + 1; ?>">Next</a></li>
                </ul>
              </div>
            </div>
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