<?php
return array(
	//'配置项'=>'配置值'
    'DEFAULT_THEME' => 'default',//设置模板主题
    
    //设置模板替换变量
    'TMPL_PARSE_STRING' => array(
        '__FONTS__' => __ROOT__.'/Public/'.MODULE_NAME.'/default/fonts',
        '__JS__' => __ROOT__.'/Public/'.MODULE_NAME.'/default/js',
        '__CSS__' => __ROOT__.'/Public/'.MODULE_NAME.'/default/css',
        '__IMG__' => __ROOT__.'/Public/'.MODULE_NAME.'/default/images',
        '__FTP__' => __ROOT__.'/Public/'.MODULE_NAME.'/default/Ftp',
    ),
    
    // 开启路由
    'URL_ROUTER_ON'   => true,
    'URL_ROUTE_RULES'=>array(
        'service' => 'Service/index',
        'case/:dir/:id' => 'Case/detail',
        'case/:dir' => 'Case/dir',
        'case' => 'Case/index',
        'news/:dir/:id' => 'News/detail',
        'news/:dir' => 'News/dir',
        'news' => 'News/dir',
        'contact' => 'Contact/index',
        'about/:dir' => 'About/join',
        'about' => 'About/index',
    ),
    
    
);