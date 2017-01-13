<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- IE -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="renderer" content="webkit"> <!-- 360 -->
	<title><?php echo ($detail[0]["title"]); ?>_案例_图森品牌 - 官方网站</title>
	<meta name="keywords" content="<?php echo ($detail[0]["keywords"]); ?>">
	<meta name="description" content="<?php echo ($detail[0]["description"]); ?>">
	<link rel="stylesheet" href="/Public/Home/default/css/base.css">
    <link rel="stylesheet" href="/Public/Home/default/css/common.css">
    
	<link rel="stylesheet" href="/Public/Home/default/css/case.css">
	<link rel="stylesheet" href="/Public/Home/default/Ftp/<?php echo ($detail[0]['ftp_url']); ?>/css/style.css">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="/Public/Home/default/js/html5shiv.min.js"></script>
		<script src="/Public/Home/default/js/respond.min.js"></script>
	<![endif]-->
	<!-- 回呼电话 -->
	<script>
	document.write('<script type="text/javascript"  data-lxb-uid="20610943" data-lxb-gid="291137" src="http://lxbjs.baidu.com/api/asset/api.js?t=' + new Date().getTime() + '" charset="utf-8"></scr' + 'ipt>' );
	</script>
</head>
<body>
	<!-- 头部 -->
	<?php $category = M('Category'); $navs = $category->where('fid = 0')->field('id,dir,name')->select(); ?>
	<div id='head'>
		<div class='head-bg'></div>
		<div class='head container'>
			<ul class='nav-bg'>
				<li></li><li></li><li></li><li></li><li></li><li></li>
			</ul>
			<h1>
				<a href='/'>
					<img src='/Public/Home/default/images/logo.png' alt='图森品牌'>
				</a>
			</h1>
			<a id='navBtn' href='javascript:void(0);'><i></i></a>
			<ul class='nav'>
			<?php if(is_array($navs)): $i = 0; $__LIST__ = $navs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(($vo["name"]) == "联系"): ?><li><a href="/<?php echo ($vo["dir"]); ?>/" class="contact"><?php echo ($vo["name"]); ?></a></li>
				<?php else: ?>
				<li><a href="/<?php echo ($vo["dir"]); ?>/"><?php echo ($vo["name"]); ?></a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
			</ul>
		</div>
	</div>
	<!-- 内容区域 -->
		
<?php if(is_array($detail)): foreach($detail as $key=>$v): ?><div class="pageHead"></div>	
	<div id="case_detail_head">
		<div class="container">
			<h3 class="title"><?php echo ($v["title"]); ?></h3>
			<p class="info">
				<?php echo ($v["description"]); ?>
			</p>
			<ul class="tags">
				<?php if(is_array($v["tags"])): foreach($v["tags"] as $key=>$vo): ?><li><?php echo ($vo); ?></li><?php endforeach; endif; ?>
			</ul>
		</div>
	</div>
	<div id="content">
		<div class="headImg">
			<img src="/Public/Home/default/Ftp/<?php echo ($detail[0]['ftp_url']); ?>/images/1.jpg" alt="<?php echo ($v["title"]); ?>">
		</div>
	<?php $__FOR_START_1952644793__=2;$__FOR_END_1952644793__=7;for($i=$__FOR_START_1952644793__;$i < $__FOR_END_1952644793__;$i+=1){ ?><img src="/Public/Home/default/Ftp/<?php echo ($detail[0]['ftp_url']); ?>/images/<?php echo ($i); ?>.jpg" alt="<?php echo ($v["title"]); ?>"><?php } ?>
	</div><?php endforeach; endif; ?>
	<div class="more-case picScroll-left">
		<p class="title">相关案例</p>
		<div class="ul_box bd">
			<ul class="more-case-list">
				<?php if(is_array($recommend)): foreach($recommend as $key=>$v): ?><li>
					<a class="img" href="/<?php echo ($v["cate_dir"]); ?>/<?php echo ($v["id"]); ?>.html">
						<img src="<?php echo ($v["thumbnail"]); ?>" alt="<?php echo ($v["title"]); ?>" title="<?php echo ($v["title"]); ?>" />
					</a>
					<a class="title" href="/<?php echo ($v["cate_dir"]); ?>/<?php echo ($v["id"]); ?>.html"><?php echo ($v["title"]); ?></a>
				</li><?php endforeach; endif; ?>
			</ul>
		</div>
		<div class="hd">
			<a href="javascript:void(0);" class="prev"><img src="/Public/Home/default/images/news-prev.png" /></a>
			<a href="javascript:void(0);" class="next"><img src="/Public/Home/default/images/news-next.png" /></a>
		</div>
	</div>

	<!-- 底部 -->
	<?php $web = M('System')->where('id =1')->find(); $qq = explode(',',$web['web_qq']); ?>
	<div id='footer'>
		<div class='footer-address'>
			<div class='container'>
				<dl class='address'>
					<dd><i class='address-address'></i>地址：<?php echo ($web["web_address"]); ?></dd>
					<dd><i class='address-email'></i>邮箱：<a href='mailto:admin@tucsion.com'>admin@tucsion.com</a></dd>
					<dd><i class='address-telphone'></i>电话：<a href='tel:<?php echo ($web["web_telphone"]); ?>'><?php echo ($web["web_telphone"]); ?></a>
					</dd>
				</dl> 
				<div class='weixin'>
					<img src='/Public/Home/default/images/weixin.png' alt=''>
					<p>扫一扫<br>关注图森微信</p>
				</div>
				<div class='online'>
					<div class='online1'>
						<div class='online2'>
						<?php if(is_array($qq)): foreach($qq as $key=>$vo): ?><a href='http://wpa.qq.com/msgrd?v=3&uin=<?php echo ($vo); ?>&site=qq&menu=yes'></a><?php endforeach; endif; ?>
						</div>
					</div>
					<p>我们随时欢迎您在我们的工作时间内拜访或咨询。</p>
				</div>
			</div>
		</div>
		<div class='copyright container'>
			<div class='footerLogo'>
				<img src='/Public/Home/default/images/footerLogo.png' alt='图森品牌LOGO' />
			</div>
			<ul> 
				<li><a href='/about/'>关于图森</a></li>
				<!-- <li><a href='#'>隐私声明</a></li> -->
				<li><a href='/contact/'>联系我们</a></li>
				<li><a href='/project/' target='_blank'>项目管理</a></li>
			</ul>
			<p class="footerP">
				<?php echo ($web["web_copyright"]); ?>
			</p>
			<p class="footerP">
				<a href="http://www.tucsion.com/">图森品牌</a> - 北京本土最优秀的互联网解决方案提供商
			</p>
			<p class="footerP">
				京ICP备15038595号-1
			</p>
			<!-- 百度统计代码 -->
			<?php echo ($web["web_count"]); ?>
		</div>
	</div>
	<div id="kefu">
		<a href="javascript:void(0);" id="huihuBtn"></a>
		<a href="http://p.qiao.baidu.com/cps/chat?siteId=8965947&userId=20610943" target="_blank"></a>
	</div>
	
	<script src="/Public/Home/default/js/jquery.min.js"></script>
	<script type="text/javascript" src="/Public/Home/default/js/kefu.js"></script>
		<div id="huihu">
			<div class="huihu-bg"></div>
			<div class="huihu">
				<div class="huihuBox">
					<p class="title">输入您的电话，与我们免费通话</p>
					<div class="inputs">
						<input type="text" id="telInput" placeholder="请输入您的电话号码">
						<input type="button" id="callBtn" value="免费通话">
					</div>
				</div>
				<div class="huihuBox">
					<p class="title">您也可以咨询我们的在线客服</p>
					<a class="shangqiaoBtn" href="http://p.qiao.baidu.com/cps/chat?siteId=8965947&userId=20610943" target="_blank">在线咨询</a>
				</div>
			</div>
		</div>
	
	<script type="text/javascript" src="/Public/Home/default/js/app.js"></script>
	<script type="text/javascript" src="/Public/Home/default/js/jquery.SuperSlide.2.1.1.js"></script>
	<script type="text/javascript">
		jQuery(".picScroll-left").slide({
			titCell:".hd ul",
			mainCell:".bd ul",
			autoPage:true,
			effect:"leftLoop",
			autoPlay:true,
			scroll:3,
			vis:3,
			easing:"easeInBack",
			delayTime:1000,
			interTime:4000
		});
	</script>

	<!-- 回呼电话 -->
	<script>
	document.getElementById("callBtn").onclick = function () {
	lxb.call(document.getElementById("telInput"));
	};
	</script>
</body>
</html>