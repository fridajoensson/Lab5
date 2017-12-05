<?php

$url = $_SERVER['REQUEST_URI'];

$strings = explode('/', $url);

$current_page = end($strings);

$dbname = 'library';
$dbuser = 'root';
$dbpass = 'root';
$dbserver = 'localhost';


?>