<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Gesto Valens</title>
	<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="{{ url() }}/css/style.css">
	<link rel="shortcut icon" href="{{ url() }}/favicon.ico" type="image/x-icon">
	<link rel="icon" href="{{ url() }}/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="{{ url() }}/css/font-awesome.min.css">
</head>
<body>

<div id="logo-wrapper">
	<ul id="logo-ul">
		<a id="logo"><img src="{{ url() }}/images/logo.png" width="100%" height="100%" alt="Gesto Valens" title="Gesto Valens"></a>
	</ul>
</div>
<div id="checkout-cart">
	<p>Please fill the below infomation to proceed with your order</p>
	<input id="checkout-name" name="checkout-name" class="input" placeholder="Name"></input>
	<input id="checkout-phone" name="checkout-phone" class="input" placeholder="Phone"></input>
	<input id="checkout-address" name="checkout-address" class="input" placeholder="Address"></input>
	<input id="checkout-email" name="checkout-email" class="input" placeholder="Email"></input>
	<input type="submit" value="Checkout" id="checkout" class="button">
</div>
</body>
<script type="text/javascript">
	var http_path = '{{ url() }}';
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="{{ url() }}/js/PxLoader.js"></script>
<script type="text/javascript" src="{{ url() }}/js/PxLoaderImage.js"></script>
<script type="text/javascript" src="{{ url() }}/js/isotope.pkgd.min.js"></script>
<script type="text/javascript" src="{{ url() }}/js/libs.js"></script>

</html>
