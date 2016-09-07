$(function(){
	$('.menu').click(function(){
		var dis=$(this).siblings().css('display');
		if(dis=='none'){
			$(this).siblings().css('display','block');
		}else{
			$(this).siblings().css('display','none');
		}
	})
	$('dd').click(function(){
		$('dd').find('a').removeClass('active');
		$(this).find('a').addClass('active');
	})
})