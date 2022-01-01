<?php
$servername = "localhost";
$username = "root";
$password = '';
$db = "form_databse";
$conn = new mysqli($servername,$username,$password,$db); 
if(isset($_POST['update']))
{
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $number = mysqli_real_escape_string($conn, $_POST['phone']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $f_name = mysqli_real_escape_string($conn, $_POST['f_name']);
    $f_phone = mysqli_real_escape_string($conn, $_POST['f_phone']);
    $f_occupation = mysqli_real_escape_string($conn, $_POST['f_occupation']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    //store hobby values in a array
    $hobby = array();
    if (empty($_POST["hobby"])) {
    $str = mysqli_real_escape_string($conn);
    }
    else{
    foreach ($_POST['hobby'] as $value){
    $hobby[] = $value;
    $str = implode(',', $hobby);
    } 
    }
    $sql = "UPDATE user SET name='$name',email='$email',number='$number',address='$address',fathername='$f_name',fatherphone='$f_phone',fatheroccupation='$f_occupation',gender='$gender',hobbies='$str' WHERE id=$id";
    $result = $conn->query($sql);
    header("Location:datas.php");
}       
?>