<?php require('header.php'); ?>
<?php
// Incluso da checkout.php
$total_cart_value = 0;
foreach ($cart->items as $cart_item) {
$total_cart_value += $cart_item->price * $cart_item->quantity;
}
$shippings = Marketcloud\Shippings::get(array("value" => $total_cart_value));
$shippings = $shippings->body->data;

$promotions = Marketcloud\Promotions::getByCart($cart->id);
$promotions = $promotions->body->data;

$selected_promotion = $promotions[0];

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
                                
                                <select class="form-control" name="country" id="address_country">
                                    <option value="Afganistan">Afghanistan</option>
                                    <option value="Albania">Albania</option>
                                    <option value="Algeria">Algeria</option>
                                    <option value="American Samoa">American Samoa</option>
                                    <option value="Andorra">Andorra</option>
                                    <option value="Angola">Angola</option>
                                    <option value="Anguilla">Anguilla</option>
                                    <option value="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option>
                                    <option value="Argentina">Argentina</option>
                                    <option value="Armenia">Armenia</option>
                                    <option value="Aruba">Aruba</option>
                                    <option value="Australia">Australia</option>
                                    <option value="Austria">Austria</option>
                                    <option value="Azerbaijan">Azerbaijan</option>
                                    <option value="Bahamas">Bahamas</option>
                                    <option value="Bahrain">Bahrain</option>
                                    <option value="Bangladesh">Bangladesh</option>
                                    <option value="Barbados">Barbados</option>
                                    <option value="Belarus">Belarus</option>
                                    <option value="Belgium">Belgium</option>
                                    <option value="Belize">Belize</option>
                                    <option value="Benin">Benin</option>
                                    <option value="Bermuda">Bermuda</option>
                                    <option value="Bhutan">Bhutan</option>
                                    <option value="Bolivia">Bolivia</option>
                                    <option value="Bonaire">Bonaire</option>
                                    <option value="Bosnia &amp; Herzegovina">Bosnia &amp; Herzegovina</option>
                                    <option value="Botswana">Botswana</option>
                                    <option value="Brazil">Brazil</option>
                                    <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                    <option value="Brunei">Brunei</option>
                                    <option value="Bulgaria">Bulgaria</option>
                                    <option value="Burkina Faso">Burkina Faso</option>
                                    <option value="Burundi">Burundi</option>
                                    <option value="Cambodia">Cambodia</option>
                                    <option value="Cameroon">Cameroon</option>
                                    <option value="Canada">Canada</option>
                                    <option value="Canary Islands">Canary Islands</option>
                                    <option value="Cape Verde">Cape Verde</option>
                                    <option value="Cayman Islands">Cayman Islands</option>
                                    <option value="Central African Republic">Central African Republic</option>
                                    <option value="Chad">Chad</option>
                                    <option value="Channel Islands">Channel Islands</option>
                                    <option value="Chile">Chile</option>
                                    <option value="China">China</option>
                                    <option value="Christmas Island">Christmas Island</option>
                                    <option value="Cocos Island">Cocos Island</option>
                                    <option value="Colombia">Colombia</option>
                                    <option value="Comoros">Comoros</option>
                                    <option value="Congo">Congo</option>
                                    <option value="Cook Islands">Cook Islands</option>
                                    <option value="Costa Rica">Costa Rica</option>
                                    <option value="Cote DIvoire">Cote D'Ivoire</option>
                                    <option value="Croatia">Croatia</option>
                                    <option value="Cuba">Cuba</option>
                                    <option value="Curaco">Curacao</option>
                                    <option value="Cyprus">Cyprus</option>
                                    <option value="Czech Republic">Czech Republic</option>
                                    <option value="Denmark">Denmark</option>
                                    <option value="Djibouti">Djibouti</option>
                                    <option value="Dominica">Dominica</option>
                                    <option value="Dominican Republic">Dominican Republic</option>
                                    <option value="East Timor">East Timor</option>
                                    <option value="Ecuador">Ecuador</option>
                                    <option value="Egypt">Egypt</option>
                                    <option value="El Salvador">El Salvador</option>
                                    <option value="Equatorial Guinea">Equatorial Guinea</option>
                                    <option value="Eritrea">Eritrea</option>
                                    <option value="Estonia">Estonia</option>
                                    <option value="Ethiopia">Ethiopia</option>
                                    <option value="Falkland Islands">Falkland Islands</option>
                                    <option value="Faroe Islands">Faroe Islands</option>
                                    <option value="Fiji">Fiji</option>
                                    <option value="Finland">Finland</option>
                                    <option value="France">France</option>
                                    <option value="French Guiana">French Guiana</option>
                                    <option value="French Polynesia">French Polynesia</option>
                                    <option value="French Southern Ter">French Southern Ter</option>
                                    <option value="Gabon">Gabon</option>
                                    <option value="Gambia">Gambia</option>
                                    <option value="Georgia">Georgia</option>
                                    <option value="Germany">Germany</option>
                                    <option value="Ghana">Ghana</option>
                                    <option value="Gibraltar">Gibraltar</option>
                                    <option value="Great Britain">Great Britain</option>
                                    <option value="Greece">Greece</option>
                                    <option value="Greenland">Greenland</option>
                                    <option value="Grenada">Grenada</option>
                                    <option value="Guadeloupe">Guadeloupe</option>
                                    <option value="Guam">Guam</option>
                                    <option value="Guatemala">Guatemala</option>
                                    <option value="Guinea">Guinea</option>
                                    <option value="Guyana">Guyana</option>
                                    <option value="Haiti">Haiti</option>
                                    <option value="Hawaii">Hawaii</option>
                                    <option value="Honduras">Honduras</option>
                                    <option value="Hong Kong">Hong Kong</option>
                                    <option value="Hungary">Hungary</option>
                                    <option value="Iceland">Iceland</option>
                                    <option value="India">India</option>
                                    <option value="Indonesia">Indonesia</option>
                                    <option value="Iran">Iran</option>
                                    <option value="Iraq">Iraq</option>
                                    <option value="Ireland">Ireland</option>
                                    <option value="Isle of Man">Isle of Man</option>
                                    <option value="Israel">Israel</option>
                                    <option value="Italy">Italy</option>
                                    <option value="Jamaica">Jamaica</option>
                                    <option value="Japan">Japan</option>
                                    <option value="Jordan">Jordan</option>
                                    <option value="Kazakhstan">Kazakhstan</option>
                                    <option value="Kenya">Kenya</option>
                                    <option value="Kiribati">Kiribati</option>
                                    <option value="Korea North">Korea North</option>
                                    <option value="Korea Sout">Korea South</option>
                                    <option value="Kuwait">Kuwait</option>
                                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                                    <option value="Laos">Laos</option>
                                    <option value="Latvia">Latvia</option>
                                    <option value="Lebanon">Lebanon</option>
                                    <option value="Lesotho">Lesotho</option>
                                    <option value="Liberia">Liberia</option>
                                    <option value="Libya">Libya</option>
                                    <option value="Liechtenstein">Liechtenstein</option>
                                    <option value="Lithuania">Lithuania</option>
                                    <option value="Luxembourg">Luxembourg</option>
                                    <option value="Macau">Macau</option>
                                    <option value="Macedonia">Macedonia</option>
                                    <option value="Madagascar">Madagascar</option>
                                    <option value="Malaysia">Malaysia</option>
                                    <option value="Malawi">Malawi</option>
                                    <option value="Maldives">Maldives</option>
                                    <option value="Mali">Mali</option>
                                    <option value="Malta">Malta</option>
                                    <option value="Marshall Islands">Marshall Islands</option>
                                    <option value="Martinique">Martinique</option>
                                    <option value="Mauritania">Mauritania</option>
                                    <option value="Mauritius">Mauritius</option>
                                    <option value="Mayotte">Mayotte</option>
                                    <option value="Mexico">Mexico</option>
                                    <option value="Midway Islands">Midway Islands</option>
                                    <option value="Moldova">Moldova</option>
                                    <option value="Monaco">Monaco</option>
                                    <option value="Mongolia">Mongolia</option>
                                    <option value="Montserrat">Montserrat</option>
                                    <option value="Morocco">Morocco</option>
                                    <option value="Mozambique">Mozambique</option>
                                    <option value="Myanmar">Myanmar</option>
                                    <option value="Nambia">Nambia</option>
                                    <option value="Nauru">Nauru</option>
                                    <option value="Nepal">Nepal</option>
                                    <option value="Netherland Antilles">Netherland Antilles</option>
                                    <option value="Netherlands">Netherlands (Holland, Europe)</option>
                                    <option value="Nevis">Nevis</option>
                                    <option value="New Caledonia">New Caledonia</option>
                                    <option value="New Zealand">New Zealand</option>
                                    <option value="Nicaragua">Nicaragua</option>
                                    <option value="Niger">Niger</option>
                                    <option value="Nigeria">Nigeria</option>
                                    <option value="Niue">Niue</option>
                                    <option value="Norfolk Island">Norfolk Island</option>
                                    <option value="Norway">Norway</option>
                                    <option value="Oman">Oman</option>
                                    <option value="Pakistan">Pakistan</option>
                                    <option value="Palau Island">Palau Island</option>
                                    <option value="Palestine">Palestine</option>
                                    <option value="Panama">Panama</option>
                                    <option value="Papua New Guinea">Papua New Guinea</option>
                                    <option value="Paraguay">Paraguay</option>
                                    <option value="Peru">Peru</option>
                                    <option value="Phillipines">Philippines</option>
                                    <option value="Pitcairn Island">Pitcairn Island</option>
                                    <option value="Poland">Poland</option>
                                    <option value="Portugal">Portugal</option>
                                    <option value="Puerto Rico">Puerto Rico</option>
                                    <option value="Qatar">Qatar</option>
                                    <option value="Republic of Montenegro">Republic of Montenegro</option>
                                    <option value="Republic of Serbia">Republic of Serbia</option>
                                    <option value="Reunion">Reunion</option>
                                    <option value="Romania">Romania</option>
                                    <option value="Russia">Russia</option>
                                    <option value="Rwanda">Rwanda</option>
                                    <option value="St Barthelemy">St Barthelemy</option>
                                    <option value="St Eustatius">St Eustatius</option>
                                    <option value="St Helena">St Helena</option>
                                    <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                    <option value="St Lucia">St Lucia</option>
                                    <option value="St Maarten">St Maarten</option>
                                    <option value="St Pierre &amp; Miquelon">St Pierre &amp; Miquelon</option>
                                    <option value="St Vincent &amp; Grenadines">St Vincent &amp; Grenadines</option>
                                    <option value="Saipan">Saipan</option>
                                    <option value="Samoa">Samoa</option>
                                    <option value="Samoa American">Samoa American</option>
                                    <option value="San Marino">San Marino</option>
                                    <option value="Sao Tome &amp; Principe">Sao Tome &amp; Principe</option>
                                    <option value="Saudi Arabia">Saudi Arabia</option>
                                    <option value="Senegal">Senegal</option>
                                    <option value="Serbia">Serbia</option>
                                    <option value="Seychelles">Seychelles</option>
                                    <option value="Sierra Leone">Sierra Leone</option>
                                    <option value="Singapore">Singapore</option>
                                    <option value="Slovakia">Slovakia</option>
                                    <option value="Slovenia">Slovenia</option>
                                    <option value="Solomon Islands">Solomon Islands</option>
                                    <option value="Somalia">Somalia</option>
                                    <option value="South Africa">South Africa</option>
                                    <option value="Spain">Spain</option>
                                    <option value="Sri Lanka">Sri Lanka</option>
                                    <option value="Sudan">Sudan</option>
                                    <option value="Suriname">Suriname</option>
                                    <option value="Swaziland">Swaziland</option>
                                    <option value="Sweden">Sweden</option>
                                    <option value="Switzerland">Switzerland</option>
                                    <option value="Syria">Syria</option>
                                    <option value="Tahiti">Tahiti</option>
                                    <option value="Taiwan">Taiwan</option>
                                    <option value="Tajikistan">Tajikistan</option>
                                    <option value="Tanzania">Tanzania</option>
                                    <option value="Thailand">Thailand</option>
                                    <option value="Togo">Togo</option>
                                    <option value="Tokelau">Tokelau</option>
                                    <option value="Tonga">Tonga</option>
                                    <option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>
                                    <option value="Tunisia">Tunisia</option>
                                    <option value="Turkey">Turkey</option>
                                    <option value="Turkmenistan">Turkmenistan</option>
                                    <option value="Turks &amp; Caicos Is">Turks &amp; Caicos Is</option>
                                    <option value="Tuvalu">Tuvalu</option>
                                    <option value="Uganda">Uganda</option>
                                    <option value="Ukraine">Ukraine</option>
                                    <option value="United Arab Erimates">United Arab Emirates</option>
                                    <option value="United Kingdom">United Kingdom</option>
                                    <option value="United States of America">United States of America</option>
                                    <option value="Uraguay">Uruguay</option>
                                    <option value="Uzbekistan">Uzbekistan</option>
                                    <option value="Vanuatu">Vanuatu</option>
                                    <option value="Vatican City State">Vatican City State</option>
                                    <option value="Venezuela">Venezuela</option>
                                    <option value="Vietnam">Vietnam</option>
                                    <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                    <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                    <option value="Wake Island">Wake Island</option>
                                    <option value="Wallis &amp; Futana Is">Wallis &amp; Futana Is</option>
                                    <option value="Yemen">Yemen</option>
                                    <option value="Zaire">Zaire</option>
                                    <option value="Zambia">Zambia</option>
                                    <option value="Zimbabwe">Zimbabwe</option>
                                </select>
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
                                    <td>
                                        <a href="detail.html"><?php echo  $item->name; ?></a>
                                        <div>
                <?php
                    if (true == $item->has_variants) {
                        foreach ($item->variantsDefinition as $vname => $vvalues) { ?>

                            <b><?php echo $item->variant->{$vname}; ?></b>  

                <?php 
                        }
                    }
                ?>
                                        </div>
                                    </td>
                                    <td><?php echo  $item->quantity; ?></td>
                                    <td><?php echo   $item->price;  ?></td>
                                    
                                </tr>
                                <?php }; ?>
                                
                                
                            <tr>
                                
                                <td colspan="2">Items total</td>
                                <td colspan="2">$ <?php echo $total_cart_value; ?></td>
                            </tr>
                            <tr>
                                <td colspan="2">Shipping</td>
                                <td colspan="2" id="shipping_value">$0.00</td>
                            </tr>
                           <!--  <tr>
                                
                                <td colspan="2">Taxes</td>
                                <td colspan="2">$0.00</td>
                            </tr> -->
                            <tr>
                                
                                <td colspan="2">Promotion</td>
                                <td colspan="2">$ <?php echo $selected_promotion->promotion_total; ?></td>
                            </tr>
                            <tr>
                                
                                <td colspan="2"><b>Total</b></td>
                                <td colspan="2">$0.00</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">Shipping method</div>
                <div class="panel-body" id="shippingOptionsContainer">
                    <b>Add a shipping address to show shipping options</b>
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
var cart = <?php echo json_encode($cart) ?> ;
// This will hold the nonce returned by braintree
var braintree_nonce = null;
// This will hold the client token returned by Marketcloud
var braintree_client_token = null;
// Compatible shippings methods
var shipping_methods = [];

function loadClientToken() {
    //
    marketcloud.payments.braintree.createClientToken(function(err, data) {
        if (err) {
            return alert("An error has occurred")
        } else {
            braintree_client_token = data.clientToken;

            console.log(data.clientToken)

            // In this example, we use braintree as payment method
            // But you can replace it with Stripe or any other
            // payment method supported by Marketcloud
            braintree.setup(braintree_client_token, "dropin", {
                container: "payment-form",
                onPaymentMethodReceived: function(bt_nonce) {
                    validateAddress()
                    //alert("Payment method received")
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

function validateEmail(email) {
      var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return re.test(email);
    }
 String.prototype.validateLength = function(min,max) {
        return this.length >= min && this.length <= max;
    }
function displayError(selector,error) {
        $(selector).parent().addClass('has-error');
        $(selector).parent().append($("<div class='alert alert-danger errore'>"+error+"</div>"));
        
        $('html, body').animate({
            scrollTop: $(selector).offset().top
        }, 500);
    }


function validateAddress() {
        //Rimuovo tutti i messaggi di errore
        $(".errore").remove();
        $(".has-error").removeClass('has-error')

        var address = {
            email : $("#address_email").val(),
            full_name : $("#address_full_name").val(),
            country : $("#address_country").val(),
            city : $("#address_city").val(),
            address1 : $("#address_address1").val(),
            state : $("#address_state").val(),
            postal_code : $("#address_postal_code").val(),
        }
        if (!validateEmail(address.email)){
            displayError('#address_email','Indirizzo email non valido');
            return false;
        }

        if (!address.full_name.validateLength(2,80)) {
             displayError('#address_full_name','Il campo deve avere tra i 2 e gli 80 caratteri');
            return false;
        }


        if (!address.city.validateLength(2,30)) {
             displayError('#address_city','Il campo deve avere tra i 2 e i 30 caratteri');
            return false;
        }


        if (!address.postal_code.validateLength(4,5)) {
             displayError('#address_postal_code','Il campo deve avere tra i 4 e i 5 caratteri ');
            return false;
        }

        if (!address.address1.validateLength(2,80)) {
             displayError('#address_address1','Il campo deve avere tra i 2 e i 30 caratteri');
            return false;
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

function updateShippingMethod() {

    var destination = $("#address_country").val();
    marketcloud.shippings.list({
        zone: destination
    }, function(err, data) {
        $('#shippingOptionsContainer').html('');
        if (data.length === 0) {
            return $('#shippingOptionsContainer').html('<b>Sorry! We don\'t ship to your country</b>');
        }


        
        // Array con metodi di shipping specifici per la destinazione scelta,
        // ovvero metodi non "Rest of the world"
        //
        // Questa distinzione ci serve per capire quando mostrare
        // regole di shipping per "tutti i paesi restanti"
        // 
        // Questo espediente sarà obsoleto a breve, quando dalla dashboard
        // sarà possibile generare una regola "Copri tutte le destinazioni che non copro già"
        var specificShippings = data.filter(function(shipping){
            return !shipping.zones.some(function(zone){
                return zone.code === 'ALL';
            })
        });

        if (specificShippings.length > 0)
            data = specificShippings;

        data.forEach(function(shipping) {
            var new_radio = $('<div class="radio">\
    <label>\
        <input type="radio"\
        name="shippingMethod"\
        value="' + shipping.id + '"\
        id="selected_shipping_method_id">\
        ' + shipping.name + ' <b> + $ ' + shipping.base_cost + '</b>\
    </label>\
    <div></div>\
</div>');
            new_radio.appendTo('#shippingOptionsContainer');
            new_radio.on('change',function(){
                $("#shipping_value").text(shipping.base_cost)
            })
        })

    })
}
$("#address_country").on('change', updateShippingMethod);

function checkout() {

    if (!validateAddress())
        return alert("Invalid address");
    if (!validateCardInformation())
        return alert("Invalid card");
    if (!validateShippingMethod())
        return alert("Invalid shippingMethod");
    var the_address = {
        email: $("#address_email").val(),
        full_name: $("#address_full_name").val(),
        country: $("#address_country").val(),
        city: $("#address_city").val(),
        address1: $("#address_address1").val(),
        state: $("#address_state").val(),
        postal_code: $("#address_postal_code").val(),
    };

    var order = {
        shipping_address: the_address,
        billing_address: the_address,
        cart_id: cart.id,
        shipping_id: $("input[name='shippingMethod']").val()
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