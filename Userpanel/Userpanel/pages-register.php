<?php

include('connect/db.php');
if (isset($_REQUEST['submit'])) {
$name= $_REQUEST['username']  ;
$newUsername = mysqli_real_escape_string($conn, $name); // Make sure to sanitize the input

// Check if the username already exists in the database
$checkQuery = "SELECT * FROM users WHERE username = '$newUsername'";
$checkResult = mysqli_query($conn, $checkQuery);

if (mysqli_num_rows($checkResult) > 0) {
    // Username already exists, prompt the user to choose a different username
    echo "Sorry, the username '$newUsername' is already taken. Please choose a different username.";
} else {
    // Username is unique, proceed with the insertion
    //$insertQuery = "INSERT INTO users (username) VALUES ('$newUsername')";
    $sql = "INSERT INTO users(name, email, username, password) VALUES ('" . $_REQUEST['name'] . "','" . $_REQUEST['email'] . "', '" . $_REQUEST['username'] . "', '" . $_REQUEST['password'] . "');";

    $sql .= "INSERT INTO profile(fullname, email, username) VALUES ('" . $_REQUEST['name'] . "','" . $_REQUEST['email'] . "', '" . $_REQUEST['username'] . "');";

    if ($conn->multi_query($sql) === TRUE) {
      echo "<script>alert('Account Created')</script>";
      header("Location: http://localhost/Userpanel/Userpanel/pages-otp.php");
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

    
    // if (mysqli_query($conn, $insertQuery)) {
    //     echo "Username '$newUsername' has been successfully added to the database.";
    // } else {
    //     echo "Error: " . mysqli_error($conn);
    // }
}

  
}

//$conn->close();
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

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>
<style>
  
  #username-error {
      color: red;
    }

    #password-error {
      color: red;
    }
  </style>


<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="" class="logo d-flex align-items-center w-auto">
                  <img src="/Userpanel/Userpanel/assets/img/favicon.png" alt="">
                  <span class="d-none d-lg-block">PRINTTECH</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                    <p class="text-center small">Enter your personal details to create account</p>
                  </div>

                  <!-- <form class="row g-3 needs-validation"  id="signupForm" method="post" >
                  <div class="col-12">
                      <label for="yourName" class="form-label">Your Name</label>
                      <input type="text" name="name" class="form-control" id="yourName" required>
                      <div class="invalid-feedback">Please, enter your name!</div>
                    </div>
                    <div id="nameErrorMessage"></div>


                    <div class="col-12">
                      <label for="yourEmail" class="form-label">Your Email</label>
                      <input type="email" name="email" class="form-control" id="yourEmail" required>
                      <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Username</label>
                      <div class="input-group has-validation">
                        <input type="text" name="username" class="form-control" id="username" oninput="validateUsername()"  required>
                        <div class="invalid-feedback">Please choose a username.</div>
                      </div>
                    </div>
                    <div id="username-error"></div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="password" oninput="validatePassword()" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>
                    <div id="password-error"></div>

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                        <label class="form-check-label" for="acceptTerms">I agree and accept the <a href="#">terms and conditions</a></label>
                        <div class="invalid-feedback">You must agree before submitting.</div>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" name="submit" type="submit" >Create Account</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Already have an account? <a href="pages-login.php">Log in</a></p>
                    </div>
                  </form> -->

                  <form class="row g-3 needs-validation" id="signupForm"  method="post">
                    <div class="col-12">
                      <label for="yourName" class="form-label">Your Name</label>
                      <input type="text" name="name" class="form-control" id="yourName" required>
                      <div class="invalid-feedback">Please, enter your name!</div>
                    </div>
                    <div id="nameErrorMessage"></div>


                    <div class="col-12">
                      <label for="yourEmail" class="form-label">Your Email</label>
                      <input type="email" name="email" class="form-control" id="yourEmail" required>
                      <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Username</label>
                      <div class="input-group has-validation">
                        <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
                        <input type="text" name="username" class="form-control" id="username" oninput="validateUsername()"  required>
                        <div class="invalid-feedback">Please choose a username.</div>
                      </div>
                    </div>
                    <div id="username-error"></div>

                    <div class="col-12">
    <label for="yourPassword" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="password" oninput="validatePassword()" required>
    <div class="invalid-feedback">Please enter your password!</div>
</div>
<div id="password-error"></div>


                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                        <label class="form-check-label" for="acceptTerms">I agree and accept the <a href="#">terms and conditions</a></label>
                        <div class="invalid-feedback">You must agree before submitting.</div>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" name="submit" type="submit" >Create Account</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Already have an account? <a href="pages-login.php">Log in</a></p>
                    </div>
                  </form>

                </div>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


</body>
<script>
   // Function to validate the username input
   function validateUsername() {
    const usernameInput = document.getElementById('username');
    const errorDiv = document.getElementById('username-error');
    const username = usernameInput.value;

    // Check for capital letters or special characters
    if (/[A-Z!@#$%^&*(),.?":{}|<>]/.test(username) || /[^a-zA-Z0-9]/.test(username)) {
        errorDiv.textContent = 'Username should not contain capital letters or special characters.';
        usernameInput.setCustomValidity('Invalid characters');
    } else {
        errorDiv.textContent = '';
        usernameInput.setCustomValidity('');
    }
}



document.getElementById('signupForm').addEventListener('submit', function(event) {
    const usernameInput = document.getElementById('username');
    const errorDiv = document.getElementById('username-error');
    const username = usernameInput.value;

    // Check for capital letters or special characters
    if (/[A-Z!@#$%^&*(),.?":{}|<>]/.test(username) || /[^a-zA-Z0-9]/.test(username)) {
        errorDiv.textContent = 'Username should not contain capital letters or special characters.';
        usernameInput.focus(); // Focus on the username input field
        event.preventDefault(); // Prevent form submission
    } else {
        errorDiv.textContent = ''; // Clear error message
    }
});





// Function to validate the name input
function validateNameInput(event) {
    var keyCode = event.keyCode || event.which;
    var charStr = String.fromCharCode(keyCode);
    var regex = /^[a-zA-Z]+$/;

    // Check if the entered character is not an alphabet
    if (!regex.test(charStr)) {
        event.preventDefault(); // Prevent the default action (typing the character)
    
      }
}

// Add an event listener to the name input field to trigger validation
document.getElementById('yourName').addEventListener('keypress', validateNameInput);
function validatePassword() {
        const passwordInput = document.getElementById('password');
        const errorDiv = document.getElementById('password-error');
        const password = passwordInput.value;

        // Check for minimum length
        if (password.length < 8) {
            errorDiv.textContent = 'Password must be at least 8 characters long.';
            passwordInput.setCustomValidity('Password too short');
            return;
        }

        // Check for presence of at least one alphabet
        if (!/[a-zA-Z]/.test(password)) {
            errorDiv.textContent = 'Password must contain at least one alphabet.';
            passwordInput.setCustomValidity('Missing alphabet');
            return;
        }

        // Check for presence of at least one special character
        if (!/[!@#$%^&*(),.?":{}|<>]/.test(password)) {
            errorDiv.textContent = 'Password must contain at least one special character.';
            passwordInput.setCustomValidity('Missing special character');
            return;
        }

        // Clear error message if password meets all criteria
        errorDiv.textContent = '';
        passwordInput.setCustomValidity('');
    }



    // function validatePassword() {
    //   const passwordInput = document.getElementById('password');
    //   const errorDiv = document.getElementById('password-error');
    //   const password = passwordInput.value;

    //   // Check for capital letters or special characters
    //   if (/[A-Z!@#$%^&*(),.?":{}|<>]/.test(password)) {
    //     errorDiv.textContent = 'Password should not contain capital letters or special characters.';
    //     passwordInput.setCustomValidity('Invalid characters');
    //   } else {
    //     errorDiv.textContent = '';
    //     passwordInput.setCustomValidity('');
    //   }
    // }


    function validatePasswords() {
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

</html>