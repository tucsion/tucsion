$(function() {

	$('#huihuBtn').click(function(){
		$('#huihu').fadeIn();
	});

	var winW = $(window).width();
	var winH = $(window).height();

	var huihuW = $('.huihu').width();
	var huihuH = $('.huihu').height();

	$('#huihu,.huihu-bg').css({
		width : winW,
		height : winH
	});

	$('.huihu').css({
		left : (winW - huihuW) / 2,
		top : (winH - huihuH) / 2
	});

	$('.huihu-bg').click(function(){
		$('#huihu').fadeOut();
	});

});