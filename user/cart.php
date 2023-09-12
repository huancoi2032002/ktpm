<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/cart.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Document</title>
</head>

<body>
    <?php
    session_start();
    ini_set('display_errors','Off');
    ini_set('error_reporting', E_ALL );
    define('WP_DEBUG', false);
    define('WP_DEBUG_DISPLAY', false);
    $cart = $_SESSION['cart'];
    require "../admin/connect.php";
    $sum = 0;
    unset($_SESSION['voucher_id'])
    ?>
    <?php
        include "../model/header.php";
    ?>

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
                                <p><?php echo  $each['size'] ?></p>
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
                                <a class="open-modal-btn" onclick="openModal()"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        <div class="notification hide" id="notification">
                            <div class="modal">
                                <div class="modal__inner">
                                    <div class="modal__header">
                                        <div style="width: 50%; text-align: center; font-size: 22px; font-weight: 600;">Chú ý</div>
                                        <div style="width: 25%; text-align: right; font-size: 22px;">
                                            <a onclick="closeModal()" class="icon-close" id="icon-close" style="cursor: pointer;"><i class="fa fa-close"></i></a>
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
                <form method="post" action="process_checkout.php">
                    <div class="box-order-title">
                        <h4>THANH TOÁN</h4>
                    </div>
                    <div class="information">
                        <div class="name-user box">
                            <label>Họ tên: </label>
                            <input type="text" name="customer_name" value="<?php echo $_SESSION["customer_name"] ?>">
                        </div>
                        <div class="address-user box">
                            <label>Địa chỉ: </label>
                            <input type="text" name="address_receiver" value="<?php echo $_SESSION["address"] ?>">
                        </div>
                        <div class="phone-number-user box">
                            <label>Số điện thoại: </label>
                            <input type="text" name="phone_number" value="<?php echo $_SESSION["phone_number"] ?>">
                        </div>
                        <div class="transport box">
                            <label>Hình thức vận chuyển: </label>
                            <select name="ship" class="method_pay">
                                <option>--Chọn--</option>
                                <option value="COD">Thanh toán khi nhận hàng</option>
                                <option value="Banking">Banking</option>
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

                                if (empty($_SESSION['voucher_id'])) {
                                    $sum_total = ($sum + 30000);
                                    echo number_format($sum_total, 0, ',', '.');
                                } else {
                                    $percent = $_SESSION['percent_discount'];
                                    $sum_total = ($sum ) * ((100 - $percent) / 100) + 30000;
                                    echo number_format($sum_total, 0, ',', '.');
                                }

                                ?> đ
                            </div>
                        </div>
                    </div>
                    <div class="btn-pay-bill">
                        <div class="btn-pay-bill-primary">
                            <button name="btn_checkout">Đặt hàng</button>
                        </div>
                    </div>
                    <div class="vouchers">
                        <form action="" class="" method="POST" id="form_voucher">
                            <div class="vouchers-title">
                                <i class="fa fa-tag"></i>ㅤPhiếu ưu đãi
                            </div>
                            <div class="vouchers-inp">
                                <input placeholder="Mã ưu đãi" name="voucher" id="voucher">
                            </div>
                            <div class="vouchers-btn">
                                <button>Áp dụng</button>
                            </div>
                        </form>
                    </div>
                </form>
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
        var modal = document.getElementById("notification");
        function openModal(){
            modal.style.display = "block"
        }
        function closeModal(){
            modal.style.display = "none"
        }
    </script>
    <script type="text/javascript">
        $('#form_voucher').on('submit', function() {
            var voucher = $('#voucher').val();
            if ($.trim(voucher) == '') {
                alert('Bạn chưa nhập dữ liệu');
                return false;
            }
            if (voucher != "") {
                $.ajax({
                    url: "process_voucher.php",
                    type: "post",
                    data: {
                        type: 1,
                        voucher: voucher
                    },
                    cache: false,
                    success: function(result) {
                        var result = JSON.parse(result);
                        if (result.statusCode == 200) {
                            alert("Áp dụng thành công");
                        } else if (result.statusCode == 201) {
                            alert("Mã giảm giá không hợp lệ!");
                        }
                    }
                })
            }
        });
    </script>
</body>

</html>