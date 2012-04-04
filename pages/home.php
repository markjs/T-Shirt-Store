<?php

$title = "T-Shirt Store";

include get_view_file('header');

?>

<section class="categories">
	<h1>Filter by Category</h1>
	<ul>
	<?php 
	$result = mysql_query("SELECT * FROM categories");
	while ($row = mysql_fetch_array($result)) {
		$category = (object) $row;
		include get_view_file('category_list');
	}
	?>
	</ul>
</section>

<section class="search">
	<h1>Search</h1>
	<form action="<?php echo $base_url; ?>/search" method="get">
		<input type="search" name="s" placeholder="eg. Red">
	</form>
</section>


<section class="all">
	<h1>All Products</h1>
	<ul>
	<?php
	$result = mysql_query("SELECT * FROM products");
	while ($row = mysql_fetch_array($result)) {
		$product = (object) $row;
		include get_view_file('product_list');
	}
	?>
	</ul>
</section>

<?php include get_view_file('cart_full'); ?>