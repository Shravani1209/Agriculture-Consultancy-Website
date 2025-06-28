<form action="http://localhost/agripro/form2/orderform.html" method="POST">
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
include "formdata2.php";

// Assuming $conn is defined in formdata.php
// Establish database connection if not already done

// Fetch records from the database
$sql = "SELECT * FROM form2";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    // Output data of each row
    echo "<table border='1'>
            <tr>
                <th>name</th>
                <th>phoneno</th>
                <th>address</th>
                <th>confirmproduct</th>
                <th>quantity</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["name"] . "</td>
                <td>" . $row["phoneno"] . "</td>
                <td>" . $row["address"] . "</td>
                <td>" . $row["confirmproduct"] . "</td>
                <td>" . $row["quantity"] . "</td>
                <td><a href='update2.php?id=" . $row["id"] ."' >Update</a></td>
                <td><a href='delete2.php?id=" . $row["id"] ."'>Delete</a></td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "No records found";
}

// Close the database connection
$conn->close();
?>
