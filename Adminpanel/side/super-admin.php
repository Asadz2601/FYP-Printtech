<?php
include("header.php");
include("nav.php");
include("side.php");
include("assets/backend/super-admin.php");


?>
<div class="container pt-5">
    <div class="row pt-5 ">
        <div class="col-md-4"></div>
        <div class="col-md-6 pt-5 bg-white  login-box">
        <h2 class="text-center fs-1 fw-bold"  id="color">Admin</h3>          
       
        <form action="" class="row g-3 needs-validation" method="post" enctype="multipart/form-data">

     <div class="mb-3">
        <label for="exampleInputName1" class="form-label">Full Name</label>
        <input type="text" class="form-control" name="name" id="yourName" oninput="validateName()">
        <div id="fullnameError" style="color: red;"></div>
     </div>

     <div class="mb-3">
    <label for="exampleInputUsername1" class="form-label">Username</label>
    <input type="text" class="form-control" name="username" id="exampleInputUsername1" oninput="validateUsername(this.value)">
    <div id="usernameError" style="color: red;"></div>
</div>



     <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" >
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
     </div>

     <div class="mb-3">
        <label for="exampleInputPhone1" class="form-label">Phone #</label>
        <input type="number" name="phone" class="form-control" id="exampleInputPhone1" >
     </div>

     <div class="mb-3">
        <label for="exampleInputAddress1" class="form-label">Address</label>
        <input type="text" name="address" class="form-control" id="exampleInputAddress1" >
     </div>

     <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1" onkeyup="validatePassword()" >
        <div id="passwordError" style="color: red;" ></div>
     </div>

     <input type="file" name="choosefile">

     <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1" >
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
     </div>
     
     <button type="submit" class="btn btn-primary form-control" name="submit">Create Account</button>
     </form>
        </div>
      </div>
        </div>
        <div class="col-md-2"></div>
     </div>
   

     </div>
</div>

<script>
function validateUsername(inputValue) {
    var regex = /^[a-zA-Z0-9]+$/;
    var errorMessage = document.getElementById("usernameError");

    if (!regex.test(inputValue)) {
        errorMessage.innerHTML = "Username can only contain alphabets and digits.";
    } else {
        errorMessage.innerHTML = "";
    }
}


// function validateName() {
//   const nameInput = document.getElementById('yourName'); // Assuming your input field has id 'yourName'
//   const errorDiv = document.getElementById('fullnameError'); // Assuming your error message container has id 'name-error'
//   const name = nameInput.value;

//   // Check for non-alphabetic characters
//   if (/[^A-Za-z]/.test(name)) {
//     errorDiv.textContent = 'Name should only contain alphabetic characters.';
//     nameInput.setCustomValidity('Invalid characters');
//   } else {
//     errorDiv.textContent = '';
//     nameInput.setCustomValidity('');
//   }
// }


function validateName() {
  const nameInput = document.getElementById('yourName'); // Assuming your input field has id 'yourName'
  const errorDiv = document.getElementById('fullnameError'); // Assuming your error message container has id 'fullnameError'
  const name = nameInput.value;

  // Check for non-alphabetic characters and spaces
  if (/[^A-Za-z\s]/.test(name)) {
    errorDiv.textContent = 'Name should only contain alphabetic characters and spaces.';
    nameInput.setCustomValidity('Invalid characters');
  } else {
    errorDiv.textContent = '';
    nameInput.setCustomValidity('');
  }
}

</script>


<?php
include("footer.php");

?>

