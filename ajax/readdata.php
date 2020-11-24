<?php


define('__CONFIG__', true);


require_once "../inc/config.php";

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Always return JSON format
    // header('Content-Type: application/json');
    $return = [];
    $myfile = fopen("newfile.txt", "r") or die("Unable to open file!");
    $return["file"] =  fread($myfile,filesize("newfile.txt"));
    fclose($myfile);
    if(isset($_COOKIE["My-personal-cookie"])) {
        $return["cookie"] =  "Cookie My-personal-cookie is set!<br> Value is: " . $_COOKIE["My-personal-cookie"];

    } else {
        $return["cookie"] = "Cookie named  My-personal-cookie  is not set!";
    }
    $return["status"] = "ok";

    echo json_encode($return, JSON_PRETTY_PRINT); exit;
} else {
    // Die. Kill the script. Redirect the user. Do something regardless.
    exit('Invalid URL');
}
?>
