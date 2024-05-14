<?php
include('header.php');
include('nav.php');
include('assets\backend\customerdetail.php');


?>
<br>
<!-- ======= Header ======= -->
<?php


?>

<!-- ======= Sidebar ======= -->
<?php
include('side.php');
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
            $querys = mysqli_query($conn, "SELECT * FROM `users` WHERE username = '$username'");
            $rows = mysqli_fetch_assoc($querys);
            // Check if $id is properly populated
            $query = mysqli_query($conn, "SELECT * FROM `order` WHERE order_id = '$id'");
            $row = mysqli_fetch_assoc($query);
            ?>
            <form method="post" action="">
              <div class="form-group row" style="font-weight: bold;">
                <div class="col-md-6">
                  <label for="ex1">Name</label>
                  <input type="text" name="name" value="<?php echo $rows['name']; ?>" class="form-control" placeholder="Enter your Name" required>
                </div>
                
                <input type="text" name="order_id" value="<?php echo $order_id; ?>" class="form-control" hidden required>

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
                  <select id="inputState" name="delivery" class="form-control" required>
                    <option value="" selected>Choose option</option>
                    <option>Yes</option>
                    <option>No</option>
                  </select>
                </div>
                <div class="col-md-6" style="margin-top: 15px;">
                  <label for="ex1">Delivery Address</label>
                  <input type="text" name="delivery_address" class="form-control" placeholder="Enter your delivery address" required>
                </div>
                <div class="col-md-6" style="margin-top: 15px;">
                  <label for="ex1">Total Amount</label>
                  <input type="text" class="form-control" name="total_payment" id="total_payment" value="<?php echo $row['total_amount']; ?>" readonly placeholder="Total"><br>
                </div>
              </div>

              <div class="pre-next-btn" style="margin-top: 25px; float: right;">
                <a style="background-color: #3498db;
        padding: 10px 20px; font-size: 16px; color: #fff; border: none; border-radius: 5px; cursor: pointer; text-decoration: none;" href="upload-file.php">Previous</a>


                <input type="submit" name="submit" value="Submit" style="background-color: #3498db;
        padding: 10px 20px; font-size: 16px; color: #fff; border: none; border-radius: 5px; cursor: pointer; text-decoration: none;">

                <a style="background-color: #3498db;
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