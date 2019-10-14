<?php
session_start();
require('../common/test_connection.php');
$sql = "select * from lechidung_users where user_username = '" . $_SESSION['login_user'] . "';";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['user_level'] == 1) {
            header("location: ../../app/admin/admin.php");
        }
    }
}
?>
<?php require '../shares/headerUser.php' ?>
<div class="breadcrumb-wrap">
    <div class="container">
        <ul class="breadcrumb">
            <li>
                <a href="">
                    Trang chủ
                </a>
            </li>
            <li>
                <a href="">
                    Đồ Chơi - Mẹ & Bé
                </a>
            </li>
        </ul>
    </div>
</div>
<div class="content">
    <div class="container">
        <div class="content__wrap">
            <aside>
                <div class="panel__wrap">
                    <div class="panel">
                        <div class="panel__heading">
                            <h4>Danh Mục Sản Phẩm</h4>
                        </div>
                        <div class="panel__category">
                            <div class="panel__category-list">
                                <div class="panel__category-item panel__category-title">
                                    <a href="">Đồ Chơi - Mẹ & Bé</a>
                                </div>
                                <div class="panel__category-item panel__category-child">
                                    <a href="">
                                        Dinh dưỡng cho mẹ (82)

                                    </a>
                                </div>
                                <div class="panel__category-item panel__category-child">
                                    <a href="">
                                        Dinh dưỡng cho mẹ (82)

                                    </a>
                                </div>
                                <div class="panel__category-item panel__category-child">
                                    <a href="">
                                        Dinh dưỡng cho mẹ (82)

                                    </a>
                                </div>
                                <div class="panel__category-item panel__category-child">
                                    <a href="">
                                        Dinh dưỡng cho mẹ (82)

                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel">
                        <div class="panel__heading">
                            <h4>Sản phẩm được giao từ</h4>
                        </div>
                        <div class="panel__category">
                            <div class="panel__category-list">
                                <div class="panel__category-item panel__category-child">
                                    <a href="">
                                        Dinh dưỡng cho mẹ (82)
                                    </a>
                                </div>
                                <div class="panel__category-item panel__category-child">
                                    <a href="">
                                        Dinh dưỡng cho mẹ (82)

                                    </a>
                                </div>
                                <div class="panel__category-item panel__category-child">
                                    <a href="">
                                        Dinh dưỡng cho mẹ (82)

                                    </a>
                                </div>
                                <div class="panel__category-item panel__category-child">
                                    <a href="">
                                        Dinh dưỡng cho mẹ (82)

                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
            <div class="products">
                <div class="products__filter">
                    <div class="products__filter-option-wrap">
                        <div class="products__filter-option-left">
                            <span>Ưu tiên xem: </span>
                            <ul class="products__filter-option">
                                <li>
                                    <a href="">HÀNG MỚI</a>
                                </li>
                                <li>
                                    <a href="">BÁN CHẠY</a>
                                </li>
                                <li>
                                    <a href="">GIẢM GIÁ NHIỀU</a>
                                </li>
                                <li>
                                    <a href="">GIÁ THẤP</a>
                                </li>
                                <li>
                                    <a href="">GIÁ CAO</a>
                                </li>
                                <li>
                                    <a href="">CHỌN LỌC</a>
                                </li>
                            </ul>
                        </div>
                        <div class="products__filter-option-right">
                            <form action="" method="get">
                                <input type="text" name="q" id="search-product" placeholder="Tìm kiếm dinh dưỡng cho mẹ">
                                <button>Tìm kiếm</button>
                            </form>
                        </div>
                    </div>
                    <div class="products__filter-2h" style="height: 50px;">

                    </div>
                </div>
                <div class="products__wrap">
                    <?php
                    require('../common/test_connection.php');
                    $sql = "select * from lechidung_product;";
                    $result = mysqli_query($conn, $sql);
                    ?>
                    <?php if (mysqli_num_rows($result) > 0) { ?>
                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                            <div class="product">
                                <a href="">
                                    <div class="product__image">
                                        <img src="<?php echo $row["productImage"] ?>" alt="">
                                    </div>
                                    <div class="product__option">
                                        <ul>
                                            <li class="active">
                                                <img src="<?php echo $row["productImage"] ?>" alt="">
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product__title">
                                        <i class="icon icon-tikinow"></i>
                                        <?php echo $row["productName"] ?>
                                    </div>
                                    <span class="product__sale">
                                        <span class="product__sale-final">
                                            <?php echo  $row["productPrice"] - ($row["productPrice"] * $row["productSale"] / 100) ?>₫
                                            <span class="product__sale-percent">
                                                -<?php echo $row["productSale"] ?>%
                                            </span>
                                        </span>
                                        <span class="product__sale-regular"><?php echo $row["productPrice"] ?>₫</span>
                                    </span>
                                    <div class="product__review">
                                        <div class="product__review-start">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <span class="product__review-start-y">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                            </span>
                                        </div>
                                        <div class="product__review-text">(252 nhận xét)</div>
                                    </div>
                                </a>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
                <div class="pagination">
                </div>
            </div>
        </div>
    </div>
</div>
<?php require '../shares/footerUser.php' ?>