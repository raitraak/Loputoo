<?php
session_start();


include("db.php");
$con=mysqli_connect($server, $db_user, $db_pwd,$db_name) //connect to the database server
or die ("Could not connect to mysql because ".mysqli_error());

mysqli_select_db($con,$db_name)  //select the database
or die ("Could not select to mysql because ".mysqli_error());

$sql = "SELECT * FROM images WHERE status=1 ORDER by id DESC";
$result = $con->query($sql);

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Kvaliteetsete fotode keskkond fotograafidele ja digikunstnikele.">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Pixels - Kvaliteetsete fotode keskkond</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet" media="screen">
</head>
<body>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.validate.js"></script>

<!-- Header section -->
<header class="header-image">

<nav class="navbar" id="navbar">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="glyphicon glyphicon-th"></span>
            </button>
            <a class="navbar-brand" href="index.php"><img class="img-responsive" id="logo" src="img/logo.png" alt="logo"></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar"><!-- Dynamic menu -->

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
        </div><!-- /Dynamic menu -->
    </div>
</nav>
    <div class="container">

        <h1 id="header-title">Kvaliteetsete fotode keskkond</h1>

                 <p id="header-text">Oled fotograaf või digikunstnik? Oled teinud mõne ägeda pildi ja tahaksid seda teistega jagada? Registreeri konto ja lae oma töö üles. Meie vaatame selle üle ja sobivusel lisame esilehele. Pixels on loodud selleks, et edendada Eesti andekaid fotograafe ja kunstnikke.</p>

        <div class="col-lg-4 col-lg-offset-4"><!-- Search and categories -->
            <form method="GET" action="otsi.php" id="search">
                <div class="input-group">
                    <input type="text" name="id" class="form-control" placeholder="Otsi pilte märksõna järgi...">
                        <span class="input-group-btn">
                             <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
                         </span>
                </div><!-- /input-group -->
            </form>
            <div class="row" id="categories">
                <p>Kategooriad:</p>
                <a href="kategooria.php?id=loodus">loodus</a>
                <a href="kategooria.php?id=loomad">loomad</a>
                <a href="kategooria.php?id=inimesed">inimesed</a>
                <a href="kategooria.php?id=autod">autod</a>
                <a href="kategooria.php?id=ajalugu">ajalugu</a>
                <a href="kategooria.php?id=arhitektuur">arhitektuur</a>
                <a href="kategooria.php?id=abstraktne">abstraktne</a>
                <a href="kategooria.php?id=digikunst">digikunst</a>
                <a href="kategooria.php?id=must-valge">must-valge</a>
                <a href="kategooria.php?id=muu">muu</a>
            </div>
        </div><!-- /Search and categories -->
    </div>

</header> <!-- /header section -->

<!-- Body container -->
<div class="container">

    <!-- Fadein images -->
    <script type="text/javascript">
        // this function must be defined in the global scope
        window.fadeIn = function fadeIn(obj) {
            $(obj).fadeIn(2000);
        }
    </script>

    <!-- Hover effect -->
    <script>

        $( document ).ready(function() {

            $('.thumbnail').hover(
                function(){
                    $(this).find('.caption').slideDown(250); //.fadeIn(250)
                },
                function(){
                    $(this).find('.caption').slideUp(250); //.fadeOut(205)
                }
            );
        });


    </script>

    <!-- Row for images -->
    <div class="row">

         <h2 class="h2title">Viimati lisatud pildid</h2>

            <?php //Gallery array

            while($row = $result->fetch_array()) {

                echo "<div class='col-lg-4 col-sm-6'>
                         <div class='thumbnail'>
                             <div class='caption'>
                                 <h3>$row[title]</h3>
                                     <p>$row[description]</p>
                                      <a class='btn btn-danger' href='pilt.php?id=$row[id]'>Vaata lähemalt</a>

                                </div>
                                  <img src='http://localhost:8888/lõputöö/$row[url]' onload='fadeIn(this)' class='img-responsive' style='display:none;' alt='$row[title]'>
                             </div>
                     </div>";

            }

            $con->close();

            ?>
    </div> <!-- /Row for images -->
</div> <!-- /Body container -->

<div class="panel-footer">
    <p>Copyright 2016, Developed by Rait Rääk</p>
</div>
</body>
</html>