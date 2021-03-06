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
    <title>Lae pilt - Pixels</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Kvaliteetsete fotode keskkond fotograafidele ja digikunstnikele.">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="css/main.css" rel="stylesheet" media="screen">
</head>

<body>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.validate.js"></script>

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
                        <li><a href="konto.php"><span class="glyphicon glyphicon-home"></span> Kodu</a></li>
                        <li><a href="muuda_parooli.php"><span class="glyphicon glyphicon-pencil"></span> Muuda parooli</a></li>
                        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logi välja</a></li>

                    </ul>

                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">

    <form method="post" action="upload.php" class="form-horizontal" id="img_upload" enctype="multipart/form-data">
        <div class="form-group">
        <h2>Lisa uus pilt</h2>
            <p><strong class="text-danger">Tingimused: </strong>Pixels hoiab oma andmebaasis ainult kunstilise väärtusega pilte, mis on administraatori poolt heaks kiidetud. Pilt peab olema .JPG või .PNG faililaiendiga. Võõraid töid ilma nõusolekuta üles laadida on keelatud!</p>
        </div>
        <div class="form-group">
            <input class="form-control" type="text" name="imgtitle" id="title" placeholder="Pildi pealkiri">
        </div>

        <div class="form-group">

            <textarea class="form-control" rows="3" name="imgdescription" id="description" placeholder="Pildi kirjeldus"></textarea>

        </div>

        <div class="form-group">

            <label>Vali kategooria:</label>
            <select class="form-control" type="text" name="imgcategory" id="category">
                <option>loodus</option>
                <option>loomad</option>
                <option>inimesed</option>
                <option>autod</option>
                <option>ajalugu</option>
                <option>arhitektuur</option>
                <option>abstraktne</option>
                <option>digikunst</option>
                <option>must-valge</option>
                <option>muu</option>
                </select>

        </div>
        <div class="form-group">
            <input class="form-control" type="text" name="imgtags" id="tags" placeholder="Märksõnad">
        </div>
        <div class="form-group">
            <input type="file" id="imgfile" name="file">
            <p class="help-block">Max lubatud pildi suurus 5mb</p>
        </div>

        <div class="form-group">
            <label>
                <input name="check" type="checkbox"> Nõustun tingimustega
            </label>
        </div>
            <div class="form-group">

        <button type="submit" class="btn btn-primary" data-loading-text="Laeb...palun oodake">Lae üles</button>
            </div>
        <div class="messagebox">
            <div id="alert-message"></div>
        </div>
    </form>

    <script>
        $(document).ready(function() {


            $("#img_upload").submit(function() {

                $("#img_upload").validate({
                    rules: {
                        imgtitle: {
                            required: true,
                            maxlength: 55
                        },
                        imgdescription: {
                            required: true,
                            maxlength: 250
                        },
                        imgcategory: {
                            required: true

                        },
                        imgtags: {
                            required: true
                        },

                        check: {

                            required: true
                        },

                        file: {

                            required: true
                        },
                    },
                    messages: {
                        imgtitle: {
                            required: "Palun lisa pildi pealkiri",
                            maxlength: "Pealkiri on liiga pikk"
                        },
                        imgdescription: {
                            required: "Palun lisa pildi kirjeldus",
                            maxlength: "Kirjeldus on liiga pikk"

                        },
                        imgtags: {
                            required: "Palun lisa vähemalt üks märksõna"

                        },
                        imgcategory: {
                            required: "Palun lisa kategooria"
                        },

                        check: {

                            required: "Nõustu tingimustega"
                        },

                        file: {
                            required: "Palun lisa fail!"
                        },
                    },



                    errorPlacement: function(error, element) {
                        error.hide();
                        $('.messagebox').hide();
                        error.appendTo($('#alert-message'));
                        $('.messagebox').slideDown('slow');



                    },
                    highlight: function(element, errorClass, validClass) {
                        $(element).parents('.form-group').addClass('has-error');
                    },
                    unhighlight: function(element, errorClass, validClass) {
                        $(element).parents('.form-group').removeClass('has-error');
                        $(element).parents('.form-group').addClass('has-success');
                    }
                });

                if ($("#img_upload").valid()) {
                    $("button").button('loading');
                    $.ajax({
                        type: "POST",
                        url: "upload.php",
                        data:  new FormData(this),
                        contentType: false,
                        cache: false,
                        processData:false,
                        success: function(data) {
                            $('.messagebox').hide();
                            $('#alert-message').html(data);
                            $('.messagebox').fadeIn('slow');
                            $("button").button('reset');
                            $("#img_upload")[0].reset();
                        }
                    });
                }
                return false;
            });
        });
    </script>


</div>


<div class="panel-footer">

    <p>Copyright 2016, Developed by Rait Rääk</p>
</div>

</body>
</html>



