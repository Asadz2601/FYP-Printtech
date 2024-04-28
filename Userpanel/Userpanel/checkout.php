    <?php

include 'top.php';
echo "<br><br><br>";
include 'connect/db.php';
// Check if the form has been submitted
$id = $_SESSION['order_id'];
// Check if $id is properly populated
$query = mysqli_query($conn,"SELECT * FROM `order` WHERE order_id = '$id'");
$row = mysqli_fetch_assoc($query);



// Start the session

// Check if the session variable is set
// if(isset($_SESSION['order_id'])) {
//     // Unset the session variable
//     unset($_SESSION['order_id']);
    
// } 
if(isset($_POST['easypaisa'])){
    // Include your database connection file and any necessary initialization here
    // Example: include_once "db_connection.php";
    
    // Check if file is uploaded successfully
    if(isset($_FILES["file"]) && $_FILES["file"]["error"] === UPLOAD_ERR_OK) {
        $filename = $_FILES["file"]["name"];
        $tempname = $_FILES["file"]["tmp_name"];

// Move uploaded file to desired directory
$upload_dir = "uploads/easypaisa/"; // Change this directory to your desired location
move_uploaded_file($tempname, $upload_dir . $filename);

// Use prepared statements to prevent SQL injection
$sql = "INSERT INTO easypaisa (order_id, email, phone, total_payment, image) VALUES (?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);

// Bind parameters
mysqli_stmt_bind_param($stmt, "ssiss", $_POST['order_id'], $_POST['email'], $_POST['phone'], $_POST['total_payment'], $filename);

// Execute the statement
if (mysqli_stmt_execute($stmt)) {
    echo "<script> alert('Thanks For Ordering'); </script>";
} else {
    echo "Error: " . mysqli_error($conn);
}
        
        // Close statement
        mysqli_stmt_close($stmt);
    } else {
        echo "File upload failed";
    }
}


if(isset($_POST['stripe'])){
    // Include your database connection file and any necessary initialization here
    // Example: include_once "db_connection.php";
    
    // Check if file is uploaded successfully
    if(isset($_FILES["file"]) && $_FILES["file"]["error"] === UPLOAD_ERR_OK) {
        $filename = $_FILES["file"]["name"];
$tempname = $_FILES["file"]["tmp_name"];

// Move uploaded file to desired directory
$upload_dir = "uploads/stripe/"; // Change this directory to your desired location
move_uploaded_file($tempname, $upload_dir . $filename);

// Use prepared statements to prevent SQL injection
$sql = "INSERT INTO stripe (order_id, card_num, expiry, cvv, total_payment, image) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);

// Bind parameters
mysqli_stmt_bind_param($stmt, "ssssis", $_POST['order_id'], $_POST['card_num'], $_POST['expiry'], $_POST['cvv'],$_POST['total_payment'], $filename);

// Execute the statement
if (mysqli_stmt_execute($stmt)) {
    echo "<script> alert('Thank For Ordering'); </script>";
} else {
    echo "Error: " . mysqli_error($conn);
}
        
        // Close statement
        mysqli_stmt_close($stmt);
    } else {
        echo "File upload failed";
    }
}


    // if (move_uploaded_file($tempname, $folder)) {
    //     $msg = "Image uploaded successfully";
    //     // Store filename in session
    //      // Corrected variable name
        
    // } else {
    //     $msg = "Failed to upload image";
    //     // Display message for failed upload
    //     echo "<script>alert('not upload image');</script>";
    //     // Stop execution if image upload fails
    //     die();
    // }

?>
    
    <style>
        #showeasypaisa,#showstripe{
            display:none;
        }

        .selected {
        border: 2px solid blue; /* Example: Add your desired visual indication here */
    /* Add any other styles for the selected effect */
  }
        
    </style>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <?php
include('sidebar.php');

?>
<?php
                                    
                                ?>
                </div>

                <div class="col-lg-9 m-auto card card-shadow">
                <h1 style="font-size:40px" class="mx-auto mt-2 mb-2 fw-bold">Select Payment Method</h1>
                    <div class="row text-center">
                        <div class="col-lg-6" id="easypaisa">
                            <img src="assets\img\channels4_profile.jpg"   class="img-fluid" alt="" style="width:150px;height:150px">
                        </div>
                        <div class="col-lg-6" id="stripe">
                        <img src="assets\img\62a382de6209494ec2b17086.png"  style="width:150px;height:150px" class="img-fluid" alt="">
                        </div>
                            <br><br><br>
                        <div class="row">
                            <div class="col-lg-12">
                            <div class="form-group" id="showeasypaisa">
                                

                                    <form action="" method="post" enctype="multipart/form-data">
                                        <br>
                                    <input type="text" class="form-control" name="order_id" id="exampleInputEmail1" value="<?php echo $id; ?>" readonly><br>

                                        <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Enter email"><br>

                                        <input type="number" class="form-control" name="phone" id="exampleInputEmail1" placeholder="Enter Number"><br>

                                        <input type="text" class="form-control" name="total_payment" value="<?php echo $row['total_amount'];?>" id="exampleInputEmail1" placeholder="Total"><br>

                                        <input type="file" name="file" class="form-control" id=""><br>

                                        <input type="submit" value="Submit"  name="easypaisa" class="btn btn-primary" style="width:100%"><br><br>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group" id="showstripe">
                                <form action="<?php $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" method="post">
                                <input type="text" class="form-control" name="order_id"  id="exampleInputEmail1" value="<?php echo $id; ?>"  readonly><br>

                                <input type="number" class="form-control" id="exampleInputEmail1" name="card_num" placeholder="Card-Number"><br>

                                        <input type="date" class="form-control" id="exampleInputEmail1" name="expiry"  placeholder="Expiry Date"><br>

                                        <input type="text" class="form-control" id="exampleInputEmail1" name="cvv" placeholder="Cvv"><br>

                                        <input type="text" class="form-control" name="total_payment" value="<?php echo $row['total_amount'];?>" id="exampleInputEmail1" placeholder="Total"><br>


                                        <input type="file" name="file" class="form-control" id=""><br>
                                        <input type="submit" value="Submit" name="stripe" class="btn btn-primary" style="width:100%"><br><br>
                                    </form>
                                </div>
                            </div>
                        </div>
                            
                        <div class="" >
                            <!-- <br><br><br>
                            <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php ?>" placeholder="Enter email">
                                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                </div> -->
                        </div>


                </div>
            </div>
        </div><br><br><br><br><br><br>
    <br><br><br>



<script>
    var easypaisa = document.getElementById('easypaisa');
    var showeasypaisa = document.getElementById('showeasypaisa');
    var stripe = document.getElementById('stripe');
    var showstripe = document.getElementById('showstripe');

    if(easypaisa){
        easypaisa.addEventListener('click', function() {
        if (showeasypaisa.style.display === 'none') {
            showeasypaisa.style.display = 'block';
            easypaisa.classList.add('selected');
            stripe.classList.remove('selected');
            
        } else {
            showeasypaisa.style.display = 'none';
        }
        showstripe.style.display = 'none';
    });
    }if(stripe){
        stripe.addEventListener('click', function() {
        if (showstripe.style.display === 'none') {
            showstripe.style.display = 'block';
            stripe.classList.add('selected');
            easypaisa.classList.remove('selected');
        } else {
            showstripe.style.display = 'none';
            easypaisa.classList.remove('selected');
        }
        showeasypaisa.style.display = 'none'
        easypaisa.style.classList.display = 'none';
    });
    }

    

</script>


