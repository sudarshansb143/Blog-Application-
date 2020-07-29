<?php

$host = "localhost";
$pass = "";
$user = "root";
$db = "blog_app";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    echo "Error occured";
}
