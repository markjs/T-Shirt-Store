<?php

$request = trim(substr($_SERVER['REQUEST_URI'],strlen($base_request)),"/");

// Check the page is registered with an XML file
$page_file = "pages/".$request.".xml";
if (file_exists($page_file)) {	
	// Load the XML file	
	$page_xml = simplexml_load_file($page_file);
	// Save title from XML file into PHP variable
	$page_title = $page_xml->title;
	// Load relevant view
	include "views/".$page_xml->view;
}