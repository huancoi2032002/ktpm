<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="modulesad/css/list_product.css">
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
        $tongsosp1trang = 6;
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            settype($page, "int");
        } else {
            $page = 1;
        }

        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $from = ($page - 1) * $tongsosp1trang;
            $tukhoa = $_GET['search'];
            $sql =
                "SELECT
                    product.product_id,
                    product.product_name,
                    product.product_price,
                    product.product_classify,
                    product.product_trademark,
                    product.product_describe,
                    product_image.img_1,
                    product_quantitys.size_38,
                    product_quantitys.size_39,
                    product_quantitys.size_40,
                    product_quantitys.size_41,
                    product_quantitys.size_42
                FROM
                    product
                LEFT JOIN product_image ON product_image.product_id = product.product_id
                LEFT JOIN product_quantitys ON product_quantitys.product_id = product.product_id
                WHERE
                    product.product_id LIKE '%$tukhoa%' or product.product_name LIKE '%$tukhoa%'            
                LIMIT $from,$tongsosp1trang";
        }else {
            $from = ($page - 1) * $tongsosp1trang;
            $sql ="SELECT
                        product.product_id,
                        product.product_name,
                        product.product_price,
                        product.product_classify,
                        product.product_trademark,
                        product.product_describe,
                        product_image.img_1,
                        product_quantitys.size_38,
                        product_quantitys.size_39,
                        product_quantitys.size_40,
                        product_quantitys.size_41,
                        product_quantitys.size_42
                    FROM
                        product
                    LEFT JOIN product_image ON product_image.product_id = product.product_id
                    LEFT JOIN product_quantitys ON product_quantitys.product_id = product.product_id
                    LIMIT $from,$tongsosp1trang";
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
                        <div class="title">Danh Sách Sản Phẩm</div>
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
                        <div class="list_product">
                            <div class="view_product">
                                <div class="view_product_title">
                                    <div class="id_product"><p>ID</p></div>
                                    <div class="img_product"><p>Hình Ảnh</p></div>
                                    <div class="name_product"><p>Tên Sản Phẩm</p></div>
                                    <div class="classify_product"><p>Phân Loại</p></div>
                                    <div class="price_product"><p>Giá</p></div>
                                    <div class="quantity_product"><p>Số Lượng</p></div>
                                    <div class="product_status"><p>Trạng Thái</p></div>
                                    <div class="function"><p>Thao Tác</p></div>
                                    
                
                                </div>
                                <?php foreach ($result as $product) : ?>
                                    <div class="view_product_detail">
                                        <div class="id_product"><p class=""><?php  echo $product['product_id'] ?></p></div>
                                        <div class="img_product"><img src="<?php  echo $product['img_1'] ?>"></div>
                                        <div class="name_product"><p class=""><?php  echo $product['product_name'] ?></p></div>
                                        <div class="classify_product"><p class=""><?php  echo $product['product_classify'] ?></p></div>
                                        <div class="price_product"><p class=""><?php  echo $product['product_price'] ?></p></div>
                                        <div class="quantity_product">
                                            <p class="">Size 38: <?php  echo $product['size_38'] ?></p>
                                            <p class="">Size 39: <?php  echo $product['size_39'] ?></p>
                                            <p class="">Size 40: <?php  echo $product['size_40'] ?></p>
                                            <p class="">Size 41: <?php  echo $product['size_41'] ?></p>
                                            <p class="">Size 42: <?php  echo $product['size_42'] ?></p>
                                        </div>
                                        <div class="product_status"><p class="">
                                            <p class="title_status" style="color: hsl(214, 100%, 59%);">
                                                Mới đặt
                                                </p>
                                            </p>
                                        </div>
                                        <div class="function">
                                        <script>
                                            function confirmDelete() {
                                                return confirm("Bạn có chắc chắn muốn xóa sản phẩm này?");
                                            }
                                        </script>
                                            <div class="delete_product"><a onclick="confirmDelete()" href="delete_product.php?product_id=<?php echo $product['product_id'];?>" ><i class="fa fa-trash-o"></i></a></div>
                                            <div class="fix_product"><a href="capnhatsanpham.php?product_id=<?php echo $product['product_id'];?>"><i class="fa fa-wrench"></i></a></div>
                                        </div>
                                    </div>
                                <?php endforeach ?>
                                 
                            </div>
                        </div>
                        <div class="pages">
                            <div class="number_pages">
                                <?php
                                    $sql = "SELECT customer_id FROM customer";
                                    $x = mysqli_query($conn, $sql);
                                    $tongsosp = mysqli_num_rows($x);
                                    $sotrang = ceil($tongsosp / $tongsosp1trang);

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
    <script>
        
    </script>
</body>

</html>