<?php
/**
 * Created by PhpStorm.
 * User: vista
 * Date: 16-7-1
 * Time: 下午2:44
 */

namespace Home\Model;
use Think\Model;

class OrderModel extends Model
{
//couponid             varchar(30) not null,
//orderid              int default NULL comment '订单编号',
//type                 tinyint default NULL comment '优惠券类型（折扣或面值）',
//discount             int default NULL comment '折扣(value/100)',
//disprice             int default NULL comment '折扣优惠面值',
//starttime            int default 0 comment '优惠券起用时间',
//deadline             int default 0 comment '到期时间',
//status               tinyint default NULL comment '0-未使用，1-使用过',
//usetime              int default 0 comment '优惠券使用的时间',
//overprice            decimal default 0 comment '超过多少才可以使用',

    /* 自动验证规则 */
    protected $_validate = array(
//        array('name', '/^[a-zA-Z]\w{0,30}$/', '文档标识不合法', self::VALUE_VALIDATE, 'regex', self::MODEL_BOTH),
//        array('name', '', '标识已经存在', self::VALUE_VALIDATE, 'unique', self::MODEL_BOTH),
//        array('title', 'require', '标题不能为空', self::VALUE_VALIDATE, 'regex', self::MODEL_BOTH),
//        array('category_id', 'require', '分类不能为空', self::MUST_VALIDATE , 'regex', self::MODEL_INSERT),
//        array('category_id', 'require', '分类不能为空', self::EXISTS_VALIDATE , 'regex', self::MODEL_UPDATE),
//        array('category_id,type', 'checkCategory', '内容类型不正确', self::MUST_VALIDATE , 'callback', self::MODEL_INSERT),
//        array('category_id', 'checkCategory', '该分类不允许发布内容', self::EXISTS_VALIDATE , 'callback', self::MODEL_BOTH),
//        array('model_id,category_id', 'checkModel', '该分类没有绑定当前模型', self::MUST_VALIDATE , 'callback', self::MODEL_INSERT),
    );

    /* 自动完成规则 */
    protected $_auto = array(
//        array('uid', 'session', self::MODEL_INSERT, 'function', 'user_auth.uid'),
//        array('title', 'htmlspecialchars', self::MODEL_BOTH, 'function'),
//        array('description', 'htmlspecialchars', self::MODEL_BOTH, 'function'),
//        array('root', 'getRoot', self::MODEL_BOTH, 'callback'),
//        array('attach', 0, self::MODEL_INSERT),
//        array('view', 0, self::MODEL_INSERT),
//        array('comment', 0, self::MODEL_INSERT),
//        array('extend', 0, self::MODEL_INSERT),
//        array('create_time', NOW_TIME, self::MODEL_INSERT),
//        array('reply_time', NOW_TIME, self::MODEL_INSERT),
//        array('update_time', NOW_TIME, self::MODEL_BOTH),
//        array('status', 'getStatus', self::MODEL_BOTH, 'callback'),
    );

    protected $tablePrefix = 'tea_';

    public function _new_order_($data)
    {
    //    $arrayval = max($this->field('goodsid')->select());
    //    $newrecord['goodsid'] = $arrayval['goodsid']+1;
        $bok = $this->add($data);
        return $bok;
    }
	
	/**
     * @param $orderid int field 订单号
     * @return float|int|null 订单号的金额
     */
    public function _get_order_money($orderid)
    {
        $goods = D('Goods');
        $order = D('Order');
        $coupon = D('Coupon');
        $ordergoods = D('OrderGoods');

        $totalmoney = 0;

        $discount = 100;
        $disprice = 0;
        $orderrecord = $order->where("orderid=$orderid")->field('couponid,deliverymoney')->find();
        //格式要注意写好，find，就是返回一级的数组，select返回二级数组
        //dump($orderrecord);

        if(!is_null($orderrecord))
        {
            $deliverymoney = $orderrecord['deliverymoney'];
            //dump($deliverymoney);
        }
        else
            return null;

        $couponid = $orderrecord['couponid'];
        //dump($couponid);

        if(!is_null($couponid))
        {
            $couponrecord = $coupon->where("couponid = $couponid")->field('type,discount,disprice')->find();

            if(is_null($couponrecord))
                return null;
            //dump($couponrecord);
            $coupontype = $couponrecord['type'];
            if($coupontype == 0)
            {
                $discount = $couponrecord['discount'];
            }elseif($coupontype == 1){
                $disprice =  $couponrecord['disprice'];
            }
        }else
            return null;

        $ordergoodsrecord = $ordergoods->where("orderid=$orderid")->field("goodsid,goodscount")->select();
        //dump($ordergoodsrecord);

        if( !is_null($ordergoodsrecord) )
        {
            foreach($ordergoodsrecord as $key => $value)
            {
                $goodsid = $value['goodsid'];
                //dump($goodsid);

                $goodscount = $value['goodscount'];
                //dump($goodscount);

                $curprice = $goods->where("goodsid = $goodsid")->field('curprice')->find();

                if( !is_null($goodscount) && !is_null($curprice))
                {
                    $totalmoney += $curprice['curprice'] * $goodscount;
                }else
                    return null;
            }
        }else
            return null;

        $totalmoney = ($totalmoney-$disprice) * $discount / 100;

        return $totalmoney;
    }
}