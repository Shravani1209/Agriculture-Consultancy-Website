<?php
include "formdata4.php";

// Establish database connection if not already done

// Check if ID is provided in the URL
if(isset($_GET['id'])) {
    // Sanitize the ID to prevent SQL injection
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    
    // Retrieve the record from the database based on the provided ID
    $sql = "SELECT * FROM form4 WHERE id = $id";
    $result = $conn->query($sql);
    
    if ($result && $result->num_rows > 0) {
        // Fetch the record
        $row = $result->fetch_assoc();
        
        // Display the form to update the record
        ?>
        <form action="update_process4.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            Name: <input type="text" name=" name" value="<?php echo htmlspecialchars($row['name']); ?>"><br>
            PhoneNo: <input type="text" name=" phoneno" value="<?php echo htmlspecialchars($row['phoneno']); ?>"><br><br>
            Address: <input type="text" name=" address" value="<?php echo htmlspecialchars($row['address']); ?>"><br>
            Gender: <input type="tel" name="gender" value="<?php echo htmlspecialchars($row['gender']); ?>"><br>
            Age: <input type="text" name=" age " value="<?php echo htmlspecialchars($row['age']); ?>"><br><br>
            Medium: <input type="text" name="medium" value="<?php echo htmlspecialchars($row['medium']); ?>"><br><br>
            Date: <input type="text" name="date" value="<?php echo htmlspecialchars($row['date']); ?>"><br>
            Time: <input type="tel" name="time" value="<?php echo htmlspecialchars($row['time']); ?>"><br>
            <input type="submit" value="Update" class="updatebutton">
            
            
        </form>
        <style>
                .updatebutton{
                    border:2px solid green;
                    height:40px;
                    width:80px;
                    background-color:green;
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
