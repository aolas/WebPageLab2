<?php

// Allow the config
define('__CONFIG__', true);
// Require the config
require_once "inc/config.php";

Page::ForceLogin();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    require_once "inc/head.php";
    ?>

    <title>Edit article</title>

</head>

<body>
<?php require_once "inc/navbar.php"; ?>
<div class="uk-section uk-container">
    <?php

    if( $_GET["article"] ) {

        $article = new Article($_GET["article"]);
        if($article){
            echo '
            <form class="edit-article" article_id="',$article->article_id,'">
                <fieldset class="uk-fieldset">

                    <legend class="uk-legend">New article</legend>

                        <div class="uk-margin">
                            <input class="uk-input title" required="required" value="',$article->title ,'" type="text" placeholder="Input">
                        </div>

                        <div class="uk-margin">
                            <textarea class="uk-textarea article-text" required="required" rows="10" placeholder="Textarea">',$article->article_text,'</textarea>
                        </div>

                        <div class="uk-margin uk-alert uk-alert-danger js-error" style="display: none;"></div>
                        <div class="uk-margin uk-alert uk-alert-success js-message" style="display: none;"></div>

                        <div class="uk-margin">
                            <button class="uk-button uk-button-default" type="submit">Update article</button>
                        </div>
                  </fieldset>
            </form>
            ';
        }
    }
    ?>





</div>
<?php require_once "inc/footer.php"; ?>
</body>
</html>
