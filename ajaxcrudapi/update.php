<?php
include "dbcon.php";
$data=stripslashes(file_get_contents("php://input"));
$mydata=json_decode($data,true);
$id=$mydata['sid'];
$sql="select * from api where id='$id'";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($res);
echo json_encode($row);
?>