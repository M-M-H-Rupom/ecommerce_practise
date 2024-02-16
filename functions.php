<?php
include('conn_database.php');
$conn = connection();
function catch_product($id = 0){
    $conn = connection();
    if( $id == 0){
        $results = mysqli_query($conn,"SELECT * FROM ecommerce");
        $product_data = [];
        while($row = mysqli_fetch_assoc($results)){
            $product_data[] = $row;
        }
        return $product_data;
    } else{
        $result = mysqli_query($conn,"SELECT * FROM ecommerce WHERE id= '$id'");
        $single_row = mysqli_fetch_assoc($result);
        return $single_row;
    }
}
function add_to_cart( $pid, $qty = 1 ) {
    session_start();
    $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
    if(isset($cart[$pid])){
        $pre_qty = $cart[$pid];
        $qty = $qty + $pre_qty;
    }
    $cart[$pid] = $qty;
    $_SESSION['cart'] = $cart;
}
function product_update( $pid, $qty = 1 ) {
    session_start();
    $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
    $cart[$pid] = $qty;
    $_SESSION['cart'] = $cart;
}
if(isset($_GET['single_id']) ){
    $conn = connection();
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