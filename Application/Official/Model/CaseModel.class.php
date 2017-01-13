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
class CaseModel extends Model{

	public function index($limit){
		$field = 'a.id,a.title,a.thumbnail,a.is_display,a.sort,b.name as cate';
		return $this->alias('a')
					->join('__CATEGORY__ b ON a.fid=b.id')
					->field($field)
					->order('sort DESC')
					->limit($limit)
					->select();
	}

	public function delCase(){
		return $this->where('id ='.I('id'))->delete();
	}

	public function addCase(){
		$banner = $tags = '';

		if (I('pics')) {
			$banner = serialize(I('pics'));
		}

		if(I('tags')){
			$tags = serialize(explode(',', I('tags')));
		}

		$data = array(
			'fid' => I('fid'),
			'title' => I('title'),
			'sub_title' => I('sub_title'),
			'keywords' => I('keywords'),
			'description' => I('description'),
			'tags' => $tags,
			'content' => $_POST['content'],
			'thumbnail' => I('thumbnail'),
			'banner' => $banner,
			'sort' => $this->max('id') + 1,
			'post_time' => time(),
			'author' => I('author'),
			'source' => I('source'),
			'is_top' => I('is_top'),
			'is_display' => I('is_display'),
			'is_index' => I('is_index'),
			'template' => I('template'),
			'ftp_url' => I('ftp_url')
		);


		if ($this->create($data)) {
			return $this->add();
		}
	}


	public function updateCase(){
		$banner = $tags = '';

		if (I('pics')) {
			$banner = serialize(I('pics'));
		}

		if(I('tags')){
			$tags = serialize(explode(',', I('tags')));
		}

		$data = array(
			'id' => I('id'),
			'fid' => I('fid'),
			'title' => I('title'),
			'sub_title' => I('sub_title'),
			'keywords' => I('keywords'),
			'description' => I('description'),
			'tags' => $tags,
			'content' => $_POST['content'],
			'thumbnail' => I('thumbnail'),
			'banner' => $banner,
			'sort' => I('sort'),
			'author' => I('author'),
			'source' => I('source'),
			'is_top' => I('is_top'),
			'is_display' => I('is_display'),
			'is_index' => I('is_index'),
			'template' => I('template'),
			'ftp_url' => I('ftp_url')
		);

		if ($this->create($data)) {
			return $this->save();
		}
	}


	public function oneCase(){
		$one = $this->where('id = '.I('id'))->select();
		$one[0]['banner'] = unserialize($one[0]['banner']);
		$one[0]['tags'] = implode(',', unserialize($one[0]['tags']));
		return $one;
	}


}





