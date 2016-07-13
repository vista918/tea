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
 * 买家数据控制器
 */
class BuyerController extends HomeController {

	/* 查询所有的买家列表 */
	public function index(){
        //$goods = D('Goods');
		$totalbuyer = $this->query_buyer();
		//dump($totalbuyer);
		$this->assign('totalbuyer',$totalbuyer);
		$this->display ();
	}

	/**
	 * 插入新的买家
	 */
    public function insert_buyer()
    {
        echo '新加一个新的买家';
        $buyer = D('Buyer');
        $data = Array (
            'buyerid' => 10001,
            'name' => '某某某',
            'account' => null,
            'password' => null,
            'phone' => null,
            'gold' => 0,
            'balance' => 0,
            'expenditure' => 0,
            'level' => 1,
        );
        var_dump( $buyer->_new_buyer_($data));
    }

	/**
	 * 查询符合条件的买家
	 * @param null $name string 买家名称
	 * @return mixed 返回查获询结果
	 */
    public function query_buyer($name = null)
    {
        //echo '查询买家';
        $buyer = D('Buyer');
		if(!is_null($name))
			$map['name'] = array('like','%'.$name.'%');
		$queryresult = $buyer->where($map)->select();
		return $queryresult;
    }
	
	/**
	 * 修改买家属性
	 */
    public function modify_buyer()
    {
        echo '修改买家属性';
		$buyer = D('Buyer');
        $data = Array (
            'buyerid' => 10002,
            'name' => '买家1号',
            'account' => null,
            'password' => null,
            'phone' => null,
            'gold' => 0,
            'balance' => 0,
            'expenditure' => 0,
            'level' => 1,
        );
        var_dump( $buyer->save($data));
    }

	/**
	 * 删除买家纪录，在本案例中，仅修改标志位
	 * @param array $condition 删除条件
	 */
	public function delete_buyer($condition = null)
	{
		echo '删除买家';
		$buyer = D('Buyer');
		$data['available'] = 1;
		$buyer->where($condition)->save($data);
	}

}
