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
class ContactController extends Controller{

	public function index(){
		if (IS_POST) {
			$msg = M('ContactMessage');
			$data = array(
				'name' => I('name'),
				'phone' => I('phone'),
				'email' => I('email'),
				'content' => I('content'),
				'post_time' => time(),
			);
			if ($msg->add($data)) {
				echo "<script type='text/javascript'>alert('您的留言已提交,请耐心等待工作人员联系您!');</script>";
			}else{
				echo "<script type='text/javascript'>alert('发生错误!请重新提交');</script>";
			}
		}
		$this->display();
	}

}


