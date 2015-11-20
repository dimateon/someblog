$(document).ready(function(){
	$('span').click(function(){
		$('.dropdown').toggle('slow');
		$('ul').removeClass('hide')
	});
})
