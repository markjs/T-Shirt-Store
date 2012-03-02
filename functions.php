<?php

function get_css_file($file) {
  $path = "assets/css/".$file.".css";
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