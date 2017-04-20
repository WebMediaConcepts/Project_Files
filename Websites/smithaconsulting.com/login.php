<!DOCTYPE html>
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
<!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Smitha Consulting</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.html">Home</a>
                    </li>
                    <li>
                        <a href="about.html">Team</a>
                    </li>                   
                    <li>
                        <a href="register.html">Register</a>
                    </li>
                    <li>
                        <a href="login.php">My Account</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
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
<div class="container">
		<div class="col-md-12">
		<br />
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
		</div>
</div>

<?php
}
else
{
?>
	<div class="container">
		<div class="col-md-12">
				<h3>Welcome <?php echo $_SESSION['user_id']; ?>, You have successfully logged in!</h3>
				<hr />
				<a class="btn btn-danger" href="myProjects.php">My Projects</a>
				<a class="btn btn-primary" href="CreateTask.php">Create Task</a>
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
