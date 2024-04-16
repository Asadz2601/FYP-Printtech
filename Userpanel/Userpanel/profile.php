<?php
session_start();

include('connect/db.php');
$username = $_SESSION['username'];
error_reporting(0);
$sql = "SELECT pic FROM profile";
$res = mysqli_query($conn, $sql);
while($row=mysqli_fetch_assoc($res)){
$_SESSION['showimage'] = $row['pic'];
}

if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $file_name = $_FILES["uploadfile"]["name"];
  $tmp_name = $_FILES["uploadfile"]["tmp_name"];
  $folder = "../img/" . $file_name;

  // Check if the username already exists
  $sqlus = "SELECT username FROM profile WHERE username = '$name'";
  $resultus = mysqli_query($conn, $sqlus);

  if (mysqli_num_rows($resultus) > 0) {
    header("Location: index.php");
  }

  // Move the uploaded file to the destination folder
  if (move_uploaded_file($tmp_name, $folder)) {
    // Insert data into the database
   // $sql = "INSERT INTO profile (pic, username) VALUES ('$file_name', '$name')";
   $sql = "INSERT INTO   profile (pic ,fullname,username,about,company,job, country,address,phone,email, twitter,facebook,instagram,linkdin) VALUES ('$file_name','" . $_REQUEST['fullname'] . "','$name', '" . $_REQUEST['about'] . "', '" . $_REQUEST['company'] . "', '" . $_REQUEST['job'] . "', '" . $_REQUEST['country'] . "', '" . $_REQUEST['address'] . "', '" . $_REQUEST['phone'] . "', '" . $_REQUEST['email'] . "', '" . $_REQUEST['twitter'] . "', '" . $_REQUEST['facebook'] . "', '" . $_REQUEST['instagram'] . "', '" . $_REQUEST['linkdin'] . "')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
      echo "File Uploaded Successfully";
      //header("Location: http://localhost/Userpanel/Userpanel/profile.php");
      header("location:index.php");
    } else {
      echo "Error inserting data into the database: " . mysqli_error($conn);
    }
  } else {
    echo "Error uploading file";
  }
}

// Close the database connection
mysqli_close($conn);
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
  <link href="" rel="icon">

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

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="" alt="">
                  <span class="d-none d-lg-block">PRINTTECH</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4"> Create Profile</h5>
                    <p class="text-center small">Enter your info to make profile</p>
                  </div>

                  <form class="row g-3 needs-validation" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                    <div class="row mb-3">
                      
                        <label class="form-label" for="customFile">Enter profile Picture</label>
                        <input type="file" name="uploadfile" value="Choose Picture" class="form-control" id="customFile" />
                      
                    </div>

                    <div class="col-12">
                      <label for="yourName" class="form-label">Full name</label>
                      <input type="text" name="fullname" class="form-control" id="fullname" required>
                      <div class="invalid-feedback">Please enter your fullname!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Username</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="name" class="form-control" id="yourUsername" value="<?php echo ($username); ?>" readonly>
                        <div class="invalid-feedback">Please enter your username.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourAbout" class="form-label">About</label>
                      <textarea type="textarea" name="about" class="form-control" id="about" ></textarea>
                      <div class="invalid-feedback">Please enter your about!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourCompany" class="form-label">Company</label>
                      <input type="text" name="company" class="form-control" id="company">
                      <div class="invalid-feedback">Please enter your company name!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourJob" class="form-label">Job</label>
                      <input type="text" name="job" class="form-control" id="job">
                      <div class="invalid-feedback">Please enter your job!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourCountry" class="form-label">Country</label>
                      <input type="text" name="country" class="form-control" id="country" >
                      <div class="invalid-feedback">Please enter your country!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourAddress" class="form-label">Address</label>
                      <input type="text" name="address" class="form-control" id="address" required>
                      <div class="invalid-feedback">Please enter your address!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourPhone" class="form-label">Phone</label>
                      <input type="number" name="phone" class="form-control" id="phone" required>
                      <div class="invalid-feedback">Please enter your Phone!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourEmail" class="form-label">Email</label>
                      <input type="text" name="email" class="form-control" id="email" required>
                      <div class="invalid-feedback">Please enter your email!</div>
                    </div>


                    <div class="col-12">
                      <label for="yourTwitter" class="form-label">Twitter Profile</label>
                      <input type="text" name="twitter" class="form-control" id="twitter" >
                      <div class="invalid-feedback">Please enter your twitter profile!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourFacebook" class="form-label">Facebook Profile</label>
                      <input type="text" name="facebook" class="form-control" id="facebook" >
                      <div class="invalid-feedback">Please enter your facebook profile!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourInstagram" class="form-label">Instagram Profile</label>
                      <input type="text" name="instagram" class="form-control" id="instagram" >
                      <div class="invalid-feedback">Please enter your instagram profile!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourlinkdin" class="form-label">Linkdin Profile</label>
                      <input type="text" name="linkdin" class="form-control" id="linkdin" >
                      <div class="invalid-feedback">Please enter your linkdin profile!</div>
                    </div>

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                      </div>
                    </div>
                    <a href="uploadfile.php" class="col-12">
                      <button class="btn btn-primary w-100" name="submit" type="submit">Create</button>
                    </a>
                  </form>

                </div>
              </div>


            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->


</body>

</html>