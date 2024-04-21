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
  width: 315px;
  height: 200px;
  margin: 0 auto;
  padding: 20px;
  background-color: #f0f0f0;
  border: 1px solid #ccc;
  border-radius: 5px;
  position: relative;
}

h2 {
  text-align: center;
  margin-bottom: 20px;
}

input[type="email"] {
  width: 94%;
  padding-left:15px;
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
    display: flex; /* Initially hide the loader */
  }

  .loader {
    border: 8px solid #f3f3f3;
    border-radius: 50%;
    border-top: 8px solid #4CAF50; /* Change the loader color here */
    width: 60px;
    height: 60px;
    animation: spin 2s linear infinite;
  }

  @keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
  }
    </style>
</head>
<body style="background-image: url('https://cdn.britannica.com/56/155656-050-EF76EB04/chickens-poultry-farm.jpg')";>
  <div class="container">
    <h2>Enter Email</h2>
    <form id="otpForm" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <input type="email" placeholder="Enter Email" name="email" required>
      <button type="submit" name="verify">Send OTP</button>
    </form>
  
<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['verify'])) {  
    $email = $_POST['email'];
    $conn=new mysqli('localhost','root','','test');
    if($conn->connect_error){
        die('Connection Failed:'.$conn->connection_error);}
    else{
      echo '<div class="loader-overlay" id="loaderOverlay">
      <div class="loader"></div>
        </div>';
      $query="SELECT * FROM signup WHERE email='$email' ";
      $result=mysqli_query($conn,$query);
      if(mysqli_num_rows($result)>0){
        $_SESSION['email'] = $email;
        echo '<script>
                setTimeout(function() {
                  window.location.href = "forgot.php";
                }, 0); // Delay in milliseconds (2 seconds)
              </script>';
        }
        else{  
            echo "<script>alert('create account')</script>";
            header('Location: address.php');}
    }}}
    ?>
    </div>
</body>
</html>
