<?php session_start();
//logout if session not active
if (!isset($_SESSION['admin'])) {
    header('Location: admin_login.php');
}
?><!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

     <title>PHP Login System</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="css/metisMenu.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin-2.css" rel="stylesheet">

   
    <!-- Custom Fonts -->
    <link href="css/font-awesome.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<?php
        include("db.php");
       $con=mysqli_connect($server, $db_user, $db_pwd,$db_name) //connect to the database server
	or die ("Could not connect to mysql because ".mysqli_error());

	mysqli_select_db($con,$db_name)  //select the database
	or die ("Could not select to mysql because ".mysqli_error());

       

        ?>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Home</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
              
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <!--<li><a href="admin_profile.php"><i class="fa fa-user fa-fw"></i> Admin Profile</a>
                        </li>
                        <li><a href="admin_settings.php"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li> -->
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="admin_home.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        
                        <li>
                            <a href="admin_user_list.php"><i class="fa fa-table fa-fw"></i> User list</a>
                        </li>
                        <li>
                            <a href="admin_user_search.php"><i class="fa fa-search fa-fw"></i> Search user</a>
                        </li>
                        <li>
                            <a href="admin_user_add.php"><i class="fa fa-plus fa-fw"></i>Add new user</a>
                        </li>
						<li>
                            <a href="logout.php"><i class="fa fa-sign-out fa-fw"></i>Logout</a>
                        </li>
                        
                       
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
            <div class="row">
                <div class="col-lg-10">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Search User
                            
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Page content -->
    <div id="page-content-wrapper">

        <!-- Keep all page content within the page-content inset div! -->
        <div class="page-content inset">
			 <form id="search_user" method="post">
			  <div class="form-group">
				<label for="exampleInputEmail1">Username</label>
				<input type="text" id="username" class="form-control" name="username" placeholder="Username">
			  </div>
			  <div class="form-group">
				<label for="exampleInputPassword1">Email address</label>
				  <input type="text" id="email" name="email" placeholder="Email" class="form-control" >
			  </div>
			 
			 
			 
			    <button
                    type="submit" class="btn btn-lg btn-primary btn-sign-in" data-loading-text="Loading...">Search
                </button>
				<br />
                <div class="messagebox">
                    <div id="alert-message"></div>
                </div>


			  </form>																											
           
            <div class="row">

                <div class="admin_rec" style="display:none;padding:10px;">

                </div>
            </div>
        </div>
    </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                   
                </div>
                <!-- /.col-lg-8 -->
                
               
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

 <!-- Metis Menu Plugin JavaScript -->
    <script src="js/metisMenu.js"></script>
   

    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>

	
	<script type="text/javascript">
    $(document).ready(function () {


        $("#search_user").submit(function () {


            var data1 = $('#search_user').serialize();
            $.ajax({
                type: "POST",
                url: "admin_search_process.php",
                data: data1,
                success: function (msg) {
                    console.log(msg);
                    $('.admin_rec').hide();
                    $('.admin_rec').html(msg);
                    $('.admin_rec').slideDown('slow');
                }
            });


            return false;


        });
    });
</script>

</body>

</html>
