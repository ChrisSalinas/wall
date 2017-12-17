<?php
session_start();
include 'view/header.php';
include 'upload.php';

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>

    <link rel="stylesheet" href="css/welcome_style.css">
</head>
<body>

<ul>
    <li><a href="#Upload" style="margin-top: 20px">
            <form action="<?=$_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
                <input type="file" name="fileToUpload" required>
                <input type="text" name="title" placeholder="vul een titel in ..." required>
                <input type="submit" value="Upload now">
            </form></a></li>
    <li><input type="button" onclick="shuffle()" value="shuffle" style="margin-top:33px"></li>
    <li><img style="margin-left: 150px" src="Naamloos-1.png" alt=""></li>
    <li style="float:right"><a  style="margin-top: 20px" href="logout.php">Log out</a></li>
    <li style="float:right"><a href="#Upload" style="margin-top: 20px"><?php echo "Lechajiem ".$_SESSION['username']; ?></a></li>
</ul>

<div id="mygallery">
<!--    <a href="images/rick%20and%20morty.png" data-lightbox="image-1" data-title="My caption">-->
<!--        <img alt="Title 1" src="images/rick%20and%20morty.png"/>-->
<!--    </a>-->
<?php

$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
$sql = "SELECT * FROM foto";
$result = $mysqli ->query($sql);
if($result -> num_rows > 0){
    while($row = $result -> fetch_assoc()){
        $img = $row['name'];
//        echo "<img style=width:500px; src='" . $row['name'] ."'>";
//        echo "<a href='$img'> <img src='$img'></a>";
        echo "<a href='$img' data-lightbox='image-1' data-title='Geupload door " .$row['username'] ."'> <img src='$img' alt='". $row['title'] ."'></a>";
    }
}
?>
</div>
<script>
    $("#mygallery").justifiedGallery({
        rowHeight : 200
    });
    function shuffle(){
        $("#mygallery").justifiedGallery({
            rowHeight : 200,
            randomize: true
        });
    }
</script>
<script src="js/lightbox.js"></script>


</body>
</html>
