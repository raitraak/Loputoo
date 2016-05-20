<?php
/**
 * Created by PhpStorm.
 * User: raitraak
 * Date: 25/04/16
 * Time: 12:38
 */

include("db.php");
$con=mysqli_connect($server, $db_user, $db_pwd,$db_name) //connect to the database server
or die ("Could not connect to mysql because ".mysqli_error());

mysqli_select_db($con,$db_name)  //select the database
or die ("Could not select to mysql because ".mysqli_error());

$sql = "SELECT * FROM images WHERE status=1 ORDER by id DESC";
$result = $con->query($sql);

while($row = $result->fetch_array()) {

    echo "<div class='col-lg-4 col-sm-6'>

                <a class='thumbnail' href='pilt.php?id=$row[id]'>
    <img src='https://ekzmsje.cloudimg.io/s/resizeinbox/400x300/http://localhost:8888/lõputöö/$row[url]' onload='fadeIn(this)' class='img-responsive'>
                </a>
        </div>";

}

$con->close();


?>
