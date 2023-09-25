<?php
include "dbcon.php";
$data=stripslashes(file_get_contents("php://input"));
$mydata=json_decode($data,true);
$id=$mydata['sid'];
$sql="delete from api where id='$id'";
mysqli_query($con,$sql);
?>