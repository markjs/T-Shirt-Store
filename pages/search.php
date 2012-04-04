<?php

$search_query = mysql_real_escape_string($request_get['s']);

$request = mysql_query("SELECT * FROM `products` WHERE `title` LIKE '%$search_query%'");

include get_view_file('header');

while ($row = mysql_fetch_array($request)) {
	$product = (object) $row;
	include get_view_file('product_list');
}
include get_view_file('cart_full');