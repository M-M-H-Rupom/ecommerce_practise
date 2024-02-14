
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eCommerce</title>
    <link rel="stylesheet" href="../css/style.css">

</head>
<body>
    <div class="p_container">
        <?php include 'sidebar.php'; ?>

       <div class="content">
           <h2 style="color:#FD7272">Welcome     !  <br> welcome to your dashboard</h2>
       </div>
    </div>
    <?php 
    session_start();
     if(isset($_POST['logout'])){
        unset($_SESSION['username']);
     }
     
     if(!isset($_SESSION['username'])){
        header('location:login.php');
      }
    ?>
   
   
</body>
</html>