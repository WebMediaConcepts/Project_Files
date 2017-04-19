<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
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
?>
<html>
<head>
    <title>Your Account</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">

    <!-- Custom CSS -->
    <link href="css/custom.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
<a href="index.html">Go Back</a>
    <form action="" method="post" id="frmLogin">
        <div class="error-message"><?php if(isset($message)) { echo $message; } ?></div>
        <div class="field-group">
            <div><label for="login">Username</label></div>
            <div><input name="user_name" type="text" class="input-field"></div>
        </div>
        <div class="field-group">
            <div><label for="password">Password</label></div>
            <div><input name="password" type="password" class="input-field"> </div>
        </div>
        <div class="field-group">
            <div><input type="submit" name="login" value="Login" class="form-submit-button"></div>
        </div>
    </form>
</body>
</html>
<?php
}
else
{
?>
<html>
<head>
    <title>Your Account</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">

    <!-- Custom CSS -->
    <link href="css/custom.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div class="container">
		<div class="col-md-12">
				<h3>Welcome <?php echo $_SESSION['user_id']; ?>, You have successfully logged in!</h3>
				<hr />
				<p class="lead">What's going on?</p>
		<form id="ProjectForm" class="form-group" method="post" action="php/project.php">
				<input name="ProjectName" type="text" class="form-control" placeholder="Project Name">
				<br />
					<label class="radio-inline">
					  <input name="ServiceRequest" type="radio" name="inlineRadioOptions" id="inlineRadioServiceRequest" value="service_request"> Service Request
					</label>
					<label class="radio-inline">
					  <input name="WordPressHelp" type="radio" name="inlineRadioOptions" id="inlineRadioWordPressHelp" value="wordpress_help"> WordPress Help
					</label>
					<br />
					<br />
					<textarea name="Description" class="form-control" rows="3" placeholder="Describe the issue"></textarea>
				<br />
				<br />
		</form>
		<form action="" method="post" id="frmLogout">
			<input type="submit" name="logout" value="Logout" class="logout-button">
		</form>
		</div>
	</div>
</body>
</html>
<?php
}
?>