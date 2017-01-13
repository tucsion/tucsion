<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>修改团队</title>
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
			<a href="<?php echo U('Team/listTeam');?>" style="color: red;">团队管理</a> | 
			<a href="<?php echo ($prevPage); ?>">返回</a>
		</div>
	</div>
	<!-- 正文 -->
	<form action="/Official/Team/updateTeam/id/5/" method="post">
		<?php if(is_array($oneTeam)): foreach($oneTeam as $key=>$v): ?><table class="table table-row" cellspacing="1">
			<input type="hidden" name="id" value="<?php echo ($v["id"]); ?>">
			<tr>
				<th>姓名</th>
				<td><input type="text" name="name" value="<?php echo ($v["name"]); ?>"></td>
			</tr>
			<tr>
				<th>英文姓名</th>
				<td><input type="text" name="en_name" value="<?php echo ($v["en_name"]); ?>"></td>
			</tr>
			<tr>
				<th>职位</th>
				<td><input type="text" name="job" value="<?php echo ($v["job"]); ?>"></td>
			</tr>
			<tr>
				<th>缩略图</th>
				<td>
					<img src="<?php echo ((isset($v["thumbnail"]) && ($v["thumbnail"] !== ""))?($v["thumbnail"]):'/Public/Official/images/upload.png'); ?>" class="uploadBtn" id="uploadOneBtn"/>
					<input type="hidden" name="thumbnail" value="<?php echo ($v["thumbnail"]); ?>" id="ajaxImg"/>
				</td>
			</tr>
			<tr>
				<th>排序</th>
				<td><input type="text" name="sort" value="<?php echo ($v["sort"]); ?>" class="sort"></td>
			</tr>
			<th>是否显示</th>
				<td>
					<label for="is_display1">
						<input type="radio" value="1" name="is_display" id="is_display1"  <?php if(($v["is_display"]) == "1"): ?>checked="checked"<?php endif; ?>>显示
					</label>
					<label for="is_display2">
						<input type="radio" value="0" name="is_display" id="is_display2" <?php if(($v["is_display"]) == "0"): ?>checked="checked"<?php endif; ?>>不显示
					</label>
				</td>
			<tr>
				<td></td>
				<td><input type="submit" value="提交"></td>
			</tr>
		</table><?php endforeach; endif; ?>
	</form>

	<script type="text/javascript" src="/Public/Official/js/jquery-1.9.0.min.js"></script>
	<!-- 上传单张图片 -->
	<script type="text/javascript" src="/Public/Official/js/jquery.form.min.js"></script>
	<script type="text/javascript" src="/Public/Official/js/uploadOnePic.js"></script>
	<form enctype="multipart/form-data" id="ajax-form">
		<input type="file" name="file">
	</form>
</body>
</html>