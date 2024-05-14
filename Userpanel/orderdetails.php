<?php

  include('connect/db.php');
  include('header.php');
  include('nav.php');
  ?>
  <?php
  
  if (!(isset($_SESSION['username']))) {
    header("Location: pages-login.php");
  }

$username=$_SESSION['username'] ;

      if(isset($_POST['submit'])){
        // if( !empty($_SESSION['order_id'])) {
        //     // Unset $_SESSION['order_id']
        //     unset($_SESSION['order_id']);
        // }
        // else{
       
    $order_id = $_POST['order_id'];
    $_SESSION['order_id'] = $order_id;
    $usernamess = $_POST['username'];
    $name = $_POST['order_name'];
    $size = $_POST['order_size'];
    $paper_quality = $_POST['paper_quality'];
    $printing_side = $_POST['printing_side'];
    $cutting = $_POST['cutting'];
    $quantity = $_POST['quantity'];

    $total = $quantity * 100;

        $sql = "INSERT INTO `order` (order_id,username, order_name, size, paper_quality, printing_side, cutting, quantity, total_amount) 
            VALUES ('$order_id','$usernamess', '$name', '$size', '$paper_quality', '$printing_side', '$cutting', '$quantity', '$total')";

    $res = mysqli_query($conn, $sql);

    if ($res) {
      echo "<script>
              alert('Order Placed Successfully');
            </script>";
  } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  $msg = $total;
  
}
      //}
    ?>

    <!-- ======= Sidebar ======= -->
    <?php
 include('side.php');
?>
    <?php
// Generate a random number between 10 and 1000
$randomNumber = rand(10, 9000);

// Concatenate '#' with the random number
$randomId = '#' . $randomNumber;


?>

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Order Details</h1>
        </div><!-- End Page Title -->

        <section class="section contact">
            <section class="section contact">

                <div class="row gy-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Order Details</h5>
                            <form method="post" action="#">
                                <div class="form-group row" style="font-weight: bold;">
                                    <div class="col-md-6">
                                        <label for="ex1">Order ID</label>
                                        <input type="text" name="order_id" class="form-control" placeholder="#12334"
                                            readonly value="<?php echo $randomId ?>">
                                    </div>
                                    <input type="hidden" name="username" value="<?php echo $username; ?>">


                                    <div class="col-md-6">
                                        <label for="ex1">Product Name</label>
                                        <select name="order_name" id="" class="form-control" required>
                                            <option value="" selected disabled>------ SELECT OPTION ------</option>
                                            <?php
                                            $query = mysqli_query($conn,"SELECT pname FROM product");
                                            while($row = mysqli_fetch_assoc($query)){
                                            ?>
                                            <option value="<?php echo $row['pname']; ?>"><?php echo $row['pname']; ?>
                                            </option>
                                            <?php
                                            }
                                          ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6" style="margin-top: 15px;">
                                        <label for="ex1">Size</label>
                                        <select name="order_size" id="" class="form-control" required>
                                            <option value="" selected disabled>------ SELECT OPTION ------</option>
                                            <?php
                                          $query = mysqli_query($conn, "SELECT size FROM product");
                                          while ($row = mysqli_fetch_assoc($query)) {
                                          ?>
                                            <option value="<?php echo $row['size']; ?>"><?php echo $row['size']; ?>
                                            </option>
                                            <?php
                                          }
                                          ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6" style="margin-top: 15px;">
                                        <label for="ex1">Paper Quality</label>
                                        <select name="paper_quality" id="paper_quality" class="form-control" required>
                                            <option value="" selected disabled>------ SELECT OPTION ------</option>
                                            <?php
                                          $query = mysqli_query($conn, "SELECT pquality FROM product");
                                          while ($row = mysqli_fetch_assoc($query)) {
                                          ?>
                                            <option value="<?php echo $row['pquality']; ?>">
                                                <?php echo $row['pquality']; ?></option>
                                            <?php
                                          }
                                          ?>
                                        </select>
                                    </div>

                                    <div class="col-md-6" style="margin-top: 15px;">
                                        <label for="ex1">Printing Side</label>
                                        <select name="printing_side" id="printing_side" class="form-control" required>
                                            <option value="" selected disabled>------ SELECT PRINT SIZE ------</option>
                                            <?php
                                                $query = mysqli_query($conn, "SELECT printsize FROM product");
                                                while ($row = mysqli_fetch_assoc($query)) {
                                                ?>
                                            <option value="<?php echo $row['printsize']; ?>">
                                                <?php echo $row['printsize']; ?></option>
                                            <?php
    }
    ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6" style="margin-top: 15px;">
                                        <label for="ex1">Cutting</label>
                                        <select name="cutting" id="" class="form-control" required>
                                            <option value="" selected disabled>------ SELECT OPTION ------</option>
                                            <option>Straight</option>
                                            <option>Round</option>

                                        </select>
                                    </div>
                                    <div class="col-md-6" style="margin-top: 15px;">
                                        <label for="quantity">Quantity</label>
                                        <input type="number" name="quantity" id="quantity" class="form-control"
                                            placeholder="Enter Quantity of order" required>
                                    </div>
                                    <div class="col-md-6" style="margin-top: 15px;">
                                        <label for="total">Total Amount</label>
                                        <input class="form-control" readonly type="text" id="total" value="">
                                    </div>


                                </div>
                                <div class="pre-next-btn" style="margin-top: 25px; float: right;">
                                    <!-- <a style="background-color: #3498db;
        padding: 10px 20px; font-size: 16px; color: #fff; border: none; border-radius: 5px; cursor: pointer; text-decoration: none;" href="upload-file.php">Previous</a> -->
                                    <input type="submit" name="submit" value="Submit"
                                        style="background-color: #3498db;
        padding: 10px 20px; font-size: 16px; color: #fff; border: none; border-radius: 5px; cursor: pointer; text-decoration: none;">
                                    <a href="upload-file.php"
                                        style="background-color: #3498db;
        padding: 10px 20px; font-size: 16px; color: #fff; border: none; border-radius: 5px; cursor: pointer; text-decoration: none;">Next</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </section>
        </section>
    </main><!-- End #main -->

    <script>
    // Function to calculate total amount
    function calculateTotal() {
        // Get the quantity entered by the user
        var quantity = parseFloat(document.getElementById('quantity').value);
        var total = parseFloat(document.getElementById('total').value);
        if (isNaN(quantity) || quantity == null) {
            quantity = 0.00;
            total = 0.00;
        }
        var totalAmount = quantity * 100;

        // Display the total amount in the total input field
        document.getElementById('total').value = totalAmount.toFixed(2); // A


        //ssuming you want two decimal places
        // Multiply the quantity by 100

    }

    // Attach an event listener to the quantity input field to recalculate total on change
    document.getElementById('quantity').addEventListener('input', calculateTotal);
    </script>
    <!-- ======= Footer ======= -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <!-- <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->

    <!-- Template Main JS File -->
    <!-- <script src="assets/js/main.js"></script> -->
    <!-- <script src="https://static.elfsight.com/platform/platform.js" data-use-service-core defer></script>
    <div class="elfsight-app-517ba237-cf3e-444f-aa5d-c43210cada9d" data-elfsight-app-lazy></div> -->
</body>

</html>
<?php
  include('footer.php');
 ?>