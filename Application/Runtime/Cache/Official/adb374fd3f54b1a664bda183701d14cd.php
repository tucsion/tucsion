<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>新增案例</title>
	<link rel="stylesheet" href="/Public/Official/css/base.css">
	<link rel="stylesheet" href="/Public/Official/css/common.css">
</head>
<body>
	<!-- 位置导航 -->
	<div class="location">
		<div class="left">
			<a href="<?php echo U('System/index');?>">官网管理</a> / 新增管理
		</div>
		<div class="right">
			<a href="<?php echo ($prevPage); ?>">返回</a>
		</div>
	</div>
	<!-- 正文 -->
	<form action="/Official/Case/addCase" method="post">
		<table class="table table-row" cellspacing="1">
			<tr>
				<th>分类</th>
				<td>
					<select name="fid">
						<option value="0">请选择案例分类</option>
						<?php if(is_array($caseCate)): foreach($caseCate as $key=>$vo): ?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; ?>
					</select>
				</td>
			</tr>
			<tr>
				<th>选择模板</th>
				<td>
					<label for="template1"><input type="radio" value="1" name="template" id="template1" checked="checked">正常发布</label>
					<label for="template2"><input type="radio" value="2" name="template" id="template2">FTP发布</label>
				</td>
			</tr>
			<tr id="addFtp">
				
			</tr>
			<tr>
				<th>名称</th>
				<td><input type="text" name="title" class="input50"></td>
			</tr>
			<tr>
				<th>副标题</th>
				<td><input type="text" name="sub_title" class="input50"></td>
			</tr>
			<tr>
				<th>SEO关键字</th>
				<td><input type="text" name="keywords" class="input50"><span class="remarks">多个关键字用英文逗号隔开</span></td>
			</tr>
			<tr>
				<th>SEO描述</th>
				<td><textarea name="description"></textarea></td>
			</tr>
			<tr>
				<th>Tags</th>
				<td><input type="text" name="tags" class="input100"></td>
			</tr>
			<tr>
				<th>内容</th>
				<td><textarea name="content" id="CONTENT" width="100%"></textarea></td>
			</tr>
			<tr>
				<th>缩略图</th>
				<td>
					<img src="/Public/Official/images/upload.png" class="uploadBtn" id="uploadOneBtn"/>
					<input type="hidden" name="thumbnail" id="ajaxImg"/>
				</td>
			</tr>
			<tr>
				<th>Banner</th>
				<td>
					<div id="addPics">

					</div>
					<img src="/Public/Official/images/upload.png" class="uploadBtn" id="uploadPics"/>
				</td>
				<div style="width: 0;height: 0;overflow: hidden;">
					<textarea id="UE1"></textarea>
				</div>
			</tr>
			<tr>
				<th>其他设置</th>
				<td style="line-height: 35px;"> 
					<p>
						作者: <input type="text" name="author"> &nbsp;&nbsp;
						来源: <input type="text" name="source"> 
					</p>
					<p>
						是否显示: 
						<label for="is_display1"><input type="radio" value="1" name="is_display" id="is_display1" checked="checked">是</label>
						<label for="is_display2"><input type="radio" value="0" name="is_display" id="is_display2">否</label>
						&nbsp;&nbsp;&nbsp;&nbsp;
						是否推荐到首页: 
						<label for="is_index1"><input type="radio" value="1" name="is_index" id="is_index1" checked="checked">是</label>
						<label for="is_index2"><input type="radio" value="0" name="is_index" id="is_index2">否</label>
						&nbsp;&nbsp;&nbsp;&nbsp;
						是否置顶: 
						<label for="is_top1"><input type="radio" value="1" name="is_top" id="is_top1">是</label>
						<label for="is_top2"><input type="radio" value="0" name="is_top" id="is_top2" checked="checked">否</label>
					</p>
				</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="提交"></td>
			</tr>
		</table>
	</form>
	<script type="text/javascript" src="/Public/Official/js/jquery-1.9.0.min.js"></script>
	<!-- 上传单张图片 -->
	<script type="text/javascript" src="/Public/Official/js/jquery.form.min.js"></script>
	<script type="text/javascript" src="/Public/Official/js/uploadOnePic.js"></script>
	<form enctype="multipart/form-data" id="ajax-form">
		<input type="file" name="file">
	</form>
	<!-- 上传多张图片 -->
	<script type="text/javascript" src="/Public/Official/js/uploadPics.js"></script>
	<script type="text/javascript" src="/Public/UE/ueditor.config.js"></script>
	<script type="text/javascript" src="/Public/UE/ueditor.all.min.js"></script>
	<!-- 实例化百度编辑器 -->
	<script type="text/javascript">
		var content = UE.getEditor('CONTENT');
		$('input[name=template]').change(function() {
			if ($(this).val() == 1) {
				$('#addFtp').html('');
			}else{
				$('#addFtp').append('<th>FTP路径</th><td><input type="text" name="ftp_url"/></td>');
			}
		});
	</script>
</body>
</html>