<?php include("partials/menu.php") ?>

    <div class="main-content">
        <div class="wrapper">
            <h1>Update Order</h1>
            <br>
            <br>
            <?php

                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    
                    $sql = "SELECT * FROM ofw_order WHERE id= $id";

                    $res = mysqli_query($conn, $sql);

                    $count = mysqli_num_rows($res);

                    if($count == 1){
                        $row = mysqli_fetch_assoc($res);
                        
                        $food = $row['food'];
                        $qty = $row['qty'];
                        $price = $row['price'];
                        $status = $row['status'];
                        $c_name = $row['customer_name'];
                        $c_contact = $row['customer_contact'];
                        $c_email = $row['customer_email'];
                        $c_address = $row['customer_address'];
                    }else{
                        header('location:'.SITEURL.'admin/manage-order.php');
                    }

                }else{
                    header('location:'.SITEURL.'admin/manage-order.php');
                }

            ?>
            <form action="" method="POST">
                <table class="tb-30">
                    <tr>
                        <td>Food</td>
                        <td>
                            <b><?php echo $food; ?></b>
                        </td>
                    </tr>
                    <tr>
                        <td>Price</td>
                        <td>
                        <b>$<?php echo $price; ?></b>
                        </td>
                    </tr>
                    <tr>
                        <td>Qty</td>
                        <td>
                            <input type="number" name="qty" value="<?php echo $qty; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>
                            <select name="status">
                                <option <?php if($status == 'ordered'){echo 'selected';}?> value="ordered">ordered</option>
                                <option <?php if($status == 'on delivery'){echo 'selected';}?> value="on delivery">on delivery</option>
                                <option <?php if($status == 'delivered'){echo 'selected';}?> value="delivered">delivered</option>
                                <option <?php if($status == 'cancelled'){echo 'selected';}?> value="cancelled">cancelled</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Customer&nbsp;Name:</td>
                        <td>
                            <input type="text" name="customer_name" value="<?php echo $c_name; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Customer&nbsp;Contact:</td>
                        <td>
                            <input type="text" name="customer_contact" value="<?php echo $c_contact; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Customer&nbsp;Email:</td>
                        <td>
                            <input type="text" name="customer_email" value="<?php echo $c_email; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Customer&nbsp;Address:</td>
                        <td>
                            <textarea name="customer_address" id="" cols="22" rows="5"><?php echo $c_address; ?></textarea>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <input type="hidden" name="price" value="<?php echo $price; ?>">
                            <input type="submit" name="submit" class="btn-secondary">
                        </td>
                    </tr>
                </table>
            </form>
            <?php 
                if(isset($_POST['submit'])){
                    $id = $_POST['id'];
                    $price = $_POST['price'];
                    $qty = $_POST['qty'];
                    $status = $_POST['status'];
                    $c_name = $_POST['customer_name'];
                    $c_contact = $_POST['customer_contact'];
                    $c_email = $_POST['customer_email'];
                    $c_address = $_POST['customer_address'];

                    $sql2 = "UPDATE ofw_order SET qty = $qty, status = '$status',customer_name = '$c_name',customer_contact = $c_contact, customer_email = '$c_email',customer_address = '$c_address' WHERE id = $id";
                    $res2 = mysqli_query($conn, $sql2);
                    if($res){
                        $_SESSION['update'] = '<div class="success">Order updated successfully</div>';
                        header('location:'.SITEURL.'admin/manage-order.php');
                    }else{
                        $_SESSION['update'] = '<div class="error">Failed to update order</div>';
                        header('location:'.SITEURL.'admin/manage-order.php');
                    }
                }
            ?>
        </div>
    </div>

<?php include("partials/footer.php") ?>