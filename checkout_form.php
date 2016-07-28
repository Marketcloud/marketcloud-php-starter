<?php require('header.php'); ?>

<?php

// Incluso da checkout.php
$total_cart_value = 0;
foreach ($cart->items as $cart_item) {
    $total_cart_value += $cart_item->price * $cart_item->quantity;
}
$shippings = Marketcloud\Shippings::get(array("value" => $total_cart_value));
$shippings = $shippings->body->data;

?>






<div class="container-fluid" >
    
    <?php if ($error_message){ ?>
    <div class="row">
        
        <div class="col-xs-12">
            <div class="alert alert-danger"><?php echo  $error_message; ?></div>
        </div>
    </div>
    <?php } ?>
    <div class="row">
        <div class="col-lg-4 col-md-6">
            
            <div class="panel panel-primary">
                <div class="panel-heading">Name and address</div>
                <div class="panel-body">
                    
                    <div class="form">
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="email"
                            class="form-control"
                            name="email_address"
                            placeholder="john.doe@example.com"
                            id="address_email">
                        </div>
                        <div class="form-group">
                            <label>Full name</label>
                            <input type="text"
                            class="form-control"
                            name="full_name"
                            placeholder="John Doe"
                            id="address_full_name">
                        </div>
                        
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text"
                            class="form-control"
                            name="address"
                            placeholder="Fake Street 123"
                            id="address_address1">
                        </div>
                        <div class="row">
                            <div class="form-group col-xs-6">
                                <label>Country</label>
                                <input type="text" class="form-control" name="country" placeholder="Italy" id="address_country">
                            </div>
                            <div class="form-group col-xs-6">
                                <label>State/Province</label>
                                <input type="text" class="form-control" name="state" placeholder="Marche" id="address_state">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-xs-6">
                                <label>City</label>
                                <input type="text" class="form-control" name="city" placeholder="Rome" id="address_city">
                            </div>
                            <div class="form-group col-xs-6">
                                <label>ZIP / Postal code</label>
                                <input type="text" class="form-control" name="postal_code" id="address_postal_code">
                            </div>
                        </div>
                        <div class="chekbox">
                            <label>
                                <input type="checkbox" name="ship_to_this_address"> Ship to this address
                            </label>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">Order review</div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th colspan="2">Product</th>
                                    <th>Qty</th>
                                    <th>Unit price</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php for ($i =0; $i< count($cart->items); $i++) {
                                    $item = $cart->items[$i];
                                ?>
                                    <tr>
                                    <td><a href="detail.html">
                                        <?php if ($item->images){ ?>
                                        <img src="<?php echo  $item->images[0]; ?>" alt="" style="max-width:100%;max-height:64px;">
                                        <?php } else{ ?>
                                        <img src="https://placeholdit.imgix.net/~text?txtsize=33&txt=200%C3%97200&w=400&h=800" alt="" style="max-width:100%;max-height:64px;">
                                        <?php } ?>
                                    </a></td>
                                    <td><a href="detail.html"><?php echo  $item->name; ?></a></td>
                                    <td><?php echo  $item->quantity; ?></td>
                                    <td><?php echo   $item->price;  ?></td>
                                    
                                </tr>
                                <?php }; ?>
                               
                                
                             
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">Shipping method</div>
                <div class="panel-body">
                    <?php for ($i=0; $i< count($shippings); $i++) {
                        
                        $shipping = $shippings[$i];
                    ?>
                    <div class="radio">
                        <label>
                            <input type="radio"
                            name="shippingMethod"
                            value="<?php echo  $shipping->id; ?>"
                            id="selected_shipping_method_id">
                            <?php echo  $shipping->name; ?> <b> + $ <?php echo  $shipping->base_cost;  ?></b>
                        </label>
                        <div></div>
                    </div>
                    <?php }; ?>
                </div>
            </div>
            <div class="panel panel-primary">
                <div class="panel-heading">Payment informations</div>
                <div class="panel-body">
                   
                        <form id="checkout" class="form">
                          <div id="payment-form"></div>
                         <input type="submit" id="braintree_button" class="btn btn-lg btn-primary" value="Complete checkout">
                        </form>
            </div>
            
            
        </div>
        
        <script>
        </script>
    </div>
</div>
</div>

<script src="https://js.braintreegateway.com/js/braintree-2.26.0.min.js"></script>

<script type="text/javascript">
    /*
    
        For this starter, we use Braintree
        as payment method.



        Braintree paypal Client Side guide
        https://developers.braintreepayments.com/guides/paypal/checkout-with-paypal/javascript/v2

    */

   

   
    // The cart id!
    var cart = <?php echo  json_encode($cart) ?>;

    // This will hold the nonce returned by braintree
    var braintree_nonce = null;

    // This will hold the client token returned by Marketcloud
    var braintree_client_token = null;



    function loadClientToken() {

        // 
        marketcloud.payments.braintree.createClientToken(function(err,data){
            if (err) {
                return alert("An error has occurred")
            } else {
                braintree_client_token = data.clientToken;
                
                
                // In this example, we use braintree as payment method
                // But you can replace it with Stripe or any other 
                // payment method supported by Marketcloud
                braintree.setup(braintree_client_token, "dropin", {
                  container: "payment-form",
                  onPaymentMethodReceived: function (bt_nonce) {
                            alert("Payment method received")
                            $("#braintree_button").removeAttr("disabled")
                            braintree_nonce = bt_nonce;
                            checkout();
                        }
                });
        }
    })  
    }


   //Retrieving Braintree client token
    loadClientToken()



    function validateAddress() {

        var address = {
            email : $("#address_email").val(),
            full_name : $("#address_full_name").val(),
            country : $("#address_country").val(),
            city : $("#address_city").val(),
            address1 : $("#address_address1").val(),
            state : $("#address_state").val(),
            postal_code : $("#address_postal_code").val(),
        }

        return true;
    }


    function validateCardInformation() {
        return true;
    }

    function validateShippingMethod() {
        var shippingMethod = $("input[name='shippingMethod']").val();
        return true;
    }


    function checkout() {

       

        if (!validateAddress())
            return alert("Invalid address");

        if (!validateCardInformation())
            return alert("Invalid card");

        if (!validateShippingMethod())
            return alert("Invalid shippingMethod");

        var the_address = {
            email : $("#address_email").val(),
            full_name : $("#address_full_name").val(),
            country : $("#address_country").val(),
            city : $("#address_city").val(),
            address1 : $("#address_address1").val(),
            state : $("#address_state").val(),
            postal_code : $("#address_postal_code").val(),
        };
        
        var order = {
            shipping_address : the_address,
            billing_address : the_address,
            cart_id : cart.id,
            shipping_id : $("input[name='shippingMethod']").val()
        }
        
            var form = $("<form method='POST' action='/checkout.php'></form>");
            var order_field = $("<input type='hidden' name='order'/>");
            order_field.val(JSON.stringify(order));
            form.append(order_field);
            var nonce_field = $("<input type='hidden' name='braintree_nonce'/>");
            nonce_field.val(JSON.stringify(braintree_nonce));
            form.append(nonce_field);
            form.submit();

    }
    
</script>

<?php include("footer.php"); ?>