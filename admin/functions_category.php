<?php 
include('../conn_database.php');
$conn = connection();
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
   }
    $single_result = mysqli_query($conn,"SELECT * FROM categories WHERE id='$id'");
    $single_row = mysqli_fetch_assoc($single_result);
    return $single_row;
}
?>