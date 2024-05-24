<?php
$sname = "localhost";
$uname = "root";
$pword = "";
$db_name = "glommb_web";

$conn = new mysqli($sname, $uname, $pword, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
