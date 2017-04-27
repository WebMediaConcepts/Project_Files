<?php
session_start();
include 'php/mysql_info.php';
$link = mysql_connect($hostname,$username,$password) or die('Could not connect:'.mysql_error());
mysql_select_db($my_db) or die('Could not select db');

$message="";
if(!empty($_POST["login"])) 
{
	$result = mysql_query("SELECT * FROM Users WHERE Username='" . $_POST["user_name"] . "' and Password = '". $_POST["password"]."'") or die ('Query Failed:'.mysql_error());
	$row  = mysql_fetch_array($result);
	if(is_array($row)) 
	{
		$_SESSION["user_id"] = $row['Username'];
		$_SESSION["PROFILE_IMG"] = $row['profileImage'];
		$profileIMG = $_SESSION["PROFILE_IMG"];
		$_POST["logout"]='';

	}
	else 
	{
		$message = "Invalid Username or Password!";
	}
}
if(!empty($_POST["logout"])) 
{
	$_SESSION["user_id"] = '';
	$_POST["login"] = '';
	session_destroy();
}
if ($_SESSION['user_id']=='')
{
	header("location:http://ww2.cs.fsu.edu/~smitha/Projects/login.php");
}
else
{
	header("location:http://ww2.cs.fsu.edu/~smitha/Projects/ViewProfile.php");
}
