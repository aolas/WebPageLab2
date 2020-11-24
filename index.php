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
        foreach ($arrValues as $article) {

            echo ' 
      <div class="uk-box-shadow-bottom uk-box-shadow-xlarge uk-container container">
          <div class="uk-background-default uk-padding-large">
              <article class="uk-article">
                  <h1 class="uk-article-title"><a class="uk-link-reset" href="/readarticle.php?article=',$article->article_id,'">', $article->title,'</a></h1>
                  <p class="uk-article-meta">Written by <a href="#">',User::FindName($article->user_id),'</a> ',$article->publication_time,'. Posted in <a href="#">Blog</a></p>
                  <p class="uk-text-lead">',$article->article_text,'</p>
                  <div class="uk-grid-small uk-child-width-auto" uk-grid>
                      <div>
                          <a class="uk-button uk-button-text" href="/readarticle.php?article=',$article->article_id,'">Read more</a>
                      </div>
                      <div>
                          <a class="uk-button uk-button-text" href="#">',Comment::numberOfCommentsByArticle($article->article_id),' Comments</a>
                      </div>
                  </div>
              </article>
          </div>
      </div>';
        }
    ?>
        <?php require_once "inc/footer.php"; ?>

  </div>
  </body>
</html>
