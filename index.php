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
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">WebSiteName</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Kategooriad <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Page 1-1</a></li>
                        <li><a href="#">Page 1-2</a></li>
                        <li><a href="#">Page 1-3</a></li>
                    </ul>
                </li>
                <form class="navbar-form navbar-left" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Otsi märksõna järgi...">
                    </div>
                    <button type="submit" class="btn btn-default">Otsi</button>
                </form>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php
                session_start();

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


    <div class="jumbotron">


        <h1>Näita kunsti!<br><small>Fotoalbum fotograafidele ja digikunstnikele</small></h1>
        <p>Lorem ipsum dolor sit amet, solum consul offendit ex pri. Ex vis purto elit reprimique. Eos ea euismod dolorum. Soleat dissentiunt vis an. An insolens oportere his, repudiare instructior pri cu.</p>

    </div>

    <h2>Viimati lisatud pildid</h2>

    <div class="row">


        <div class="col-lg-4 col-sm-6">
            <div class="thumbnail">
                <a href="#">
                    <img src="img/2.jpg" class="img-responsive">
                </a>
                <div class="caption">
                    <h3>Teree</h3>
                    <p>teree</p>
                    <p><a href="#" class="btn btn-primary" role="button">Lae alla</a></p>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-sm-6">
            <div class="thumbnail">
                <a href="#">
                    <img src="img/3.jpg" class="img-responsive">
                </a>
                <div class="caption">
                    <h3>Teree</h3>
                    <p>teree</p>
                    <p><a href="#" class="btn btn-primary" role="button">Lae alla</a></p>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-sm-6">
            <div class="thumbnail">
                <a href="#">
                    <img src="img/3.jpg" class="img-responsive">
                </a>
                <div class="caption">
                    <h3>Teree</h3>
                    <p>teree</p>
                    <p><a href="#" class="btn btn-primary" role="button">Lae alla</a></p>
                </div>
            </div>
        </div>

    </div>

</div>

<footer class="footer">
    <div class="container">
        <p class="text-muted">Lõputöö 2016</p>
    </div>
</footer>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>