<?php

include get_view_file('header');

if ($request_args[0]) {
	$product = mysql_fetch_object(mysql_query("SELECT * FROM products WHERE `slug` = '$request_args[0]' LIMIT 1"));
	if ($product) {
		include get_view_file('product_single');
	} else {
		// No product with that slug found
		$error_message = "Sorry, but that product could not be found&hellip;";
		include get_view_file('error');
	}
} else {
	// No product slug has been entered	
}

include get_view_file('footer');