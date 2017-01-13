$(document).ready(function(){

	//案例内页轮播图
	$('.countPics').find('li:first').addClass('on');
	$('.bigPics').find('li:first').addClass('active');
	var isNow = 0;
	var nums = $(".countPics li");
	var init;
	$('.countPics li').hover(function() {
		var pos = $(this).index();
		$(this).addClass('on').siblings().removeClass();
		$('.bigPics li').eq(pos).fadeIn(1000).siblings().fadeOut(1000);
		clearInterval(init)
		isNow = pos;
	}, function () {
	    start()
	});
	
	function start() {
	   init= setInterval(function () {
	        if (isNow >= nums.length-1) {
	            isNow = 0;
	        } else {
	            isNow++;
	        }
	        nums.eq(isNow).addClass('on').siblings().removeClass();
	        $('.bigPics li').eq(isNow).fadeIn(1000).siblings().fadeOut(1000);
	    }, 3000);
	}
	start();
});