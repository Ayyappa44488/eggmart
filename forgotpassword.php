<?php session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['verify'])) {  
    date_default_timezone_set('Asia/Kolkata');
    $otp = (int)$_POST['otp'];
    $conn = new mysqli('localhost', 'root', '', 'test');
    if ($conn->connect_error) {
        die('Connection Failed:' . $conn->connection_error);
    } else {
        $email = $_SESSION['email']; 
        $query = "SELECT otp, otp_time FROM signup WHERE email = '$email';";
        $result = mysqli_query($conn, $query);
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            if ($row) {
                $otp_time = $row['otp_time'];
                $otp1 = $row['otp'];
                $fiveMinutesAgoTimestamp = strtotime('-5 minutes');
                $fiveMinutesAgoDateTime = date('Y-m-d H:i:s', $fiveMinutesAgoTimestamp);
                if ($otp == $otp1 && $otp_time > $fiveMinutesAgoDateTime) {
                  $_SESSION['otpvalidate']=0;
                  header("Location: resetpassword.php");
                } else {
                    $_SESSION['otpvalidate']=1;
                }
            } else {
                echo "Email not found in the database.";
            }
        } else {
            echo "Query execution failed: " . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
  }
}
  ?>
<!DOCTYPE html>
<html>
<head>
  <title>OTP Validation</title>
  <link class="logo" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTXtMEL68z41vqJh6ZYXBvZbN_9ZhWxnOVvMQ&usqp=CAU" rel="icon" type="image/x-icon">
  <style>
html, body {
  height: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
}
.logo{
  width: 50px;
  height: 50px;
  border-radius: 2cm;
  }
.container {
  width: 315px;
  height: 220px;
  margin: 0 auto;
  padding: 20px;
  background-color: #f0f0f0;
  border: 1px solid #ccc;
  border-radius: 5px;
}

h2 {
  text-align: center;
  margin-bottom: 20px;
}

input{
  width: 94%;
  padding-left: 15px;
  margin-bottom: 10px;
  height: 40px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

button {
  width: 100%;
  padding: 10px;
  background-color: #4CAF50;
  color: #fff;
  border: none;
  border-radius: 3px;
  cursor: pointer;
}

button:hover {
  background-color: #45a049;
}

button:focus {
  outline: none;
}

.error-message {
  color: red;
  margin-top: 10px;
}
.loader-overlay {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0, 0, 0, 0.5);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 9999;
    display: none; /* Initially hide the loader */
  }

  .loader {
    border: 8px solid #f3f3f3;
    border-radius: 50%;
    border-top: 8px solid #4CAF50; /* Change the loader color here */
    width: 60px;
    height: 60px;
    animation: spin 2s linear infinite;
  }
  .cac{
    position: absolute;
    color:red;
    font-size:small;
    margin-left:5px;
    margin-top:3px;
  }
  .cac:hover,
  .cac:focus{
    color:violet;
    cursor:pointer;
  }
  @keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
  }
</style>
</head>
<body style="background-image: url('https://cdn.britannica.com/56/155656-050-EF76EB04/chickens-poultry-farm.jpg')";>
  <div class="container">
    <h2>OTP Validation</h2>
    <center><br><span style="color:red"><?php if (isset($_SESSION['otpvalidate'])&&($_SESSION['otpvalidate'])==1) echo 'Incorrect OTP';?></span></center>
    <form id="otpForm" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <input type="text" placeholder="Enter OTP" name="otp" minlength="6" maxlength="6" required>
      <button type="submit" name="verify">Verify OTP</button>
    </form>
    <div style="text-align: center;margin-top: 10px;">
      <span style="font-size:small;">Didn't receive the OTP?</span>
      <span class="cac" onclick="resendOTP()">Resend OTP</span>
  </div>
  </div>
  <div class="loader-overlay" id="loaderOverlay">
     <div class="loader"></div>
  </div>
  <script>
    function resendOTP(){
      document.getElementById("loaderOverlay").style.display = "flex";
      setTimeout(function() {
        window.location.href = "forgot.php";
      }, 0);
    }
    </script>
</body>
</html>
