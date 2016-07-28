<?php

/*
	Checkout processing with Marketcloud and Braintree payments

 */

	
	// Questo è lo script php che accoglie la chiamata di creazione dell'ordine
	$order_data = json_decode($_POST["order"]);

	$order_response = Marketcloud\Orders::create($order_data);

	$order = $order_response->body->data;

	//Marketcloud\Marketcloud::$apiBaseUrl = 'http://localhost:5000/v0';

	// Controlliamo che l'ordine sia andato a buon fine
	if ($order_response->body->status !== true) {
		
		// L'ordine è valido
		
	} else {

		// Per fare testing, braintree mette a disposizione una serie di "nonce"
		// che possono dare risultati diversi
		// ad esempio "fake-processor-declined-visa-nonce"
		$payment_response = Marketcloud\Payments::create(array(
								"order_id" => $order->id,
								"method" => "Braintree",
								//"nonce" => $_POST["braintree_nonce"]
								//"nonce" => "fake-valid-nonce"
								"nonce" => "fake-processor-declined-visa-nonce"
		));

		

		if ($payment_response->body->status !== true) {
			// Pagamento fallito
			// Possiamo decidere di annullare l'ordine
			Marketcloud\Orders::delete($order->id);
			//Riportiamo l'utente al checkout dicendo che l'ordine è fallito
			$error_message = "Failed payment";
			require_once("checkout_form.php");
		} else {
			//Pagamento riuscito
			//
			
			//Resettiamo il carrello
			//creandone uno nuovo e salvandolo in sessione
			
			//$cart_response = Marketcloud\Carts::create();
			//$_SESSION["marketcloud_cart_id"] = $cart_response->body->data->id;

			//Portiamo l'utente ad una pagina di conferma dell'ordine
			
			require_once("order_confirmed.php");

			
		}
		
		
	}


?>