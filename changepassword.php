<?php session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Change Password</title>
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
  width: 325px;
  height: 290px;
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

    </style>
</head>
<body style="background-image: url('https://cdn.britannica.com/56/155656-050-EF76EB04/chickens-poultry-farm.jpg')";>
  <div class="container">
    <h2>Change Password</h2>
    <form id="otpForm" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <center><div class="error-message"><?php if (isset($_GET['error'])&&$_GET['error']==1) {echo "Incorrect Password";}?></div></center>
    <center><div class="error-message"><?php if (isset($_GET['error'])&&$_GET['error']==2) {echo "Please Enter Same Passwords";}?></div></center>
      <input type="password" placeholder="Enter Password" name="current" minlength="6" maxlength="14" required>
      <input type="password" placeholder="Re Enter Password" name="new" id="pass" minlength="6" maxlength="14" required>
      <input type="checkbox" id="showPassword" onchange="togglePasswordVisibility()" style="height:12px;width:12px;">
    <label for="showPassword">Show Password</label>
    <script>
         function togglePasswordVisibility() {
          var passwordInput = document.getElementById("pass");
          var showPasswordCheckbox = document.getElementById("showPassword");
          if (showPasswordCheckbox.checked) {
            passwordInput.type = "text"; // Change input type to "text" to show the password
          } else {
            passwordInput.type = "password"; // Change input type back to "password" to hide the password
          }
        }
    </script>
      <button type="submit" name="verify">Check Password</button><br>
    </form>
    <br><span style="margin-left:200px;"><a href="forgotemail.php">Forgot Password?</a></span>
  </div>
  <?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['verify'])) {  
        $newpass = $_POST['current'];
        $confirmpass = $_POST['new'];
        if ($newpass == $confirmpass) {
        $email = $_SESSION['email'];
        $conn = mysqli_connect("localhost", "root", "", "test");
        $sql ="SELECT * FROM signup WHERE email='$email' AND password='$newpass'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result)>0) {
            header("Location: resetpassword.php");
        }
        else{
            header("Location: changepassword.php?error=1");
        } 
    }else {
        header("Location: changepassword.php?error=2");
        }
    }}
    ?>
</body>
</html>
