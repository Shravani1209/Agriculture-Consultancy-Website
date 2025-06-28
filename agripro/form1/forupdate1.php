<form action="http://localhost/agripro/form1/registerform.html" method="POST">
<input type="submit" value="Add" class="addbutton">
</form>
<style>
    .addbutton{
        height:40px;
        width:80px;
        border:2px solid blue;
background-color:blue;


    }
</style>
<?php
include "formdata1.php";

// Assuming $conn is defined in formdata.php
// Establish database connection if not already done

// Fetch records from the database
$sql = "SELECT * FROM form1";
$result = $conn->query($sql);
if ($result && $result->num_rows > 0) {
    // Output data of each row
    echo "<table border='1'>
            <tr>
            <th>Email</th>
                <th>Phone Number</th>
                <th>State</th>
            </tr>";
    while ($row = $result->fetch_assoc()) { // Removed $form1 parameter
        echo "<tr>
                
    <td>" . $row["emailone"] . "</td>
                <td>" . $row["phonenoone"] . "</td>
                <td>" . $row["state"] . "</td>
                <td><a href='update1.php?id=" . $row["id"] ."' >Update</a></td>
                <td><a href='delete1.php?id=" . $row["id"] ."'>Delete</a></td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "No records found";
}

// Close the database connection
$conn->close();
?>
