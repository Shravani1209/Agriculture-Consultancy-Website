<?php
include "formdata1.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") 
  
    $emailone = isset($_POST['emailone']) ? mysqli_real_escape_string($conn,$_POST['emailone']) : '';
    $phonenoone = isset($_POST['phonenoone']) ? mysqli_real_escape_string($conn, $_POST['phonenoone']) : '';
    $state = isset($_POST['state']) ? mysqli_real_escape_string($conn, $_POST['state']) : '';
    // Validate data (you can add more checks according to your requirements)
    if (!filter_var($emailone, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        exit; 
    $sql = "INSERT INTO form1 (emailone, phonenoone, state) VALUES (?, ?, ?)";

   
    $stmt = $conn->prepare($sql);

  
    $stmt->bind_param("sss", $emailone, $phonenoone, $state);

   
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    

   
    $conn->close();
}
?>











