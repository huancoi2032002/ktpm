<?php
if (isset($_GET['search'])) {
    require '../admin/connect.php';
    $search = $_GET['search'];
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
        settype($page, "int");
    } else {
        $page = 1;
    }
    
    $sql_pt = "SELECT * FROM product";
    $x = mysqli_query($conn, $sql_pt);
    $tongsosp = mysqli_num_rows($x);
    $sotrang = ceil($tongsosp / 12);
    $from = ($page - 1) * 12;    
    $sql =
        "SELECT
                product.product_id,
                product.product_name,
                product.product_price,
                product.product_classify,
                product.product_trademark,
                product_image.img_1
            FROM
                product
            LEFT JOIN product_image ON product_image.product_id = product.product_id
            WHERE 
                product.product_name LIKE '%$search%' 
            LIMIT $from,12;
            ";
    $result = mysqli_query($conn, $sql);
?>
    <?php
        if (mysqli_num_rows($result) > 0) {
            

            
            while($product = mysqli_fetch_array($result)){
            
            
    ?>
                <a href="product_detail.php?product_id=<?php echo $product['product_id'] ?>">
                    <div class="product-box">
                        <div class="product-image">
                            <img src="<?php echo $product['img_1'] ?>">
                        </div>
                        <div class="product-info">
                            <p class="name-product"><?php echo $product['product_name'] ?></p>
                            <p class="price-product"><?php echo number_format($product['product_price'], 0, ',', '.');  ?> VND</p>
                            <div class="product-info-function">
                                <a href="#" class="favorite-product"><i class="fa fa-heart-o"></i></a>
                                <a href="product_detail.php?product_id=<?php echo $product['product_id'] ?>" class="buy-button">Buy Now</a>
                            </div>
                        </div>
                    </div>
                </a>
                
            <?php }?>
            <div class="number_pages">
                <?php
                
                for ($i = 1; $i <= $sotrang; $i++) {?>
                    <a href="javascript:loadSPSearch('<?php echo $search ?>', <?php echo $i ?>)" class="number_page"><div><p><?php echo $i ?></p></div></a>
                <?php
                };
                ?>
            </div>
    <?php
           
            } else {
                echo "Không tìm thấy sản phẩm tương ứng";
            }

    ?>


<?php } ?>