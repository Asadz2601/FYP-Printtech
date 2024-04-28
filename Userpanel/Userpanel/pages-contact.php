<?php
include('connect/db.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
session_start();
if (!(isset($_SESSION['username']))) {
    header("Location: pages-login.php");
}
if (isset($_REQUEST['submit'])) {
  $sql = "INSERT INTO   feedback(name, email, subject, message) VALUES ('" . $_REQUEST['name'] . "','" . $_REQUEST['email'] . "', '" . $_REQUEST['subject'] . "', '" . $_REQUEST['message'] . "')";
  if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Sent Successfully')  </script>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
// $conn->close();

?>

<?php
$username = $_SESSION['username'];
$query = "select * from profile where username='$username'";
$result = mysqli_query($conn, $query);

if ($result === false) {
  die(mysqli_error($conn)); // Output the SQL error for debugging
}

if (mysqli_num_rows($result) > 0) {

  if ($row = mysqli_fetch_assoc($result)) {


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>PRINTTECH User Panel</title>
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
  <?php
 include('top.php');
?>

  <!-- ======= Sidebar ======= -->
<?php
 include('sidebar.php');
?>

<?php
  }}
?>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>GIVE YOUR SUGGESTION</h1>
    </div><!-- End Page Title -->

<section class="section contact">

      <div class="row gy-4">

        <div class="col-xl-6">

          <div class="row">
            <div class="col-lg-6">
              <div class="info-box card">
                <i class="bi bi-geo-alt"></i>
                <h3>Address</h3>
                <p>Commercial Market<br>Muree Road Rawalpindi</p>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="info-box card">
                <i class="bi bi-telephone"></i>
                <h3>Call Us</h3>
                <p>+92 349 6213339 55<br>+92 313 1504707</p>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="info-box card">
                <i class="bi bi-envelope"></i>
                <h3>Email Us</h3>
                <p>info@example.com<br>contact@example.com</p>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="info-box card">
                <i class="bi bi-clock"></i>
                <h3>Open Hours</h3>
                <p>Monday - Friday<br>10:00AM - 10:00PM</p>
              </div>
            </div>
          </div>

        </div>

        <div class="col-xl-6">
          <div class="card p-4">

          <?php

            $error = ''; // Initialize the error variable

            if (isset($_POST['submit'])) {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $subject = $_POST['subject'];
                $message = $_POST['message'];

                $toEmail = $email; // Fixed the email address





//Load Composer's autoloader
require 'D:\xampp\htdocs\Userpanel\Userpanel\php-mailer\Exception.php';  // enter your path in Userpanel/php-mailer/Exception.php
require 'D:\xampp\htdocs\Userpanel\Userpanel\php-mailer\PHPMailer.php';  // enter your path in Userpanel/php-mailer/PHPMailer.php
require 'D:\xampp\htdocs\Userpanel\Userpanel\php-mailer\SMTP.php';  // enter your path in Userpanel/php-mailer/SMTP.php

//Create an instance; passing `true` enables exceptions
  $mail = new PHPMailer(true);

  try {
    
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = '25207@students.riphah.edu.pk';                     //SMTP username
    $mail->Password   = 'Usama@12345';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('25207@students.riphah.edu.pk', 'Contact Form');
    $mail->addAddress('25207@students.riphah.edu.pk', 'Hamari Website');     //Add a recipient 

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is the Subject Usama Ashraf';
    $mail->Body = "Name: $name\r\n" .
    "Email: $email\r\n" .
    "Subject: $subject\r\n" .
    "Message: $message\r\n";
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';


    $mail->send();
    //echo 'Message has been sent';
  } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }





                // $emailHeader = "Name: " . $name .
                //     "\r\nEmail: " . $email .
                //     "\r\nSubject: " . $subject .
                //     "\r\nMessage: " . $message . "\r\n";

                // if (mail($toEmail, $username, $emailHeader)) {
                //     $error = "Email has been successfully sent";
                // } else {
                //     $error = "Email has not been sent";
                // }
            }

            ?>



            <form  method="post" name="emailContact" class="php-email-form">
              <div class="row gy-4">
                <h5 style="font-style: Time New Roman; font-weight: bold;">GIVE YOUR SUGGESTION & FEEDBACK</h5>
                <div class="col-md-6">
                  <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                </div>

                <div class="col-md-6 ">
                  <input type="email" class="form-control" name="email" placeholder="Your Email" required>
                </div>

                <div class="col-md-12">
                  <input type="text" class="form-control" name="subject" placeholder="Subject" required>
                </div>

                <div class="col-md-12">
                  <textarea class="form-control" name="message" rows="6" placeholder="Message" required></textarea>
                </div>

                <div class="col-md-12 text-center">
                  <div class="loading">Loading</div>
                  <div class="error-message"><?php echo $error; ?></div>
                  <div class="sent-message"><?php echo $error; ?></div>

                  <button name="submit" type="submit">Send Message</button>
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
  <script src="assets/js/main.js"></script>
  <script src="https://static.elfsight.com/platform/platform.js" data-use-service-core defer></script>
  <div class="elfsight-app-517ba237-cf3e-444f-aa5d-c43210cada9d" data-elfsight-app-lazy></div>
</body>

</html>