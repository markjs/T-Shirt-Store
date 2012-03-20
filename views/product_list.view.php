		<li class="product">
			<h1><a href="<?php echo $base_url."/products/".$product->slug; ?>"><?php echo $product->title; ?></a></h1>
			<img src="<?php echo $base_url."/assets/images/products/".$product->image; ?>">
			<p class="price"><?php echo $product->price; ?></p>
		</li>
