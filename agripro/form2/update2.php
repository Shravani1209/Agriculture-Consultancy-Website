<?php
include "formdata2.php";

// Establish database connection if not already done

// Check if ID is provided in the URL
if(isset($_GET['id'])) {
    // Sanitize the ID to prevent SQL injection
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    
    // Retrieve the record from the database based on the provided ID
    $sql = "SELECT * FROM form2 WHERE id = $id";
    $result = $conn->query($sql);
    
    if ($result && $result->num_rows > 0) {
        // Fetch the record
        $row = $result->fetch_assoc();

        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }
        
        
        
?>
        <form action="update_process2.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            Name: <input type="text" name="name" value="<?php echo htmlspecialchars($row['name']); ?>"><br>
            PhoneNo: <input type="text" name="Phoneno" value="<?php echo htmlspecialchars($row['phoneno']); ?>"><br><br>
            Address: <input type="text" name="address" value="<?php echo htmlspecialchars($row['address']); ?>"><br>
            ConfirmProduct: <input type="text" name="confirmproduct" value="<?php echo htmlspecialchars($row['confirmproduct']); ?>"><br>
            Quality: <input type="text" name="quantity" value="<?php echo htmlspecialchars($row['quantity']); ?>"><br><br>
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

