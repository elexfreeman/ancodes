function show_me(id,j){
	console.info(id+j);
		if (id=='all'){
			$('.main-city-info'+j).show();
			$('.rr-i-'+j).hide();
		}
		else {
			$('.main-city-info'+id).hide();
			$('.rr-i-'+id).hide();
			$('.resort'+id+j).show();
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





$(function() {
	/*Делаем опять кликабельными*/
	$('a.apartments-popup-link').css('pointer-events','auto');


});