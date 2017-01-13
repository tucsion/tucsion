$(function(){

//管理员删除弹窗
$('.delBtn').click(function() {
	if (confirm("确定删除吗?")) {
		location.href = $(this).attr('href');
	}else{
		return false;
	}
});


});