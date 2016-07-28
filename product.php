<?php require('header.php'); ?>
<?php 
	$product = Marketcloud\Products::getById($_GET["id"]);
	$product = $product->body->data;

?>

    <!-- Page Content -->
    <div class="container-fluid">
    
    <div class="row">
        <div class="col-xs-12 col-md-8 col-md-offset-2">
            <h2><?php echo  $product->name ?></h2>
        </div>
    </div>
    <div class="row">

            <div class="col-md-4 col-md-offset-2">
                <div class="thumbnail">
                    <?php  if (isset($product->images)) { ?>
                            <img src="<?php echo  $product->images[0]; ?>" alt="" style="max-width:100%;">
                            <?php  } else { ?>
                                <img src="https://placeholdit.imgix.net/~text?txtsize=33&txt=200%C3%97200&w=400&h=800" alt="" style="max-width:100%;">
                    <?php  } ?>
                </div>
                <div class="product-thumbnails row">
                    <?php  for ($i=0; $i< $product->images.length; $i++): ?>
                    <div class="col-xs-4">
                        <div class="thumbnail">
                            <img src="<?php echo  $product->images[$i] ?>" alt="" style="max-width:100%;">
                        </div>
                    </div>
                    <?php  endfor; ?>
                </div>
            </div>

            <div class="col-md-4">

                <div class="product-controls">
                    <div class="price text-center">€ <?php echo  $product->price; ?></div>
                    <?php  foreach ($product->variantsDefinition as $v_name => $v_values) { ?>
                        <div><b><?php echo  $v_name; ?></b></div>
                        <div class="form-group">
                        <select class="form-control" id="variant_<?php echo  $v_name ?>">
                            <?php  for($i=0; $i< count($v_values);$i++) { ?>
                            <option value="<?php echo  $v_values[$i]; ?>"><?php echo  $v_values[$i]; ?></option>
                        <?php  } ?>
                        </select>
                        </div>
                    <?php  } ?>
                    <button class="btn btn-block btn-success" id="addToCartButton">Add to cart</button>
                </div>

                
                

            </div>


        </div>
        <div class="row">
            <div class="col-xs-12 col-md-4 col-md-offset-2">
                <h3>Description</h3>
                <?php  if ($product->description) { ?>
                <div><?php echo  $product->description ?></div>
                <?php } else {?>
                <div>No description available</div>
                <?php }?>
            </div>
            <div class="col-md-4">
                <div class="table-responsive">
                    <table class="table">
                    <thead>
                        <tr><th>Attribute</th><th>Value</th></tr>
                    </thead>
                    <tbody>
                        <?php  foreach ($product as $prop_name =>$prop_value) { 
                            $unwanted = array(
                            'id',
                            'product_id',
                            'stock_type',
                            'stock_level',
                            'variant_id',
                            'display_price',
                            'price',
                            'name'
                            );
                            if (in_array($prop_name, $unwanted)) {
                        ?>
                        <tr>
                        	<td><?php echo  $prop_name; ?></td>
                        	<td><?php echo  $prop_value; ?></td>
                        </tr>
                        <?php  }
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

<script type="text/javascript">
	
	

</script>


<script type="text/javascript">
	var product = <?php echo json_encode($product); ?>;
	var cart = <?php echo json_encode($cart); ?>;



	function addToCart() {
		var payload = {
			product_id: product.id,
			quantity: 1
		}
		var btn = $("#addToCartButton");
		btn.attr("disabled","disabled")

		btn.html("Adding to cart")
		
		if (product.has_variants) {
			
			payload.options = {};

			for (var variant_name in product.variantsDefinition) {
				var value = $("select#variant_" + variant_name).val();
				payload.options[variant_name] = value;
			}
		}

		console.log("Sending this cart request",payload)
		
		// Chiamata al backend
		marketcloud.carts.add(cart.id, [payload], function(err, data) {
			if (err) {
				console.log(err)
				alert("An error has occurred");
			} else{
				alert("Item added to cart")
				location.reload()
			}
		})
	}


	$(document).ready(function(){
        $("#addToCartButton").click(addToCart)
    })

</script>
<?php require('footer.php'); ?>