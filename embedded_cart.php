
					<a data-toggle="collapse" href="#cartContainer" aria-expanded="false" class="btn btn-primary btn-lg">
					
					<span class="glyphicon glyphicon-shopping-cart"></span> Shopping cart (<?php echo count($cart->items); ?>)
					
					</a>
					
					<!-- product -->
					<div class="collapse" id="cartContainer">
						<table class="table">
							<thead>
								<tr>
									<th>Product</th>
									<th></th>
									<th>Quantity</th>
									<th>Total</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($cart->items as $item): ?>
								<tr>
									<td>
										<div><?php echo $item->name; ?></div>
										<?php if ($item->has_variants == true): ?>
										<?php foreach ($item->variantsDefinition as $v_name => $v_values): ?>
										<div class="label label-warning"><?php echo $item->variant->$v_name; ?></div>
										<?php endforeach; ?>
										<?php endif; ?>
										<div>
											<?php if ($item->has_variants): ?>
											<a href="#" class="removeFromCart" data-productid="<?php echo $item->id; ?>" data-variantid="<?php echo $item->variant_id; ?>">Remove</a>
											<?php else: ?>
											<a href="#" class="removeFromCart" data-productid="<?php echo $item->id; ?>">Remove</a>
											<?php endif; ?>
										</div>
									</td>
									<td><img src="<?php echo $item->images[0]; ?>" style="max-height:64px;max-width:64px;" /></td>
									<td class="quantity">
										<span class="fixedQuantity"><?php echo $item->quantity; ?></span>
										<div class="editQuantity">
											
										</div>
										
									</td>
									<td>€ <?php echo ($item->quantity * $item->price); ?></td>
								</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
						<div>
						<?php if (count($cart->items) > 0): ?>
						<a href="/it/checkout.php" class="btn btn-lg btn-warning">
							CHECKOUT
						</a>
					<?php endif; ?>
					</div>
					</div> <!-- collapsse-->