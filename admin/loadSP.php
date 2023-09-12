<?php

require "connect.php";
$currentMonth = date('n');
$sql = "SELECT
            SUM(quantity*product.product_price) as doanh_thu,
            COUNT(DISTINCT orders.customer_id) as so_nguoi_dat,
            SUM(quantity) as quantity_sales
        FROM
            order_detail
        LEFT JOIN orders ON orders.order_id = order_detail.order_id
        LEFT JOIN product ON order_detail.product_id = product.product_id
        WHERE
            orders.order_status = 1 AND EXTRACT(MONTH FROM
                order_date) = $currentMonth
                ";
$result = mysqli_query($conn, $sql);
?>
<?php
if (mysqli_num_rows($result) > 0) {
    while ($order = mysqli_fetch_array($result)) { ?>
        <div class="month">
            <p><?php echo $currentMonth ?></p>
        </div>
        <div class="number_user">

            <?php
            echo $order['so_nguoi_dat'];

            ?>
        </div>
        <div class="turnover">
            <p><?php echo $order['doanh_thu'] ?>đ</p>
        </div>
        <div class="chi_tiet">
            <p>Số lượng: <?php echo $order['quantity_sales'] ?></p>
        </div>
        <div class="classic">
        </div>
    <?php }
    ?>

<?php
} else {
    echo "Không tìm thấy dữ liệu tương ứng";
}

?>