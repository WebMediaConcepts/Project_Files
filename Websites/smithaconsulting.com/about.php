﻿<?php session_start();?>
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
                echo '<li>
                    ';
                    echo    '<a class="navbar-brand">
                        Welcome ';
                        echo    $_SESSION['user_id'];
                        echo    "
                    </a>";
                    echo '
                </li>';
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
                    echo '
                    <li>
                        ';
                        echo    '<a href="login.php">Login</a>';
                        echo '
                    </li>';
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
        <div class="row">
            <div class="col-lg-12 text-center">
              <h1>The Team</h1>
            <hr />                
			</div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-6">
                <img src="img/robsmitha.png" class="img-responsive center-block" />
                <hr />
                <ul class="list-inline text-center">
                    <li>
                        <a href="https://www.linkedin.com/in/rob-smitha-7ab39212a" target="_blank">
                            <i class="fa fa-linkedin red" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://github.com/RobertSmitha" target="_blank">
                            <i class="fa fa-github-alt red" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.facebook.com/rob.smitha" target="_blank">
                            <i class="fa fa-facebook red" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://twitter.com/WebMediaConcept" target="_blank">
                            <i class="fa fa-twitter red" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/WebMediaConcepts/" target="_blank">
                            <i class="fa fa-instagram red" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://plus.google.com/u/0/104625845534875230413" target="_blank">
                            <i class="fa fa-google-plus red" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li>
                        <a href="mailto:rws15@my.fsu.edu">
                            <i class="fa fa-envelope-o red" aria-hidden="true"></i>
                        </a>
                    </li>
                </ul>
                <p class="lead">
                    <strong><a href="http://ww2.cs.fsu.edu/~smitha/" class="red">Robert Smitha</a></strong> is a senior computer science student at Florida State University. His proficiency in web development and professional web consulting knowledge has grown into a web design company called Web Media Concepts.
                </p>
            </div>
            <div class="col-lg-6">
                <h3 class="text-center red">Rob Smitha's Story</h3>
                <hr />
                <p>
                    Mr. Smitha began studying computer science at Florida State University while pursing a minor in general business. Rob’s pursuit of his goals and the desire for achievement is the driving force behind his wide range of developmental skills which include web design, programming, WordPress development, search engine optimization (SEO), user interface design, project management and much more. Of course, these trades need to be built with some programming language or markup code, so Rob works with a diverse array of latest programming options to deliver the best final project for his clients. His skill set of languages includes C++, HTML5, CSS3, JavaScript, JSON, jQuery and more.
                </p>
                <p>
                    While furthering his education at Florida State, Rob also worked as a valet manager at a high-end establishment called Governor’s Club. The private membership club became an excellent opportunity to showcase his development skills and engage in some freelance web design work. This became the foundation of his company Web Media Concepts and led to many rewarding business opportunities. Rob has worked with reputable law firms, consulting agencies and other businesses on their websites and online presence.
                </p>
                <p>
                    Rob's hard worked paid off when he was offered a position as a web developer at a distinguished company called Brandt Information Services. At Brandt, Rob works closely with clients and employees on web applications and user interface design. Go to webmediaconcepts.com to learn more about Rob Smitha.
                </p>
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

</body>

</html>
