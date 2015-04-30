<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function(){
	return View::make('index');
});

Route::get('/checkout',  function(){
	// echo 'sucess';
	// return;

	$checkoutInfo = json_decode(Input::get('variables'),1);

	$name = $checkoutInfo['name'];
	$phone = $checkoutInfo['phone'];
	$address = $checkoutInfo['address'];
	$email = $checkoutInfo['email'];
	$tshirtArray = $checkoutInfo['tshirtArray'];

	$quantity = 0;
	for ($i=0; $i < count($tshirtArray); $i++) {
		for ($j=0; $j < count($tshirtArray[$i]['sizesQuantity']); $j++) { 
			$quantity += $tshirtArray[$i]['sizesQuantity'][$j];
		}
	}
	// price mentioned here 
	$total = $quantity*950;

	//email order to order@gestovalens.com
	$body = "<h4>name:</h4><p>$name</p>
			<h4>phone:</h4><p>$phone</p>
			<h4>email:</h4><p>$email</p>
			<h4>address:</h4><p>$address</p>
			<h4>Order:</h4>";
	$sizes = ["Small", "Medium", "Large", "XL"];
	for ($i=0; $i < count($tshirtArray); $i++) {
		$body .="<h6>Tshirt $i:</h6>";
		$body .=$tshirtArray[$i]['artwork_name'];
		$body .="<h6>T-Shirt artwork Colour:</h6>";
		$body .=$tshirtArray[$i]['logoColor'];
		$body .="<h6>T-Shirt Colour:</h6>";
		$body .=$tshirtArray[$i]['tshirtColor'];
		for ($j=0; $j < count($tshirtArray[$i]['sizesQuantity']); $j++) {
			$body .="<h6>".$sizes[$j].":</h6>";
			$body .=$tshirtArray[$i]['sizesQuantity'][$j];
		}
		$body .="<br/>";
	}
	
	$headers = "From: Gesto Valens Orders<order@gestovalens.com> \r\n";
	$headers .= "Content-type: text/html; charset=\"UTF-8\"; format=flowed \r\n";
	$headers .= "Mime-Version: 1.0 \r\n"; 
	$headers .= "Content-Transfer-Encoding: quoted-printable \r\n";
	
	$result = mail("vikumsri@gmail.com",'Gesto Valens Order',$body,$headers);
	
	if ($quantity != 0 && $result) {
		$response = array();
		$response['total'] = $total;
		$response['status'] = '200';

		$response = json_encode($response);

		return $response;
	}



});


Route::get('/send_email', function(){

	$message = json_decode(Input::get('variables'),1);

	$name = $message['name'];
	$company = $message['company'];
	$email = $message['email'];
	$phone = $message['phone'];
	$message = $message['message'];


	if($email == '' || $message == ''){
		echo '{"status":400,message:"failed to send message"}';	
		return;
	}

	$body = "<h4>name:</h4><p>$name</p>
			<h4>company:</h4><p>$company</p>
			<h4>email:</h4><p>$email</p>
			<h4>telephone:</h4><p>$phone</p>
			<h4>message:</h4><p>$message</p>";
			
	
	$headers = "From: Gesto Valens Contact<contact@gestovalens.com> \r\n";
	$headers .= "Content-type: text/html; charset=\"UTF-8\"; format=flowed \r\n";
	$headers .= "Mime-Version: 1.0 \r\n"; 
	$headers .= "Content-Transfer-Encoding: quoted-printable \r\n";
	
	$result = mail("vikumsri@gmail.com",'Gesto Valens Contact',$body,$headers);
	
	
	if($result){
		echo '{"status":200,"message":"sent"}';	
		return;
	}else{
		echo '{"status":400,message:"failed to send message"}';	
		return;
	}
	echo '{"status":500,message:"sending failed"}';
	return;
});