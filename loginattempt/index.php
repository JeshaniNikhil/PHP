<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    session_start();
    error_reporting(E_ALL ^ E_NOTICE);

    if (isset($_COOKIE['user'])) {
        ?>
        <meta http-equiv="refresh" content="20">
        <?php
        echo $_COOKIE['user'];
    } else {
        ?>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Form</title>
    </head>
    <body>
        <form action="" method="post">
            <h2>Enter User Id:</h2><br>
            <input type="text" name="un" id="">
            <h2>Enter Password:</h2><br>
            <input type="password" name="pwd">
            <input type="submit" value="login" name="btn">
        </form>
    </body>
    </html>
    <?php
    if (isset($_POST['btn'])) {
        $unm = $_POST['un'];
        $pwd = $_POST['pwd'];

        if ($unm == "abcd" && $pwd == "1234") {
            echo "successfully login";
        } else {
            // Initialize the session variable if not set
            if (!isset($_SESSION['u'])) {
                $_SESSION['u'] = 0;
            }

            $_SESSION['u'] += 1;
            echo $_SESSION['u'];

            if ($_SESSION['u'] > 2) {
                header("location: time.php");
                
            }
        }
    }
}
?>
