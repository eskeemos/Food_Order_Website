<?php include("partials/menu.php") ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>

        <br>

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

        $conn = mysqli_connect('localhost','root','')              or die(mysqli_error());
        $db_select = mysqli_select_db($conn,"supp_order_food_web") or die(mysqli_error());
        $res = mysqli_query($conn,$sql)                            or die(mysqli_error());

    }

?>