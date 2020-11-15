<?php


define('__CONFIG__', true);


require_once "../inc/config.php";

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Always return JSON format
    // header('Content-Type: application/json');
    $return = [];
    if (Page::IsLogedIn()){
        $articleId = $_POST['article_id'];
        $return = Article::removeArticle($articleId);
        $return['redirect'] = '/index.php';
    }else{
        $return['error']= "Not authorized to delete an article";
    }
    echo json_encode($return, JSON_PRETTY_PRINT); exit;
} else {
    // Die. Kill the script. Redirect the user. Do something regardless.
    exit('Invalid URL');
}
?>