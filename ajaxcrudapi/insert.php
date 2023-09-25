<?php
include "dbcon.php";
$data=stripslashes(file_get_contents("php://input"));
$mydata=json_decode($data,true);
$id=$mydata['id'];
$name=$mydata['name'];
$email=$mydata['email'];
$password=$mydata['password'];
$insert="INSERT INTO `api`(`id`,`name`, `email`, `password`) VALUES ('$id','$name','$email','$password') ON DUPLICATE KEY UPDATE name='$name',email='$email',password='$password'";
if($conn=mysqli_query($con,$insert)==TRUE)
{
    echo "student saved successfully";
}
else
{
    echo "fill all fields";
}
?>