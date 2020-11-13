<?php


define('__CONFIG__', true);


require_once "../inc/config.php";

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Always return JSON format
    // header('Content-Type: application/json');

    $return = [];

    $email = Filter::String( $_POST['email'] );

    // User exists
    $return[ User::changeEmail($email)] = true;


    echo json_encode($return, JSON_PRETTY_PRINT); exit;
} else {
    // Die. Kill the script. Redirect the user. Do something regardless.
    exit('Invalid URL');
}
?>
