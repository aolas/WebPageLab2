<?php


define('__CONFIG__', true);


require_once "../inc/config.php";

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Always return JSON format
    // header('Content-Type: application/json');

    $return = [];
    if ($_POST['option'] == 1){
        $return = Article::getByUserArticles($_POST['user_id']);
    } else{
        $return = Comment::getCommentsByuser($_POST['user_id'] );
    }
    //$return = Comment::generateReport($_POST['user_id'] );
    echo json_encode($return, JSON_PRETTY_PRINT); exit;
} else {
    // Die. Kill the script. Redirect the user. Do something regardless.
    exit('Invalid URL');
}
?>