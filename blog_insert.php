<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
</head>

<body>
    <?php
    if (isset($_SESSION['uname'])) {
        $username = $_SESSION['uname'];
        if (isset($_POST['post'])) {
            require_once("./includes/connect.php");
            $post_title = $_POST['post_title'];
            $post_text = $_POST['post_text'];
            $created_at =  date("Y/m/d h:i:sa");
            $is_del = 0;
            $sql = "insert into `post` values (`id`, '$username', '$post_text', '$post_title', '$created_at', 0);";
            $result = mysqli_query($conn, $sql);
            $num_rows = mysqli_affected_rows($conn);
            if ($num_rows == 1) {
                echo " post inserted sucessfully "
    ?>
            <?php
            }
        } else {
            ?>
            <h1>Welcome <?php echo $username; ?></h1>
            <button><a href="logout.php">Logout </a></button><br><br>
            <button><a href="view_my_post.php">View My Post </a></button><br><br>


            <form action="" method="post">
                <frameset>
                    <label for="Title"> Post Title </label>
                    <input type="text" name="post_title" placeholder="Enter Post Title"> <br> <br>

                    <label for="Post"> Post text </label>
                    <br>
                    <br>
                    <textarea name="post_text" cols="30" rows="10" placeholder="Enter Post Text"></textarea> <br>
                    <br>

                    <input type="submit" name="post" value="post"> <br>
                </frameset>

            </form>

    <?php
        }
    } else {
        header("Location:login.php");
    }
    ?>
</body>

</html>