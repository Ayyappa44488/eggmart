<?php
session_start();

// Check if session variables are set
if (isset($_SESSION['otp'])) {
    echo "User ID: " . $_SESSION['otpvalidate'];
} else {
    echo "Session variables are not set";
}
?>
