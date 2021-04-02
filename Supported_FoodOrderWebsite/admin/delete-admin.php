<?php

    include("../config/constants.php");

    $id = $_GET['id'];

    $sql = "DELETE  FROM ofw_admin WHERE id=$id";

    $res = mysqli_query($conn, $sql);

    if($res){
        echo "Admin deleted";
    }else{
        echo "Failed to delete admin";
    }



?>