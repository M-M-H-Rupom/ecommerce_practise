<?php 
    include('conn_database.php');
    include('session.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu </title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div class="p_container">
        <?php include 'sidebar.php';?>
        <div class="p_content">
            <h2>  Add Menu  </h2>
            <?php
                 $conn = mysqli_connect("localhost","root","mysql","php-shop");
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
                ?>
            <?php 
             $menu =false;
             if(isset($_GET['action']) && $_GET['action'] == 'edit'){
                $menu_id= $_GET['menu_id'];
                $conn = mysqli_connect("localhost","root","mysql","php-shop");
                $menu_result = mysqli_query($conn,"SELECT * FROM menus WHERE id='$menu_id' ");
                $menu = mysqli_fetch_assoc($menu_result);
             }
            ?>
            <form action="" method="post">
               <h3> <label for="menu_name"> Name
                    <input value="<?php echo (isset($menu['my_name'])) ? $menu['my_name'] : "" ?>" type="text" name="menu_name" id="menu_name">
                 </label> </h3>
                 <h3><label for="link"> Link
                    <input value="<?php echo (isset($menu['link'])) ? $menu['link'] : ""  ?>" type="text" name="link" id="link"> 
                 </label> </h3>
                 <?php 
                  if($menu != false){  ?>
                  <input type="hidden" name="menu_id" id="menu_id" value="<?php echo $menu['id'] ?>">
                  <h2><input type="submit" value="Update Menu" name="update_menu_name"></h2>
                    
                    
                 <?php  }else{ ?>
                    <h2><input type="submit" value="Add Menu" name="add_menu_name"></h2>
                <?php  }  ?>
               
                
            </form>
        </div>
    </div>
</body>
</html>