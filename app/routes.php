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

Route::get('cart', function(){
	return View::make('cart');
});

Route::get('/send_email', function(){
	echo 'sucess';
	return;

	$message = json_decode(Input::get('variables'),1);

	$name = $message['name'];
	$company = $message['company'];
	$email = $message['email'];
	$telephone = $message['telephone'];
	$msg = $message['message'];

	if($email == '' || $msg == ''){
		echo '{"status":400,message:"failed to send message"}';	
		return;
	}

	$body = "<h4>name:</h4><p>$name</p>
			<h4>address:</h4><p>$email</p>
			<h4>telephone:</h4><p>$telephone</p>
			<h4>email:</h4><p>$msg</p>";
			
	
	$headers = "From: Dplus Contact<contact@dplusarchitects.com> \r\n";
	$headers .= "Content-type: text/html; charset=\"UTF-8\"; format=flowed \r\n";
	$headers .= "Mime-Version: 1.0 \r\n"; 
	$headers .= "Content-Transfer-Encoding: quoted-printable \r\n";
	
	$result = mail("vikumsri@gmail.com",'Dplus Contact',$body,$headers);
	
	
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