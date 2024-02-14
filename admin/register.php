<?php 
 include('conn_database.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div class="container_login">
        <div class="user_login">
        <?php 
                   if(isset($_POST['register'])){
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $conform_password = $_POST['conform_password'];
                    $gmail = $_POST['gmail'];
                    if($password != $conform_password){
                        echo "password and conform password are not match";
                    }else{
                        mysqli_query($conn,"INSERT INTO user SET username= '$username', password= '$password', gmail= '$gmail'");
                        echo "Register successfully";
                    }
                    
                    // $register_result = mysqli_query($conn, "SELECT * FROM user WHERE username = $username , password = $password, gmail= $gmail ");
                   }
                   
        ?>
            <form action="" method="post">
                <label for="">Name
                    <input type="text" name="username" id="">
                </label>
                <label for="">Password
                    <input type="text" name="password" id="">
                </label>
                <label for="">Conform Password
                    <input type="text" name="conform_password" id="">
                </label>
                <label for="">Gmail
                    <input type="text" name="gmail" id="">
                </label>
                <label for=""><input type="submit" name="register" id="" value="Register"></label>
            </form>
        </div>
    </div>
</body>
</html>