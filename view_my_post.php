<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View My post</title>
</head>

<body>

    <?php
    if (isset($_SESSION['uname'])) {
        require_once("./includes/connect.php");
        $username = $_SESSION['uname'];
    ?>
        <h1>Your Post</h1>
        <table border="1">
            <tr>
                <th>Sr. No.</th>
                <th>Post Title</th>
                <th>Created On </th>
                <th>View Post</th>
            </tr>
            <?php
            $sql = "select * from post where `author` = '$username' and `is_del` = 0;";
            $result = mysqli_query($conn, $sql);
            $num_rows = mysqli_num_rows($result);
            if ($num_rows > 0) {
                $count = 1;
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                    <tr>
                        <td> <?php echo $count; ?> </td>
                        <td><?php echo $row['post_title']; ?></td>
                        <td><?php echo $row['created_on']; ?></td>
                        <td><a href="edit_post.php?<?php echo $row['id']; ?>"> Edit Post</a></td>
                    </tr>
                <?php
                    $count++;
                }
            } else {
                ?>
                <a href="blog_insert.php">Let's Begin</a>;
            <?php
            }
            ?>
        </table>
    <?php
    } else {
        header("Location:login.php");
    }
    ?>
    <br><br> <button><a href="logout.php"> Logout</a></button> <br><br>

</body>

</html>