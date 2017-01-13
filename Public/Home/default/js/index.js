/// <reference path="jquery.min.js" />
var moreB = 0;
var downA = null;
var moreh = 0;
var morebottom = 0;
$(function () {
	//banner 下箭头
	moreB = $('#indexBanner .more').offset().top;
	moreh = $('#indexBanner .more').height();
	morebottom = zh - moreB - moreh;
	if (parseInt( moreB) == 0) {
		morebottom = 40;
	}
	downA = setInterval(animateA, 1000);
	//alert("morebottom:" + morebottom + ",moreB:" + moreB+",zh:"+zh)
	$('#dianji').hover(function () {
		clearInterval(downA);
		$('#indexBanner .more').animate({
			'opacity': 1,
			'filter': 'alpha(opacity=100)'
		}, 500);
	}, function () {
		downA = setInterval(animateA, 1000);
	});

	var icount = 0;
	//导航栏
	$('#navBtn').click(function () {
		$('.nav').slideToggle('slow');
			if (icount%2!=0) {
				$('.head-bg').removeAttr("style")
				$("#head h1 img").attr("src", ThinkPHP['IMG'] + "/indexlogo.png")
			} else {
				$('.head-bg').css({ "background": "rgba(255, 255, 255, 0.95)", "opacity": "1" })
				$("#head h1 img").attr("src", ThinkPHP['IMG'] + "logo.png")
			}
			icount++;
		if ($('#navBtn i img').attr('src') == 'images/mbNav.png') {
			$('#navBtn i img').attr('src', 'images/mbNav2.png');
		} else if ($('#navBtn i img').attr('src') == 'images/mbNav2.png') {
			$('#navBtn i img').attr('src', 'images/mbNav.png');
		}
	});


	var headH = $('#head').height();
	var topH = $("#service").offset().top;

	var explorer = navigator.userAgent;
	if (explorer.indexOf("IE 8") < 0) {
		if ($(window).width() > 767) {
			$(window).scroll(function () {
				setHead();
				navbg();
			});

			reFresh();
			navbg();
		} else {
			$(window).scroll(function () {
				navbg();
			});
		}

	}
	function setHead() {
		var scrollT = $(window).scrollTop();
		if (scrollT <= headH) {
			$('#head').height(headH - scrollT / 2);
			//$('.head-bg').css({
			//    'opacity': 1 - (scrollT * 0.2) / headH
			//});
			$('ul.nav li a').css('font-size', 18 - (scrollT * 4) / headH);
		}

	}
	function reFresh() {
		var scrollT = $(window).scrollTop();
		if (scrollT > headH) {
			$('#head').height(headH / 2);
			$('ul.nav li a').css('font-size', '14px');
		} else {
			$('#head').height(headH - scrollT / 2);
			$('ul.nav li a').css('font-size', 18 - (scrollT * 4) / headH);
		}

	}
	function navbg() {
		var scrollT = $(window).scrollTop();
		if (scrollT >= topH) {
			$('.head-bg').addClass("head-bgtop");
			$('#head .head ul.nav li a').addClass("color");
			$('#head .head-bg').addClass('indexHead');
			$("#head h1 img").attr("src", ThinkPHP['IMG'] + "/logo.png");
		} else {
			$('.head-bgtop').removeClass("head-bgtop");
			$('#head .head ul.nav li a').removeClass("color");
			$('#head .head-bg').removeClass('indexHead');
			$("#head h1 img").attr("src", ThinkPHP['IMG'] + "/indexlogo.png");
		}
	}



});
$(window).resize(function () {
	moreB = $('#indexBanner .more').position().top;
	moreh = $('#indexBanner .more').height();
	morebottom = zh - moreB - moreh;
	//console.log(morebottom + ",moreh:" + moreh + "zh:" + zh + "moreB:" + moreB)
	downA = setInterval(animateA, 1000);
})
function animateA() {

	$('#indexBanner .more').animate({

		'bottom': morebottom - 20,
		'opacity': 1,
		'filter': 'alpha(opacity=100)'
	}, 500);

	$('#indexBanner .more').animate({

		'bottom': morebottom,
		'opacity': 0.1,
		'filter': 'alpha(opacity=10)'
	}, 500);
}

//banner内部信息

function setBannerContainer() {
	var bannerContainer = $('#indexBanner .container');
	// bannerContainer.css('margin-top', -$(this).height());
	$.each(bannerContainer, function (index, val) {
		$(this).css('margin-top', -$(this).height() / 2);
	});
}
setBannerContainer();

$(function(){
	var animate = [$('h2'),$('.subTitle'),$('.service'),$('.case-list li'),$('.more'),$('.about')];
	
	var  flowUp = function(arr){
		$.each(arr, function(index, val) {
			if ($(this).length > 1) {
				flowUp($(this));
			}else{
				if (!$(this).hasClass('animated')) {
					if ($(this).offset().top < ($(window).height() + $(window).scrollTop() - 20) ) {
						$(this).addClass('animated fadeInUp');
					}
				}
			}
		});
	}


	flowUp(animate);

	$(window).scroll(function() {
		flowUp(animate);
	});
});




