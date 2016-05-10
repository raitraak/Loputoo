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

</head>

<body>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>

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

            <ul class="nav navbar-nav navbar-right">
                <li><a href="lae_pilt.php">Lisa uus pilt <span class="glyphicon"></span></a></li>


                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> Konto</a>
                    <ul class="dropdown-menu">
                        <li><a href="muuda_parooli.php"><span class="glyphicon glyphicon-pencil"></span> Muuda parooli</a></li>
                        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logi välja</a></li>

                    </ul>



                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">

    <script type="text/javascript">
        // this function must be defined in the global scope
        window.fadeIn = function fadeIn(obj) {
            $(obj).fadeIn(2000);
        }
    </script>

<h2>Minu pildid</h2>

    <ul class="row">

<?php

include("member_image_processing.php");

?>
    </ul>


</div>

</body>
</html>



