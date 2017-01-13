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
class ServiceController extends Controller{
    public function index(){
    	$this->service = M('Service')
    						->where('id = 1')
    						->select();
        $this->display();
    }
    
   
}



