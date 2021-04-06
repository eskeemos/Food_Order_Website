<?php include("./partials/menu.php") ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Category</h1>
        <br>
        <?php

            if(isset($_GET["id"])){
                $id = $_GET["id"];
                $sql = "SELECT * FROM ofw_category WHERE id = $id";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);

                if($count == 1){
                    $row = mysqli_fetch_assoc($res);
                    $title = $row["title"];
                    $current_image = $row["image_name"];
                    $featured = $row["featured"];
                    $active = $row["active"];
                }else{
                    $_SESSION['no-category-count'] = "<div class='error'>Category not found<div>";
                    header("location:".SITEURL."admin/manage-categories.php");
                }
                

            }else{
                header("location:".SITEURL."admin/manage-categories.php");
            }

        ?>
        <br>
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tb-30">
                <tr>
                    <td>Title:</td>
                    <td>
                        <input type="text" name="title" value="<?php echo $title ?>">
                    </td>
                </tr>
                <tr>
                    <td>Current&nbsp;Image:</td>
                    <td>
                        <?php 
                            if($current_image != ""){
                                ?>

                                    <img src="<?php echo SITEURL; ?>images/category/<?php echo $current_image; ?>" width="100px" height="100px">

                                <?php
                            }else{
                                echo "<div class='error'>Image not Added</div>";
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>New&nbsp;Image:</td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>
                <tr>
                    <td>Featured:</td>
                    <td>
                        <input <?php if($featured === "yes"){echo "checked";} ?> type="radio" name="featured" value="yes">yes
                        <input <?php if($featured === "no"){echo "checked";} ?> type="radio" name="featured" value="no">no
                    </td>
                </tr>
                <tr>
                    <td>Active:</td>
                    <td>
                        <input <?php if($active === "yes"){echo "checked";} ?> type="radio" name="active" value="yes">yes
                        <input <?php if($active === "no"){echo "checked";} ?> type="radio" name="active" value="no">no
                    </td>
                </tr>
                <tr>
                    <td rowspan="2">
                        <input type="hidden" name="current_image" value="<?php echo $current_image ?>">
                        <input type="hidden" name="id" value="<?php echo $id ?>">
                        <input type="submit" name="submit" value="Update Category" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
        <?php

            if(isset($_POST['submit'])){
                $id = $_POST['id'];
                $title = $_POST['title'];
                $current_image = $_POST['current_image'];
                $featured = $_POST["featured"];
                $active = $_POST["active"];

                if(isset($_FILES["image"]["name"])){
                    $image_name = $_FILES["image"]["name"];
                    if($image_name != ""){
                        $ext = end(explode('.',$image_name));
                        $image_name = "Food_Category_".rand(000,999).".".$ext;

                        $source_path = $_FILES['image']['tmp_name'];
                        $destination_path = "../images/category/" . $image_name;
                        $upload = move_uploaded_file($source_path, $destination_path);
                        
                        if(!$upload){
                            $_SESSION['upload'] = "<div class='error'>Failed to upload Image</div>";
                            header("loaction:".SITEURL."admin/manage-category.php");
                            die();
                        }
                        if($current_image != ""){
                            echo "rem";
                            $remove_path = "../images/category/". $current_image;
                            $remove = unlink($remove_path);

                            if(!$remove){
                                $_SESSION['failed-remove'] = "<div class='error'>Failed to remove current Image</div>";
                                header("loaction:".SITEURL."admin/manage-category.php");
                                die();
                            }
                        }
                    }else {
                        $image_name = $current_image;
                    }
                }else{
                    $image_name = $current_image;
                }
                $sql2 = "UPDATE ofw_category SET title = '$title', image_name = '$image_name',featured = '$featured', active = '$active' WHERE id = $id";

                $res2 = mysqli_query($conn, $sql2);

                if($res2){
                    $_SESSION['update'] = "<div class='success'>Category updated successfully</div>";
                    header("location:".SITEURL."admin/manage-categories.php");
                }else{
                    $_SESSION['update'] = "<div class='error'>Failed to update category</div>";
                    header("location:".SITEURL."admin/manage-categories.php");
                }           
            }

        ?>
    </div>
</div>

<?php include("./partials/footer.php") ?>
