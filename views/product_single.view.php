		<section class="product">
			<h1><?php echo $product->title; ?></h1>
			<img src="<?php echo $base_url."/assets/images/products/".$product->image; ?>">
			<p><?php echo nl2br($product->description); ?></p>
			<p class="price"><?php echo $product->price; ?></p>
			<button type="button">Buy now!</button>
		</section>
