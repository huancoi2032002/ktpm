<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/cart.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Document</title>
</head>

<body>
    <?php
    session_start();
    $cart = $_SESSION['cart'];
    require "../admin/connect.php";
    $sum = 0;
    ?>
    <div class="header">
        <div class="header-top">
            <div class="header-top-primary">
                <ul>
                    <?php if (empty($_SESSION['customer_id'])) { ?>
                        <li><a href="#"><i class="fa fa-user"></i> Đăng Nhập</a></li>
                        <li>|</li>
                        <li><a href="#"><i class="fa fa-lock"></i> Đăng Ký</a></li>
                    <?php } else
                                if ($_SESSION["account_name"]) {
                    ?>
                        <li>
                            <a href="logout.php" tite="Logout">ㅤLogout.</a>
                        </li>
                        <li>|</li>
                        <li>
                            <a href="info_user.php">Welcome <?php echo $_SESSION["account_name"]; ?>!</a>

                        <li>
                        <?php } ?>
                        <li>|</li>
                        <li>Hotline: <a><b>1800.0080</b></a></li>
                </ul>

            </div>
        </div>
        <div class="header-center">
            <div class="header-center-primary">
                <div class="logo">
                    <div class="img_logo">
                        <img src="../img/logo.png">
                    </div>
                </div>
                <div class="function">
                    <div class="favourite">
                        <a href="#"><i class="fa fa-heart-o"></i></a>
                    </div>
                    <div class="cart">
                        <a href="#">
                            <div class="number_cart">
                                <p>0</p>
                            </div>
                            <i class="fa fa-shopping-bag" style="font-size: 22px;"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom">
            <div class="header-bottom-primary">
                <ul class="main-menu">
                    <li><a href="index.php">TRANG CHỦ</a></li>
                    <li><a href="">GIỚI THIỆU</a></li>
                    <li><a href="product.php">SẢN PHẨM <i class="fa fa-angle-down"></i></a></li>
                    <li><a href="#">PHỤ KIỆN KHÁC</a></li>
                    <li><a href="#">TIN TỨC</a></li>
                    <li><a href="#">LIÊN HỆ</a></li>
                    <li><a href="#">GIẢM GIÁ</a></li>
                </ul>
                <div class="search">
                    <form>
                        <div class="search-primary">
                            <input type="text" name="search" placeholder="Tìm kiếm">
                            <button><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <div class="content">
        <div class="container">
            <div class="box-product-cart">
                <table>
                    <tr class="product-cart-title">
                        <th style="width: 290px">SẢN PHẨM</th>
                        <th style="width: 110px;">ĐƠN GIÁ</th>
                        <th style="width: 100px;">SỐ LƯỢNG</th>
                        <th style="width: 150px;">TỔNG TIỀN</th>
                        <th style="width: 50px;"></th>
                    </tr>
                    <?php foreach ($cart as $product_id => $each) : ?>

                        <tr class="box-product">
                            <td class="product-detail">
                                <div class="product-cart-img">
                                    <img src="<?php echo $each['img_1'] ?>">
                                </div>
                                <div class="product-cart-name">
                                    <p><?php echo  $each['product_name'] ?></p>
                                </div>
                            </td>
                            <td class="product-unit-price">
                                <p class=""><?php $price =  $each['product_price'];
                                            echo number_format($price, 0, ',', '.');  ?> đ</p>
                            </td>
                            <td class="product-quantity">
                                <div class="quantity_detail">

                                    <button><a href="update_quantity_in_cart.php?product_id=<?php echo $product_id ?>&type=decre" class="decre"><i class="fa fa-minus"></i></a></button>

                                    <?php echo $each['quantity'] ?>

                                    <button><a href="update_quantity_in_cart.php?product_id=<?php echo $product_id ?>&type=incre" class="incre"><i class="fa fa-plus"></i></a></button>
                                </div>
                            </td>

                            <td class="product-total">
                                <p>
                                    <?php

                                    $price_total =  $each['product_price'] * $each['quantity'];
                                    echo number_format($price_total, 0, ',', '.');
                                    $sum += $price_total;
                                    ?> đ

                                </p>
                            </td>
                            <td class="product-function">
                                <a class="open-modal-btn"><i class="fa fa-trash"></i></a>
                            </td>
                            <div class="notification hide">
                                <div class="modal">
                                    <div class="modal__inner">
                                        <div class="modal__header">
                                            <div style="width: 50%; text-align: center; font-size: 22px; font-weight: 600;">Chú ý</div>
                                            <div style="width: 25%; text-align: right; font-size: 22px;">
                                                <a class="icon-close" id="icon-close" style="cursor: pointer;"><i class="fa fa-close"></i></a>
                                            </div>
                                        </div>
                                        <div class="modal__body">
                                            <p>Bạn muốn xoá sản phẩm này ra khỏi giỏ hàng?</p>
                                        </div>
                                        <div class="modal__footer">
                                            <button type="button" class="btn close">Hủy bỏ</button>
                                            <button type="button" class="btn agree"><a href="delete_from_cart.php?product_id=<?php echo $product_id ?>">Đồng ý</a></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </tr>
                    <?php endforeach ?>
                </table>
                <div class="back-product">
                    <a href="#">
                        <div class="btn-back-product">
                            <i class="fa fa-long-arrow-left"> Tiếp tục xem sản phẩm</i>
                        </div>
                    </a>
                </div>
            </div>
            <div class="box-order">
                <div class="box-order-title">
                    <h4>THANH TOÁN</h4>
                </div>
                <div class="information">
                    <div class="name-uer box">
                        <label>Họ tên: </label>
                        <input type="text" value="<?php echo $_SESSION["customer_name"] ?>">
                    </div>
                    <div class="address-user box">
                        <label>Địa chỉ: </label>
                        <input type="text" value="<?php echo $_SESSION["address"] ?>">
                    </div>
                    <div class="phone-number-user box">
                        <label>Số điện thoại: </label>
                        <input type="text" value="<?php echo $_SESSION["phone_number"] ?>">
                    </div>
                    <div class="transport box">
                        <label>Hình thức vận chuyển: </label>
                        <select>
                            <option>Thanh toán khi nhận hàng</option>
                            <option>Banking</option>
                        </select>
                    </div>
                </div>
                <div class="pay-bill">
                    <div class="title-bill">
                        <div class="total-product">Tổng tiền hàng: </div>
                        <div class="total-ship">Phí vận chuyển: </div>
                        <div class="total-pay">Tổng thanh toán: </div>
                    </div>
                    <div class="price-bill">
                        <div class="total-product">
                            <?php
                            echo number_format($sum, 0, ',', '.');
                            ?> đ
                        </div>
                        <div class="total-ship">30.000 đ</div>
                        <div class="total-pay">
                            <?php
                            $sum_total = ($sum + 30000) * ((100 - 20) / 100);

                            echo number_format($sum_total, 0, ',', '.');
                            ?> đ
                        </div>
                    </div>
                </div>
                <div class="btn-pay-bill">
                    <div class="btn-pay-bill-primary">
                        <button>Đặt hàng</button>
                    </div>
                </div>
                <div class="vouchers">
                    <div class="vouchers-title">
                        <i class="fa fa-tag"></i>ㅤPhiếu ưu đãi
                    </div>
                    <div class="vouchers-inp">
                        <input placeholder="Mã ưu đãi">
                    </div>
                    <div class="vouchers-btn">
                        <button>Áp dụng</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="footer">
        <div class="footer-primary">
            <div class="footer-detail">
                <div class="footer-introduce row">
                    <label>GIỚI THIỆU</label>
                    <p>
                        Chào mừng bạn đến với ngôi nhà Converse!
                        Tại đây, mỗi một dòng chữ, mỗi chi tiết và
                        hình ảnh đều là những bằng chứng mang
                        dấu ấn lịch sử Vans, và đang
                        không ngừng phát triển lớn mạnh.
                    </p>
                </div>
                <div class="footer-address row">
                    <label>ĐỊA CHỈ</label>
                    <ul>
                        <li>
                            <i class="fa fa-map-marker" style="margin-right: 28px;"></i>
                            <p>273 Đ. An D. Vương, Phường 3, Quận 5, Thành phố Hồ Chí Minh</p>
                        </li>
                        <li>
                            <i class="fa fa-fax"></i>
                            <p>0999999999 - 0988888888</p>
                        </li>
                        <li>
                            <i class="fa fa-envelope-o"></i>
                            <p>waitingforyou@mono.com</p>
                        </li>
                    </ul>
                </div>
                <div class="footer-menu row">
                    <label>MENU</label>
                    <table class="footer-table">
                        <tr>
                            <td><a href="#">Trang chủ</a></td>
                            <td><a href="#">Giới thiệu</a></td>
                        </tr>
                        <tr>
                            <td><a href="#">Cửa hàng</a></td>
                            <td><a href="#">Tin tức</a></td>
                        </tr>
                        <tr>
                            <td><a href="#">Liên hệ</a></td>
                        </tr>
                    </table>
                </div>
                <div class="footer-social-network row">
                    <label>MẠNG XÃ HỘI</label>
                    <div class="list-social-network">
                        <div class="row-1">
                            <a href="#" class="logo-social-network"><img src="../img/facebook.png" class="facebook"></a>
                            <a href="#" class="logo-social-network"><img src="../img/instagram.png" class="instagram"></a>
                            <a href="#" class="logo-social-network"><img src="../img/4846401.png" class="telegram"></a>

                        </div>
                        <div class="row-2">
                            <a href="#" class="logo-social-network"><img src="../img/youtube.png" class="youtube"></a>
                            <a href="#" class="logo-social-network"><img src="../img/Twitter.png" class="twitter"></a>

                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-email">
                <div class="footer-email-primary">
                    <div class="footer-email-detail">
                        <div class="footer-email-title">
                            <h3>ĐĂNG KÝ NHẬN THÔNG TIN</h3>
                        </div>
                        <div class="footer-email-btn">
                            <input type="email">
                            <button>ĐĂNG KÝ</button>
                        </div>
                        <div class="footer-email-pay">
                            <a href="#"><img src="../img/paypal.png"></a>
                            <a href="#"><img src="../img/visa.png"></a>
                            <a href="#"><img src="../img/mastercart.png"></a>
                            <a href="#"><img src="../img/verified.png"></a>
                            <a href="#"><img src="../img/veriSign.png"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright">
        <div class="copyright-primary">
            <p>© Bản quyền thuộc về NHÓM 12</p>
        </div>
    </div>
    <script>
        var btnOpen = document.querySelector('.open-modal-btn');
        var modal = document.querySelector('.notification');
        var iconClose = document.querySelector('.modal__header a');
        var btnClose = document.querySelector('.modal__footer button');

        function toggleModal() {
            modal.classList.toggle('hide')
        }

        btnOpen.addEventListener('click', toggleModal)
        btnClose.addEventListener('click', toggleModal)
        iconClose.addEventListener('click', toggleModal)
    </script>
</body>

</html>