<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>图森后台管理系统</title>
	<link rel="stylesheet" href="/Public/Admin/css/global.css">
	<link rel="stylesheet" href="/Public/Admin/css/index.css">
</head>
<body>
	<!-- 后台首页顶部 -->
	<div id="head">
		<h1><a href="/Admin">图森后台管理系统</a></h1>
		<ul class="nav">
			<li class="active"><a href="/Admin">起始页</a></li>
			<li><a href="/Official/System" target="iframe">官网管理</a></li>
			<li><a href="/Crm"  target="iframe">CRM</a></li>
			<li><a href="/Admin/Auther"  target="iframe">权限控制</a></li>
		</ul>
		<ul class="subnav">
			<li><?php echo (session('username')); ?>,您好! 您上次登录时间为 <?php echo (date('Y-m-d H:i:s',session('logintime'))); ?></li>
			<li><a href="/" target="_blank">前台首页</a></li>
			<li><a href="<?php echo U('Login/logout');?>">退出</a></li>
		</ul>
	</div>
	
	<div id="main">	
	<div id="main2">
		<div id="left">
			<dl class="menu">
				<dt><i></i>起始页</dt>
				<dd class="on"><a href="/Admin/Index/home" target="iframe">起始页</a></dd>
				<dd><a href="#">自动回复</a></dd>
				<dd><a href="#">自定义菜单</a></dd>
			</dl>
			<dl class="menu">
				<dt><i></i>官网管理</dt>
				<dd class="on"><a href="<?php echo U('/Official/System');?>" target="iframe">系统设置</a></dd>
				<dd><a href="/Official/Category" target="iframe">导航管理</a></dd>
				<dd><a href="/Official/Service" target="iframe">服务管理</a></dd>
				<dd><a href="/Official/Case" target="iframe">案例管理</a></dd>
				<dd><a href="/Official/News" target="iframe">新闻管理</a></dd>
				<dd><a href="/Official/About" target="iframe">关于管理</a></dd>
				<dd><a href="/Official/Contact" target="iframe">联系管理</a></dd>
				<dd><a href="/Official/Banner" target="iframe">Banner设置</a></dd>
			</dl>
			<dl class="menu">
				<dt><i></i>CRM</dt>
				<dd class="on"><a href="#">群发功能</a></dd>
				<dd><a href="#">自动回复</a></dd>
				<dd><a href="#">自定义菜单</a></dd>
			</dl>
			<dl class="menu">
				<dt><i></i>权限管理</dt>
				<dd class="on"><a href="<?php echo U('Auther/index');?>" target="iframe">用户管理</a></dd>
				<dd><a href="<?php echo U('Auther/indexRule');?>" target="iframe">规则管理</a></dd>
				<dd><a href="<?php echo U('Auther/indexGroup');?>" target="iframe">部门管理</a></dd>
			</dl>
		</div>
		
		<iframe id="iframe" src="/Admin/Index/home" name="iframe" frameborder="0"></iframe>

	</div>
	</div>



	<script src="/Public/Admin/js/jquery-1.9.0.min.js"></script>
	<script type="text/javascript" src="/Public/Admin/js/index.js"></script>
</body>
</html>