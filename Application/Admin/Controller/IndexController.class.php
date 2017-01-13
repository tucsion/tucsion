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

namespace Admin\Controller;
use Common\Controller\AuthController;
class IndexController extends AuthController{
    public function index(){
        $this->display();
    }
    
    public function home(){
        $this->display();
    }
}



