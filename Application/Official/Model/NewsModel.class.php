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
class NewsModel extends Model{

	public function index(){
		$field = 'a.id,a.title,a.post_time,a.is_display,a.sort,b.name as cate';
		return $this->alias('a')
					->join('__CATEGORY__ b ON a.fid=b.id')
					->field($field)
					->order('sort DESC')
					->limit($limit)
					->select();
	}

	public function delNews(){
		return $this->where('id ='.I('id'))->delete();
	}

	public function addNews(){

		$data = array(
			'fid' => I('fid'),
			'title' => I('title'),
			'keywords' => I('keywords'),
			'description' => I('description'),
			'content' => $_POST['content'],
			'thumbnail' => I('thumbnail'),
			'sort' => $this->max('id') + 1,
			'post_time' => time(),
			'author' => I('author'),
			'source' => I('source'),
			'is_top' => I('is_top'),
			'is_display' => I('is_display'),
			'is_index' => I('is_index'),
			'is_recommend' => I('is_recommend')
		);

		if ($this->create($data)) {
			return $this->add();
		}
	}


	public function updateNews(){

		$data = array(
			'id' => I('id'),
			'fid' => I('fid'),
			'title' => I('title'),
			'keywords' => I('keywords'),
			'description' => I('description'),
			'content' => $_POST['content'],
			'thumbnail' => I('thumbnail'),
			'sort' => I('sort'),
			'author' => I('author'),
			'source' => I('source'),
			'is_top' => I('is_top'),
			'is_display' => I('is_display'),
			'is_index' => I('is_index'),
			'is_recommend' => I('is_recommend')
		);

		if ($this->create($data)) {
			return $this->save();
		}
	}


	public function oneNews(){
		return $this->where('id = '.I('id'))->select();
	}


}





