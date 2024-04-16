<?php

// include('smtp\class.phpmailer.php');
// include('smtp\PHPMailerAutoload.php');
function send_email($email,$html,$subject){
    $mail=new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host="smtp.gmail.com";
    $mail->Port=587;
    $mail->SMTPSecure="tls";
    $mail->SMTPAuth=true;
    $mail->Username="25207@students.riphah.edu.pk";
    $mail->Password="Usama@12345";
    $mail->SetFrom("25207@students.riphah.edu.pk");
    $mail->addAddress($email);
    $mail->IsHTML(true);
    $mail->Subject=$subject;
    $mail->Body=$html;
    $mail->SMTPOptions=array('ssl'=>array(
        'verify_peer'=>false,
        'verify_peer_name'=>false,
        'allow_self_signed'=>false
    ));
    if($mail->send()){
        //echo "done";
    }else{
        //echo "Error occur";
    }
}


function send_email_constant($html,$subject){
    $mail=new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host="smtp.gmail.com";
    $mail->Port=587;
    $mail->SMTPSecure="tls";
    $mail->SMTPAuth=true;
    $mail->Username="25207@students.riphah.edu.pk";
    $mail->Password="Usama@12345";
    $mail->SetFrom("25207@students.riphah.edu.pk");
    $mail->addAddress("25207@students.riphah.edu.pk");
    $mail->IsHTML(true);
    $mail->Subject=$subject;
    $mail->Body=$html;
    $mail->SMTPOptions=array('ssl'=>array(
        'verify_peer'=>false,
        'verify_peer_name'=>false,
        'allow_self_signed'=>false
    ));
    if($mail->send()){
        echo "done";
    }else{
        echo "Error occur";
    }
}


?>

