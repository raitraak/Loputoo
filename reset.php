<?php session_start(); ?>
<!DOCTYPE html>
<head>
    <title>Taasta parool - Pixels</title>
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
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="glyphicon glyphicon-th"></span>
                </button>
                <a class="navbar-brand" href="index.php">Esileht</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href='logi_sisse.php'><span class='glyphicon glyphicon-log-in'></span> Logi sisse</a></li>

                </ul>

            </div>
        </div>
    </nav>

	<form class="form-horizontal" id="reset_pwd" method="post">
         <h2>Taasta parool</h2>

	<?php
	include("db.php");
$con=mysqli_connect($server, $db_user, $db_pwd,$db_name) //connect to the database server
or die ("Could not connect to mysql because ".mysqli_error());

mysqli_select_db($con,$db_name)  //select the database
or die ("Could not select to mysql because ".mysqli_error());

	$key=mysqli_real_escape_string($con,$_GET["k"]);
	if (!empty($key))
{


	//query database to check activation code
	$query="select * from ".$table_name." where activ_key='$key' and activ_status='2'";
	$result=mysqli_query($con,$query) or die('error');

		 if (mysqli_num_rows($result))
		 {
			 $row=mysqli_fetch_array($result);
			 if ($row['activ_status']=='2')
			 {
			 $username=trim($row['username']);
			 $_SESSION['username'] = $username;
			 //html
			 ?>

                 <div class="control-group">
            <input class="form-control" type="password" id="password1" name="password1" placeholder="Parool">
        </div>
        <div class="control-group">
            <input class="form-control" type="password" id="password2" name="password2" placeholder="Parool uuesti">
        </div>

        <button
        type="submit" class="btn btn-lg btn-primary btn-sign-in" data-loading-text="Laeb...">Taasta</button>

            <div class="messagebox">
                <div id="alert-message"></div>
            </div>

		<?php
			}
			 else
			 {
				echo "<div class=\"messagebox\"><div id=\"alert-message\">You can login</div></div>";
			 }

		 }
		 else
		 {
			 echo "<div class=\"messagebox\"><div id=\"alert-message\">You can login</div></div>";
			 //header('Location: $url');
		 }
}
else
	echo "<div class=\"messagebox\"><div id=\"alert-message\">error</div></div>";

	?>

	 </form>
    <script type="text/javascript">
        $(document).ready(function() {

            $('#reset_pwd').validate({
                debug: true,
                rules: {
                    password1: {
                        minlength: 6,
                        required: true
                    },
                    password2: {
                        required: true,
                         minlength: 6,
						 equalTo: "#password1"
                    }
                },
				messages: {
                        password1: {
                            required: "Sisesta parool "
                        },
                        password2: {
                            required: "Parool uuesti",
							equalTo: "Paroolid peavad ühtima"

                        },
                    },

				 errorPlacement: function(error, element) {
                        error.hide();
						$('.messagebox').hide();
                        error.appendTo($('#alert-message'));
                        $('.messagebox').slideDown('slow');



                    },
				highlight: function(element, errorClass, validClass) {
                        $(element).parents('.control-group').addClass('error');
                    },
                    unhighlight: function(element, errorClass, validClass) {
                        $(element).parents('.control-group').removeClass('error');
                        $(element).parents('.control-group').addClass('success');
                    }
            });




            $("#reset_pwd").submit(function() {

                if ($("#reset_pwd").valid()) {
                    var data1 = $('#reset_pwd').serialize();
                    $.ajax({
                        type: "POST",
                        url: "process_reset.php",
                        data: data1,
                        success: function(msg) {
							 console.log(msg);

							$('.messagebox').hide();
							$('.messagebox').addClass("error-message");
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