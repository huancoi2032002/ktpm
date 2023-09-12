<?php
require "connect.php";
// Check if form fields are set and not empty
$formatted_date = (new DateTime())->format('Y-m-d H:i:s');
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
    
    // Retrieve the form data
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
    

    
    // Do something with the form data, such as inserting it into a database
    $sql = "INSERT INTO `product`(`product_name`, `product_price`, `product_classify`, `product_trademark`, `product_describe`,`product_postingtime`) VALUES ('$product_name','$product_price','$product_classify','$product_trademark','$product_describe','$formatted_date')";
    $result = mysqli_query($conn,$sql);
    if($result){
        $receipt_id  = mysqli_insert_id($conn);
        
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
            $sql = "INSERT INTO `product_image`(`product_id`,`img_1`,`img_2`,`img_3`,`img_4`,`img_5`) 
                VALUES ('$receipt_id','$product_img','$product_img2','$product_img3','$product_img4','$product_img5')";
            $result_img = mysqli_query($conn, $sql);
        }
        if($product_quantity_38 && $product_quantity_39 && $product_quantity_40 && $product_quantity_41 && $product_quantity_42 != ""){
            $sql = "INSERT INTO `product_quantitys`(`product_id`, `size_38`, `size_39`, `size_40`, `size_41`, `size_42`) VALUES ('$receipt_id','$product_quantity_38','$product_quantity_39','$product_quantity_40','$product_quantity_41','$product_quantity_42')";
            $result_size = mysqli_query($conn,$sql);
        }
    }
    // Send a response back to the client
    $response = array('success' => true);
    echo json_encode($response);
    
} else {
    // Send an error response back to the client
    $response = array('success' => false);
    echo json_encode($response);
}

?>
