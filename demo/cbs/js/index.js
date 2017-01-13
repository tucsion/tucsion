var moving = false;
var FILM_GAP = 1000;
var hei = 1136;

$(function() {

	hei = $('.wrapper').height();
	//var hei = 1136;

	imageLoader({
		selector: '#imageLoader',
		progress: function(percent) {
			$('#progress').text(percent);
		},
		callback: function() {
			TweenMax.to('.loading',0.6, {css: {marginTop: -hei}, onComplete: function() {
				initAll();
				
			}});
		}
	});
});


function initAll() {
	
	var cur = 0;
	var max = 2;
	
	moving = true;
	$('.sct-1').show();
	(new TimelineLite())
		.append([
			TweenMax.from($('.sct-1 .bg'), 0.5, {css: {opacity:0},delay:0}),
			TweenMax.from($('.sct-1 .bg01'), 0.5, {css: {opacity:0,y:100},delay:0}),
			TweenMax.from($('.sct-1 .bg02'), 0.5, {css: {opacity:0,y:100},delay:0}),
			TweenMax.from($('.sct-1 .bg03'), 0.5, {css: {opacity:0,y:100},delay:0}),
			TweenMax.from($('.sct-1 .img04'), 0.5, {css: {x:-300,y:200},delay:0.1}),
			TweenMax.from($('.sct-1 .img11'), 0.5, {css: {x:300,y:-200},delay:0.1}),
			TweenMax.from($('.sct-1 .img05'), 0.5, {css: {x:-300,y:200},delay:0.2}),
			TweenMax.from($('.sct-1 .img12'), 0.5, {css: {x:300,y:-200},delay:0.2}),
			TweenMax.from($('.sct-1 .img06'), 0.5, {css: {x:-300,y:200},delay:0.3}),
			TweenMax.from($('.sct-1 .img13'), 0.5, {css: {x:300,y:-200},delay:0.3}),
			TweenMax.from($('.sct-1 .img07'), 0.5, {css: {x:-300,y:200},delay:0.3}),
			TweenMax.from($('.sct-1 .img14'), 0.5, {css: {x:300,y:-200},delay:0.3}),
			TweenMax.from($('.sct-1 .img08'), 0.5, {css: {x:-300,y:200},delay:0.4}),
			TweenMax.from($('.sct-1 .img09'), 0.5, {css: {x:-300,y:200},delay:0.4}),
			TweenMax.from($('.sct-1 .img10'), 0.5, {css: {x:-200,y:200},delay:0.5}),
			TweenMax.from($('.sct-1 .blue'), 0.5, {css: {y:300, opacity:0},delay:0.6}),
			TweenMax.from($('.sct-1 .img01'), 1, {css: {y:-500, opacity:0},delay:0.7}),
			TweenMax.from($('.sct-1 .img02,.sct-1 .img03'), 1.2, {css: { opacity:0},delay:1.5,onComplete:function(){
				moving = false;
			}})
			
		])
	

	touch.on('body', 'touchstart', function(e) {
		e.preventDefault();
	});

	touch.on('body', 'swipeup', function() {
		if (moving) { return false; }
		if (cur < max) {
			cur++;
			nextPage(cur);
		}
	});
	

}


function nextPage(page) {
	var sections = $('section');
	var curSection = sections.eq(page);

	moving = true;

	switch(page) {
		case 1: 
			$('.sct-2').show();
			(new TimelineLite())
				.append([
					//TweenMax.to($('.sct-1 .bg'), 0.2, {css: {opacity:0},delay:0}),
					TweenMax.to($('.sct-1 .bg01'), 0.5, {css: {opacity:0,y:100},delay:0}),
					TweenMax.to($('.sct-1 .bg02'), 0.5, {css: {opacity:0,y:100},delay:0}),
					TweenMax.to($('.sct-1 .bg03'), 0.5, {css: {opacity:0,y:100},delay:0}),
					TweenMax.to($('.sct-1 .img04'), 0.5, {css: {x:-300,y:200},delay:0}),
					TweenMax.to($('.sct-1 .img11'), 0.5, {css: {x:300,y:-200},delay:0}),
					TweenMax.to($('.sct-1 .img05'), 0.5, {css: {x:-300,y:200},delay:0}),
					TweenMax.to($('.sct-1 .img12'), 0.5, {css: {x:300,y:-200},delay:0}),
					TweenMax.to($('.sct-1 .img06'), 0.5, {css: {x:-300,y:200},delay:0}),
					TweenMax.to($('.sct-1 .img13'), 0.5, {css: {x:300,y:-200},delay:0}),
					TweenMax.to($('.sct-1 .img07'), 0.5, {css: {x:-300,y:200},delay:0}),
					TweenMax.to($('.sct-1 .img14'), 0.5, {css: {x:300,y:-200},delay:0}),
					TweenMax.to($('.sct-1 .img08'), 0.5, {css: {x:-300,y:200},delay:0}),
					TweenMax.to($('.sct-1 .img09'), 0.5, {css: {x:-300,y:200},delay:0}),
					TweenMax.to($('.sct-1 .img10'), 0.5, {css: {x:-200,y:200},delay:0}),
					TweenMax.to($('.sct-1 .blue'), 0.5, {css: {y:300, opacity:0},delay:0}),
					TweenMax.to($('.sct-1 .img01'), 1, {css: {y:-500, opacity:0},delay:0}),
					TweenMax.to($('.sct-1 .img02,.sct-1 .img03'),1, {css: { opacity:0},delay:0,onComplete:function(){
						TweenMax.to($('.sct-1'), 0.6, {css: {marginTop: -hei},delay:0})
						moving = false;
					}}),
					
				])
				.append([
					TweenMax.from($('.sct-2 .bg'), 0.5, {css: {opacity:0},delay:0}),
					TweenMax.from($('.sct-2 .bg01'), 0.5, {css: {opacity:0,y:100},delay:0.1}),
					TweenMax.from($('.sct-2 .bg02'), 0.5, {css: {opacity:0,y:100},delay:0.1}),
					TweenMax.from($('.sct-2 .bg03'), 0.5, {css: {opacity:0,y:100},delay:0.1}),
					TweenMax.from($('.sct-2 .img01'), 0.5, {css: {y:300,opacity:0},delay:0.1}),
					TweenMax.from($('.sct-2 .img02'), 0.5, {css: {x:-300,y:200},delay:0.2}),
					TweenMax.from($('.sct-2 .img03'), 0.5, {css: {x:300,y:-200},delay:0.2}),
					TweenMax.from($('.sct-2 .img04'), 0.5, {css: {opacity:0,y:300},delay:0.3}),
					TweenMax.from($('.sct-2 .img05'), 0.5, {css: {x:-300,y:200},delay:0.4}),
					TweenMax.from($('.sct-2 .img06'), 0.5, {css: {x:300,y:-200},delay:0.4}),
					TweenMax.from($('.sct-2 .img07'), 0.5, {css: {x:-300,y:200},delay:0.5}),
					TweenMax.from($('.sct-2 .img08'), 0.5, {css: {x:300,y:-200},delay:0.5}),
					TweenMax.from($('.sct-2 .blue'), 0.5, {css: {y:200,opacity:0},delay:0.6}),
					TweenMax.from($('.sct-2 .w01'), 0.5, {css: {y:-200,opacity:0},delay:0.6}),
					TweenMax.from($('.sct-2 .w02'), 1, {css: {opacity:0},delay:0.6,onComplete:function(){
						moving = false;
					}})
				])
			break;
			case 2: 
			$('.sct-3').show();
			(new TimelineLite())
				.append([
					//TweenMax.to($('.sct-2 .bg'), 0.2, {css: {opacity:0},delay:0}),
					TweenMax.to($('.sct-2 .bg01'), 0.5, {css: {opacity:0,y:100},delay:0}),
					TweenMax.to($('.sct-2 .bg02'), 0.5, {css: {opacity:0,y:100},delay:0}),
					TweenMax.to($('.sct-2 .bg03'), 0.5, {css: {opacity:0,y:100},delay:0}),
					TweenMax.to($('.sct-2 .img01'), 0.5, {css: {y:300,opacity:0},delay:0}),
					TweenMax.to($('.sct-2 .img02'), 0.5, {css: {x:-300,y:200},delay:0}),
					TweenMax.to($('.sct-2 .img03'), 0.5, {css: {x:300,y:-200},delay:0}),
					TweenMax.to($('.sct-2 .img04'), 0.5, {css: {opacity:0,y:300},delay:0}),
					TweenMax.to($('.sct-2 .img05'), 0.5, {css: {x:-300,y:200},delay:0}),
					TweenMax.to($('.sct-2 .img06'), 0.5, {css: {x:300,y:-200},delay:0}),
					TweenMax.to($('.sct-2 .img07'), 0.5, {css: {x:-300,y:200},delay:0}),
					TweenMax.to($('.sct-2 .img08'), 0.5, {css: {x:300,y:-200},delay:0}),
					TweenMax.to($('.sct-2 .blue'), 0.5, {css: {y:200,opacity:0},delay:0}),
					TweenMax.to($('.sct-2 .w01'), 0.5, {css: {y:-200,opacity:0},delay:0}),
					TweenMax.to($('.sct-2 .w02'), 0.5, {css: {opacity:0},delay:0,
						onComplete:function(){
						TweenMax.to($('.sct-2'), 0.6, {css: {marginTop: -hei},delay:0})
						moving = false;
					}})

					
				])
				.append([
					TweenMax.from($('.sct-3 .bg'), 0.5, {css: {opacity:0},delay:0}),
					TweenMax.from($('.sct-3 .bg01'), 0.5, {css: {opacity:0,y:100},delay:0.1}),
					TweenMax.from($('.sct-3 .bg02'), 0.5, {css: {opacity:0,y:100},delay:0.1}),
					TweenMax.from($('.sct-3 .bg03'), 0.5, {css: {opacity:0,y:100},delay:0.1}),
					TweenMax.from($('.sct-3 .yuan'), 0.5, {css: {opacity:0, y:100},delay:0.1}),
					TweenMax.from($('.sct-3 .img01'), 0.5, {css: {x:-300,y:200},delay:0.3}),
					TweenMax.from($('.sct-3 .img02'), 0.5, {css: {x:300,y:-200},delay:0.3}),
					TweenMax.from($('.sct-3 .img03'), 0.5, {css: {x:-300,y:200},delay:0.4}),
					TweenMax.from($('.sct-3 .img04'), 0.5, {css: {x:300,y:-200},delay:0.4}),
					TweenMax.from($('.sct-3 .img05'), 0.5, {css: {x:-300,y:200},delay:0.5}),
					TweenMax.from($('.sct-3 .img06'), 0.5, {css: {x:300,y:-200},delay:0.5}),
					TweenMax.from($('.sct-3 .img07'), 0.5, {css: {x:-300,y:200},delay:0.6}),
					TweenMax.from($('.sct-3 .img08'), 0.5, {css: {x:300,y:-200},delay:0.6}),
					TweenMax.from($('.sct-3 .img09'), 0.5, {css: {x:300,y:-200},delay:0.7}),
					TweenMax.from($('.sct-3 .img10'), 0.5, {css: {x:-300,y:200},delay:0.8}),
					TweenMax.from($('.sct-3 .img11'), 0.5, {css: {x:400,y:-200},delay:0.8}),
					TweenMax.from($('.sct-3 .img12'), 0.5, {css: {opacity:0,y:200},delay:0.9}),
					TweenMax.from($('.sct-3 .blue'), 0.7, {css: {opacity:0,y:200},delay:0.9}),
					TweenMax.from($('.sct-3 .w02'), 0.5, {css: {opacity:0, y:100},delay:0.8}),
					TweenMax.from($('.sct-3 .w01'), 0.5, {css: {opacity:0},delay:0.8,onComplete:function(){
						moving = false;
					}})
				])
			break;
		
	}
}

