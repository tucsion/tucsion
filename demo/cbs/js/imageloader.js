function imageLoader (options) {

	// options contains selector, callback, progress

	var images = $(options.selector).find('img');
	var imageUrls = [];
	
	images.each(function() {
		var src = $(this).attr('loadsrc');
		if (src) {
			imageUrls.push(src);
		}
	});


	var loaded = 0;
	var count = imageUrls.length;

	loadImage(loaded);

	function loadImage(index) {
		if (index < count) {
			var img = new Image();
			img.onload = function() {
				loaded++;
				if (options.progress) { options.progress(Math.round(loaded/count*100)+'%'); }
				loadImage(loaded);
			}
			img.onerror = function() {
				loaded++;
				if (options.progress) { options.progress(Math.round(loaded/count*100)+'%'); }
				loadImage(loaded);
			}
			img.src = imageUrls[index];
		} else {
			options.callback();
		}
	}
}