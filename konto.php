<?php 
session_start();


if ( !isset($_SESSION['login']) || $_SESSION['login'] !== true) {

if(empty($_SESSION['access_token']) || empty($_SESSION['access_token']['oauth_token']) || empty($_SESSION['access_token']['oauth_token_secret'])){

if ( !isset($_SESSION['token'])) {

if ( !isset($_SESSION['fb_access_token'])) {

 header('Location: logi_sisse.php');

exit;
}
}
}
}

?>
	
	<!DOCTYPE html>
<head>
    <title>PHP Login System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="css/main.css" rel="stylesheet" media="screen">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.validate.js"></script>



    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">WebSiteName</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li><a href="#">Lisa uus pilt <span class="glyphicon glyphicon-upload"></span></a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-chevron-down pull-right"></span> <?php echo "".$_SESSION['username']; ?></a>
                        <ul class="dropdown-menu">
                            <li><?php
                                if ( isset($_SESSION['login']) || $_SESSION['login'] == true) {
                                    ?>
                                    <a href="muuda_parooli.php">Muuda parooli</a>
                                    <?php
                                }
                                ?></li>


                        </ul>

                    </li>
                    <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logi välja</a></li>

                </ul>
            </div>
        </div>
    </nav>


</body>

</html>



