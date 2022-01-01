<?php
$servername = "localhost";
$username = "root";
$password = '';
$db = "form_databse";
$conn = new mysqli($servername,$username,$password,$db);
$id = $_GET['id'];

$sql = ("SELECT * FROM user WHERE id=$id");
if($result = $conn->query($sql)){   
while($row = $result->fetch_assoc()){
$id = $row['id'];
$name = $row['name'];
$email =$row['email'];
$number =$row['number'];
$address =$row['address'];
$f_name =$row['fathername'];
$f_phone =$row['fatherphone'];
$f_occupation =$row['fatheroccupation'];
$gender =$row['gender'];
$str =$row['hobbies'];
}
}
?>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>
<h2>PHP Edit Form Validation Example</h2>
<p><span class="error">* Required field</span></p>
<form method="post" action="updatepage.php" enctype="multipart/form-data">
  Name: <input type="text" name="name" value="<?php echo $name;?>"><span class="error">* </span>  
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>"><span class="error">* </span>
  <br><br>
  Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
  <span class="error">*</span>
  <br><br>
  Phone: <input type="number" name="phone" value=<?php echo $number;?>>
  <span class="error">*</span>
  <br><br>
  Address : <textarea rows = "6" cols = "30" name = "address" placeholder = "Enter You Address"><?php echo $address;?></textarea>
  <span class="error">* </span>
  <br><br>
  Father Name : <input type="text" name="f_name" value="<?php echo $f_name;?>"><span class="error">* </span>  
  <br><br>
  Father Phone : <input type="text" name="f_phone" value="<?php echo $f_phone;?>"><span class="error">* </span>  
  <br><br>
  Father Occupation : <select name = "f_occupation">
  <option value = "" disable selected>-Null-</option>
  <option value = "Govt_Job" <?php if (isset($f_occupation) && $f_occupation =="Govt_Job") echo "selected";?>>Govt. Job</option>
  <option value = "Pvt_Job" <?php if (isset($f_occupation) && $f_occupation =="Pvt_Job") echo "selected";?>>Pvt. Job</option>
  <option value = "Bank_sector" <?php if (isset($f_occupation) && $f_occupation =="Bank_sector") echo "selected";?>>Bank sector</option>
  <option value = "Farmer" <?php if (isset($f_occupation) && $f_occupation =="Farmer") echo "selected";?>>Farmer</option>
  <option value = "Business" <?php if (isset($f_occupation) && $f_occupation =="Business") echo "selected";?>>Business</option>
  </select><span class="error">*</span>  
  <br><br>
  Hobbies : <small>(Uncheck if You Don't have following hobbies)</small>
  <br>
  <?php 
  $hby = @explode(",",$str);
  ?>
  <input type="checkbox" name="hobby[]" value = "Painting" <?php if(in_array("Painting",$hby)){?> checked="checked"<?php }?>> Painting</input>
  <br>
  <input type="checkbox" name="hobby[]" value = "Dancing" <?php if(in_array("Dancing",$hby)){?> checked="checked"<?php }?>> Dancing</input>
  <br>
  <input type="checkbox" name="hobby[]" value = "Coding" <?php if(in_array("Coding",$hby)){?> checked="checked"<?php }?>> Coding</input>
  <br>
  <br>
  <?php
  
?>
  <input type="hidden" name="id" value=<?php echo $_GET ['id'];?>></input>
  <input type="submit" name="update" value="Update"></input>  
</form>
</body>
</html>