<?php
include "formdata3.php";

// Establish database connection if not already done

// Check if ID is provided in the URL
if(isset($_GET['id'])) {
    // Sanitize the ID to prevent SQL injection
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    
    // Retrieve the record from the database based on the provided ID
    $sql = "SELECT * FROM form3 WHERE id = $id";
    $result = $conn->query($sql);
    
    
    if ($result && $result->num_rows > 0) {
        // Fetch the record
        $row = $result->fetch_assoc();
        
        // Display the form to update the record
?>
        <form action="update_process3.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            Name: <input type="text" name="name" value="<?php echo isset($row['name']) ? htmlspecialchars($row['name']) : ''; ?>"><br>
            Email: <input type="tel" name="email" value="<?php echo isset($row['email']) ? htmlspecialchars($row['email']) : ''; ?>"><br>
            Address: <input type="text" name="address" value="<?php echo isset($row['address']) ? htmlspecialchars($row['address']) : ''; ?>"><br>
            Gender: <input type="text" name="gender" value="<?php echo isset($row['gender']) ? htmlspecialchars($row['gender']) : ''; ?>"><br>
            Date: <input type="date" name="date" value="<?php echo isset($row['date']) ? htmlspecialchars($row['date']) : ''; ?>"><br>
            Time: <input type="time" name="time" value="<?php echo isset($row['time']) ? htmlspecialchars($row['time']) : ''; ?>"><br>
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
