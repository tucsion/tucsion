$(function() {
	//汉堡导航栏
	$('#navBtn').click(function() {
		$('#banner .text,#banner .arrow').fadeToggle('400');
		
		$('.nav').slideToggle('slow');

		if ($('#navBtn i img').attr('src') == 'images/mbNav.png') {
			$('#navBtn i img').attr('src', 'images/mbNav2.png');
		} else if ($('#navBtn i img').attr('src') == 'images/mbNav2.png') {
			$('#navBtn i img').attr('src', 'images/mbNav.png');
		}
		
	});

	//招聘页面
	$('ul.join_ul li span.title').click(function() {
		if ($(this).parent('li').hasClass('active')) {
			$(this).parent('li').removeClass('active');
			$(this).siblings('dl').slideUp('slow');
		} else {
			$(this).parent('li').siblings('li').removeClass('active').children('dl').slideUp('slow');
			$(this).parent('li').addClass('active').children('dl').slideDown('slow');
		}
	});

	//导航高度根据下拉动作收缩
	var headH = $('#head').height();

	var explorer = navigator.userAgent;
	if (explorer.indexOf("IE 8") < 0) {
		if ($(window).width() > 767) {
			$(window).scroll(function () {
				setHead();
			});
			reFresh();
		}
	}
	function setHead() {
		var scrollT = $(window).scrollTop();

		if (scrollT <= headH) {
			$('#head').height(headH - scrollT / 2);
			$('.head-bg').css({
				'opacity': 1 - (scrollT * 0.2) / headH
			});
			$('ul.nav li a').css('font-size', 18 - (scrollT * 2) / headH);
			
		}
	}
	
	function reFresh() {
		var scrollT = $(window).scrollTop();
		if (scrollT > headH) {
			$('#head').height(headH / 2);
			$('ul.nav li a').css('font-size', '14px');

		} else {
			$('#head').height(headH - scrollT / 2);
			$('ul.nav li a').css('font-size', 18 - (scrollT * 2) / headH);
			
		}
	}


});