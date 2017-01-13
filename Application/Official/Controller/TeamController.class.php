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
class TeamController extends AuthController{

	private $model = null;
	public function __construct(){
		parent::__construct();
		$this->model = M('Team');
		$this->assign('prevPage',getPrevPage());
	}

	public function listTeam(){
		if (IS_POST) {
			$sql = saveMany(I('sort'),'ts_team');
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
			$this->display('About/listTeam');
		}
	}

	public function addTeam(){
		if (IS_POST) {
			$data = array(
				'name' => I('name'),
				'en_name' => I('en_name'),
				'job' =>I('job'),
				'thumbnail' => I('thumbnail'),
				'is_display' => I('is_display'),
				'sort' => $this->model->max('id') + 1,
			);
			if ($this->model->create($data)) {
				if($this->model->add()){
					$this->success('新增成功!',U('listTeam'));
				}else{
					$this->error('新增失败!');
				}
			}
		}else{
			$this->display('About/addTeam');
		}
	}

	public function updateTeam(){
		if (IS_POST) {
			$data = array(
				'id' => I('id'),
				'name' => I('name'),
				'en_name' => I('en_name'),
				'job' =>I('job'),
				'thumbnail' => I('thumbnail'),
				'is_display' => I('is_display'),
				'sort' => I('sort'),
			);
			if ($this->model->create($data)) {
				if($this->model->save()){
					$this->success('修改成功!',U('listTeam'));
				}else{
					$this->error('修改失败!');
				}
			}
		}else{
			$this->oneTeam = $this->model->where('id = '.I('id'))->select();
			$this->display('About/updateTeam');
		}
	}

	public function delTeam(){
		if ($this->model->where('id = '.I('id'))->delete() !== false) {
			$this->success('删除成功!');
		}else{
			$this->error('删除失败!');
		}
	}

}

