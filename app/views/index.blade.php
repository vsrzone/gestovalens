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
			</div><!-- end of design area -->			
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
			</div><!-- end of editing menu -->	
			<div id="sizes-window" class="hidden">
				<div id="sizes-wrapper">
					<div class="page-heading">please select the sizes you want to buy</div>
					<div class="sizes-selector">
						<div class="size-block">small</div>
						<div class="size-block">medium</div>
						<div class="size-block">large</div>
						<div class="size-block">extra large</div>
					</div>
					<form action="#" method="post">
					<div class="sizes-selector">
						<div class="size-block"><input type="checkbox" name="small"></div>
						<div class="size-block"><input type="checkbox" name="medium"></div>
						<div class="size-block"><input type="checkbox" name="large"></div>
						<div class="size-block"><input type="checkbox" name="extra-large"></div>
					</div>
					<div class="margin-row">
						<input type="submit" value="add to cart" id="add-to-cart" class="button">
						<input type="submit" value="check out" id="check-out" class="button">
					</div>
					</form>
					<div class="window-close" id="sizes-close">X</div>
				</div>
			</div><!-- end of sizes wrapper -->	
		</div><!-- end of main wrapper -->
	</div><!-- end of page wrapper -->
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
