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
class BannerController extends AuthController{
	private $model = null;
	public function __construct(){
		parent::__construct();
		$this->prevPage = getPrevPage();
		$this->model = D('Banner');
	}

	public function index(){
		if (IS_POST) {
			$sql = saveMany(I('sort'),'ts_banner');
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

			$this->banner = $this->model->index($limit);
			$this->display();
		}	
	}

	public function addBanner(){
		if (IS_POST) {
			if ($this->model->addBanner()) {
				$this->success('新增成功!',U('index'));
			}else{
				$this->error('新增失败!');
			}
		}else{
			$this->display();
		}
	}

	public function delBanner(){
		if ($this->model->where('id = '.I('id'))->delete() === false) {
			$this->error('删除失败!');
		}else{
			$this->success('删除成功!',getPrevPage());
		}
	}

	public function updateBanner(){
		if (IS_POST) {
			if ($this->model->updateBanner()) {
				$this->success('修改成功!',U('index'));
			}else{
				$this->error('修改失败!');
			}
		}else{
			$this->oneBanner = $this->model->where('id = '.I('id'))->select();
			$this->display();
		}
	}


}
