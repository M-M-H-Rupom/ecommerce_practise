<?php
include "../conn.php";
$conn = connection();
include 'session.php';
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
        <div class="e_sidebar_content">
            <?php
include "sidebar.php"
?>
            <div class="e_content">
                <div class="e_content_title">
                    <h3>Add product</h3>
                </div>

                <div class="add_product_form">
                    <?php
$conn = connection();
if (isset($_POST['add_new_product'])) {

    $file = ($_FILES['product_image']);
    $image_name = $file['name'];
    $from = $file['tmp_name'];
    $to = '../upload_images/' . $image_name;
    $upload_image = move_uploaded_file($from, $to);

    $title = $_POST['title'];
    $description = $_POST['description'];
    $category = isset($_POST['category']) ? implode(",", $_POST['category']) : "";
    $price = $_POST['price'];
    $image = $image_name;
    mysqli_query($conn, "INSERT INTO ecommerce SET title='$title', descriptions= '$description', category= '$category', price = '$price', image= '$image' ");
}
if (isset($_POST['update_product'])) {
    $file = ($_FILES['product_image']);
    $image_name = $file['name'];
    $from = $file['tmp_name'];
    $to = '../upload_images/' . $image_name;
    $upload_image = move_uploaded_file($from, $to);
    $id = $_POST['h_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $category = implode(",", $_POST['category']);
    $price = $_POST['price'];
    $previous_image = $_POST['previous_image'];
    $image = $image_name == "" ? $previous_image : $image_name;
    mysqli_query($conn, "UPDATE ecommerce SET title='$title', descriptions= '$description', category= '$category', price = '$price', image= '$image' WHERE id='$id' ");

}
?>
                    <?php
$product_data = false;
if (isset($_GET['action']) && $_GET['action'] == 'edit') {
    $id = $_GET['product_id'];
    $conn = mysqli_connect("localhost", "root", "mysql", "php-shop");
    $product_result = mysqli_query($conn, "SELECT * FROM ecommerce WHERE id = '$id' ");
    $product_data = mysqli_fetch_assoc($product_result);
}
?>
                    <form action="" method="post" enctype="multipart/form-data">

                        <label for="Title">
                            <input value="<?php echo isset($product_data['title']) ? $product_data['title'] : "" ?>"
                                placeholder="Product Title " type="text" name="title" id="">
                        </label>
                        <p>Description</p>
                        <textarea name="description" id="" cols="30"
                            rows="10"> <?php echo isset($product_data['descriptions']) ? $product_data['descriptions'] : "" ?> </textarea>
                        <label for="">Price<input type="number" name="price" id=""
                                value="<?php echo isset($product_data['price']) ? $product_data['price'] : '' ?>">
                        </label>
                        <?php
$conn = mysqli_connect("localhost", "root", "mysql", "php-shop");
$product_categorys = isset($product_data['category']) ? $product_data['category'] : "";
$product_category_explode = explode(",", $product_categorys);
$category_result = mysqli_query($conn, "SELECT * FROM categories");
while ($category_row = mysqli_fetch_assoc($category_result)) {?>
                        <label for="category_<?php echo $category_row['id'] ?>">
                            <input type="checkbox"
                                <?php echo in_array($category_row['id'], $product_category_explode) ? 'checked' : '' ?>
                                name="category[]" id="category_<?php echo $category_row['id'] ?>"
                                value="<?php echo $category_row['id'] ?>"> <?php echo $category_row['name'] ?>
                        </label>
                        <?php }?>
                        <label for="product_image">Product Image <div><input type="file" name="product_image"
                                    id="product_image"> </div></label>
                        <?php if ($product_data != false) {?>
                        <input type="hidden" name="h_id" value="<?php echo $product_data['id'] ?>">
                        <input type="hidden" name="previous_image" value="<?php echo $product_data['image']; ?>">
                        <input type="submit" name="update_product" value="Update Product">

                        <?php } else {?>
                        <input type="submit" name="add_new_product" value="Add Product">
                        <?php }?>


                    </form>
                </div>
            </div>
        </div>

    </div>
</body>

</html>