<?php


ini_set('session.cookie_httponly', true);

session_start();

// looks if the user ip is saved
// if not, save.
if(isset($_SESSION['userip']) === false) {
	$_SESSION['userip'] = $_SERVER['REMOTE_ADDR'];

}

//if ip is wrong compared to server, destroy.
if ($_SESSION['userip'] !== $_SERVER['ROMTE_ADDR']){
	session_unset();
	session_destroy();
}


?>