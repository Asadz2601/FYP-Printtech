<?php
include('connect/db.php');
if(isset($_POST['submit'])){
        
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $whatsapp = $_POST['whatsapp'];
  $address = $_POST['address'];
  $delivery = $_POST['delivery'];
  $delivery_address = $_POST['delivery_address'];
  $totalpayment = $_POST['total_payment'];

  $sql = "INSERT INTO customerdetail (name, email, phone, whatsapp, address, delivery, delivery_address, total_payment) 
  VALUES ('$name', '$email', '$phone', '$whatsapp', '$address', '$delivery', '$delivery_address', '$totalpayment')";
  $res = mysqli_query($conn, $sql);

  if ($res) {
    echo "<script>
            alert('Customer Detail Entered Successfully');
          </script>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
$msg = $total;


    }
  
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
              <?php
                $id = $_SESSION['order_id'];
                $username = $_SESSION['username'];
                $querys = mysqli_query($conn,"SELECT * FROM `users` WHERE username = '$username'");
                $rows = mysqli_fetch_assoc($querys);
                // Check if $id is properly populated
                $query = mysqli_query($conn,"SELECT * FROM `order` WHERE order_id = '$id'");
                $row = mysqli_fetch_assoc($query);
              ?>
              <form method="post" action="">
                <div class="form-group row" style="font-weight: bold;">
                  <div class="col-md-6">
                    <label for="ex1">Name</label>
                    <input type="text" name="name" value="<?php echo $rows['name']; ?>" class="form-control" placeholder="Enter your Name" required>
                  </div>
                  <div class="col-md-6">
                    <label for="ex1">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter your Email" required>
                  </div>
                  <div class="col-md-6" style="margin-top: 15px;">
                    <label for="ex1">Contact No</label>
                    <input type="number" name="phone" class="form-control" placeholder="Enter Your Phone No" required>
                  </div>
                  <div class="col-md-6" style="margin-top: 15px;">
                    <label for="ex1">Whatsapp No / Phone 2</label>
                    <input type="number" name="whatsapp" class="form-control" placeholder="Enter Phone 2">
                  </div>

                  <div class="col-md-6" style="margin-top: 15px;">
                    <label for="ex1">Address</label>
                    <input type="text" name="address" class="form-control" placeholder="Enter Your Address" required>
                  </div>
                </div>
              

              <!-- Order Delivery Start  -->
              <h5 class="card-title" style="margin-top: 10px; margin-bottom: -27px;">Order Delivery</h5>
              <hr>
              <div class="form-group row" style="font-weight: bold;">
                <div class="col-md-6" style="margin-top: 15px;">
                  <label for="inputState">Delivery Option</label>
                  <select id="inputState" name="delivery" class="form-control">
                    <option selected>Choose option</option>
                    <option>Yes</option>
                    <option>No</option>
                  </select>
                </div>
                <div class="col-md-6" style="margin-top: 15px;">
                  <label for="ex1">Delivery Address</label>
                  <input type="text" name="delivery_address" class="form-control" placeholder="Enter your delivery address">
                </div>
                <div class="col-md-6" style="margin-top: 15px;">
                  <label for="ex1">Total Amount</label>
                  <input type="text" class="form-control" name="total_payment" value="<?php echo $row['total_amount'];?>"  placeholder="Total"><br>
                </div>
              </div>
              
              <div class="pre-next-btn" style="margin-top: 25px; float: right;">
              <a style="background-color: #3498db;
        padding: 10px 20px; font-size: 16px; color: #fff; border: none; border-radius: 5px; cursor: pointer; text-decoration: none;" href="uploadfile.php">Previous</a>
                

              <input type="submit" name="submit" value="Submit" style="background-color: #3498db;
        padding: 10px 20px; font-size: 16px; color: #fff; border: none; border-radius: 5px; cursor: pointer; text-decoration: none;">
                                    
                <a  style="background-color: #3498db;
        padding: 10px 20px; font-size: 16px; color: #fff; border: none; border-radius: 5px; cursor: pointer; text-decoration: none;" href="checkout.php">Next</a>
              </div>
            </div>
          </div>
        </div>
        </form>
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