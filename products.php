<?php require('header.php'); ?>
<?php
	$products = Marketcloud\Products::get($_GET);
	$categories = Marketcloud\Categories::get();
	$categories = $categories->body->data;
 ?>
		<div class="container-fluid slidethankyou shop-container">
			<div class="text_box white centered txt_center">
				<h2 class="yellow">Merchandising</h2>
				
			</div>

			<div class="row" style="margin-top:50px;margin-bottom:50px;">
				<div class="col-lg-8 col-lg-offset-2">
					<?php require('embedded_cart.php'); ?>
				</div>
			</div>
				
				<div class="row" style="margin-bottom:50px;">
					<div class="col-lg-8 col-lg-offset-2" id="categories_container">
				<?php foreach ($categories as $category): ?>
					<div class="col-md-2 col-xs-4" style="margin-bottom:20px;">
						<a class="category_link" href="<?php echo "index.php?category_id=".$category->id; ?>"><?php echo $category->name; ?></a>
					</div>

				<?php endforeach; ?>
				</div>
				</div>
				<div class="row">
					<div class="col-lg-8 col-lg-offset-2" id="products_container">
						<!-- product -->
						
						<?php foreach ($products->body->data as $product): ?>
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
							<a class="thumbnail product" href="product.php?id=<?php echo $product->id; ?>">
								<!-- <img src="<?php echo $product->images[0]; ?>" style="height:200px;"> -->
								<div class="product_image" style="background-image:url(<?php echo $product->images[0]; ?>)"></div>
								<div class="text-center">
									<p><div class="product_name"><?php echo $product->name; ?></div></p>
									<p>€ <?php echo $product->price; ?></p>
								</div>
							</a>
						</div>
						<?php endforeach; ?>
						<!-- end product -->
					</div>
				</div>
				
			</div>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../bower_components/marketcloud-js/dist/marketcloud.min.js"></script>
<script type="text/javascript">
	
	var cart = <?php echo json_encode($cart); ?>;

</script>
<script type="text/javascript" src="/js/shop.js"></script>
<?php require("footer.php"); ?>