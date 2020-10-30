<?php
    define('__CONFIG__',true);
    require_once  "inc/config.php";
    echo "hello world";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.5.9/dist/css/uikit.min.css" />
</head>
<body>
    <ul>
        <li><a href="login.php">Login</a></li>
        <li><a href="register.php">Register</a></li>
    </ul>




    <!-- UIkit JS -->
    <?php require_once "inc/footer.php"?>

</body>
</html>
