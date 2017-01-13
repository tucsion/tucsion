<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>部门列表</title>
	<link rel="stylesheet" href="/Public/Admin/css/base.css">
	<link rel="stylesheet" href="/Public/Admin/css/common.css">
</head>
<body>
	<!-- 位置导航 -->
	<div class="location">
		<div class="left">
			<a href="<?php echo U('index');?>">权限控制</a> / 部门列表
		</div>
		<div class="right">
			<a href="<?php echo U('addGroup');?>">新增部门</a>
		</div>
	</div>
	<!-- 正文 -->
	<table class="table table-col" cellspacing="1">
		<tr>
			<th>#ID</th>
			<th>名称</th>
			<th>权限</th>
			<th>操作</th>
		</tr>
		<?php if(is_array($group)): foreach($group as $key=>$v): ?><tr>
			<td><?php echo ($v["id"]); ?></td>
			<td><?php echo ($v["title"]); ?></td>
			<td>
				<?php if(is_array($v["rules_title"])): foreach($v["rules_title"] as $ko=>$vo): echo ($vo); if($ko+1 != count($v['rules_title'])): ?>，<?php endif; endforeach; endif; ?>
			</td>
			<td>
				<a href="<?php echo U('setAccess',array('id'=>$v['id'],'rules'=>$v['rules']));?>">配置权限</a> | 
				<a href="">删除</a> | 
				<a href="">修改</a>
			</td>
		</tr><?php endforeach; endif; ?>
	</table>
</body>
</html>