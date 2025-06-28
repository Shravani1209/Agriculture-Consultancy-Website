<?php
include "formdata1.php";

// Establish database connection if not already done

// Check if ID is provided in the URL
if(isset($_GET['id'])) {
    // Sanitize the ID to prevent SQL injection
    $id = mysqli_real_escape_string($conn, $_GET['id']);
   
    // Retrieve the record from the database based on the provided ID
    $sql = "SELECT * FROM form1 WHERE id = $id";
    $result = $conn->query($sql);
    
    if ($result && $result->num_rows > 0) {
        // Fetch the record
        $row = $result->fetch_assoc();
        
    
    // Update record in the databaseS
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
    
    
        // Display the form to update the record
        ?>
        <form action="update_process1.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            Email: <input type="text" name="email" value="<?php echo htmlspecialchars($row['emailone']); ?>"><br>
            Phone Number: <input type="tel" name="phone" value="<?php echo htmlspecialchars($row['phonenoone']); ?>"><br>
            State: <input type="text" name="state" value="<?php echo htmlspecialchars($row['state']); ?>"><br><br>
            <input type="submit" value="Update" class="updatebutton">
        </form>
        <style>
            .updatebutton {
                border: 2px solid green;
                height: 40px;
                width: 80px;
                background-color: green;
            }
        </style>
        <?php
    } else {
        echo "Record not found.";
    }
} else {
    echo "ID not provided.";
}

// Close the database connection
$conn->close();
?>

