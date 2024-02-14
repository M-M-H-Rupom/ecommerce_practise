<?php
include '../conn.php';
$conn = mysqli_connect("localhost","root","mysql","php-shop");
if(isset($_GET['action']) && $_GET['action'] == 'delete'){
    $product_id = $_GET['product_id'];
    mysqli_query($conn,"DELETE FROM ecommerce WHERE id='$product_id' ");
}
?>

<?php 
  include('session.php');
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
    <div class="p_container">
        <?php include 'sidebar.php'; ?>
       <div class="content">
         <h2>All products <a href="add_product.php">Add product</a></h2>
          <table>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Category</th>
                <th>Price</th>
                <th>Product image</th>
                <th>Action </th>
            </tr>
            <?php
                $conn = mysqli_connect("localhost","root","mysql","php-shop");
                $result = mysqli_query($conn,"SELECT * FROM ecommerce");
                while($row = mysqli_fetch_assoc($result)){?>
                  <tr> 
                    <td><?php echo $row['title'] ?></td>
                    <td><?php echo $row['descriptions'] ?></td>
                    <td><?php 
                              $category_string= $row['category'];
                              $category_array = explode(",",$category_string);
                              $category_result = mysqli_query($conn,"SELECT * FROM categories");
                              $category_names = [];
                              while($category_row = mysqli_fetch_assoc($category_result)){
                                if(in_array($category_row['id'],$category_array) ){
                                   $category_names[] =  $category_row['name'];
                                }
                              }
                              echo implode(',',$category_names);
                         ?>
                    </td>
                    <td><?php echo $row['price'] ?></td>
                    <td> <img style="width : auto ; height : 50px" src="../upload_images/<?php    echo $row['image'] != ""  ? $row['image']  : 'image_p.png'  ?>" alt=""> </td>
                    <td>
                        <a href="add_product.php?action=edit&product_id=<?php echo $row['id'] ?>">Edit</a>
                        <a href="?action=delete&product_id=<?php echo $row['id'] ?>">Delete</a>
                    </td>
                    
                  </tr>
              <?php   } ?>
            

            <tr>

            </tr>
          </table>
       </div>
    </div>
</body>
</html>