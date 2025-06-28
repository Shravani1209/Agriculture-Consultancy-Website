<?php
// MySQL database credentials
$servername = "localhost"; // Replace 'localhost' with your MySQL host
$username = "root"; // Replace 'your_username' with your MySQL username
$password = ""; // Replace 'your_password' with your MySQL password
$database = "agricultureproject"; // Replace 'your_database' with your MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully";
?>
