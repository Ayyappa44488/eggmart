<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['add2'])) {  
        $n=$_POST['n_double'];
        if (isset( $_SESSION['n_double']))
        $_SESSION['n_double']+=$n;
        else{
            $_SESSION['n_double']=$n;
        }}
        if (isset($_POST['add1'])) {  
            $n=$_POST['n_single'];
            if (isset( $_SESSION['n_single']))
            $_SESSION['n_single']+=$n;
            else{
            $_SESSION['n_single']=$n;
            }}
}
$_SESSION['cart']="added";
header("Location: project.php");
?>