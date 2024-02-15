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
            <div class="e_content_img_details">
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