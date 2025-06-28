<?php
include "formdata2.php";

// Assuming $conn is defined in formdata.php
// Establish database connection if not already done

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming $conn is your database connection object

    // Validate and sanitize user inputs
    
    $Name = isset($_POST['name']) ? mysqli_real_escape_string($conn, $_POST['name']) : '';
    $PhoneNo = isset($_POST['phoneno']) ? mysqli_real_escape_string($conn, $_POST['phoneNo']) : '';
    $Address = isset($_POST['address']) ? mysqli_real_escape_string($conn, $_POST['address']) : '';
    $ConfirmProduct = isset($_POST['confirmproduct']) ? mysqli_real_escape_string($conn, $_POST['confirmproduct']) : '';
    $Quantity = isset($_POST['quantity']) ? mysqli_real_escape_string($conn, $_POST['quantity']) : '';
    // Validate data (you can add more checks according to your requirements)
    if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        exit; // Stop execution if email is invalid
    }
    // Construct the SQL query using prepared statements
    $sql = "INSERT INTO form2 (name, email, phoneno, address, confirmproduct, quantity) VALUES (?, ?, ?, ?, ?, ?)";

    // Prepare statement
    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bind_param("sssss", $Name, $PhoneNo, $Address, $ConfirmProduct, $Quantity);

    // Execute the statement
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the statement
    $stmt->close();

    // CSSlose the database connection
    $conn->close();
}
?>