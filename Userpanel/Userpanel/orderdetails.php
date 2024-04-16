<?php
  include('connect/db.php');
  session_start();
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
    <?php
 include('sidebar.php');
?>

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Order Details</h1>
        </div><!-- End Page Title -->

        <section class="section contact">
            <section class="section contact">

                <div class="row gy-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Order Details</h5>
                            <form>
                                <div class="form-group row" style="font-weight: bold;">
                                    <div class="col-md-6">
                                        <label for="ex1">Order ID</label>
                                        <input type="text" name="name" class="form-control" placeholder="#12334"
                                            required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="ex1">Order Name</label>
                                        <input type="text" name="name" class="form-control"
                                            placeholder="Select Product Name" required>
                                    </div>
                                    <div class="col-md-6" style="margin-top: 15px;">
                                        <label for="ex1">Size</label>
                                        <input type="text" name="name" class="form-control" placeholder="Select Size"
                                            required>
                                    </div>
                                    <div class="col-md-6" style="margin-top: 15px;">
                                        <label for="ex1">Paper Quality</label>
                                        <input type="text" name="name" class="form-control"
                                            placeholder="Select Paper Quality" required>
                                    </div>

                                    <div class="col-md-6" style="margin-top: 15px;">
                                        <label for="ex1">Printing Side</label>
                                        <input type="text" name="name" class="form-control"
                                            placeholder="Single or Double" required>
                                    </div>
                                    <div class="col-md-6" style="margin-top: 15px;">
                                        <label for="ex1">Cutting</label>
                                        <input type="text" name="name" class="form-control"
                                            placeholder="Round, Straight">
                                    </div>
                                    <div class="col-md-6" style="margin-top: 15px;">
                                        <label for="ex1">Quantity</label>
                                        <input type="text" name="name" class="form-control"
                                            placeholder="Enter Quantity of order" required>
                                    </div>
                                    <div class="col-md-6" style="margin-top: 15px;">
                                        <label for="ex1">Total Amount</label>
                                        <input type="text" name="name" class="form-control" placeholder="">
                                    </div>
                                </div>
                                <div class="pre-next-btn" style="margin-top: 25px; float: right;">
                                    <a style="background-color: #3498db;
        padding: 10px 20px; font-size: 16px; color: #fff; border: none; border-radius: 5px; cursor: pointer; text-decoration: none;" href="upload-file.php">Previous</a>
                                    <a style="background-color: #3498db;
        padding: 10px 20px; font-size: 16px; color: #fff; border: none; border-radius: 5px; cursor: pointer; text-decoration: none;" href="customerdetail.php">Next</a>
                                  </div>
                            </form>
                        </div>
                    </div>
                </div>

            </section>
        </section>
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <?php
  include('footer.php');
 ?>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Template Main JS File -->
    <!-- <script src="assets/js/main.js"></script> -->
    <script src="https://static.elfsight.com/platform/platform.js" data-use-service-core defer></script>
  <div class="elfsight-app-517ba237-cf3e-444f-aa5d-c43210cada9d" data-elfsight-app-lazy></div>
</body>

</html>