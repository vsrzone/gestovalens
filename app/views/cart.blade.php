<!doctype>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Gesto Valens</title>
	<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="{{ url() }}/css/style.css">
</head>
<body>
	<div id="cart-wrapper">
		<div id="cart-items">
			<div class="item-wrapper">
				<div class="item-container item-image-container">
					<div class="item-image"></div>
				</div>
				<div class="item-container item-size-container">
					You have been ordered :
					<ul id="cart-sizes">
						<li><div class="cart-size-block"><label>small</label></div><div class="cart-size-block">: <input type="text" name="small" value="1"></div></li>
						<li><div class="cart-size-block"><label>medium</label></div><div class="cart-size-block">: <input type="text" name="medium" value="1"></div></li>
						<li><div class="cart-size-block"><label>large</label></div><div class="cart-size-block">: <input type="text" name="large" value="1"></div></li>
						<li><div class="cart-size-block"><label>extra-large</label></div><div class="cart-size-block">: <input type="text" name="extra-large" value="1"></div></li>
					</ul>
				</div>
				<div class="item-container item-price-container">
					<div class="item-title">Rs. 950.00</div>
					<div class="item-details"></div>
					<div class="remove-item"><a href="">Remove</a></div>
				</div>
			</div><!-- end of an item -->
		</div><!-- end of cart-items -->
		<div id="cart-summary">
			<div id="summary-title">Cart summary</div>
			<hr/>
			<div id="summary-total"></div>
			<div class="summary-detail"><input type="submit" value="Proceed to checkout" id="proceed-to-checkout" class="button"></div>
			<div class="summary-detail"><div class="continue-shopping button">Continue shopping</div></div>
			
		</div><!-- end of cart-summary -->
	</div><!-- end of cart-wrapper -->
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<!-- <script type="text/javascript" src="{{ url() }}/js/PxLoader.js"></script>
<script type="text/javascript" src="{{ url() }}/js/PxLoaderImage.js"></script>
<script type="text/javascript" src="{{ url() }}/js/isotope.pkgd.min.js"></script> -->
<script type="text/javascript" src="{{ url() }}/js/libs.js"></script>

</html>