<html>
<?php
$con=mysqli_connect("localhost","root","","fileupload");
if(isset($_REQUEST['btn']))
{
    $filename=$_FILES['photo']['name'];
    $filetemp=$_FILES['photo']['tmp_name'];
    $folder="images/".$filename;
    $move=move_uploaded_file($filetemp,$folder);
    $insert="INSERT INTO `upload`(`photo`) VALUES ('$filename')";
    mysqli_query($con,$insert);
 if(isset($move))
    {
     echo "<a download='$folder' href='$folder'>download</a>";
    }
}
?>

    <head>  
    </head>
    <body>
        <form method="post" action="#" enctype="multipart/form-data">
            <input type="file" name="photo"><br><br>
            <input type="submit" value="submit" name="btn">
</form>
    </body>
</html>