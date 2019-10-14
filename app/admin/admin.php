<?php
require('../common/session.php');
require('../common/test_connection.php');
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
<?php require '../shares/headerAdmin.php' ?>
<div class="row">
    <?php require '../shares/navAdmin.php' ?>
    <div class="col-9">
        <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="DashBoard" role="tabpanel" aria-labelledby="v-pills-DashBoard-tab">
                Nó là trang điều khiển
            </div>
            <div class="tab-pane fade" id="Profile" role="tabpanel" aria-labelledby="v-pills-Profile-tab">
                Nó là trang thông tin admin
            </div>
            <div class="tab-pane fade" id="ManangerUser" role="tabpanel" aria-labelledby="v-pills-ManangerUser-tab">
                <div class="row">
                    <div class="col-12">
                        <nav class="navbar navbar-expand-lg navbar-dark">
                            <h5>Manager Users</h5>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <?php require './user/display.php' ?>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="ManagerProduct" role="tabpanel" aria-labelledby="v-pills-ManagerProduct-tab">
                <div class="row">
                    <div class="col-12">
                        <nav class="navbar navbar-expand-lg navbar-dark">
                            <h5>Manager Products</h5>
                            <div class="collapse navbar-collapse " id="navbarNav">
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item active">
                                        <a href="../../app/admin/product/insert.php"><button type="button" class="btn btn-success">Insert Product</button></a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                        <div class="row">
                            <div class="col-12">
                                <?php require './product/display.php' ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require '../shares/footerAdmin.php' ?>