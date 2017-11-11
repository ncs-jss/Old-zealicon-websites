<?php
session_start();
session_destroy();
$_SESSION['err']="";
header('location:../index.php');
?>