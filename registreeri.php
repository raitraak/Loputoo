<!DOCTYPE html>
<head>
    <title>PHP Login System</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="css/style.css" rel="stylesheet" media="screen">

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
            <ul class="nav navbar-nav navbar-right">
                <li><a href="logi_sisse.php"><span class="glyphicon glyphicon-log-in"></span> Logi sisse</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">

    <form class="form-horizontal" id="register_form" method="post">
         <h2>Loo uus konto</h2>

        <div class="line"></div>
        <div class="form-group">
            <input type="text" id="inputEmail" name="email" placeholder="Email">
        </div>
        <div class="form-group">
            <input type="text" id="inputuserid" name="username" placeholder="Kasutajanimi">
        </div>
        <div class="form-group">
            <input type="password" id="inputPassword" name="password" placeholder="Parool">
        </div>
        <div class="form-group">
            <input type="password" id="inputPassword_2" name="retype_password" placeholder="Parool uuesti">
        </div>	

<button type="submit"
        class="btn btn-lg btn-primary btn-sign-in" data-loading-text="Laeb...">Registreeri</button>

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
/*jQuery.validator.addMethod("maxlength", function (value, element, param) {
    console.log('element= ' + $(element).attr('name') + ' param= ' + param )
    if ($(element).val().length > param) {
        return false;
    } else {
		console.log($(element).val().length);
        return true;
    }
}, "You have reached the maximum number of characters allowed for this field.");
*/
  
            $("#register_form").submit(function() {

                $("#register_form").validate({
                    rules: {
                        email: {
                            required: true,
                            email: true
                        },
                        username: {
                            required: true,
							noSpace: true
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
                        email: {
                            required: "Enter your email address",
                            email: "Enter valid email address"
                        },
                        username: {
                            required: "Enter Username",

                        },
                        password: {
                            required: "Enter your password",
                            minlength: "Password must be minimum 6 characters"
							//maxlength: "Password must be maximum 8 characters"
							
                        },
                        retype_password: {
                            required: "Enter confirm password",
                            equalTo: "Passwords must match"
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

                if ($("#register_form").valid()) {
                    var data1 = $('#register_form').serialize();
                    $.ajax({
                        type: "POST",
                        url: "register.php",
                        data: data1,
                        success: function(msg) {
                            console.log(msg);
                            $('.messagebox').hide();
							$('#alert-message').html(msg);
							 $('.messagebox').slideDown('slow');
                        }
                    });
                }
                return false;
            });
        });
    </script>
</body>

</html>