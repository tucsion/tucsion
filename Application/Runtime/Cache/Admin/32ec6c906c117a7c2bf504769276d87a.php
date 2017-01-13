<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="utf-8">
    <title>图森后台登录</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- CSS -->
    <link rel="stylesheet" href="/Public/Login/css/reset.css">
    <link rel="stylesheet" href="/Public/Login/css/supersized.css">
    <link rel="stylesheet" href="/Public/Login/css/style.css">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
        <script src="/Public/Login/js/html5shiv.min.js"></script>
    <![endif]-->
</head>
<body oncontextmenu="return false">
    <div class="page-container">
        <h1>欢迎登录图森后台</h1>
        <form action="/Admin/Login/index" method="post">
			<div>
				<input type="text" name="username" class="username" placeholder="用户名" autocomplete="off"/>
			</div>
            <div>
				<input type="password" name="password" class="password" placeholder="密码" oncontextmenu="return false" onpaste="return false" />
            </div>
            <div class="code">
                <input type="text" name="verify" class="password verify" placeholder="验证码"/>
                <img src="<?php echo U('verify');?>" alt="验证码" title="点击更换" id="verify" onClick="this.src='<?php echo U('verify');?>?'+Math.random()">
            </div>
            <input id="submit" type="submit" value="登录">
        </form>
    </div>
    <!-- Javascript -->
	<script src="/Public/Login/js/jquery-1.9.0.min.js" type="text/javascript"></script>
    <script src="/Public/Login/js/supersized.3.2.7.min.js"></script>
    <script src="/Public/Login/js/supersized-init.js"></script>
</body>
</html>