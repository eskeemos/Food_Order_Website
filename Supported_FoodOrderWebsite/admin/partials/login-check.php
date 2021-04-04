<?php

    if(!isset($_SESSION['user'])){
        $_SESSION['no-login-mess'] = "<div class='error text-center'>Please login to access Admin Panel</div>";
        header("location:".SITEURL."admin/login.php");
    }

?>