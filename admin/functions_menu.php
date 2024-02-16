<?php
    include('../conn_database.php');
    $conn = connection();
    $menu = false;
    if(isset($_GET['action']) && $_GET['action'] == 'edit'){
        $menu_id= $_GET['menu_id'];
        $menu_result = mysqli_query($conn,"SELECT * FROM menus WHERE id='$menu_id' ");
        $menu = mysqli_fetch_assoc($menu_result);
    }
    if(isset($_GET['action']) && $_GET['action'] == 'delete'){
        $menu_id = $_GET['menu_id'];
        delete_menu($menu_id);
    }
    function delete_menu($menu_id){
        $conn = connection();
        $data = mysqli_query($conn,"DELETE FROM menus WHERE id='$menu_id' ");
    }
    function menu_add_menu_update(array $data){
        $conn = connection();
        $name = $data['menu_name'];
        $link = $data['link'];
        if(isset($data['menu_id'])){
            $menu_id = $data['menu_id'];
            mysqli_query($conn, "UPDATE menus SET my_name ='$name', link = '$link' WHERE id='$menu_id' ");
        } else{
            mysqli_query($conn, "INSERT INTO menus SET my_name ='$name', link = '$link' ");
        }
    }
    if (isset($_POST['add_menu_name']) || isset($_POST['update_menu_name']) ) {
        $mydata = array(
            'menu_name' => $_POST['menu_name'],
            'link'=> $_POST['link'],  
        );
        if( isset($_POST['update_menu_name']) ) $mydata['menu_id'] = $_POST['menu_id'];
        menu_add_menu_update($mydata);
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