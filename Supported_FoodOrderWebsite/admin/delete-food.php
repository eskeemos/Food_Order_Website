<?php

    include("../config/constants.php");

    if(isset($_GET['id']) && isset($_GET['image_name'])){
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        if($image_name != ""){
            $path = "../images/food/" . $image_name;
            $remove = unlink($path);

            if(!$remove){
                $_SESSION['upload'] = '<div class="error">Failed to remove image</div>';
                header('location:' . SITEURL . 'admin/manage-food.php');
                die();
            }
        }
        $sql = "DELETE FROM ofw_food WHERE id = $id";
        $res = mysqli_query($conn, $sql);

        if($res){
            $_SESSION['delete'] = '<div class="success">Food Deleted Successfully</div>';
            header('location:' . SITEURL . 'admin/manage-food.php');
        }else{
            $_SESSION['delete'] = '<div class="error">Failed to delete food</div>';
            header('location:' . SITEURL . 'admin/manage-food.php');
        }
    }else{
        $_SESSION['unothorized'] = '<div class="error">Unauthorized Access.</div>';
        header('location:' . SITEURL . 'admin/manage-food.php');
    }
    

?>