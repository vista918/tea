<?php
/**
 * Created by PhpStorm.
 * User: vista
 * Date: 16-7-1
 * Time: 下午2:44
 */

namespace Home\Model;
use Think\Model;

class GoodsModel extends Model
{
//   goodsid              int not null auto_increment comment '商品id',
//   name                 varchar(50),
//   imgUrl               varchar(256) comment '茶业缩略头像',
//   preprice             decimal(10,2) default NULL comment '市场原价',
//   curprice             decimal(10,2) default NULL comment '销售价或现价',
//   stock                int default NULL comment '库存数',
//   sales                int default NULL comment '销量',
//   createtime           int(11) default NULL comment '上架时间',
//   status               tinyint default NULL comment '状态（已上架，未上架等）',
//   priority             tinyint default NULL comment '优先级',
//   brief                text,
//   img_group_id            int(10) default NULL comment '图片组',
//   category             int(10) default NULL comment '商品分类',
//   unit                 varchar(20),

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

    public function _new_goods_($data)
    {
    //    $arrayval = max($this->field('goodsid')->select());
    //    $newrecord['goodsid'] = $arrayval['goodsid']+1;
        $bok = $this->add($data);
        return $bok;
    }
}