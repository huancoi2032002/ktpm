<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/danhgiasanpham.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>  
    <?php 
        require "../admin/connect.php";


        $product_id = $_GET['product_id'];
        $sql = "SELECT
                    product.product_id,
                    product.product_name,
                    product.product_price,
                    product.product_classify,
                    product.product_trademark,
                    product.product_describe,
                    product_image.img_1
                FROM
                    product
                LEFT JOIN product_image ON product_image.product_id = product.product_id
                Where
                    product.product_id = $product_id
                ";
        $result = mysqli_query($conn,$sql);
        $data = mysqli_fetch_array($result);
        
    ?>
    <?php require "../model/header.php"; ?>
    <div class="content">
        <div class="container">
            <div class="title">
                <p>Đánh giá sản phẩm</p>
            </div>
            <div class="rating__parent">
                <div class="product_rating">
                    <div class="product">
                        <div class="product_img">
                            <img
                                src="<?php echo $data['img_1'] ?>">
                        </div>
                        <div class="product_detail">
                            <div class="product_name"><?php echo $data['product_name'] ?></div>
                            <div class="product_trademark">Thương hiệu: VANS</div>
                        </div>
                        <div class="product_price">
                            <p><?php  echo number_format($data['product_price'], 0, ',', '.') ?>đ</p>
                        </div>
                    </div>
                </div>
                <form method="post" action="process_review.php">
                    <div class="rating_primary">
                        <div class="rating__star">
                            <input type="text" name="product_id" value="<?php echo $product_id ?>" hidden>
                            <div class="title_rating_star">
                                <p>Chất lượng sản phẩm: </p>
                            </div>
                            <div class="rating" data-rating="0">
                                <input type="radio" id="star5" value="5" name="rating" />
                                <label for="star5" id=""><i class="fa fa-star"></i></label>
                                <input type="radio" id="star4" value="4" name="rating" />
                                <label for="star4" id=""><i class="fa fa-star"></i></label>
                                <input type="radio" id="star3" value="3" name="rating" />
                                <label for="star3" id=""><i class="fa fa-star"></i></label>
                                <input type="radio" id="star2" value="2" name="rating" />
                                <label for="star2" id=""><i class="fa fa-star"></i></label>
                                <input type="radio" id="star1" value="1" name="rating" />
                                <label for="star1" id=""><i class="fa fa-star"></i></label>
                            </div>
                            <div class="satisfaction" id="satisfaction">
                                <p><span id="selectedRating"></span></p>
                            </div>
                        </div>
                        <div class="evaluate">
                            <div class="evaluate__primary">
                                <div class="title_evaluate">Chất lượng sản phẩm: </div>
                                <div class="content_rated">
                                    <textarea name="textbox"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="btn-rating">
                            <div class="btn-rating-primary">
                                <div class="btn-rating-agree"><button>Hoàn Thành</button></div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php require "../model/footer.php"; ?>
    <script>
        const stars = document.querySelectorAll('.rating input[type="radio"]');
        const rating = document.querySelector('.rating');
        const selectedRating = document.getElementById('selectedRating');

        rating.addEventListener('click', e => {
            const starValue = e.target.value;
            const star = parseInt(starValue);
            rating.setAttribute('data-rating', starValue);
            if (star == 1) {
                selectedRating.innerHTML = "Tệ";

            }
            if (star == 2) {
                selectedRating.innerHTML = "Không hài lòng";

            }
            if (star == 3) {
                selectedRating.innerHTML = "Bình thường";

            }
            if (star == 4) {
                selectedRating.innerHTML = "Hài lòng";

            }
            if (star == 5) {
                selectedRating.innerHTML = "Tuyệt vời";

            }

        });
    </script>
</body>

</html>