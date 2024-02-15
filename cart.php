<?php
    include('functions.php');
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eCommerce</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div class="e_conteiner">
        <?php include('header.php') ?>
        <div class="card_content">
            <div class="card_title">
                Cart
            </div>
            <div class="product_details_checkout">
                <div class="card_product_details">
                   <div class="product_heading">
                        Product
                   </div>
                    <?php 
                        if (!isset($_SESSION)) {
                            session_start();
                        };
                        if(isset($_POST['product_remove'])){
                            $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
                            $id = $_POST['product_id'];
                            unset($cart[$id]);
                            $_SESSION['cart'] = $cart;
                        }
                        $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
                        foreach($cart as $product_id => $qty ){
                            $p_row = catch_product( $product_id );
                            ?>
                            <div class="cart_image_content">
                                <div class="cart_product_image">
                                    <img style="width:70px; height:auto" src="./upload_images/<?php echo $p_row['image'] ?>" alt="">
                                </div>
                                <div class="cart_product_details">
                                    <h5> <?php echo $p_row['title'] ?> </h5>
                                    <p> <?php echo $p_row['descriptions'] ?> </p>
                                    <p> Price: <?php  echo $p_row['price'] ?>TK </p>
                                    <form action="" method="post">
                                        <input type="hidden" name="product_id" value="<?php echo $p_row['id']; ?>">
                                        <input type="number" name="qty" id="" value="<?php echo $qty; ?>">
                                        <input type="submit" name="product_remove" value="Remove">
                                        <input type="submit" name="product_update" value="Update">
                                        
                                    </form>
                                </div>
                            </div>
                        <?php } ?>
                </div>
                <div class="cart_product_ckeckout">
                   checkout
                </div>
            </div>
        </div>   
      <footer>
        <div class="e_footer">
          <h2>Footer</h2>
        </div>
      </footer>
    </div>
</body>
</html>