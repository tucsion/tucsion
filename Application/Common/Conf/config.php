<?php
return array(
    //设定可访问模块
    'MODULE_ALLOW_LIST'    =>    array('Home','Admin','Official','Crm'),
    //设定默认模块
    'DEFAULT_MODULE'       =>    'Home',
    //设置模板后缀
    'URL_HTML_SUFFIX' => '',

    /* 数据库设置 */
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  'qdm158291454.my3w.com', // 服务器地址
    'DB_NAME'               =>  'qdm158291454_db',          // 数据库名
    'DB_USER'               =>  'qdm158291454',      // 用户名
    'DB_PWD'                =>  '7wFWiUIT9Q1',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'ts_',    // 数据库表前缀
    'DB_CHARSET'            =>  'utf8',      // 数据库编码
    
    //去掉U方法中的index.php
    'URL_MODEL' => 2,

    //将session存入数据库
    'SESSION_TYPE' => 'DB',
    'SESSION_ADMIN_KEY' => '1',
    


    
);