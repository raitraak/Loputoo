<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
</head>
<body>

<header class="header-image">

<nav class="navbar">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="glyphicon glyphicon-th"></span>
            </button>
            <a class="navbar-brand" href="#">www.pixel.ee</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">

            <ul class="nav navbar-nav navbar-right">
                <?php

                if ( isset($_SESSION['login']) || $_SESSION['login'] == true) {

                    echo "<li><a href='konto.php'><span class='glyphicon glyphicon-user'></span> Minu konto</a></li>";
                    echo "<li><a href='logout.php'><span class='glyphicon glyphicon-log-out'></span> Logi välja</a></li>";

                }

                else {
                    echo "<li><a href='registreeri.php'><span class='glyphicon glyphicon-user'></span> Loo konto</a></li>";
                    echo "<li><a href='logi_sisse.php'><span class='glyphicon glyphicon-log-in'></span> Logi sisse</a></li>";
                }

                ?>
            </ul>

        </div>
</nav>
    <div class="container">

    <h1 id="header-title">Fotoalbum fotograafidele ja digikunstnikele</h1>

        <p id="header-text">Oled teinud mõne ägeda pildi ja tahaksid seda teistega jagada? Registreeri konto ja lae oma töö üles. Meie vaatame selle üle ja sobivusel lisame esilehele. Pixels on loodud selleks, et edendada Eesti andekaid fotograafe ja kunstnikke.</p>

        <div class="col-lg-4 col-lg-offset-4" id="search">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Otsi pilte märksõna järgi...">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
      </span>
            </div><!-- /input-group -->
            <div class="row" id="categories">
            <a href="#">inimesed</a>
            <a href="#">loomad</a>
            <a href="#">arhidektuur</a>
            <a href="#">autod</a>
            <a href="#">abstraktne</a>
            <a href="#">abstraktne</a>
            <a href="#">abstraktne</a>
            </div>

        </div><!-- /.col-lg-6 -->
    </div>

</header>

<div class="container">

<div class="row">

    <h2>Viimati lisatud pildid</h2>



        <?php

        include("image_processing.php");

        ?>
</div>
</div>

<div class="panel-footer">

    <p>Copyright 2016, Developed by Rait Rääk</p>
</div>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>