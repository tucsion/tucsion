<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- IE -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="renderer" content="webkit"> <!-- 360 -->
	<title>图森品牌 - 官方网站</title>
	<meta name="keywords" content="<?php echo ($web[0][web_keywords]); ?>">
	<meta name="description" content="<?php echo ($web[0][web_description]); ?>">
	<link rel="stylesheet" href="/Public/Home/default/css/base.css">
    <link rel="stylesheet" href="/Public/Home/default/css/common.css">
    <link rel="stylesheet" href="/Public/Home/default/css/animate.min.css">
    
	<link rel="stylesheet" href="/Public/Home/default/css/index.css">
    <link rel="stylesheet" href="/Public/Home/default/css/indexBanner.css">

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
	
    <!-- banner -->
	<div class="slider" id="indexBanner">
		<ul>
			<?php if(is_array($banner)): foreach($banner as $key=>$v): ?><li>
				<div class="indexBanner" >
                	<img src="<?php echo ($v["banner"]); ?>"  />
	                <div class="container">
	                    <p class="title"><?php echo ($v["title"]); ?></p>
	                    <p class="description"><?php echo ($v["sub_title"]); ?></p>
	                    <!-- <a href="<?php echo ($v["url"]); ?>" target="_blank" class="bannerBtn">查看详情</a> -->
	                </div>
	            </div>
			</li><?php endforeach; endif; ?>
		</ul>
		<div class="more more-d" style="z-index:9;position:absolute;">
            <a href="javascript:void(0);" id="dianji"><i></i></a>
        </div>
	</div>

	<!-- 服务项目 -->
	<div id="service">
		<div class="container">
			<h2 class="title">我们只做我们擅长的</h2>
			<p class="subTitle">术业有专攻，方能目无全牛</p>
			<div class="services">
				<div class="service">
					<div class="service-img">
						<img src="/Public/Home/default/images/index-service-1.png" alt="">
					</div>
					<div class="content">
						<h3 class="service-title">官网品牌建设</h3>
						<p class="info">
							我们通过专业的视角与丰富的经验发现创新的价值，为您的核心商业价值提供最具竞争力的产品方案。
						</p>
						<ul class="subService">
							<li><a href="#">企业网络形象策划</a></li>
							<li><a href="#">网页视觉识别风格设计 </a></li>
							<li><a href="#">网络品牌策划</a></li>
						</ul>
					</div>
				</div>
				<div class="service">
					<div class="service-img">
						<img src="/Public/Home/default/images/index-service-2.png" alt="">
					</div>
					<div class="content">
						<h3 class="service-title">移动产品开发</h3>
						<p class="info">
							融合用户及商业化需求，建立跨平台互联网移动产品策略，助理移动产品定义及塑造、创新与落地。
						</p>
						<ul class="subService">
							<li><a href="#">微信定制化开发</a></li>
							<li><a href="#">APP设计开发&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
							<li><a href="#">响应式网站设计</a></li>
						</ul>
					</div>
				</div>
				<div class="service">
					<div class="service-img">
						<img src="/Public/Home/default/images/index-service-3.png" alt="">
					</div>
					<div class="content">
						<h3 class="service-title">业务平台开发</h3>
						<p class="info">
							我们从多个维度入手设计产品战略，从而为您的核心商业价值提供最具竞争力并且可实施的产品方案。
						</p>
						<ul class="subService">
							<li><a href="#">电商平台定制开发</a></li>
							<li><a href="#">CRM&OA办公系统开发</a></li>
							<li><a href="#">其他功能平台</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- 案例展示 -->
	<div id="case" class="container">
		<h2 class="title">热爱你所热爱的，坚持理应坚持的</h2>
		<p class="subTitle">我们毫不谦虚向您展示我们的成功力作,同时我们也从不害怕直面失败的过往</p>
		<ul class="case-list">
			<?php if(is_array($case)): foreach($case as $key=>$v): ?><li>
				<a class="img" href="<?php echo ($v["dir"]); ?>/<?php echo ($v["id"]); ?>.html"><img src="<?php echo ($v["thumbnail"]); ?>" alt="<?php echo ($v["title"]); ?>"></a>
				<a class="title text-overflow" href="<?php echo ($v["dir"]); ?>/<?php echo ($v["id"]); ?>.html"><?php echo ($v["title"]); ?></a>
				<p class="info"><?php echo ($v["sub_title"]); ?></p>
			</li><?php endforeach; endif; ?>
		</ul>
		<div class="more more-l">
			<a href="/case/">更多精彩<i></i></a>
		</div>
	</div>
	<hr class="index-hr" />
	<!-- 关于我们 -->
	<div id="about" class="container">
		<h2 class="title">风雨十年,再次遇见美好</h2>
        <p class="subTitle">优秀，直到成为习惯；严谨，直到卓尔不群</p>
		<div class="abouts">
			<div class="about">
				<div class="num">10</div>
				<div class="title">10年行业经验</div>
				<div class="info">图森视觉,成立于2016年,截至目前已有10年行业经验</div>
			</div>
			<div class="about">
				<div class="num">5</div>
				<div class="title">5个优秀部门</div>
				<div class="info">专业团队,专业系统,公司设有市场部/设计部/技术部/行政部/售后服务部</div>
			</div>
			<div class="about">
				<div class="num">2000<span>+</span></div>
				<div class="title">2000多家高质量客户</div>
				<div class="info">服务合作的客户约2000家,更有世界500强企业及国际知名单位</div>
			</div>
		</div>
		<div style="clear: both;"></div>
        <div class="more more-l">
            <a href="/about/">更多精彩<i></i></a>
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
	
	<script src="/Public/Home/default/js/jquery.1.8.3.min.js"></script>
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
	
	<script src="/Public/Home/default/js/indexBanner.js"></script>
    <script src="/Public/Home/default/js/index.js"></script>
    <script type="text/javascript">
    	var ThinkPHP = {
    			'IMG' : '/Public/Home/default/images',
    	}
    </script>

	<!-- 回呼电话 -->
	<script>
	document.getElementById("callBtn").onclick = function () {
	lxb.call(document.getElementById("telInput"));
	};
	</script>
</body>
</html>