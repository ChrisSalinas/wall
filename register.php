<?php
require_once("db_const.php");
if (!isset($_POST['submit'])) {
    ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registeren</title>
    <link rel="stylesheet" href="css/style.css">
    <!--    <script src="index.js"></script>-->
</head>
<body>
<div class="login">
    <div class="login-triangle"></div>

    <h2 class="login-header">Registeren</h2>

    <form class="login-container" action="<?=$_SERVER['PHP_SELF']?>" method="post">
        <p><input type="text" placeholder="Username" name="username" autofocus required></p>
        <p><input type="password" placeholder="Password" name="password" required></p>
        <p><input type="text" placeholder="First name" name="first_name" required></p>
        <p><input type="text" placeholder="Last name" name="last_name" required></p>
        <p><input type="email" placeholder="Email" name="email" required></p>
        <p><input type="submit" value="Registeren" name="submit"></p>
        <h5><a href="inlog.php">Al een account? Klik hier om in te loggen</a></h5>
    </form>
</div>
    <?php
} else {
    ## connect mysql server
    $mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    # check connection
    if ($mysqli->connect_errno) {
        echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
        exit();
    }
    ## query database
    # prepare data for insertion
    $username = $_POST['username'];
    $password = hash('md5',$_POST['password']);
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];

    # check if username and email exist else insert
    $exists = 0;
    $result = $mysqli->query("SELECT username from users WHERE username = '{$username}' LIMIT 1");
    if ($result->num_rows == 1) {
        $exists = 1;
        $result = $mysqli->query("SELECT email from users WHERE email = '{$email}' LIMIT 1");
        if ($result->num_rows == 1) $exists = 2;
    } else {
        $result = $mysqli->query("SELECT email from users WHERE email = '{$email}' LIMIT 1");
        if ($result->num_rows == 1) $exists = 3;
    }

    if ($exists == 1){ ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registeren</title>
    <link rel="stylesheet" href="css/style.css">
    <!--    <script src="index.js"></script>-->
</head>
<body>
<div class="login">
    <div class="login-triangle"></div>

    <h2 class="login-header">Registeren</h2>

    <form class="login-container" action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
        <p><input type="text" placeholder="Username" name="username" autofocus required></p>
        <p><input type="password" placeholder="Password" name="password" required></p>
        <p><input type="text" placeholder="First name" name="first_name" required></p>
        <p><input type="text" placeholder="Last name" name="last_name" required></p>
        <p><input type="email" placeholder="Email" name="email" required></p>
        <?php echo "<p style='color:red'>Username already exists!</p>"; ?>
        <p><input type="submit" value="Registeren" name="submit"></p>
        <h5><a href="inlog.php">Al een account? Klik hier om in te loggen</a></h5>
    </form>
</div>

<?php
}else if ($exists == 2){ ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registeren</title>
    <link rel="stylesheet" href="css/style.css">
    <!--    <script src="index.js"></script>-->
</head>
<body>
<div class="login">
    <div class="login-triangle"></div>

    <h2 class="login-header">Registeren</h2>

    <form class="login-container" action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
        <p><input type="text" placeholder="Username" name="username" autofocus required></p>
        <p><input type="password" placeholder="Password" name="password" required></p>
        <p><input type="text" placeholder="First name" name="first_name" required></p>
        <p><input type="text" placeholder="Last name" name="last_name" required></p>
        <p><input type="email" placeholder="Email" name="email" required></p>
        <?php echo "<p style='color: red'>Username and Email already exists!</p>"; ?>
        <p><input type="submit" value="Registeren" name="submit"></p>
        <h5><a href="inlog.php">Al een account? Klik hier om in te loggen</a></h5>
    </form>
</div>

<?php
}else if ($exists == 3){ ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registeren</title>
    <link rel="stylesheet" href="css/style.css">
    <!--    <script src="index.js"></script>-->
</head>
<body>
<div class="login">
    <div class="login-triangle"></div>

    <h2 class="login-header">Registeren</h2>

    <form class="login-container" action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
        <p><input type="text" placeholder="Username" name="username" autofocus required></p>
        <p><input type="password" placeholder="Password" name="password" required></p>
        <p><input type="text" placeholder="First name" name="first_name" required></p>
        <p><input type="text" placeholder="Last name" name="last_name" required></p>
        <p><input type="email" placeholder="Email" name="email" required></p>
        <?php echo "<p style='color: red'>Email already exists!</p>"; ?>
        <p><input type="submit" value="Registeren" name="submit"></p>
        <h5><a href="inlog.php">Al een account? Klik hier om in te loggen</a></h5>
    </form>
</div>

<?php
}else {
        # insert data into mysql database
        $sql = "INSERT  INTO `users` (`id`, `username`, `password`, `first_name`, `last_name`, `email`)
				VALUES (NULL, '{$username}', '{$password}', '{$first_name}', '{$last_name}', '{$email}')";

        if ($mysqli->query($sql)) {?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registeren</title>
    <link rel="stylesheet" href="css/style.css">
    <!--    <script src="index.js"></script>-->
</head>
<body>
<div class="login">
    <div class="login-triangle"></div>

    <h2 class="login-header">Registeren</h2>

    <form class="login-container" action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
        <p><input type="text" placeholder="Username" name="username" autofocus required></p>
        <p><input type="password" placeholder="Password" name="password" required></p>
        <p><input type="text" placeholder="First name" name="first_name" required></p>
        <p><input type="text" placeholder="Last name" name="last_name" required></p>
        <p><input type="email" placeholder="Email" name="email" required></p>
        <?php echo "<p style='color: green'>Registred successfully!</p>"; ?>
        <p><input type="submit" value="Registeren" name="submit"></p>
        <h5><a href="inlog.php">Al een account? Klik hier om in te loggen</a></h5>
    </form>
</div>
<?php

        } else {
            echo "<p>MySQL error no {$mysqli->errno} : {$mysqli->error}</p>";
            exit();
        }
    }
}
?>

</body>
</html>


