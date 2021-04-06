<?php 

    include("../config/constants.php");

    if(isset($_GET['id']) && isset($_GET['image_name'])){
        $id = $_GET["id"];
        $image_name = $_GET['image_name'];

        if($image_name != ""){
            $path = "../images/category/".$image_name;
            $remove = unlink($path);

            if(!$remove){
                $_SESSION["remove"] = "<div class='error'>Failed to remove category image</div>";
                header("location:".SITEURL."admin/manage-categories.php");

                die();
            }
        }

        
        $sql = "DELETE FROM ofw_category WHERE id = $id";

        $res = mysqli_query($conn, $sql);

        if(!$res){
            $_SESSION["delete"] = "<div class='error'>Failed to delete category</div>";
            header("location:".SITEURL."admin/manage-categories.php");
        }else{
            $_SESSION["delete"] = "<div class='success'>Category deleted successfully</div>";
            header("location:".SITEURL."admin/manage-categories.php");
        }
    }else{
        header("location:".SITEURL."admin/manage-category.php");
    }

?>