
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
                <?php
						echo    '<a class="navbar-brand">Welcome ';
                        echo    $_SESSION['user_id'];
                        echo    "</a>";                
                ?>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="about.php">Team</a>
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
				<h1 class="text-center"><?php echo $_SESSION['user_id']; ?>'s Dashboard</h1>
				<ul class="nav nav-tabs">
					<li role="presentation" class="active"><a href="login.php">Home</a></li>
					<li role="presentation"><a href="Activity.php">Activity</a></li>
					<li role="presentation"><a href="ViewProfile.php">Profile</a></li>
					<li role="presentation"><a href="myProjects.php">Projects</a></li>
					<li role="presentation"><a href="CreateTask.php">Create</a></li>
				</ul>
				<br>
				<div class="row">
				<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
				
				<?php echo "<img src='".$_SESSION["PROFILE_IMG"]."' class='img-responsive img-circle' />" ?>
				<a href="uploadImage.html">Upload Profile Image</a>
					
				<form action="" method="post" id="frmLogout">
					<input type="submit" name="logout" value="Logout" class="logout-button">
				</form>
				</div>
				  <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
					<div class="thumbnail">
					  <img src="img/bg2.png" alt="Dashboard">
					  <div class="caption text-center">
						<h1>Start A New Project</h1>
						<br>
						<p><a href="CreateTask.php" class="btn-lg btn-danger" role="button">Create Task</a></p>
					  </div>
					</div>
				  </div>
				  <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
					<div class="thumbnail">
					  <img src="img/bg.png" alt="Dashboard">
					  <div class="caption text-center">
						<h1>Manage Your Projects</h1>
						<br>
						<p><a href="myProjects.php" class="btn-lg btn-primary" role="button">My Projects</a></p>
					  </div>
					</div>
				  </div>
				</div>
		
		</div>
	</div>
</body>
</html>
<?php
}
?>
