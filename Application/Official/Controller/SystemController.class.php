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


namespace Official\Controller;
use Common\Controller\AuthController;
class SystemController extends AuthController{
    
    public function index(){
    	if (IS_POST) {
    		if (M('System')->save($_POST)) {
                $this->success('修改成功!');
    		}else{
    			$this->error('修改失败!');
    		}
    	}else{
    		$this->system = M('System')->where('id = 1')->select();
    		$this->display();
    	}
    }


}