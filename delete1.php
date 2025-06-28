<?php
include "formdata1.php";

// Assuming $conn is defined in formdata.php
// Establish database connection if not already done

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming $conn is your database connection object

    // Check if the delete form is submitted
    if(isset($_POST['delete_id'])) {
        // Get the ID of the record to be deleted
        $id_to_delete = $_POST['delete_id'];

        // Prepare and execute SQL DELETE statement
        $sql = "DELETE FROM form1 WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $id_to_delete);
        $stmt->execute();

        // Check if deletion was successful
        if($stmt->affected_rows > 0) {
            echo "Record deleted successfully!";
        } else {
            echo "Error deleting record!";
        }

        // Close the statement
        $stmt->close();
    }
}

// Display form to select record to delete
echo "<form method='post'>";
echo "ID of record to delete: <input type='text' name='delete_id'>"; echo "<br><br>";
echo "<input type='submit' value='Delete' style='height: 40px; width: 80px; border: 2px solid green; background-color:green;'>";
echo "</form>";
?>
