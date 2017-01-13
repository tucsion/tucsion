<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>案例列表</title>
	<link rel="stylesheet" href="/Public/Official/css/base.css">
	<link rel="stylesheet" href="/Public/Official/css/common.css">
</head>
<body>
	<!-- 位置导航 -->
	<div class="location">
		<div class="left">
			<a href="<?php echo U('System/index');?>">官网管理</a> / 案例列表
		</div>
		<div class="right">
			<a href="<?php echo U('addCase');?>">新增案例</a>
		</div>
	</div>
	<!-- 正文 -->
	<form action="/Official/Case" method="post">
		<table class="table table-col" cellspacing="1">
			<tr>
				<th>#ID</th>
				<th>标题</th>
				<th>所属分类</th>	
				<th>缩略图</th>
				<th>是否显示</th>
				<th>操作</th>
			</tr>
			<?php if(is_array($cases)): foreach($cases as $key=>$v): ?><tr>
				<td><?php echo ($v["id"]); ?></td>
				<td><?php echo ($v["title"]); ?></td>
				<td><?php echo ($v["cate"]); ?></td>
				<td><img src="<?php echo ((isset($v["thumbnail"]) && ($v["thumbnail"] !== ""))?($v["thumbnail"]):'/Public/Official/images/no-pic.gif'); ?>" height="60"></td>
				<td>是</td>
				<td>
					<a href="<?php echo U('delCase');?>/id/<?php echo ($v["id"]); ?>" class="delBtn">删除</a> | 
					<a href="<?php echo U('updateCase');?>/id/<?php echo ($v["id"]); ?>">修改</a> | 
					<input type="text" name="sort[<?php echo ($v["id"]); ?>]" class="sort" value="<?php echo ($v["sort"]); ?>" />
				</td>
			</tr><?php endforeach; endif; ?>
			<tr>
				<td colspan="5">
					<div id="page">
						<?php echo ($page); ?>
					</div>
				</td>
				<td><input type="submit" value="排序"></td>
			</tr>
		</table>
	</form>	
	<script type="text/javascript" src="/Public/Official/js/jquery-1.9.0.min.js"></script>
	<script type="text/javascript" src="/Public/Official/js/modal.js"></script>		
</body>
</html>