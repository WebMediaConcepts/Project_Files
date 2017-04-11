<?php
include 'mysql_info.php';
// Connecting, selecting database
$link = mysql_connect($hostname, $username, $password)
    or die('Could not connect: ' . mysql_error());
echo 'Connected successfully';
mysql_select_db($my_db) or die('Could not select database');

// error reporting
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

// validation steps here
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$name = $_POST['name'];
		$email = $_POST['email'];
		$website = $_POST['website'];
		$comment = $_POST['comment'];
		$gender = $_POST['gender'];
		if(empty($name))
		{
			$nameErr = "Empty name";
		}
		else
		{
			$name = test_input($name);
			if (!preg_match("/^[a-zA-Z]*$/",$name))
			{
				$nameErr = "Only letter and white space are accepted";
			}
		
		}
		if(empty($email))
		{
			$emailErr = "Empty email";
		}
		else
		{
			$email = test_input($email);
		/*	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$emailErr = "Invalid email format";
			}*/
		}
		$website = test_input($website);
		$comment = test_input($comment);
		$gender = test_input($gender);
		if(($nameErr == $emailErr) && ($genderErr == $websiteErr))
		{
			include 'mysql_info.php';
			$link = mysql_connect($hostname, $username, $password) or die('Could not connect:'.mysql_error());
			mysql_select_db($my_db) or die('Could not select db');
			$query = 'INSERT INTO ACCOUNTS (ID, UserName, FirstName, LastName, Password) VALUES ("'.$name.'", "'.$email.'", "'.$website.'", "'.$comment.'", "'.$gender.'")'; 
			$result = mysql_query($query) or die ('Query Failed:'. mysql_error());
			mysql_close($link);
		}
	}
	else
	{
		echo "No submit";
	}


// Performing SQL query
$query = "INSERT INTO ACCOUNTS VALUES ('2', 'alex', 'Alexander', 'Leader', 'leaderalexanderj@gmail.com')";
$result = mysql_query($query) or die('Query failed: ' . mysql_error());



// Free resultset
mysql_free_result($result);

// Closing connection
mysql_close($link);
?>