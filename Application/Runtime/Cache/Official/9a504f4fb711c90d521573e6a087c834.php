<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Banner设置</title>
	<link rel="stylesheet" href="/Public/Official/css/base.css">
	<link rel="stylesheet" href="/Public/Official/css/common.css">
</head>
<body>
	<!-- 位置导航 -->
	<div class="location">
		<div class="left">
			<a href="<?php echo U('System/index');?>">官网管理</a> / Banner列表
		</div>
		<div class="right">
			<a href="<?php echo U('addBanner');?>">新增Banner</a>
		</div>
	</div>
	<!-- 正文 -->
	<form action="/Official/Banner" method="post">
		<table class="table table-col" cellspacing="1">
			<tr>
				<th>#ID</th>
				<th>标题</th>
				<th>副标题</th>
				<th>跳转网址</th>
				<th>图片</th>
				<th>是否显示</th>
				<th>操作</th>
			</tr>
			<?php if(is_array($banner)): foreach($banner as $key=>$v): ?><tr>
				<td><?php echo ($v["id"]); ?></td>
				<td><?php echo ($v["title"]); ?></td>
				<td><?php echo ($v["sub_title"]); ?></td>
				<td><a href="<?php echo ($v["url"]); ?>" target="_blank"><?php echo ($v["url"]); ?></a></td>
				<td><img src="<?php echo ((isset($v["banner"]) && ($v["banner"] !== ""))?($v["banner"]):'/Public/Official/images//Public/Official/images/no-pic.gif'); ?>" height="60"></td>
				<td>
					<?php if(($v["is_display"]) == "1"): ?>显示<?php else: ?>不显示<?php endif; ?>
				</td>
				<td>
					<a href="<?php echo U('updateBanner');?>/id/<?php echo ($v["id"]); ?>">修改</a> | 
					<a href="<?php echo U('delBanner');?>/id/<?php echo ($v["id"]); ?>" class="delBtn">删除</a> | 
					<input type="text" name="sort[<?php echo ($v["id"]); ?>]" value="<?php echo ($v["sort"]); ?>" class="sort">
				</td>
			</tr><?php endforeach; endif; ?>
			<tr>
				<td colspan="6">
					<div id="page"><?php echo ($page); ?></div>
				</td>
				<td><input type="submit" value="排序"></td>
			</tr>
		</table>
	</form>
	<script type="text/javascript" src="/Public/Official/js/jquery-1.9.0.min.js"></script>
	<script type="text/javascript" src="/Public/Official/js/modal.js"></script>	
</body>
</html>