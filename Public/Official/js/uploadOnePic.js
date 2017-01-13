$(function() {

	//用于只上传一张图片的情况
	//借助jquery.form.js异步上传
	
	$('#uploadOneBtn').click(function() {
		$('#ajax-form').children('input[name=file]').click();
		$('#ajax-form').children('input[name=file]').change(function() {
			$('#ajax-form').ajaxSubmit({
				url : '/Official/Upload/uploadOneImg',
				type : 'post',
				success : function(data){
					$('#uploadOneBtn').attr('src', data);
					$('#ajaxImg').val(data);
				}
			});
		});
	});



});




