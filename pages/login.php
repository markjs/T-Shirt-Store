<?php

// Clear session if user wishes to log out
if ($request_args[0] == "out") {
	unset($_SESSION['valid_id']);
	unset($_SESSION['valid_email']);
	unset($_SESSION['valid_time']);
	header("Location:$base_url");
}

if ($_POST['email'] && $_POST['password']) {
	// Store entered email and encrypted password
	$email = mysql_real_escape_string($_POST['email']);
	$password = md5(mysql_real_escape_string($_POST['password']));
	
	// Check credentials against database
	$user_object = mysql_fetch_object(mysql_query(
		"SELECT * FROM users WHERE `email` = '$email' AND `password` = '$password' LIMIT 1"
		));
		
	if ($user_object) {
		// Set sessions if credentials match
		$_SESSION['valid_id'] = $user_object->id;
		$_SESSION['valid_email'] = $user_object->email;
		$_SESSION['valid_time'] = time();
	} else {
		// Login credentials incorrect
		echo "Your login credentials were incorrect";
	}
} else {
	// Didn't enter both email and password
}

if ($_SESSION['valid_id']) {
	if ($_SESSION['return_to']) {
		$location = $base_url."/".$_SESSION['return_to'];
		unset($_SESSION['return_to']);
		header("Location:$location");
	} else {
		echo "You are logged in as ".$_SESSION['valid_email'];	
		echo "<br><a href='/login/out'>Log out</a>";	
	}
} else {
	include get_view_file('login_form');
}