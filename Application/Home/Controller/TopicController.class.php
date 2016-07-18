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
 * 评论数据控制器
 */
class TopicController extends HomeController {

	/* 查询所有的评论记录 */
	public function index(){
		//$map['goodsid'] = 3;
		//$totaltopic = $this->delete_reply($map);
		//dump($totaltopic);
		$totaltopic = $this->query_topic();
		$this->assign('totaltopic',$totaltopic);
		//dump($totaltopic);
		$this->display ();
	}
	
//	 topicid              int(11) not null auto_increment comment '评论id',
//   goodsid              int comment '商品id',
//   buyerid              int comment '买家编号',
//   topic_content        varchar(2000) default NULL comment '评论内容',
//   topic_time           int default NULL comment '评论时间',
//   is_show              int(1) default NULL comment '是否在前台显示，0不显示，1显示',

	/**
	 * 插入新的评论记录
	 */
    public function insert_topic()
    {
        echo '新加一个新的评论记录';
        $topic = D('Topic');
        $data = Array (
            //'topicid' => ,
			'goodsid' => 1,
            'buyerid' => 10002,
            'topiccontent' => '茶叶不错哟，下次还会再来买',
            'topictime' => time(),
            'is_show' => 1
        );
        var_dump( $topic->_new_topic_($data));
    }
	
//   reply_id             int(10) not null auto_increment comment '回复评论id',
//   topicid              int(11) comment '评论编号',
//   reply_content        varchar(500) default NULL comment '回复内容',
//   reply_userid         int(10) default NULL comment '回复用户id',
//   reply_time           int default NULL comment '回复时间',
//   parent_reply_id      int(10) default NULL comment '上一条回复id',
	
	/**
	 * 插入新的评论回复记录
	 */
    public function insert_topic_reply()
    {
        echo '新加一个新的评论回复记录';
        $topicreply = D('topic_reply');
        $data = Array (
            //'reply_id' => ,
			'topicid' => null,
            'reply_content' => '补充一下，下次要继续光顾哦。',
            'buyerid' => null,
            'reply_time' => time(),
            'parent_reply_id' => 1
        );
        var_dump( $topicreply->add($data));
    }

	/**
	 * 查询符合条件的评论记录
	 * @param null $goodsid int 商品id
	 * @param null $buyerid int 买家id
	 * @return mixed 返回查获询结果
	 */
    public function query_topic($goodsid = null,$buyerid = null)
    {
        //echo '查询评论记录';
        $topic = D('topic');
		
		if(!is_null($goodsid))
			$map['goodsid'] = $goodsid;
		if(!is_null($buyerid))
			$map['buyerid'] = $buyerid;
		$queryresult = $topic->where($map)->select();
				
		return $queryresult;
    }	
	
	public function grid()
	{			
		$list0  = $_POST['list'];
		if( isset($list0)  )
		{
			$list00 = json_decode($list0, true);
		}else
			return ;
		
		$addList = $list00["addList"];
		$updateList = $list00["updateList"];
		$deleteList = $list00["deleteList"];
		
		//dump($addList);
		//dump($updateList);
		//dump($deleteList); 
		
		$topic = D('Topic'); 
		
		if( isset($addList) && count($addList) > 0 )            
		{			
			foreach ($addList as $key => $record )
			{
				//dump($record);
				$record['topicid'] = null;
				$record['available'] = 0;		//增加有效字段
				$topic->add($record);				
			}    
		}
		
		if( isset($updateList) && count($updateList) > 0 )         
		{    
			foreach ($updateList as $record)
			{
				$topic->save($record);
			}    
			echo json_encode($updateList);
		}
		
		if( isset($deleteList) && count($deleteList) > 0 )     
		{   
			foreach ($deleteList as $record)
			{
				$condition['topicid'] = $record['topicid'];
				$this->delete_buyer($condition);
			}    
			echo json_encode($deleteList);
		}
	}
		
	public function get_grid_data()
	{		
		$rows = $this->query_topic();		
		$goods = D('Goods');
		$buyer = D('Buyer');
		$topic = D('Topic');
		foreach($rows as $key => $value)		//采用引用方式
		{
			$condition['buyerid'] = $value['buyerid'];
			$condition0['goodsid'] = $value['goodsid'];
			$goodsrecord = $goods->where($condition)->find();
			$record = $buyer->where($condition)->find();
			$rows[$key]['goodsname'] = $goodsrecord['name'];
			$rows[$key]['buyername'] = $record['name'];
		}
		$sb = "{\"data\":".json_encode($rows)."}";
		echo $sb;
	}
	
	/**
	 * 查询符合条件的评论记录
	 * @param null $goodsid int 商品id
	 * @param null $buyerid int 买家id
	 * @return mixed 返回查获询结果
	 */
    public function query_topic_reply($topicid = null)
    {
        echo '查询评论记录';
        $topicreply = D('topic_reply');
		
		if(!is_null($topicid))
			$map['topicid'] = $topicid;
		$queryresult = $topicreply->where($map)->select();
				
		return $queryresult;
    }	

	/**
	 * 更改评论状态
	 * @param null $is_show int 更改为相应的状态
	 */
    public function set_top_status($is_show = null)
    {
        echo '更改评论状态';
        $topic = D('topic');
		if(!is_null($is_show)){
			$data['is_show'] = $is_show;
			$topic->where($is_show)->save($data);
		}
    }	
	
	/**
	 * 修改评论
	 */
    public function modify_topic()
    {
        echo '修改评论';
        $topic = D('Topic');
        $data = Array (
            //'topicid' => ,
			'goodsid' => 3,
            'buyerid' => 10002,
            'topic_content' => '茶叶不错哟，下次还会再来买',
            'topic_time' => time(),
            'is_show' => 1
        );
        var_dump( $topic->save($data));
    }
	
	/**
	 * 修改评论回复
	 */
    public function modify_topic_reply()
    {
        echo '修改评论回复';
        $topicreply = D('TopicReply');
        $data = Array (
            //'reply_id' => ,
			'topicid' => 4,
            'reply_content' => '感谢您的评价，我们会用心做到最好。',
            'buyerid' => null,
            'reply_time' => time(),
            'parent_reply_id' => null
        );
        var_dump( $topicreply->save($data));
    }

	/**
	 * 删除评论
	 * @param array $condition 删除条件
	 */
	public function delete_reply($condition = null)
	{
		echo '删除评论';
        $topic = D('topic');
		$result = $topic->where($condition)->delete();
		return $result;
	}

}
