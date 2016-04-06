function show_me(id){
		if (id=='all'){
			$('.main-city-info').show();
			$('.resort-info').hide();
		}
		else {
			$('.main-city-info').hide();
			$('.resort-info').hide();
			$('.resort'+id).show();
		}
}

/*$(document).ready(function() {
	$('.resort-info .title-breadcrumbs .main-link').click(function(e){
		e.preventDefault();
		$('.main-city-info').show();
		$('.resort-info').hide();
   });
	$('.cities-popup .resort-link01').click(function(e){
		e.preventDefault();
		$('.main-city-info').hide();
		$('.resort-info').hide();
		$('.resort01').show();
   });
	$('.cities-popup .resort-link02').click(function(e){
		e.preventDefault();
		$('.main-city-info').hide();
		$('.resort-info').hide();
		$('.resort02').show();
   });
	$('.cities-popup .resort-link03').click(function(e){
		e.preventDefault();
		$('.main-city-info').hide();
		$('.resort-info').hide();
		$('.resort03').show();
   });
	$('.cities-popup .resort-link04').click(function(e){
		e.preventDefault();
		$('.main-city-info').hide();
		$('.resort-info').hide();
		$('.resort04').show();
   });
	$('.cities-popup .resort-link05').click(function(e){
		e.preventDefault();
		$('.main-city-info').hide();
		$('.resort-info').hide();
		$('.resort05').show();
   });
});*/


$( window ).resize(function() {
	var win_w = $(window).width();
	$('.main-slider').css('width',$('.page').width());
});


$(function() {
	/*Делаем опять кликабельными*/
	$('a.apartments-popup-link').css('pointer-events','auto');



		var win_w = $(window).width();
		$('.main-slider').css('width',$('.page').width());




});