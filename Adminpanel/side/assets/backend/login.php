<?php
session_start();
include("connect/db.php");

if (isset($_SESSION['username'])) {
    header("location:index.php");
}

if (isset($_REQUEST['submit'])) {
    $username = mysqli_real_escape_string($conn, $_REQUEST['username']);
    $password = mysqli_real_escape_string($conn, $_REQUEST['password']);

    // Check in the admin table
    $adminSql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $adminResult = mysqli_query($conn, $adminSql);

    // Check in the users table
    $userSql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $userResult = mysqli_query($conn, $userSql);

    if (mysqli_num_rows($adminResult) > 0) {
        $_SESSION['username'] = $username;
        header("location:index.php");
        exit;
    } elseif (mysqli_num_rows($userResult) > 0) {
        $_SESSION['username'] = $username;
        header("location:dashboard.php");
        exit;
    } else {
        echo "<script>alert('Provided credentials are not valid');</script>";

    }
}
?>