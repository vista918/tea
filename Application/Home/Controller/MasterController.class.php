<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: vista <@bluedoorindex>
// +----------------------------------------------------------------------

namespace Home\Controller;
use OT\DataDictionary;

/**
 * 后台人员控制器
 */
class MasterController extends HomeController {

	/* 查询所有的评论记录 */
	public function index(){
		//$name = 'admin';
		//$password = '7435413';
		//$ret = $this->reset_password($name,$password);
		//dump($ret);
		dump($this->query_master());
		//dump($this->delete_master('masterL'));
		//$this->display ();
	}
	
//   masterid             int not null auto_increment comment '管理表编号',
//   name                 varchar(30) comment '管理者名称',
//   password             varchar(20) comment '密码',
//   authority            int comment '权限',
//   available            tinyint default 0 comment '0-有效 1-无效',

	/**
	 * 插入新的评论记录
	 */
    public function insert_master()
    {
        echo '新加一个新的评论记录';
        $master = D('master');
        $data = Array (
            //'masterid' => ,
			'name' => 'guest',
            'password' => md5('23456'),
            'authority' => 1,
            'available' => 0
        );
        var_dump( $master->_new_master_($data));
    }
	
//   reply_id             int(10) not null auto_increment comment '回复评论id',
//   topicid              int(11) comment '评论编号',
//   reply_content        varchar(500) default NULL comment '回复内容',
//   reply_userid         int(10) default NULL comment '回复用户id',
//   reply_time           int default NULL comment '回复时间',
//   parent_reply_id      int(10) default NULL comment '上一条回复id',
	
	/**
	 * 查询符合条件的管理员记录
	 * @param null $name string 名称
	 * @return mixed 返回查获询结果
	 */
    public function query_master($name = null)
    {
        echo '查询管理员记录';
        $master = D('master');
		
		if(!is_null($name))
			$map['name'] = '%'.$name.'%';
		$queryresult = $master->where($map)->select();
				
		return $queryresult;
    }	
	
	/**
	 * 更改管理员账号的密码
	 * @param null $password int 更改为相应的密码
	 */
    public function reset_password($name = null , $password = null)
    {
        echo '更改管理员账号的密码';
        $master = D('master');
		if(!is_null($password) && !is_null($password)){
			$condition['name'] = $name;
			$data['password'] = md5($password);
			$ret = $master->where($condition)->save($data);
			return $ret;
		}
		return null;
    }	
	
	/**
	 * 删除管理员
	 * @param array $name 删除条件
	 */
	public function delete_master($name = null)
	{
		echo '删除管理员';
        $master = D('master');
		$condition['name'] = $name;
		$result = $master->where($condition)->delete();
		//if($result == false)
			//dump($master->getDbError());
		return $result;
	}

}
