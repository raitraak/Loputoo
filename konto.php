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
                <span class="glyphicon glyphicon-th"></span>
            </button>
            <a class="navbar-brand" href="index.php">Esileht</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">

            <ul class="nav navbar-nav navbar-right">
                <li><a href="lae_pilt.php">Lisa uus pilt <span class="glyphicon glyphicon-upload"></span></a></li>


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

<h2 class="h2title">Minu pildid</h2>

    <ul class="row">

        <?php
        /**
         * Created by PhpStorm.
         * User: raitraak
         * Date: 29/04/16
         * Time: 13:37
         */

        include("db.php");
        $con=mysqli_connect($server, $db_user, $db_pwd,$db_name) //connect to the database server
        or die ("Could not connect to mysql because ".mysqli_error());

        mysqli_select_db($con,$db_name)  //select the database
        or die ("Could not select to mysql because ".mysqli_error());

        $user = $_SESSION["username"];
        $sql = "SELECT * FROM images where user='$user' ORDER by id DESC";
        $result = $con->query($sql);
        $status = '';
        $preview = '';



        while($row = $result->fetch_array()) {


            if ($row[status] == 1) {

                $status =  "Avalik";
                $preview = "pilt.php?id=$row[id]";

            } else {

                $status = "Üle vaatamisel";
                $preview = '#';

            }

            echo "<div class='col-lg-4 col-sm-6'>

            <div class='thumbnail'>
            <form method='POST' action='delete.php?id=$row[id]'>
                <button type='submit' class='btn btn-danger btn-xs' data-loading-text='Laeb...' id='$row[id]'><span class='glyphicon glyphicon-trash'></span></button>
                </form>

                <a href='$preview'>
    <img src='$row[url]' class='img-responsive' onload='fadeIn(this)' style='display:none;'>

                </a>

                <div class='pic-info'>

<h3>$row[title]</h3>
                <p><strong>Kirjeldus:</strong> $row[description]</p>
    <p class='text-info'><strong>Staatus:</strong> $status</p>
</div>
            </div>
        </div>";


        }

        ?>


    </ul>




</div>

</body>
</html>



