<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/lichsumuahang.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>

<body>
    <?php include "../model/header.php"; ?>
    <?php
    require "../admin/connect.php";
    $customer_id = $_SESSION['customer_id'];
    $sql = "SELECT
                    orders.order_id
                    customer_id,
                    name_receiver,
                    phone_receiver,
                    address_receiver,
                    order_status,
                    ship,
                    order_date,
                    total_price,
                    product.product_name,
                    product.product_price,
                    product.product_classify,
                    product_image.img_1,
                    product.product_id,
                    order_detail.quantity
                FROM
                    `orders`
                LEFT JOIN order_detail ON order_detail.order_id = orders.order_id
                LEFT JOIN product ON product.product_id = order_detail.product_id
                LEFT JOIN product_image ON product_image.product_id = product.product_id
                WHERE
                    orders.customer_id = $customer_id";
    $result = mysqli_query($conn, $sql);
    ?>
    <div class="content">
        <div class="title">Đơn Hàng Đã Mua</div>
        <div class="container">

            <div class="search">
                <form>
                    <div class="search-primary">
                        <input type="text" name="search" placeholder="Tìm kiếm">
                        <button><i class="fa fa-search"></i></button>
                    </div>
                </form>
            </div>
            <div class="list__product">
                <?php foreach ($result as $product) { ?>
                    <div class="list__product__primary">
                        <div class="product">

                            <div class="product_img">
                                <img src="<?php echo $product['img_1'] ?>">
                            </div>
                            <div class="product_name">
                                <p><?php echo $product['product_name'] ?></p>
                                <p style="opacity: 0.7;">Phân loại hàng: <?php echo $product['product_classify'] ?></p>
                                <p style="opacity: 0.7;">Số lượng: <?php echo $product['quantity'] ?></p>
                            </div>
                            <div class="product_price">
                                <p><?php echo number_format($product['product_price'], 0, ',', '.');  ?>đ</p>
                            </div>
                        </div>
                        <div class="total_price">
                            <p>Thành tiền: <span style="color:red;"><?php echo number_format($product['total_price'], 0, ',', '.');  ?>đ</span></p>
                        </div>
                        <div class="btn">
                            <div class="btn-primary">
                                <div class="btn-rating open-modal-btn"><button><a href="danhgiasanpham.php?product_id=<?php echo $product['product_id'] ?>">Đánh Giá</a></button></div>
                                <div class="btn-repurchase"><button>Mua Lại</button></div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <?php include "../model/footer.php"; ?>
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