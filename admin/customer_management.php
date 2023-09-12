<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="modulesad/css/customer_management.css">
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
    require '../admin/connect.php';
    $tongsotk1trang = 8;
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
        settype($page, "int");
    } else {
        $page = 1;
    }
    if (isset($_GET['search']) && !empty($_GET['search'])) {
        $from = ($page - 1) * $tongsotk1trang;
        $tukhoa = $_GET['search'];
        $sql = "SELECT
                        customer_id,
                        customer_name,
                        account_name,
                        password,
                        phone_number,
                        address,
                        email,
                        account_type,
                        create_at
                    FROM
                        customer
                    WHERE
                        customer_name LIKE '%$tukhoa%' or account_name LIKE '%$tukhoa%'
                    LIMIT $from,$tongsotk1trang";
    } else {
        $from = ($page - 1) * $tongsotk1trang;
        $sql =
            "SELECT
                    customer_id,
                    customer_name,
                    account_name,
                    password,
                    phone_number,
                    address,
                    email,
                    account_type,
                    create_at
                FROM
                    customer
                LIMIT $from,$tongsotk1trang";
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
                        <div class="title">Quản lý khách hàng</div>
                        <div class="right-primary">
                            <div class="right-search">
                                <div class="search">
                                    <form>
                                        <div class="search-primary">
                                            <input type="text" name="search" id="search-text" placeholder="Tìm kiếm">
                                            <button type="submit" id="search" class="btn-search"><i class="fa fa-search"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="right-children">
                            <table>
                                <tr>
                                    <th>STT</th>
                                    <th>Họ Và Tên</th>
                                    <th>Tên Tài Khoản</th>
                                    <th>Mật Khẩu</th>
                                    <th>Email</th>
                                    <th>Số Điện Thoại</th>
                                    <th>Địa Chỉ</th>
                                    <th></th>
                                </tr>
                                <?php foreach ($result as $customer) { ?>
                                    <tr>
                                        <td class="stt_accoutn"><?php echo $customer['customer_id'] ?></td>
                                        <td class="name_customer"><?php echo $customer['customer_name'] ?></td>
                                        <td class="name_account"><?php echo $customer['account_name'] ?></td>
                                        <td class="password"><?php echo $customer['password'] ?></td>
                                        <td class="email"><?php echo $customer['email'] ?></td>
                                        <td class="phone_number"><?php echo $customer['phone_number'] ?></td>
                                        <td class="address"><?php echo $customer['address'] ?></td>
                                        <td class="function">
                                            <div><a href="#"><i class="fa fa-edit"></i></a></div>
                                            <div><a href="#"><i class="fa fa-trash"></i></a></div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </table>

                        </div>
                        <div class="pages">
                            <div class="number_pages">
                                <?php
                                    $sql = "SELECT customer_id FROM customer";
                                    $x = mysqli_query($conn, $sql);
                                    $tongsosp = mysqli_num_rows($x);
                                    $sotrang = ceil($tongsosp / $tongsotk1trang);

                                    for ($i = 1; $i <= $sotrang; $i++) {
                                        echo '<a href="customer_management.php?page=' . $i . '" class="number_page"><div><p>' . $i . '</p></div></a>';
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