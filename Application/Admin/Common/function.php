<?php
/**
* +----------------------------------------------------------------------
* | Tucsion
* +----------------------------------------------------------------------
* | Copyright (c) 2006-2016 http://www.tucsion.com All rights reserved.
* +----------------------------------------------------------------------
* | Author: zhengbo <zhengbo@tucsion.com>
* +----------------------------------------------------------------------
* | Date: 2016年7月28日
* +----------------------------------------------------------------------
*/


//P函数
function p($arr){
	dump($arr,1,'<pre>',0);
}

//验证验证码
function check_code($code,$id=''){
	$verify = new \Think\Verify();
	return $verify->check($code, $id);
}


//递归重组节点数组
function rule_merge($rule,$pid=0){
	$arr = array();

	foreach($rule as $v){

		if ($v['pid'] == $pid) {
			$v['child'] = rule_merge($rule,$v['id']);
			$arr[] = $v;
		}

	}

	return $arr;
}



