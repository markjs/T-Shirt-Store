<section class="cart-full">
	<?php 
	if ($_SESSION['valid_id']) {
		echo "You are logged in as <a href='$base_url/login'>".$_SESSION['valid_email']."</a>";	
	} else {
		echo "<a href='$base_url/login'>Log in</a>";
	}
	?>
<?php if ($_SESSION['cart']) {
	$cart = $_SESSION['cart'];
	include get_view_file('cart');
} else { ?>
	<p>Your cart is currently empty</p>
<?php } ?>
</section>