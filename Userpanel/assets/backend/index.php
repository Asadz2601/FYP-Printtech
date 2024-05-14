<?php
include('connect/db.php');
$name = $_SESSION['username'];

$sql = "SELECT username FROM profile WHERE username = '$name'";
$res = mysqli_query($conn, $sql);

if ($res) {
  $row = mysqli_fetch_assoc($res);

  // Now you can use $row to access the data
  // ...
} else {
  // Handle the error, for example:
  die("Error in SQL query: " . mysqli_error($conn));
}



?>