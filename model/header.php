<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>

<body>
    <div class="header">
        <div class="header-top">
            <div class="header-top-primary">
                <form method="post">
                    <ul>
                        <?php if (empty($_SESSION['customer_id'])) { ?>
                            <li><a href="../user/login.php"><i class="fa fa-user"></i> Đăng Nhập</a></li>
                            <li>|</li>
                            <li><a href="../user/register.php"><i class="fa fa-lock"></i> Đăng Ký</a></li>
                        <?php } else if ($_SESSION["account_name"]) {
                        ?>
                            <li class="user_name">
                                <a href="#"><i class="fa fa-user"></i> <?php echo $_SESSION["account_name"]; ?>!</a>
                                <div class="dropdown-content">
                                    <a href="../user/edit_profile.php?customer_id=<?php echo $_SESSION['customer_id'] ?>">
                                        <div class="dropdown-content-item">Tài Khoản Của Tôi</div>
                                    </a>
                                    <a href="../user/lichsumuahang.php">
                                        <div class="dropdown-content-item">Đơn Mua</div>
                                    </a>
                                    <a href="../user/logout.php">
                                        <div class="dropdown-content-item">Đăng Xuất</div>
                                    </a>
                                </div>
                            <li>
                        <?php } ?>
                        <li>|</li>
                        <li>Hotline: <a><b>1800.0080</b></a></li>
                    </ul>
                </form>
            </div>
        </div>
        <div class="header-center">
            <div class="header-center-primary">
                <a href="../user/index.php">
                    <div class="logo">
                        <div class="img_logo">
                            <img src="../img/drake_logo.png">
                        </div>
                    </div>
                </a>
                <div class="function">
                    <div class="favourite">
                        <a href="#"><i class="fa fa-heart-o"></i></a>
                    </div>
                    <div class="cart">
                        <a href="../user/cart.php">
                            <div class="number_cart">
                                <p id="clicks">
                                    <?php
                                        if(empty($cart = $_SESSION['cart'])){
                                            echo "0";
                                        }else{
                                            echo count($cart) ;
                                        }
                                    ?>
                                </p>
                            </div>
                            <i class="fa fa-shopping-bag" style="font-size: 22px;"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom" id="header-bottom">
            <div class="header-bottom-primary">
                <ul class="main-menu">
                    <li><a href="index.php">TRANG CHỦ</a></li>
                    <li><a href="">GIỚI THIỆU</a></li>
                    <li class="product-link">
                        <a href="product.php">SẢN PHẨM <i class="fa fa-angle-down"></i></a>
                        <div class="dropdown-product">
                            <div><a href="#">VANS CLASSIC</a></div>
                            <div><a href="#">VANS VAULT</a></div>
                            <div><a href="#">VANS OLD SKOOL</a></div>
                            <div><a href="#">VANS SLIP-ON</a></div>
                            <div><a href="#">VANS AUTHENTIC</a></div>
                            <div><a href="#">VANS SK8</a></div>
                            <div><a href="#">VANS ERA</a></div>
                        </div>
                    </li>
                    <li><a href="#">PHỤ KIỆN KHÁC</a></li>
                    <li><a href="../user/news.php">TIN TỨC</a></li>
                    <li><a href="../user/contact.php">LIÊN HỆ</a></li>
                    <li><a href="#">GIẢM GIÁ</a></li>
                </ul>
                <div class="search">
                    <form method="get">
                        <div class="search-primary">
                            <input type="text" class="inp_search" name="search" id="search" placeholder="Nhập dữ liệu...">
                            <input type="button" class="btn-search" id="btn_search" value="Tìm">
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

</body>

</html>