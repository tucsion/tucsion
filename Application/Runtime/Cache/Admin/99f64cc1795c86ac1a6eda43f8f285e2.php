<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>权限管理</title>
	<link rel="stylesheet" href="/Public/Admin/css/base.css">
	<link rel="stylesheet" href="/Public/Admin/css/common.css">
</head>
<body>
	<!-- 位置导航 -->
	<div class="location">
		<div class="left">
			<a href="<?php echo U('index');?>">权限管理</a> / 用户列表
		</div>
		<div class="right">
			<a href="<?php echo U('addUser');?>">新增用户</a>
		</div>
	</div>
	<!-- 正文 -->
	<table class="table table-col" cellspacing="1">
		<tr>
			<th>#ID</th>
			<th>用户名</th>
			<th>部门分组</th>
			<th>最后登录时间</th>
			<th>最后登录IP</th>
			<th>会员状态</th>
			<th>操作</th>
		</tr>
		<?php if(is_array($user)): foreach($user as $key=>$v): ?><tr>
			<td><?php echo ($v["id"]); ?></td>
			<td><?php echo ($v["username"]); ?></td>
			<td>
				<?php if(is_array($v["group"])): foreach($v["group"] as $k=>$vo): echo ($vo["title"]); if($k+1 != count($v['group'])): ?>,<?php endif; endforeach; endif; ?>
			</td>
			<td><?php echo (date('Y-m-d H:i:s',$v["logintime"])); ?></td>
			<td><?php echo ($v["loginip"]); ?></td>
			<td><?php echo ($v['lock']?'<span style="color:red;">锁定</span>':'正常'); ?></td>
			<td>
				<a href="<?php echo U('updateUser');?>/id/<?php echo ($v["id"]); ?>">修改</a> | 
				<a href="<?php echo U('delUser');?>/id/<?php echo ($v["id"]); ?>" class="delBtn">删除</a> 
			</td>
		</tr><?php endforeach; endif; ?>
	</table>

	<script type="text/javascript" src="/Public/Admin/js/jquery-1.9.0.min.js"></script>
	<script type="text/javascript" src="/Public/Admin/js/modal.js"></script>	
</body>
</html>