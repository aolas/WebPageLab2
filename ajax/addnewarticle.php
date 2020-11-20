<?php


define('__CONFIG__', true);


require_once "../inc/config.php";

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Always return JSON format
    // header('Content-Type: application/json');

    $return = [];
    $title = Filter::String( $_POST['title'] );
    //$articleText = Filter::String($_POST['articleText']);
    $articleText = $_POST['articleText'];
    $userId = Page::currentUser();

    if(strlen ($articleText) > 0 && strlen ($title)> 0 ) {
        // Not empty strings
        $wordcount = count(preg_split('~[^\p{L}\p{N}\']+~u',$articleText));

        $addArticle = $con->prepare("INSERT INTO articles(title, article_text,wordcount, user_id) VALUES(:title, :article_text,:wordcount, :user_id)");
        $addArticle->bindParam(':title', $title, PDO::PARAM_STR);
        $addArticle->bindParam(':article_text', $articleText, PDO::PARAM_STR);
        $addArticle->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $addArticle->bindParam(':wordcount', $wordcount, PDO::PARAM_INT);
        $addArticle->execute();

        $articleId = $con->lastInsertId();

        $return['status']= "Article added";
    } else{
        $return['error']= "Can't be emty title or article field";
    }

    echo json_encode($return, JSON_PRETTY_PRINT); exit;
} else {
    // Die. Kill the script. Redirect the user. Do something regardless.
    exit('Invalid URL');
}
?>
