<?php include("partials/menu.php") ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Food</h1>
        <br>
        <?php 
        
            if(isset($_SESSION['add'])){
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
            if(isset($_SESSION['delete'])){
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }
            if(isset($_SESSION['upload'])){
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
            if(isset($_SESSION['update'])){
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }
            if(isset($_SESSION['remove'])){
                echo $_SESSION['remove'];
                unset($_SESSION['remove']);
            }
            if(isset($_SESSION['unothorized'])){
                echo $_SESSION['unothorized'];
                unset($_SESSION['unothorized']);
            }

        ?>
        <br>
        <a href="<?php echo SITEURL; ?>admin/add-food.php" class="btn-primary">Add Food</a>
        <br>
        <br>
        <table class="tb-full">
            <tr>
                <th>S.N.</th>
                <th>Title</th>
                <th>Price</th>
                <th>Image</th>
                <th>Featured</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>
            <?php
                $sql = "SELECT * FROM ofw_food";
                $res = mysqli_query($conn, $sql);

                $sn = 1;

                $count = mysqli_num_rows($res);
                if($count > 0){
                    while($row = mysqli_fetch_assoc($res)){
                        $id = $row['id'];
                        $title = $row['title'];
                        $price = $row['price'];
                        $image = $row['image_name'];
                        $featured = $row['featured'];
                        $active = $row['active'];
                    ?>
                        <tr>
                            <td><?php echo $sn++;?></td>
                            <td><?php echo  $title; ?></td>
                            <td><?php echo  $price; ?></td>
                            <td>
                                <?php
                                    if($image == ''){
                                        echo '<div class="error">Image not Added yet</div>';
                                    }else{
                                        ?>
                                        <img src="../images/food/<?php echo $image ?>" alt="food photo" width="100px" height="100px">
                                        <?php
                                    }
                                ?>
                            </td>
                            <td><?php echo  $featured; ?></td>
                            <td><?php echo  $active; ?></td>
                            <td>
                                <a href="<?php echo SITEURL; ?>admin/update-food.php?id=<?php echo $id ?>" class='btn-secondary'>Update Food</a>
                                <a href="<?php echo SITEURL; ?>admin/delete-food.php?id=<?php echo $id ?>&image_name=<?php echo $image ?>" class='btn-danger'>Delete Food</a>
                            </td>
                        </tr>
                    <?php
                    }
                }else{
                    ?>
                        <tr>
                            <td colpan="7">Food not added yet</td>
                        </tr>
                    <?php
                }
            ?>
        </table>
    </div>
</div>

<?php include("partials/footer.php") ?>
