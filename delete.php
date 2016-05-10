<?php
/**
 * Created by PhpStorm.
 * User: raitraak
 * Date: 29/04/16
 * Time: 22:21
 */

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

include("db.php");
$con=mysqli_connect($server, $db_user, $db_pwd,$db_name) //connect to the database server
or die ("Could not connect to mysql because ".mysqli_error());

mysqli_select_db($con,$db_name)  //select the database
or die ("Could not select to mysql because ".mysqli_error());

$id = $_GET["id"];
$query = "SELECT * FROM images WHERE id=$id";
$delete = "DELETE FROM images WHERE id=$id";

$result = $con->query($query);

while ($row = $result->fetch_assoc()) {

    unlink($row["url"]);
}


if ($con->query($delete) === TRUE) {

    header("Location: konto.php");


} else {
    echo "Viga: " . $delete . "<br>" . $con->error;
}

$con->close();

?>