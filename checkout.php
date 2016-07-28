
<?php
	require_once('bootstrap_shop.php');

/*	$cart = Marketcloud\Carts::getById($_SESSION["marketcloud_cart_id"]);

	$cart = $cart->body->data;*/



    if ($_SERVER["REQUEST_METHOD"] == 'POST') {
        require_once("process_checkout.php");
    } else if ($_SERVER["REQUEST_METHOD"] == 'GET') {
        
        require_once("checkout_form.php");
    } else {
        header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found", true, 404);
        include("notFound.php");
    }

?>
