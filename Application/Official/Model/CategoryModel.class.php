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
class CategoryModel extends Model{

	//列表
	public function index(){
		return getNavTree($this->field('id,fid,name,sort')->order('sort ASC')->select());
	}

	//删除
	public function delCate(){
		$result = $this->field('id')->where('fid = '.I('id'))->select();
		$ids = I('id');
		if ($result) {
			foreach ($result as $key => $value) {
				$ids = $value['id'].','.$ids;
			}
		}

		return $this->where('id IN('.$ids.')')->delete();
	}

	//新增
	public function addCate(){
		$banner = '';
		if (I('pics')) {
			$banner = serialize(I('pics'));
		}
		$data = array(
			'fid' => I('fid'),
			'name' => I('name'),
			'dir' => I('dir'),
			'type' => I('type'),
			'keywords' => I('keywords'),
			'description' => I('description'),
			'banner' => $banner,
			'thumbnail' => I('thumbnail'),
			'is_display' => I('is_display'),
			'sort' => $this->max('id') + 1,
		);

		if ($this->create($data)) {
			return $this->add();
		}
	}

	//修改
	public function updateCate(){
		$banner = '';
		if (I('pics')) {
			$banner = serialize(I('pics'));
		}
		$data = array(
			'id' => I('id'),
			'fid' => I('fid'),
			'name' => I('name'),
			'dir' => I('dir'),
			'type' => I('type'),
			'keywords' => I('keywords'),
			'description' => I('description'),
			'banner' => $banner,
			'thumbnail' => I('thumbnail'),
			'is_display' => I('is_display'),
			'sort' => I('sort'),
		);
		if ($this->create($data)) {
			return $this->save();
		}
	}

	//获取一条数据
	public function oneCate(){
		$one = $this->where('id = '.I('id'))->select();
		$one[0]['banner'] = unserialize($one[0]['banner']);
		return $one;
	}

	//获取所有顶级栏目
	public function topCate(){
		return $this->where('fid = 0')->select();
	}


}




