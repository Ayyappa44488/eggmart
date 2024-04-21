<?php
session_start();
$_SESSION['n_single'] =$_SESSION['n_single']-1;
if($_SESSION['n_single']==0)
{
 unset($_SESSION['n_single']);
}
?>