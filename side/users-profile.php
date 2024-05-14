<?php

include("header.php");
include("nav.php");
include("side.php");
include("assets/backend/edit-product.php");

?>
<div class="container pt-5">
    <div class="row pt-5 ">
        <div class="col-md-4"></div>
        <div class="col-md-6 pt-5 bg-white  login-box">
        <h2 class="text-center fs-1 fw-bold"  id="color">My Profile</h3>
        <?php
        $usernames=$_SESSION['username'];
   // Fetch data from admin table
   $adminQuery = "SELECT * FROM `admin` WHERE username = '$usernames'";
   $adminResult = mysqli_query($conn, $adminQuery);
   
   if ($adminResult->num_rows > 0) {
       $adminRow = $adminResult->fetch_assoc();
       // Display admin information
      $name= $adminRow['name'];
      $user= $adminRow['username'];
      $email= $adminRow['email'];
      $phone = $adminRow['phone'];
      $address = $adminRow['address'];
      
   } else {
       // Fetch data from users table
       $userQuery = "SELECT * FROM `users` WHERE username = '$usernames'";
       $userResult = mysqli_query($conn, $userQuery);
   
       if ($userResult->num_rows > 0) {
           $userRow = $userResult->fetch_assoc();
           // Display user information
          
      $name= $userRow['name'];
      $user= $userRow['username'];
      $email= $userRow['email'];
       } 
   }

   
   $imgquery = mysqli_query($conn,"SELECT * FROM admin WHERE username = '$username'");
   $row = mysqli_fetch_assoc($imgquery);
   ?>
   
   <img src="uploads/<?php echo $row['image']; ?>" class="img-fluid" alt="" style="width: 180px; height: 180px; image-rendering: pixelated; display: block; margin: 0 auto;">


     <div class="mb-3">
        <label for="exampleInputName1" class="form-label">Full Name</label>
        <input type="text" class="form-control" name="pname" value=<?php echo $name; ?> id="exampleInputName1" readonly>
     </div>

     <div class="mb-3">
        <label for="exampleInputName1" class="form-label">Username</label>
        <input type="text" class="form-control" name="pname" value=<?php echo $user; ?> id="exampleInputName1" readonly>
     </div>

     <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email</label>
        <input type="text" class="form-control" name="pquality"  value=<?php echo $email; ?>  id="exampleInputEmail1" aria-describedby="emailHelp" readonly>    
     </div>
     <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Phone</label>
        <input type="text" class="form-control" name="pquality"  value=<?php echo $phone; ?>  id="exampleInputEmail1" aria-describedby="emailHelp" readonly>    
     </div>
     <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Address</label>
        <input type="text" class="form-control" name="pquality"  value=<?php echo $address; ?>  id="exampleInputEmail1" aria-describedby="emailHelp" readonly>    
     </div>
   
        </div>
      </div>
        </div>
        <div class="col-md-2"></div>
     </div>
   

     </div>
</div>



<?php
include("footer.php");

?>