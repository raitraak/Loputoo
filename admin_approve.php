<?php
/**
 * Created by PhpStorm.
 * User: raitraak
 * Date: 05/05/16
 * Time: 10:13
 */


session_start();


if ( !isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {

    header('Location: admin_login.php');

    exit;

}

include("db.php");
$con=mysqli_connect($server, $db_user, $db_pwd,$db_name) //connect to the database server
or die ("Could not connect to mysql because ".mysqli_error());

mysqli_select_db($con,$db_name)  //select the database
or die ("Could not select to mysql because ".mysqli_error());

$id = $_GET["id"];
$query = "SELECT * FROM images WHERE id=$id";
$approve = "UPDATE images set status=1 WHERE id=$id";

$result = $con->query($query);

if ($con->query($approve) === TRUE) {

    header("Location: admin_home.php");


} else {
    echo "Viga: " . $approve . "<br>" . $con->error;
}


$con->close();

?>
