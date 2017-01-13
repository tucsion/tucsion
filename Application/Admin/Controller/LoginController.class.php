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

namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller{
    //登陆页
    public function index(){
        if (IS_POST){
            //验证验证码
            if (!check_code(I('verify'))) $this->error('验证码错误!');

            $user = M('AuthUser');
            $condition['username'] = I('username');
            $condition['password'] = sha1(I('password'));
            
            $data = M('AuthUser')->where($condition)->find();
            if (!$data) $this->error('用户名或密码错误!');
            if($data['lock'] ==1) $this->error('哦~哦~,您的帐号已被冻结!');

            $updateData = array(
                'id' => $data['id'],
                'logintime' => time(),
                'loginip' => get_client_ip(),
            );
            $user->save($updateData);
            session('uid',$data['id']);
            session('username',$data['username']);
            session('logintime',$data['logintime']);
            session('loginip',$data['loginip']);

            $this->redirect('Index/index');
            
        }else{
            if (check_login()){
                $this->redirect(U('Index/index'));
            }else{
                $this->display();
            }
        }
    }
    
    //登出
    public function logout(){
        session('[destroy]');
        $this->redirect(U('Login/index'));
    }
    
    //验证码
    public function verify(){
        $Verify = new \Think\Verify();
        $Verify->fontSize = 20;
        $Verify->length   = 4;
        $Verify->useNoise = false;
        $Verify->entry();
    }
    
}


