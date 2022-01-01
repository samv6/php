<!DOCTYPE html>
<html>
<style>
    table,th,td {
        border: 1px solid black;
    }
</style>
<body>
    <h2 style="text-align:center; text-decoration: underline;">All Student Form Details</h2>
<table style="width:100%;" class="table">

<tr>
    <th>Name</th>
    <th>E-mail</th>
    <th>Phone</th>
    <th>Address</th>
    <th>Father Name</th>
    <th>Father Phone</th>
    <th>Father Occupation</th>
    <th>Gender</th>
    <th>Hobbies</th>
    <th>Action</th>
</tr>
<?php
$servername = "localhost";
$username = "root";
$password = '';
$db = "form_databse";
$conn = new mysqli($servername,$username,$password,$db); 

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<?php
$sql = "SELECT id, name, email, number, address, fathername, fatherphone, fatheroccupation, gender, hobbies FROM user";
$result = $conn->query($sql);
?>
<?php
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "<tr><td>" .
      $row["name"]. "<td>".$row["email"]."<td>".$row["number"]."<td>".$row["address"]."<td>".$row["fathername"]."<td>".$row["fatherphone"]."<td>".$row["fatheroccupation"]."<td>".$row["gender"]."<td>".$row["hobbies"]."<td>"."<a href = 'editpage.php?id=$row[id]'><input type='submit' value='Edit'></a>"."   "."<a href='delete.php?id=$row[id]' onClick='return confirm('Are you sure you want to delete?')'><input type='submit' value='Delete' style = 'text-align:right'></a></td></tr>";
    }
} else {
    echo "0 results";
}
?>
</table>
<form action="form.php" method="POST">
<input type="submit" name=" submit" value="Add New Details">
</form>
<?php
$conn->close();
?>
</body>
</html>