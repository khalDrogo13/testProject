<?php
session_start();

include 'functions/indexFunctions.php';

if(isset($_SESSION['$email'])){
    $login = true;
    $loginCollege = false;
    $email = $_SESSION['$email'];
    $name = $_SESSION['$name'];
    $fname = $_SESSION['$fname'];
    $lname = $_SESSION['$lname'];
    
}
else if(isset($_SESSION['$cemail'])){
    $loginCollege = true;
    $login = false;
}
else{
    $login = false;
    $loginCollege = false;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="functions/ajax.js"></script>

    <title>Better India!</title>
    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Social Buttons CSS -->
    <link href="../vendor/bootstrap-social/bootstrap-social.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style/styleIndex.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php"><font color=#E77607>Better</font><font color=#138808>India!</font></a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-info fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a onClick="MyWindow=window.open('userguide.php','MyWindow',width=300,height=150)">
                                <div>
                                    <i class="fa fa-info-circle fa-fw"></i> User guide
                                </div>
                            </a>
                        </li>
                        <li>
                            <a onClick="MyWindow=window.open('instituteguide.php','MyWindow',width=300,height=150)">
                                <div>
                                    <i class="fa fa-institution fa-fw"></i> Institute guide
                                </div>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">

                        <?php
                            
                            if($login || $loginCollege){
                        ?>
                            </li>
                            <li><a href="user/logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        <?php
                            }
                            else{
                        ?>
                        <li><a data-toggle="modal" data-target="#myModal2"><i class="fa fa-user fa-fw"></i> User Login</a>
                        </li>
                        <li><a data-toggle="modal" data-target="#myModal"><i class="fa fa-institution fa-fw"></i> Institute Login</a>
                        <?php
                            }
                        ?>

                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        
        <!-- Page Content -->
        
            <div class="container-fluid" id="field">
                <div class="container">
                    <div class="tagline panel-body text-center"><h1>Raise issues for a better India!</h1></div>
                    <div class="aboutUs lead text-center">Better India is an effort to provide citizens of India a platform, <br>to notify their issues or upvote issues notified by others, <br>so as to bring it to the notice of the authorities, <br>in order to get a solution for the same.<br><br>
                    <h3><?php echo no_of_users('user'); ?> Users&nbsp; &nbsp;| &nbsp;&nbsp;<?php echo no_of_users('issue'); ?> Issues Raised&nbsp;&nbsp; | &nbsp;&nbsp;<?php echo no_of_users('solution'); ?> Solutions Provided</h3>
                    </div>
                    <div class="buttons">
                        <button type="button" onclick="location.href='user/pageRedirect.php?toOpen=search';return false;" class="btn btn-outline btn-default btn-lg" id="search">Search an Issue</button>
                        <?php 
                            if($login){
                        ?>
                        <button type="button" onclick="location.href='user/pageRedirect.php?toOpen=add'<?php $_SESSION['toOpen2']='add-issue.php' ?>;" class="btn btn-outline btn-default btn-lg" id="add">Add an Issue</button>
                        <?php
                            }
                            else{
                        ?>
                        <button type="button" class="btn btn-outline btn-default btn-lg" id="add" data-toggle="modal" data-target="#myModal2">Add an Issue</button>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        
        <!-- /#page-wrapper -->
        <video autoplay loop width="100%" height="auto">
            <source src="videoBackground.mp4" type="video/mp4">
        </video>

    </div>
    

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

    <!-- Large modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        ×</button>
                    <h4 class="modal-title" id="myModalLabel">Institute Login</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-10">
                            <form action="institute/login.php" method="POST" role="form" class="form-horizontal">
                                <div class="form-group">
                                    <label for="cemail" class="col-sm-2 control-label">
                                        Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" name="cemail" id="cemail" placeholder="Email" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-sm-2 control-label">
                                        Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                    </div>
                                    <div class="col-sm-10">
                                        <button  type="submit" class="btn btn-primary btn-sm">
                                            Submit</button>
                                        <a onClick="loadDoc('../institute/forgot-password.php','field');$('#myModal').modal('hide');">Forgot your password?</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        ×</button>
                    <h4 class="modal-title" id="myModalLabel">User Login</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mainBox">
                                <div class="loginText">
                                    User Login
                                </div>
                                <div style="margin: 15px 0px;" class="styleBox">
                                    <a class="btn btn-block btn-social btn-google-plus" href='user/login.php'>
                                        <i class="fa fa-google-plus"></i> Sign in with Google
                                    </a>
                                    <a class="btn btn-block btn-social btn-facebook disabled">
                                        <i class="fa fa-facebook"></i> Sign in with Facebook
                                    </a>
                                    <a class="btn btn-block btn-social btn-twitter disabled">
                                        <i class="fa fa-twitter"></i> Sign in with Twitter
                                    </a>
                                    <a class="btn btn-block btn-social btn-linkedin disabled">
                                        <i class="fa fa-linkedin"></i> Sign in with LinkedIn
                                    </a>
                                    <a class="btn btn-block btn-social btn-github disabled">
                                        <i class="fa fa-github"></i> Sign in with GitHub
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>