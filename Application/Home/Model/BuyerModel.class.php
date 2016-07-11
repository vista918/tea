<?php
/**
 * Created by PhpStorm.
 * User: vista
 * Date: 16-7-1
 * Time: 下午2:44
 */

namespace Home\Model;
use Think\Model;

class BuyerModel extends Model
{
//   buyerid              int not null comment '买家编号',
//   name                 varchar(20) comment '买家名称',
//   account              varchar(30) comment '买家账号',
//   password             varchar(20) comment '买家密码',
//   phone                int comment '买家联系方式',
//   address              varchar(100) comment '买家地址',
//   gold                 int comment '金币',
//   money                decimal comment '账户余额',
//   level                int comment '买家等级',

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

    public function _new_buyer_($data)
    {
    //    $arrayval = max($this->field('goodsid')->select());
    //    $newrecord['goodsid'] = $arrayval['goodsid']+1;
        $bok = $this->add($data);
        return $bok;
    }
}