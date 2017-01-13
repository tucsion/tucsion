$(function(){
	//上传多张图片,借助百度ueditor上传功能
	var ue = UE.getEditor('UE1');

	$('#uploadPics').click(function() {
		var myImage = ue.getDialog("insertimage");
		myImage.open();
		//侦听图片上传
		ue.addListener('beforeInsertImage', function (t, arg) {
			$.each(arg,function(index,val){
				$('#addPics').append('<div class="addPic"><img src="'+val.src+'" /><span><i class="delPic" title="删除图片"></i></span><input type="hidden" name="pics[]" value="'+val.src+'"/></div>');
				$('.addPic').on({
					mouseenter : function(){
						$(this).children('span').animate({'height': '24px'}, 'fast');
					},
					mouseleave : function(){
						$(this).children('span').animate({'height': '0'}, 'fast');
					}
				});
				$('i.delPic').on('click',function() {
					$(this).parent('span').parent('.addPic').remove();
				});
			});
			arg.length = 0;//清空当前数组，否则再下次上传时，会重复上传
		});
	});

	//如下on方法为1.9新增,如果是<1.9,请用live()
	$('.addPic').on('mouseenter',function() {
		$(this).children('span').animate({'height': '24px'}, 'fast');
	});
	$('.addPic').on('mouseleave',function() {
		$(this).children('span').animate({'height': '0'}, 'fast');
	});
	$('i.delPic').on('click',function() {
		$(this).parent('span').parent('.addPic').remove();
	});
	
	
	
});
