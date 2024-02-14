<?php
    include('admin/functions.php');
    $conn = mysqli_connect("localhost","root","mysql","php-shop");
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
        <div class="e_header">
            <a href="./admin/dashboard.php">Dashboard</a>
            <h1><a href="./index.php"> Shop</a></h1>
        </div>
        <div class="e_navbar">
            <ul>
                <?php 
                    $conn = mysqli_connect("localhost","root","mysql","php-shop");
                    $menu_result = mysqli_query($conn,"SELECT * FROM menus");
                ?>
                <?php while($menu_row = mysqli_fetch_assoc($menu_result)){ ?>
                    <li>
                        <a href="<?php echo $menu_row['link'] ?>">
                            <?php echo $menu_row['my_name'] ?>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </div>
        <div class="card_content">
            <div class="card_title">
                Cart
            </div>
            <?php
            
            ?>
            <div class="product_details_checkout">
                <div class="product_details">
                   <div class="product_heading">
                        Product
                   </div>
                    <?php 
                        session_start();
                        if(isset($_POST['product_remove'])){
                            $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
                            $id = $_POST['product_id'];
                            $key = array_search($id,$cart);
                            unset($cart[$key]);
                            $_SESSION['cart'] = $cart;
                        }
                        
                        if( isset($_POST['product_update']) ) {
                            add_to_cart( $_POST['product_id'], $_POST['qty']);
                        }
                        $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
                        foreach($cart as $product_id => $qty ){
                            $p_row = catch_product( $product_id );
                            ?>
                            <div class="image_content">
                                <div class="product_details_image">
                                    <img style="width:70px; height:auto" src="./upload_images/<?php echo $p_row['image'] ?>" alt="">
                                </div>
                                <div class="product_details_content">
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
                <div class="product_ckeckout">
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