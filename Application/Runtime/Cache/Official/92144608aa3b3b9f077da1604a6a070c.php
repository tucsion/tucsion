<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>合作伙伴列表</title>
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
			<a href="<?php echo U('Job/addJob');?>" style="color: red;">新增招聘</a> | 
			<a href="<?php echo U('Partner/listPartner');?>">合作伙伴</a> | 
			<a href="<?php echo U('Team/listTeam');?>">团队管理</a> | 
			<a href="<?php echo ($prevPage); ?>">返回</a>
		</div>
	</div>
	<!-- 正文 -->
	<form action="/Official/Job/listJob" method="post">
		<table class="table table-col" cellspacing="1">
			<tr>
				<th>#ID</th>
				<th>职位名称</th>
				<th>招聘人数</th>
				<th>应聘人数</th>
				<th>发布时间</th>
				<th>职位状态</th>
				<th>操作</th>
			</tr>
			<?php if(is_array($list)): foreach($list as $key=>$v): ?><tr>
				<td><?php echo ($v["id"]); ?></td>
				<td><?php echo ($v["title"]); ?></td>
				<td><?php echo ($v["num"]); ?></td>
				<td><?php echo ($v["num_complete"]); ?></td>
				<td><?php echo (date('Y-m-d',$v["post_time"])); ?></td>
				<td><?php if(($$v["state"]) == "1"): ?>招聘中<?php else: ?>已关闭<?php endif; ?></td>
				<td>
					<a href="<?php echo U('updateJob');?>/id/<?php echo ($v["id"]); ?>/">修改</a> |  
					<a href="<?php echo U('delJob');?>/id/<?php echo ($v["id"]); ?>/" class="delBtn">删除</a> | 
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