<?php
include "examconn.php";
$sql="SELECT * FROM examtabel";
$result= $conn->query($sql);

if ($result && $result->num_rows > 0) {
   echo "<table border='1'>
<tr>
<th>Roll NO.</th>
<th>Name</th>
<th>City</th>
<th>Class</th>
<th>Contact_No.</th>
<th>Email_id</th>
</tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>
<td>" . $row["rollno"] . "</td>;
<td>" . $row["name"] . "</td>;
<td>" . $row["city"] . "</td>;
<td>" . $row["class"] . "</td>;

<td>" . $row["contactno"] . "</td>;

<td>" . $row["emailid"] . "</td>;
</tr>";
}
echo  "</table>";
} else {
    echo "No records found";
}
$conn->close();
?>