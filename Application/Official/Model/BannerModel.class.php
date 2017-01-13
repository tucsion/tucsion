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

namespace Official\Model;
use Think\Model;
class BannerModel extends Model{

	public function index($limit){
		return $this->order('sort DESC')->limit($limit)->select();
	}

	public function addBanner(){
		if ($this->create(I('post.'))) {
			$this->sort = $this->max('id') + 1;
			return $this->add();
		}
	}

	public function updateBanner(){
		if ($this->create(I('post.'))) {
			return $this->save();
		}
	}



}

