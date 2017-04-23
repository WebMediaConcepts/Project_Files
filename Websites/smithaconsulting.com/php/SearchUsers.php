<?php
session_start();
	$SearchUser = "";

// validation steps here	
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{	// Store user input in vars
		$SearchUser = $_POST['SearchUser'];
	}
	if($projectName != "" || $description !== "")
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
			$query = 'SELECT FirstName, LastName, Email, Username FROM Users WHERE Username="'.$SearchUser.'"'; 
			$result = mysql_query($query) or die ('Query Failed:'. mysql_error());
			$_SESSION["SELECTED_USER"] = $SearchUser;
			/******************END QUERY***************************************/
			header("location:http://ww2.cs.fsu.edu/~smitha/Projects/ViewProfile.php");

			// Free resultset
			mysql_free_result($result);

			// Closing connection
			mysql_close($link);
	}
	     
			
?>

