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
use Common\Controller\AuthController;
class AutherController extends AuthController{
    /*
     * 用户列表
     */
    public function index(){
        $this->user = D('AuthUserRelation')->relation(true)->select();
        $this->display();
    }
    
    /*
     * 新增用户
     */
    public function addUser(){
        if (IS_POST){
            $data = array(
                'username' => I('username'),
                'password' => sha1(I('password')),
                'lock' => I('lock'),
                'logintime' => time(),
                'loginip' => get_client_ip()
            );

            $uid = M('AuthUser')->add($data);
            if ($uid){
                if (!empty(I('group'))){
                    foreach (I('group') as $v){
                        $group[] = array(
                            'uid' => $uid,
                            'group_id' => $v
                        );
                    }
                    M('AuthGroupAccess')->where('uid = '.$uid)->delete();
                    if (M('AuthGroupAccess')->addAll($group)){
                        $this->success('新增成功!',U('index'));
                    }
                }
            }else{
                $this->error('新增失败!');
            }
            
        }else{
            $this->group = M('AuthGroup')->field('id,title')->select();
            $this->display();
        }
    }
    
    /*
     * 修改用户
     */
    public function updateUser(){
        if(IS_POST){
            $save_user = $save_access = '';
            $groupAccess = M('AuthGroupAccess');

            //更新用户基本信息
            $id = I('id');
            $pwd = I('password') ? sha1(I('password')) : I('old-pwd');
            $data = array(
                'id' => $id,
                'username' => I('username'),
                'password' => $pwd,
                'lock' => I('lock')
            );
            $save_user = M('AuthUser')->save($data);
            //更新部门
            if (I('group')) {
                $access = array();
                foreach (I('group') as $v) {
                    $access[] = array(
                        'uid' => $id,
                        'group_id' => $v
                    );
                }
                $groupAccess->where('uid = '.$id)->delete();
                $save_access = $groupAccess->addAll($access);
            }else{
                if ($groupAccess->where('uid = '.$id)->delete() !== false) {
                    $save_access = true;
                }else{
                    $save_access = false;
                }
            }
            
            if ($save_user || $save_access) {
                $this->success('修改成功!',U('index'));
            }else{
                $this->error('修改失败!');
            }

        }else{
            $user = D('AuthUserRelation')->relation(true)->where('id = '.I('id'))->find();
            $old_group = '';
            if (count($user['group'])) {
                foreach ($user['group'] as $v) {
                    $old_group .= $v['id'].',';
                }
            }
            $this->user = $user;
            $this->old_group = substr($old_group, 0,-1);
            $this->group = M('AuthGroup')->field('id,title')->select();
            $this->display();
        }
    }
    
    /*
     * 删除用户
     */
    public function delUser(){
        if (M('AuthUser')->where('id = '.I('id'))->delete() !== false){
            $this->success('删除成功!',getPrevPage());
        }else {
            $this->error('删除失败!');
        }
    }
    
    /*
     * 规则列表
     */
    public function indexRule(){
        $this->rule = rule_merge(M('AuthRule')->select());
        $this->display();
    }
    
    /*
     * 新增规则
     */
    public function addRule(){
        if (IS_POST){
            $auth = M('AuthRule');
            $name = I('name') ? I('name') : $auth->max('id') + 1;
            $pid = I('pid') ? I('pid') : 0;

            $data = array(
                'pid' => $pid,
                'title' => I('title'),
                'sort' => $auth->max('id') + 1,
                'name' => $name,
            );
            if (M('AuthRule')->add($data)){
                $this->success('新增成功!',U('indexRule'));
            }else{
                $this->error('新增失败!');
            }
        }else{
            $pid = I('get.pid') ? I('get.pid') : 0;
            if ($pid) {
                $this->type = '规则';
            }else{
                $this->type = '分组';
            }
            $this->pid = $pid;
            $this->display();
        }
    }
    
    /*
     * 修改规则
     */
    public function updateRule(){
        
        $this->display();
    }
    
    /*
     * 删除规则
     */
    public function delRule(){
       
    }
    
    
    /*
     * 部门列表
     */
    public function indexGroup(){
        $group = M('AuthGroup')->field('id,title,rules')->select();
        $rule = M('AuthRule')->field('id,title')->select();


        foreach ($group as $key => $v) {
            foreach ($rule as $value) {
                if (in_array($value['id'], explode(',', $v['rules']))) {
                    $group[$key]['rules_title'][] = $value['title'];
                }
            }
        }

        $this->group = $group;
        $this->display();
    }
    
    /*
     * 新增部门
     */
    public function addGroup(){
        if (IS_POST){
            $data = array(
                'title' => I('title'),
            );
            if (M('AuthGroup')->add($data)){
                $this->success('新增成功!');
            }else{
                $this->error('新增失败!');
            }
        }else{
            $this->display();
        }
    }

    /*
    * 设置权限
    */
    public function setAccess(){
        if (IS_POST) {
            $id = I('id');
            $rules = implode(',', I('rule'));

            $data = array(
                'id' => $id,
                'rules' => $rules,
            );

            $group = M('AuthGroup');
            if ($group->save($data)) {
                $this->success('设置成功!',U('indexGroup'));
            }else{
                $this->error('修改失败!');
            }
            
        }else{
            $this->group_id = I('get.id');
            $this->rule = rule_merge(M('AuthRule')->field('id,pid,title')->select());
            $this->display();
        }
    }
    
}



