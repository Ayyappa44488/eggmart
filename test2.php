<html>
  <body>
  <h2>OTP Validation</h2>
    <form id="otpForm" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <input type="text" placeholder="Enter OTP" name="otp" required>
      <center><br><span style="color:red"><?php if (isset($_SESSION['otpvalidate'])&&($_SESSION['otpvalidate'])==1) echo 'Incorrect OTP';?></span></center>
      <button type="submit" name="verify">Verify</button>
    </form>
</body>
</html>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['verify'])) {
       date_default_timezone_set('Asia/Kolkata');
        $otp = (int)$_POST['otp'];
        $conn = new mysqli('localhost', 'root', '', 'tes');
        if ($conn->connect_error) {
            die('Connection Failed:' . $conn->connection_error);
        } else {
            $email = 'kchinnareddy2016@gmail.com'; 
            $query = "SELECT otp, otp_time FROM signup
                      WHERE email = '$email';";

            $result = mysqli_query($conn, $query);
            if ($result) {
                $row = mysqli_fetch_assoc($result);
                if ($row) {
                    $otp_time = $row['otp_time'];
                    $otp1 = $row['otp'];
                    $fiveMinutesAgoTimestamp = strtotime('-5 minutes');
                    $fiveMinutesAgoDateTime = date('Y-m-d H:i:s', $fiveMinutesAgoTimestamp);
                    if ($otp == $otp1 && $otp_time > $fiveMinutesAgoDateTime) {
                        echo $otp_time;
                        echo "<br>";
                        echo $fiveMinutesAgoDateTime;
                        echo "OTP verified.";
                    } else {
                        echo "OTP not verified.";
                    }
                } else {
                    echo "Email not found in the database.";
                }
            } else {
                echo "Query execution failed: " . mysqli_error($conn);
            }

            // Close the database connection
            mysqli_close($conn);
        }
    }
}
?>