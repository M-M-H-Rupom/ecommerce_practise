<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eCommerce</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div class="e_conteiner">
            <div class="e_header">
                <a href="./admin/dashboard.php">Dashboard</a>
                <h1><a href="./index.php"> Shop</a></h1>
            </div>
            <div class="e_navbar">
            <ul>
                <?php 
                    $conn = mysqli_connect("localhost","root","mysql","php-shop");
                    $menu_result = mysqli_query($conn,"SELECT * FROM menus");
                    while($menu_row = mysqli_fetch_assoc($menu_result)){ 
                ?>
                    <li><a href="<?php echo $menu_row['link'] ?>"> <?php echo $menu_row['my_name'] ?> </a></li>
                <?php } ?>
            </ul>
        </div>
        <div class="my_account_title">
            My account
        </div>
          <div class="my_account_sidebar_And_content">
              <div class="my_account_sidebar">
                   <ul>
                        <li><a href="my_account.php"> Dashboard</a> </li>
                        <li><a href="orders.php"> Orders</a> </li>
                        <li><a href="">Log out</a> </li>
                   </ul>
              </div>
              <div class="my_account_order">
                  <table>
                    <tr>
                        <th>Order id</th>
                        <th>Date</th>
                        <th>Total amount</th>
                    </tr>
                    <tr>
                        <td> 12 </td>
                        <td> 12 </td>
                        <td> 12 </td>
                    </tr>
                  </table>
              </div>
          </div>

               
      <footer>
        <div class="e_footer">
          <h2>Footer</h2>
        </div>
      </footer>
    </div>
</body>
</html>