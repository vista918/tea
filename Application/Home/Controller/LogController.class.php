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
 * 日志控制器，用以记录后台管理人员的增删改
 */
class LogController extends HomeController {

	/* 查询所有的评论记录 */
	public function index(){
		dump($this->query_log());
		//dump($this->insert_log_setting());
		//dump($this->insert_log_setting_detail());
		//dump($this->insert_log_operation());
		//dump($this->delete_master('masterL'));
		//$this->display ();
	}
	

//   logsettingid         int not null auto_increment comment '日志设置编号',
//   tablename            varchar(50) comment '表名称',
//   businessname         varchar(50) comment '业务逻辑名称',
//   primarykey           varchar(50) comment '主键',
//   createuser           varchar(50) comment '创建者，用于审计',
//   createtime           int comment '创建时间，用于审计',

	/**
	 * 插入新的日志设置记录
	 */
    public function insert_log_setting()
    {
        echo '新加一个新的日志设置记录';
        $log_setting = D('log_setting');
        $data = Array (
            //'logsettingid' => ,
			'tablename' => 'tea_goods',
            'businessname' => '商品管理',
            'primarykey' => 'goodsid',
            'createuser' => 'admin',
            'createtime' => time()
        );
        var_dump( $log_setting->add($data));
    }
		
//   logdetailid          int not null auto_increment,
//   logsettingid         int comment '日志设置编号',
//   columnname           varchar(50) comment '字段名称',
//   columntext           varchar(50) comment '字段含义',
//   columndatatype       varchar(50) comment '字段数据类型',
//   createuser           varchar(50) comment '创建者，用于审计',
//   createtime           int comment '创建时间，用于审计',
   
	/**
	 * 插入新的日志设置详情记录
	 */
    public function insert_log_setting_detail()
    {
        echo '插入新的日志设置详情记录';
        $log_setting_detail = D('log_setting_detail');
        $data = Array (
            //'logdetailid' => ,
			'logsettingid' => 1,
			'columnname' => 'available',
			'columntext' => '有效标志，1为删除，0为有效',
			'columndatatype' => 'int',
            'createuser' => 'admin',
            'createtime' => time()
        );
        var_dump( $log_setting_detail->add($data));
    }
	
//   logoperationid       int not null auto_increment comment '日志操作编号',
//   logsettingid         int comment '日志设置编号',
//   type                 int comment '操作类型 0-add 1-delete 2-update',
//   primarykeyvalue      varchar(50) comment '主键值',
//   content              text comment '日志详细操作内容',
//   createuser           varchar(50) comment '创建者，用于审计',
//   createtime           int comment '创建时间，用于审计',
   
	/**
	 * 插入新的操作记录日志
	 */
    public function insert_log_operation()
    {
        echo '新加一个新的操作记录日志';
        $log_operation = D('log_operation');
        $data = Array (
            //'masterid' => ,
			'logsettingid' => '1',
            'type' => 1,
            'primarykeyvalue' => 5,
			'content' => '删除商品',
            'createuser' => 'admin',
            'createtime' => time()
        );
        var_dump( $log_operation->add($data));
    }
	
//   reply_id             int(10) not null auto_increment comment '回复评论id',
//   topicid              int(11) comment '评论编号',
//   reply_content        varchar(500) default NULL comment '回复内容',
//   reply_userid         int(10) default NULL comment '回复用户id',
//   reply_time           int default NULL comment '回复时间',
//   parent_reply_id      int(10) default NULL comment '上一条回复id',
	
	/**
	 * 查询符合条件的日志记录
	 * @param null $name string 名称
	 * @return mixed 返回查获询结果
	 */
    public function query_log($name = null)
    {
        echo '查询符合条件的日志记录';
        $log_setting = D('log_setting');
		$queryresult = $log_setting->alias('a')/*->field('a.createuser as acreateuser,a.createtime as acreatetime,b.createuser as bcreateuser,b.createtime as bcreatetime,c.createuser as createuser,c.createtime as createtime')*/->join('tea_log_setting_detail b on b.logsettingid = a.logsettingid')->join('tea_log_operation c on c.logsettingid = a.logsettingid')->select();				
		return $queryresult;
    }	
		
	/**
	 * 删除日志文件
	 * @param array $name 删除条件
	 */
	public function delete_log($name = null)
	{
		
	}

}
