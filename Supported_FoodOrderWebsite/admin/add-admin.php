<?php include("partials/menu.php") ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>

        <br><br>

        <?php 
            if(isset($_SESSION['add'])){
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
        ?>

        <form action="" method="POST">
            <table class="tb-30">
                <tr>
                    <td>Full&nbsp;Name:</td>
                    <td>
                        <input type="text" name="full_name" placeholder="Enter Your Name">
                    </td>
                </tr>
                <tr>
                    <td>Username:</td>
                    <td>
                        <input type="text" name="username" placeholder="Enter Your Username">
                    </td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td>
                        <input type="password" name="password" placeholder="Enter Your Password">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php include("partials/footer.php") ?>

<?php

    if(isset($_POST['submit'])){
        $full_name = $_POST['full_name'];
        $username  = $_POST['username'];
        $password  = md5($_POST['password']);

        $sql = "INSERT INTO ofw_admin VALUES(NULL,'$full_name','$username','$password');";

        $res = mysqli_query($conn,$sql) or die(mysqli_error());

        if('res'){
            // echo 'Data inserted';
            $_SESSION['add'] = "Admin Added Sucessfully";
            header('location:'.SITEURL.'admin/manage-admin.php');
        }else{
            //echo 'Falied to insert data';
            $_SESSION['add'] = "Falied to insert data";
            header('location:'.SITEURL.'admin/add-admin.php');
        }
    }

?>