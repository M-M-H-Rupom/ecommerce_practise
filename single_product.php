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
            <div class="e_header">
                <a href="./admin/dashboard.php">Dashboard</a>
                <h1><a href="./index.php"> Shop</a></h1>
            </div>
            <div class="e_navbar">
                <ul>
                    <?php 
                        $conn = mysqli_connect("localhost","root","mysql","php-shop");
                        $menu_result = mysqli_query($conn,"SELECT * FROM menus");
                        while($menu_row = mysqli_fetch_assoc($menu_result)){ 
                    ?>
                        <li><a href="<?php echo $menu_row['link'] ?>"> <?php echo $menu_row['my_name'] ?> </a></li>
                    <?php } 
                    ?>
                </ul>
            </div>
            <div class="e_content_img_details">

               <?php 
                if(isset($_GET['single_id']) ){
                    $id = $_GET['single_id'];
                    $single_row = catch_product( $id );
                    $category_string= $single_row['category'];
                    $category_array = explode(",",$category_string);
                    $category_result = mysqli_query($conn,"SELECT * FROM categories");
                    $category_names = [];
                    while($category_row = mysqli_fetch_assoc($category_result)){
                    if(in_array($category_row['id'],$category_array) ){
                        $category_names[] =  $category_row['name'];
                    }
                    }
                    $explode_array =  implode(',',$category_names);                   
                }
               ?> 
               <?php 
               session_start();
               $cart =[];
               if(isset($_POST['add_to_cart'])){
                add_to_cart( $_POST['product_id'], $_POST['quantity'] );
               }
               ?>
                    <div class="image_and_details">
                        <div class="image_details">
                            <img style="width : 60% ; text-align:center; height : auto" src="./upload_images/<?php echo $single_row['image'] != ""  ? $single_row['image']  : 'image_p.png'  ?>" alt="">
                        </div>
                        <div class="content_details">
                           <h1><?php echo $single_row['title'] ?> </h1>
                           <p>Price : <?php echo $single_row['price'] ?> TK </p>
                           
                           <form action="" method="post">
                                <input type="number" name="quantity" id="" value="1" >
                                <input type="hidden" name="product_id" value="<?php echo $single_row['id'] ?>">
                                <input type="submit" name="add_to_cart" value="Add to cart">
                           </form>
                           <p>Category : <?php echo  $explode_array  ?> </p>
                        </div>
                        
                    </div>

                    <div class="product_description">
                        <p> <span style="color:#c44569"> Description:</span> <?php echo $single_row['descriptions'] ?> </p>
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