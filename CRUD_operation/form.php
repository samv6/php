<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>
<h2>PHP Form Validation Example</h2>
<p><span class="error">* Required field</span></p>
<form method="post" action="upload1.php" enctype="multipart/form-data">
  Name: <input type="text" name="name" value=""><span class="error">* </span>  
  <br><br>
  E-mail: <input type="text" name="email" value=""><span class="error">* </span>
  <br><br>
  Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
  <span class="error">* </span>
  <br><br>
  Phone: <input type="number" name="phone" value=""><span class="error">*</span>
  <br><br>
  Address : <textarea rows = "6" cols = "30" name = "address" placeholder = "Enter address"></textarea><span class="error">* </span>
  <br><br>
  Father Name : <input type="text" name="f_name" value=""><span class="error">* </span>  
  <br><br>
  Father Phone : <input type="text" name="f_phone" value=""><span class="error">* </span>  
  <br><br>
  Father Occupation : <select name = "f_occupation">
  <option value = "" disabled selected>-Null-</option>
  <option value = "Govt_Job">Govt. Job</option>
  <option value = "Pvt_Job">Pvt. Job</option>
  <option value = "Bank_sector">Bank sector</option>
  <option value = "Farmer">Farmer</option>
  <option value = "Business">Business</option>
  </select><span class="error">* </span>  
  <br><br>
  Hobbies : <small>(Uncheck if You Don't have following hobbies)</small>
  <br>
  <input type="checkbox" name="hobby[]" value = "Painting"> Painting</input>
  <br>
  <input type="checkbox" name="hobby[]" value = "Dancing"> Dancing</input>
  <br>
  <input type="checkbox" name="hobby[]" value = "Coding"> Coding</input>
  <br>
  <br>
  <input type="submit" name="submit" value="Submit">  
</form>

</body>
</html>