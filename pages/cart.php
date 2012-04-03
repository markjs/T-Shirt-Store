<?php

if ($request_args[0] == "add") {
	$product = mysql_real_escape_string($_POST['product']);
	$size = mysql_real_escape_string($_POST['size']);
	
	if ($product != "" && $size != "") {
		if ($_SESSION['cart']) {
			// There is a cart stored in sessions
			
			// Find out if this product and size is already in the cart
			$cart = $_SESSION['cart'];
			$result = mysql_query("SELECT * FROM `cart-items` WHERE `cart` = '$cart' AND `product` = '$product' AND `size` = '$size' LIMIT 1");
			$object = mysql_fetch_object($result);
			if ($object) {
				// There is already an item of this, update the quantity
				
				// Increase quantity of cart item
				$new_quantity = $object->quantity + 1;
				$request = mysql_query("UPDATE `cart-items` SET `quantity` = '$new_quantity' WHERE `id` = '$object->id'");
			} else {
				// This item isn't yet in the cart
				
				// Create new cart item
				$request = mysql_query("INSERT INTO `cart-items` (`cart`,`product`,`size`,`quantity`) VALUES ('$cart','$product','$size','1')");
			}
		} else {
			// No cart is currently stored in sessions
			
			// Check if you're logged in
			if ($_SESSION['valid_id']) {
				$user_id = $_SESSION['valid_id'];
			} else {
				$user_id = 0;
			}
			// Create a cart
			$request = mysql_query("INSERT INTO `carts` (`user`) VALUES ($user_id)");
			$cart = mysql_insert_id();
			var_dump($cart);
			$_SESSION['cart'] = $cart;
			
			// Create cart-item
			$request = mysql_query("INSERT INTO `cart-items` (`cart`,`product`,`size`,`quantity`) VALUES ('$cart','$product','$size','1')");
		}
	} else {
		// Product or size not set
	}
}