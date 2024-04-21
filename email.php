<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
session_start();
$htmlcontent='
<html>
<head>
  <style>
  .logo{
    width: 25px;
    height: 25px;
    border-radius: 2cm;
    }
    .rectangle {
      height:25px;
      width: 100%;
      background-color: #04AA6D;
      margin-top: 10px;
      margin-bottom: 10px;
    }
  </style>
  </head>
  <body>
  <div class="rectangle"></div>
  <h3>Your Password Reset Was Successful.You Can Login With Your New Password.</h3>
  <div class="rectangle"></div>
  <br><br><br><br>
  <span style="font-size:15px;color:red;"><i>Regards,</span></i><br><br>
  <div style="display: flex; align-items: center;">
  <div><img class="logo" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTXtMEL68z41vqJh6ZYXBvZbN_9ZhWxnOVvMQ&usqp=CAU"></div>
  <div style="margin-left: 2px; margin-top: 3px;"><span>atya Bhaskara Egg Mart</span></div>
  </div>
  </body>
  </html>
  ';
$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->Host="smtp.gmail.com";
$mail->SMTPAuth="true";
$mail->Username="epidermx6@gmail.com";
$mail->Password="byde vwgs bpte ieks";
$mail->SMTPSecure="ssl";
$mail->Port="465";
$mail->setFrom("epidermx6@gmail.com");
$mail->addAddress($_SESSION['email']);
$mail->isHTML(true);
$mail->Subject="Egg Mart";
$mail->Body=$htmlcontent;
$mail->send();
session_unset();
session_destroy();
header("Location: project.php");
?>