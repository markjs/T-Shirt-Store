<?php

if ($request_args[0] == "add") {
	// Save posted product and size
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
			$_SESSION['cart'] = $cart;
			
			// Create cart-item
			$request = mysql_query("INSERT INTO `cart-items` (`cart`,`product`,`size`,`quantity`) VALUES ('$cart','$product','$size','1')");
		}
		header("Location:$base_url");
	} else {
		// Product or size not set
	}
} else if ($request_args[0] == "show") {
	// Show the cart and return home
	$cart = $_SESSION['cart'];
	include get_view_file('cart');
} else if ($request_args[0] == "quantity") {
	// Update the quantity
	$cart_item = mysql_real_escape_string($_POST['cart-item-id']);
	$quantity = mysql_real_escape_string($_POST['quantity']);
	if ($cart_item != "" && $quantity != "") {
		if ($quantity <= "0") {
			// Delete cart item if quantity set to 0 (or negative)
			$request = mysql_query("DELETE FROM `cart-items` WHERE `id` = '$cart_item'");
		} else {
			// Set quantity to value entered
			$request = mysql_query("UPDATE `cart-items` SET `quantity` = '$quantity' WHERE `id` = '$cart_item'");
		}
		header("Location:$base_url");
	}
}