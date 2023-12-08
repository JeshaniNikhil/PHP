<html>
<head>
</head>
<body>
    <table border="1">
<?php
$con=mysqli_connect("localhost","root","","fileupload");
$sel="select * from `upload`";
$result=mysqli_query($con,$sel);
while($row=mysqli_fetch_assoc($result))
{
    $id=$row['id'];
?>
    <tr>
        <td>
    <img src="images/<?php echo $row['photo']?>" height="80" width="50">    
    </td>
    </tr>
    <?php
}
?>
    </table>
</body>
</html>
