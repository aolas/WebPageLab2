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

    <title>Home page</title>

  </head>

  <body>
  <?php require_once "inc/navbar.php"; ?>

  <div class="uk-section uk-container">

        <?php

        $arrValues = Article::getArticles();
        foreach ($arrValues as $row){
            echo  '<div class="uk-box-shadow-bottom uk-box-shadow-xlarge uk-container container"> <div class="uk-background-default uk-padding-large"> <h2>' ,  $row[1] , "</h2>";
            echo "<p> Posted " , $row[2] , "</p></div> </div>";
        }


        ?>

  </div>
  	<?php require_once "inc/footer.php"; ?> 
  </body>
</html>
