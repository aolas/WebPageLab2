<?php 

	// Allow the config
	define('__CONFIG__', true);
	// Require the config
	require_once "inc/config.php"; 


?>
<!DOCTYPE html>
<html lang="en">
  <head> 
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="robots" content="follow">

    <title>Page Title</title>

    <base href="/" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.24/css/uikit.min.css" />
  </head>

  <body>
  <?php require_once "inc/navbar.php"; ?>

  <div class="uk-section uk-container">
      <div class="uk-grid uk-child-width-1-3@s uk-child-width-1-1" uk-grid>
        <?php

        $arrValues = Article::getArticles();
        foreach ($arrValues as $row){
            echo  '<div class="uk-container"> <h2>' ,  $row[1] , "</h2>";
            echo "<p> Posted " , $row[2] , "</p></div>";
        }

        ?>
      </div>
  </div>
  	<?php require_once "inc/footer.php"; ?> 
  </body>
</html>
