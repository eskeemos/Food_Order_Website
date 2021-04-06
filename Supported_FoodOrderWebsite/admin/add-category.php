<?php include("./partials/menu.php"); ?>

    <div class="main-content">
        <div class="wrapper">
            <h1>Add Category</h1>

            <br>
            <?php

                if(isset($_SESSION['add'])){
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }

            ?>

            <br> 

            <form action="" method="POST" enctype="multipart/form-data">
                <table class="tb-30">
                    <tr>
                        <td>Title:</td>
                        <td>
                            <input type="text" name="title" placeholder="Category title">
                        </td>
                    </tr>
                    <tr>
                        <td>Select Image:</td>
                        <td>
                            <input type="file" name="image">
                        </td>
                    </tr>
                    <tr>
                        <td>Featured:</td>
                        <td>
                            <input type="radio" name="featured" value="yes"> Yes
                            <input type="radio" name="featured" value="no" checked> No
                        </td>
                    </tr>
                    <tr>
                        <td>Active:</td>
                        <td>
                            <input type="radio" name="active" value="yes"> Yes
                            <input type="radio" name="active" value="no" checked> No
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" value="Add Category" class="btn-secondary">
                        </td>
                    </tr>
                </table>
            </form>

            <?php

                if(isset($_POST['submit'])){
                    $title = $_POST['title'];
                    if(isset($_POST['featured'])){
                        $featured = $_POST['featured'];
                    }else{
                        $featured = 'no';
                    }
                    if(isset($_POST['active'])){
                        $active = $_POST['active'];
                    }else{
                        $active = 'no';
                    }
                    if($_FILES['image']['name'] !== ""){
                        $image_name = $_FILES['image']['name'];

                        $ext = end(explode('.',$image_name));
                        $image_name = "Food_Category_".rand(000,999).".".$ext;

                        $source_path = $_FILES['image']['tmp_name'];
                        $destination_path = "../images/category/" . $image_name;
                        $upload = move_uploaded_file($source_path, $destination_path);
                        
                        if(!$upload){
                            $_SESSION['upload'] = "<div class='error'>Failed to upload Image</div>";
                            header("loaction:".SITEURL."admin/add-category.php");
                            die();
                        }
                    }else{
                        $image_name = "";
                    }
                    // print_r($_FILES['image']);
                    // die();

                    $sql = "INSERT INTO ofw_category VALUES(NULL,'$title','$image_name','$featured','$active');";

                    $res = mysqli_query($conn,$sql);

                    if($res){
                        $_SESSION["add"] = "<div class='success'>Category Added Successfully</div>";
                        header("location:".SITEURL."admin/manage-categories.php");
                    }else{
                        $_SESSION["add"] = "<div class='error'>Failed To Add Category</div>";
                        header("location:".SITEURL."admin/manage-categories.php");
                    }

                }

            ?>

        </div>
    </div>

<?php include("./partials/footer.php"); ?>
