<?php

// Allow the config
define('__CONFIG__', true);
// Require the config
require_once "inc/config.php";

Page::ForceLogin();

$User = new User($_SESSION['user_id']);

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
    <p>Hello <?php echo $User->email; ?>, you registered at <?php echo $User->reg_time; ?></p>
    <ul class="uk-subnav uk-subnav-pill" uk-switcher>
        <li><a href="#">New article</a></li>
        <li><a href="#">Edit article</a></li>
        <li><a href="#">Delete article</a></li>
    </ul>

    <ul class="uk-switcher uk-margin">
        <li>
            <form class="article">
                <fieldset class="uk-fieldset">

                    <legend class="uk-legend">Legend</legend>

                    <div class="uk-margin">
                        <input class="uk-input title" required='required' type="text" placeholder="Input">
                    </div>

                    <div class="uk-margin">
                        <textarea class="uk-textarea article-text" required='required' rows="10" placeholder="Textarea"></textarea>
                    </div>

                    <div class="uk-margin uk-alert uk-alert-danger js-error" style='display: none;'></div>

                    <div class="uk-margin">
                        <button class="uk-button uk-button-default" type="submit">Post article</button>
                    </div>

                </fieldset>
            </form>
        </li>
        <li>
            <form class="update-article">
                <fieldset class="uk-fieldset">

                    <legend class="uk-legend">Legend</legend>

                    <div class="uk-margin">
                        <input class="uk-input title" required='required' type="text" placeholder="Input">
                    </div>

                    <div class="uk-margin">
                        <textarea class="uk-textarea article-text" required='required' rows="10" placeholder="Textarea"></textarea>
                    </div>

                    <div class="uk-margin uk-alert uk-alert-danger js-error" style='display: none;'></div>

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
            foreach ($arrValues as $row){
                echo  '<li>' ,  $row['title'] , "</li> <br>" ;

            }
            ?>
            </ul>
        </li>
    </ul>


</div>

<?php require_once "inc/footer.php"; ?>
</body>
</html>
