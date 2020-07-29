<?php
session_start();
if (isset($_SESSION['uname'])) {
    header("Location:blog_insert.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<?php
if (isset($_POST['login'])) {
    require_once('./includes/connect.php');
    $cred1 = trim($_POST['login_cred1']);
    $pass = trim($_POST['login_cred2']);
    $sql = "select * from user where (`username` = '" . $cred1 . "' and `password` = '" . $pass . "') or (`email` = '" . $cred1 . " ' and `password` = '" . $pass . "');";
    $result = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($result);
    if ($num_rows == 1) {
        $arr = mysqli_fetch_assoc($result);
        $is_del = $arr['is_del'];
        if ($is_del == 0) {
            $_SESSION['uname'] = $arr['username'];
            header("Location:blog_insert.php");
        } else {
            echo "Please contact your administrator";
        }
    } else {
        echo "please check credential";
    }
} else {

?>

    <body>
        <form action="" method="POST">
            <label>Username / Email</label>
            <input type="text" name="login_cred1" placeholder="Enter Username or Email" required>
            <br> <br>
            <label>Password</label>
            <input type="password" name="login_cred2" placeholder="Enter password" required>
            <br> <br>
            <input type="submit" value="login" name="login">
        </form>

    </body>
<?php
}
?>

</html>