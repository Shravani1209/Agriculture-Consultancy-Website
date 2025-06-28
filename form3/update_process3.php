<?php
include "formdata3.php";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input
    $id = isset($_POST['id']) ? mysqli_real_escape_string($conn, $_POST['id']) : '';
    $name = isset($_POST['name']) ? mysqli_real_escape_string($conn, $_POST['name']) : '';
    $email = isset($_POST['email']) ? mysqli_real_escape_string($conn, $_POST['email']) : '';
    $address = isset($_POST['address']) ? mysqli_real_escape_string($conn, $_POST['address']) : '';
    $gender = isset($_POST['gender']) ? mysqli_real_escape_string($conn, $_POST['gender']) : '';
    $date = isset($_POST['date']) ? mysqli_real_escape_string($conn, $_POST['date']) : '';
    $time = isset($_POST['time']) ? mysqli_real_escape_string($conn, $_POST['time']) : '';

    // Update record in the database
    $sql = "UPDATE form3 SET name = '$name', email = '$email', address = '$address', gender = '$gender', date = '$date', time = '$time'  WHERE id = $id";
    
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    // If form is not submitted
    echo "Form submission error.";
}

// Close the database connection
$conn->close();
?>
