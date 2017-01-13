<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>系统设置</title>
	<link rel="stylesheet" href="/Public/Official/css/base.css">
	<link rel="stylesheet" href="/Public/Official/css/common.css">
	<link rel="stylesheet" href="/Public/UM/themes/default/css/umeditor.min.css">
</head>
<body>
	<!-- 位置导航 -->
	<div class="location">
		<div class="left">
			当前位置 : <a href="#">官网管理</a> / 系统设置
		</div>
		<div class="right">
			<a href="#">新增</a>
			<a href="">列表</a>
		</div>
	</div>
	<!-- 正文 -->
	<?php if(is_array($system)): foreach($system as $key=>$v): ?><form action="<?php echo U('index');?>" method="post">
		<table class="table table-row" cellspacing="1">
			<input type="hidden" name="id" value="1">
			<tr>
				<th>网站名称</th>
				<td><input type="text" name="web_name" value="<?php echo ($v["web_name"]); ?>" class="input50"></td>
			</tr>
			<tr>
				<th>根网址</th>
				<td><input type="text" name="web_url" value="<?php echo ($v["web_url"]); ?>" class="input50"></td>
			</tr>
			<tr>
				<th>SEO关键字</th>
				<td><input type="text" name="web_keywords" value="<?php echo ($v["web_keywords"]); ?>" class="input100"></td>
			</tr>
			<tr>
				<th>SEO描述</th>
				<td><textarea name="web_description"><?php echo ($v["web_description"]); ?></textarea></td>
			</tr>
			<tr>
				<th>联系电话</th>
				<td><input type="text" name="web_telphone" value="<?php echo ($v["web_telphone"]); ?>" class="input50"><span class="remarks">多个电话用英文逗号隔开</span></td>
			</tr>
			<tr>
				<th>传真</th>
				<td><input type="text" name="web_fax" value="<?php echo ($v["web_fax"]); ?>" class="input100"></td>
			</tr>
			<tr>
				<th>联系地址</th>
				<td><input type="text" name="web_address" value="<?php echo ($v["web_address"]); ?>" class="input100"></td>
			</tr>
			<tr>
				<th>客服QQ</th>
				<td><input type="text" name="web_qq" value="<?php echo ($v["web_qq"]); ?>" class="input50"><span class="remarks">多个QQ用英文逗号隔开</span></td>
			</tr>
			<tr>
				<th>版权描述</th>
				<td><textarea name="web_copyright" id="UM1"><?php echo ($v["web_copyright"]); ?></textarea></td>
			</tr>
			<tr>
				<th>统计代码</th>
				<td><textarea name="web_count"><?php echo ($v["web_count"]); ?></textarea></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="提交修改"></td>
			</tr>
		</table>
	</form><?php endforeach; endif; ?>

	<script type="text/javascript" src="/Public/Official/js/jquery-1.9.0.min.js"></script>
	<script type="text/javascript" src="/Public/UM/umeditor.min.js"></script>
	<script type="text/javascript" src="/Public/UM/umeditor.config.js"></script>
	<script type="text/javascript">
		var UM1 = UM.getEditor('UM1',{
			initialFrameWidth:"100%"
		});
	</script>
</body>
</html>