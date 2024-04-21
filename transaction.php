<!-- payment connection -->
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
session_start();
$amount=$_SESSION['amount_payable'];
if (isset($_SESSION['n_single'])){
    $ns=$_SESSION['n_single'];
    $ms=$_SESSION['price']*30;
}
else{
    $ns=0;
    $ms=0;
}
if (isset($_SESSION['n_double'])){
    $nd=$_SESSION['n_double'];
    $md=$_SESSION['price']*45;
}
else{
    $nd=0;
    $md=0;
}
$price=$_SESSION['price'];
$n=$ns+$nd;
$email=$_SESSION['email'];
date_default_timezone_set('Asia/Kolkata');
$currentDate = date('Y-m-d');
$currentTime = date('H:i:s'); 
$Egg1= number_format((float)($price), 2, ".", "");
$Egg2= number_format((float)($price*1.5), 2, ".", "");
if (isset($_SESSION['n_single'])) {
$content1='
  <div style="display:flex">
   <div><img src="https://qph.cf2.quoracdn.net/main-qimg-d9bb45335a87c57e472950f8cec31f3d-lq" class="egg" id="myImg"></div>
    <div style="padding:5px;">
      <span style="font-size:12px"><b>1 Yolk Tray (30 eggs)</b><br></span>
      <span style="font-size:10px">Qty: '.$ns.'</span><br>
      <span style="font-size:10px" >Rs.'.round($ns*$ms,0).'.00</span><span style="opacity:0.6;font-size:5px;" id="se">('.$Egg1.'/egg)</span><br>
      <s><span style="font-size:7px;" >Rs. '.round($ns*$ms*(10/9),0).'.00</span></s>
      <span style="font-size:7px;" >10% Off</span><br>
      <span style="color:#04AA6D;font-size:7px;">You save Rs. '.round($ns*$ms*(1/9),0).'.00</span>
    </div>
    </div>
    ';
  }
else{
$content1='';
}  
if (isset($_SESSION['n_double'])){
$content2='
<br>
<div style="display:flex">
<br><div><img src="  https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR9CTQJlToICNSOWSYOLUkpzbOra4xwlZMUxA&usqp=CAU" class="egg"></div>
<div style="padding:5px;">
    <span style="font-size:12px"><b>2 Yolk Tray (30 eggs)</b><br></span>
    <span style="font-size:10px;">Qty: '.$nd.'</span><br>
    <span style="font-size:10px" >Rs.'.round($nd*$md,0).'.00</span><span style="opacity:0.6;font-size:7px;" id="se">('.$Egg2.'\egg)</span><br>
    <s><span style="font-size:7px;" >Rs. '.round($nd*$md*(10/9),0).'.00</span></s>
    <span style="font-size:7px;" >10% Off</span><br>
    <span style="color:#04AA6D;font-size:7px;">You save Rs. '.round($nd*$md*(1/9),0).'.00</span> 
  </div>
  </div>
  ';
}  
else{
  $content2='';
}  
$htmlContent = '<html>
                <head>
                  <title>Your Email Title</title>
                  <style>
                  .sub{
                    background-color:#ddd;
                    padding: 10px;
                    border-radius: 0.5cm;
                    align-items: center; 
                  }
                  .egg{
                    width: 120px;
                    height: 120px;
                    border-radius: 0.5cm;
                  }
                  .logo{
                    width: 25px;
                    height: 25px;
                    border-radius: 2cm;
                    }
                  </style>
              </head>
              <body>  
              <h1>Order Summary</h1>          
              <div class="sub"> 
              '.$content1.$content2.'
              <br>
              <h2>Payment Details</h2>
              <hr>
              <span style="font-size:10px"><b>Total Amount: Rs. '.$amount.'.00</b></span><br><br>
              </div>
              <span style="font-size:10px;color:#04AA6D;">Payment was Successfull</span><br>
              <span style="font-size:10px;">Order will be delivered to '.$_SESSION['address'].' within 4 days.Thanks for ordering eggs through our website</span><br><br>  
              <hr style="border:solid 1px">
              <span style="font-size:15px;color:red;"><i>Regards,</span></i><br><br>
              <div style="display: flex; align-items: center;">
              <div><img class="logo" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTXtMEL68z41vqJh6ZYXBvZbN_9ZhWxnOVvMQ&usqp=CAU"></div>
              <div style="margin-left: 2px; margin-top: 3px;"><span>atya Bhaskara Egg Mart</span></div>
              </div>  
              </body>
              </html>';
$conn=new mysqli('localhost','root','','test');
if($conn->connect_error){
    die('Connection Failed:'.$conn->connection_error);
}
else{
    $stmt=$conn->prepare("insert into transaction(email,price,ntrays,one_yolk,two_yolk,amount_paid,date,time) values(?,?,?,?,?,?,?,?)");
    $stmt->bind_param("ssssssss",$email,$price,$n,$ns,$nd,$amount,$currentDate,$currentTime);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';
    require 'phpmailer/src/SMTP.php';
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host="smtp.gmail.com";
    $mail->SMTPAuth="true";
    $mail->Username="";
    $mail->Password="";
    $mail->SMTPSecure="ssl";
    $mail->Port="465";
    $mail->setFrom("");
    $mail->addAddress($email);
    $mail->isHTML(true);
    $mail->Subject="Egg Mart-Order Received";
    $mail->Body=$htmlContent;
    $mail->send();
    unset($_SESSION['n_single']);
    unset($_SESSION['n_double']);
    header("Location: order.php");
}
?>
