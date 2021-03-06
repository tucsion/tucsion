<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>团队列表</title>
	<link rel="stylesheet" href="/Public/Official/css/base.css">
	<link rel="stylesheet" href="/Public/Official/css/common.css">
</head>
<body>
	<!-- 位置导航 -->
	<div class="location">
		<div class="left">
			<a href="<?php echo U('System/index');?>">官网管理</a> / 关于我们
		</div>
		<div class="right">
			<a href="<?php echo U('Job/listJob');?>">招聘</a> | 
			<a href="<?php echo U('Partner/listPartner');?>">合作伙伴</a> | 
			<a href="<?php echo U('Team/addTeam');?>" style="color: red;">新增团队管理</a> | 
			<a href="<?php echo ($prevPage); ?>">返回</a>
		</div>
	</div>
	<!-- 正文 -->
	<form action="/Official/Team/listTeam" method="post">
		<table class="table table-col" cellspacing="1">
			<tr>
				<th>ID#</th>
				<th>姓名</th>
				<th>英文</th>
				<th>职位</th>
				<th>缩略图</th>
				<th>是否显示</th>
				<th>操作</th>
			</tr>
			<?php if(is_array($list)): foreach($list as $key=>$v): ?><tr>
				<td><?php echo ($v["id"]); ?></td>
				<td><?php echo ($v["name"]); ?></td>
				<td><?php echo ($v["en_name"]); ?></td>
				<td><?php echo ($v["job"]); ?></td>
				<td><img src="<?php echo ($v["thumbnail"]); ?>" height="60" /></td>
				<td><?php if(($v["is_display"]) == "1"): ?>显示<?php else: ?>不显示<?php endif; ?></td>
				<td>
					<a href="<?php echo U('updateTeam');?>/id/<?php echo ($v["id"]); ?>/">修改</a> |  
					<a href="<?php echo U('delTeam');?>/id/<?php echo ($v["id"]); ?>/" class="delBtn">删除</a> | 
					<input type="text" name="sort[<?php echo ($v["id"]); ?>]" value="<?php echo ($v["sort"]); ?>" class="sort">
				</td>
			</tr><?php endforeach; endif; ?>
			<tr>
				<td colspan="6">
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