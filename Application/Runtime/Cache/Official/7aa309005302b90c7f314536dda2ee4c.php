<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>分类管理</title>
	<link rel="stylesheet" href="/Public/Official/css/base.css">
	<link rel="stylesheet" href="/Public/Official/css/common.css">
	<link rel="stylesheet" href="/Public/Official/css/category.css">
</head>
<body>
	<!-- 位置导航 -->
	<div class="location">
		<div class="left">
			<a href="<?php echo U('System/index');?>">官网管理</a> / 导航列表
		</div>
		<div class="right">
			<a href="<?php echo U('addCate');?>">新增顶级栏目</a>
		</div>
	</div>
	<!-- 正文 -->
	<form action="/Official/Category" method="post">
	<ul class="nav">
		<?php if(is_array($navTree)): foreach($navTree as $key=>$v): ?><li>
			<div class="top">
				<div class="left"><?php echo ($v["name"]); ?></div>
				<div class="tool">
					<a href="<?php echo U('addCate');?>/fid/<?php echo ($v["id"]); ?>">添加子栏目</a> | 
					<a href="<?php echo U('updateCate');?>/id/<?php echo ($v["id"]); ?>">修改</a> | 
					<a href="<?php echo U('delCate');?>/id/<?php echo ($v["id"]); ?>" class="delBtn">删除</a>
					<input type="text" name="sort[<?php echo ($v["id"]); ?>]" value="<?php echo ($v["sort"]); ?>" class="sort">
				</div>
			</div>
			<?php if($v['child']): ?><ul class="subNav">
				<?php if(is_array($v['child'])): foreach($v['child'] as $key=>$vo): ?><li>
					<div class="left">----<?php echo ($vo["name"]); ?></div>
					<div class="tool">
						<a href="<?php echo U('updateCate');?>/id/<?php echo ($vo["id"]); ?>">修改</a> | 
						<a href="<?php echo U('delCate');?>/id/<?php echo ($vo["id"]); ?>" class="delBtn">删除</a> | 
						<input type="text" name="sort[<?php echo ($vo["id"]); ?>]" value="<?php echo ($vo["sort"]); ?>" class="sort">
					</div>
				</li><?php endforeach; endif; ?>
			</ul><?php endif; ?>
		</li><?php endforeach; endif; ?>
		<li>
			<input type="submit" value="排序">
		</li>
	</ul>
	</form>
	<script type="text/javascript" src="/Public/Official/js/jquery-1.9.0.min.js"></script>
	<script type="text/javascript" src="/Public/Official/js/modal.js"></script>
</body>
</html>