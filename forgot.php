<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
session_start();
date_default_timezone_set('Asia/Kolkata');
$current=date("Y-m-d H:i:s");
$otp=generateOTP();
$conn=new mysqli('localhost','root','','test');
if($conn->connect_error){
    die('Connection Failed:'.$conn->connection_error);
}
else{
  $email=$_SESSION['email'];
  $query="UPDATE signup
  SET otp = '$otp', otp_time = '$current'
  WHERE email = '$email';
    ";
  $result=mysqli_query($conn,$query);
if($result){
$htmlcontent=
'<html>
<head>
  <style>
  .logo{
    width: 25px;
    height: 25px;
    border-radius: 2cm;
    }
  </style>
</head>
<body>  
<h3>Your OTP is <a><span style="color:#04AA6D;">'.$otp.'</span></a>.OTP is valid for 5 minutes.</h3><br><br><br><br>        
<span style="font-size:15px;color:red;"><i>Regards,</span></i><br><br>
<div style="display: flex; align-items: center;">
<div><img class="logo" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTXtMEL68z41vqJh6ZYXBvZbN_9ZhWxnOVvMQ&usqp=CAU"></div>
<div style="margin-left: 2px; margin-top: 3px;"><span>atya Bhaskara Egg Mart</span></div>
</div>  
</body>
</html>';
$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->Host="smtp.gmail.com";
$mail->SMTPAuth="true";
$mail->Username="";
$mail->Password="";
$mail->SMTPSecure="ssl";
$mail->Port="465";
$mail->setFrom("");
$mail->addAddress($_SESSION['email']);
$mail->isHTML(true);
$mail->Subject="Egg Mart OTP Verification";
$mail->Body=$htmlcontent;
$mail->send();
if(isset($_SESSION['otpvalidate'])){
  $_SESSION['otpvalidate']=0;
}
header("Location: forgotpassword.php");
  }}
function generateOTP() {
    $otpLength = 6;
    $otp = "";
    $digits = "0123456789";

    for ($i = 0; $i < $otpLength; $i++) {
        $otp .= $digits[rand(0, strlen($digits) - 1)];
    }
    return $otp;
}?>
