<!DOCTYPE html>
<head>
    <title>Konto aktiveerimine</title>
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
					<li><a href="logi_sisse.php"><span class="glyphicon glyphicon-log-in"></span> Logi sisse</a></li>
				</ul>
			</div>
		</div>
	</nav>

	<div class="container">
		<h2 class="h2title">Konto aktiveerimine</h2>

<?php
	include("db.php");
	 $con=mysqli_connect($server, $db_user, $db_pwd,$db_name) //connect to the database server
	or die ("Could not connect to mysql because ".mysqli_error());

$key=mysqli_real_escape_string($con,$_GET["k"]);

if (!empty($key))
{
	

	mysqli_select_db($con,$db_name)  //select the database
	or die ("Could not select to mysql because ".mysqli_error());

	//query database to check activation code
	$query="select * from ".$table_name." where activ_key='$key'";
	$result=mysqli_query($con,$query) or die('error');
		 if (mysqli_num_rows($result))
		 {
			 $row=mysqli_fetch_array($result);
			 if ($row['activ_status']!='1')
			 {
			 $query="update ".$table_name."	 set activ_status='1' where activ_key='$key'";
			 $result=mysqli_query($con,$query) or die('error');
			
			 echo "<p style='text-align: center;'>Konto edukalt aktiveeritud</p>";
			 }
			 else
			 {
				 echo "Konto on juba aktiveeritud";
				 //header('Location: $url');
			
				
			 }
			 
		 }
		 else
		 {
			 echo "<div class=\"messagebox\"><div id=\"alert-message\">Vale aktiveerimiskood</div></div>";
			 //header('Location: $url');
		 }
}
else
	echo "<div style='text-align: center;' class=\"messagebox\"><div id=\"alert-message\">viga</div></div>";
	
?>
	</div>
</body>

</html>


