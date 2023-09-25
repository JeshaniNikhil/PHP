<?php
$con = mysqli_connect("localhost","root","","csc");
if($_POST['type']=="")
{
$sql = "SELECT * FROM countries";
$query=mysqli_query($con,$sql);
$str = "";
while($row = mysqli_fetch_assoc($query))
{
    $str.="<option value='{$row['id']}'>{$row['name']}</option>";
}
}
else if($_POST['type']=="stateData")
{
    $sql = "SELECT * FROM states where country_id={$_POST['id']}";
$query=mysqli_query($con,$sql);
$str = "";
while($row = mysqli_fetch_assoc($query))
{
    $str.="<option value='{$row['id']}'>{$row['name']}</option>";
}
}
else if($_POST['type']=="citydata"){
    $sql = "SELECT * FROM cities where state_id={$_POST['id']}";
    $query=mysqli_query($con,$sql);
    $str = "";
    while($row = mysqli_fetch_assoc($query))
    {
        $str.="<option value='{$row['id']}'>{$row['name']}</option>";
    }
}
echo $str;
?>