<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>规则列表</title>
	<link rel="stylesheet" href="/Public/Admin/css/base.css">
	<link rel="stylesheet" href="/Public/Admin/css/common.css">
	<link rel="stylesheet" href="/Public/Admin/css/rule.css">
</head>
<body>
	<!-- 位置导航 -->
	<div class="location">
		<div class="left">
			<a href="<?php echo U('index');?>">权限控制</a> / 规则列表
		</div>
		<div class="right">
			<a href="<?php echo U('addRule');?>">新增分组</a>
		</div>
	</div>
	<!-- 正文 -->
	<div class="rule">
		<?php if(is_array($rule)): foreach($rule as $key=>$app): ?><div class="app">
			<h3><?php echo ($app["title"]); ?> 
				<span class="tool">
					<a href="<?php echo U('delRule',array('id'=>$app['id']));?>">删除分组</a> | 
					<a href="<?php echo U('updateRule',array('id'=>$app['id']));?>">修改分组</a> | 
					<a href="<?php echo U('addRule',array('pid'=>$app['id'],'level'=>2));?>">新增规则</a>
				</span>
			</h3>
			<dl class="action">
				<?php if(is_array($app["child"])): foreach($app["child"] as $key=>$method): ?><dd><?php echo ($method["title"]); ?>
					<span class="tool">
						(<a href="<?php echo U('delRule',array('id'=>$method['id']));?>">修改</a> | 
						<a href="<?php echo U('delRule',array('id'=>$method['id']));?>">删除</a>)
					</span>&nbsp;&nbsp;
				</dd><?php endforeach; endif; ?>
			</dl>
		</div><?php endforeach; endif; ?>
	</div>
</body>
</html>