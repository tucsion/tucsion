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
class AboutController extends Controller{

	public function index(){
		$this->team = M('Team')->order('sort DESC')->select();
		$this->partner = M('partner')->order('sort DESC')->select();
		$this->about = M('About')->where('id = 1')->select();
		$this->display();
	}

	public function join(){
		$this->list = M('Job')->where('state = 1')->order('sort DESC')->select();
		$this->display();
	}

}



