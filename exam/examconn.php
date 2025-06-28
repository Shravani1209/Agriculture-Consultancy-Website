<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "examq1"; 

$conn = new mysqli($servername, $username, $password, $database);


if (mysqli_connect_error()) {
    die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
}
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "Connected successfully";
?>