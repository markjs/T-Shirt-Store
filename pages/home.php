<?php

$title = "T-Shirt Store";

include get_view_file('header');

?>

<section class="categories">
	<h1>Filter by Category</h1>
	<?php 
	$result = mysql_query("SELECT * FROM categories");
	while ($row = mysql_fetch_array($result)) {
		$category = (object) $row;
		include get_view_file('category_list');
	}
	?>
</section>


<section class="all">
	<h1>All Products</h1>
	<?php
	$result = mysql_query("SELECT * FROM products");
	while ($row = mysql_fetch_array($result)) {
		$product = (object) $row;
		include get_view_file('product_list');
	}
	?>
</section>

<?php include get_view_file('cart_full'); ?>