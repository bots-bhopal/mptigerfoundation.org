<?php
$servername = "127.0.0.1";
$dbname = "mptfs_quiz";
$username = "root";
$password = "blueocean@2020";
// error_reporting(0);
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
