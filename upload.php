<?php

session_start();

if ( !isset($_SESSION['login']) || $_SESSION['login'] !== true) { //Allow only logged in user to access

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

//Variables to receive image info
$title = $_POST["imgtitle"];
$description = $_POST["imgdescription"];
$category = $_POST["imgcategory"];
$tags = $_POST["imgtags"];
$user = $_SESSION["username"];
$str_replace = "img/uploads/".$_FILES["file"]["name"];
$path = str_replace(" ", "", $str_replace);
$uploadOk = 1;
$imageFileType = pathinfo($path,PATHINFO_EXTENSION);

//SQL query
$sql = "INSERT INTO images (title,description,category, tags, user, url, status)
VALUES ('$title','$description','$category','$tags','$user','$path', 0)";


// Check if file already exists
if (file_exists($path)) {
    $uploadOk = 0;
    echo "See fail juba eksisteerib! ";
}

// Check file size
if ($_FILES["file"]["size"] > 5000000) {
    echo "Fail on liiga suur! ";
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    echo "See formaat poe lubatud!  ";
    $uploadOk = 0;
}

if ($uploadOk == 0) {


    echo "Üleslaadimine ebaõnnestus"; //Upload error

} else {

    $con->query($sql); //Add image info to database
    move_uploaded_file($_FILES["file"]["tmp_name"], $path); //Upload file
    echo "Üleslaadimine õnnestus. Pilt on saadetud ülevaatamisele ja avaldatakse esimesel võimalusel.";
}

$con->close();

?>