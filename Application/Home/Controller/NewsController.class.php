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
class NewsController extends Controller{
    public function __construct(){
        parent::__construct();
        $category = M('Category');
        $subNavs = $category->where('fid = 3')->field('dir,name')->select();
        $this->assign('subNavs',$subNavs);
    }

    //列表
    public function dir(){
        if (I('dir')) {
            $where = M('Category')->getFieldByDir('news/'.I('dir'),'id');
        }else{
            $temp = M('Category')->field('id,dir')->where('fid = 3')->select();
            $where = '';
            foreach ($temp as $key=>$value){
                $where = $value['id'].','.$where;
            }
            $where = substr($where, 0 , -1);
        }
        $field = 'a.id,a.title,a.description,a.thumbnail,a.post_time,b.dir as cate_dir,b.name as cate_name';

        $this->list = M('News as a')
                        ->join('__CATEGORY__ as b')
                        ->field($field)
                        ->where('a.fid IN('.$where.') AND a.fid = b.id AND a.is_display = 1')
                        ->select();
        $this->display('index');
    }
    
    public function detail(){
        $field = 'a.title,a.keywords,a.description,a.content,a.post_time,b.dir as cate_dir,b.name as cate_name';
        $this->detail = M('News as a')
                        ->join('__CATEGORY__ as b')
                        ->where('a.fid = b.id AND a.is_display = 1 AND a.id = '.I('id'))
                        ->order('a.sort DESC')
                        ->field($field)
                        ->select();
        $field2 = 'a.id,a.title,a.thumbnail,b.dir as cate_dir';
        $this->recommend = M('News as a')
                        ->join('__CATEGORY__ as b')
                        ->where('a.fid = b.id AND a.is_recommend = 1 AND a.id <>'.I('id'))
                        ->order('a.sort DESC')
                        ->field($field2)
                        ->limit('9')
                        ->select();
        $this->display('detail');
    }
    
    
}


