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
			<a href="<?php echo U('System/index');?>">官网管理</a> / 关于我们
		</div>
		<div class="right">
			<a href="<?php echo U('Job/listJob');?>">招聘</a> | 
			<a href="<?php echo U('Partner/listPartner');?>">合作伙伴</a> | 
			<a href="<?php echo U('Team/listTeam');?>">团队管理</a> | 
			<a href="<?php echo ($prevPage); ?>">返回</a>
		</div>
	</div>
	<!-- 正文 -->
	<form action="/Official/About" method="post">
	<?php if(is_array($about)): foreach($about as $key=>$v): ?><table class="table table-row" cellspacing="1">
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
				<th>关于我们</th>
				<td>
					标题:<input type="text" name="about_title" value="<?php echo ($v["about_title"]); ?>" class="input50">
					<textarea name="about_info"><?php echo ($v["about_info"]); ?></textarea>
					<br /><br />
					Part1:<input type="text" name="about_p1_title" value="<?php echo ($v["about_p1_title"]); ?>" class="input50">
					<textarea name="about_p1_info"><?php echo ($v["about_p1_info"]); ?></textarea>
					<br /><br />
					Part2:<input type="text" name="about_p2_title" value="<?php echo ($v["about_p2_title"]); ?>" class="input50">
					<textarea name="about_p2_info"><?php echo ($v["about_p2_info"]); ?></textarea>
					<br /><br />
					Part3:<input type="text" name="about_p3_title" value="<?php echo ($v["about_p3_title"]); ?>" class="input50">
					<textarea name="about_p3_info"><?php echo ($v["about_p3_info"]); ?></textarea>
					<br /><br />
				</td>
			</tr>
			<tr>
				<th>合作伙伴</th>
				<td>
					标题:<input type="text" name="partner_title" value="<?php echo ($v["partner_title"]); ?>" class="input50">
					<textarea name="partner_info"><?php echo ($v["partner_info"]); ?></textarea>
					<br /><br />
				</td>
			</tr>
			<tr>
				<th>图森团队</th>
				<td>
					标题:<input type="text" name="team_title" value="<?php echo ($v["team_title"]); ?>" class="input50">
					<textarea name="team_info"><?php echo ($v["team_info"]); ?></textarea>
					<br /><br />
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