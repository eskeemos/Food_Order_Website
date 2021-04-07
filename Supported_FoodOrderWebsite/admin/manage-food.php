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
                                <a href="#" class='btn-secondary'>Update Food</a>
                                <a href="#" class='btn-danger'>Delete Food</a>
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
