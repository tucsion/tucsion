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
class CategoryController extends AuthController{
	private $model = null;
	public function __construct(){
		parent::__construct();
		$this->model = D('Category');
		$this->prevPage = getPrevPage();
	}

	//分类列表
	public function index(){
		if (IS_POST) {
			$sql = saveMany(I('sort'),'ts_category');
			if ($this->model->execute($sql)) {
				$this->redirect(getPrevPage());
			}else{
				$this->error('排序失败!');
			}
		}else{
			$this->navTree = $this->model->index();
			$this->display();
		}
	}

	//新增分类
	public function addCate(){
		if (IS_POST) {
			if ($this->model->addCate()) {
				$this->success('新增成功!',U('index'));
			}else{
				$this->error('新增失败!');
			}
		}else{
			if(I('fid')){
				$this->fNav = $this->model->field('id,dir')->where('id = '.I('fid'))->select();
			}
			$this->display();
		}
	}

	//修改分类
	public function updateCate(){
		if (IS_POST) {
			if ($this->model->updateCate()) {
				$this->success('修改成功!',U('index'));
			}else{
				$this->error('修改失败!');
			}
		}else{
			$this->topCate = $this->model->topCate();
			$this->oneCate = $this->model->oneCate();
			$this->display();
		}
	}

	//删除分类
	public function delCate(){
		if ($this->model->delCate() === false) {
			$this->error('删除失败!');
		}else{
			$this->success('删除成功!',getPrevPage());
		}
	}


}




