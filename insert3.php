<?php
include "formdata3.php";

// Assuming $conn is defined in formdata.php
// Establish database connection if not already done

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming $conn is your database connection object

    // Validate and sanitize user inputs
    
    $Name = isset($_POST['name']) ? mysqli_real_escape_string($conn, $_POST['name']) : '';
    $Email = isset($_POST['email']) ? mysqli_real_escape_string($conn, $_POST['email']) : '';
    $Address = isset($_POST['address']) ? mysqli_real_escape_string($conn, $_POST['address']) : '';
    $Gender = isset($_POST['gender']) ? mysqli_real_escape_string($conn, $_POST['gender']) : '';
    $Date = isset($_POST['date']) ? mysqli_real_escape_string($conn, $_POST['date']) : '';
    $Time = isset($_POST['time']) ? mysqli_real_escape_string($conn, $_POST['time']) : '';
    // Validate data (you can add more checks according to your requirements)
    if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        exit; // Stop execution if email is invalid
    }

    // Construct the SQL query using prepared statements
    $sql = "INSERT INTO form3 (name, email, address, gender , date, time)  VALUES (?, ?, ?, ?, ?, ?)";

    // Prepare statement
    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bind_param("ssssss", $Name, $Email, $Address, $Gender, $Date, $Time);

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