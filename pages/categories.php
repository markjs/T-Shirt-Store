<?php

if ($request_args[0]) {
	$request_cat = mysql_real_escape_string($request_args[0]);
		
	$result = mysql_query("SELECT * FROM categories WHERE `slug` = '$request_cat' LIMIT 1");
	
	$category = mysql_fetch_object($result);
	if ($category) {
		$title = "T-Shirt Store - ".$category->title;
		include get_view_file('header');
		
		$result = mysql_query("SELECT * FROM products WHERE `category` = '$category->id'");
		while ($row = mysql_fetch_array($result)) {
			$product = (object) $row;
			include get_view_file('product_list');
		}
		include get_view_file('cart_full');
	} else {
		// No category with that slug found
		$error_message = "Sorry, but that category could not be found&hellip;";
		include get_view_file('error');
	}
} else {
	// No category slug has been entered
	$result = mysql_query("SELECT * FROM categories");
	$title = "T-Shirt Store - Categories";
	include get_view_file('header');
	
	while ($row = mysql_fetch_array($result)) {
		$category = (object) $row;
		include get_view_file('category_list');
	}	
	include get_view_file('cart_full');
}

include get_view_file('footer');