<?php

$email = mysql_real_escape_string($_POST['email']);
$password = mysql_real_escape_string($_POST['password']);
$password_confirm = mysql_real_escape_string($_POST['password_confirm']);

// Check that email address is valid
if (is_valid_email($email)) {
  
  // Check if passwords match and md5 if they do
  if ($password == $password_confirm) {
    $password_confirm = "";
    $password = md5($password);
    
    // Check if a user already exists with this email address
    $row = mysql_fetch_row(mysql_query("SELECT email FROM users WHERE email = $email"));
    if (!isset($row['email'])) {  
      // Create new user in database
      $query = mysql_query("INSERT INTO users (email, password) VALUES ('$email', '$password')");
      
    } else {
      // A user already exists with that email address
    }
  } else {
    // oh dear!
  }  
} else {
  // not valid email
}




// Page rendering stuff
$title = "Register Now!";
$render_form = true;

if ($render_form) {
  include get_view_file("header");
  include get_view_file("register_form");
  include get_view_file("footer");
}