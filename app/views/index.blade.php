<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Gesto Valens</title>
	<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="{{ url() }}/css/style.css">
</head>
<body>
	<div id="page-wrapper">
		<div id="item-wrapper">
		</div>
		<div id="main-wrapper">
			<div id="deisgn-area">
				<canvas id="design-canvas"></canvas>
			</div>
			<div id="editing-menu">
				<div id="editing-fixed">
					<div id="gender-selection-menu">
						<div class="gender-icon" id="male-icon" title="male"></div>
						<div class="gender-icon" id="female-icon" title="female"></div>
					</div>	
					<div id="color-selection-menu">
						<div id="selection-menu-icons">
							<div class="color-tab-icon" id="tshirt-color-tab" title="t-shirt color"></div>
							<div class="color-tab-icon" id="design-color-tab" title="artwork color"></div>
						</div>
						<div id="color-wrapper">
						</div>
						<div id="artworks-wrapper">
						</div>
						<div id="more-designs">more designs</div>
						<div id="order-now" class="button">order now</div>
					</div>
					<div id="footer">
						<div id="social-icons-row">
							<a href="www.fb.me/gestovalens"><div class="social-icon" id="fb-icon"></div></a>
							<div class="social-icon" id="twitter-icon"></div>
						</div>
						<div id="copyrights">designed by 
							<a href="http://www.ingenslk.com/" target="_blank">
								<span style="color: #858585">ingens</span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
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
