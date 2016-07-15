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
 * 订单数据控制器
 */
class OrderController extends HomeController {

	/* 查询所有的商品列表 */
	public function index(){
        $order = D('Order');
		$totalorder = $this->query_order();
		//dump($totalorder);
		foreach($totalorder as $key => $value)
		{
			$arr = $order->_get_order_money($value['orderid']);
			$ordermoney[$key] = $arr[1];
		}
		$this->assign('totalorder',$totalorder);
		$this->assign('ordermoney',$ordermoney);
		$this->display ();
	}

	/**
	 * 插入新的订单
	 */
    public function insert_order()
    {
        echo '新加一个新的订单';
        $order = D('Order');
        $data = Array (
            'orderid' => 10001,
            'type' => 1,
            'buyerid' => 10002,
            'couponid' => 10001,
            'createtime' => time(),
            'deliverytime' => time(),
            'receivetime' => time(),
            'completetime' => time(),
            'status' => 1,
            'deliverymoney' => 0,
        );
        var_dump( $order->_new_order_($data));
    }

	/**
	 * 查询符合条件的订单
	 * @param null $orderid int 订单编号
	 * @param null $type int 订单类型
	 * @param null $status int 订单状态
	 * @param null $timebegin int 起始的时间戳
	 * @param null $timeend int 结束的时间戳
	 * @param null $buyerid int 买家编号
	 * @return mixed 返回查获询结果
	 */
    public function query_order($orderid = null,$type = null,$status = null,$timebegin = null, $timeend = null,$buyerid = null)
    {
        //echo '查询订单';
		$order = D('Order');
		if(!is_null($orderid))
			$map['orderid'] = $orderid;
		if(!is_null($type))
			$map['type'] = $type;
		if(!is_null($status))
			$map['status'] = $status;
		if(!is_null($timebegin))
			$map['createtime'] = array('egt',$timebegin);
		if(!is_null($timeend))
			$map['createtime'] = array('lt',$timeend);
		if(!is_null($buyerid))
			$map['buyerid'] = $buyerid;
		$queryresult = $order->where($map)->select();
		return $queryresult;
    }

	/**
	 * 更改订单状态
	 * @param null $status int 更改为相应的状态
	 * @param null $condition array 查询条件
	 */
    public function set_status($status = null,$condition = null)
    {
        echo '更改商品状态';
		$order = D('Order');
		if(!is_null($status)){
			$data['status'] = $status;
			$order->where($condition)->save($data);
		}
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
		
		$goods = D('Order'); 
		
		if( isset($addList) && count($addList) > 0 )            
		{			
		
			foreach ($addList as $key => $record )
			{
				//dump($record);
				$record['orderid'] = null;
				$record['available'] = 0;		//增加有效字段
				$goods->add($record);				
			}    
		}
		
		if( isset($updateList) && count($updateList) > 0 )         
		{    
			foreach ($updateList as $record)
			{
				$goods->save($record);
			}    
			echo json_encode($updateList);
		}
		
		if( isset($deleteList) && count($deleteList) > 0 )     
		{   
			foreach ($deleteList as $record)
			{
				$condition['orderid'] = $record['orderid'];
				$this->delete_goods($condition);
			}    
			echo json_encode($deleteList);
		}
		  
	}
		
	public function get_grid_data()
	{		
		$rows = $this->query_order();		
		$order = D('Order');
		$coupon = D('Coupon');
		$buyer = D('Buyer');
		foreach($rows as $key => &$value)		//采用引用方式
		{
			$moneyArray = $order->_get_order_money($value['orderid']);
			$value['ordermoney'] = $moneyArray[0];
			$value['finalmoney'] = $moneyArray[1];
			$condition['couponid'] = $value['couponid'];
			$couponrecord = $coupon->where($condition)->find();
			$value['couponidentify'] = $couponrecord['identify'];
			$condition2['buyerid'] = $value['buyerid'];
			$buyerrecord = $buyer->where($condition2)->find();
			$value['buyername'] = $buyerrecord['name'];
		}
		$sb = "{\"data\":".json_encode($rows)."}";
		echo $sb;
	}
		
	/**
	 * 修改订单属性
	 */
    public function modify_order()
    {
        echo '修改订单属性';
		$order = D('Order');
        $data = Array (
            'orderid' => 10001,
            'type' => 1,
            'buyerid' => 10002,
            'couponid' => 10001,
            'createtime' => time(),
            'deliverytime' => time(),
            'receivetime' => time(),
            'completetime' => time(),
            'status' => 1,
            'deliverymoney' => 0,
        );
        var_dump( $order->save($data));
    }

	/**
	 * 删除订单纪录，在本案例中，仅修改标志位
	 * @param array $condition 删除条件
	 */
	public function delete_order($condition = null)
	{
		echo '删除订单';
		$order = D('Order');
		$data['available'] = 1;
		$goods->where($condition)->save($data);
	}

}
