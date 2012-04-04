<?php
if ($request_args[0] == "") {
	// Render checkout form if user logged in, login form if not
	if ($_SESSION['valid_id']) {
		include get_view_file('checkout_form');
	} else {
		$_SESSION['return_to'] = "checkout";
		include get_view_file('login_form');
	}
} else if ($request_args[0] == "auth") {
	// Escape any dodgy hackers and store into variables
	$title = mysql_real_escape_string($_POST['title']);
	$first_name = mysql_real_escape_string($_POST['first-name']);
	$surname = mysql_real_escape_string($_POST['surname']);
	$card_type = mysql_real_escape_string($_POST['card-type']);
	$card_number = mysql_real_escape_string($_POST['card-number']);
	$start_date = mysql_real_escape_string($_POST['start-date']);
	$end_date = mysql_real_escape_string($_POST['end-date']);
	
	if ($title != "" && $first_name != "" && $surname != "" && $card_type != "" && $card_number != "" && $end_date != "") {
		
		$msg_id = str_pad(rand(0,9999),4,"0",STR_PAD_LEFT);
		$query = http_build_query(array(
			"service" => "cardAuth",
			"num_md5" => md5($card_number),
			"amount" => $_SESSION['total_price'],
			"currency" => "GBP",
			"api_key" => "739a720ade31ad2a14b30aa7b3a6b20e",
			"msg_id" => $msg_id
		));
				
		$request = "http://www.cems.uwe.ac.uk/~pchatter/rest/rest.php?".$query;
							
		$response = simplexml_load_string(acquire_file($request));
				
		if ($response->attributes()->id == $msg_id) {
			if ($response->num_md5 == md5($card_number) && $response->bearer == $title." ".$first_name." ".$surname && $response->syear == $start_date && $response->fyear == $end_date && $response->type == $card_type) {
				// Everything is valid!
				$_SESSION['card_details'] = $response->asXML();
				header("Location:$base_url/checkout/confirm");
			}
		}
		
	} else {
		// Something is missing from the input
		echo "nope";
	}
} else if ($request_args[0] == "confirm") {
	$total_price = $_SESSION['total_price'];
	$card_details = simplexml_load_string($_SESSION['card_details']);
			
	// Confirm stuff please
	echo "Please confirm $total_price, ".$card_details->bearer;
	echo "<a href='/checkout/done'>Yup &rarr;</a>";
} else if ($request_args[0] == "done") {
	// Done
	// Sets the cart status to 1, to alert shop that they need to dispatch stuff to this person
	$request = mysql_query("UPDATE `carts` SET `status` = '1' WHERE `id` = '".$_SESSION['cart']."'");
	// Clears the session variables so they don't mess things up
	unset($_SESSION['cart']);
	unset($_SESSION['total_price']);
	unset($_SESSION['card_details']);
	
	echo "Thanks, your order has been placed.";
}