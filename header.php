<header>
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
           <?php 
           
           ?> 

            
</header>
      