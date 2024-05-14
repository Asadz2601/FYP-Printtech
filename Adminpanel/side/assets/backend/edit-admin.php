<?php
if(isset($_REQUEST['edit'])){
    $id=$_REQUEST['id'];
    $pname=$_REQUEST['name'];
    $size=$_REQUEST['username'];
    $pquality=$_REQUEST['email'];
    $printsize=$_REQUEST['phone'];
    $cutting=$_REQUEST['address'];
    $updateQuery = "UPDATE `admin` SET `name`='$pname',`username`='$size',`email`='$pquality',`phone`='$printsize',`address`='$cutting' WHERE id='$id'";
    if(mysqli_query($conn,$updateQuery)){
        echo "<script>alert('Updated Successfuly!');</script>";

    }
}

?>