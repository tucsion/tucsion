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
class CaseController extends AuthController{

	private $model = null;

	public function __construct(){
		parent::__construct();
		$this->assign('prevPage',getPrevPage());
		$this->model = D('Case');
	}

	//列表
	public function index(){
		if (IS_POST) {
			$sql = saveMany(I('sort'),'ts_case');
			if ($this->model->execute($sql)) {
				$this->redirect(getPrevPage());
			}else{
				$this->error('排序失败!');
			}
		}else{
			$count = $this->model->count();
			$Page = new \Think\Page($count,10);
			$limit = $Page->firstRow.','.$Page->listRows;
			$this->page = $Page->show();
			
			$this->cases = $this->model->index($limit);
			$this->display();
		}
	}

	//新增
	public function addCase(){
		if (IS_POST) {
			if ($this->model->addCase()) {
				$this->success('新增成功!',U('index'));
			}else{
				$this->error('新增失败!');
			}
		}else{
			$this->caseCate = M('Category')->field('id,name')->where('fid = 2')->select();
			$this->display();
		}
	}

	//删除
	public function delCase(){
		if ($this->model->delCase() === false) {
			$this->error('删除失败!');
		}else{
			$this->success('删除成功!',getPrevPage());
		}
	}

	//修改
	public function updateCase(){
		if (IS_POST) {
			if ($this->model->updateCase()) {
				$this->success('修改成功!');
			}else{
				$this->error('修改失败!');
			}
		}else{
			$this->oneCase = $this->model->oneCase();
			$this->caseCate = M('Category')->field('id,name')->where('fid = 2')->select();
			$this->display();
		}
	}

	//查找一条数据
	public function oneCase(){

		$this->display();
	}


}