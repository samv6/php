<?php
$servername = "localhost";
$username = "root";
$password = '';
$db = "form_databse";
$conn = new mysqli($servername,$username,$password,$db); 
?>
<?php
$id = $_GET['id'];
$result = mysqli_query($conn, "DELETE FROM user WHERE id=$id");
header("Location:datas.php");
?>