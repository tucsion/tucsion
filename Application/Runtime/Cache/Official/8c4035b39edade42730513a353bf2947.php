<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>新增Banner</title>
	<link rel="stylesheet" href="/Public/Official/css/base.css">
	<link rel="stylesheet" href="/Public/Official/css/common.css">
</head>
<body>
	<!-- 位置导航 -->
	<div class="location">
		<div class="left">
			<a href="<?php echo U('System/index');?>">官网管理</a> / 新增Banner
		</div>
		<div class="right">
			<a href="<?php echo ($prevPage); ?>">返回</a>
		</div>
	</div>
	<!-- 正文 -->
	<form action="/Official/Banner/addBanner" method="post">
		<table class="table table-row" cellspacing="1">
			<tr>
				<th>标题</th>
				<td><input type="text" name="title" class="input50"></td>
			</tr>
			<tr>
				<th>副标题</th>
				<td><input type="text" name="sub_title" class="input100"></td>
			</tr>
			<tr>
				<th>网址</th>
				<td><input type="text" name="url" class="input50"></td>
			</tr>
			<tr>
				<th>图片</th>
				<td>
					<img src="/Public/Official/images/upload.png" class="uploadBtn" id="uploadOneBtn"/>
					<input type="hidden" name="banner" id="ajaxImg"/>
				</td>
			</tr>
			<tr>
				<th>是否显示</th>
				<td>
					<label for="is_display1">
						<input type="radio" name="is_display" value="1" id="is_display2" checked="checked">显示
					</label>
					<label for="is_display2">
						<input type="radio" name="is_display" value="0" id="is_display2">不显示
					</label>
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
</body>
</html>