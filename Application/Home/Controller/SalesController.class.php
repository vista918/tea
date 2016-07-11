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
 * 销售概况控制器
 */
class SalesController extends HomeController {

	/* 销售概况 */
	public function index(){
		$tobedelivered = $this->getGooodsCountToBeDelivered();
		$OrderCountRecentWeek = $this->getOrderCountRecentWeek();
		$SalesRecentWeek = $this->getSalesRecentWeek();
		$this->assign('tobedelivered',$tobedelivered);
		$this->assign('OrderCountRecentWeek',$OrderCountRecentWeek);
		$this->assign('SalesRecentWeek',$SalesRecentWeek);
		$this->display ();
	}

	/* 获取待发货数 */
	public function getGooodsCountToBeDelivered(){
		
        $order = D('Order');
		$count = $order->where('status=1')->count('*');
//		$count = $order->query('select count(*) from tea_order where status=1');
//		上一句会返回一个array 
					// 	=> [0] => count(*) => "1"
		//dump($count);
		if(is_null($count))
			return 0;
		else
			return $count;
	}

	/* 获取昨日下单数 */
	public function getOrderCountYesterday(){
		//一天的时间戳之差是86400
		$date_time_array = getdate(time()-86400); 
		$month = $date_time_array["mon"];
		$day = $date_time_array["mday"];
		$year = $date_time_array["year"];
		return $this->getOrderCount($year,$month,$day);
	}

	/**
	 * 获取下单数
	 * @param $year int 年份
	 * @param $month int 月份
	 * @param $day int 天
	 * @return int 数目
	 */
	public function getOrderCount($year,$month,$day){
		
        $order = D('Order');
		//dump(strtotime(date("Y-m-d",time())));
		//dump(strtotime('2016-07-04'));
		//一天的时间戳之差是86400
		$begin = strtotime("$year-$month-$day");
		$end = $begin + 86400;
		
		//echo $begin."****".$end;
		$count = $order->where("createtime >= $begin and createtime < $end")->count('*');
		//$count = $order->where("createtime >= $begin and createtime < $end")->select();
		//dump($count);		//null;
		if(is_null($count))
			return 0;
		else
			return $count;
	}
	
	/**
	 * 获取昨日销售额
	 * @param $year int 年份
	 * @param $month int 月份
	 * @param $day int 天
	 * @return int 金额
	 */
	public function getSales($year,$month,$day){
		//先获取昨日的订单号
		
        $order = D('Order');
		//dump(strtotime(date("Y-m-d",time())));
		//dump(strtotime('2016-07-04'));
		//一天的时间戳之差是86400
		$begin = strtotime("$year-$month-$day");
		$end = $begin + 86400;
		
		$orderids = $order->where("createtime >= $begin and createtime < $end and status >= 1")->field('orderid')->select();
		//dump($orderids);		//false;
		
		$money = 0;
		
		if( !is_null($orderids) && $orderids != false )
        {
            foreach($orderids as $key => $value)
            {
                $orderid = $value['orderid'];
                //dump($orderid);

                $money += $order->_get_order_money(orderid);
            }
        }
		
		//dump($money);
		return $money;
	}

	/* 获取昨日销售额 */
	public function getSalesYesterday(){
		
		//一天的时间戳之差是86400
		$date_time_array = getdate(time()-86400); 
		$month = $date_time_array["mon"];
		$day = $date_time_array["mday"];
		$year = $date_time_array["year"];
		$money = $this->getSales($year,$month,$day);
		//dump($money);
		return $money;
	}

	/**
	 * 获取近7天订单数
	 * @return mixed array 0-昨日，1-前日，以此类推
	 */
	public function getOrderCountRecentWeek(){
//		echo date("Y-m-d H:i:s",1467623934);
//		echo " ----- ";
//		dump("1467623934");
		
		for($index0 = 0; $index0 < 7 ; ++$index0)
		{
			//一天的时间戳之差是86400
			$date_time_array = getdate(time()-86400*($index0+1)); 
			$month = $date_time_array["mon"];
			$day = $date_time_array["mday"];
			$year = $date_time_array["year"];
			$countofthisweek[$index0] = $this->getOrderCount($year,$month,$day);			
		}
		//dump($countofthisweek);
		return $countofthisweek;
	}

	/**
	 * 获取近7天销售额
	 * @return mixed array 0-昨日，1-前日，以此类推
	 */
	public function getSalesRecentWeek(){
		
		for($index0 = 0; $index0 < 7 ; ++$index0)
		{
			//一天的时间戳之差是86400
			$date_time_array = getdate(time()-86400*($index0+1)); 
			$month = $date_time_array["mon"];
			$day = $date_time_array["mday"];
			$year = $date_time_array["year"];
			$salesofthisweek[$index0] = $this->getSales($year,$month,$day);			
		}
	//	dump($salesofthisweek);
		return $salesofthisweek;
	}

}
