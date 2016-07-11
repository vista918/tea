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
 * 提现数据控制器
 */
class WithdrawController extends HomeController {

	/* 查询所有的提现列表 */
	public function index(){
        //$goods = D('Goods');
		$totalwithdraw = $this->query_withdraw();
		dump($totalwithdraw);
		//$this->display ();
	}
	
//   withdrawid           int(10) not null auto_increment comment '用户提现表id',
//   buyerid              int comment '买家编号',
//   money                decimal(10,2) default NULL comment '提现金额',
//   status               tinyint default NULL comment '提现状态，1提交，2审核通过，3审核不通过',
//   applytime            int(11) default NULL comment '提现申请时间',
//   approvaltime         int(11) default NULL comment '批准时间',
//   sharecount           int comment '成功分享人数',
//   approval_id          int(10) default NULL comment '审批人id',

	/**
	 * 插入新的提现记录
	 */
    public function insert_withdraw()
    {
        echo '新加一个新的提现记录';
        $withdraw = D('Withdraw');
        $data = Array (
			//'withdrawid'	不用填，让其自动填充
            'buyerid' => 10001,
            'money' => 200,
            'status' => 2,
            'applytime' => time(),
            'approvaltime' => time(),
            'sharecount' => 3,
            'approval_id' => null,
        );
        var_dump( $withdraw->_new_withdraw_($data));
    }

	/**
	 * 查询符合条件的提现纪录
	 * @param null $buyerid int 买家id
	 * @param null $status int 提现状态，1提交，2审核通过，3审核不通过
	 * @return mixed 返回查获询结果
	 */
    public function query_withdraw($buyerid = null,$status = null)
    {
        echo '查询提现纪录';
        $withdraw = D('Withdraw');
		if(!is_null($buyerid))
			$map['buyerid'] = $buyerid;
		if(!is_null($status))
			$map['status'] = $status;
		$queryresult = $withdraw->where($map)->select();
		return $queryresult;
    }	
	
	/**
	 * 查询符合条件的提现纪录
	 * @param null $timebegin int 起始时间
	 * @param null $timeend int 终止时间
	 * @return array 返回查获询结果
	 */
    public function get_money_by_time($timebegin = null,$timeend = null)
    {
        echo '查询提现纪录';
        $withdraw = D('Withdraw');
		if(!is_null($timebegin))
			$map['approvaltime'] = array('egt',$timebegin);
		if(!is_null($timeend))
			$map['approvaltime'] = array('lt',$timeend);
		$map['status'] = 2;		//已成功提现的记录
		$queryresult = $withdraw->where($map)->select();
		dump($queryresult);
		if($queryresult!=false)
		{
			$retresult['count'] = count($queryresult);
			$money=0;
			foreach($queryresult as $key => $value)
			{
				$money+=$value['money'];				
			}
			$retresult['money'] = $money;		
			dump($retresult);
			return $retresult;
		}else
			return null;
    }	

	/**
	 * 更改提现记录状态
	 * @param null $status int 更改为相应的状态
	 * @param null $condition array 查询条件
	 */
    public function set_status($status = null,$condition = null)
    {
        echo '更改提现记录状态';
        $withdraw = D('Withdraw');
		if(!is_null($status)){
			$data['status'] = $status;
			$withdraw->where($condition)->save($data);
		}
    }	
	
	/**
	 * 修改提现记录
	 */
    public function modify_withdraw()
    {
        echo '修改提现记录';
        $withdraw = D('Withdraw');
        $data = Array (
			//'withdrawid'	不用填，让其自动填充
            'buyerid' => 10002,
            'money' => 100,
            'status' => 1,
            'applytime' => time(),
            'approvaltime' => null,
            'sharecount' => 3,
            'approval_id' => null,
        );
        var_dump( $withdraw->save($data));
    }

	/**
	 * 删除提现记录，在本案例中，仅修改标志位
	 * @param array $condition 删除条件
	 */
	public function delete_buyer($condition = null)
	{
		echo '删除买家';
        $withdraw = D('Withdraw');
		$data['available'] = 1;
		$withdraw->where($condition)->save($data);
	}

}
