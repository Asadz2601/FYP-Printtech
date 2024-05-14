<?php
session_start();
unset($_SESSION['picture']);
unset($_SESSION['username']);

session_destroy();
header("Location:pages-login.php");

?>
