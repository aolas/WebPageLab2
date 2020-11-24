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


            <h2 style="text-align:center">My contact information</h2>

            <div class="card">
                <img src="./assets/img/small-img.jpg" alt="Ramunas" style="width:100%">
                <h1>Ramūnas Daukas</h1>
                <p class="title">Telia Technical Support Engineer</p>
                <p>Studying at</p>
                <p>Vilnius University</p>
                <div style="margin: 24px 0;">
                    <a href="#"><i class="fa fa-dribbble"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-linkedin"></i></a>
                    <a href="#"><i class="fa fa-facebook"></i></a>
                </div>
                <p><button>ramunas.daukas@knf.stud.vu.lt</button></p>
            </div>


    <?php require_once "inc/footer.php"; ?>

</div>
</body>
</html>
