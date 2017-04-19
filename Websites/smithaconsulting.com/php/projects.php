<?php

	$projectName = $description = $category = "";

// validation steps here	
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{	// Store user input in vars
		$projectName = $_POST['ProjectName'];
		$description = $_POST['Category'];
		$category = $_POST['Description'];
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
			$query = 'INSERT INTO Projects VALUES ("'.$projectName.'", "'.$description.'", "'.$category.'")'; 
			$result = mysql_query($query) or die ('Query Failed:'. mysql_error());
			/******************END QUERY***************************************/
			header("location:http://ww2.cs.fsu.edu/~smitha/WebDev_Project/");

			// Free resultset
			mysql_free_result($result);

			// Closing connection
			mysql_close($link);
	}
	     
			
?>

