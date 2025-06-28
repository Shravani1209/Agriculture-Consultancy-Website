<?php
$servername = "localhost"; // Replace 'localhost' with your MySQL host
$username = "root"; // Replace 'your_username' with your MySQL username
$password = ""; // Replace 'your_password' with your MySQL password
$database = "agricultureproject"; // Replace 'your_database' with your MySQL database name

$conn = new mysqli($servername, $username, $password, $database);


if (mysqli_connect_error()) {
    die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
}
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "Connected successfully";
?>



