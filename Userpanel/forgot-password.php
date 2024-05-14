<?php
include('smtp/PHPMailerAutoload.php');
include('function.php');

$conn = mysqli_connect("localhost", "root", "", "panel") or die("Database Not Connected");

if ($conn && isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['user_email']);
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $id = $row['id'];

        $ran_password = rand(11111111, 9999999);
        mysqli_query($conn, "UPDATE users SET password = '$ran_password' WHERE id = '$id'");
        $html = "<b>Your New Password:</b> $ran_password";
        $html .= "<br><br>Please goto This Link<br><br>http://localhost/Userpanel/Userpanel/pages-login.php";
        
        // Assuming you have a send_email function in function.php
        send_email($email, $html, 'Your New Password');
        
        echo "Password has been sent to your email";
    } else {
        echo "Email not found in the database";
    }
}
?>


<!-- Rest of your HTML code remains unchanged -->


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

<body>

    <main>
        <div class="container">

            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-4">
                                <a href="index.php" class="logo d-flex align-items-center w-auto">
                                    <img src="/Userpanel/Userpanel/assets/img/favicon.png" alt="">
                                    <span class="d-none d-lg-block">PRINTTECH</span>
                                </a>
                            </div><!-- End Logo -->

                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Recover Your Account</h5>
                                        <p class="text-center small">Enter your email to recover</p>
                                    </div>
                                    <!-- <form method="POST">
                                        <label for="signupPassword">Email:</label>
                                        <input type="text" id="signupPassword" name="user_email" required><br>
                                        <span style="color:red;"></span>
                                        <input type="submit" id="register_submit" value="Login" name="submit">
                                        <a href="pages-login.php">Login</a>
                                    </form> -->
                                    <form method="POST">
                                    <label for="signupPassword" class="form-label">Email</label>
                                    <input type="text" name="user_email" class="form-control" id="signupPassword" required>
                                    <div class="col-12 pt-2">
                      
                                        <span style="color:red;"></span>
                                        <input type="submit" class="btn btn-primary w-100" id="register_submit" value="Login" name="submit">
                                        <p> <small>Want to login? <a href="pages-login.php">Login</a> </small></p>
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
