var colors = {'t-blue':'#039ddd', 
			't-ash':'#8f8f90', 
			't-black':'#222222', 
			't-yellow':'#eccf47', 
			't-darkgreen':'#3c5542', 
			't-red':'#f53a4b', 
			't-green':'#0fc497',
			't-white':'#eeeeee',
			't-darkblue':'#285ecd',
			't-pink':'#ca34d3'
			};

var currentTColor = '#039ddd'; 			// stores current tshirt color
var currentLogoColor = '#eeeeee';		// stores current logo color
var currentActive = 'tshirt';			// stores current avtive elemenet (tshirt/artwork)
var currentArtwork;						// stores current active artwork
var currentGender = 'male';				// stores current active gender (male/female)

// canvas variables
var designCanvas = document.getElementById('design-canvas');
var designContext = designCanvas.getContext("2d");
var design_bg;
var design_area;
var design_bg_female;
var design_area_female

var artworkCanvas = document.createElement('canvas');
var artworkCtx = artworkCanvas.getContext('2d');

var colorCanvas = document.createElement('canvas');
var colorCtx = colorCanvas.getContext('2d');

// cart items

var cartItems = [];
var cartItemNo = 0;

$( document ).ready(function(){
	
	//main initialisation for color boxes/design floor /artworks
	genarateColorBoxes();
	initDesignCanvas();
	initArtworks();
	generateStyling();

	// on click functions
	$('#tshirt-color-tab').click(function(){
		currentActive = 'tshirt';
		generateStyling();
	});

	$('#design-color-tab').click(function(){
		currentActive = 'artwork';
		generateStyling();
	});

	$('#male-icon').click(function(){
		currentGender = 'male';
		generateStyling();
		loadGenderBg(currentGender);
	});

	$('#female-icon').click(function(){
		currentGender = 'female';
		generateStyling();
		loadGenderBg(currentGender);
	});

	$(document).on('click','.color-block', function(e){
		var color = e.target.id;
		if (currentActive == 'tshirt') {
			addTshirt(colors[color]);
		}else{
			currentLogoColor = colors[color];
			addArtwok(currentArtwork);
		}
		generateStyling();
		
	});

	$(document).on('click','.sample-design', function(e){
		var artwork = $(e.target).data('artwork-id');
		addArtwok(artwork);
		generateStyling();
	});


	$('#more-designs').click(function(){
		var designView = $('#page-wrapper');
		designView.removeClass('home-view');
		designView.addClass('design-view');
	});

	$('#check-out').click(function(){
		var designView = $('#page-wrapper');
		designView.removeClass('home-view');
		designView.addClass('cart-view');
	});

	$('.continue-shopping').click(function(){
		var designView = $('#page-wrapper');
		designView.removeClass('cart-view');
		designView.addClass('home-view');
	});

	$('#add-to-cart').click(function(){
		saveImageAsData();
		addToCart();
		cartItemNo = cartItemNo + 1;
	});

	//removing items

	$(document).on('click', '.remove-item', function(){
		var checkout_item = $(this).parent().parent();
		checkout_item.remove();
		cartItems.splice(0,1);
	});

	
	
});

// genedate active elements css

function generateStyling(){
	var genderMale = $('#male-icon');
	var genderFemale = $('#female-icon');
	
	if (currentGender == 'male') {
		genderFemale.removeClass('active');
		genderMale.addClass('active');

	}else if(currentGender == 'female') {
		genderMale.removeClass('active');
		genderFemale.addClass('active');
	}

	for (var color in colors) {
		var activeColor = $('#'+color);

		if (currentActive == 'tshirt' && currentTColor == colors[color]) {
			activeColor.addClass('active');
		}else if(currentActive == 'artwork' && currentLogoColor == colors[color]){
			activeColor.addClass('active');
		}else{
			activeColor.removeClass('active');
		}
	}

	// active (tshirt/artwork) styling

	var activeTshirt = $('#tshirt-color-tab');
	var activeDesign = $('#design-color-tab');

	if(currentActive == 'tshirt'){
		activeDesign.removeClass('active');
		activeTshirt.addClass('active');
	}else{
		activeTshirt.removeClass('active');
		activeDesign.addClass('active');
	}

	// active (artwork) styling
	for (var i = 0; i < artworks.length; i++) {
	
		var activeArtwork = $('#'+artworks[i]['id']);

		if (i == currentArtwork) {
			activeArtwork.addClass('active');
		}else{
			activeArtwork.removeClass('active');
		}

		
	}
	
	

}

// function for color boxes

function genarateColorBoxes(){
	var container = $('#color-wrapper');
	var count = 0;
	var currentRow;

	for(var color in colors){
		if (count % 5 == 0) {
			currentRow = $('<div class="color-selection-row">');
			container.append(currentRow);
		};

		var box = $('<div class="color-block"></div>');
		box.css('background-color', colors[color]);
		box.attr('id', color);

		currentRow.append(box);

		count++;
	}
}

// main initialisation for the artworks

function initArtworks(){

	var loader = new PxLoader();
	for (var i = 0; i < artworks.length; i++) {
		artworks[i].image = loader.addImage(http_path+artworks[i]['url']);
	};

	loader.addCompletionListener(function(){
		generateArtworks();
	});

	loader.start();
}

// main initialisation for the design floor

function initDesignCanvas(){
	designCanvas.width = $(designCanvas.parentNode).innerWidth();
	designCanvas.height = $(designCanvas.parentNode).innerHeight();

	var loader = new PxLoader();
		design_bg_male = loader.addImage(http_path+'/images/design_bg.png');
		design_area_male = loader.addImage(http_path+'/images/design_area.png');
		design_bg_female = loader.addImage(http_path+'/images/design_bg_female.png');
		design_area_female = loader.addImage(http_path+'/images/design_area_female.png');
	
	loader.addCompletionListener(function() {
		loadGenderBg(currentGender); 	
	});

	loader.start();

}

// selecting which gender design floor to load

function loadGenderBg(gender){
	if(gender == 'male'){
		designContext.clearRect(0, 0, designCanvas.width, designCanvas.height);
		design_bg = design_bg_male;
		design_area = design_area_male;
		drawImage(design_bg, designCanvas, designContext);
		addTshirt(currentTColor);
	}else{
		designContext.clearRect(0, 0, designCanvas.width, designCanvas.height);
		design_bg = design_bg_female;
		design_area = design_area_female;
		drawImage(design_bg, designCanvas, designContext);
		addTshirt(currentTColor);
	}
}

function drawImage(image, canvas, ctx, opacity){
	if (opacity == undefined) {
		opacity = 1;
	}
	var image_width;
	var image_height;

	ctx.globalAlpha = opacity;
	image_height = canvas.height;
	image_width = image.width / image.height * canvas.height;

	var x_pos  = (canvas.width - image_width) / 2;

	ctx.drawImage(image, x_pos, 0, image_width, image_height);
}

function addTshirt(color){
	currentTColor = color;
	colorCanvas = document.createElement('canvas');
	colorCtx = colorCanvas.getContext('2d');

	colorCanvas.width = designCanvas.width;
	colorCanvas.height = designCanvas.height;

	drawImage(design_area, colorCanvas, colorCtx);
	var map = colorCtx.getImageData( 0, 0, colorCanvas.width, colorCanvas.height);
	var imageData = map.data;
	
	// convert to grayscale

	for (var i = 0; i < imageData.length; i+=4) {
		var r = imageData[i];
		var g = imageData[i+1];
		var b = imageData[i+2];

		var avg = (r+g+b)/3;

		imageData[i] = imageData[i+1] = imageData[i+2] = avg; 
	};
	
	map.data = imageData;

	colorCtx.putImageData(map,0,0);

	// overlay with colors
	
	colorCtx.globalCompositeOperation = 'overlay';
	//colorCtx.globalAlpha = 0.5;
	colorCtx.fillStyle = color;
	colorCtx.fillRect(0,0,colorCanvas.width,colorCanvas.height);

	colorCtx.globalCompositeOperation = 'destination-in';
	drawImage(design_area, colorCanvas, colorCtx);

	colorTransition(colorCanvas, designCanvas, designContext, 0);
}

function colorTransition(image, canvas, ctx, opacity){
	window.requestAnimationFrame(function(){
		drawImage(image, canvas, ctx, opacity);
		drawImage(artworkCanvas, canvas, ctx);
		drawImage(design_bg, designCanvas, designContext);
		opacity += 0.05;
		if(opacity <= 1){
			colorTransition(image, canvas, ctx, opacity);
		}else{
			designContext.clearRect(0, 0, designCanvas.width, designCanvas.height);
			drawImage(image, canvas, ctx, 1);
			drawImage(artworkCanvas, canvas, ctx);
			drawImage(design_bg, designCanvas, designContext);
		}
	});
}

// creating design objects

var artworks = [
			{
				id : 'i_am_danger',
				url : '/images/designs/i_am_danger.png'
			},
			{
				id : 'icc_cwc', 
				url : '/images/designs/icc_cwc_sri_lanka.png'
			},
			{
				id : 'sons_of_anarchy', 
				url : '/images/designs/sons_of_anarchy.png'
			},
			{
				id : 'winter_is_coming', 
				url : '/images/designs/winter_is_coming.png'
			}
	];



function generateArtworks(){
	var container = $('#artworks-wrapper');
	var count = 0;
	var currentRow;

	for (var i = 0; i < artworks.length; i++) {
		 if(count % 2 == 0){
		 	currentRow = $('<div class="sample-designs-row">');
		 	container.append(currentRow);
		 }

		 var box = $('<div class="sample-design"><div class="artwork-wrapper"></div></div>');
		 box.children('.artwork-wrapper').css('background-image', 'url('+http_path+artworks[i]['url']+')');
		 box.children('.artwork-wrapper').attr('id', artworks[i]['id']);
		 box.children('.artwork-wrapper').data('artwork-id', i);

		 currentRow.append(box);

		 count++;
	};
}

// add artwork to canvas

function addArtwok(artwork){
	currentArtwork = artwork;
	if (currentArtwork == undefined) {
		return;
	};
	artworkCanvas = document.createElement('canvas');
	artworkCtx = artworkCanvas.getContext('2d');
	artworkCtx.clearRect(0,0,artworkCanvas.width,artworkCanvas.height);
	artworkCanvas.width = designCanvas.width;
	artworkCanvas.height = designCanvas.height;

	var artwork_object = artworks[artwork].image;
		
	var image_height = artworkCanvas.height/10*4;
	var image_width = artwork_object.width/artwork_object.height*image_height;

	var x_pos = (artworkCanvas.width-image_width)/2;
	var y_pos = artworkCanvas.height/7;

	artworkCtx.fillStyle = currentLogoColor;
	artworkCtx.fillRect(0, 0, artworkCanvas.width, artworkCanvas.height);
	artworkCtx.globalCompositeOperation = 'destination-in';
	artworkCtx.drawImage(artwork_object, x_pos, y_pos, image_width, image_height);

	refreshDesignCanvas();
}

function refreshDesignCanvas(){
	designContext.clearRect(0, 0, designCanvas.width, designCanvas.height);
	drawImage(colorCanvas, designCanvas, designContext);
	drawImage(artworkCanvas, designCanvas, designContext);
	drawImage(design_bg, designCanvas, designContext);
}

function saveImageAsData(){
	// var dataURL = designCanvas.toDataURL();
	// document.getElementById('canvasImg').style.backgroundImage = "url("+dataURL+")";
}

function addToCart(){
	var dataURL = designCanvas.toDataURL();
	cartItems[cartItemNo] = {'id':currentArtwork,
							'url':dataURL,
							'tshirtColor':currentTColor
							}
	generateCartItems(cartItemNo);
	console.log(cartItems[cartItemNo]);
}

function generateCartItems(cartItemNo){
	var container = $('#cart-items');
		var box = $('<div class="item-wrapper">\
							<div class="item-container item-image-container">\
								<div class="item-image" id="canvasImg"></div>\
							</div>\
							<div class="item-container item-size-container">\
								You have been ordered :\
								<ul id="cart-sizes">\
									<li><div class="cart-size-block"><label>small</label></div><div class="cart-size-block">: <input type="text" name="small" value="0"></div></li>\
									<li><div class="cart-size-block"><label>medium</label></div><div class="cart-size-block">: <input type="text" name="medium" value="0"></div></li>\
									<li><div class="cart-size-block"><label>large</label></div><div class="cart-size-block">: <input type="text" name="large" value="0"></div></li>\
									<li><div class="cart-size-block"><label>extra-large</label></div><div class="cart-size-block">: <input type="text" name="extra-large" value="0"></div></li>\
								</ul>\
							</div>\
							<div class="item-container item-price-container">\
								<div class="item-title">Rs. 950.00</div>\
								<div class="item-details"></div>\
								<div class="remove-item">Remove</div>\
							</div>\
						</div> <!--  end of an item -->');
		// <div class="item-wrapper"><div class="item-container item-image-container"><div class="item-image" id="canvasImg"></div></div><div class="item-container item-size-container">You have been ordered :<ul id="cart-sizes"><li><div class="cart-size-block"><label>small</label></div><div class="cart-size-block">: <input type="text" name="small" value="0"></div></li><li><div class="cart-size-block"><label>medium</label></div><div class="cart-size-block">: <input type="text" name="medium" value="0"></div></li><li><div class="cart-size-block"><label>large</label></div><div class="cart-size-block">: <input type="text" name="large" value="0"></div></li><li><div class="cart-size-block"><label>extra-large</label></div><div class="cart-size-block">: <input type="text" name="extra-large" value="0"></div></li></ul></div><div class="item-container item-price-container"><div class="item-title">Rs. 950.00</div><div class="item-details"></div><div class="remove-item"><a href="">Remove</a></div></div></div><!-- end of an item -->
		box.find('.item-image').css('background-image', 'url('+ cartItems[cartItemNo]['url'] +')');
		container.append(box);
}



