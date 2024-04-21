<?php
session_start();
$_SESSION['n_single'] =$_SESSION['n_single']+1;
echo "increment";
?>