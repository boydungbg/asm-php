<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shop DungCT</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../../public/css/site.css">
<body>
    <div class="top-bar"></div>
    <header>
        <div class="header__promo">
            <div class="container">
                <ul class="top-promo__wrap">
                    <li class="top-promo__item">
                        <a href="" class="top-promo__link">
                            <i class="tikicon tiki-assistant"></i>Trợ lý Tiki
                        </a>
                    </li>
                    <li class="top-promo__item">
                        <a href="" class="top-promo__link">
                            <i class="tikicon icon-uu-dai-hop-tac"></i>Ưu đãi đối tác
                        </a>
                    </li>
                    <li class="top-promo__item">
                        <a href="" class="top-promo__link">
                            <i class="tikicon icon-booking_dot_com"></i>Đặt khách sạn
                        </a>
                    </li>
                    <li class="top-promo__item">
                        <a href="" class="top-promo__link">
                            <i class="tikicon icon-gotadi"></i>Đặt vé máy bay
                        </a>
                    </li>
                    <li class="top-promo__item">
                        <a href="" class="top-promo__link">
                            <i class="tikicon icon-clearance-sale"></i>Săn hàng tồn
                        </a>
                    </li>
                    <li class="top-promo__item">
                        <a href="" class="top-promo__link">
                            <i class="tikicon ico-fire"></i>Khuyến Mãi HOT
                        </a>
                    </li>
                    <li class="top-promo__item">
                        <a href="" class="top-promo__link">
                            <i class="tikicon icon-global-18"></i>Hàng quốc tế
                        </a>
                    </li>
                    <li class="top-promo__item">
                        <a href="" class="top-promo__link">
                            <i class="tikicon icon-money_bag"></i>
                            Bán hàng cùng Tiki
                            <i class="tikicon icon-arrow-down"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="header__form">
            <div class="container">
                <div class="header__form-wrap">
                    <a href="/" class="header__logo">
                        <i class="tikicon icon-tiki_short"></i>
                    </a>
                    <a href="" class="header__flash-sale">
                        <img src="../../public/img/tikinow.png" alt="">
                    </a>
                    <div class="form-search">
                        <form action="" id="search-from" method="get">
                            <div class="input">
                                <input type="text" name="q" autocomplete="off" placeholder="Tìm sản phẩm, danh mục hay thương hiệu mong muốn ...">
                            </div>
                            <button class="submit">
                                <i class="tikicon icon-search"></i>
                                <span>Tìm kiếm</span>
                            </button>
                        </form>
                    </div>
                    <div class="header__link">
                        <a href="" class="header-link__item-tracking">
                            <i class="tikicon icon-tracking"></i>
                            <span>Theo dõi <br> đơn hàng</span>
                        </a>
                        <a href="" class="header-link__item-notifi">
                            <i class="tikicon tikicon icon-notification"></i>
                            <span>Thông báo <br> của tôi</span>
                        </a>
                        <span href="" class="header-link__item-icon-user">
                            <i class="tikicon tikicon icon-user"></i>
                            <span class="ml-2">
                                <?php if (isset($_SESSION['login_user'])) : ?>
                                    <b>Chào
                                        <?php echo $_SESSION['login_user']; ?>
                                        <br>
                                        <small class="text-center"><a href="../../app/login/logout.php">Logout</a></small>
                                    </b>
                                <?php else : ?>
                                    <b>
                                        <h3 class="text-center"><a href="../../app/login/login.php">Login</a></h3>
                                    </b>
                                <?php endif; ?>

                            </span>
                        </span>
                        <a href="" class="header__cart-btn">
                            <i class="tikicon icon-cart"></i>
                            Giỏ hàng
                            <span class="cart-count">0</span>
                        </a>
                    </div>

                </div>
            </div>
        </div>
        <div class="header__nav">
            <div class="container">
                <nav class="header__nav-main">
                    <i class="tikicon icon-burger-menu"></i>
                    <span class="long">DANH MỤC SẢN PHẨM</span>
                </nav>
                <a href="" class="feature header__nav-location-picker">
                    <span class="tikicon icon-location-picker"></span>
                    Bạn muốn giao hàng tới đâu?
                </a>
                <a href="" class="feature header__nav-recently">
                    <span class="tikicon icon-arrow-down"></span>
                    Sản phẩm bạn đã xem
                </a>
                <a href="" class="feature header__nav-delivery-2h">
                    <i class="tikicon icon-tikinow"></i>
                    <span>
                        TikiNOW giao nhanh <br>
                        Hàng trăm nghìn sản phẩm
                    </span>
                </a>
                <a href="" class="feature header__nav-return">
                    <span class="tikicon icon-exclusive"></span>
                    <span>
                        Tất cả sản phẩm <br>
                        100% chính hiệu
                    </span>
                </a>
                <a href="" class="feature header__nav-delivery-2h">
                    <span class="tikicon icon-return"></span>
                    30 ngày đổi trả dễ dàng
                </a>
            </div>
        </div>
    </header>