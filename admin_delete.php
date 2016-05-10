<?php
/**
 * Created by PhpStorm.
 * User: raitraak
 * Date: 05/05/16
 * Time: 10:03
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
$delete = "DELETE FROM images WHERE id=$id";

$result = $con->query($query);

while ($row = $result->fetch_assoc()) {

    unlink($row["url"]);
}


if ($con->query($delete) === TRUE) {

    header("Location: admin_home.php");


} else {
    echo "Viga: " . $delete . "<br>" . $con->error;
}

$con->close();

?>
