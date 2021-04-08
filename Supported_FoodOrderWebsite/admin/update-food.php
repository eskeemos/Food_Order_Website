<?php include("./partials/menu.php") ?>

<?php 
    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $sql2 = "SELECT * FROM ofw_food WHERE id = $id";
        
        $res2 = mysqli_query($conn, $sql2);

        $row = mysqli_fetch_assoc($res2);
        $title = $row['title'];
        $desc = $row['description'];
        $price = $row['price'];
        $current_image = $row['image_name'];
        $category = $row['category_id'];
        $featured = $row['featured'];
        $active = $row['active'];

    }else{
        header('loaction:' .SITEURL . 'admin/manage-food.php');
    }
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Food</h1>
        <br>
        <br>
        <form action="" method="POST" enctype="multipart/form-data">
            <table class='tb-30' enctype='multipart/form-data'>
                <tr>
                    <td>Title:</td>
                    <td>
                        <input type="text" name="title" value="<?php echo $title ?>">
                    </td>
                </tr>
                <tr>
                    <td>Description:</td>
                    <td>
                        <textarea name="description" cols="22" rows="5"><?php echo $desc; ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Price:</td>
                    <td>
                        <input type="number" name="price" value="<?php echo $price; ?>"></input>
                    </td>
                </tr>
                <tr>
                    <td>Current&nbsp;Image:</td>
                    <td>
                        <?php 
                            if($current_image != ""){
                                ?>
                                    <img src="../images/food/<?php echo $current_image ?>" alt="image" width="100px" height="100px">
                                <?php
                            }else{
                                ?>
                                    <div class="error">Image not available</div>
                                <?php
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Select&nbsp;new&nbsp;image:</td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>
                <tr>
                    <td>Category:</td>
                    <td>
                        <select name="category">
                            <?php
                                $sql = "SELECT * FROM ofw_category WHERE active = 'yes'";

                                $res = mysqli_query($conn, $sql);

                                $count = mysqli_num_rows($res);

                                if($count > 0){
                                    while($row = mysqli_fetch_assoc($res)){
                                        $category_title = $row['title'];
                                        $category_id = $row['id'];
                                        ?>
                                        <option <?php if($category == $category_id){echo "selected";} ?> value="<?php echo $category_id ?>"><?php echo $category_title ?></option>
                                        <?php
                                    }
                                }else{
                                    echo '<option value="0">Category not available</option>';
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Featured:</td>
                    <td>
                        <input <?php if($featured == 'yes'){echo 'checked';} ?> type="radio" name="featured" value="yes">yes
                        <input <?php if($featured == 'no'){echo 'checked';} ?> type="radio" name="featured" value="no">no
                    </td>
                </tr>
                <tr>
                    <td>Active:</td>
                    <td>
                        <input <?php if($active == 'yes'){echo 'checked';} ?> type="radio" name="active" value="yes">yes
                        <input <?php if($active == 'no'){echo 'checked';} ?> type="radio" name="active" value="no">no
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                        <input type="submit" class="btn-secondary" name="submit">
                    </td>
                </tr>
            </table>
        </form>   
        <?php
        
            if(isset($_POST['submit'])){
                $id = $_POST['id'];
                $title = $_POST['title'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $current_image = $_POST['current_image'];
                $category = $_POST['category'];
                $featured = $_POST['featured'];
                $active = $_POST['active'];

                if(isset($_FILES['image']['name'])){
                    $image_name = $_FILES['image']['name'];
                    
                    if($image_name != ""){
                        $ext = end(explode('.', $image_name));
                        $image_name = "Food_Name_" . rand(0000,9999) . '.' . $ext;

                        $src = $_FILES['image']['tmp_name'];
                        $destPath = "../images/food/" . $image_name;

                        $upload = move_uploaded_file($src, $destPath);

                        if(!$upload){
                            $_SESSION['upload'] = '<div class="error">Failed to upload file</div>';
                            header('loaction:' . $SITEURL . 'admin/manage-food.php');
                            die();
                        }

                        if($current_image != ""){
                            $path = "../images/food/" . $current_image;
                            $remove = unlink($path);

                            if(!$remove){
                                $_SESSION['remove'] = '<div class="error">Failed to remove file</div>';
                                header('loaction:' . $SITEURL . 'admin/manage-food.php');
                                die();
                            }
                        }
                    }else{
                        $image_name = $current_image;
                    }
                }else{
                    $image_name = $current_image;
                }

                $sql3 = "UPDATE ofw_food SET title = '$title', description = '$description',price = $price, image_name = '$image_name', category_id = $category_id,featured = '$featured', active = '$active' WHERE id = $id";
                
                $res3 = mysqli_query($conn, $sql3);

                if($res3){
                    $_SESSION['update'] = '<div class="success">Food Updated Successfully</div>';
                    header('location:'. SITEURL . 'admin/manage-food.php');
                }else{
                    $_SESSION['update'] = '<div class="error">Failed to update</div>';
                    header('location:'. SITEURL . 'admin/manage-food.php');
                }
            }

        ?>
    </div>
</div>

<?php include("./partials/footer.php") ?>
