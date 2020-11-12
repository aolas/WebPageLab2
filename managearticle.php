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
    <h2>Article managment</h2>
    <p>Hello <?php echo $User->email; ?>, you registered at <?php echo $User->reg_time; ?></p>
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

</div>

<?php require_once "inc/footer.php"; ?>
</body>
</html>
