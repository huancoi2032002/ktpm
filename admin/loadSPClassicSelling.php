<?php

    require 'connect.php';
    $currentMonth = date('n');
    $mySelect = $_GET['mySelect'];
    $sql =
        "SELECT
            product.product_id AS product_id,
            product.product_name,
            (
            SELECT
                IFNULL(SUM(quantity),
                0)
            FROM
                order_detail
            JOIN orders ON orders.order_id = order_detail.order_id
            WHERE
                order_detail.product_id = product.product_id AND orders.order_date = $currentMonth AND orders.order_status = 1
        ) AS quantity_sales
        FROM
            product
        WHERE
            product.product_classify = '$mySelect'
        ORDER BY
            quantity_sales
        DESC
            ";
    $result = mysqli_query($conn, $sql);
?>
<?php
if (mysqli_num_rows($result) > 0) {?>
    <tr>
        <th>Tháng</th>
        <th>ID</th>
        <th>Tên Sản Phẩm</th>
        <th>Số Lượng</th>
    </tr>
<?php
    while($product = mysqli_fetch_array($result)){?>
        <tr>
                <td>
                    <?php

                    echo $currentMonth;

                    ?>
                </td>
                <td>
                    <?php
                        echo $product['product_id'];
                    ?>
                        
                </td>
                <td>
                    <?php
                        echo $product['product_name'];
                    ?>
                </td>
                <td>
                    
                    <?php echo $product['quantity_sales']; ?>
                      
                </td>
            </tr>
    <?php }
?>
<?php
}else {
    echo "Không tìm thấy sản phẩm tương ứng";
}

?>
