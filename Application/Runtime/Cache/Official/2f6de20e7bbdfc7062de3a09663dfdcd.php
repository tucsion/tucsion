<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>新增新闻</title>
	<link rel="stylesheet" href="/Public/Official/css/base.css">
	<link rel="stylesheet" href="/Public/Official/css/common.css">
</head>
<body>
	<!-- 位置导航 -->
	<div class="location">
		<div class="left">
			<a href="<?php echo U('System/index');?>">官网管理</a> / 
			<a href="<?php echo U('index');?>">新闻列表</a> / 
			<?php echo ($oneNews[0]['title']); ?>
		</div>
		<div class="right">
			<a href="<?php echo ($prevPage); ?>">返回</a>
		</div>
	</div>
	<!-- 正文 -->
	<form action="/Official/News/updateNews/id/10" method="post">
		<?php if(is_array($oneNews)): foreach($oneNews as $key=>$v): ?><table class="table table-row" cellspacing="1">
			<input type="hidden" name="id" value="<?php echo ($v["id"]); ?>">
			<tr>
				<th>分类</th>
				<td>
					<select name="fid">
						<option value="0">请选择新闻分类</option>
						<?php if(is_array($newsCate)): foreach($newsCate as $key=>$vo): ?><option value="<?php echo ($vo["id"]); ?>" <?php if(($vo["id"]) == $v["fid"]): ?>selected="selected"<?php endif; ?> ><?php echo ($vo["name"]); ?></option><?php endforeach; endif; ?>
					</select>
				</td>
			</tr>
			<tr>
				<th>名称</th>
				<td><input type="text" name="title" value="<?php echo ($v["title"]); ?>" class="input50"></td>
			</tr>
			<tr>
				<th>SEO关键字</th>
				<td><input type="text" name="keywords" class="input50" value="<?php echo ($v["keywords"]); ?>"><span class="remarks">多个关键字用英文逗号隔开</span></td>
			</tr>
			<tr>
				<th>SEO描述</th>
				<td><textarea name="description"><?php echo ($v["description"]); ?></textarea></td>
			</tr>
			<tr>
				<th>内容</th>
				<td><textarea name="content" id="CONTENT" width="100%"><?php echo ($v["content"]); ?></textarea></td>
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
				<td><input type="text" class="sort" name="sort" value="<?php echo ($v["sort"]); ?>"></td>
			</tr>
			<tr>
				<th>其他设置</th>
				<td style="line-height: 35px;"> 
					<p>
						作者: <input type="text" name="author" value="<?php echo ($v["author"]); ?>"> &nbsp;&nbsp;
						来源: <input type="text" name="source" value="<?php echo ($v["source"]); ?>"> 
					</p>
					<p>
						是否显示: 
						<label for="is_display1">
							<input type="radio" value="1" name="is_display" id="is_display1" <?php if(($v["is_display"]) == "1"): ?>checked="checked"<?php endif; ?>>是
						</label>
						<label for="is_display2">
							<input type="radio" value="0" name="is_display" id="is_display2" <?php if(($v["is_display"]) == "0"): ?>checked="checked"<?php endif; ?>>否
						</label>
						&nbsp;&nbsp;&nbsp;&nbsp;
						是否推荐到首页: 
						<label for="is_index1">
							<input type="radio" value="1" name="is_index" id="is_index1" <?php if(($v["is_index"]) == "1"): ?>checked="checked"<?php endif; ?> >是
						</label>
						<label for="is_index2">
							<input type="radio" value="0" name="is_index" id="is_index2" <?php if(($v["is_index"]) == "0"): ?>checked="checked"<?php endif; ?>>否
						</label>
						&nbsp;&nbsp;&nbsp;&nbsp;
						是否置顶: 
						<label for="is_top1">
							<input type="radio" value="1" name="is_top" id="is_top1" <?php if(($v["is_top"]) == "1"): ?>checked="checked"<?php endif; ?>>是
						</label>
						<label for="is_top2">
							<input type="radio" value="0" name="is_top" id="is_top2" <?php if(($v["is_top"]) == "0"): ?>checked="checked"<?php endif; ?> >否
						</label>
						&nbsp;&nbsp;&nbsp;&nbsp;
						是否推荐到内页: 
						<label for="is_recommend1">
							<input type="radio" value="1" name="is_recommend" id="is_recommend1" <?php if(($v["is_recommend"]) == "1"): ?>checked="checked"<?php endif; ?>>是
						</label>
						<label for="is_recommend2">
							<input type="radio" value="0" name="is_recommend" id="is_recommend2" <?php if(($v["is_recommend"]) == "0"): ?>checked="checked"<?php endif; ?> >否
						</label>
					</p>
				</td>
			</tr>
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
	<!-- 实例化百度编辑器 -->
	<script type="text/javascript" src="/Public/UE/ueditor.config.js"></script>
	<script type="text/javascript" src="/Public/UE/ueditor.all.min.js"></script>
	<script type="text/javascript">
		var content = UE.getEditor('CONTENT');
	</script>
</body>
</html>