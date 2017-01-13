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
class JobController extends AuthController{

	private $model = null;
	public function __construct(){
		parent::__construct();
		$this->model = M('Job');
		$this->assign('prevPage',getPrevPage());
	}

	public function listJob(){
		if (IS_POST) {
			$sql = saveMany(I('sort'),'ts_job');
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

			$this->list = $this->model->order('sort DESC')->limit($limit)->select();
			$this->display('About/listJob');
		}
	}

	public function addJob(){
		if (IS_POST) {
			$data = array(
				'title' => I('title'),
				'num' => I('num'),
				'num_complete' => I('num_complete'),
				'description' => $_POST['description'],
				'required' => $_POST['required'],
				'post_time' => time(),
				'state' => I('state'),
				'sort' => $this->model->max('id') + 1,
			);
			if ($this->model->create($data)) {
				if($this->model->add()){
					$this->success('新增成功!',U('listJob'));
				}else{
					$this->error('新增失败!');
				}
			}
		}else{
			$this->display('About/addJob');
		}
	}

	public function updateJob(){
		if (IS_POST) {
			$data = array(
				'id' => I('id'),
				'title' => I('title'),
				'num' => I('num'),
				'num_complete' => I('num_complete'),
				'description' => I('description'),
				'required' => I('required'),
				'state' => I('state'),
				'sort' => I('sort'),
			);
			if ($this->model->create($data)) {
				if($this->model->save()){
					$this->success('修改成功!',U('listJob'));
				}else{
					$this->error('修改失败!');
				}
			}
		}else{
			$this->oneJob = $this->model->where('id = '.I('id'))->select();
			$this->display('About/updateJob');
		}
	}

	public function delJob(){
		if ($this->model->where('id = '.I('id'))->delete() !== false) {
			$this->success('删除成功!');
		}else{
			$this->error('删除失败!');
		}
	}

}


