<?php include('../config/constants.php'); ?>
<html>
    <head>
        <title>Login - Food Order System</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>
    <body>
        
        <div class="login">
            <h1 class="text-center">Login</h1><br>

            <?php
            
                if(isset($_SESSION['login'])){
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }
                if(isset($_SESSION['no-login-mess'])){
                    echo $_SESSION['no-login-mess'];
                    unset($_SESSION['no-login-mess']);
                }

            ?>
            <br>
            <form action="" method="POST" class="text-center">
                Username: <br><input type="text" name="username" placeholder="Enter Username"> <br><br>
                Password: <br><input type="password" name="password" placeholder="Enter password"><br><br>
                <input type="submit" name="submit" value="Login" class="btn-primary"><br><br>
            </form>
            <p class="text-center">
                Created By - <a href="https://github.com/eskeemos">eskeemos</a>
            </p>
        </div>

    </body>
</html>

<?php

    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $sql = "SELECT * FROM ofw_admin WHERE username = '$username' AND password = '$password'";

        $res = mysqli_query($conn, $sql);

        $count = mysqli_num_rows($res);


        if($count === 1){
            $_SESSION['login'] = "<div class='success'>Login Successful</div>";
            $_SESSION['user'] = $username;

            header("location:".SITEURL."admin/index.php");
        }else{
            $_SESSION['login'] = "<div class='error'>Username or Password is incorrect</div>";
            header("location:".SITEURL."admin/login.php");
        }
    }

?>