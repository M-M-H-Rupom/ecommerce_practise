<?php
include('admin/functions.php');
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
    <?php include 'header.php' ?> 
      
      <div class="e_sidebar_content">
           <?php
           include "sidebar.php"
           ?>
            <div class="e_content">
            <?php 
                    $all_products = catch_product();
                    foreach($all_products as $products_row){
                      if(isset($_GET['category_id']) && !in_array($_GET['category_id'],(explode(',',$products_row['category'])))  ){
                        continue;
                      }
                      ?>

                            <a href="single_product.php?single_id=<?php echo $products_row['id'] ?>" class="show_all_product">
                             <img style="width : 80% ; height : auto" src="./upload_images/<?php echo $products_row['image'] != ""  ? $products_row['image']  : 'image_p.png'  ?>" alt=""> 
                              <h4><?php echo $products_row['title'] ?> </h4>
                              <p>Price: <?php echo $products_row['price']  ?>TK </p>
                            </a>
                          
                             
                <?php } ?>
             
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