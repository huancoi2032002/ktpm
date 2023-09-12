<?php
    require "connect.php";
    $product_id = $_GET['product_id'];
if(
    isset($_POST['product_name']) && isset($_POST['product_classify']) && 
    !empty($_POST['product_name']) && !empty($_POST['product_classify'])&&
    isset($_POST['product_price']) && isset($_POST['product_trademark']) && 
    !empty($_POST['product_price']) && !empty($_POST['product_trademark'])&&
    isset($_POST['product_describe']) && isset($_POST['product_quantity_38']) && 
    !empty($_POST['product_describe']) && !empty($_POST['product_quantity_38'])&&
    isset($_POST['product_quantity_39']) && isset($_POST['product_quantity_40']) && 
    !empty($_POST['product_quantity_39']) && !empty($_POST['product_quantity_40'])&&
    isset($_POST['product_quantity_41']) && isset($_POST['product_quantity_42']) && 
    !empty($_POST['product_quantity_41']) && !empty($_POST['product_quantity_42'])
     
    ){
    
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price']  ;
    $product_classify = $_POST['product_classify'] ;
    $product_trademark = $_POST['product_trademark'] ;
    $product_describe = $_POST['product_describe'];
    $product_quantity_38 = $_POST['product_quantity_38'];
    $product_quantity_39 = $_POST['product_quantity_39'];
    $product_quantity_40 = $_POST['product_quantity_40'];
    $product_quantity_41 = $_POST['product_quantity_41'];
    $product_quantity_42 = $_POST['product_quantity_42'];
    

    $sql = "UPDATE
                product

            SET
                product.product_name = '$product_name',
                product.product_price = '$product_price',
                product.product_classify = '$product_classify',
                product.product_trademark = '$product_trademark',
                product.product_describe = '$product_describe'
            WHERE
                product_id = '$product_id'";
    $result = mysqli_query($conn,$sql);
    if($result){
        if(isset($_FILES['product_img']) && $_FILES['product_img']['error'] == 0 &&
        isset($_FILES['product_img2']) && $_FILES['product_img2']['error'] == 0 &&
        isset($_FILES['product_img3']) && $_FILES['product_img3']['error'] == 0 &&
        isset($_FILES['product_img4']) && $_FILES['product_img4']['error'] == 0 &&
        isset($_FILES['product_img5']) && $_FILES['product_img5']['error'] == 0)
        {
            $path = "../img/"; // Thư mục images để lưu ảnh
            $tmp_name = $_FILES['product_img']['tmp_name'];
            $name = $_FILES['product_img']['name'];
            $name2 = $_FILES['product_img2']['name'];
            $name3 = $_FILES['product_img3']['name'];
            $name4 = $_FILES['product_img4']['name'];
            $name5 = $_FILES['product_img5']['name'];
  
            $product_img = $path.$name;
            $product_img2 = $path.$name2;
            $product_img3 = $path.$name3;
            $product_img4 = $path.$name4;
            $product_img5 = $path.$name5;
            $sql = "UPDATE
                        product_image
                    SET
                        product_image.img_1 = '$product_img',
                        product_image.img_2 = '$product_img2',
                        product_image.img_3 = '$product_img3',
                        product_image.img_4 = '$product_img4',
                        product_image.img_5 = '$product_img5'
                    WHERE
                        product_id = '$product_id'
            ";
            $result_img = mysqli_query($conn, $sql);
        }
        if($product_quantity_38 && $product_quantity_39 && $product_quantity_40 && $product_quantity_41 && $product_quantity_42 != ""){
            $sql = "UPDATE
                        product_quantitys    
                    SET
                        product_quantitys.size_38 = '$product_quantity_38',
                        product_quantitys.size_39 = '$product_quantity_39',
                        product_quantitys.size_40 = '$product_quantity_40',
                        product_quantitys.size_41 = '$product_quantity_41',
                        product_quantitys.size_42 = '$product_quantity_42'
                    WHERE
                        product_id = '$product_id'

            ";
            $result_size = mysqli_query($conn,$sql);
        }
    }
    echo '<script>alert("Sửa sản phẩm thành công!");</script>';
    header('location:list_product.php');
} else {
    echo '<script>alert("Sửa sản phẩm không thành công!");</script>';
}

?>