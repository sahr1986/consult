$(document).ready(function(){

	$(".sidenav").sidenav();

	$('select').formSelect();

	$('.slider').slider({
		indicators: false,
		height: 500,
		transition: 500,
		interval: 6000
	});

});