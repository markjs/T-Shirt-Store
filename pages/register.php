<?php



// Page rendering stuff

$title = "Register Now!";

$render_form = true;

if ($render_form) {
  include view_file("header");
  include view_file("register_form");
  include view_file("footer");
}