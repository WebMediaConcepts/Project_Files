<?php

	$firstname = $lastname = $email = $un = $pw = "";

// validation steps here	
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{	// Store user input in vars
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		$un = $_POST['username'];
		$pw = $_POST['password'];
	}
	if($firstname != "" || $lastname != "" || $email != "" || $un != "" || $pw == "")
	{
	/************************END ERROR REPORTING*****************************/
			include 'mysql_info.php';
			// Connecting, selecting database
			$link = mysql_connect($hostname, $username, $password)
				or die('Could not connect: ' . mysql_error());
			//echo 'Connected successfully';
			mysql_select_db($my_db) or die('Could not select database');
			/******************CONNNECTION SUCCESSFUL*****************************/


			// Performing SQL query
			$query = 'INSERT INTO Users (FirstName, LastName, Email, Username, Password) VALUES ("'.$firstname.'", "'.$lastname.'", "'.$email.'", "'.$un.'", "'.$pw.'")'; 
			$result = mysql_query($query) or die ('Query Failed:'. mysql_error());
			/******************END QUERY***************************************/
			header("location:http://ww2.cs.fsu.edu/~smitha/Projects/");

			// Free resultset
			mysql_free_result($result);

			// Closing connection
			mysql_close($link);
	}
	     
			
?>

