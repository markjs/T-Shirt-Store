<?php

function get_css_file($file) {
  $path = $base_url."/assets/css/".$file.".css";
  $link = '<link rel="stylesheet" href="'.$path.'">
';
  return $link;
}

function get_view_file($view) {
  return "views/".$view.".view.php";
}

function connect_to_database($db) {
  mysql_pconnect($db['host'], $db['user'], $db['password'])
  or die("Can't connect to database - ".mysql_error());
  mysql_select_db($db['name']);
}

function is_valid_email($email) {
  return eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email);
}

// These were both written with Alex Jegtnes (@jegtnes) for DSA
function isInUwe() {
    $currentUri = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	 
    //If you're currently in UWE
    if(stristr($currentUri,'cems.uwe.ac.uk')) {
        return true;
    }
    else return false;
}

function acquire_file($uri) {
	if (isInUwe() == true) {
		$context = stream_context_create(
		 //TODO: Use cURL
		 array('http'=>
			  array('proxy'=>'proxysg.uwe.ac.uk:8080',
					  'header'=>'Cache-Control: no-cache'
					 )
		  ));  

		 $contents = file_get_contents($uri,false,$context);
		 return $contents;
    }
    
    else{
		 return file_get_contents($uri);
    }
};