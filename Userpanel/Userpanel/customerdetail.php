
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
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

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

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Customer Details</h1>
    </div><!-- End Page Title -->

    <section class="section contact">
      <section class="section contact">

        <div class="row gy-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Customer Details</h5>
              <form>
                <div class="form-group row" style="font-weight: bold;">
                  <div class="col-md-6">
                    <label for="ex1">Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter your Name" required>
                  </div>
                  <div class="col-md-6">
                    <label for="ex1">Email</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter your Email" required>
                  </div>
                  <div class="col-md-6" style="margin-top: 15px;">
                    <label for="ex1">Contact No</label>
                    <input type="phone" name="name" class="form-control" placeholder="Enter Your Phone No" required>
                  </div>
                  <div class="col-md-6" style="margin-top: 15px;">
                    <label for="ex1">Whatsapp No / Phone 2</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter Phone 2">
                  </div>

                  <div class="col-md-6" style="margin-top: 15px;">
                    <label for="ex1">Address</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter Your Address" required>
                  </div>
                </div>
              </form>

              <!-- Order Delivery Start  -->
              <h5 class="card-title" style="margin-top: 10px; margin-bottom: -27px;">Order Delivery</h5>
              <hr>
              <div class="form-group row" style="font-weight: bold;">
                <div class="col-md-6" style="margin-top: 15px;">
                  <label for="inputState">Delivery Option</label>
                  <select id="inputState" class="form-control">
                    <option selected>Choose option</option>
                    <option>Yes</option>
                    <option>No</option>
                  </select>
                </div>
                <div class="col-md-6" style="margin-top: 15px;">
                  <label for="ex1">Delivery Address</label>
                  <input type="text" name="name" class="form-control" placeholder="Enter your delivery address">
                </div>
                <div class="col-md-6" style="margin-top: 15px;">
                  <label for="ex1">Total Amount</label>
                  <input type="text" name="name" class="form-control" placeholder="">
                </div>
              </div>
              
              <div class="pre-next-btn" style="margin-top: 25px; float: right;">
                <a style="background-color: #3498db;
        padding: 10px 20px; font-size: 16px; color: #fff; border: none; border-radius: 5px; cursor: pointer; text-decoration: none;" href="orderdetails.php">Previous</a>
                <a style="background-color: #3498db;
        padding: 10px 20px; font-size: 16px; color: #fff; border: none; border-radius: 5px; cursor: pointer; text-decoration: none;" href="#">Next</a>
              </div>
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