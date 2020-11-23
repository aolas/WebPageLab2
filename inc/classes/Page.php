<?php

// If there is no constant defined called __CONFIG__, do not load this file 
if(!defined('__CONFIG__')) {
	exit('You do not have a config file');
}

class Page {
	
	// Force the user to be logged in, or redirect. 
	static function ForceLogin() {
		if(isset($_SESSION['user_id'])) {
			// The user is allowed here  
		} else {
			// The user is not allowed here. 
			header("Location: /login.php"); exit;
		}
	}

	static function ForceDashboard() {
		if(isset($_SESSION['user_id'])) {
			// The user is allowed here but redirect anyway 
			header("Location: /dashboard.php"); exit;
		} else {
			// The user is not allowed here. 
		}
	}
	static function IsLogedIn(){
		if (isset($_SESSION['user_id'])){
			return true;
		} else{
			return false;
		}
	}
	static function currentUser(){
		if (isset($_SESSION['user_id'])){
			return Filter::Int($_SESSION['user_id']);
		}
	}
	static function getEncrypOptions(){
		$options = [
			'cost' => 12,
		];
		return $options;
	}
	static function readFile(){
		$myfile = fopen("newfile.txt", "r") or die("Unable to open file!");
		$data = fread($myfile,filesize("newfile.txt"));
		fclose($myfile);
		return $data;
	}
}


?>
