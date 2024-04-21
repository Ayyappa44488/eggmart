<?php session_start();?>
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
  width: 300px;
  height: 200px;
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

input[type="text"]{
  width: 94%;
  padding-left: 15px;
  margin-bottom: 10px;
  height: 40px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

button[type="submit"] {
  width: 100%;
  padding: 10px;
  background-color: #4CAF50;
  color: #fff;
  border: none;
  border-radius: 3px;
  cursor: pointer;
}

button[type="submit"]:hover {
  background-color: #45a049;
}

button[type="submit"]:focus {
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
      <button type="submit" name="verify">Verify</button>
    </form>
  <div class="loader-overlay" id="loaderOverlay">
    <div class="loader"></div>
  </div>
  <script>
    function showLoader() {
      document.getElementById("loaderOverlay").style.display = "flex";
      }
      function hideLoader() {
      document.getElementById("loaderOverlay").style.display = "none";
      }
      document.getElementById("otpForm").addEventListener("submit", function() {
      showLoader();
      });
  </script>              
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['verify'])) {
        session_start();
        $otp = (int)$_POST['otp'];
        $email=$_SESSION['email'];
        $firstname=$_SESSION['firstname'];
        $lastname=$_SESSION['lastname'];
        $phone=$_SESSION['phone'];
        $password=$_SESSION['password'];
        $dno=$_SESSION['dno'];
        $sname=$_SESSION['sname'];
        $village=$_SESSION['village'];
        $dis=$_SESSION['dis'];
        $state=$_SESSION['state'];
        $pin=$_SESSION['pin'];
        $locality=$_SESSION['locality'];
        if ($otp == $_SESSION['otp']) {
            $_SESSION['otpvalidate']=FALSE;
            $conn=new mysqli('localhost','root','','test');
            if($conn->connect_error){
                die('Connection Failed:'.$conn->connection_error);
            }
            else{
                $stmt=$conn->prepare("insert into signup(firstname,lastname,email,phone,password,dno,sname,village,district,state,pincode,local) values(?,?,?,?,?,?,?,?,?,?,?,?)");
                $stmt->bind_param("ssssssssssss",$firstname,$lastname,$email,$phone,$password,$dno,$sname,$village,$dis,$state,$pin,$locality);
                $stmt->execute();
                session_unset();
                session_destroy();
                header("Location: project.php");
                $stmt->close();
                $conn->close();
            }
        header('location: project.php');
        } else {
        $_SESSION['otpvalidate']=TRUE;
        header("Location: otp.php");
        }
    }
}?>
</body>
</html>
