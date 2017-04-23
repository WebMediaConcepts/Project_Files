<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Smitha Consulting</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/custom.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="https://use.fontawesome.com/d4f311c4ca.js"></script>
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

    <!-- Page Content -->
    <div class="container">
	
        <!-- Title -->
            <h1 class="text-center textResizer">Manage Projects</h1>
			
            <ul class="nav nav-tabs">
				  <li role="presentation"><a href="login.php">Home</a></li>
				  <li role="presentation"><a href="ViewProfile.php">Profile</a></li>
				  <li role="presentation" class="active"><a href="myProjects.php">Projects</a></li>
				  <li role="presentation"><a href="CreateTask.php">Create Task</a></li>
				</ul>
				<br>
        <!-- /.row -->
		<div class="col-md-12">
				<div class="row">
				<div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
				<div class="profile-img">
				<?php echo "<img src='".$_SESSION["PROFILE_IMG"]."' class='img-responsive img-circle' />" ?>
				</div>
				</div>
				  <div class="col-lg-5 col-md-5 col-sm-8 col-xs-8">
					<?php
						session_start();
						include 'php/mysql_info.php';
						// Connecting, selecting database
						$link = mysql_connect($hostname, $username, $password)
							or die('Could not connect: ' . mysql_error());
						mysql_select_db($my_db) or die('Could not select database');
						$User = $_SESSION['user_id'];
						// Performing SQL query
						$query = "SELECT projectName, description FROM Projects WHERE Username = '".$User."'";
						$result = mysql_query($query) or die('Query failed: ' . mysql_error());
						// Printing results in HTML
						echo "<h3>";
						while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
							echo "Project:    ";
							foreach ($line as $col_value) {
								echo "\t\t<i>$col_value</i><br><br>";
							}
	
							echo "<br>";
	
						}


						// Free resultset
						mysql_free_result($result);

						// Closing connection
						mysql_close($link);
						?>
				  </div>
				  <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
					<p>Delete a project</p>
		<form id="DeleteProjectForm" class="form-group" method="post" action="php/DeleteProject.php">
				<input name="ProjectName" type="text" class="form-control" placeholder="Project Name To Delete">
				<br>
				<input type="submit" name="DeleteProject">
		</form>
				</div>
		
		</div>
        
        
     <hr>
        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>Copyright &copy; Smitha Consulting 2017</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="contact/validator.js"></script>
    <script src="contact/contact.js"></script>
    <script src="js/validate.js"></script>

</body>

</html>
