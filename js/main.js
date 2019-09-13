$(document).ready(function(){
	$('.img__portfolio > img ').mouseover(function(event) {
		$(this).parent().parent().find('.title__img__portfolio').stop().fadeIn(100);
	});
	$('.img__portfolio > img ').mouseout(function(event) {
		$(this).parent().parent().find('.title__img__portfolio').stop().fadeOut(100);
	});
	$('.owl-carousel').owlCarousel({
		loop:true,
		margin:10,
		dots:true,
		items: 1
	
	});
	// For link

	$("a").click(function() {
		var elementClick = $(this).attr("href")
		var destination = $(elementClick).offset().top;
		destination -= 30;
		jQuery("html:not(:animated),body:not(:animated)").animate({
			scrollTop: destination
		}, 800);
		return false;
	});

	$('.menu__bar').click(function(){
		console.log('asd');
		let data_id = $(this).attr('data-id');
		if (data_id == 1) {
			$('.nav').stop().slideUp('slow');
			data_id--;
			$(this).attr('data-id',data_id);
		}else{
			$('.nav').stop().slideDown('slow');
			data_id++;
			$(this).attr('data-id',data_id);
		}
		console.log('asd');
		
	});

	$('.menu__admin__bar').click(function(){
		console.log('asd');
		let data_id = $(this).attr('data-id');
		if (data_id == 1) {
			$('.nav__admin').stop().slideUp('slow');
			data_id--;
			$(this).attr('data-id',data_id);
		}else{
			$('.nav__admin').stop().slideDown('slow');
			data_id++;
			$(this).attr('data-id',data_id);
		}
		console.log('asd');
		
	});
	
	$(".phone__reg").mask("+7(999)999-99-99");
});