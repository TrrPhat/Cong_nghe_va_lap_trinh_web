<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "udn";

$con = mysqli_connect($host, $user, $pass, $dbname);
if (!$con) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}
mysqli_set_charset($con, "utf8");
?>
