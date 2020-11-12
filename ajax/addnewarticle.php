<?php


define('__CONFIG__', true);


require_once "../inc/config.php";

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Always return JSON format
    // header('Content-Type: application/json');

    $return = [];

    $title = Filter::String( $_POST['title'] );

    $articleText = Filter::String($_POST['articleText']);

    if(strlen ($articleText) > 0 && strlen ($title)> 0 ) {
        // Not empty strings


        $addArticle = $con->prepare("INSERT INTO articles(title, article_text) VALUES(:title, :article_text)");
        $addArticle->bindParam(':title', $title, PDO::PARAM_STR);
        $addArticle->bindParam(':article_text', $articleText, PDO::PARAM_STR);
        $addArticle->execute();

        $articleId = $con->lastInsertId();
//
//        $_SESSION['user_id'] = (int) $user_id;

        //$return['redirect'] = '/dashboard.php?message=welcome';
        //$return['is_logged_in'] = true;
        $return['article_id'] = $addArticle;
        $return['done']= "Article added";
    } else{
        $return['error']= "Can't be emty title or article field";
    }

    echo json_encode($return, JSON_PRETTY_PRINT); exit;
} else {
    // Die. Kill the script. Redirect the user. Do something regardless.
    exit('Invalid URL');
}
?>
