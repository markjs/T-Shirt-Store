<?php

$email = mysql_real_escape_string($_POST['email']);
$password = mysql_real_escape_string($_POST['password']);
$password_confirm = mysql_real_escape_string($_POST['password_confirm']);
$address = mysql_real_escape_string($_POST['address']);

if (!$_SESSION['valid_id']) {
	// Check that email address is valid
	if (is_valid_email($email)) {
  
	  // Check if passwords match and md5 if they do
	  if ($password == $password_confirm) {
	    $password_confirm = "";
	    $password = md5($password);
    
			// Check an address is specified
			// Realistically, this should provide much more validation, but that's not important right now
			if ($address != "") {
		    // Check if a user already exists with this email address
		    $row = mysql_fetch_row(mysql_query("SELECT email FROM users WHERE email = $email"));
		    if (!isset($row['email'])) {  
		      // Create new user in database
		      $query = mysql_query("INSERT INTO users (email, password) VALUES ('$email', '$password')");
	
					$_SESSION['flash'] = "Registration successful, please log in.";
					header("Location:$base_url/login");
      
		    } else {
		      // A user already exists with that email address
					echo "A user already exists with that email address.";
		    }
			} else {
				// No address specified
			}
	  } else {
	    // Passwords did not match
	  }  
	} else {
	  // Not a valid email address
	}
} else {
	// You are already logged in
	header("Location:$base_url/login");
}



// Page rendering stuff
$title = "Register Now!";
$render_form = true;

if ($render_form) {
  include get_view_file("header");
  include get_view_file("register_form");
  include get_view_file("footer");
}