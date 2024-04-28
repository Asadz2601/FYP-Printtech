<?php
session_start();
include('connect/db.php');
$id = $_SESSION['order_id'];
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


$username = $_SESSION['username'];
$query = "select * from profile where username='$username'";
$result = mysqli_query($conn, $query);


if ($result === false) {
  die(mysqli_error($conn));
}


if (mysqli_num_rows($result) > 0) {

if ($row = mysqli_fetch_assoc($result)) {



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>PRINTTECH</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="/Userpanel/Userpanel/assets/img/favicon.png" rel="icon">
  <!-- <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> -->

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="" class="logo d-flex align-items-center">
        <img src="/Userpanel/Userpanel/assets/img/favicon.png" alt="">
        <span class="d-none d-lg-block">PRINTTECH</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->


        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <?php
              $username = $_SESSION['username'];
              
              $resu = mysqli_query($conn, "SELECT * FROM profile WHERE username = '$username' ");
              while ($r = mysqli_fetch_assoc($resu)) {
                //echo $row['username'];
                echo "<img src='../img/" . $r['pic'] . "' alt='Profile' class='rounded-circle'>";
              } 
            ?>
            


             <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $row['username'];?></span>


          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $row['fullname']; ?></h6>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
<?php
        

  }
}
?>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.php">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.php">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="index.php">
          <i class="bi bi-pencil-square"></i>
          <span>Design Tool</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="upload-file.php">
          <i class="bi bi-file-earmark-arrow-up"></i>
          <span>Upload File</span>
        </a>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="orderdetails.php">
          <i class="bi bi-ticket-detailed"></i>
          <span>Order Detail</span>
        </a>
      </li><!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="customerdetail.php">
          <i class="bi bi-file-earmark-person"></i>
          <span>Customer Detail</span>
        </a>
      </li><!-- End Tables Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="#">
          <i class="bi bi-credit-card-2-front"></i>
          <span>Payment Method</span>
        </a>
      </li><!-- End Charts Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="#">
          <i class="bi bi-send-arrow-up"></i>
          <span>Place Order</span>
        </a>
      </li><!-- End Icons Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#">
          <i class="bi bi-grid"></i>
          <span>My Order</span>
        </a>
      </li><!-- End Icons Nav -->

      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="users-profile.php">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-contact.php">
          <i class="bi bi-envelope"></i>
          <span>Feedback & Suggesiton</span>
        </a>
      </li><!-- End Contact Page Nav -->

      
    </ul>

  </aside>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Upload File</h1>
    </div><!-- End Page Title -->


    



    <section class="section contact">

      <div class="row gy-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Note:</h5>
            <ol style="font-family:'Times New Roman', Times, serif;">
          <li>
            Make the design and then upload file here. 
          </li>
          <li>
            Only Pdf file Upload here.
          </li>
          <li>
            Make Sure your design size will be perfect.
          </li>
        </ol>
        <h3 style="font-family:'Times New Roman', Times, serif; font-weight: bold;">UPLOAD YOUR DESIGN FILE</h3>
            <div class="mb-3">
              <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
               <!-- <img src="http://100dayscss.com/codepen/upload.svg" class="upload-icon" /> -->
                <input style="height: 150px;" class="form-control" name="pdffile" type="file" id="upload">
            </div>
            <div class="pre-next-btn" style="margin-top: 25px; float: right;">
              <!-- <button id="pre-next" name="submit" type="submit">Previous</button> -->
              <a style="background-color: #3498db;
        padding: 10px 20px; font-size: 16px; color: #fff; border: none; border-radius: 5px; cursor: pointer; text-decoration: none;" href="index.php">Previous</a>
              <!-- <a style="text-decoration:none;color:black" href="index.php">Previous</a></button> &nbsp; -->
              <button style="background-color: #3498db;
        padding: 10px 20px; font-size: 16px; color: #fff; border: none; border-radius: 5px; cursor: pointer; text-decoration: none;" class="btn" type="submit" name="submit">Upload</button>  
              <button style="background-color: #3498db;
        padding: 10px 20px; font-size: 16px; color: #fff; border: none; border-radius: 5px; cursor: pointer; text-decoration: none;" class="btn" type="delete" name="delete">Delete</button>  
              <a style="background-color: #3498db;
        padding: 10px 20px; font-size: 16px; color: #fff; border: none; border-radius: 5px; cursor: pointer; text-decoration: none;" href="customerdetail.php">Next</a>
            </div>
          </div>
          </form>
        </div>

      </div>
      </div>

    </section>
  </main><!-- End #main -->
  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>PRINTTECH</span></strong>. All Rights Reserved
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Template Main JS File -->
  <!-- <script src="assets/js/main.js"></script> -->
  <script src="https://static.elfsight.com/platform/platform.js" data-use-service-core defer></script>
  <div class="elfsight-app-517ba237-cf3e-444f-aa5d-c43210cada9d" data-elfsight-app-lazy></div>
</body>

</html>