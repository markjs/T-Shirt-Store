<?php

// Stores the URL request in $request
// Anything after the base URL goes in here as a string
$request = trim(substr($_SERVER['REQUEST_URI'],strlen($base_request)),"/");

// Map extra URL parameters into an $args array
$request_parts = explode("/",$request);
$request_page = $request_parts[0];
$request_args = array_slice($request_parts,1);

// Exception to match / to home page (index);
if ($request == "") {
	$request_page = "home";
}

// Check the page exists with a PHP file
$page_file = "pages/".$request_page.".php";
if (!file_exists($page_file)) {	
	$page_file = "pages/404.php";
}

// Load the page's PHP file	
include $page_file;