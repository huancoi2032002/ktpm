<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="modulesad/css/order_confirmation.css">
    <link rel="stylesheet" href="modulesad/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
    <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="modulesad/js/main1.js"></script>
    <script src="modulesad/js/jquery.min.js"></script>
</head>

<body>
    <?php

    require "connect.php";
    $tongsosp1trang = 12;
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
        settype($page, "int");
    } else {
        $page = 1;
    }
    if (isset($_GET['month']) && !empty($_GET['month']) && $_GET['year'] && !empty($_GET['year'])) {
        $from = ($page - 1) * $tongsosp1trang;
        $month = $_GET['month'];
        $year = $_GET['year'];
        $sql = "SELECT 
                    orders.order_id,
                    customer_id,
                    name_receiver,
                    phone_receiver,
                    address_receiver,
                    order_status,
                    ship,
                    order_date,
                    total_price
                FROM
                    `orders`
                WHERE 
                    EXTRACT(MONTH FROM order_date) = $month AND EXTRACT(YEAR FROM order_date) = $year
                    LIMIT $from,$tongsosp1trang
                    ";
    } else {
        $from = ($page - 1) * $tongsosp1trang;
        $currentMonth = date("n");
        $currentYear = date("Y");
        $sql = "SELECT 
                    orders.order_id,
                    customer_id,
                    name_receiver,
                    phone_receiver,
                    address_receiver,
                    order_status,
                    ship,
                    order_date,
                    total_price
                FROM
                    `orders`
                
                WHERE 
                    EXTRACT(MONTH FROM order_date) = $currentMonth AND EXTRACT(YEAR FROM order_date) = $currentYear
                    LIMIT $from,$tongsosp1trang
                ";
    }

    $result = mysqli_query($conn, $sql);
    ?>
    <div class="wrapper">
        <div class="container">
            <div class="dashboard">
                <div class="left">
                    <span class="left__icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                    <div class="left__content">
                        <div class="left__logo">LOGO</div>
                        <div class="left__profile">
                            <div class="left__image"><img src="modulesad/img/profile.jpg" alt=""></div>
                        </div>
                        <ul class="left__menu">


                            <li class="left__menuItem">
                                <a href="#" class="left__title"><img src="modulesad/img/icon-dashboard.svg" alt="">Dashboard</a>
                            </li>

                            <li class="left__menuItem">
                                <div class="left__title"><img src="modulesad/img/icon-tag.svg" alt="">Sản Phẩm<img class="left__iconDown" src="modulesad/img/arrow-down.svg" alt=""></div>
                                <div class="left__text">
                                    <a class="left__link" href="../admin/addproduct.php">Thêm Sản Phẩm</a>
                                    <a class="left__link" href="../admin/list_product.php">Xem Sản Phẩm</a>
                                </div>
                            </li>



                            <li class="left__menuItem">
                                <div class="left__title"><img src="modulesad/img/icon-edit.svg" alt="">Thể Loại <img class="left__iconDown" src="modulesad/img/arrow-down.svg" alt=""></div>
                                <div class="left__text">
                                    <a class="left__link" href="#">Thêm Thể Loại</a>
                                    <a class="left__link" href="#">Xem Thể Loại</a>
                                </div>
                            </li>
                            <li class="left__menuItem">
                                <a href="../admin/customer_management.php" class="left__title"><img src="modulesad/img/icon-users.svg" alt="">Khách Hàng</a>
                            </li>



                            <li class="left__menuItem">
                                <a href="../admin/order_confirmation.php" class="left__title"><img src="modulesad/img/icon-book.svg" alt="">Đơn Đặt Hàng</a>
                            </li>
                            <li class="left__menuItem">
                                <div class="left__title"><img src="modulesad/img/icon-edit.svg" alt="">Chức Vụ <img class="left__iconDown" src="modulesad/img/arrow-down.svg" alt=""></div>
                                <div class="left__text">
                                    <a class="left__link" href="#">Thêm Chức Vụ</a>
                                    <a class="left__link" href="#">Xem Chức Vụ</a>
                                </div>
                            </li>
                            <li class="left__menuItem">
                                <div class="left__title"><img src="modulesad/img/icon-user.svg" alt="">Nhân viên<img class="left__iconDown" src="modulesad/img/arrow-down.svg" alt=""></div>
                                <div class="left__text">
                                    <a class="left__link" href="#">Thêm nhân viên</a>
                                    <a class="left__link" href="#">Xem nhân viên</a>
                                </div>
                            </li>
                            <li class="left__menuItem">
                                <a href="../admin/thongke.php" class="left__title"><img src="modulesad/img/icon-users.svg" alt="">Thống Kê</a>
                            </li>
                            <li class="left__menuItem">
                                <a href="#" class="left__title"><img src="modulesad/img/icon-logout.svg" alt="">Đăng Xuất</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <script>
                    function xoadau(str) {
                        str = str.replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'|\"|\&|\#|\[|\]|~|\$|_|`|-|{|}|\||\\/g, "");
                        str = str.replace(/ + /g, "");
                        str = str.trim();
                        return str;
                    }
                </script>
                <div class="right">
                    <div class="right-parent">
                        <div class="title">Quản Lý Đơn Hàng</div>
                        <div class="right-primary">
                            <div class="right-children">
                                <form action="" method="get">
                                    <select name="month" onchange="updateSelectedMonth()">
                                        <?php
                                        $currentMonth = date("n");
                                        for ($month = 1; $month <= 12; $month++) {
                                            $selected = ($month == $currentMonth) ? "selected" : "";
                                            echo "<option value=\"$month\" $selected>$month</option>";
                                        }
                                        ?>
                                    </select>

                                    <select name="year">
                                        <?php
                                        $currentYear = date("Y");
                                        for ($year = $currentYear; $year >= 1970; $year--) {
                                            $selected = ($year == $currentYear) ? "selected" : "";
                                            echo "<option value=\"$year\" $selected>$year</option>";
                                        }
                                        ?>
                                    </select>
                                    <button>Chọn</button>
                                </form>
                            </div>
                        </div>
                        <div class="table_product">
                            <div class="title_table_product">
                                <div class="id_product">
                                    <p class="">Mã</p>
                                </div>
                                <div class="order_date">
                                    <p class="">Thời gian đặt</p>
                                </div>
                                <div class="name_receiver">
                                    <p class="">Tên khách hàng</p>
                                </div>
                                <div class="address_product">
                                    <p class="">Thông tin người đặt</p>
                                </div>
                                <div class="status_product">
                                    <p class="">Trạng Thái</p>
                                </div>
                                <div class="price_product">
                                    <p class="">Tổng Tiền</p>
                                </div>
                                <div class="function">
                                    <p class="">Chức Năng</p>
                                </div>
                            </div>
                            <?php foreach ($result as $each) : ?>
                                <div class="data_product">
                                    <div class="id_product">
                                        <p class=""><?php echo $each['order_id'] ?></p>
                                    </div>
                                    <div class="order_date">
                                        <p class=""><?php echo $each['order_date'] ?></p>
                                    </div>
                                    <div class="name_receiver">
                                        <p class=""><?php echo $each['name_receiver'] ?></p>
                                    </div>
                                    <div class="address_product">
                                        <p><?php echo $each['phone_receiver'] ?></p>
                                        <p><?php echo $each['address_receiver'] ?></p>
                                    </div>
                                    <div class="status_product">
                                        <p class="title_status" style="color: hsl(214, 100%, 59%);">
                                            <?php
                                            switch ($each['order_status']) {
                                                case '0':
                                                    echo "Mới đặt";
                                                    break;
                                                case '1':
                                                    echo "Đã duyệt";
                                                    break;
                                                case '2':
                                                    echo "Đã hủy";
                                                    break;
                                            }
                                            ?>
                                        </p>
                                    </div>
                                    <div class="price_product">
                                        <p class="title_price"><?php echo $each['total_price'] ?></p>
                                    </div>
                                    <div class="function">
                                        <a href="update_order_confirmation.php?order_id=<?php echo $each['order_id'] ?>&order_status=1">
                                            <p class="">Duyệt</p>
                                        </a>
                                        <a href="update_order_confirmation.php?order_id=<?php echo $each['order_id'] ?>&order_status=2">
                                            <p class="">Hủy Đơn</p>
                                        </a>
                                        <a href="view_product_qldh.php?order_id=<?php echo $each['order_id'] ?>">
                                            <p class="">Xem đơn</p>
                                        </a>
                                    </div>
                                </div>

                            <?php endforeach ?>
                        </div>
                        <div class="pages">
                            <div class="number_pages">
                                <?php
                                $sql = "SELECT product_id FROM product";
                                $x = mysqli_query($conn, $sql);
                                $tongsosp = mysqli_num_rows($x);
                                $sotrang = ceil($tongsosp / $tongsosp1trang);

                                for ($i = 1; $i <= $sotrang; $i++) {
                                    echo '<a href="product.php?page=' . $i . '" class="number_page"><div><p>' . $i . '</p></div></a>';
                                };
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>