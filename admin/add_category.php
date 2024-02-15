<?php 
    include('functions_category.php');
    // delete category
    if(isset($_GET['action']) && $_GET['action'] == 'delete'){
        $product_id = $_GET['category_id'];
        mysqli_query($conn,"DELETE FROM categories WHERE id='$product_id' ");
    }
    if(isset($_POST['add_new_category'])){
        $name = $_POST['name'];
        mysqli_query($conn,"INSERT INTO categories SET name ='$name' ");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eCommerce</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="e_conteiner"> 
      <div class="e_sidebar_content">
           <?php
                include "sidebar.php"
           ?>
            <div class="e_content_form">
                <div class="e_content_title">
                    <h3>Add category</h3>
                </div>
                <div class="add_product_form">
                    <form action="" method="post">
                        <label for="Name"> 
                                <input placeholder="Category Name" type="text" name="name" id="">
                        </label>
                       <input type="submit" name="add_new_category" value="Add Category">
                    </form>
                </div>
            </div>
        </div>
      
    </div>
</body>
</html>