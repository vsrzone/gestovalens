<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Gesto Valens</title>
	<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Montez' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="{{ url() }}/css/style.css">
	<link rel="shortcut icon" href="{{ url() }}/favicon.ico" type="image/x-icon">
	<link rel="icon" href="{{ url() }}/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="{{ url() }}/css/font-awesome.min.css">
</head>
<body>
<div class="item-added">
	<img src="{{ url() }}/images/cart_icon.png" width="50px" height="auto"/>
	<p>One item added to cart</p>
</div>
<div id="alert-wrapper">
	<div id="alert-box">
		<div id="alert-content">
			<p>Are you sure you want to remove this item?</p>
			<div class="alert-button button" id="remove-item">Remove Item</div>
			<div class="alert-button button" id="cencel-remove-item">Cancel</div>
		</div>
	</div>
</div>
<span id="overlay-logo" class="overlay left init-pos">Site Navigation</span>
<div id="logo-wrapper">
	<ul id="logo-ul">
		<a id="logo"><img src="{{ url() }}/images/logo.png" width="100%" height="100%" alt="Gesto Valens" title="Gesto Valens"></a>
		<li><a class="menu-item" id="top-nav" title="Home"><p class="nav-icon"><i class="fa fa-home fa-lg"></i></p></a></li>
		<li><a class="menu-item" id="left-nav" title="Contact"><p class="nav-icon" id="contact-page"><i class="fa fa-phone-square fa-lg"></i></p></a></li>
		<li><a href="https://www.facebook.com/GestoValens/photos_stream" target="_blank" class="menu-item" id="bottom-nav" title="Gallery"><p class="nav-icon" id="nav-facebook"><i class="fa fa-camera-retro fa-lg"></i></p></a></li>
		<li><a class="menu-item" id="right-nav" title="My Cart"><p class="nav-icon check-out"><i class="fa fa-cart-arrow-down fa-lg"></i></p></a></li>
	</ul>
</div>
	<div id="content-wrapper">
		<div id="page-wrapper" class="home-view">
			<div id="item-wrapper">
				<div class="contact-details" id="contact-info-wrapper">
					<div class="contact-desc">
						<div class="contact-icon" id="contact-address"></div>
						<p class="contact-info">19, 4th Lane,<br/>
						Vidarshana Mawatha,<br/>
						Galavilawaththa,<br/>
						Homagama</p>
					</div>
					<div class="contact-desc">
						<div class="contact-icon" id="contact-tel"></div>
						<p class="contact-info"><!-- <img class="contact-icon" src="images/telephone_icon.png" width="20px" height="auto"> --> <a href="tel:+94774424634">077-4424634</a></p>
					</div>
					<div class="contact-desc">
						<div class="contact-icon" id="contact-mail"></div>
						<p class="contact-info">info@gestovalens.com</p>
					</div>
				</div>
				<div class="contact-details" id="contact-form-wrapper">
					<div id="contact-form">
						<form>
							<input type="text" id="contact-name" class="input" name="name" placeholder="Name">
							<input type="text" id="contact-company" class="input" name="company" placeholder="Company">
							<input type="text" id="contact-email" class="input" name="email" placeholder="Email">
							<input type="text" id="contact-phone" class="input" name="phone" placeholder="Phone">
							<textarea placeholder="Message" id="contact-message" name="message" ></textarea>
							<input type="button" value="Send" class="button" id="contact-submit" onClick="sendEmail()">
						</form>
					</div>
				</div>
			</div>
			<div id="main-wrapper">
				<div id="deisgn-area">
					<canvas id="design-canvas"></canvas>
				</div><!-- end of design area -->			
				<div id="editing-menu">
					<div id="editing-fixed">
						<div id="gender-color-wrapper">
							<div id="gender-selection-menu">
								<span id="overlay-gender" class="overlay right init-pos">Select Gender</span>
								<div class="gender-icon" id="male-icon" title="male"></div>
								<!-- <div class="gender-icon" id="female-icon" title="female"></div> -->
							</div>	
							<div id="color-selection-menu">
								<span id="overlay-type" class="overlay right init-pos">Select Tshirt or Logo</span>
								<div id="selection-menu-icons">
									<div class="color-tab-icon" id="tshirt-color-tab" title="t-shirt color"></div>
									<div class="color-tab-icon" id="design-color-tab" title="artwork color"></div>
								</div>
								<div id="color-wrapper">
								</div>
							</div>
						</div>
							<div id="artworks-wrapper">
								<span id="overlay-artwork" class="overlay right init-pos">Select Logo</span>
							</div>
							<div>
								<div id="add-to-cart" class="button margin-t-10">add to cart</div>
								<div id="check-out" class="button margin-t-10 check-out">check out</div>
							</div>	
					</div>
					<div id="footer">
						<div id="social-icons-row">
							<a href="http://www.fb.me/gestovalens"><div class="social-icon" id="fb-icon"></div></a>
							<div class="social-icon" id="twitter-icon"></div>
						</div>
						<div id="copyrights">© Gesto Valens<br/>Web Design and Development by 
							<a href="http://www.ingenslk.com/" target="_blank">
								<span style="color: #6B6B6B">Ingens</span>
							</a>
						</div>
					</div>
				</div><!-- end of editing menu -->
			</div><!-- end of main wrapper -->
			<div id="cart-wrapper-a">
				<div id="cart-wrapper">
					<div id="cart-items">
						<!-- <div class="item-wrapper"></div> -->
					</div><!-- end of cart-items -->
					<div id="cart-summary">
						<p id="summary-title">Cart summary</p>
						<hr/>
						<p id="summary-total">Total: Rs. 00.00</p>
						<p id="summary-qty">You have 0 items in your cart</p>
						<div class="summary-detail">
							
							<!-- {{ Form::open(array('url'=>'cart/checkout'))}} -->
								<input type="submit" value="Proceed to checkout" id="proceed-to-checkout" class="button">
							<!-- {{ Form::hidden('order_details', '', array('id'=>'order_details')) }} -->
							<!-- {{ Form::close()}} -->
						</div>
						<div class="summary-detail"><div class="continue-shopping button">Continue shopping</div></div>	
						<div id="checkout-cart">
							<p>Please fill the below infomation to proceed with your order</p>
							<input id="checkout-name" name="checkout-name" class="input" placeholder="Name"></input>
							<input id="checkout-phone" name="checkout-phone" class="input" placeholder="Phone"></input>
							<input id="checkout-address" name="checkout-address" class="input" placeholder="Address"></input>
							<input id="checkout-email" name="checkout-email" class="input" placeholder="Email"></input>
							<input type="button" value="Checkout" id="checkout-submit" class="button" onClick="sendInfo()">
						</div>
					</div><!-- end of cart-summary -->
				</div><!-- end of cart-wrapper -->
				
			</div><!-- end of cart-wrapper-a -->
		</div><!-- end of page wrapper -->
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
