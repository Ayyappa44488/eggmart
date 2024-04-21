<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
session_start();
$email=$_POST['email'];
$password=$_POST['psw'];
$conn=new mysqli('localhost','root','','test');
if($conn->connect_error){
    die('Connection Failed:'.$conn->connection_error);
}
else{
    $query="SELECT * FROM signup WHERE email='$email' ";
    $result=mysqli_query($conn,$query);
    if(mysqli_num_rows($result)>0){
        header('Location: project.php?error=2');
    }
    else{
        $_SESSION['firstname']=$_POST['fname'];
        $_SESSION['lastname']=$_POST['lname'];
        $_SESSION['email']=$_POST['email'];
        $_SESSION['password']=$_POST['psw'];
        $_SESSION['phone']=(int)$_POST['pno'];
        $_SESSION['dno']=$_POST['dno'];
        $_SESSION['sname']=$_POST['sname'];
        $_SESSION['village']=$_POST['village'];
        $_SESSION['dis']=$_POST['dis'];
        $_SESSION['state']=$_POST['state'];
        $_SESSION['pin']=(int)$_POST['pin'];
        $_SESSION['locality']=$_POST['local'];
        $otp=generateOTP();
        $_SESSION['otp']=$otp;
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
        <h3>Your OTP is <a><span style="color:#04AA6D;">'.$otp.'</span></a>.OTP is valid for 15 minutes.</h3><br><br><br><br>        
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
        $mail->Username="epidermx6@gmail.com";
        $mail->Password="byde vwgs bpte ieks";
        $mail->SMTPSecure="ssl";
        $mail->Port="465";
        $mail->setFrom("epidermx6@gmail.com");
        $mail->addAddress($_SESSION['email']);
        $mail->isHTML(true);
        $mail->Subject="Egg Mart OTP Verification";
        $mail->Body=$htmlcontent;
        $mail->send();
        header("Location: otp.php");
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