



<!DOCTYPE html>
<head>
    <title>PHP Login System</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
            <a class="navbar-brand" href="index.php">WebSiteName</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">

        </div>
    </div>
</nav>

<div class="container">


    <form class="form-horizontal" id="login_form">
         <h3>Logi sisse või loo <a href="registreeri.php">uus konto</a></h3>
        <div class="form-group">
            <input class="form-control" type="text" id="inputEmail" name="username" placeholder="Kasutajanimi">
        </div>
        <div class="form-group">
            <input class="form-control" type="password" id="inputPassword" name="password" placeholder="Parool">
        </div>

        <div class="form-group">
            <button id="signin" type="submit" class="btn btn-lg btn-primary btn-sign-in"
                    data-loading-text="Laeb...">Logi sisse</button>
            <a href="unustasin_parooli.php">Unustasid Parooli?</a>

        </div>

        <div class="messagebox">
            <div id="alert-message"></div>
        </div>
		<div class="form-group">
		<a href="twitter_connect.php"></a>
		<a href="facebook_connect.php"></a>
		<a href="google_connect.php?=code"></a>
		
		</div>
    </form>
</div>
	
</script>
	<script type="text/javascript">
      (function() {
       var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
       po.src = 'https://apis.google.com/js/client:plusone.js';
       var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
     })();
    </script>
 <script>
        $(document).ready(function() {
		jQuery.validator.addMethod("noSpace", function(value, element) { 
     return value.indexOf(" ") < 0 && value != ""; 
  }, "Spaces are not allowed");

  
  //add validator
$("#login_form").validate({
onfocusout: false,
    onkeyup: false,
    onclick: false,
					rules: {
                        username: {
                            required: true,
							noSpace: true
                        },
                        password: {
                            required: true,
                            minlength: 6
                        }
                    },

                    messages: {
                        username: {
                            required: "Sisesta kasutajanimi"
                                                    },
                        password: {
                            required: "Sisesta parool",
                            minlength: "Parool peab olema vähemalt 6 tähemärki"
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
				
            $("#login_form").submit(function() {
				$('.social').hide('slow');
                if ($("#login_form").valid()) {
				$('.messagebox').slideUp('slow');
                    var data1 = $('#login_form').serialize();
					$("button").button('loading');
                    $.ajax({
                        type: "POST",
                        url: "login.php",
                        data: data1,
						dataType: 'json',
                        success: function(msg) {
							
                            if (msg.result == 1) {
							$('.messagebox').addClass("success-message");
							$('.message').slideDown('slow');
							$('#alert-message').text("Õnnestus..teid suunatakse");
							
                                $('#login_form').fadeOut(5000);
								//$("button").button('reset');
                                window.location = "konto.php"
                            } else {	
							$("button").button('reset');
							console.log(msg.result);
							$('.messagebox').hide();
							$('.messagebox').addClass("error-message");
							$('#alert-message').html(msg.result);
							 $('.messagebox').slideDown('slow');
							}
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