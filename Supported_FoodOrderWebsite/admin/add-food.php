<?php include("./partials/menu.php") ?>

    <div class="main-content">
        <div class="wrapper">
            <h1>Add Food</h1>
            <br>
            <?php

            if(isset($_SESSION['upload'])){
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }

            ?>
            <br>
            <form action="" method="POST" enctype="multipart/form-data">
                <table class="tb-30">
                    <tr>
                        <td>Title:</td>
                        <td>
                            <input type="text" name="title" placeholder="Food Title">
                        </td>
                    </tr>
                    <tr>
                        <td>Description:</td>
                        <td>
                            <textarea name="desc" cols="22" rows="5" placeholder="Description of the Food"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>Price:</td>
                        <td>
                            <input type="number" name="price">
                        </td>
                    </tr>
                    <tr>
                        <td>Image:</td>
                        <td>
                            <input type="file" name="image">
                        </td>
                    </tr>
                    <tr>
                        <td>Category:</td>
                        <td>
                            <select name="category">
                            <?php 
                                $sql = "SELECT * FROM ofw_category WHERE active = 'yes';";
                                $res = mysqli_query($conn, $sql);

                                $count = mysqli_num_rows($res);

                                if($count > 0){
                                    while($row = mysqli_fetch_assoc($res)){
                                        $id = $row['id'];
                                        $title = $row['title'];
                                        ?>
                                        <option value='<?php echo $id; ?>'><?php echo $title; ?></option>
                                        <?php
                                    }
                                }else{
                                    echo "<option value='0'>No category Found</option>";
                                }
                                
                            ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Featured:</td>
                        <td>
                            <input type="radio" value="yes" name="featured">yes
                            <input type="radio" value="no" name="featured" checked>no
                        </td>
                    </tr>
                    <tr>
                        <td>Active:</td>
                        <td>
                            <input type="radio" value="yes" name="active">yes
                            <input type="radio" value="no" name="active" checked>no
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" class="btn-secondary" value="Add Food">
                        </td>
                    </tr>

                </table>
            </form>
            <?php

                if(isset($_POST['submit'])){
                    $title = $_POST['title'];
                    $desc = $_POST['desc'];
                    $price = $_POST['price'];
                    $category = $_POST['category'];
                    $featured = $_POST['featured'];
                    $active = $_POST['active'];

                    if(isset($_FILES['image']['name'])){
                        $image_name = $_FILES['image']['name'];
                        if($image_name != ""){
                            
                            $ext = end(explode('.',$image_name));
                            $image_name = "Food_Name_". rand(0000,9999) . '.' . $ext;

                            $src = $_FILES['image']['tmp_name'];
                            $destination_path = "../images/food/" . $image_name;
                            $upload = move_uploaded_file($src,$destination_path);

                            if(!$upload){
                                $_SESSION['upload'] = '<div class="error">Failed to upload Image</div>';
                                header('location:'. $SITEURL . "admin/add-food.php");
                                die();
                            }
                        }
                    }else{
                        $image_name = "";
                    }
                    $sql2 = "INSERT INTO ofw_food VALUES(NULL,'$title','$desc',$price,'$image_name',$category,'$featured','$active');";
                    
                    $res2 = mysqli_query($conn, $sql2);

                    if($res2){
                        $_SESSION['add'] = '<div class="success">Food Added successfully</div>';
                    }else{
                        $_SESSION['add'] = '<div class="error">Failed to add Food</div>';
                    }
                    header('location:'.SITEURL."admin/manage-food.php");
                }

            ?>
        </div>
    </div>

<?php include("./partials/footer.php") ?>