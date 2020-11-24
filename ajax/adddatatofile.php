<?php
define('__CONFIG__', true);
require_once "../inc/config.php";

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Always return JSON format
    // header('Content-Type: application/json');
    $return = [];

    $myfile = fopen("newfile.txt", "a") or die("Unable to open file!");
    $txt = "Today is " . date("Y/m/d H:i:s") . "<br>";;
    fwrite($myfile, $txt);
    fclose($myfile);
    $return["status"] = "Data was written to file: ". date("Y/m/d H:i:s");

    echo json_encode($return, JSON_PRETTY_PRINT); exit;
} else {
    // Die. Kill the script. Redirect the user. Do something regardless.
    exit('Invalid URL');
}
?>
