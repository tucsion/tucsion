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
class IndexController extends Controller{
    
    public function index(){
    	$this->web = M('System')
    				->where('id = 1')
    				->field('web_name,web_keywords,web_description')
    				->select();
    	$this->case = M('Case')
    				->alias('a')
    				->where('a.is_display = 1 AND a.is_index = 1')
    				->join('__CATEGORY__ b ON a.fid=b.id')
    				->field('a.id,a.title,a.sub_title,a.thumbnail,b.dir as dir')
    				->limit('6')
    				->select();

    	$this->banner = M('Banner')
    					->where('is_display = 1')
    					->field('title,sub_title,url,banner')
                        ->order('sort DESC')
    					->select();
        $this->display();
    }


}

