<?php
session_start();
include('connect/db.php');
if($_SESSION['order_id']==null){
    echo "<script>alert('First Enter Order Detail')  </script>";
    $_SESSION['order_id']=0;

}
else{
$id = $_SESSION['order_id'];
}
$name = $_SESSION['username'];
if(isset($_REQUEST['delete'])){
  $sql = "DELETE  FROM uploadfile WHERE username = '$name'";
  
    $res = mysqli_query($conn,$sql);
    if($res){
        //echo "Delete File";
        header("Location: upload-file.php");

    }else{
        echo "Error in query";
    }
}

 
$filename  = "";
$file_tmp = "";
$msg = "";

// Assuming you have established a database connection already

// Check if form is submitted
if (isset($_POST['submit'])) {

  // Check if a file is uploaded
  if(isset($_FILES['pdffile']) && $_FILES['pdffile']['error'] === UPLOAD_ERR_OK) {

      $allowedext = array('pdf');
      $filename   = $_FILES['pdffile']['name'];
      $file_tmp   = $_FILES['pdffile']['tmp_name'];
      $filetype   = $_FILES['pdffile']['type'];

      $ext = pathinfo($filename, PATHINFO_EXTENSION);

      if (!in_array($ext, $allowedext)) {
          echo "<script>alert('Please Upload Only PDF File');</script>";
      } else {
          echo "<script>alert('File Upload Successfully');</script>";
          move_uploaded_file($file_tmp, "upload_PDF/" . $filename);
          
                   // Insert into database
          $sql = "INSERT INTO uploadfile (order_id, username, filename, filetype) VALUES ('$id', '$name', '$filename', '$filetype')";
          
          $res = mysqli_query($conn, $sql);
          if ($res) {
              echo "File Uploaded Successfully";
          } else {
              echo "Show Error";
          }
      }
  } else {
      echo "No file uploaded or error occurred.";
  }
}


if (!(isset($_SESSION['username']))) {
  header("Location: pages-login.php");
}

?>