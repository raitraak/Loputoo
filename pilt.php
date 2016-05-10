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

<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="glyphicon glyphicon-th"></span>
            </button>
            <a class="navbar-brand" href="index.php">www.pixel.ee</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">

                <form class="navbar-form navbar-left" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Otsi märksõna järgi...">
                    </div>
                    <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
                </form>
            </ul>
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
        </div>
</nav>

<div class="container">
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-572b0bc1cd2f18f3"></script>

<?php

include("db.php");
$con=mysqli_connect($server, $db_user, $db_pwd,$db_name) //connect to the database server
or die ("Could not connect to mysql because ".mysqli_error());

mysqli_select_db($con,$db_name)  //select the database
or die ("Could not select to mysql because ".mysqli_error());

$id = $_GET["id"];
$sql = "SELECT * FROM images WHERE id=$id and status=1";
$result = $con->query($sql);


while($row = $result->fetch_assoc()) {

    echo "<div class='col-md-8'>

                    <img id='pilt' class='img-responsive img-thumbnail' src=".$row["url"].">
        </div>
        <div class='col-md-4'>
            <h2>$row[title]</h2>
            <p><strong>Autor:</strong> $row[user]</p>
            <p><strong>Lisatud:</strong> $row[date]</p>
            <p><strong>Kategooria:</strong> $row[category]</p>
            <p><strong>Kirjeldus:</strong> $row[description]</p>
            <a href='$row[url]'><button class='btn btn-danger'>Vaata originaalsuuruses</button></a>

        </div>";
}


?>

</div>

<div class="panel-footer">
    <p>Copyright 2016, Developed by Rait Rääk</p>
</div>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>