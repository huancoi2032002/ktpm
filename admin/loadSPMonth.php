<?php
if (isset($_GET['monthSelect']) && isset($_GET['yearSelect'])) {
    require 'connect.php';
    $monthSelect = $_GET['monthSelect'];
    $yearSelect = $_GET['yearSelect'];
        $sql = "SELECT
                    SUM(quantity*product.product_price) as total_amount,
                    COUNT(DISTINCT orders.customer_id) as so_nguoi_dat,
                    SUM(quantity) as total_quantity 
                FROM
                    order_detail
                LEFT JOIN orders ON orders.order_id = order_detail.order_id
                LEFT JOIN product ON order_detail.product_id = product.product_id
                WHERE
                    orders.order_status = 1 AND EXTRACT(MONTH FROM
                order_date) = $monthSelect and YEAR(orders.order_date) = $yearSelect
            ";
        $result = mysqli_query($conn, $sql);
        ?>
        <?php
        if (mysqli_num_rows($result) > 0) {  
            while($order = mysqli_fetch_array($result)){
        ?>  
                <div class="month">
                    <p><?php echo $monthSelect ?></p>
                </div>
                <div class="number_user">

                    <?php
                    echo $order['so_nguoi_dat'];

                    ?>
                </div>
                <div class="turnover">
                    <p><?php echo $order['total_amount'] ?>đ</p>
                </div>
                <div class="chi_tiet">
                    <p>Số lượng: <?php echo $order['total_quantity'] ?></p>
                </div>
                <div class="classic">
                    
                </div>
            <?php }?>
        <?php
        } else {
            echo "Không tìm thấy dữ liệu tương ứng";
        }
        ?>
<?php } ?>