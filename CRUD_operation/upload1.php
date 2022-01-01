<!DOCTYPE html>
<html>
<style>
    table,th,td {
        border: 1px solid black;
    }
</style>
<body>
    <h2 style="text-align:center; text-decoration: underline;">Student Form Details</h2>

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
        </tr>
        

<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr  = $numberErr = $addressErr = $f_nameErr = $f_phoneErr = $f_occupationErr = "";
$name = $email = $gender  = $number = $address = $f_name = $f_phone = $f_occupation = "";
// check input data empty or not and assign new variable name
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "* Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "* Only letters and white space allowed";
    }
  }
  if (empty($_POST["email"])) {
    $emailErr = "* Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "* Invalid email format";
    }
  }  
  if (empty($_POST["phone"])) {
    $numberErr = "* Phone No. is required";
  } else {
    $number = $_POST["phone"];
  }
  if (empty($_POST["gender"])) {
    $genderErr = "* Gender is required";
  } elseif ($_POST["gender"] == "female"){
    $gender = "Female";
  }
  elseif ($_POST["gender"] == "male"){
    $gender = "Male";
  }
  elseif ($_POST["gender"] == "other"){
    $gender = "Other";
  }
  if (empty($_POST["address"])) {
    $addressErr = "* Address is required";
  } else {
    $address = test_input($_POST["address"]);
  }
  if (empty($_POST["f_name"])) {
    $f_nameErr = "* Father Name is required";
  } else {
    $f_name = test_input($_POST["f_name"]);
  }
  if (empty($_POST["f_phone"])) {
    $f_phoneErr = "* Father phone number is required";
  } else {
    $f_phone = test_input($_POST["f_phone"]);
  }
  if ($_POST["f_occupation"] == "Null") {
    $f_occupationErr = "* Father Occupation is required";
  } else {
    $f_occupation = test_input($_POST["f_occupation"]);
  }
}
//check data validation for spacing and special character
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<?php
//store hobby values in a array
$hobby = array();
if (empty($_POST["hobby"])) {
  $str = "(No hobby)";
}
else{
foreach ($_POST['hobby'] as $value){
  $hobby[] = $value;
  $str = implode(',', $hobby);
} 
}
?>
<?php
// echo empty field error
echo $nameErr;
echo "<br>";
echo $emailErr;
echo "<br>";
echo $numberErr;
echo "<br>";
echo $addressErr;
echo "<br>";
echo $genderErr;
echo "<br>";
echo $f_nameErr;
echo "<br>";
echo $f_phoneErr;
echo "<br>";
echo $f_occupationErr;
echo "<br>";
?>
<?php 
// put all data in a table's cells
?>
<tr>
  <td><?php echo $name;?>
  <td><?php echo $email;?>
  <td><?php echo $number;?>
  <td><?php echo $address;?>
  <td><?php echo $f_name;?>
  <td><?php echo $f_phone;?>
  <td><?php echo $f_occupation;?>
  <td><?php echo $gender;?>
  <td><?php echo $str;?>
</tr>
</table>
<br>
<form action="form.php" method="POST">
<input type="submit" name=" submit" value="Add New Details">
</form>
<br>
<form action="datas.php" method="POST">
<input type="submit" name=" submit" value="View Details">
</form>
<?php
//Image upload 
// $target_dir = "E:\SAM2";
// $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
// $uploadOk = 1;
// $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// if($imageFileType != "jpg" && $imageFileType != "png") {
//   echo "Sorry, only JPG & PNG files are allowed.";
//   $uploadOk = 0;
// }
// elseif ($_FILES["fileToUpload"]["size"] > 100000) {
//   echo "Sorry, your file is too large.";
//   $uploadOk = 0;
// }
// elseif ($uploadOk == 0) {
//   echo "Sorry, your file was not uploaded.";
// }
// elseif (file_exists($target_file)) {
//   echo "Sorry, file already exists.";
//   $uploadOk = 0;
// }
// else {
//   if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
//     echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
//   } else {
//     echo "Sorry, there was an error uploading your file.";
//   }
// }
// ?>
<br>
<?php
//database connection and put all data into a server  
$servername = "localhost";
$username = "root";
$password = '';
$db = "form_databse";
$conn = new mysqli($servername,$username,$password,$db);
if ($conn->connect_error){
  die('Connection Failed :'.$conn->connect_error); 
}
$sql = "INSERT INTO user (name, email, number, address, fathername, fatherphone, fatheroccupation, gender, hobbies) 
  VALUES ('$name','$email','$number','$address','$f_name','$f_phone','$f_occupation','$gender','$str')";
if ($conn->query($sql) === TRUE) {
  echo '<span style="color:green;text-align:center;">New record created successfully.</span>';                                                                                                                                                               
} 
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}  
  $conn->close();
?>
