<?php 
    include('functions_menu.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
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
                   $menus = catch_menu();
                    foreach($menus as $menu){
                ?>
                <tr>
                    <td><?php echo $menu['id'] ?>  </td>
                    <td><?php echo $menu['my_name'] ?>  </td>
                    <td><?php echo $menu['link'] ?>  </td>
                    <td>
                        <a href="add_menu.php?action=edit&menu_id=<?php echo $menu['id'] ?>"> Edit </a>
                        <a href="?action=delete&menu_id=<?php echo $menu['id'] ?>"> Delete </a>
                    </td>
                </tr>
          <?php }?>





            </table>
        </div>
    </div>
</body>
</html>