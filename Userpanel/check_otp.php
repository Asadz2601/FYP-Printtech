<?php
  include('connect/db.php');
  session_start();
    $otp = $_POST['otp'];
    $email = $_SESSION['EMAIL'];
    $res=mysqli_query($conn,"select * from users where email='$email' AND otp = '$otp'");
    $count=mysqli_num_rows($res);
    if($count>0){
        //$otp=rand(11111,99999);
        mysqli_query($conn,"update users set otp='$otp' where email='$email'");
        // $html="Your otp verification code is ".$otp;
        // //$_SESSION['EMAIL']=$email;
        // smtp_mailer($email,'HAN OA DALLA VERIFICATION KE MAIL AAI HA TO CALL KR  OTP Verification code is ',$html);
        echo "yes";
    }else{
        echo "not_exist";
    }


?>