<?php
    require "connect.php";
    $product_id = $_GET['product_id'];
 
    $sql_disable_fk = "SET FOREIGN_KEY_CHECKS = 0;";
    $result_disable_fk = mysqli_query($conn, $sql_disable_fk);
    $sql = "DELETE product, product_image, product_quantitys
            FROM product
            LEFT JOIN product_image ON product_image.product_id = product.product_id
            LEFT JOIN product_quantitys ON product_quantitys.product_id = product.product_id
            WHERE product.product_id = '$product_id' 
            ";
    $result = mysqli_query($conn,$sql);
    $sql_enable_fk = "SET FOREIGN_KEY_CHECKS = 1;";
    $result_enable_fk = mysqli_query($conn, $sql_enable_fk);
    header('location:list_product.php')
?>