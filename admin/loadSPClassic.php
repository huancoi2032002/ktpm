<?php
if (isset($_GET['mySelect'])) {
    require 'connect.php';
    $currentMonth = date('n');
    $mySelect = $_GET['mySelect'];
        $sql = "SELECT
                    SUM(quantity*product.product_price) as total_amount,
                    COUNT(DISTINCT orders.customer_id) as so_nguoi_dat,
                    SUM(quantity) as total_quantity 
                FROM
                    order_detail
                LEFT JOIN orders ON orders.order_id = order_detail.order_id
                LEFT JOIN product ON order_detail.product_id = product.product_id
                WHERE
                    orders.order_status = 1 AND product.product_classify = '$mySelect'
            ";
        $result = mysqli_query($conn, $sql);
        ?>
        <?php
        if (mysqli_num_rows($result) > 0) {  
            while($order = mysqli_fetch_array($result)){
        ?>  
                <div class="month">
                    <p><?php echo $currentMonth ?></p>
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
                    <p>
                        <?php 
                            if($mySelect = "vansclassic"){
                                echo "VANS CLASSIC";
                            }else if($mySelect = "vansvault"){
                                echo "VANS VAULT";
                            }else if($mySelect = "vansoldskool"){
                                echo "VANS OLD SKOOL";
                            }else if($mySelect = "vansslipon"){
                                echo "VANS SLIP-ON";
                            }else if($mySelect = "vansauthentic"){
                                echo "VANS AUTHENTIC";
                            }else if($mySelect = "vanssk8"){
                                echo "VANS SK8";
                            }else if($mySelect = "vansera"){
                                echo "VANS ERA";
                            }
                        ?>
                    </p>
                </div>
            <?php }?>
        <?php
        } else {
            echo "Không tìm thấy dữ liệu tương ứng";
        }
        ?>
<?php } ?>