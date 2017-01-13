<?php
/**
* +----------------------------------------------------------------------
* | Tucsion
* +----------------------------------------------------------------------
* | Copyright (c) 2006-2016 http://www.tucsion.com All rights reserved.
* +----------------------------------------------------------------------
* | Author: zhengbo <zhengbo@tucsion.com>
* +----------------------------------------------------------------------
* | Date: 2016年6月27日
* +----------------------------------------------------------------------
*/

namespace Home\Controller;
use Think\Controller;
class CaseController extends Controller{
    public function __construct(){
        parent::__construct();
        $category = M('Category');
        $subNavs = $category->where('fid = 2')->field('dir,name')->select();
        $this->assign('subNavs',$subNavs);
    }
    public function index(){
        $where = M('Category')->field('id,dir')->where('fid = 2')->select();

        $temp = '';
        foreach ($where as $key=>$value){
            $temp = $value['id'].','.$temp;
        }
        $temp = substr($temp, 0 , -1);
        $field = 'a.id,a.title,a.sub_title,a.thumbnail,b.dir as fid_dir';
        $this->list = M('Case as a')
                        ->join('__CATEGORY__ as b')
                        ->field($field)
                        ->where('a.fid IN('.$temp.') AND a.fid = b.id')
                        ->select();
        $this->display();
    }

    public function dir(){
        $temp = M('Category')->getFieldByDir('case/'.I('dir'),'id');
        $field = 'a.id,a.title,a.sub_title,a.thumbnail,b.dir as fid_dir';

        $this->list = M('Case as a')
                        ->join('__CATEGORY__ as b')
                        ->field($field)
                        ->where('a.fid IN('.$temp.') AND a.fid = b.id')
                        ->select();

        $this->display('index');
    }
    
    public function detail(){
        $detail = M('Case')->where('id = '.I('id'))->select();
        if ($detail[0]['banner']) {
            $detail[0]['banner'] = unserialize($detail[0]['banner']);
        }
        if ($detail[0]['tags']) {
            $detail[0]['tags'] = unserialize($detail[0]['tags']);
        }
        $field = 'a.id,a.title,a.thumbnail,b.dir as cate_dir';
        $this->recommend = M('Case as a')
                        ->join('__CATEGORY__ as b')
                        ->where('a.fid = b.id AND a.id <>'.I('id'))
                        ->order('a.sort DESC')
                        ->field($field)
                        ->order('rand()')
                        ->limit('9')
                        ->select();
        $this->detail = $detail;
        if ($detail[0]['template'] == 2) {
            $this->display('Ftp/'.$detail[0]['ftp_url'].'/index');
        }else{
            $this->display('detail');
        }
    }
    
    
}


