<?php
include "formdata2.php";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input
    $id = isset($_POST['id']) ? mysqli_real_escape_string($conn, $_POST['id']) : '';
    $Name  = isset($_POST['name']) ? mysqli_real_escape_string($conn, $_POST['name']) : '';
    $PhoneNo = isset($_POST['phoneno']) ? mysqli_real_escape_string($conn, $_POST['phoneno']) : '';
    $Address = isset($_POST['address']) ? mysqli_real_escape_string($conn, $_POST['address']) : '';
    $ConfirmProduct  = isset($_POST['confirmproduct']) ? mysqli_real_escape_string($conn, $_POST['confirmproduct']) : '';
    $Quantity = isset($_POST['quantity']) ? mysqli_real_escape_string($conn, $_POST['quantity']) : '';


    // Update record in the database
    $sql = "UPDATE form2 SET name = '$Name', phoneno = '$PhoneNo', address = '$Address', confirmproduct = '$ConfirmProduct ', quantity = '$Quantity' WHERE id = $id";
    
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
