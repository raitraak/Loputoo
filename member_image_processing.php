<?php
/**
 * Created by PhpStorm.
 * User: raitraak
 * Date: 29/04/16
 * Time: 13:37
 */

    include("db.php");
    $con=mysqli_connect($server, $db_user, $db_pwd,$db_name) //connect to the database server
    or die ("Could not connect to mysql because ".mysqli_error());

    mysqli_select_db($con,$db_name)  //select the database
    or die ("Could not select to mysql because ".mysqli_error());

    $user = $_SESSION["username"];
    $sql = "SELECT * FROM images where user='$user' AND status=1 ORDER by id DESC";

    $result = $con->query($sql);

    while($row = $result->fetch_array()) {

        echo "<div class='col-lg-4 col-sm-6'>
            <div class='thumbnail'>
                <a href=" .$row[url]. ">
    <img src=" .$row["url"]. " class='img-responsive' onload='fadeIn(this)' style='display:none;'>
                </a>
                <form method='POST' id='delete' action='delete.php?id=$row[id]'>
                <button type='submit' id='$row[id]'>Kustuta</button>
                </form>
            </div>
        </div>";



    }





    ?>