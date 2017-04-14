<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body> 
<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
	function test_input($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	$nameErr = $emailErr = $genderErr = $websiteErr = "";
	$name = $email= $gender = $comment = $website = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
	$name = $_POST['name'];
	$email = $_POST['email'];
	$website = $_POST['website'];
	$comment = $_POST['comment'];
	$gender = $_POST['gender'];
	if(empty($name)){
		$nameErr = "Empty name";
	}else{
		$name = test_input($name);
		if (!preg_match("/^[a-zA-Z]*$/",$name)){
			$nameErr = "Only letter and white space are accepted";
		}
		
	}
	if(empty($email)){
		$emailErr = "Empty email";
	}
	else{
		$email = test_input($email);
	/*	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$emailErr = "Invalid email format";
		}*/
	}
	$website = test_input($website);
	$comment = test_input($comment);
	$gender = test_input($gender);
	if(($nameErr == $emailErr) && ($genderErr == $websiteErr)){
		include 'mysql_info.php';
		$link = mysql_connect($hostname, $username, $password) or die('Could not connect:'.mysql_error());
		mysql_select_db($my_db) or die('Could not select db');
		$query = 'INSERT INTO USER_INFORMATION (NAME, EMAIL, WEBADDRESS, COMMENT, GENDER) VALUES ("'.$name.'", "'.$email.'", "'.$website.'", "'.$comment.'", "'.$gender.'")'; 
		$result = mysql_query($query) or die ('Query Failed:'. mysql_error());
		mysql_close($link);
	}
}else{
	echo "No submit";
}
?>

<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Website: <input type="text" name="website" value="<?php echo $website;?>">
  <span class="error"><?php echo $websiteErr;?></span>
  <br><br>
  Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
  <br><br>
  Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>
</body>
</html>