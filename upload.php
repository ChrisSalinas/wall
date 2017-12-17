<?php
include "db_const.php";
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
//var_dump ($_FILES);
$image_path = 'images/';
$filename = $_FILES['fileToUpload']['name'];
$title = $_POST['title'];

//echo $filename;

$tmp_filename = $_FILES['fileToUpload']['tmp_name'];

$destination = $image_path . $filename;

if (move_uploaded_file($tmp_filename, $destination)){
//    header("\"Location: upload.php");
//    echo "<img src='$destination' style='width: 400px'>";
//    $title = "test";
    $sql = "INSERT INTO foto(`name`, `username`, `title`) VALUES(' $destination ', '" .$_SESSION['username'] . "', '$title' )";
    $result = $mysqli ->query($sql);
}else{
//    echo "error uploaden file";

}

//if($result){
//    echo 'geluk';
//}else{
//    echo 'niet gelukt ';
//    echo $sql;
//}
?>