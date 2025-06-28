<?php
include "examconn.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") 
$rollno=isset($_POST['rollno']) ? mysqli_real_escape_string($conn,$_POST['rollno']) : '';
$name=isset($_POST['name']) ? mysqli_real_escape_string($conn,$_POST['name']) : '';
$city= isset($_POST['city']) ? mysqli_real_escape_string($conn,$_POST['city']) : '';
$class=isset($_POST['class']) ? mysqli_real_escape_string($conn,$_POST['calss']) : '';
$contactno=isset($_POST['contactno']) ? mysqli_real_escape_string($conn,$_POST['contactno']) : '';
$emailid=isset($_POST['emailid']) ? mysqli_real_escape_string($conn,$_POST['emailid']) : '';

 $sql = "INSERT INTO examtabel (rollno, name, city, class, contactno, emailid) VALUES (?, ?, ?, ?, ?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ssssss", $rollno, $name, $city, $class, $contactno, $emailid);
   if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

        $conn->close();



?>