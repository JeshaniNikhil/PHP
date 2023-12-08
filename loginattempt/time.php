<?php 
session_start();
session_destroy();
setcookie('user','Block Refresh After 20 Seconds',time()+20);
header("location:index.php");
?>