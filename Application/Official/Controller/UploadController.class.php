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
class UploadController extends AuthController{
	
	//上传一张图片
	public function uploadOneImg(){
		if (IS_AJAX) {
			echo uploadImg();
		}else{
			$this->error('非法访问!');
		}
	}
}


