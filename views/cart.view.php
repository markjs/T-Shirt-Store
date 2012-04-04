		<?php 
		// Get all cart items from the database
		$request = mysql_query("SELECT * FROM `cart-items` WHERE `cart` = '$cart'"); ?>
		<section class="cart">
			<h1>Cart</h1>
			<table>
				<thead>
					<th>Product</th>
					<th>Size</th>
					<th>Price</th>
					<th>Quantity</th>
					<th>Total Price</th>
				</thead>
			<?php while ($row = mysql_fetch_array($request)) { 
				$item = (object) $row;
				
				// Get the product object for this product
				$result = mysql_query("SELECT * FROM `products` WHERE `id` = '$item->product'");
				$product = mysql_fetch_object($result);
				
				// Get the size object for this product
				$result = mysql_query("SELECT * FROM `sizes` WHERE `id` = '$item->size'");
				$size = mysql_fetch_object($result);
			?>
				<tr>
					<td><a href="<?php echo $base_url."/products/".$product->slug; ?>"><?php echo $product->title; ?></a></td>
					<td><?php echo $size->title; ?></td>
					<td><?php echo $product->price; ?></td>
					<td>
						<form action="/cart/quantity" method="post">
							<input type="hidden" name="cart-item-id" value="<?php echo $item->id; ?>">
							<input type="number" name="quantity" value="<?php echo $item->quantity; ?>">
							<input type="submit" name="submit" value="Update Quantity">
						</form>
					</td>
					<td><?php echo $product->price * $item->quantity; ?></td>
				</tr>
			<?php 
				$total_price += $product->price * $item->quantity;
			} ?>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td>Total</td>
					<td><?php echo $total_price; $_SESSION['total_price'] = $total_price; ?></td>
				</tr>
			</table>
			<a href="/checkout">Proceed to checkout &rarr;</a>
		</section>
		