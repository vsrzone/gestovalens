var colors = {'t-blue':'#039ddd', 
			't-ash':'#8f8f90', 
			't-black':'#222222', 
			't-yellow':'#eccf47', 
			't-darkgreen':'#3c5542', 
			't-red':'#f53a4b', 
			't-green':'#0fc497',
			't-white':'#eeeeee',
			't-darkblue':'#103684',
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

var artworkCanvas = document.createElement('canvas');
var artworkCtx = artworkCanvas.getContext('2d');

var colorCanvas = document.createElement('canvas');
var colorCtx = colorCanvas.getContext('2d');

$( document ).ready(function(){
	
	//main initialisation for color boxes/design floor /artworks
	genarateColorBoxes();
	initDesignCanvas();
	initArtworks();

	// on click functions
	$('#tshirt-color-tab').click(function(){
		currentActive = 'tshirt';
	});

	$('#design-color-tab').click(function(){
		currentActive = 'artwork';
	});

	$('#male-icon').click(function(){
		currentGender = 'male';
		initDesignCanvas();
	});

	$('#female-icon').click(function(){
		currentGender = 'female';
		initDesignCanvas();
	});

	$(document).on('click','.color-block', function(e){
		var color = e.target.id;
		if (currentActive == 'tshirt') {
			addTshirt(colors[color]);
		}else{
			currentLogoColor = colors[color];
			addArtwok(currentArtwork);
		};
	});

	$(document).on('click','.sample-design', function(e){
		var artwork = $(e.target).data('artwork-id');
		addArtwok(artwork);
	});

	
});

// genedate active elements css

function generateStyling(){
	var gender_male = $('#')
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
	if (currentGender == 'male') {
		design_bg = loader.addImage(http_path+'/images/design_bg.png');
		design_area = loader.addImage(http_path+'/images/design_area.png');
	}else{
		design_bg = loader.addImage(http_path+'/images/design_bg_female.png');
		design_area = loader.addImage(http_path+'/images/design_area_female.png');
	}
	

	loader.addCompletionListener(function() { 
		drawImage(design_bg, designCanvas, designContext);
		addTshirt(currentTColor);		
	});

	loader.start();

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