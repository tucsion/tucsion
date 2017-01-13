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
class PartnerController extends AuthController{

	private $model = null;
	public function __construct(){
		parent::__construct();
		$this->model = M('Partner');
		$this->assign('prevPage',getPrevPage());
	}

	public function listPartner(){
		if (IS_POST) {
			$sql = saveMany(I('sort'),'ts_partner');
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
			$this->display('About/listPartner');
		}
	}

	public function addPartner(){
		if (IS_POST) {
			$data = array(
				'name' => I('name'),
				'url' => I('url'),
				'thumbnail' => I('thumbnail'),
				'sort' => $this->model->max('id') + 1,
			);
			if ($this->model->create($data)) {
				if($this->model->add()){
					$this->success('新增成功!',U('listPartner'));
				}else{
					$this->error('新增失败!');
				}
			}
		}else{
			$this->display('About/addPartner');
		}
	}

	public function updatePartner(){
		if (IS_POST) {
			$data = array(
				'id' => I('id'),
				'name' => I('name'),
				'url' => I('url'),
				'thumbnail' => I('thumbnail'),
				'sort' => I('sort'),
			);
			if ($this->model->create($data)) {
				if($this->model->save()){
					$this->success('修改成功!',U('listPartner'));
				}else{
					$this->error('修改失败!');
				}
			}
		}else{
			$this->onePartner = $this->model->where('id = '.I('id'))->select();
			$this->display('About/updatePartner');
		}
	}

	public function delPartner(){
		if ($this->model->where('id = '.I('id'))->delete() !== false) {
			$this->success('删除成功!');
		}else{
			$this->error('删除失败!');
		}
	}

}

