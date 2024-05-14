<?php

include("header.php");
include("nav.php");
include("side.php");
include("assets/backend/add-product.php");


?>
<div class="container pt-5">
    <div class="row pt-5 ">
        <div class="col-md-4"></div>
        <div class="col-md-6 pt-5 bg-white  login-box">
        <h2 class="text-center fs-1 fw-bold"  id="color">Product</h3>          
       
        <form action="" method="post" onsubmit="return validateForm()">
     <div class="mb-3">
        <label for="exampleInputName1" class="form-label">Product Name</label>
        <input type="text" class="form-control" name="pname" id="exampleInputName1" required>
     </div>

     <div class="mb-3">
       <label for="size" class="form-label">Size</label>
      <select name="size" class="form-select" id="size" required>
        <option selected disabled>Select Size</option>
        <option >12*8</option>
        <option >22*12</option>
        <option >9*7</option>
        
       </select>
      </div>

     <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Paper Quality</label>
        <input type="text" class="form-control" name="pquality" id="exampleInputEmail1" aria-describedby="emailHelp" required>    
     </div>
       <div class="mb-3">
       <label for="printingSize" class="form-label">Printing Size</label>
      <select name="printsize" class="form-select" id="printingSize" required>
        <option value="" selected disabled>Select Printing Size</option>
        <option value="A4">A4</option>
        <option value="letter">Letter</option>
        <option value="legal">Legal</option>
        
       </select>
      </div>
     
     <div class="mb-3">
       <label for="exampleInputAddress1" class="form-label">Cutting</label>
      <select name="cutting" class="form-select" id="exampleInputAddress1" required>
        <option value="" selected disabled>Select Cutting</option>
        <option value="Straight">Striaght</option>
        <option value="Round">Round</option>      
       </select>
      </div>

     <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
     </div>

     <button type="submit" class="btn btn-primary form-control" name="submit">Add Product</button>
     </form>
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