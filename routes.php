<?php

// Stores the URL request in $request
// Anything after the base URL goes in here as a string
$request = trim(substr($_SERVER['REQUEST_URI'],strlen($base_request)),"/");

// Redirect index.php back home, in case that's how the project is accessed by tutor
if ($request == "index.php") {
	header("Location:$base_url");
}

// Splits the URL into an array, $request_parts, on each instance of "/"
$request_parts = explode("/",$request);

// Map any HTTP GET parameters into $request_get array
// NOTE: This must be done before $request_page is set, to ensure the get parameters aren't included in it
// Checking if the last request part contains a "?", and therefore some get parameters, saves the position of those parameters into $request_get_position
$request_get_position = strpos($request_parts[count($request_parts)-1],"?");
if ($request_get_position !== false) {
	// Map those get parameters into the $request_get array
	parse_str(substr($request_parts[count($request_parts)-1],$request_get_position+1),$request_get);
	// Alters the last part of the $request_parts array to no longer contain the get parameters
	$request_parts[count($request_parts)-1] = current(explode("?",$request_parts[count($request_parts)-1]));
}

// Saves the first part of the request into $request_page
$request_page = $request_parts[0];

// Map extra URL parts into a $request_args array
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