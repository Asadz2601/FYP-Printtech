<?php
include('connect/db.php');
session_start();
if (isset($_REQUEST['submit'])) {
  $sql = "select * from users where username='{$_REQUEST['username']}' and password='{$_REQUEST['password']}'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    $_SESSION['username'] = $_REQUEST['username'];
    if (isset($_SESSION['username'])) {
      $username = $_SESSION['username'];
      header("Location: index.php");
    } else {
      echo "Error in query: " . mysqli_error($conn);
    }
  } 
}
?>