$(function () {
	
	$('.btn').click(function() {
		
		if ($('input[name=name]').val() == '') {
			alert('姓名不能为空!');
			$('input[name=name]').focus();
			return false;
		}

		if($('input[name=phone]').val() == ''){
			alert('手机号码不能为空!');
			$('input[name=phone]').focus();
			return false;
		}

		var myreg = /^(((13[0-9]{1})|(14[0-9]{1})|(17[0]{1})|(15[0-3]{1})|(15[5-9]{1})|(18[0-9]{1}))+\d{8})$/;  
		if(!myreg.test($('input[name=phone]').val())){
			alert('请输入有效的手机号码！');
			$('input[name=phone]').focus();
			return false;
		}

		if($('input[name=email]').val() == ''){
			alert('邮箱不能为空!');
			$('input[name=email]').focus();
			return false;
		}

		var reg = /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/; 
		if(!reg.test($('input[name=email]').val())){
			alert("邮箱格式不对");
			$('input[name=email]').focus();
			return false;
		}

		if($('textarea').val() == ''){
			alert('内容不能为空!');
			$('textarea').focus();
			return false;
		}

	});


});