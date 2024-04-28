<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>    
  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

    <style>
        .second_box{
            display:none;
        }
        
        .filederror{
            color:red;
        }
    </style>
</head>
<body>
<div class="container pt-5">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4 border border-2">
        <form method="post" >
    <h2 class="text-center pb-3">Otp</h2>
    <div class="first_box">
        <input type="text" class="form-control" id="email" name="email" placeholder="Email">
        <span id="emailerror" class="filederror"></span>
    </div>
    <div class="first_box text-center pt-3 pb-3">
        <input type="button" style="border-radius:8px; " class="bg-primary text-light" value="Submit" onclick="sendOtp()">
    </div>
    <div class="second_box">
        <input type="text" class="form-control" id="otp" name="otp" placeholder="OTP">
        <span id="otperror" class="filederror"></span>
    </div>
    <div class="second_box text-center">
        <input type="button" style="border-radius:8px;" class="bg-primary text-light" value="Submit Otp" onclick="submitOtp()">
    </div>
</form>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    function sendOtp(){
        var email = $('#email').val(); // jQuery object should be referred to as '$', not 'jquery'
        $.ajax({ // Corrected capitalization of 'jQuery'
            url: 'send_otp.php',
            type: 'post',
            data: { email: email }, // Corrected the syntax for passing data
            success: function(result){
                if(result == 'yes'){
                    jQuery('.second_box').show();
                    jQuery('.first_box').hide();
                }
                if(result == 'not_exist'){
                    jQuery('#emailerror').html('Please Enter Valid Email');
                }
            }
        });
    }



    function submitOtp(){
        var otp = $('#otp').val(); // jQuery object should be referred to as '$', not 'jquery'
        $.ajax({ // Corrected capitalization of 'jQuery'
            url: 'check_otp.php',
            type: 'post',
            data: { otp: otp }, // Corrected the syntax for passing data
            success: function(result){
                if(result == 'yes'){
                    window.location = 'pages-login.php';
                }
                if(result == 'not_exist'){
                    jQuery('#otperror').html('Please Enter Valid OTP');
                }
            }
        });
    }

    


</script>

    

</body>
</html>