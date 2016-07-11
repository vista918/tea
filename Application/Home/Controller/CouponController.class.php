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
 * 优惠券数据控制器
 */
class CouponController extends HomeController {

	/* 查询所有的优惠券列表 */
	public function index(){
		$totalcoupon = $this->query_coupon('DX123SDFAS124534'/*null,null,null,10002*/);
		dump($totalcoupon);
		//$this->display ();
	}
	
//   couponid             int not null comment '优惠券表主键',
//   identify             varchar(30) comment '优惠券生成的编号',
//   type                 tinyint default NULL comment '0-折扣,1-面值',
//   discount             int default NULL comment '折扣(value/100)',
//   disprice             int default NULL comment '折扣优惠面值',
//   starttime            int default 0 comment '优惠券起用时间',
//   deadline             int default 0 comment '到期时间',
//   status               tinyint default NULL comment '0-未使用，1-使用过',
//   usetime              int default 0 comment '优惠券使用的时间',
//   overprice            decimal default 0 comment '超过多少才可以使用',
//   available            tinyint comment '是否有效 0-有效 1-无效',

	/**
	 * 插入新的优惠券
	 */
    public function insert_coupon()
    {
        echo '新加一个新的优惠券';
        $coupon = D('Coupon');
        $data = Array (
            //'couponid' => 10001,
			'identify' => 'ladjlfaf1324654',
            'type' => 0,
            'discount' => 98,
            'disprice' => 20,
            'starttime' => time(),
            'deadline' => time(),
            'status' => 0,
            'usetime' => time(),
            'overprice' => 100,
            'available' => 0,
        );
        var_dump( $coupon->_new_coupon_($data));
    }

	/**
	 * 查询符合条件的优惠券记录
	 * @param null $identify string 优惠券生成的编号
	 * @param null $status int 0-未使用，1-使用过
	 * @param null $orderid int 订单编号
	 * @param null $buyerid int 买家id
	 * @return mixed 返回查获询结果
	 */
    public function query_coupon($identify = null,$status = null,$orderid = null,$buyerid = null)
    {
        echo '查询优惠券记录';
        $coupon = D('Coupon');
		
		$map['tea_coupon.available'] = 0;		//有效
		if(!is_null($identify))
			$map['tea_coupon.identify'] = $identify;
		if(!is_null($status))
			$map['tea_coupon.status'] = $status;
		if($status == 1)		//使用过才查询的一些量
		{
			if(!is_null($orderid))
				$map['tea_order.orderid'] = $orderid;
			if(!is_null($buyerid))
				$map['tea_order.buyerid'] = $buyerid;	
			$queryresult = $coupon->join('__ORDER__ on __ORDER__.couponid = __COUPON__.couponid')->field('tea_coupon.couponid,tea_coupon.identify,tea_coupon.type,tea_coupon.discount,tea_coupon.disprice,tea_coupon.starttime,tea_coupon.deadline,tea_coupon.status,tea_coupon.usetime,tea_coupon.overprice,tea_coupon.available,tea_order.orderid,tea_order.buyerid')->where($map)->select();		
		}else{
			$queryresult = $coupon->where($map)->select();
		}
				
		return $queryresult;
    }	
	
	/**
	 * 查询符合条件的优惠卷记录
	 * @param null $condition array 条件
	 * @return array 返回查获询结果
	 */
    public function query_coupon_by_condition($condition = null)
    {
        echo '查询提现纪录';
        $coupon = D('Coupon');		
		$map['tea_coupon.available'] = 0;		//有效
		$queryresult = $coupon->where($condition)->select();
		return $queryresult;
    }	

	/**
	 * 更改优惠券状态
	 * @param null $status int 更改为相应的状态
	 * @param null $condition array 查询条件
	 */
    public function set_status($status = null,$condition = null)
    {
        echo '更改提现记录状态';
        $coupon = D('Coupon');
		if(!is_null($status)){
			$data['status'] = $status;
			$coupon->where($condition)->save($data);
		}
    }	
	
	/**
	 * 修改优惠券
	 */
    public function modify_withdraw()
    {
        echo '修改优惠券';
        $coupon = D('Coupon');
        $data = Array (
            //'couponid' => 10001,
			'identify' => 'ladjlfaf1324654',
            'type' => 0,
            'discount' => 98,
            'disprice' => 20,
            'starttime' => time(),
            'deadline' => time(),
            'status' => 0,
            'usetime' => time(),
            'overprice' => 100,
            'available' => 0,
        );
        var_dump( $coupon->save($data));
    }

	/**
	 * 删除优惠券记录，在本案例中，仅修改标志位
	 * @param array $condition 删除条件
	 */
	public function delete_coupon($condition = null)
	{
		echo '删除优惠券记录，在本案例中，仅修改标志位';
        $coupon = D('Coupon');
		$data['available'] = 1;
		$coupon->where($condition)->save($data);
	}

}
