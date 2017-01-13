<?php
/**
* +----------------------------------------------------------------------
* | Tucsion
* +----------------------------------------------------------------------
* | Copyright (c) 2006-2016 http://www.tucsion.com All rights reserved.
* +----------------------------------------------------------------------
* | Author: zhengbo <zhengbo@tucsion.com>
* +----------------------------------------------------------------------
* | Date: 2016年7月29日
* +----------------------------------------------------------------------
*/

namespace Admin\Model;
use Think\Model\RelationModel;
class AuthUserRelationModel extends RelationModel{

	//定于主表名称
	protected $tableName = 'auth_user';

	//定义关联关系
	protected $_link = array(

		'auth_group' => array(
		    'mapping_type'      =>  self::MANY_TO_MANY,
		    'mapping_name'      =>  'group',
		    'foreign_key'       =>  'uid',
		    'relation_foreign_key'  =>  'group_id',
		    'relation_table'    =>  'ts_auth_group_access',
		    'mapping_fields' => 'id,title',
		    'mapping_order' => 'id ASC',
		    'mapping_limit' => 20
	    )

	);


}
