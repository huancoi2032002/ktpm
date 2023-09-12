<?php
    session_start();
    //unset($_SESSION['cart']);
    // Check if the necessary parameters are set
    if (isset($_GET['product_id'], $_GET['type'], $_GET['size'])) {
        $product_id = $_GET['product_id'];
        $type = $_GET['type'];
        $size = $_GET['size'];
        $quantity = $_SESSION['value_product'];
        // Check if the 'cart' session variable is not set
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }

        $product_exists = true;
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($key == $product_id && $value['size'] == $size) {
                $product_exists = true;
                $_SESSION['cart'][$key]['quantity']++;
                break;
            } elseif ($key == $product_id && $value['size'] != $size) {
                continue;
            }
        }

        // If the product does not exist in the cart, add it
            if($product_exists){
                require "../admin/connect.php";
                $sql = "SELECT
                            product.product_id,
                            product.product_name,
                            product.product_price,
                            product_image.img_1,
                            product_quantitys.size_38,
                            product_quantitys.size_39,
                            product_quantitys.size_40,
                            product_quantitys.size_41,
                            product_quantitys.size_42
                        FROM
                            product
                        LEFT JOIN product_image ON product_image.product_id = product.product_id
                        LEFT JOIN product_quantitys ON product_quantitys.product_id = product.product_id
                        WHERE product.product_id = '$product_id' 
                    ";
                $result = mysqli_query($conn,$sql);
                $each = mysqli_fetch_array($result);
                
                $_SESSION['cart'][$product_id] = array(
                    'size' => $size,
                    'quantity' => $quantity,
                    'product_name' => $each['product_name'],
                    'product_price' => $each['product_price'],
                    'img_1' => $each['img_1']
                    // Add more product details here as needed
                );
                
            }else if($product_exists){
                $_SESSION['cart'][$product_id]['quantity'] + 1;
            };
            echo print_r($_SESSION['cart']);
            

        // Redirect the user to a confirmation page or another appropriate location
        if($type==="btn-add-product"){
            header("Location:product_detail.php?product_id=$product_id");
        }else if($type==="buy-now"){
            header("Location:cart.php");
        }
        exit;
    } else {
        // Handle the case when the necessary parameters are missing
        // Display an error message or redirect the user back to the appropriate page
    }


    
    /*
    
    */
    
    