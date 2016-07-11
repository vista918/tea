<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

namespace Home\Controller;
use OT\DataDictionary;

/**
 * 前台首页控制器
 * 主要获取首页聚合数据
 */
class IndexController extends HomeController {

	//系统首页
    public function index(){

        $category = D('Category')->getTree();
        $lists    = D('Document')->lists(null);

        $this->assign('category',$category);//栏目
        $this->assign('lists',$lists);//列表
        $this->assign('page',D('Document')->page);//分页
                 
        $this->display();
    }
	
	public function test()
	{
        $url = U('/Home/Withdraw/insert_withdraw');
        header("Location: $url");
        exit;
	}

    public function insertordergoods()
    {
        echo '新加一个新的订单商品关系数据';
        $ordergoods = D('OrderGoods');

        $data = Array (
            'goodsid' => 1,
            'orderid' => 10001,
            'goodscount' => 2,
        );
        var_dump( $ordergoods->_new_ordergoods_($data));

        $data = Array (
            'goodsid' => 2,
            'orderid' => 10001,
            'goodscount' => 3,
        );
        var_dump( $ordergoods->_new_ordergoods_($data));
    }

    public function money()
    {
        $order = D('Order');
        $money = $order->_get_order_money('10001');
        if($money == null)
        {
            echo '订单查询结果为空';
        }else
            echo '订单10001的金额:'.$money;
    }    

}