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
            <h1 class="text-center textResizer">Create A Task</h1>
			<a href="login.php" class="btn btn-default">My Account</a>
			<a href="login.php" class="btn btn-danger">My Projects</a>
            <hr />
        <!-- /.row -->
		
	    <div class="col-lg-12">
            <p class="lead">What's going on?</p>
		<form id="ProjectForm" class="form-group" method="post" action="php/projects.php">
				<label for="ProjectName">Project Name</label>
				<input name="ProjectName" type="text" class="form-control" placeholder="Project Name">
				<br />
				<label for="Category">Category</label>
				<input name="Category" type="text" class="form-control" placeholder="Service Request or WordPress Help">
				<br />
				<label for="Description">Description</label>
				<textarea name="Description" class="form-control" rows="3" placeholder="Describe the issue"></textarea>
				<br />
				<br />
				<input type="submit" name="submitProject">
		</form>
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
