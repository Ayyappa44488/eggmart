<?php
// Retrieve the submitted credentials
$username = $_POST['username'];
$password = $_POST['password'];

// Validate the credentials
if ($username === 'kchinnareddy2016@gmail.com' && $password === 'Ayyappa@2003') {
  // Successful login
  echo "success";
} else {
  // Incorrect password
  echo "error";
}
?>
