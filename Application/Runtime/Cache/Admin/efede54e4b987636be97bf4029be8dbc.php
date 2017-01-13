<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>新增部门</title>
	<link rel="stylesheet" href="/Public/Admin/css/base.css">
	<link rel="stylesheet" href="/Public/Admin/css/common.css">
</head>
<body>
	<!-- 位置导航 -->
	<div class="location">
		<div class="left">
			<a href="<?php echo U('index');?>">权限管理</a> / 新增部门
		</div>
		<div class="right">
			<a href="<?php echo ($prevPage); ?>">返回</a>
		</div>
	</div>
	<!-- 正文 -->
	<form action="/Admin/Auther/addGroup" method="post">
		<table class="table table-row" cellspacing="1">
			<tr>
				<th>部门名称</th>
				<td><input type="text" name="title"></td>
			</tr>
			<tr>
				<th></th>
				<td><input type="submit" value="提交"></td>
			</tr>
		</table>
	</form>
</body>
</html>