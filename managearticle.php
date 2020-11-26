<?php

// Allow the config
define('__CONFIG__', true);
// Require the config
require_once "inc/config.php";

Page::ForceLogin();

$User = new User($_SESSION['user_id']);
$stats = Article::articleStats();
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <?php
    require_once "inc/head.php";
    ?>
    <title>Manage article</title>


</head>

<body>
<?php require_once "inc/navbar.php"; ?>
<div class="uk-section uk-container">
    <h2>Article managment</h2>
    <div class="uk-child-width-expand@s uk-text-center" uk-grid>
        <div>
            <div class="uk-card uk-card-default uk-card-body">Total number of words in all articles: <?php echo $stats['wordcount_sum'];   ?></div>
        </div>
        <div>
            <div class="uk-card uk-card-default uk-card-body">Total number of articles: <?php echo $stats['rowCount'];   ?> </div>
        </div>
    </div>
    <ul class="uk-subnav uk-subnav-pill" uk-switcher>
        <li><a href="#">New article</a></li>
        <li><a href="#">Manage article</a></li>
    </ul>

    <ul class="uk-switcher uk-margin">
        <li>
            <form class="article">
                <fieldset class="uk-fieldset">

                    <legend class="uk-legend">New article</legend>

                    <div class="uk-margin">
                        <input class="uk-input title" required='required' type="text" placeholder="Input">
                    </div>

                    <div class="uk-margin">
                        <textarea class="uk-textarea article-text" id="editor" rows="10" placeholder="Textarea"></textarea>
                    </div>

                    <div class="uk-margin uk-alert uk-alert-danger js-error" style='display: none;'></div>
                    <div class="uk-margin uk-alert uk-alert-success js-message" style='display: none;'></div>

                    <div class="uk-margin">
                        <button class="uk-button uk-button-default" type="submit">Post article</button>
                    </div>

                </fieldset>
            </form>
        </li>
        <li>
            <ul class="uk-list">
            <?php
            $arrValues = Article::getArticles();
            foreach ($arrValues as $article){
                echo  '<li><a href="/editarticle.php?article=',$article->article_id,'" uk-icon="icon: file-edit"></a>' ,  $article->title , '<a href="#" class="delete-article" article=',$article->article_id,' uk-icon="icon: trash"></a></li> <br>' ;

            }
            ?>
            </ul>
        </li>
    </ul>

    <?php require_once "inc/footer.php"; ?>

</div>

<?php require_once "inc/requereditor.php"; ?>

</body>
</html>
