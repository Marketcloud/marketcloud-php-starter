<?php require('header.php'); ?>
<!-- Page Content -->
    <div class="container-fluid" >


    <?php if (count($cart->items) > 0) { ?>
        <div class="row">

            <div class="col-lg-8 col-lg-offset-2">
                <h3>Shopping cart</h3>
                <p>You have <?php echo count($cart->items); ?> items in your cart.</p>
                <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th colspan="2">Product</th>
                    <th>Quantity</th>
                    <th>Unit price</th>
                    <th colspan="2">Total</th>
                  </tr>
                </thead>
                <tbody>   
                <?php for ( $i=0; $i< count($cart->items); $i++) {
                    $item = $cart->items[$i];
                ?>
                  <tr> 
                    <td>
                        <a href="product.php?id=<?php echo  $item->id; ?>">
                            <img src="<?php echo  $item->images[0]; ?>" alt="<?php echo   $item->name ; ?>" style="width:32px;"></a></td>
                    <td>
                        <a href="product.php?id=<?php echo  $item->id; ?>"><?php echo  $item->name; ?></a>

                        <div>
                            <?php  if ($item->has_variants === true) {

                                    foreach ($product->variantsDefinition as $v_name => $v_values) { ?>
                                        <span class="label label-primary" style="margin-right:5px">
                                        <?php echo  $item->variant[$v_name] ?>
                                    </span>
                                    <?php } ?>
                            <?php } ?>
                            
                        </div>
                    </td>
                    <td>
                        <input type="number" 
                                id="<?php echo  "quantity_".$item->id."_".$item->variant_id; ?>"
                                class="form-control"
                                value="<?php echo  $item->quantity; ?>">
                    </td>
                    <td><?php echo   $item->price; ?></td>
                    <td>$0.00</td>
                    <td><?php echo  ($item->price * $item->quantity); ?></td>
                    <td><a href="#" class="btn btn-danger removeButton" data-product-id="<?php echo  $item->product_id; ?>" data-variant-id="<?php echo  $item->variant_id; ?>"><i class="fa fa-trash-o"></i></a></td>
                  </tr>
              <?php } ?>
                </tbody>
              </table>
            </div>

            <div class="row">
                <div class="col-xs-12 text-right">
                    <button class="btn btn-primary" id="updateCartButton">Update cart</button>
                    <a href="/checkout.php" class="btn btn-success btn-lg">Checkout</a>
                </div>
               
            </div>

                
                
            </div>

        </div>
    <?php } else { ?>
        <div class="row">
             <div class="col-lg-8 col-lg-offset-2">
                 <h4 style="text-align:center;">Your cart is empty :(</h4>
             </div>
        </div>
    <?php } ?>
    </div>
    <!-- /.container -->

    <div class="container">

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->
        <script type="text/javascript">
        var cart = <?php echo json_encode($cart) ?>;
        
        function updateCart() {
            var payload = [];
            cart.items.forEach(function(item){
                payload.push({
                    product_id : item.product_id,
                    variant_id : item.variant_id,
                    quantity : Number($("input#quantity_"+item.product_id+"_"+item.variant_id).val())
                })
            })
            marketcloud.carts.update(cart.id,payload,function(err,data){
                if (err)
                    alert("An error has occurred.")
                else
                    alert("Cart updated")
            })
        }

        $("#updateCartButton").click(updateCart);

        $(".removeButton").click(function(e){
            var btn = $(e.target);
            var product_id = btn.data('product-id');
            var variant_id = btn.data('variant-id');

            var payload = [{
                product_id : product_id,
                variant_id : variant_id
            }]
            
            marketcloud.carts.remove(cart.id,payload,function(err,data){
                if (err)
                    return alert("An error has occurred");
                alert("Cart updated");
                window.location.reload()

            })
        })
       
    </script>

<?php include("footer.php"); ?>