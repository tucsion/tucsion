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
class ContactController extends AuthController{

	public function index(){
		$this->msg = M('ContactMessage')->order('post_time DESC')->select();
		$this->display();
	}

	public function delMsg(){
		if (M('ContactMessage')->where('id = '.I('id'))->delete() !== false) {
			$this->success('删除成功!',getPrevPage());
		}else{
			$this->error('删除失败!');
		}
	}

	public function setMsg(){
		if(M('ContactMessage')->where('id = '.I('id'))->setField('state',1)){
			$this->redirect(getPrevPage());
		}else{
			$this->error('处理失败!');
		}
	}


}


