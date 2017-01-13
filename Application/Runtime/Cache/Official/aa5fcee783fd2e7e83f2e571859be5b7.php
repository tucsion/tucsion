<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>关于我们</title>
	<link rel="stylesheet" href="/Public/Official/css/base.css">
	<link rel="stylesheet" href="/Public/Official/css/common.css">
</head>
<body>
	<!-- 位置导航 -->
	<div class="location">
		<div class="left">
			<a href="<?php echo U('System/index');?>">官网管理</a> / 案例列表
		</div>
	</div>
	<!-- 正文 -->
	<table class="table table-col" cellspacing="1">
		<tr>
			<th>#ID</th>
			<th>姓名</th>
			<th>电话</th>
			<th>邮箱</th>
			<th>需求</th>
			<th>留言时间</th>
			<th>操作</th>
		</tr>
		<?php if(is_array($msg)): foreach($msg as $key=>$v): ?><tr>
			<td><?php echo ($v["id"]); ?></td>
			<td><?php echo ($v["name"]); ?></td>
			<td><?php echo ($v["phone"]); ?></td>
			<td><?php echo ($v["email"]); ?></td>
			<td><?php echo ($v["content"]); ?></td>
			<td><?php echo (date('Y-m-d',$v["post_time"])); ?></td>
			<td>
				<a href="<?php echo U('delMsg');?>/id/<?php echo ($v["id"]); ?>/" class="delBtn">删除</a> | 
			<?php if(($v["state"]) == "0"): ?><a href="<?php echo U('setMsg');?>/id/<?php echo ($v["id"]); ?>/">未处理</a>
			<?php else: ?>已处理<?php endif; ?>
			</td>
		</tr><?php endforeach; endif; ?>
	</table>
	<script type="text/javascript" src="/Public/Official/js/jquery-1.9.0.min.js"></script>
	<script type="text/javascript" src="/Public/Official/js/modal.js"></script>
</body>
</html>