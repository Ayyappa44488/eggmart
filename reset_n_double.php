<?php
session_start();
$_SESSION['n_double'] = 0;
unset($_SESSION['n_double']);
if(!(isset($_SESSION['n_double']) || isset($_SESSION['n_single'])))
{
   echo "Back";
}
?>
