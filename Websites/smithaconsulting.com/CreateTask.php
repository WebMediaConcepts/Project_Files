<?php session_start(); ?>
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
                <?php
                if($_SESSION['user_id']=='') {
                    echo    '<a class="navbar-brand" href="index.php">Smitha Consulting</a>';
                    }
                else {
                    echo '<li>';
                    echo    '<a class="navbar-brand">Welcome ';
                    echo    $_SESSION['user_id'];
                    echo    "</a>";
                    echo '</li>'; 
                }
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
                    <?php
                    if($_SESSION['user_id']=='') { 
                    echo '<li>';
                    echo    '<a href="login.php">Login</a>';
                    echo '</li>';
                    }
                    ?>
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
			<ul class="nav nav-tabs">
				  <li role="presentation"><a href="login.php">Home</a></li>
				  <li role="presentation"><a href="Activity.php">Activity</a></li>
				  <li role="presentation"><a href="ViewProfile.php">Profile</a></li>
				  <li role="presentation"><a href="myProjects.php">Projects</a></li>
			      <li role="presentation" class="active"><a href="CreateTask.php">Create</a></li>
				</ul>
				<br>
        <!-- /.row -->
		
	    <div class="col-lg-12">
			<div class="row">
			<div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
				<div class="text-center">
				<?php echo "<img src='".$_SESSION["PROFILE_IMG"]."' class='img-responsive img-circle' />" ?>
				<br>
				<button class="btn btn-danger" data-dismiss="modal" data-toggle="modal" data-target="#ModalPost">Post</button>
				</div>
			</div>
		<div class="col-lg-5 col-md-5 col-sm-8 col-xs-8">
			<p class="lead">What's going on?</p>
			<form id="ProjectForm" class="form-group" method="post" action="php/projects.php">
				<label for="ProjectName">Project Name</label>
				<input name="ProjectName" type="text" class="form-control" placeholder="Project Name">
				<br />
				<label for="Description">Description</label>
				<textarea name="Description" class="form-control" rows="3" placeholder="Describe the issue"></textarea>
				<br />
				<input type="submit" name="submitProject">
			</form>
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
    <script src="js/validate.js"></script>
<!-- Post Modal -->
    <div id="ModalPost" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Post Something</h4>
                </div>
                <div class="modal-body">
                    <form id="ProjectForm" class="form-group" method="post" action="php/projects.php">
				<label for="ProjectName">Project Name</label>
				<input name="ProjectName" type="text" class="form-control" placeholder="Project Name">
				<br />
				<label for="Description">Description</label>
				<textarea name="Description" class="form-control" rows="3" placeholder="Describe the issue"></textarea>
				<br />
				<input type="submit" name="submitProject">
				</form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
</body>

</html>
