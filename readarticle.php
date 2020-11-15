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

    <title>Article</title>

</head>

<body>
<?php require_once "inc/navbar.php"; ?>

<div class="uk-section uk-container">

    <?php
    if( $_GET["article"] ){

        $article = new Article($_GET["article"]);

        if(Page::IsLogedIn()){
            echo'
                <p uk-margin>
                <button class="uk-button uk-button-default delete" article=',$article->article_id,'>Delete</button>
                <div class="uk-margin uk-alert uk-alert-danger js-error" style="display: none;"></div>
                </p>';
        }
        echo '
            <article class="uk-article">
                  <h1 class="uk-article-title"><a class="uk-link-reset" href="">', $article->title,'</a></h1>
                  <p class="uk-article-meta">Written by <a href="#">',User::FindName($article->user_id),'</a> ',$article->publication_time,'. Posted in <a href="#">Blog</a></p>
                  <p class="">',$article->article_text,'</p>
                  <div class="uk-grid-small uk-child-width-auto" uk-grid>
                      <div>
                          <a class="uk-button uk-button-text" href="#">5 Comments</a>
                      </div>
                  </div>
              </article> 
      ';
    }else{
        //header("Location: /index.php");
        //exit;
    }
    ?>
</div>
<?php require_once "inc/footer.php"; ?>
</body>
</html>
