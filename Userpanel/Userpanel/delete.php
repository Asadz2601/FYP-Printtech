<?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "userpanel";


    $conn = new mysqli($servername, $username, $password,$db);

    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    $id = $_GET['id'];
    $sql = "DELETE FROM uploadfile WHERE id = $id";
    $res = mysqli_query($conn,$sql);
    if($res){
        //echo "Delete File";
        header("Location: upload-file.php");

    }else{
        echo "Error in query";
    }

?>