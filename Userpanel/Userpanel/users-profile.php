<?php
include('top.php');
if (!(isset($_SESSION['username']))) {
  header("Location: pages-login.php");
}
include("connect/db.php");


$username = $_SESSION['username'];

if (isset($_REQUEST['psubmit'])) {
  $sql = "SELECT password FROM users WHERE username='$username'";

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

if (isset($_REQUEST['update'])) {

  $a = $_FILES['pic']['name'];
  $tmp_name = $_FILES['pic']['tmp_name'];
  $destination = "../img/" . $_FILES['pic']['name'];
  move_uploaded_file($tmp_name, $destination);
  $b = $_REQUEST['fullname'];
  $c = $_REQUEST['username'];
  $d = $_REQUEST['about'];
  $e = $_REQUEST['company'];
  $f = $_REQUEST['job'];
  $g = $_REQUEST['country'];
  $h = $_REQUEST['address'];
  $i = $_REQUEST['phone'];
  $j = $_REQUEST['email'];
  $k = $_REQUEST['twitter'];
  $l = $_REQUEST['facebook'];
  $m = $_REQUEST['instagram'];
  $n = $_REQUEST['linkdin'];
  $sql1 = "UPDATE profile SET pic='$a', fullname='$b',username='$c', about='$d' , company='$e' , job='$f' , country='$g' , address='$h', phone='$i', email='$j', twitter='$k', facebook='$l', instagram='$m', linkdin='$n' where username='$username'";
  if (mysqli_query($conn, $sql1))
    echo "<script>alert('Update Successfully')  </script>";
  else {
    echo "Error occurred while updating the record!<BR>";
    echo "Reason: ", mysqli_error($conn);
  }
}

$query1 = "select * from profile where username='$username'";
$result1 = mysqli_query($conn, $query1);

if ($result1 === false) {
  die(mysqli_error($conn)); // Output the SQL error for debugging
}

if (mysqli_num_rows($result1) > 0) {

  if ($row = mysqli_fetch_assoc($result1)) {


?>


    <!-- ======= Sidebar ======= -->
    <?php
 include('sidebar.php');
?>

    <main id="main" class="main">

      <div class="pagetitle">
        <h1>Profile</h1>
      </div><!-- End Page Title -->

      <section class="section profile">
        <div class="row">
          <div class="col-xl-4">

            <div class="card">
              <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                <?php
                $username = $_SESSION['username'];

                $resu = mysqli_query($conn, "SELECT * FROM profile WHERE username = '$username' ");
                while ($r = mysqli_fetch_assoc($resu)) {
                  //echo $row['username'];
                  echo "<img src='../img/" . $r['pic'] . "' alt='Profile' class='rounded-circle'>";
                }
                ?>
                <h2> <?php echo $row['fullname'];  ?></h2>
                <h3> <?php echo $row['job'];  ?></h3>
                <div class="social-links mt-2">
                  <a href="<?php echo $row['twitter']; ?>" class="twitter"><i class="bi bi-twitter"></i></a>
                  <a href="<?php echo $row['facebook']; ?>" class="facebook"><i class="bi bi-facebook"></i></a>
                  <a href="<?php echo $row['instagram']; ?>" class="instagram"><i class="bi bi-instagram"></i></a>
                  <a href="<?php echo $row['linkdin']; ?>" class="linkedin"><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>

          </div>


          <div class="col-xl-8">
            <!-- start card -->
            <div class="card">
              <!-- start card-body pt-3 -->
              <div class="card-body pt-3">
                <!-- Bordered Tabs -->
                <ul class="nav nav-tabs nav-tabs-bordered">

                  <li class="nav-item">
                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                  </li>

                  <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                  </li>

                  <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Settings</button>
                  </li>

                  <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                  </li>

                </ul>


                <div class="tab-content pt-2">
                  <!-- start overview code -->
                  <div class="tab-pane fade show active profile-overview" id="profile-overview">
                    <h5 class="card-title">About</h5>
                    <p class="small fst-italic"><?php echo $row['about']; ?></p>

                    <h5 class="card-title">Profile Details</h5>


                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Full Name</div>
                      <div class="col-lg-9 col-md-8"><?php echo $row['fullname']; ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Company</div>
                      <div class="col-lg-9 col-md-8"><?php echo $row['company']; ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Job</div>
                      <div class="col-lg-9 col-md-8"><?php echo $row['job']; ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Country</div>
                      <div class="col-lg-9 col-md-8"><?php echo $row['country']; ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Address</div>
                      <div class="col-lg-9 col-md-8"><?php echo $row['address']; ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Phone</div>
                      <div class="col-lg-9 col-md-8"><?php echo $row['phone']; ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Email</div>
                      <div class="col-lg-9 col-md-8"><?php echo $row['email']; ?></div>
                    </div>

                  </div>
                  <!-- end overview code -->




                  <!-- start edit profile code -->
                  <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                    <!-- Profile Edit Form -->
                    <form method="POST" enctype="multipart/form-data">
                      <div class="row mb-3">
                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                        <div class="col-md-8 col-lg-9">

                          <?php
                          $username = $_SESSION['username'];

                          $resu = mysqli_query($conn, "SELECT * FROM profile WHERE username = '$username' ");
                          while ($r = mysqli_fetch_assoc($resu)) {
                            //echo $row['username'];
                            echo "<img src='../img/" . $r['pic'] . "' alt='Profile' class='rounded-circle'>";
                          }
                          ?>

                          <div class="pt-2">
                            <label for="fileInput" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload" style="color:white"></i></label>
                            <input type="file" name="pic" id="fileInput" style="display: none;" value="<?php echo $row['pic']; ?>" />
                            <a href="delete-profile.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                          </div>
                        </div>
                      </div>























                      <div class="row mb-3">
                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="fullname" type="text" class="form-control" id="fullName" value="<?php echo $row['fullname'] ?> ">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Username</label>
                        <div class="col-md-8 col-lg-9">
                          <div class="input-group has-validation">
                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                            <input type="text" name="username" class="form-control" id="yourUsername" value="<?php echo ($username); ?>" readonly>
                            <div class="invalid-feedback">Please enter your username.</div>
                          </div>
                        </div>


                        <div class="row mb-3 pt-3">
                          <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="about" class="form-control" id="about" style="height: 100px" value="<?php echo $row['about'] ?> ">
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="company" class="col-md-4 col-lg-3 col-form-label">Company</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="company" type="text" class="form-control" id="company" value="<?php echo $row['company'] ?> ">
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="Job" class="col-md-4 col-lg-3 col-form-label">Job</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="job" type="text" class="form-control" id="Job" value="<?php echo $row['job'] ?> ">
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="Country" class="col-md-4 col-lg-3 col-form-label">Country</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="country" type="text" class="form-control" id="Country" value="<?php echo $row['country'] ?> ">
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="address" type="text" class="form-control" id="Address" value="<?php echo $row['address'] ?> ">
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="phone" type="text" class="form-control" id="Phone" value="<?php echo $row['phone'] ?>">
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="email" type="email" class="form-control" id="Email" value="<?php echo $row['email'] ?> ">
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Twitter Profile</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="twitter" type="text" class="form-control" id="Twitter" value="<?php echo $row['twitter'] ?> ">
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Facebook Profile</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="facebook" type="text" class="form-control" id="Facebook" value="<?php echo $row['facebook'] ?> ">
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Instagram Profile</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="instagram" type="text" class="form-control" id="Instagram" value="<?php echo $row['instagram'] ?> ">
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="Linkedin" class="col-md-4 col-lg-3 col-form-label">Linkedin Profile</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="linkdin" type="text" class="form-control" id="Linkedin" value="<?php echo $row['linkdin'] ?> ">
                          </div>
                        </div>

                        <div class="text-center">
                          <button name="update" type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                    <!-- End Profile Edit Form -->

                  </div>
                  <!-- end edit profile code -->

                  <!-- start profile seeting code -->
                  <!-- <div class="tab-pane fade pt-3 profile-setting bg-primary" id="profile-settings"> -->

                </div>
                <!-- end profile setting code -->

                <!-- start profile password change code -->
                <div class="tab-pane fade pt-3" id="profile-settings">
                  <!-- Change Password Form -->



                  <form class="tab-pane" id="profile-setting" mathod="POST" name="email_contact">

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email Notifications</label>
                      <div class="col-md-8 col-lg-9">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="changesMade" checked>
                          <label class="form-check-label" for="changesMade">
                            Changes made to your account
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="newProducts" checked>
                          <label class="form-check-label" for="newProducts">
                            Information on new products and services
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="proOffers">
                          <label class="form-check-label" for="proOffers">
                            Marketing and promo offers
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="securityNotify" checked disabled>
                          <label class="form-check-label" for="securityNotify">
                            Security alerts
                          </label>
                        </div>
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form>
                </div>



              </div>
              <!-- end profile password change code -->

              <div class="tab-pane fade pt-3" id="profile-change-password">
                <!-- Change Password Form -->
                <form action="" method="post">
                  <!-- That is the code of Renew Password -->
                 
                  <div class="row mb-3">
                    <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="password" type="password" class="form-control" id="currentPassword" oninput="validatePassword()" required>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="newpassword" type="password" class="form-control" id="newPassword" oninput="validatePassword()" required>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="newpassword" type="password" class="form-control" id="renewPassword" oninput="validatePassword()" required>
                    </div>
                  </div>

                  <div class="error-message" id="password-error"></div>

                  <div class="text-center">
                    <button type="submit" name="psubmit" class="btn btn-primary">Change Password</button>
                  </div>
                </form>
              </div>



            </div>
            <!-- end profile password change code -->
          </div>
          <!-- end card-body pt-3 -->
        </div>
        <!-- end card -->
        </div>

    <?php
  }
}

    ?>

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
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.umd.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>


    <script>
      // function validatePassword() {
      //   const currentPassword = document.getElementById('currentPassword').value;
      //   const newPassword = document.getElementById('newPassword').value;
      //   const renewPassword = document.getElementById('renewPassword').value;
      //   const errorDiv = document.getElementById('password-error');

      //   // Check for capital letters or special characters
      //   if (/[A-Z!@#$%^&*(),.?":{}|<>]/.test(newPassword)) {
      //     errorDiv.textContent = 'New password should not contain capital letters or special characters.';
      //   } else if (newPassword !== renewPassword) {
      //     errorDiv.textContent = 'New password and re-entered password do not match.';
      //   } else {
      //     errorDiv.textContent = '';
      //   }
      // }

      function validatePassword() {
    const currentPassword = document.getElementById('currentPassword');
    const newPassword = document.getElementById('newPassword');
    const renewPassword = document.getElementById('renewPassword');
    const errorDiv = document.getElementById('password-error');

    const password = renewPassword.value;

    // Check for capital letters
    if (!/[A-Z]/.test(password[0])) {
        errorDiv.textContent = 'First letter of the password should be a capital letter.';
        renewPassword.setCustomValidity('Invalid first letter');
        return;
    }

    // Check for at least 2 special characters
    if ((password.match(/[!@#$%^&*(),.?":{}|<>]/g) || []).length < 2) {
        errorDiv.textContent = 'Password should contain at least 2 special characters.';
        renewPassword.setCustomValidity('Insufficient special characters');
        return;
    }

    // Check for a number
    if (!/\d/.test(password)) {
        errorDiv.textContent = 'Password should contain at least one number.';
        renewPassword.setCustomValidity('No number found');
        return;
    }

    // If all checks pass, reset the error message and validation state
    errorDiv.textContent = '';
    renewPassword.setCustomValidity('');
}

    </script>
    <script src="https://static.elfsight.com/platform/platform.js" data-use-service-core defer></script>
  <div class="elfsight-app-517ba237-cf3e-444f-aa5d-c43210cada9d" data-elfsight-app-lazy></div>
    </body>

    </html>