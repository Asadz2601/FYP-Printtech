<?php

include("header.php");
include("nav.php");
include("side.php");
include("assets/backend/edit-admin.php");

?>
<div class="container pt-5">
    <div class="row pt-5 ">
        <div class="col-md-4"></div>
        <div class="col-md-6 pt-5 bg-white  login-box">
        <h2 class="text-center fs-1 fw-bold"  id="color">Admin</h3>
        <?php
        $id=$_REQUEST['id'];

        $query="SELECT * FROM `admin` where id='$id' ";
        $result=mysqli_query($conn,$query);
        if($result->num_rows > 0){
           while($row=$result->fetch_assoc()){
            
            
            ?>          
       
        <form action="" method="post" onsubmit="return validateForm()">
     <div class="mb-3">
        <label for="exampleInputName1" class="form-label">Name</label>
        <input type="text" class="form-control" name="name" value=<?php echo $row['name']; ?> id="exampleInputName1" required>
     </div>

     <!-- <div class="mb-3">
       <label for="size" class="form-label">Size</label>
      <select name="size" class="form-select" id="size" required>
        <option value="" selected disabled> 
            <?php 
            // echo $row['username']; 
            ?> </option>
        <option >Size 1</option>
        <option >Size 2</option>
        <option >Size 3</option>
        
       </select>
      </div> -->
      <div class="mb-3">
        <label for="exampleInputName1" class="form-label">Username</label>
        <input type="text" class="form-control" name="username" value=<?php echo $row['username']; ?> id="exampleInputName1" required>
     </div>


     <div class="mb-3">
        <label for="exampleInputName1" class="form-label">Email</label>
        <input type="text" class="form-control" name="email" value=<?php echo $row['email']; ?> id="exampleInputName1" required>
     </div>


     <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Phone</label>
        <input type="text" class="form-control" name="phone"  value=<?php echo $row['phone']; ?>  id="exampleInputEmail1" aria-describedby="emailHelp" required>    
     </div>
       

     <div class="mb-3">
        <label for="exampleInputAddress1" class="form-label">Address</label>
        <input type="text" name="address" class="form-control"  value=<?php echo $row['address']; ?>  id="exampleInputAddress1" required>
     </div>
     <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
     </div>

     <button type="submit" class="btn btn-primary form-control" name="edit">Edit Product</button>
     </form>
        </div>
      </div>
        </div>
        <div class="col-md-2"></div>
     </div>
   

     </div>
</div>
<?php
   }}

?>







<?php
include("footer.php");

?>