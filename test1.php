<?php
date_default_timezone_set('Asia/Kolkata');
$current=date("Y-m-d H:i:s");
$otp=generateOTP();
$conn=new mysqli('localhost','root','','tes');
if($conn->connect_error){
    die('Connection Failed:'.$conn->connection_error);
}
else{
  $query="UPDATE signup
  SET otp = '$otp', otp_time = '$current'
  WHERE email = 'kchinnareddy2016@gmail.com';
    ";
  $result=mysqli_query($conn,$query);
  if($result){
    header('Location: test2.php');
  }
  else{
    echo "otp not sent";
  }
}
function generateOTP() {
  $otpLength = 6;
  $otp = "";
  $digits = "0123456789";

  for ($i = 0; $i < $otpLength; $i++) {
      $otp .= $digits[rand(0, strlen($digits) - 1)];
  }
  return $otp;
}
?>            