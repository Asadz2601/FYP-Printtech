<?php
    session_start();
    if(isset($_POST['submit'])){
        $file = $_FILES['pic']['name'];
        $tmp_name = $_FILES['pic']['tmp_name'];
        $destination = "../img/".$_FILES['pic']['name'];
        move_uploaded_file($tmp_name,$destination);
        $_SESSION['picture'] = $destination;
        header("Location: index.php");
    }
?>

<form method = "POST" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <input type="file" name="pic">
    <input type="submit" value="submit" name="submit">
</form>




<?php


if (isset($_SESSION['picture'])) {
  // Display the image using appropriate HTML and PHP code
  echo '<img src="../img/' . $_SESSION['picture'] . '" alt="Profile Image">';
} else {
  echo "Image information not found.";
}

?>