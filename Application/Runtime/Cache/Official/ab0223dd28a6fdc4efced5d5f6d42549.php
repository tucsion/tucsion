<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>新闻列表</title>
	<link rel="stylesheet" href="/Public/Official/css/base.css">
	<link rel="stylesheet" href="/Public/Official/css/common.css">
</head>
<body>
	<!-- 位置导航 -->
	<div class="location">
		<div class="left">
			<a href="<?php echo U('System/index');?>">官网管理</a> / 新闻列表
		</div>
		<div class="right">
			<a href="<?php echo U('addNews');?>">新增新闻</a>
		</div>
	</div>
	<!-- 正文 -->
	<form action="/Official/News" method="post">
		<table class="table table-col" cellspacing="1">
			<tr>
				<th>#ID</th>
				<th>标题</th>
				<th>所属分类</th>
				<th>发布时间</th>
				<th>操作</th>
			</tr>
			<?php if(is_array($news)): foreach($news as $key=>$v): ?><tr>
				<td><?php echo ($v["id"]); ?></td>
				<td><?php echo ($v["title"]); ?></td>
				<td><?php echo ($v["cate"]); ?></td>
				<td><?php echo (date('Y-m-d',$v["post_time"])); ?></td>
				<td>
					<a href="<?php echo U('delNews');?>/id/<?php echo ($v["id"]); ?>" class="delBtn">删除</a> | 
					<a href="<?php echo U('updateNews');?>/id/<?php echo ($v["id"]); ?>">修改</a> | 
					<input type="text" name="sort[<?php echo ($v["id"]); ?>]" value="<?php echo ($v["sort"]); ?>" class="sort">
				</td>
			</tr><?php endforeach; endif; ?>
			<tr>
				<td colspan="4">
					<div id="page"><?php echo ($page); ?></div>
				</td>
				<td>
					<input type="submit" value="排序">
				</td>
			</tr>
		</table>
	</form>
	<script type="text/javascript" src="/Public/Official/js/jquery-1.9.0.min.js"></script>
	<script type="text/javascript" src="/Public/Official/js/modal.js"></script>
</body>
</html>