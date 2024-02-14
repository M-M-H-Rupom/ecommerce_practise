<?php
include('./admin/conn_database.php');
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
session_start(); 
if(isset($_POST['add_to_cart'])){
  $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
  $cart = $_POST['product_id'];
  $_SESSION['cart'] = $cart;
  var_dump($cart);
}
function add_to_cart( $pid, $qty = 1 ) {
    $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
    $cart[$pid] = $qty;
    $_SESSION['cart'] = $cart;
}
?>