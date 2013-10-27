/* Author:



*/






$(document).ready(function(){
	
	$('#menu-mainnav li').addClass('two columns');

	$('.goto-top').click(function(e){
		e.preventDefault();
		$('html, body').animate({scrollTop: 0}, 200);
	});

	$('.scrollto').click(function(e){
		e.preventDefault();
		console.log($(this).attr('href'));
		$('html, body').animate({scrollTop:$($(this).attr('href')).position().top - 50}, 200);
	});


	tryjson();

	// $('.tcp_dynamic_option_panel#tcp-dynamic-option-top').css('display','none');
	// $('.tcp_dynamic_option_panel#tcp-dynamic-option-roundcolumn').last().css('display','none');

	$('#myModal img.lazy').lazyload({ threshold : 5 ,effect:'fadeIn', container: $("#myModal  .modal-body")});
	$('#myModal .thumbnail').first().css('background-color', 'rgb(221, 243, 253)').addClass('active');
	$('#myModal .thumbnail').on('click touchstart',function(e){
		$('#myModal .thumbnail').removeClass('active').css('background-color', 'rgb(255, 255, 255)');
		$(this).addClass('active').css('background-color', 'rgb(221, 243, 253)');
		$('.columns-container .thumbnail img').attr('src',$(this).find('img').attr('src'));
		console.log($(this).find('img').attr('src'));
		$('#myModal').modal('hide')
	})
	$('#myModal').on('shown', function() {
        $("#myModal  .modal-body").scroll();
    })

	$('#myModal-Tops  img.lazy').lazyload({ threshold : 5 ,effect:'fadeIn', container: $("#myModal-Tops  .modal-body")});
	$('#myModal-Tops').on('shown', function() {
        $("#myModal-Tops  .modal-body").scroll();
    })
    $('#myModal-Tops .thumbnail').first().css('background-color', 'rgb(221, 243, 253)').addClass('active');
    $('#myModal-Tops .thumbnail').on('click touchstart',function(e){
		$('#myModal-Tops .thumbnail').removeClass('active').css('background-color', 'rgb(255, 255, 255)');
		$(this).addClass('active').css('background-color', 'rgb(221, 243, 253)');
		$('.tops-container .thumbnail img').attr('src',$(this).find('img').attr('src'));
		console.log($(this).find('img').attr('src'));
		$('#myModal-Tops').modal('hide');
	})
	$('#myModal').on('shown', function() {
        $("#myModal  .modal-body").scroll();
    })

	$(".tcp_dynamic_options_92").val('blue');
	console.log(' -  ' +  $(".tcp_dynamic_options_92 option").html());
});



function tryjson(){
	console.log('json');
//http://trophyworks.com/product/style-b/?json=get_recent_post&page_slug=style-b&dev=1
//
//$.getJSON('http://www.trophyworks.com/?json=get_recent_post&post_type=product',
	$.getJSON('/product/style-b/?json=get_recent_post&page_slug=style-b&dev=1',
		function(json) {
			console.log(json);
			console.log('---------------------------------------');
			console.log(json.post);
			console.log(json.content);
			
			//pages = json.posts;
			
		
		}
	);
	//?json=&post_type=tcp_dynamic_options
	$.getJSON('/?json=get_recent_post&page_type=tcp_dynamic_options&dev=1',
		function(json) {
			console.log(json);
			console.log('--------------qerqw-------------------------');
			console.log(json.post);
			console.log(json.content);
			
			//pages = json.posts;
			
		
		}
	);

}