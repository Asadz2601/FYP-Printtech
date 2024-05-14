<?php
include"assets/backend/login.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PRINTTECH</title>
  <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <link type="text/css" rel="stylesheet" href="assets/css/style.css">
</head>

<body>
  <div class="container pt-5">
    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4">
        <h3 class="text-center pb-3" id="color">PRINTTECH</h3>
      </div>
      <div class="col-md-4"></div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
          <div class="container pt-5 login-box">
            <h3 class="text-center" id="color">Login To Admin Account</h3>
            <h6 class="text-center text-secondary pb-3"><small>Enter your username & password to login</small></h6>
            <form action="" method="post">
              <h5 class="font-weight-light"><small>Username</small></h5>
              <div class="input-group mb-3 d-flex">
                <!-- <div class="input-group-prepend">
                  <span class="input-group-text" id="background"></span>
                </div> -->
                <input type="text" class="form-control" name="username" required>
              </div>
              <h5><small>Password</small></h5>
              <input class="form-control " type="password" name="password" required>
              <input class="w-30 form-check-input " type="checkbox">
              <label for="flexCheckChecked" class="form-check-label pb-3">Remember Me</label>
              <button class="btn btn-primary w-100" name="submit">Login</button>
            </form>
            <!-- <h6 class="text-center pt-3"><a href="#">Forgot Password?</a></h6>
            <h6 class="text-center pt-3">Don't have account?<a href="#">Create an account</a></h6> -->
          </div>
          <div class="col-md-4"></div>
        </div>
      </div>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

</html>