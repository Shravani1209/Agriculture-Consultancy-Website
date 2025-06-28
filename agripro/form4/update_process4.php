<?php
include "formdata4.php";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input
    $id = isset($_POST['id']) ? mysqli_real_escape_string($conn, $_POST['id']) : '';
    $Name  = isset($_POST['name']) ? mysqli_real_escape_string($conn, $_POST['name']) : '';
    $Email = isset($_POST['email']) ? mysqli_real_escape_string($conn, $_POST['email']) : '';
    $PhoneNo = isset($_POST['phoneno']) ? mysqli_real_escape_string($conn, $_POST['phoneno']) : '';
    $Address = isset($_POST['address']) ? mysqli_real_escape_string($conn, $_POST['address']) : '';
    $Gender  = isset($_POST['gender']) ? mysqli_real_escape_string($conn, $_POST['gender']) : '';
    $Age = isset($_POST['age']) ? mysqli_real_escape_string($conn, $_POST['age']) : '';
    $Date = isset($_POST['date']) ? mysqli_real_escape_string($conn, $_POST['date']) : '';
    $Age = isset($_POST['age']) ? mysqli_real_escape_string($conn, $_POST['age']) : '';
    $Medium = isset($_POST['medium']) ? mysqli_real_escape_string($conn, $_POST['medium']) : '';
    $Time= isset($_POST['time']) ? mysqli_real_escape_string($conn, $_POST['time']) : '';

    // Update record in the database
    $sql = "UPDATE form4 SET name='$Name', email='$Email', phoneno='$PhoneNo', address='$Address', gender='$Gender', age='$Age', medium = '$Medium', date='$Date', time='$Time' WHERE id=$id";

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
