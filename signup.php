<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
</head>
<?php
//If form is submitted
if (isset($_POST['signup'])) {

    //Post Variables are extracted

    $email = $_POST['u_email'];
    $uname = $_POST['username'];
    $is_del = 0;
    $pass = $_POST['password'];
    $c_pass = $_POST['c_password'];
    $err = 0;

    //Checking the password
    if ($pass == $c_pass) {
        $password = $pass;
    } else {
        $err++;
    }

    //If no error occured

    if ($err == 0) {
        require_once('./includes/connect.php');
        $sql = "insert into user values(`id`,  '" . $uname . "', '" . $password . "', '" . $email . "', " . $is_del . "); ";
        $result = mysqli_query($conn, $sql);
        $affected = mysqli_affected_rows($conn);
        if ($affected == 1) {
            echo "Registration sucessfull";
        } else {
            echo "Registration Failed";
        }
    } else {
        echo "Error Occured";
    }
}

//if the form is not submitted
else {
?>

    <body>
        <form action="" method="post">
            <label for="email"> Email
                <input type="email" name="u_email" placeholder="Enter Email here" required>
            </label> <br>
            <label for="username"> username
                <input type="text" name="username" placeholder="Enter username" required>
            </label><br>
            <label for="password"> Password
                <input type="password" name="password" placeholder="Enter password" required>
            </label><br>
            <label for="confirm password">Confirm Password
                <input type="password" name="c_password" placeholder="Enter Confirm password" required>
            </label><br>
            <input type="submit" value="signup" name="signup">
        </form>

    </body>
<?php
}
?>

</html>