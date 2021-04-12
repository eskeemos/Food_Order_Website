<?php include("partials/menu.php") ?>

    <div class="main-content">
        <div class="wrapper">
            <h1>Update Order</h1>
            <br>
            <br>
            <?php

                if(isset($_GET['id'])){
                    $id = $_GET['id'];

                }else{
                    header('location:'.SITEURL.'admin/manage-order.php');
                }

            ?>
            <form action="" method="POST">
                <table class="tb-30">
                    <tr>
                        <td>Food</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Qty</td>
                        <td>
                            <input type="number" name="qty" value="">
                        </td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>
                            <select name="status">
                                <option value="ordered">ordered</option>
                                <option value="on delivery">on delivery</option>
                                <option value="delivered">delivered</option>
                                <option value="cancelled">cancelled</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Customer&nbsp;Name:</td>
                        <td>
                            <input type="text" name="customer_name" value="">
                        </td>
                    </tr>
                    <tr>
                        <td>Customer&nbsp;Contact:</td>
                        <td>
                            <input type="text" name="customer_contact" value="">
                        </td>
                    </tr>
                    <tr>
                        <td>Customer&nbsp;Email:</td>
                        <td>
                            <input type="text" name="customer_email" value="">
                        </td>
                    </tr>
                    <tr>
                        <td>Customer&nbsp;Address:</td>
                        <td>
                            <textarea name="customer_address" id="" cols="22" rows="5"></textarea>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" class="btn-secondary">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>

<?php include("partials/footer.php") ?>