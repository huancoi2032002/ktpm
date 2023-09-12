<?php
    require 'connect.php';
    $order_id = $_GET['order_id'];
    $order_status = $_GET['order_status'];
    echo $order_id;
    echo $order_status;

    $sql = "UPDATE orders SET order_status = $order_status where order_id = '$order_id'";
    mysqli_query($conn,$sql);
    header('location:order_confirmation.php');
?>