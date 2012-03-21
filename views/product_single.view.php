		<section class="product">
			<h1><?php echo $product->title; ?></h1>
			<img src="<?php echo $base_url."/assets/images/products/".$product->image; ?>">
			<p><?php echo nl2br($product->description); ?></p>
			<p class="price"><?php echo $product->price; ?></p>
				<?php include get_view_file('size_form'); ?>
		</section>
