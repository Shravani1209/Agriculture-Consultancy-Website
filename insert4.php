<?php
include "formdata4.php";

// Assuming $conn is defined in formdata.php
// Establish database connection if not already done

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming $conn is your database connection object

    // Validate and sanitize user inputs
    
    $Name = isset($_POST['name']) ? mysqli_real_escape_string($conn, $_POST['name']) : '';
    $PhoneNo = isset($_POST['phoneno']) ? mysqli_real_escape_string($conn, $_POST['phoneno']) : '';
    $Address = isset($_POST['address']) ? mysqli_real_escape_string($conn, $_POST['address']) : '';
    $Gender = isset($_POST['gender']) ? mysqli_real_escape_string($conn, $_POST['gender']) : '';
    $Age= isset($_POST['age']) ? mysqli_real_escape_string($conn, $_POST['age']) : '';
    $medium= isset($_POST['medium']) ? mysqli_real_escape_string($conn, $_POST['medium']) : '';
    $Date = isset($_POST['date']) ? mysqli_real_escape_string($conn, $_POST['date']) : '';
    $Time = isset($_POST['time']) ? mysqli_real_escape_string($conn, $_POST['time']) : '';
    // Validate data (you can add more checks according to your requirements)
    

    // Construct the SQL query using prepared statements
    $sql = "INSERT INTO form4 (Name, PhoneNo, Address, gender, Age, medium, date, time) VALUES (?, ?, ?, ?, ?, ?, ?,?)";

    // Prepare statement
    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bind_param("ssssssss", $Name, $PhoneNo, $Address, $Gender, $age, $medium, $Date, $Time );

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