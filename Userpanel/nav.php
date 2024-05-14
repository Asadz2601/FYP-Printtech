<?php
session_start();
include("connect/db.php");
if (!(isset($_SESSION['username']))) {
  header("location:pages-login.php");
}
?>
<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center bg-secondary">
  <div class="d-flex align-items-center justify-content-between">
    <a href="index.html" class="logo d-flex align-items-center">
      <img src="" alt="">
      <span class="d-none d-lg-block bg-light">PRINTTECH</span>
    </a>
  </div><!-- End Logo -->

  <nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center">
      <li class="nav-item d-block d-lg-none">
        <a class="nav-link nav-icon search-bar-toggle " href="#">
          <i class="bi bi-search"></i>
        </a>
      </li>
      <!-- End Search Icon -->

      <?php
      $usernames=$_SESSION['username'];
      $adminQuery = "SELECT * FROM `users` WHERE username = '$usernames'";
      $adminResult = mysqli_query($conn, $adminQuery);

      $rows = "";
      if ($adminResult->num_rows > 0) {
        $adminRow = $adminResult->fetch_assoc();
        $rows= $adminRow['name'];
      } else {
        $userQuery = "SELECT * FROM `users` WHERE username = '$usernames'";
        $userResult = mysqli_query($conn, $userQuery);

        if ($userResult->num_rows > 0) {
          $userRow = $userResult->fetch_assoc();
          $rows=$userRow['name'];
        }
      }
      ?>

      <li class="nav-item dropdown pe-3 bg-light">
        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
          <?php
          $imgquery = mysqli_query($conn,"SELECT * FROM `profile` WHERE username = '$usernames'");
          $row = mysqli_fetch_assoc($imgquery);
          ?>
          <img src="uploads/img/<?php echo $row['pic']; ?>" alt="" class='rounded-circle bg-light'>
          <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $rows; ?></span>
        </a><!-- End Profile Iamge Icon -->

        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
          <li class="dropdown-header">
            <h6><?php echo $rows?></h6>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>
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
