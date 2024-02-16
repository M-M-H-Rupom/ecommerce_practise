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
            <table>
                <tr>
                    <th>ID  </th>
                    <th>Customer </th>
                    <th>Address </th>
                    <th>Date </th>
                    <th>Total </th>
                </tr>
                    <?php
                    $order_result = mysqli_query($conn,"SELECT * FROM orders");
                    while($order = mysqli_fetch_assoc($order_result)){
                    ?>
                <tr>
                    <td><?php echo $order['id'] ?>  </td>
                    <td><a href=""><?php echo $order['customer_name'] ?></a>  </td>
                    <td><?php echo $order['address'] ?>  </td>
                    <td><?php echo date("d/m/Y") ?>  </td>
                    <td><?php echo $order['total'] ?>  </td>
                </tr>
                <?php }?>
            </table>
        </div>
    </div>
</body>
</html>