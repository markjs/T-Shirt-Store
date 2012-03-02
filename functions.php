<?php

function get_css_file($file) {
  $path = "assets/css/".$file.".css";
  $link = '<link rel="stylesheet" href="'.$path.'">
';
  return $link;
}

function view_file($view) {
  return "views/".$view.".view.php";
}