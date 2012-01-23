<?php

$request = explode("/",trim(substr($_SERVER['REQUEST_URI'],strlen($base_request)),"/"));

// If the URL is not within subdirectories (eg. /foo not /foo/bar/baz)
if (count($request) == 1) {
	// Check the page is registered with an XML file
	$page_file = "pages/"."$request[0]".".xml";
	if (file_exists($page_file)) {	
		// Load the XML file	
		$page_xml = simplexml_load_file($page_file);
		// Save title from XML file into PHP variable
		$page_title = $page_xml->title;
		// Load relevant view
		include "views/".$page_xml->view;
	}
}