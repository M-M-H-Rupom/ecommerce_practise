<?php
function connection(){
    $conn = mysqli_connect("localhost","root","mysql","php-shop");
    return $conn;
}
?>