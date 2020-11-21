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
                <a class="uk-button uk-button-default" href="/editarticle.php?article=',$article->article_id,'">Edit</a>
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
                          <a class="uk-button uk-button-text" href="#">',Comment::numberOfCommentsByArticle($article->article_id),' Comments</a>
                      </div>
                  </div>
              </article> 
      ';
        $comments = Comment::getCommentsByArticle($article->article_id);
        foreach ($comments as $item){
            $endtime =  strtotime($item->publication_time);
            $starttime = microtime(true);
            $days=ceil(($starttime-$endtime )/60/60/24);



            echo '
            <article class="uk-comment uk-comment-primary">
                <header class="uk-comment-header">
                    <div class="uk-grid-medium uk-flex-middle" uk-grid>
                        <div class="uk-width-auto">
                            <img class="uk-comment-avatar" src="images/avatar.jpg" width="80" height="80" alt="">
                        </div>
                        <div class="uk-width-expand">
                            <h4 class="uk-comment-title uk-margin-remove"><a class="uk-link-reset" href="#">',User::FindName($item->user_id) ,'</a></h4>
                            <ul class="uk-comment-meta uk-subnav uk-subnav-divider uk-margin-remove-top">
                                <li><a href="#">',$days,' days ago</a></li>
                            </ul>
                        </div>
                    </div>
                </header>
                <div class="uk-comment-body">
                    <p>',$item->comment,' </p>
                </div>
            </article>
            
            ';}
        if(Page::IsLogedIn()){
        echo '<form class="add-comment" article_id="',$article->article_id,'">
                <fieldset class="uk-fieldset">

                    <legend class="uk-legend">Add comment</legend>
                    <div class="uk-margin">
                        <textarea id="editor" class="uk-textarea comment-text" required="required" rows="10" placeholder="Comment"></textarea>
                    </div>
                    <div class="uk-margin uk-alert uk-alert-danger js-error" style="display: none;"></div>
                    <div class="uk-margin uk-alert uk-alert-success js-message" style="display: none;"></div>

                    <div class="uk-margin">
                        <button class="uk-button uk-button-default" type="submit">Post</button>
                    </div>
                </fieldset>
            </form>';
        }

    }else{
        //header("Location: /index.php");
        //exit;
    }
    ?>




</div>
<?php require_once "inc/footer.php"; ?>
</body>
</html>
