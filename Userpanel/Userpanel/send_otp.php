<?php
  session_start();
  include('connect/db.php');
  include('smtp/PHPMailerAutoload.php');
    $email=$_POST['email'];
    $res=mysqli_query($conn,"select * from users where email='$email'");
    $_SESSION['EMAIL'] = $email;
    $count=mysqli_num_rows($res);
    if($count>0){
        $otp=rand(11111,99999);
        mysqli_query($conn,"update users set otp='$otp' where email='$email'");
        $html="Your otp verification code is ".$otp;
        //$_SESSION['EMAIL']=$email;
        smtp_mailer($email,'Here is Your OTP Verification code.Please donot share it with others ',$html);
        echo "yes";
    }else{
        echo "not_exist";
    }

function smtp_mailer($to,$subject, $msg){
	$mail = new PHPMailer(); 
	$mail->IsSMTP(); 
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'tls'; 
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 587; 
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	//$mail->SMTPDebug = 2; 
	$mail->Username = "usamaashrafseo2002@gmail.com"; // write your email here
	$mail->Password = "ubbh ihga unqo ozua"; // to step verification password that show on screen
	$mail->SetFrom("usamaashrafseo2002@gmail.com");// write your email here
	$mail->Subject = $subject;
	$mail->Body =$msg;
	$mail->AddAddress($to);
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if(!$mail->Send()){
		echo $mail->ErrorInfo;
	}else{
		return 'Sent';
	}
}
?>