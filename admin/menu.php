<?php 
  include('session.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <?php 
     $conn = mysqli_connect("localhost","root","mysql","php-shop");
     if(isset($_GET['action']) && $_GET['action'] == 'delete'){
        $menu_id = $_GET['menu_id'];
        delete_menu($menu_id);
     }
     function delete_menu($menu_id){
        $conn = mysqli_connect("localhost","root","mysql","php-shop");
        $data = mysqli_query($conn,"DELETE FROM menus WHERE id='$menu_id' ");
     }
    ?>
    <div class="p_container">
        <?php include 'sidebar.php';?>
        <div class="content">
            <h2> All Menu <a class="p_content_a" href="add_menu.php"> Add Menu </a> </h2>
            <table>

            <tr>
                <th>ID  </th>
                <th>Name </th>
                <th>Link </th>
                <th>Action </th>
            </tr>
            <?php
                $conn = mysqli_connect("localhost","root","mysql","php-shop");
                $result = mysqli_query($conn, "SELECT * FROM menus");
                while ($menu_row = mysqli_fetch_assoc($result)) {?>
                    <tr>
                        <td><?php echo $menu_row['id'] ?>  </td>
                        <td><?php echo $menu_row['my_name'] ?>  </td>
                        <td><?php echo $menu_row['link'] ?>  </td>
                        <td>
                            <a href="add_menu.php?action=edit&menu_id=<?php echo $menu_row['id'] ?>"> Edit </a>
                            <a href="?action=delete&menu_id=<?php echo $menu_row['id'] ?>"> Delete </a>
                        </td>
                    </tr>
          <?php }?>





            </table>
        </div>
    </div>
</body>
</html>