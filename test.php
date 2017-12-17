<!DOCTYPE html>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="js/jquery.justifiedGallery.min.js"></script>
    <link rel="stylesheet" href="css/justifiedGallery.min.css" />
    <link rel="stylesheet" href="css/lightbox.css" />
</head>
<body>
<div id="mygallery" >
    <a href="images/rick%20and%20morty.png" data-lightbox="image-1" data-title="My caption">
        <img alt="Title 1" src="images/rick%20and%20morty.png"/>
    </a>
    <a href="images/Poster.png" data-lightbox="image-1">
        <img alt="Title 2" src="images/Poster.png"/>
    </a>
    <a href="images/Poster.png" data-lightbox="image-1" data-title="My caption">
        <img alt="Title 1" src="images/Poster.png"/>
    </a>
    <!-- other images... -->
</div>

<script>
    $("#mygallery").justifiedGallery({
        rowHeight : 200,
        randomize: true
    });</script>
<script src="js/lightbox.js"></script>
</body>
</html>