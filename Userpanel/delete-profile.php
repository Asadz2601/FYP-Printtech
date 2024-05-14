<?php
    include("connect/db.php");
    $id = $_GET['id'];
    
    $sql = "UPDATE profile SET pic = NULL WHERE id = $id";

    $res = mysqli_query($conn,$sql);
    if($res){
        header("Location: users-profile.php");
    }else{
        echo "Error in Code";
    }
?>