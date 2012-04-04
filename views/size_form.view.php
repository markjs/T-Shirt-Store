			<form method="post" action="<?php echo $base_url; ?>/cart/add">
				<input type="hidden" name="product" value="<?php echo $product->id; ?>">
			
			<?php
			// Getting stock values for current product
			$result = mysql_query("SELECT * FROM `size-stock` WHERE `product` = '$product->id'");
			
			while ($row = mysql_fetch_array($result)) {
				$size_stock = (object) $row;
				$new_result = mysql_query("SELECT * FROM `sizes` WHERE `id` = '$size_stock->size' LIMIT 1");
				$size = mysql_fetch_object($new_result);
				
				if ($size_stock->stock) {
					// Adding an <option> element if the product is in stock in this size
					$options .= '<option value="'.$size->id.'">'.$size->title.' ('.$size_stock->stock.' in stock)</option>';
				}
			}
			
			// Printing out options if they're in stock, or an out of stock message if not
			if ($options) {
				echo '<select name="size">';
				echo $options;
				echo '</select>';
			} else {
				$out_of_stock = true;
				echo "Out of stock!";
			}
						
			?>
			<?php if (!$out_of_stock) { ?>
				<input type="submit" value="Add to cart!">
			<?php } ?>
			</form>