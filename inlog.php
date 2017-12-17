<?php
include "db_const.php";
session_start();
if (!isset($_POST['submit'])){
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
    <!--    <script src="index.js"></script>-->
</head>
<body>
    <div class="login">
        <div class="login-triangle"></div>

        <h2 class="login-header">Log in</h2>

        <form class="login-container" action="<?=$_SERVER['PHP_SELF']?>" method="post">
            <p><input type="text" placeholder="Username" name="username" autofocus required></p>
            <p><input type="password" placeholder="Password" name="password" required></p>
            <p><input type="submit" value="Log in" name="submit"></p>
            <h5><a href="register.php">Geen account? Klik hier om te registeren</a></h5>
        </form>
    </div>
<?php
} else {
require_once("db_const.php");
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
# check connection
if ($mysqli->connect_errno) {
echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
exit();
}

$username = $_POST['username'];
$password = hash('md5',$_POST['password']);

$sql = "SELECT * from users WHERE username LIKE '{$username}' AND password LIKE '{$password}' LIMIT 1";
$result = $mysqli->query($sql);
if (!$result->num_rows == 1) {
    ?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>
        <link rel="stylesheet" href="css/style.css">
        <!--    <script src="index.js"></script>-->
    </head>
    <body>
    <div class="login">
        <div class="login-triangle"></div>

        <h2 class="login-header">Log in</h2>

        <form class="login-container" action="<?=$_SERVER['PHP_SELF']?>" method="post">
            <p><input type="text" placeholder="Username" name="username" autofocus required></p>
            <p><input type="password" placeholder="Password" name="password" required></p>
            <?php echo "<p style='color: red;;'>Invalid username/password combination</p>";?>
            <p><input type="submit" value="Log in" name="submit"></p>
            <h5><a href="register.php">Geen account? Klik hier om te registeren</a></h5>
        </form>
    </div>
    <?php

} else {
//echo "<p>Logged in successfully</p>";
    $_SESSION['username'] = $username;
    header("Location: welcome.php");
// do stuffs
}
}
?>
</body>
</html>

