<?php
    session_start();
    require "../admin/connect.php";
    ini_set('display_errors','Off');
    ini_set('error_reporting', E_ALL );
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>
    <body>
        <?php include "../model/header.php"; ?>
        <div class="content">
        <div class="slide_show">
            <div class="slider">
                <div class="slides">
                    <input type="radio" name="radio-btn" id="radio1">
                    <input type="radio" name="radio-btn" id="radio2">
                    <input type="radio" name="radio-btn" id="radio3">
                    <input type="radio" name="radio-btn" id="radio4">
                    <div class="slide first">
                        <img src="https://bizweb.dktcdn.net/100/140/774/themes/827866/assets/slider_3.jpg?1675603094014">
                    </div>
                    <div class="slide">
                        <img src="https://bizweb.dktcdn.net/100/140/774/themes/827866/assets/slider_2.jpg?1675603094014">
                    </div>
                    <div class="slide">
                        <img src="https://bizweb.dktcdn.net/100/140/774/themes/827866/assets/slider_4.jpg?1675603094014">
                    </div>
                    <div class="slide">
                        <img src="https://bizweb.dktcdn.net/100/140/774/themes/827866/assets/slider_1.jpg?1675603094014">
                    </div>
                    <div class="navigation-auto">
                        <div class="auto-btn1"></div>
                        <div class="auto-btn2"></div>
                        <div class="auto-btn3"></div>
                        <div class="auto-btn4"></div>
                    </div>
                </div>
            </div>
            <div class="navigation-manual">
                <label for="radio1" class="manual-btn"></label>
                <label for="radio2" class="manual-btn"></label>
                <label for="radio3" class="manual-btn"></label>
                <label for="radio4" class="manual-btn"></label>
            </div>
        </div>
        <script src="../js/slideshow.js"></script>

        <div class="section-content">
            <div class="section-content-img">
                <div class="title-content-img">
                    <a href="#" class="title-content-img-detail">CLASSIC</a>
                </div>
                <div class="text-content-img"><p>Bộ sưu tập cổ điển
                    Những phiên bản bất tử
                    từ năm 1966</p>
                </div>
                <img src="../img/bg_module_1.jpg">
                <div class="btn-section-content"><button>Xem thêm</button></div>
            </div>
            <div class="section-content-img">
                <div class="title-content-img">
                    <a href="#" class="title-content-img-detail">NEW ARRIVALS</a>
                </div>
                <div class="text-content-img"><p>Bộ sưu tập sản phẩm mới nhất</p>
                </div>
                <img src="../img/bg_module_2.jpg">
                <div class="btn-section-content"><button>Xem thêm</button></div>
            </div>
            <div class="section-content-img">
                <div class="title-content-img">
                    <a href="#" class="title-content-img-detail">BEST SELLER</a>
                </div>
                <div class="text-content-img"><p>Các sản phẩm bán chạy nhất
                    Được Fans hâm mộ yêu thích nhất
                    Chỉ có tại hệ thống Vans Việt Nam</p>
                </div>
                <img src="../img/bg_module_3.jpg" alt="">
                <div class="btn-section-content"><button>Xem thêm</button></div>
            </div>
        </div>


        <div class="new-product">
            <?php
                $date = new DateTime();
                $month = $date->format('n');
                $sql = "SELECT
                            product.product_id,
                            product.product_name,
                            product.product_price,
                            product.product_classify,
                            product.product_trademark,
                            product.product_describe,
                            product.product_postingtime,
                            product_image.img_1
                        FROM
                            `product`
                        LEFT JOIN product_image ON product_image.product_id = product.product_id
                        LEFT JOIN product_quantitys ON product_quantitys.product_id = product.product_id
                        
                        WHERE
                            EXTRACT(MONTH FROM product_postingtime) = $month
                        ORDER BY product_postingtime DESC";
                        
                $result = mysqli_query($conn,$sql);
            ?>
            <div class="new-product-primary">
                <div class="new-product-title"><h3>SẢN PHẨM MỚI</h3></div>
                <div class="from-list-product" id="formList">
                    <div class="new-product-list">
                        <?php foreach($result as $product) { ?>
                        <a href="#">
                            <div class="product-box">
                                <div class="product-image">
                                  <img src="<?php echo $product['img_1'] ?>">
                                </div>
                                <div class="product-info">
                                  <p class="name-product"><?php echo $product['product_name'] ?></p>
                                  <p class="price-product"><?php echo number_format($product['product_price'], 0, ',', '.');  ?>đ</p>
                                  <div class="product-info-function">
                                    <a href="#" class="favorite-product"><i class="fa fa-heart-o"></i></a>
                                    <a href="product_detail.php?product_id=<?php echo $product['product_id'] ?>" class="buy-button">Buy Now</a>
                                  </div>
                                </div>
                            </div>
                        </a>
                        <?php } ?>
                    </div>
                </div>
                
            </div>
            <div class="btn-show-product">
                <a type="button" id="prev"> < </a>
                <a type="button" id="next"> > </a>
            </div>
        </div>
        <div class="accessory-product">
            <?php
                $tongsosp1trang = 8;
                
                $sql_product = "SELECT
                                    product.product_id,
                                    product.product_name,
                                    product.product_price,
                                    product.product_classify,
                                    product.product_trademark,
                                    product.product_describe,
                                    product.product_postingtime,
                                    product_image.img_1
                                FROM
                                    `product`
                                LEFT JOIN product_image ON product_image.product_id = product.product_id
                                LEFT JOIN product_quantitys ON product_quantitys.product_id = product.product_id
                                ORDER BY product_postingtime DESC
                                LIMIT $tongsosp1trang;
                                ";
                $result_product = mysqli_query($conn,$sql_product);
            ?>
            <div class="accessory-product-primary">
                <div class="accessory-product-title"><h3>TẤT CẢ SẢN PHẨM</h3></div>
                <div class="accessory-product-list">
                    <?php foreach($result_product as $product_all) { ?>
                    <a href="#">
                        <div class="accessory-product-detail">
                            <div class="accessory-product-img">
                                <img src="<?php echo $product_all['img_1'] ?>" alt="Product Image">
                            </div>
                            <div class="accessory-product-info">
                                <p class="accessory-product-name"><?php echo $product_all['product_name'] ?></p>
                                <p class="accessory-product-price"><?php echo number_format($product_all['product_price'], 0, ',', '.');  ?></p>
                                <div class="btn-accessory-product">
                                    <a href="#" class="favorite-product"><i class="fa fa-heart-o"></i></a>
                                    <a href="#" class="buy-button">Buy Now</a>
                                </div>
                            </div>
                        </div>
                    </a>
                    <?php } ?>
                </div>
                <div class="btn-all-accessory-product">
                    <button>XEM TẤT CẢ</button>
                </div>
            </div>
            
        </div>

    
        <div class="latest-news">
            <div class="title-news"><h3 class="la">LATEST VANS NEWS</h3></div>
            <div class="latest-news-primary">
                <a href="#">
                    <div class="latest-news-detail">
                        <div class="latest-new-img">
                            <img src="../img/new1.jpg">
                            <div class="latest-new-source">
                                <i class="fa fa-calendar-o"> 03/02/2023 ㅤĐăng bởi: VANS</i>
                            </div>
                            <div class="latest-new-title">
                                <h4><a href="#">BỘ SƯU TẬP BẤT ĐỐI XỨNG ĐƯỢC HỢP TÁC BỞI VANS X NEEDLES</a></h4>
                            </div>
                            <div class="latest-new-text">
                                <p>Là một tín đồ của nhà VANS, hẳn bạn sẽ dành một tình yêu nhẹ nhàng nhưng nồng cháy...</p>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="#">
                    <div class="latest-news-detail">
                        <div class="latest-new-img">
                            <img src="https://bizweb.dktcdn.net/thumb/large/100/140/774/articles/collina-3-shoes.jpg?v=1683364440520">
                            <div class="latest-new-source">
                                <i class="fa fa-calendar-o"> 03/02/2023 ㅤĐăng bởi: VANS</i>
                            </div>
                            <div class="latest-new-title">
                                <h4><a href="#">VANS X COLLINA STRADA - MỘT BỘ SƯU TẬP TƯƠI VUI</a></h4>
                            </div>
                            <div class="latest-new-text">
                                <p>VANS tự hào được hợp tác với Collina Strada, nhãn hiệu thời trang có trụ sở tại New York...</p>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="#">
                    <div class="latest-news-detail">
                        <div class="latest-new-img">
                            <img src="https://bizweb.dktcdn.net/thumb/1024x1024/100/140/774/articles/su-than-thien-den-tu-sieu-pham-vans-zahba-6.jpg?v=1680663695870">
                            <div class="latest-new-source">
                                <i class="fa fa-calendar-o"> 03/02/2023 ㅤĐăng bởi: VANS</i>
                            </div>
                            <div class="latest-new-title">
                                <h4><a href="#">SỰ THÂN THIỆN ĐẾN TỪ SIÊU PHẨM VANS ZAHBA</a></h4>
                            </div>
                            <div class="latest-new-text">
                                <p>Dòng sản phẩm dành cho nhà VANS Skateboarding vào tháng 1 cùng hợp tác với Alltimers....</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <script src="../js/slick.js"></script>
    
        <?php include "../model/footer.php"; ?>
    </body>
    
</html>