<?php
    include('functions.php');
    if (!isset($_SESSION)) {
        session_start();
    };
    $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
    $total = 0;
    foreach($cart as $product_id => $qty ){ 
        $p_row = catch_product( $product_id );
        $sub_total = $qty * $p_row['price'];
        $total += $sub_total;
        ?>
<?php }
    if(isset($_POST['place_order'])){
        if (isset($_SESSION['cart'])) unset($_SESSION['cart']);
        $customer_name = $_POST['c_name'];
        $customer_address = $_POST['c_address'];
        $total = $_POST['total'];
        mysqli_query($conn,"INSERT INTO orders SET customer_name='$customer_name', address='$customer_address', total='$total'");
    }
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
                Checkout
            </div>
            <div class="product_details_checkout">
                <div class="card_product_details">
                   <div class="customer_details_for_order">
                      <form action="" method="post">
                        <label for="">Customer Name : 
                            <input type="text" name="c_name" id="">
                        </label>
                        <label for="">Customer Address :
                            <input type="text" name="c_address" id="">
                        </label>
                        <input type="text" name="total" value="<?php echo $total; ?>">
                        <?php 
                            foreach($cart as $product_id => $qty ){?>
                            <input type="text" name="product_order_id[]" id="" value="<?php echo $product_id ?>">
                            <?php }
                        ?>
                        <input type="submit" name="place_order" value="Place Order">
                      </form>
                   </div>
                </div>
                <div class="cart_product_ckeckout">
                <?php 
                    foreach($cart as $product_id => $qty ){
                        $p_row = catch_product( $product_id );
                        ?>
                        <div class="cart_image_content">
                            <div class="cart_product_image">
                                <img style="width:70px; height:auto" src="./upload_images/<?php echo $p_row['image'] ?>" alt="">
                            </div>
                            <div class="cart_product_details_content">
                                <h5> <?php echo $p_row['title'] ?> </h5>
                                <p> <?php echo $p_row['descriptions'] ?> </p>
                                <p> <strong>Price:</strong> <?php  echo $p_row['price'] ?>TK </p>
                                <form action="" method="post">
                                    <input type="hidden" name="product_id" value="<?php echo $p_row['id']; ?>">
                                    <p> <strong>Quantity :</strong> <?php echo $qty; ?></p>
                                </form>   
                            </div>
                        </div>
                    <?php } ?>
                    <div class="check_total_amount">
                        <h2>Total :  <?php echo $total; ?> TK </h2>
                    </div>
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