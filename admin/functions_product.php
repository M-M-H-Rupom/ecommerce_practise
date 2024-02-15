<?php 
include('../conn_database.php');
$conn = connection();
// add product
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
//edit a product
$product_data = false;
if (isset($_GET['action']) && $_GET['action'] == 'edit') {
    $id = $_GET['product_id'];
    $product_result = mysqli_query($conn, "SELECT * FROM ecommerce WHERE id = '$id' ");
    $product_data = mysqli_fetch_assoc($product_result);
}
function catch_category(){
    $conn = connection();
    $category_data = [];
    $category_result = mysqli_query($conn, "SELECT * FROM categories");
    while ($category_row = mysqli_fetch_assoc($category_result)){
        $category_data[] = $category_row;
    }
    return $category_data;
}
//delete product
if(isset($_GET['action']) && $_GET['action'] == 'delete'){
    $product_id = $_GET['product_id'];
    mysqli_query($conn,"DELETE FROM ecommerce WHERE id='$product_id' ");
}
//    get product
function catch_product(){
    $conn = connection();
    $product_data = [];
    $result = mysqli_query($conn,"SELECT * FROM ecommerce");
    while($row = mysqli_fetch_assoc($result)){
       $product_data[] = $row;
    }
    return $product_data;
}
?>
