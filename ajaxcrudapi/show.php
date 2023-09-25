<?php
include "dbcon.php";
$sql="select * from api";
$res=mysqli_query($con,$sql);
if(mysqli_num_rows($res)>0)
{
    $data=array();
    while($row=mysqli_fetch_assoc($res))
    {
        $data[]=$row;
    }
}
echo json_encode($data);
?>