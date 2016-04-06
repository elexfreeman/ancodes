$(window).on('load', function() {
	$('#weather-slider').movingBoxes({
		startPanel   : 1,  
		reducedSize  : 1,   
		wrap         : true,   
		buildNav     : false, 
		width		 : 500,
		panelWidth	 : 319,
		initAnimation: false	
	});
});