<?php
if(isset($_REQUEST['edit'])){
    $id=$_REQUEST['id'];
    $pname=$_REQUEST['pname'];
    $size=$_REQUEST['size'];
    $pquality=$_REQUEST['pquality'];
    $printsize=$_REQUEST['printsize'];
    $cutting=$_REQUEST['cutting'];
    $updateQuery = "UPDATE `product` SET `pname`='$pname',`size`='$size',`pquality`='$pquality',`printsize`='$printsize',`cutting`='$cutting' WHERE id='$id'";
    if(mysqli_query($conn,$updateQuery)){
        echo "<script>alert('Updated Successfuly!');</script>";

    }
}

?>