<?php
return array(
    //设置模板替换变量
    'TMPL_PARSE_STRING' => array(
        '__FONTS__' => __ROOT__.'/Public/'.MODULE_NAME.'/fonts',
        '__JS__' => __ROOT__.'/Public/'.MODULE_NAME.'/js',
        '__CSS__' => __ROOT__.'/Public/'.MODULE_NAME.'/css',
        '__IMG__' => __ROOT__.'/Public/'.MODULE_NAME.'/images'
    ),
    
    // 显示页面Trace信息
    // 'SHOW_PAGE_TRACE' =>true,

    //区分大小写,false为区分大小写;true为不区分
    'URL_CASE_INSENSITIVE'  => false,


);