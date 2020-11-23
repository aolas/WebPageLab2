<?php

// Allow the config
define('__CONFIG__', true);
// Require the config
require_once "inc/config.php";


?>
<!DOCTYPE html>
<html lang="en">
<head>

    <?php require_once "inc/head.php"; ?>

    <title>Page map</title>

</head>

<body>
<?php require_once "inc/navbar.php"; ?>

<div class="uk-section uk-container">
    <ul class="uk-list">
        <li><a href="/index.php">Home</a>
                <ul class="uk-list">
                    <?php
                    $articles =  Article::getArticles();
                    foreach ($articles as $item) {
                        echo '<li><a href="/readarticle.php?article=',$item->article_id,'">',$item->title,'</a></li>';
                    }
                    ?>
                </ul>
        </li>
        <li><a href="/requirements.php">Requirements</a></li>
        <li> <a href="/managearticle.php">Articles</a> </li>
        <li> <a href="/dashboard.php">Dashboard</a> </li>
        <li> <a href="/map.php">Map</a> </li>
        <li> <a href="/about.php">Map</a> </li>
        <li> <a href="/logout.php">Log out</a> </li>
        <li> <a href="/login.php">Log in</a> </li>
        <li> <a href="/register.php">Register</a> </li>
    </ul>
</div>
<?php require_once "inc/footer.php"; ?>
</body>
</html>
