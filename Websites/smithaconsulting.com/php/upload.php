<?php
session_start();
	$imgURL = "";

// validation steps here	
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{	// Store user input in vars
		$imgURL = $_POST['imgURL'];
	}
	if($imgURL != "")
	{
	/************************END ERROR REPORTING*****************************/
			include 'mysql_info.php';
			// Connecting, selecting database
			$link = mysql_connect($hostname, $username, $password)
				or die('Could not connect: ' . mysql_error());
			//echo 'Connected successfully';
			mysql_select_db($my_db) or die('Could not select database');
			/******************CONNNECTION SUCCESSFUL*****************************/

			$User = $_SESSION['user_id'];

			// Performing SQL query
			$query = "UPDATE Users SET profileImage = '".$imgURL."' Where Username = '".$User."'"; 
			$result = mysql_query($query) or die ('Query Failed:'. mysql_error());
			/******************END QUERY***************************************/
			header("location:http://ww2.cs.fsu.edu/~smitha/Projects/login.php");

			// Free resultset
			mysql_free_result($result);

			// Closing connection
			mysql_close($link);
	}
	     
			
?>

