<?php
session_start();
$_SESSION['n_double'] =$_SESSION['n_double']-1;
if($_SESSION['n_double']==0)
{
 unset($_SESSION['n_double']);
}
?>