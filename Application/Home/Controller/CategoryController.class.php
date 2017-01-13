<?php
/**
* +----------------------------------------------------------------------
* | Tucsion
* +----------------------------------------------------------------------
* | Copyright (c) 2006-2016 http://www.tucsion.com All rights reserved.
* +----------------------------------------------------------------------
* | Author: zhengbo <zhengbo@tucsion.com>
* +----------------------------------------------------------------------
* | Date: 2016年6月28日
* +----------------------------------------------------------------------
*/


namespace Home\Controller;
use Think\Controller;
class CategoryController extends Controller{
 
    public function index(){
        
        switch (I('cateid')){
            case 1:
                $this->display(T('Service'));
            case 2:
                $this->display('Case');
        }

        
    }
}

