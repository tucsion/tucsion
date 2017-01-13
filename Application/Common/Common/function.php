<?php
/**
* +----------------------------------------------------------------------
* | Tucsion
* +----------------------------------------------------------------------
* | Copyright (c) 2006-2016 http://www.tucsion.com All rights reserved.
* +----------------------------------------------------------------------
* | Author: zhengbo <zhengbo@tucsion.com>
* +----------------------------------------------------------------------
* | Date: 2016年6月2日
* +----------------------------------------------------------------------
*/

//当前页面的完整URL地址,用于操作返回上一页
//defined('CURRENT_URL') or define('CURRENT_URL',base64_encode($_SERVER["REQUEST_URI"]));

/*
 * 返回上一页
 */
function getPrevPage(){
    return empty($_SERVER['HTTP_REFERER']) ? '###' : $_SERVER['HTTP_REFERER'] ;
}

/*
 * 验证登录
 */
function check_login(){
    if (!session('?uid') || !session('?username')){
        return false;
    }else{
        return true;
    }
}

