<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="modulesad/css/addproduct.css">
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
                        <div class="title">
                            <h3>THÊM SẢN PHẨM</h3>
                        </div>
                        <div class="right-children">
                            <form method="POST" enctype="multipart/form-data" action="" id="my-form">
                                <div class="add-product-img">
                                    <label>Hình ảnh 1: </label>
                                    <input type="file" name="product_img" id="product_img1" class="inputfile"> 
                                   
                                    <br>
                                    <br>
                                    <label>Hình ảnh 2: </label>
                                    <input type="file" name="product_img2" id="product_img2" class="inputfile">
                                    
                                    <br>
                                    <br>
                                    <label>Hình ảnh 3: </label>
                                    <input type="file" name="product_img3" id="product_img3" class="inputfile">
                                    
                                    <br>
                                    <br>
                                    <label>Hình ảnh 4: </label>
                                    <input type="file" name="product_img4" id="product_img4" class="inputfile">
                                    
                                    <br>
                                    <br>
                                    <label>Hình ảnh 5: </label>
                                    <input type="file" name="product_img5" id="product_img5" class="inputfile">
                                    
                                </div>
                                <div class="add-product-detail">
                                    <label>Tên sản phẩm: </label>
                                    <br>
                                    <input type="text" name="product_name" id="product_name">
                                    <br>
                                    <br>
                                    <label>Giá sản phẩm: </label>
                                    <br>
                                    <input type="number" name="product_price" id="product_price">
                                    <br>
                                    <br>
                                    <label>Phân loại: </label>
                                    <select id="product_classify" class="classify" name="product_classify">
                                        <option value="vansclassic">VANS CLASSIC</option>
                                        <option value="vansvault">VANS VAULT</option>
                                        <option value="vansoldskool">VANS OLD SKOOL</option>
                                        <option value="vansslipon">VANS SLIP-ON</option>
                                        <option value="vansauthentic">VANS AUTHENTIC</option>
                                        <option value="vanssk8">VANS SK8</option>
                                        <option value="vansera">VANS ERA</option>
                                    </select>
                                    <br>
                                    <br>
                                    <label>Thương hiệu: </label>
                                    <br>
                                    <input type="text" name="product_trademark" class="product_trademark" id="product_trademark">
                                    <br>
                                    <br>
                                    <label>Mô tả: </label>
                                    <br>
                                    <input type="text" class="product_describe" name="product_describe" class="product_describe" id="product_describe">
                                    <br>
                                </div>
                                <div class="add-product-size">
                                    <label>Số lượng size 38:</label>
                                    <input type="number" name="product_quantity_38" id="product_quantity_38" class="product_quantity">
                                    <br>
                                    <br>
                                    <label>Số lượng size 39:</label>
                                    <input type="number" name="product_quantity_39" id="product_quantity_39" class="product_quantity">
                                    <br>
                                    <br>
                                    <label>Số lượng size 40:</label>
                                    <input type="number" name="product_quantity_40" id="product_quantity_40" class="product_quantity">

                                    <br>
                                    <br>
                                    <label>Số lượng size 41:</label>
                                    <input type="number" name="product_quantity_41" id="product_quantity_41" class="product_quantity">
                                    <br>
                                    <br>
                                    <label>Số lượng size 42:</label>
                                    <input type="number" name="product_quantity_42" id="product_quantity_42" class="product_quantity">
                                </div>
                                <div class="btn-add-product">
                                    <button type="submit" name="submit" value="Upload">Thêm sản phẩm</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#my-form').on('submit', function(e) {
                e.preventDefault(); //ngăn biểu mẫu gửi dữ liệu

                // thu thập dữ liệu biểu mẫu
                var form_data = new FormData($(this)[0]);

                // gửi yêu cầu AJAX tới máy chủ
                $.ajax({
                    url: 'process-add.php',
                    type: 'POST',
                    data: form_data,
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log(response); // log server response
                        alert('Product added successfully!');
                        location.reload(); // reload the page to show the new product
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText); // log error response from server
                        alert('Error adding product. Please try again later.');
                    }
                })
            })
        })
    </script>
</body>

</html>