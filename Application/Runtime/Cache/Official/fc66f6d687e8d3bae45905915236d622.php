<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>服务管理</title>
	<link rel="stylesheet" href="/Public/Official/css/base.css">
	<link rel="stylesheet" href="/Public/Official/css/common.css">
</head>
<body>
	<!-- 位置导航 -->
	<div class="location">
		<div class="left">
			<a href="<?php echo U('System/index');?>">官网管理</a> / 服务设置
		</div>
		<div class="right">
			<a href="<?php echo ($prevPage); ?>">返回</a>
		</div>
	</div>
	<!-- 正文 -->
	<form action="/Official/Service" method="post">
	<?php if(is_array($service)): foreach($service as $key=>$v): ?><table class="table table-row" cellspacing="1">
			<input type="hidden" name="id" value="1">
			<tr>
				<th>Banner标题</th>
				<td><input type="text" name="banner_title" value="<?php echo ($v["banner_title"]); ?>" class="input100"></td>
			</tr>
			<tr>
				<th>Banner副标题</th>
				<td><textarea name="banner_info"><?php echo ($v["banner_info"]); ?></textarea></td>
			</tr>
			<tr>
				<th>官网管理</th>
				<td>
					标题:<input type="text" name="official_title" value="<?php echo ($v["official_title"]); ?>" class="input50">
					<textarea name="official_info"><?php echo ($v["official_info"]); ?></textarea>
					<br /><br />
					Part1:<input type="text" name="official_p1_title" value="<?php echo ($v["official_p1_title"]); ?>" class="input50">
					<textarea name="official_p1_info"><?php echo ($v["official_p1_info"]); ?></textarea>
					<br /><br />
					Part2:<input type="text" name="official_p2_title" value="<?php echo ($v["official_p2_title"]); ?>" class="input50">
					<textarea name="official_p2_info"><?php echo ($v["official_p2_info"]); ?></textarea>
					<br /><br />
					Part3:<input type="text" name="official_p3_title" value="<?php echo ($v["official_p3_title"]); ?>" class="input50">
					<textarea name="official_p3_info"><?php echo ($v["official_p3_info"]); ?></textarea>
					<br /><br />
					探索更多: <input type="text" name="official_url_more" value="<?php echo ($v["official_url_more"]); ?>"> &nbsp;&nbsp; 
					相关案例: <input type="text" name="official_url_case" value="<?php echo ($v["official_url_case"]); ?>">
				</td>
			</tr>
			<tr>
				<th>移动端开发</th>
				<td>
					标题:<input type="text" name="mobile_title" value="<?php echo ($v["mobile_title"]); ?>" class="input50">
					<textarea name="mobile_info"><?php echo ($v["mobile_info"]); ?></textarea>
					<br /><br />
					探索更多: <input type="text" name="mobile_url_more" value="<?php echo ($v["mobile_url_more"]); ?>"> &nbsp;&nbsp; 
					相关案例: <input type="text" name="mobile_url_case" value="<?php echo ($v["mobile_url_case"]); ?>">
				</td>
			</tr>
			<tr>
				<th>业务平台开发</th>
				<td>
					标题:<input type="text" name="platform_title" value="<?php echo ($v["platform_title"]); ?>" class="input50">
					<textarea name="platform_info"><?php echo ($v["platform_info"]); ?></textarea>
					<br /><br />
					Part1:<input type="text" name="platform_p1_title" value="<?php echo ($v["platform_p1_title"]); ?>" class="input50">
					<textarea name="platform_p1_info"><?php echo ($v["platform_p1_info"]); ?></textarea>
					<br /><br />
					Part2:<input type="text" name="platform_p2_title" value="<?php echo ($v["platform_p2_title"]); ?>" class="input50">
					<textarea name="platform_p2_info"><?php echo ($v["platform_p2_info"]); ?></textarea>
					<br /><br />
					Part3:<input type="text" name="platform_p3_title" value="<?php echo ($v["platform_p3_title"]); ?>" class="input50">
					<textarea name="platform_p3_info"><?php echo ($v["platform_p3_info"]); ?></textarea>
					<br /><br />
					探索更多: <input type="text" name="platform_url_more" value="<?php echo ($v["platform_url_more"]); ?>"> &nbsp;&nbsp; 
					相关案例: <input type="text" name="platform_url_case" value="<?php echo ($v["platform_url_case"]); ?>">
				</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="提交"></td>
			</tr>
		</table><?php endforeach; endif; ?>
	</form>
</body>
</html>