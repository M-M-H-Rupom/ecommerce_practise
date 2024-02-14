<?php 
include('../conn_database.php');
$conn = connection();
 if(isset($_POST['add_new_category'])){
    $name = $_POST['name'];
    mysqli_query($conn,"INSERT INTO categories SET name ='$name' ");
}
// delete category
if(isset($_GET['action']) && $_GET['action'] == 'delete'){
    $product_id = $_GET['category_id'];
    mysqli_query($conn,"DELETE FROM categories WHERE id='$product_id' ");
}
// fetch category all data 
function catch_category($id = 0){
   $conn = connection();
   if($id == 0){
        $category = [];
        $results = mysqli_query($conn,"SELECT * FROM categories");
        while($category_row = mysqli_fetch_assoc($results)){
            $category[] = $category_row;
        }
        return $category;
   }else{
        $single_result = mysqli_query($conn,"SELECT * FROM categories WHERE id='$id'");
        $single_row = mysqli_fetch_assoc($single_result);
        return $single_row;
   }
}
?>