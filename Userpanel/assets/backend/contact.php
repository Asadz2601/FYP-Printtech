<?php
include('connect/db.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
session_start();
if (!(isset($_SESSION['username']))) {
    header("Location: pages-login.php");
}
if (isset($_REQUEST['submit'])) {
  $sql = "INSERT INTO   feedback(name, email, subject, message) VALUES ('" . $_REQUEST['name'] . "','" . $_REQUEST['email'] . "', '" . $_REQUEST['subject'] . "', '" . $_REQUEST['message'] . "')";
  if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Sent Successfully')  </script>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$username = $_SESSION['username'];
$query = "select * from profile where username='$username'";
$result = mysqli_query($conn, $query);

if ($result === false) {
  die(mysqli_error($conn)); // Output the SQL error for debugging
}

if (mysqli_num_rows($result) > 0) {

  if ($row = mysqli_fetch_assoc($result)) {


?>


  <!-- ======= Header ======= -->
  <?php
 include('header.php');
 include('nav.php');


  // <!-- ======= Sidebar ======= -->

 include('side.php');

  }}
?>