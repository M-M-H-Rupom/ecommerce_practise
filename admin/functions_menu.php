<?php
    include('../conn_database.php');
    $conn = connection();
    if (isset($_POST['add_menu_name'])) {
        $name = $_POST['menu_name'];
        $link = $_POST['link'];
        mysqli_query($conn, "INSERT INTO menus SET my_name ='$name', link = '$link' ");
    }
    if(isset($_POST['update_menu_name'])){
        $menu_id = $_POST['menu_id'];
        $name = $_POST['menu_name'];
        $link = $_POST['link'];
        mysqli_query($conn, "UPDATE menus SET my_name ='$name', link = '$link' WHERE id='$menu_id' ");
    }
    $menu =false;
    if(isset($_GET['action']) && $_GET['action'] == 'edit'){
        $menu_id= $_GET['menu_id'];
        $menu_result = mysqli_query($conn,"SELECT * FROM menus WHERE id='$menu_id' ");
        $menu = mysqli_fetch_assoc($menu_result);
    }
    // delete menu
    if(isset($_GET['action']) && $_GET['action'] == 'delete'){
        $menu_id = $_GET['menu_id'];
        delete_menu($menu_id);
    }
    function delete_menu($menu_id){
        $conn = connection();
        $data = mysqli_query($conn,"DELETE FROM menus WHERE id='$menu_id' ");
    }
    // get menus 
    function catch_menu(){
        $conn = connection();
        $results = mysqli_query($conn,"SELECT * FROM menus");
        $menu = [];
        while($menu_row = mysqli_fetch_assoc($results)){
           $menu[] = $menu_row;
        }
        return $menu;
    }
?>