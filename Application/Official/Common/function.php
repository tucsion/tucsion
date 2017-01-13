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

	
	
/**
*	获取所有分类,并以导航树输出
*/
function getNavTree($cate,$fid = 0) {
    $arr = array();
    foreach ($cate as $v) {
        if ($v['fid'] == $fid) {
            $v['child'] = getNavTree($cate, $v['id']);
            $arr[] = $v;
        }
    }
    return $arr;
}


/**
*   设置批量更新(更新一个字段) [id] => sort
Array
(
    [sort] => Array
        (
            [1] => 1
            [2] => 2
            [7] => 7
            [8] => 8
        )
)
*/
function  saveMany($data,$table){
    $ids = implode(',', array_keys($data)); 
    $sql = "UPDATE $table SET sort = CASE id "; 
    foreach ($data as $id => $ordinal) { 
        $sql .= sprintf("WHEN %d THEN %d ", $id, $ordinal); 
    } 
    $sql .= "END WHERE id IN ($ids)"; 
    return $sql;
}

/**
*   上传文件
*/
function uploadImg(){
    $upload = new \Think\Upload();// 实例化上传类
    $upload->maxSize   =     3145728 ;// 设置附件上传大小3M
    $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
    $upload->rootPath  =     './Uploads/'; // 设置附件上传根目录
    $upload->autoSub   =     true;
    $upload->subName   =     array('date','Y/m/d');
    $upload->saveName  =     time().'_'.mt_rand();    //设置名称
    // 上传文件 
    $info = $upload->upload();
    if (!$info) {
        return $upload->getError();
    }else{
        foreach($info as $file){
            return substr($upload->rootPath.$file['savepath'].$file['savename'], 1);
        }
    }
}




