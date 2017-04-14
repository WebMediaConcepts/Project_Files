<?php

// error reporting
error_reporting(E_ALL);
ini_set('display_errors',1);
	function test_input($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	$firstname = $lastname = $email = $username = $pw = "";
	$firstnameErr = $lastnameErr = $emailErr = $usernameErr = $passwordErr = "";

// validation steps here	
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{	// Store user input in vars
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		$username = $_POST['username'];
		$pw = $_POST['password'];

		// Test firstname input
		if(empty($firstname))
		{
			$firstnameErr = "Empty name";
		}
		else
		{
			$firstname = test_input($firstname);
			if (!preg_match("/^[a-zA-Z]*$/",$firstname))
			{
				$firstnameErr = "Only letter and white space are accepted";
			}
		
		}
		// Test lastname input
		if(empty($lastname))
		{
			$lastnameErr = "Empty name";
		}
		else
		{
			$lastname = test_input($lastname);
			if (!preg_match("/^[a-zA-Z]*$/",$lastname))
			{
				$lastnameErr = "Only letter and white space are accepted";
			}
		
		}
		// Test email input
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
		$pw = test_input($pw);
		$username = test_input($username);
		if(($firstnameErr == $lastnameErr) && ($emailErr == $usernameErr))	// successfully passed validation steps
		{
			/************************END ERROR REPORTING*****************************/
			include 'mysql_info.php';
			// Connecting, selecting database
			$link = mysql_connect($hostname, $username, $password)
				or die('Could not connect: ' . mysql_error());
			echo 'Connected successfully';
			mysql_select_db($my_db) or die('Could not select database');
			/******************CONNNECTION SUCCESSFUL*****************************/


			// Performing SQL query
			$query = 'INSERT INTO Users (FirstName, LastName, Email, Username, Password) VALUES ("'.$firstname.'", "'.$lastname.'", "'.$email.'", "'.$username.'", "'.$pw.'")'; 
			$result = mysql_query($query) or die ('Query Failed:'. mysql_error());
			/******************END QUERY***************************************/


			// Free resultset
			mysql_free_result($result);

			// Closing connection
			mysql_close($link);
		}
?>

