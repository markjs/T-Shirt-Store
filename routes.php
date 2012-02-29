<?php

$request = trim(substr($_SERVER['REQUEST_URI'],strlen($base_request)),"/");

// Exception to match / to home page (index);
if ($request == "") {
	$request = "homepage";
}

// Check the page exists with a PHP file
$page_file = "pages/".$request.".php";
if (!file_exists($page_file)) {	
	$page_file = "pages/404.php";
}

// Load the page's PHP file	
require $page_file;

// Load relevant view
require "views/".$view.".view.php";