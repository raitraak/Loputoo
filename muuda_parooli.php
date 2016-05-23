<?php 
session_start();


if ( !isset($_SESSION['login']) || $_SESSION['login'] !== true) {

if(empty($_SESSION['access_token']) || empty($_SESSION['access_token']['oauth_token']) || empty($_SESSION['access_token']['oauth_token_secret'])){

if ( !isset($_SESSION['token'])) {

if ( !isset($_SESSION['fb_access_token'])) {

 header('Location: index.php');

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
    <form class="form-horizontal" id="change_password_form">
         <h2>Muuda parooli</h2>
        <div class="form-group">
            <input class="form-control" type="text" id="inputuserid" name="username" placeholder="Username" value=<?php echo $_SESSION['username']; ?> disabled>
        </div>
		<div class="form-group">
            <input class="form-control" type="password" id="inputPasswordOld" name="oldpassword" placeholder="Praegune parool">
        </div>
        <div class="form-group">
            <input class="form-control" type="password" id="inputPassword" name="password" placeholder="Uus parool">
        </div>
        <div class="form-group">
            <input class="form-control" type="password" id="inputPassword_2" name="retype_password" placeholder="Uus parool uuesti">
        </div>	

   
<button type="submit"
        class="btn btn-lg btn-primary btn-sign-in" data-loading-text="Loading...">Kinnita</button>
        <div class="messagebox">
            <div id="alert-message"></div>
        </div>
    </form>

    </div>
	
	<script>
        $(document).ready(function() {

		jQuery.validator.addMethod("noSpace", function(value, element) { 
     return value.indexOf(" ") < 0 && value != ""; 
  }, "Spaces are not allowed");
  
            $("#change_password_form").submit(function() {

                $("#change_password_form").validate({
                    rules: {
                        
                        username: {
                            required: true,
							noSpace: true
                        },
						oldpassword: {
                            required: true,
                            minlength: 6
							//maxlength: 8
                        },
                        password: {
                            required: true,
                            minlength: 6
							//maxlength: 8
                        },
                        retype_password: {
                            required: true,
                            equalTo: "#inputPassword"
                        },
                    },
                    messages: {
                        username: {
                            required: "Kasutajanimi",
                        },
						 oldpassword: {
                            required: "Praegune parool",
                            minlength: "Parool peab olema vähemalt 6 tähemärki"
							//maxlength: "Password must be maximum 8 characters"
							
                        },
                        password: {
                            required: "Uus parool",
                            minlength: "Parool peab olema vähemalt 6 tähemärki"
							//maxlength: "Password must be maximum 8 characters"
							
                        },
                        retype_password: {
                            required: "Uus parool uuesti",
                            equalTo: "Paroolid ei ühti"
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

                if ($("#change_password_form").valid()) {
                    var data1 = $('#change_password_form').serialize();
                    $.ajax({
                        type: "POST",
                        url: "process_change_password.php",
                        data: data1,
                        success: function(msg) {
                            console.log(msg);
                            $('.messagebox').hide();
							$('#alert-message').html(msg);
							 $('.messagebox').slideDown('slow');
                            $('button').hide();
                        }
                    });
                }
                return false;
            });
        });
    </script>
    <div class="panel-footer navbar-fixed-bottom">
        <p>Copyright 2016, Developed by Rait Rääk</p>
    </div>
</body>
</html>



