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
 * 商品数据控制器
 */
class GoodsController extends HomeController {

	/* 查询所有的商品列表 */
	public function index(){
        //$goods = D('Goods');
		$totalgoods = $this->query_goods();
		//dump($totalgoods);
		//var_dump(json_encode($totalgoods)); 

		$this->assign('totalgoods',$totalgoods);
		$this->display ();
	}

	/**
	 * 插入新的商品
	 */
    public function insert_goods()
    {
        echo '新加一个新的商品';
        $goods = D('Goods');
        $data = Array (
            'goodsid' => null,
            'name' => '菊花茶',
            'imgUrl' => null,
            'preprice' => 150,
            'curprice' => 120,
            'stock' => 120,
            'sales' => 150,
            'createtime' => time(),
            'status' => 0,
            'priority' => 2,
            'brief' => 'good tea',
            'category' => null,
            'unit' => '克',
        );
        var_dump( $goods->_new_goods_($data));

        //var_dump($goods->where("name like '%观音%'")->select());
    }

	/**
	 * 查询符合条件的商品
	 * @param null $name string 名称，采用模糊查询
	 * @param null $status int 商品的状态
	 * @param null $timebegin int 起始的时间戳
	 * @param null $timeend int 结束的时间戳
	 * @return mixed 返回查获询结果
	 */
    public function query_goods($name = null,$status = null,$timebegin = null, $timeend = null)
    {
        //echo '查询商品';
        $goods = D('Goods');
		if(!is_null($name))
			$map['name'] = array('like','%'.$name.'%');
		if(!is_null($status))
			$map['status'] = $status;
		if(!is_null($timebegin))
			$map['createtime'] = array('egt',$timebegin);
		if(!is_null($timeend))
			$map['createtime'] = array('lt',$timeend);
		$queryresult = $goods->where($map)->select();
		return $queryresult;
    }

	/**
	 * 更改商品状态
	 * @param null $status int 更改为相应的状态
	 * @param null $condition array 查询条件
	 */
    public function set_status($status = null,$condition = null)
    {
        echo '更改商品状态';
        $goods = D('Goods');
		if(!is_null($status)){
			$data['status'] = $status;
			$goods->where($condition)->save($data);
		}
    }	
	
	
	/**
	 * 修改商品属性
	 */
    public function modify_goods()
    {
        echo '修改商品属性';
        $goods = D('Goods');
        $data = Array (
            'goodsid' => null,
            'name' => '菊花茶',
            'imgUrl' => null,
            'preprice' => 150,
            'curprice' => 120,
            'stock' => 120,
            'sales' => 150,
            'createtime' => time(),
            'status' => 0,
            'priority' => 2,
            'brief' => 'good tea',
            'category' => null,
            'unit' => '克',
        );
        var_dump( $goods->save($data));
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
		
		$goods = D('Goods'); 
		
		if( isset($addList) && count($addList) > 0 )            
		{			
		
			foreach ($addList as $key => $record )
			{
				//dump($record);
				$record['goodsid'] = null;
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
				$condition['goodsid'] = $record['goodsid'];
				$this->delete_goods($condition);
			}    
			echo json_encode($deleteList);
		}
		  
	}
		
	public function get_grid_data()
	{		
		$rows = $this->query_goods();
		$sb = "{\"data\":".json_encode($rows)."}";
		echo $sb;
	}

	/**
	 * 删除商品纪录，在本案例中，仅修改标志位
	 * @param array $condition 删除条件
	 */
	public function delete_goods($condition = null)
	{
		echo '删除商品';
		$goods = D('Goods');
		$data['available'] = 1;
		$goods->where($condition)->save($data);
	}

}
