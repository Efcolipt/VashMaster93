$(document).ready(function() {
	if ($('.applications')) {
		$('.delete__app').click(function() {
			let id = $(this).parent().attr('data-id');
			let nameDeletePage = $(this).attr('data-name-page');
			$.ajax({
				context:this,
				 type: "POST",
				 url: "deleteApp.php",
				 data: {'id': +id , 'namePage': nameDeletePage},
				 success: function(msg){
				   if (msg == 'true') {
						$(this).parent().fadeOut('400');
				   }else if(msg == 'false'){
				   	    $('.error__message > p').text('Произошла неизвестная ошибка , попробуйте еще раз.');
				   }
				}
			});
		});
		if ($('.applications__row > p').length == 0) {
			$('.applications__row ').append('<p>Пока что пусто :)</p>');
		}
	}

	$('.menu__bar').click(function(){
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
});