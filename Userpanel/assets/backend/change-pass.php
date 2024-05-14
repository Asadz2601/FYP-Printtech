<br><br><br><br>
<?php



if (!(isset($_SESSION['username']))) {
  header("Location: pages-login.php");
}
include("connect/db.php");


$username = $_SESSION['username'];

if (isset($_REQUEST['psubmit'])) {
  $sql = "SELECT password FROM `users` WHERE username='$username'";

  $result = mysqli_query($conn, $sql);

  if ($result) {
    // Fetch the password from the result set
    $row = mysqli_fetch_assoc($result);

    // Check if the entered password matches the stored password
    if ($row['password'] ==  $_REQUEST['password']) {

      // Passwords match, update the password
      $new_password = $_REQUEST['newpassword'];

      $sql2 = "UPDATE `users` SET `password`='$new_password' WHERE username='$username'";
      //     echo($sql2);
      //  exit;
      //   echo($new_password);
      // echo($_REQUEST['password']);
      // echo($row['password']);
      // exit;
      if (mysqli_query($conn, $sql2)) {
        echo "<script>alert('Update Successfully')</script>";
      } else {
        echo "Error occurred while updating the record!<br>";
        echo "Reason: " . mysqli_error($conn);
      }
    } else {
      // Passwords do not match
      echo "Incorrect password!";
    }
  } else {
    // Query failed
    echo "Error: " . mysqli_error($conn);
  }
}
