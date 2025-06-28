<form action="http://localhost/agripro/form3/meetupform.html" method="POST">
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
include "formdata3.php";

// Assuming $conn is defined in formdata.php
// Establish database connection if not already done

// Fetch records from the database
$sql = "SELECT * FROM form3";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    // Output data of each row
    echo "<table border='1'>
            <tr>
                <th>name</th>
                <th>email</th>
                <th>address</th>
                <th>gender</th>
                <th>date</th>
                <th>time</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["name"] . "</td>
                <td>" . $row["email"] . "</td>
                <td>" . $row["address"] . "</td>
                <td>" . $row["gender"] . "</td>
                <td>" . $row["date"] . "</td>
                <td>" . $row["time"] . "</td>
                <td><a href='update3.php?id=" . $row["id"] ."' >Update</a></td>
                <td><a href='delete3.php?id=" . $row["id"] . "'>Delete</a></td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "No records found";
}
