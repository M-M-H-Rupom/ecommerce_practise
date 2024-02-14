<?php 
 include('conn_database.php');
 session_start();
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
            if(isset($_POST['login'])){
                $username = $_POST['username'];
                $password= $_POST['password'];
                $user_result = mysqli_query($conn,"SELECT * FROM user WHERE username='$username' AND password='$password'");
                $user_data = mysqli_fetch_assoc($user_result);
                if(mysqli_num_rows($user_result) > 0){
                    echo "Logged in successfully";
                    $_SESSION['username']= $user_data['username'];
                }else{
                    echo "failed to login";
                }
            }
            if(isset($_SESSION['username'])){
                header('location:dashboard.php');
            }
            ?>
            <form action="" method="post">
                <label for="">Name
                    <input type="text" name="username" id="">
                </label>
                <label for="">Password
                    <input type="text" name="password" id="">
                </label>
                
                <label for="">Gmail
                    <input type="text" name="gmail" id="">
                </label>
                <label for=""><input type="submit" name="login" id="" value="Login"></label>
                <label for="">
                    <p> If you doesn't have any account , register now  <a href="register.php" style="border:1px solid #ffeaa7;color: #d63031;padding: 4px 8px; text-decoration:none;margin-left:12px">Register</a></p>
                </label>
            </form>
        </div>
    </div>
</body>
</html>