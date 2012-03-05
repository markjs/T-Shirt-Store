<?php

$environment = "mamp";

switch ($environment) {
  case 'mamp':
    $base_request = "";
    $database = array(
      "name" => "tshirt_store",
      "user" => "root",
      "password" => "root",
      "host" => "localhost",
    );
    break;
  
  default:
    break;
}

connect_to_database($database);