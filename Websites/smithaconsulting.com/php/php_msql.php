<?php

// error reporting
//error_reporting(E_ALL);
//ini_set('display_errors',1);
	function test_input($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	$firstname = $lastname = $email = $username = $pw = "";






/************************END ERROR REPORTING*****************************/
include 'mysql_info.php';
// Connecting, selecting database
$link = mysql_connect($hostname, $username, $password)
    or die('Could not connect: ' . mysql_error());
echo 'Connected successfully';
mysql_select_db($my_db) or die('Could not select database');
/******************CONNNECTION SUCCESSFUL*****************************/
// set vars
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$username = $_POST['username'];
$pw = $_POST['password'];





//$ID = 3;

// Performing SQL query
$query = 'INSERT INTO Users (FirstName, LastName, Email, Username, Password) VALUES ("'.$firstname.'", "'.$lastname.'", "'.$email.'", "'.$username.'", "'.$pw.'")'; 
$result = mysql_query($query) or die ('Query Failed:'. mysql_error());
/******************END QUERY***************************************/


// Free resultset
mysql_free_result($result);

// Closing connection
mysql_close($link);
?>
///////////////////////////////////////
mysql_free_result($result);


$query = 'select * from Users';
$result = mysql_query($query) or die ('Query Failed:'. mysql_error());
// Printing results in HTML
echo "<table>\n";
while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
    echo "\t<tr>\n";
    foreach ($line as $col_value) {
        echo "\t\t<td>$col_value</td>\n";
    }
    echo "\t</tr>\n";
}
echo "</table>\n";