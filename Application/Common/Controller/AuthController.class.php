<?php
/**
* +----------------------------------------------------------------------
* | Tucsion
* +----------------------------------------------------------------------
* | Copyright (c) 2006-2016 http://www.tucsion.com All rights reserved.
* +----------------------------------------------------------------------
* | Author: zhengbo <zhengbo@tucsion.com>
* +----------------------------------------------------------------------
* | Date: 2016年8月1日
* +----------------------------------------------------------------------
*/

namespace Common\Controller;
use Think\Controller;
use Think\Auth;
class AuthController extends Controller{
    
    //默认配置
    protected $_config = array(
        'AUTH_ON'           => true,                // 认证开关
        'AUTH_TYPE'         => 2,                   // 认证方式，1为实时认证；2为登录认证。
        'AUTH_GROUP'        => 'ts_auth_group',        // 用户组数据表名
        'AUTH_GROUP_ACCESS' => 'ts_auth_group_access', // 用户-用户组关系表
        'AUTH_RULE'         => 'ts_auth_rule',         // 权限规则表
        'AUTH_USER'         => 'ts_auth_user'          // 用户信息表
    );
    
    protected function _initialize(){
        $this->assign('prevPage',getPrevPage());
        //判断是否登录
        if (!check_login())$this->redirect('Admin/Login/index');
        
        $auth = new Auth();
        if ($_SESSION['uid'] == C('SESSION_ADMIN_KEY')) return true;
        
        // var_dump($auth->check(MODULE_NAME.'/'.CONTROLLER_NAME.'/'.ACTION_NAME, $_SESSION['uid']));
        
        if (!$auth->check(MODULE_NAME.'/'.CONTROLLER_NAME.'/'.ACTION_NAME, $_SESSION['uid'])){
            exit('您无权访问此页面!');
        }

    }
}