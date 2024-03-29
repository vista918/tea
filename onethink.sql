-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2016-07-01 05:14:07
-- 服务器版本： 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onethink`
--

-- --------------------------------------------------------

--
-- 表的结构 `wx_action`
--

CREATE TABLE `wx_action` (
  `id` int(11) UNSIGNED NOT NULL COMMENT '主键',
  `name` char(30) NOT NULL DEFAULT '' COMMENT '行为唯一标识',
  `title` char(80) NOT NULL DEFAULT '' COMMENT '行为说明',
  `remark` char(140) NOT NULL DEFAULT '' COMMENT '行为描述',
  `rule` text NOT NULL COMMENT '行为规则',
  `log` text NOT NULL COMMENT '日志规则',
  `type` tinyint(2) UNSIGNED NOT NULL DEFAULT '1' COMMENT '类型',
  `status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '状态',
  `update_time` int(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT '修改时间'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='系统行为表' ROW_FORMAT=DYNAMIC;

--
-- 转存表中的数据 `wx_action`
--

INSERT INTO `wx_action` (`id`, `name`, `title`, `remark`, `rule`, `log`, `type`, `status`, `update_time`) VALUES
(1, 'user_login', '用户登录', '积分+10，每天一次', 'table:member|field:score|condition:uid={$self} AND status>-1|rule:score+10|cycle:24|max:1;', '[user|get_nickname]在[time|time_format]登录了后台', 1, 1, 1387181220),
(2, 'add_article', '发布文章', '积分+5，每天上限5次', 'table:member|field:score|condition:uid={$self}|rule:score+5|cycle:24|max:5', '', 2, 0, 1380173180),
(3, 'review', '评论', '评论积分+1，无限制', 'table:member|field:score|condition:uid={$self}|rule:score+1', '', 2, 1, 1383285646),
(4, 'add_document', '发表文档', '积分+10，每天上限5次', 'table:member|field:score|condition:uid={$self}|rule:score+10|cycle:24|max:5', '[user|get_nickname]在[time|time_format]发表了一篇文章。\r\n表[model]，记录编号[record]。', 2, 0, 1386139726),
(5, 'add_document_topic', '发表讨论', '积分+5，每天上限10次', 'table:member|field:score|condition:uid={$self}|rule:score+5|cycle:24|max:10', '', 2, 0, 1383285551),
(6, 'update_config', '更新配置', '新增或修改或删除配置', '', '', 1, 1, 1383294988),
(7, 'update_model', '更新模型', '新增或修改模型', '', '', 1, 1, 1383295057),
(8, 'update_attribute', '更新属性', '新增或更新或删除属性', '', '', 1, 1, 1383295963),
(9, 'update_channel', '更新导航', '新增或修改或删除导航', '', '', 1, 1, 1383296301),
(10, 'update_menu', '更新菜单', '新增或修改或删除菜单', '', '', 1, 1, 1383296392),
(11, 'update_category', '更新分类', '新增或修改或删除分类', '', '', 1, 1, 1383296765);

-- --------------------------------------------------------

--
-- 表的结构 `wx_action_log`
--

CREATE TABLE `wx_action_log` (
  `id` int(10) UNSIGNED NOT NULL COMMENT '主键',
  `action_id` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '行为id',
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '执行用户id',
  `action_ip` bigint(20) NOT NULL COMMENT '执行行为者ip',
  `model` varchar(50) NOT NULL DEFAULT '' COMMENT '触发行为的表',
  `record_id` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '触发行为的数据id',
  `remark` varchar(255) NOT NULL DEFAULT '' COMMENT '日志备注',
  `status` tinyint(2) NOT NULL DEFAULT '1' COMMENT '状态',
  `create_time` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '执行行为的时间'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='行为日志表' ROW_FORMAT=FIXED;

--
-- 转存表中的数据 `wx_action_log`
--

INSERT INTO `wx_action_log` (`id`, `action_id`, `user_id`, `action_ip`, `model`, `record_id`, `remark`, `status`, `create_time`) VALUES
(1, 1, 1, 0, 'member', 1, 'admin在2016-06-30 16:49登录了后台', 1, 1467276548),
(2, 10, 1, 0, 'Menu', 93, '操作url：/onethink/index.php/Admin/Menu/edit.html', 1, 1467283125),
(3, 1, 1, 0, 'member', 1, 'admin在2016-07-01 10:03登录了后台', 1, 1467338593),
(4, 10, 1, 0, 'Menu', 2, '操作url：/onethink/index.php/Admin/Menu/edit.html', 1, 1467338829),
(5, 10, 1, 0, 'Menu', 16, '操作url：/onethink/index.php/Admin/Menu/edit.html', 1, 1467338838),
(6, 10, 1, 0, 'Menu', 68, '操作url：/onethink/index.php/Admin/Menu/edit.html', 1, 1467338846),
(7, 10, 1, 0, 'Menu', 93, '操作url：/onethink/index.php/Admin/Menu/edit.html', 1, 1467338853),
(8, 10, 1, 0, 'Menu', 122, '操作url：/onethink/index.php/Admin/Menu/add.html', 1, 1467338887),
(9, 10, 1, 0, 'Menu', 122, '操作url：/onethink/index.php/Admin/Menu/edit.html', 1, 1467339661),
(10, 10, 1, 0, 'Menu', 93, '操作url：/onethink/index.php/Admin/Menu/edit.html', 1, 1467340321);

-- --------------------------------------------------------

--
-- 表的结构 `wx_addons`
--

CREATE TABLE `wx_addons` (
  `id` int(10) UNSIGNED NOT NULL COMMENT '主键',
  `name` varchar(40) NOT NULL COMMENT '插件名或标识',
  `title` varchar(20) NOT NULL DEFAULT '' COMMENT '中文名',
  `description` text COMMENT '插件描述',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态',
  `config` text COMMENT '配置',
  `author` varchar(40) DEFAULT '' COMMENT '作者',
  `version` varchar(20) DEFAULT '' COMMENT '版本号',
  `create_time` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '安装时间',
  `has_adminlist` tinyint(1) UNSIGNED NOT NULL DEFAULT '0' COMMENT '是否有后台列表'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='插件表';

--
-- 转存表中的数据 `wx_addons`
--

INSERT INTO `wx_addons` (`id`, `name`, `title`, `description`, `status`, `config`, `author`, `version`, `create_time`, `has_adminlist`) VALUES
(15, 'EditorForAdmin', '后台编辑器', '用于增强整站长文本的输入和显示', 1, '{"editor_type":"2","editor_wysiwyg":"1","editor_height":"500px","editor_resize_type":"1"}', 'thinkphp', '0.1', 1383126253, 0),
(2, 'SiteStat', '站点统计信息', '统计站点的基础信息', 1, '{"title":"\\u7cfb\\u7edf\\u4fe1\\u606f","width":"1","display":"1","status":"0"}', 'thinkphp', '0.1', 1379512015, 0),
(3, 'DevTeam', '开发团队信息', '开发团队成员信息', 1, '{"title":"OneThink\\u5f00\\u53d1\\u56e2\\u961f","width":"2","display":"1"}', 'thinkphp', '0.1', 1379512022, 0),
(4, 'SystemInfo', '系统环境信息', '用于显示一些服务器的信息', 1, '{"title":"\\u7cfb\\u7edf\\u4fe1\\u606f","width":"2","display":"1"}', 'thinkphp', '0.1', 1379512036, 0),
(5, 'Editor', '前台编辑器', '用于增强整站长文本的输入和显示', 1, '{"editor_type":"2","editor_wysiwyg":"1","editor_height":"300px","editor_resize_type":"1"}', 'thinkphp', '0.1', 1379830910, 0),
(6, 'Attachment', '附件', '用于文档模型上传附件', 1, 'null', 'thinkphp', '0.1', 1379842319, 1),
(9, 'SocialComment', '通用社交化评论', '集成了各种社交化评论插件，轻松集成到系统中。', 1, '{"comment_type":"1","comment_uid_youyan":"","comment_short_name_duoshuo":"","comment_data_list_duoshuo":""}', 'thinkphp', '0.1', 1380273962, 0),
(38, 'AutoReply', '自动回复', 'WeiPHP基础功能，能实现配置关键词，用户回复此关键词后自动回复对应的文件，图文，图片信息', 1, 'null', '凡星', '0.1', 1467280528, 0);

-- --------------------------------------------------------

--
-- 表的结构 `wx_attachment`
--

CREATE TABLE `wx_attachment` (
  `id` int(10) UNSIGNED NOT NULL,
  `uid` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '用户ID',
  `title` char(30) NOT NULL DEFAULT '' COMMENT '附件显示名',
  `type` tinyint(3) UNSIGNED NOT NULL DEFAULT '0' COMMENT '附件类型',
  `source` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '资源ID',
  `record_id` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '关联记录ID',
  `download` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '下载次数',
  `size` bigint(20) UNSIGNED NOT NULL DEFAULT '0' COMMENT '附件大小',
  `dir` int(12) UNSIGNED NOT NULL DEFAULT '0' COMMENT '上级目录ID',
  `sort` int(8) UNSIGNED NOT NULL DEFAULT '0' COMMENT '排序',
  `create_time` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT '更新时间',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='附件表';

-- --------------------------------------------------------

--
-- 表的结构 `wx_attribute`
--

CREATE TABLE `wx_attribute` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL DEFAULT '' COMMENT '字段名',
  `title` varchar(100) NOT NULL DEFAULT '' COMMENT '字段注释',
  `field` varchar(100) NOT NULL DEFAULT '' COMMENT '字段定义',
  `type` varchar(20) NOT NULL DEFAULT '' COMMENT '数据类型',
  `value` varchar(100) NOT NULL DEFAULT '' COMMENT '字段默认值',
  `remark` varchar(100) NOT NULL DEFAULT '' COMMENT '备注',
  `is_show` tinyint(1) UNSIGNED NOT NULL DEFAULT '1' COMMENT '是否显示',
  `extra` varchar(255) NOT NULL DEFAULT '' COMMENT '参数',
  `model_id` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '模型id',
  `is_must` tinyint(1) UNSIGNED NOT NULL DEFAULT '0' COMMENT '是否必填',
  `status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '状态',
  `update_time` int(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT '更新时间',
  `create_time` int(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT '创建时间',
  `validate_rule` varchar(255) NOT NULL,
  `validate_time` tinyint(1) UNSIGNED NOT NULL,
  `error_info` varchar(100) NOT NULL,
  `validate_type` varchar(25) NOT NULL,
  `auto_rule` varchar(100) NOT NULL,
  `auto_time` tinyint(1) UNSIGNED NOT NULL,
  `auto_type` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='模型属性表';

--
-- 转存表中的数据 `wx_attribute`
--

INSERT INTO `wx_attribute` (`id`, `name`, `title`, `field`, `type`, `value`, `remark`, `is_show`, `extra`, `model_id`, `is_must`, `status`, `update_time`, `create_time`, `validate_rule`, `validate_time`, `error_info`, `validate_type`, `auto_rule`, `auto_time`, `auto_type`) VALUES
(1, 'uid', '用户ID', 'int(10) unsigned NOT NULL ', 'num', '0', '', 0, '', 1, 0, 1, 1384508362, 1383891233, '', 0, '', '', '', 0, ''),
(2, 'name', '标识', 'char(40) NOT NULL ', 'string', '', '同一根节点下标识不重复', 1, '', 1, 0, 1, 1383894743, 1383891233, '', 0, '', '', '', 0, ''),
(3, 'title', '标题', 'char(80) NOT NULL ', 'string', '', '文档标题', 1, '', 1, 0, 1, 1383894778, 1383891233, '', 0, '', '', '', 0, ''),
(4, 'category_id', '所属分类', 'int(10) unsigned NOT NULL ', 'string', '', '', 0, '', 1, 0, 1, 1384508336, 1383891233, '', 0, '', '', '', 0, ''),
(5, 'description', '描述', 'char(140) NOT NULL ', 'textarea', '', '', 1, '', 1, 0, 1, 1383894927, 1383891233, '', 0, '', '', '', 0, ''),
(6, 'root', '根节点', 'int(10) unsigned NOT NULL ', 'num', '0', '该文档的顶级文档编号', 0, '', 1, 0, 1, 1384508323, 1383891233, '', 0, '', '', '', 0, ''),
(7, 'pid', '所属ID', 'int(10) unsigned NOT NULL ', 'num', '0', '父文档编号', 0, '', 1, 0, 1, 1384508543, 1383891233, '', 0, '', '', '', 0, ''),
(8, 'model_id', '内容模型ID', 'tinyint(3) unsigned NOT NULL ', 'num', '0', '该文档所对应的模型', 0, '', 1, 0, 1, 1384508350, 1383891233, '', 0, '', '', '', 0, ''),
(9, 'type', '内容类型', 'tinyint(3) unsigned NOT NULL ', 'select', '2', '', 1, '1:目录\r\n2:主题\r\n3:段落', 1, 0, 1, 1384511157, 1383891233, '', 0, '', '', '', 0, ''),
(10, 'position', '推荐位', 'smallint(5) unsigned NOT NULL ', 'checkbox', '0', '多个推荐则将其推荐值相加', 1, '1:列表推荐\r\n2:频道页推荐\r\n4:首页推荐', 1, 0, 1, 1383895640, 1383891233, '', 0, '', '', '', 0, ''),
(11, 'link_id', '外链', 'int(10) unsigned NOT NULL ', 'num', '0', '0-非外链，大于0-外链ID,需要函数进行链接与编号的转换', 1, '', 1, 0, 1, 1383895757, 1383891233, '', 0, '', '', '', 0, ''),
(12, 'cover_id', '封面', 'int(10) unsigned NOT NULL ', 'picture', '0', '0-无封面，大于0-封面图片ID，需要函数处理', 1, '', 1, 0, 1, 1384147827, 1383891233, '', 0, '', '', '', 0, ''),
(13, 'display', '可见性', 'tinyint(3) unsigned NOT NULL ', 'radio', '1', '', 1, '0:不可见\r\n1:所有人可见', 1, 0, 1, 1386662271, 1383891233, '', 0, '', 'regex', '', 0, 'function'),
(14, 'deadline', '截至时间', 'int(10) unsigned NOT NULL ', 'datetime', '0', '0-永久有效', 1, '', 1, 0, 1, 1387163248, 1383891233, '', 0, '', 'regex', '', 0, 'function'),
(15, 'attach', '附件数量', 'tinyint(3) unsigned NOT NULL ', 'num', '0', '', 0, '', 1, 0, 1, 1387260355, 1383891233, '', 0, '', 'regex', '', 0, 'function'),
(16, 'view', '浏览量', 'int(10) unsigned NOT NULL ', 'num', '0', '', 1, '', 1, 0, 1, 1383895835, 1383891233, '', 0, '', '', '', 0, ''),
(17, 'comment', '评论数', 'int(10) unsigned NOT NULL ', 'num', '0', '', 1, '', 1, 0, 1, 1383895846, 1383891233, '', 0, '', '', '', 0, ''),
(18, 'extend', '扩展统计字段', 'int(10) unsigned NOT NULL ', 'num', '0', '根据需求自行使用', 0, '', 1, 0, 1, 1384508264, 1383891233, '', 0, '', '', '', 0, ''),
(19, 'level', '优先级', 'int(10) unsigned NOT NULL ', 'num', '0', '越高排序越靠前', 1, '', 1, 0, 1, 1383895894, 1383891233, '', 0, '', '', '', 0, ''),
(20, 'create_time', '创建时间', 'int(10) unsigned NOT NULL ', 'datetime', '0', '', 1, '', 1, 0, 1, 1383895903, 1383891233, '', 0, '', '', '', 0, ''),
(21, 'update_time', '更新时间', 'int(10) unsigned NOT NULL ', 'datetime', '0', '', 0, '', 1, 0, 1, 1384508277, 1383891233, '', 0, '', '', '', 0, ''),
(22, 'status', '数据状态', 'tinyint(4) NOT NULL ', 'radio', '0', '', 0, '-1:删除\r\n0:禁用\r\n1:正常\r\n2:待审核\r\n3:草稿', 1, 0, 1, 1384508496, 1383891233, '', 0, '', '', '', 0, ''),
(23, 'parse', '内容解析类型', 'tinyint(3) unsigned NOT NULL ', 'select', '0', '', 0, '0:html\r\n1:ubb\r\n2:markdown', 2, 0, 1, 1384511049, 1383891243, '', 0, '', '', '', 0, ''),
(24, 'content', '文章内容', 'text NOT NULL ', 'editor', '', '', 1, '', 2, 0, 1, 1383896225, 1383891243, '', 0, '', '', '', 0, ''),
(25, 'template', '详情页显示模板', 'varchar(100) NOT NULL ', 'string', '', '参照display方法参数的定义', 1, '', 2, 0, 1, 1383896190, 1383891243, '', 0, '', '', '', 0, ''),
(26, 'bookmark', '收藏数', 'int(10) unsigned NOT NULL ', 'num', '0', '', 1, '', 2, 0, 1, 1383896103, 1383891243, '', 0, '', '', '', 0, ''),
(27, 'parse', '内容解析类型', 'tinyint(3) unsigned NOT NULL ', 'select', '0', '', 0, '0:html\r\n1:ubb\r\n2:markdown', 3, 0, 1, 1387260461, 1383891252, '', 0, '', 'regex', '', 0, 'function'),
(28, 'content', '下载详细描述', 'text NOT NULL ', 'editor', '', '', 1, '', 3, 0, 1, 1383896438, 1383891252, '', 0, '', '', '', 0, ''),
(29, 'template', '详情页显示模板', 'varchar(100) NOT NULL ', 'string', '', '', 1, '', 3, 0, 1, 1383896429, 1383891252, '', 0, '', '', '', 0, ''),
(30, 'file_id', '文件ID', 'int(10) unsigned NOT NULL ', 'file', '0', '需要函数处理', 1, '', 3, 0, 1, 1383896415, 1383891252, '', 0, '', '', '', 0, ''),
(31, 'download', '下载次数', 'int(10) unsigned NOT NULL ', 'num', '0', '', 1, '', 3, 0, 1, 1383896380, 1383891252, '', 0, '', '', '', 0, ''),
(32, 'size', '文件大小', 'bigint(20) unsigned NOT NULL ', 'num', '0', '单位bit', 1, '', 3, 0, 1, 1383896371, 1383891252, '', 0, '', '', '', 0, ''),
(33, 'keyword', '关键词', 'varchar(255) NULL', 'string', '', '多个关键词可以用空格分开，如“高富帅 白富美”', 1, '', 3, 1, 1, 1439194858, 1439194849, '', 3, '', 'regex', '', 3, 'function'),
(34, 'msg_type', '消息类型', 'char(50) NULL', 'select', 'text', '', 0, 'text:文本|content@show,group_id@hide,image_id@hide\r\nnews:图文|content@hide,group_id@show,image_id@hide\r\nimage:图片|content@hide,group_id@hide,image_id@show', 3, 1, 1, 1439204529, 1439194979, '', 3, '', 'regex', '', 3, 'function'),
(35, 'content', '文本内容', 'text NULL', 'textarea', '', '', 1, '', 3, 0, 1, 1439195826, 1439195091, '', 3, '', 'regex', '', 3, 'function'),
(36, 'group_id', '图文', 'int(10) NULL', 'news', '', '', 1, '', 3, 0, 1, 1439204192, 1439195901, '', 3, '', 'regex', '', 3, 'function'),
(37, 'image_id', '上传图片', 'int(10) UNSIGNED NULL', 'picture', '', '', 1, '', 3, 0, 1, 1439195945, 1439195945, '', 3, '', 'regex', '', 3, 'function'),
(38, 'manager_id', '管理员ID', 'int(10) NULL', 'num', '', '', 0, '', 3, 0, 1, 1439203621, 1439203575, '', 3, '', 'regex', 'get_mid', 1, 'function'),
(39, 'token', 'Token', 'varchar(50) NULL', 'string', '', '', 0, '', 3, 0, 1, 1439203612, 1439203612, '', 3, '', 'regex', 'get_token', 1, 'function'),
(40, 'image_material', '素材图片id', 'int(10) NULL', 'num', '', '', 0, '', 3, 0, 1, 1447738833, 1447738833, '', 3, '', 'regex', '', 3, 'function'),
(41, 'keyword', '关键词', 'varchar(255) NULL', 'string', '', '多个关键词可以用空格分开，如“高富帅 白富美”', 1, '', 3, 1, 1, 1439194858, 1439194849, '', 3, '', 'regex', '', 3, 'function'),
(42, 'msg_type', '消息类型', 'char(50) NULL', 'select', 'text', '', 0, 'text:文本|content@show,group_id@hide,image_id@hide\r\nnews:图文|content@hide,group_id@show,image_id@hide\r\nimage:图片|content@hide,group_id@hide,image_id@show', 3, 1, 1, 1439204529, 1439194979, '', 3, '', 'regex', '', 3, 'function'),
(43, 'content', '文本内容', 'text NULL', 'textarea', '', '', 1, '', 3, 0, 1, 1439195826, 1439195091, '', 3, '', 'regex', '', 3, 'function'),
(44, 'group_id', '图文', 'int(10) NULL', 'news', '', '', 1, '', 3, 0, 1, 1439204192, 1439195901, '', 3, '', 'regex', '', 3, 'function'),
(45, 'image_id', '上传图片', 'int(10) UNSIGNED NULL', 'picture', '', '', 1, '', 3, 0, 1, 1439195945, 1439195945, '', 3, '', 'regex', '', 3, 'function'),
(46, 'manager_id', '管理员ID', 'int(10) NULL', 'num', '', '', 0, '', 3, 0, 1, 1439203621, 1439203575, '', 3, '', 'regex', 'get_mid', 1, 'function'),
(47, 'token', 'Token', 'varchar(50) NULL', 'string', '', '', 0, '', 3, 0, 1, 1439203612, 1439203612, '', 3, '', 'regex', 'get_token', 1, 'function'),
(48, 'image_material', '素材图片id', 'int(10) NULL', 'num', '', '', 0, '', 3, 0, 1, 1447738833, 1447738833, '', 3, '', 'regex', '', 3, 'function'),
(49, 'keyword', '关键词', 'varchar(255) NULL', 'string', '', '多个关键词可以用空格分开，如“高富帅 白富美”', 1, '', 3, 1, 1, 1439194858, 1439194849, '', 3, '', 'regex', '', 3, 'function'),
(50, 'msg_type', '消息类型', 'char(50) NULL', 'select', 'text', '', 0, 'text:文本|content@show,group_id@hide,image_id@hide\r\nnews:图文|content@hide,group_id@show,image_id@hide\r\nimage:图片|content@hide,group_id@hide,image_id@show', 3, 1, 1, 1439204529, 1439194979, '', 3, '', 'regex', '', 3, 'function'),
(51, 'content', '文本内容', 'text NULL', 'textarea', '', '', 1, '', 3, 0, 1, 1439195826, 1439195091, '', 3, '', 'regex', '', 3, 'function'),
(52, 'group_id', '图文', 'int(10) NULL', 'news', '', '', 1, '', 3, 0, 1, 1439204192, 1439195901, '', 3, '', 'regex', '', 3, 'function'),
(53, 'image_id', '上传图片', 'int(10) UNSIGNED NULL', 'picture', '', '', 1, '', 3, 0, 1, 1439195945, 1439195945, '', 3, '', 'regex', '', 3, 'function'),
(54, 'manager_id', '管理员ID', 'int(10) NULL', 'num', '', '', 0, '', 3, 0, 1, 1439203621, 1439203575, '', 3, '', 'regex', 'get_mid', 1, 'function'),
(55, 'token', 'Token', 'varchar(50) NULL', 'string', '', '', 0, '', 3, 0, 1, 1439203612, 1439203612, '', 3, '', 'regex', 'get_token', 1, 'function'),
(56, 'image_material', '素材图片id', 'int(10) NULL', 'num', '', '', 0, '', 3, 0, 1, 1447738833, 1447738833, '', 3, '', 'regex', '', 3, 'function'),
(57, 'keyword', '关键词', 'varchar(255) NULL', 'string', '', '多个关键词可以用空格分开，如“高富帅 白富美”', 1, '', 3, 1, 1, 1439194858, 1439194849, '', 3, '', 'regex', '', 3, 'function'),
(58, 'msg_type', '消息类型', 'char(50) NULL', 'select', 'text', '', 0, 'text:文本|content@show,group_id@hide,image_id@hide\r\nnews:图文|content@hide,group_id@show,image_id@hide\r\nimage:图片|content@hide,group_id@hide,image_id@show', 3, 1, 1, 1439204529, 1439194979, '', 3, '', 'regex', '', 3, 'function'),
(59, 'content', '文本内容', 'text NULL', 'textarea', '', '', 1, '', 3, 0, 1, 1439195826, 1439195091, '', 3, '', 'regex', '', 3, 'function'),
(60, 'group_id', '图文', 'int(10) NULL', 'news', '', '', 1, '', 3, 0, 1, 1439204192, 1439195901, '', 3, '', 'regex', '', 3, 'function'),
(61, 'image_id', '上传图片', 'int(10) UNSIGNED NULL', 'picture', '', '', 1, '', 3, 0, 1, 1439195945, 1439195945, '', 3, '', 'regex', '', 3, 'function'),
(62, 'manager_id', '管理员ID', 'int(10) NULL', 'num', '', '', 0, '', 3, 0, 1, 1439203621, 1439203575, '', 3, '', 'regex', 'get_mid', 1, 'function'),
(63, 'token', 'Token', 'varchar(50) NULL', 'string', '', '', 0, '', 3, 0, 1, 1439203612, 1439203612, '', 3, '', 'regex', 'get_token', 1, 'function'),
(64, 'image_material', '素材图片id', 'int(10) NULL', 'num', '', '', 0, '', 3, 0, 1, 1447738833, 1447738833, '', 3, '', 'regex', '', 3, 'function'),
(65, 'keyword', '关键词', 'varchar(255) NULL', 'string', '', '多个关键词可以用空格分开，如“高富帅 白富美”', 1, '', 3, 1, 1, 1439194858, 1439194849, '', 3, '', 'regex', '', 3, 'function'),
(66, 'msg_type', '消息类型', 'char(50) NULL', 'select', 'text', '', 0, 'text:文本|content@show,group_id@hide,image_id@hide\r\nnews:图文|content@hide,group_id@show,image_id@hide\r\nimage:图片|content@hide,group_id@hide,image_id@show', 3, 1, 1, 1439204529, 1439194979, '', 3, '', 'regex', '', 3, 'function'),
(67, 'content', '文本内容', 'text NULL', 'textarea', '', '', 1, '', 3, 0, 1, 1439195826, 1439195091, '', 3, '', 'regex', '', 3, 'function'),
(68, 'group_id', '图文', 'int(10) NULL', 'news', '', '', 1, '', 3, 0, 1, 1439204192, 1439195901, '', 3, '', 'regex', '', 3, 'function'),
(69, 'image_id', '上传图片', 'int(10) UNSIGNED NULL', 'picture', '', '', 1, '', 3, 0, 1, 1439195945, 1439195945, '', 3, '', 'regex', '', 3, 'function'),
(70, 'manager_id', '管理员ID', 'int(10) NULL', 'num', '', '', 0, '', 3, 0, 1, 1439203621, 1439203575, '', 3, '', 'regex', 'get_mid', 1, 'function'),
(71, 'token', 'Token', 'varchar(50) NULL', 'string', '', '', 0, '', 3, 0, 1, 1439203612, 1439203612, '', 3, '', 'regex', 'get_token', 1, 'function'),
(72, 'image_material', '素材图片id', 'int(10) NULL', 'num', '', '', 0, '', 3, 0, 1, 1447738833, 1447738833, '', 3, '', 'regex', '', 3, 'function'),
(73, 'keyword', '关键词', 'varchar(255) NULL', 'string', '', '多个关键词可以用空格分开，如“高富帅 白富美”', 1, '', 3, 1, 1, 1439194858, 1439194849, '', 3, '', 'regex', '', 3, 'function'),
(74, 'msg_type', '消息类型', 'char(50) NULL', 'select', 'text', '', 0, 'text:文本|content@show,group_id@hide,image_id@hide\r\nnews:图文|content@hide,group_id@show,image_id@hide\r\nimage:图片|content@hide,group_id@hide,image_id@show', 3, 1, 1, 1439204529, 1439194979, '', 3, '', 'regex', '', 3, 'function'),
(75, 'content', '文本内容', 'text NULL', 'textarea', '', '', 1, '', 3, 0, 1, 1439195826, 1439195091, '', 3, '', 'regex', '', 3, 'function'),
(76, 'group_id', '图文', 'int(10) NULL', 'news', '', '', 1, '', 3, 0, 1, 1439204192, 1439195901, '', 3, '', 'regex', '', 3, 'function'),
(77, 'image_id', '上传图片', 'int(10) UNSIGNED NULL', 'picture', '', '', 1, '', 3, 0, 1, 1439195945, 1439195945, '', 3, '', 'regex', '', 3, 'function'),
(78, 'manager_id', '管理员ID', 'int(10) NULL', 'num', '', '', 0, '', 3, 0, 1, 1439203621, 1439203575, '', 3, '', 'regex', 'get_mid', 1, 'function'),
(79, 'token', 'Token', 'varchar(50) NULL', 'string', '', '', 0, '', 3, 0, 1, 1439203612, 1439203612, '', 3, '', 'regex', 'get_token', 1, 'function'),
(80, 'image_material', '素材图片id', 'int(10) NULL', 'num', '', '', 0, '', 3, 0, 1, 1447738833, 1447738833, '', 3, '', 'regex', '', 3, 'function'),
(81, 'keyword', '关键词', 'varchar(255) NULL', 'string', '', '多个关键词可以用空格分开，如“高富帅 白富美”', 1, '', 3, 1, 1, 1439194858, 1439194849, '', 3, '', 'regex', '', 3, 'function'),
(82, 'msg_type', '消息类型', 'char(50) NULL', 'select', 'text', '', 0, 'text:文本|content@show,group_id@hide,image_id@hide\r\nnews:图文|content@hide,group_id@show,image_id@hide\r\nimage:图片|content@hide,group_id@hide,image_id@show', 3, 1, 1, 1439204529, 1439194979, '', 3, '', 'regex', '', 3, 'function'),
(83, 'content', '文本内容', 'text NULL', 'textarea', '', '', 1, '', 3, 0, 1, 1439195826, 1439195091, '', 3, '', 'regex', '', 3, 'function'),
(84, 'group_id', '图文', 'int(10) NULL', 'news', '', '', 1, '', 3, 0, 1, 1439204192, 1439195901, '', 3, '', 'regex', '', 3, 'function'),
(85, 'image_id', '上传图片', 'int(10) UNSIGNED NULL', 'picture', '', '', 1, '', 3, 0, 1, 1439195945, 1439195945, '', 3, '', 'regex', '', 3, 'function'),
(86, 'manager_id', '管理员ID', 'int(10) NULL', 'num', '', '', 0, '', 3, 0, 1, 1439203621, 1439203575, '', 3, '', 'regex', 'get_mid', 1, 'function'),
(87, 'token', 'Token', 'varchar(50) NULL', 'string', '', '', 0, '', 3, 0, 1, 1439203612, 1439203612, '', 3, '', 'regex', 'get_token', 1, 'function'),
(88, 'image_material', '素材图片id', 'int(10) NULL', 'num', '', '', 0, '', 3, 0, 1, 1447738833, 1447738833, '', 3, '', 'regex', '', 3, 'function'),
(89, 'keyword', '关键词', 'varchar(255) NULL', 'string', '', '多个关键词可以用空格分开，如“高富帅 白富美”', 1, '', 3, 1, 1, 1439194858, 1439194849, '', 3, '', 'regex', '', 3, 'function'),
(90, 'msg_type', '消息类型', 'char(50) NULL', 'select', 'text', '', 0, 'text:文本|content@show,group_id@hide,image_id@hide\r\nnews:图文|content@hide,group_id@show,image_id@hide\r\nimage:图片|content@hide,group_id@hide,image_id@show', 3, 1, 1, 1439204529, 1439194979, '', 3, '', 'regex', '', 3, 'function'),
(91, 'content', '文本内容', 'text NULL', 'textarea', '', '', 1, '', 3, 0, 1, 1439195826, 1439195091, '', 3, '', 'regex', '', 3, 'function'),
(92, 'group_id', '图文', 'int(10) NULL', 'news', '', '', 1, '', 3, 0, 1, 1439204192, 1439195901, '', 3, '', 'regex', '', 3, 'function'),
(93, 'image_id', '上传图片', 'int(10) UNSIGNED NULL', 'picture', '', '', 1, '', 3, 0, 1, 1439195945, 1439195945, '', 3, '', 'regex', '', 3, 'function'),
(94, 'manager_id', '管理员ID', 'int(10) NULL', 'num', '', '', 0, '', 3, 0, 1, 1439203621, 1439203575, '', 3, '', 'regex', 'get_mid', 1, 'function'),
(95, 'token', 'Token', 'varchar(50) NULL', 'string', '', '', 0, '', 3, 0, 1, 1439203612, 1439203612, '', 3, '', 'regex', 'get_token', 1, 'function'),
(96, 'image_material', '素材图片id', 'int(10) NULL', 'num', '', '', 0, '', 3, 0, 1, 1447738833, 1447738833, '', 3, '', 'regex', '', 3, 'function'),
(97, 'keyword', '关键词', 'varchar(255) NULL', 'string', '', '多个关键词可以用空格分开，如“高富帅 白富美”', 1, '', 3, 1, 1, 1439194858, 1439194849, '', 3, '', 'regex', '', 3, 'function'),
(98, 'msg_type', '消息类型', 'char(50) NULL', 'select', 'text', '', 0, 'text:文本|content@show,group_id@hide,image_id@hide\r\nnews:图文|content@hide,group_id@show,image_id@hide\r\nimage:图片|content@hide,group_id@hide,image_id@show', 3, 1, 1, 1439204529, 1439194979, '', 3, '', 'regex', '', 3, 'function'),
(99, 'content', '文本内容', 'text NULL', 'textarea', '', '', 1, '', 3, 0, 1, 1439195826, 1439195091, '', 3, '', 'regex', '', 3, 'function'),
(100, 'group_id', '图文', 'int(10) NULL', 'news', '', '', 1, '', 3, 0, 1, 1439204192, 1439195901, '', 3, '', 'regex', '', 3, 'function'),
(101, 'image_id', '上传图片', 'int(10) UNSIGNED NULL', 'picture', '', '', 1, '', 3, 0, 1, 1439195945, 1439195945, '', 3, '', 'regex', '', 3, 'function'),
(102, 'manager_id', '管理员ID', 'int(10) NULL', 'num', '', '', 0, '', 3, 0, 1, 1439203621, 1439203575, '', 3, '', 'regex', 'get_mid', 1, 'function'),
(103, 'token', 'Token', 'varchar(50) NULL', 'string', '', '', 0, '', 3, 0, 1, 1439203612, 1439203612, '', 3, '', 'regex', 'get_token', 1, 'function'),
(104, 'image_material', '素材图片id', 'int(10) NULL', 'num', '', '', 0, '', 3, 0, 1, 1447738833, 1447738833, '', 3, '', 'regex', '', 3, 'function'),
(105, 'keyword', '关键词', 'varchar(255) NULL', 'string', '', '多个关键词可以用空格分开，如“高富帅 白富美”', 1, '', 3, 1, 1, 1439194858, 1439194849, '', 3, '', 'regex', '', 3, 'function'),
(106, 'msg_type', '消息类型', 'char(50) NULL', 'select', 'text', '', 0, 'text:文本|content@show,group_id@hide,image_id@hide\r\nnews:图文|content@hide,group_id@show,image_id@hide\r\nimage:图片|content@hide,group_id@hide,image_id@show', 3, 1, 1, 1439204529, 1439194979, '', 3, '', 'regex', '', 3, 'function'),
(107, 'content', '文本内容', 'text NULL', 'textarea', '', '', 1, '', 3, 0, 1, 1439195826, 1439195091, '', 3, '', 'regex', '', 3, 'function'),
(108, 'group_id', '图文', 'int(10) NULL', 'news', '', '', 1, '', 3, 0, 1, 1439204192, 1439195901, '', 3, '', 'regex', '', 3, 'function'),
(109, 'image_id', '上传图片', 'int(10) UNSIGNED NULL', 'picture', '', '', 1, '', 3, 0, 1, 1439195945, 1439195945, '', 3, '', 'regex', '', 3, 'function'),
(110, 'manager_id', '管理员ID', 'int(10) NULL', 'num', '', '', 0, '', 3, 0, 1, 1439203621, 1439203575, '', 3, '', 'regex', 'get_mid', 1, 'function'),
(111, 'token', 'Token', 'varchar(50) NULL', 'string', '', '', 0, '', 3, 0, 1, 1439203612, 1439203612, '', 3, '', 'regex', 'get_token', 1, 'function'),
(112, 'image_material', '素材图片id', 'int(10) NULL', 'num', '', '', 0, '', 3, 0, 1, 1447738833, 1447738833, '', 3, '', 'regex', '', 3, 'function'),
(113, 'keyword', '关键词', 'varchar(255) NULL', 'string', '', '多个关键词可以用空格分开，如“高富帅 白富美”', 1, '', 3, 1, 1, 1439194858, 1439194849, '', 3, '', 'regex', '', 3, 'function'),
(114, 'msg_type', '消息类型', 'char(50) NULL', 'select', 'text', '', 0, 'text:文本|content@show,group_id@hide,image_id@hide\r\nnews:图文|content@hide,group_id@show,image_id@hide\r\nimage:图片|content@hide,group_id@hide,image_id@show', 3, 1, 1, 1439204529, 1439194979, '', 3, '', 'regex', '', 3, 'function'),
(115, 'content', '文本内容', 'text NULL', 'textarea', '', '', 1, '', 3, 0, 1, 1439195826, 1439195091, '', 3, '', 'regex', '', 3, 'function'),
(116, 'group_id', '图文', 'int(10) NULL', 'news', '', '', 1, '', 3, 0, 1, 1439204192, 1439195901, '', 3, '', 'regex', '', 3, 'function'),
(117, 'image_id', '上传图片', 'int(10) UNSIGNED NULL', 'picture', '', '', 1, '', 3, 0, 1, 1439195945, 1439195945, '', 3, '', 'regex', '', 3, 'function'),
(118, 'manager_id', '管理员ID', 'int(10) NULL', 'num', '', '', 0, '', 3, 0, 1, 1439203621, 1439203575, '', 3, '', 'regex', 'get_mid', 1, 'function'),
(119, 'token', 'Token', 'varchar(50) NULL', 'string', '', '', 0, '', 3, 0, 1, 1439203612, 1439203612, '', 3, '', 'regex', 'get_token', 1, 'function'),
(120, 'image_material', '素材图片id', 'int(10) NULL', 'num', '', '', 0, '', 3, 0, 1, 1447738833, 1447738833, '', 3, '', 'regex', '', 3, 'function'),
(121, 'keyword', '关键词', 'varchar(255) NULL', 'string', '', '多个关键词可以用空格分开，如“高富帅 白富美”', 1, '', 3, 1, 1, 1439194858, 1439194849, '', 3, '', 'regex', '', 3, 'function'),
(122, 'msg_type', '消息类型', 'char(50) NULL', 'select', 'text', '', 0, 'text:文本|content@show,group_id@hide,image_id@hide\r\nnews:图文|content@hide,group_id@show,image_id@hide\r\nimage:图片|content@hide,group_id@hide,image_id@show', 3, 1, 1, 1439204529, 1439194979, '', 3, '', 'regex', '', 3, 'function'),
(123, 'content', '文本内容', 'text NULL', 'textarea', '', '', 1, '', 3, 0, 1, 1439195826, 1439195091, '', 3, '', 'regex', '', 3, 'function'),
(124, 'group_id', '图文', 'int(10) NULL', 'news', '', '', 1, '', 3, 0, 1, 1439204192, 1439195901, '', 3, '', 'regex', '', 3, 'function'),
(125, 'image_id', '上传图片', 'int(10) UNSIGNED NULL', 'picture', '', '', 1, '', 3, 0, 1, 1439195945, 1439195945, '', 3, '', 'regex', '', 3, 'function'),
(126, 'manager_id', '管理员ID', 'int(10) NULL', 'num', '', '', 0, '', 3, 0, 1, 1439203621, 1439203575, '', 3, '', 'regex', 'get_mid', 1, 'function'),
(127, 'token', 'Token', 'varchar(50) NULL', 'string', '', '', 0, '', 3, 0, 1, 1439203612, 1439203612, '', 3, '', 'regex', 'get_token', 1, 'function'),
(128, 'image_material', '素材图片id', 'int(10) NULL', 'num', '', '', 0, '', 3, 0, 1, 1447738833, 1447738833, '', 3, '', 'regex', '', 3, 'function'),
(129, 'keyword', '关键词', 'varchar(255) NULL', 'string', '', '多个关键词可以用空格分开，如“高富帅 白富美”', 1, '', 3, 1, 1, 1439194858, 1439194849, '', 3, '', 'regex', '', 3, 'function'),
(130, 'msg_type', '消息类型', 'char(50) NULL', 'select', 'text', '', 0, 'text:文本|content@show,group_id@hide,image_id@hide\r\nnews:图文|content@hide,group_id@show,image_id@hide\r\nimage:图片|content@hide,group_id@hide,image_id@show', 3, 1, 1, 1439204529, 1439194979, '', 3, '', 'regex', '', 3, 'function'),
(131, 'content', '文本内容', 'text NULL', 'textarea', '', '', 1, '', 3, 0, 1, 1439195826, 1439195091, '', 3, '', 'regex', '', 3, 'function'),
(132, 'group_id', '图文', 'int(10) NULL', 'news', '', '', 1, '', 3, 0, 1, 1439204192, 1439195901, '', 3, '', 'regex', '', 3, 'function'),
(133, 'image_id', '上传图片', 'int(10) UNSIGNED NULL', 'picture', '', '', 1, '', 3, 0, 1, 1439195945, 1439195945, '', 3, '', 'regex', '', 3, 'function'),
(134, 'manager_id', '管理员ID', 'int(10) NULL', 'num', '', '', 0, '', 3, 0, 1, 1439203621, 1439203575, '', 3, '', 'regex', 'get_mid', 1, 'function'),
(135, 'token', 'Token', 'varchar(50) NULL', 'string', '', '', 0, '', 3, 0, 1, 1439203612, 1439203612, '', 3, '', 'regex', 'get_token', 1, 'function'),
(136, 'image_material', '素材图片id', 'int(10) NULL', 'num', '', '', 0, '', 3, 0, 1, 1447738833, 1447738833, '', 3, '', 'regex', '', 3, 'function'),
(137, 'keyword', '关键词', 'varchar(255) NULL', 'string', '', '多个关键词可以用空格分开，如“高富帅 白富美”', 1, '', 3, 1, 1, 1439194858, 1439194849, '', 3, '', 'regex', '', 3, 'function'),
(138, 'msg_type', '消息类型', 'char(50) NULL', 'select', 'text', '', 0, 'text:文本|content@show,group_id@hide,image_id@hide\r\nnews:图文|content@hide,group_id@show,image_id@hide\r\nimage:图片|content@hide,group_id@hide,image_id@show', 3, 1, 1, 1439204529, 1439194979, '', 3, '', 'regex', '', 3, 'function'),
(139, 'content', '文本内容', 'text NULL', 'textarea', '', '', 1, '', 3, 0, 1, 1439195826, 1439195091, '', 3, '', 'regex', '', 3, 'function'),
(140, 'group_id', '图文', 'int(10) NULL', 'news', '', '', 1, '', 3, 0, 1, 1439204192, 1439195901, '', 3, '', 'regex', '', 3, 'function'),
(141, 'image_id', '上传图片', 'int(10) UNSIGNED NULL', 'picture', '', '', 1, '', 3, 0, 1, 1439195945, 1439195945, '', 3, '', 'regex', '', 3, 'function'),
(142, 'manager_id', '管理员ID', 'int(10) NULL', 'num', '', '', 0, '', 3, 0, 1, 1439203621, 1439203575, '', 3, '', 'regex', 'get_mid', 1, 'function'),
(143, 'token', 'Token', 'varchar(50) NULL', 'string', '', '', 0, '', 3, 0, 1, 1439203612, 1439203612, '', 3, '', 'regex', 'get_token', 1, 'function'),
(144, 'image_material', '素材图片id', 'int(10) NULL', 'num', '', '', 0, '', 3, 0, 1, 1447738833, 1447738833, '', 3, '', 'regex', '', 3, 'function'),
(145, 'keyword', '关键词', 'varchar(255) NULL', 'string', '', '多个关键词可以用空格分开，如“高富帅 白富美”', 1, '', 3, 1, 1, 1439194858, 1439194849, '', 3, '', 'regex', '', 3, 'function'),
(146, 'msg_type', '消息类型', 'char(50) NULL', 'select', 'text', '', 0, 'text:文本|content@show,group_id@hide,image_id@hide\r\nnews:图文|content@hide,group_id@show,image_id@hide\r\nimage:图片|content@hide,group_id@hide,image_id@show', 3, 1, 1, 1439204529, 1439194979, '', 3, '', 'regex', '', 3, 'function'),
(147, 'content', '文本内容', 'text NULL', 'textarea', '', '', 1, '', 3, 0, 1, 1439195826, 1439195091, '', 3, '', 'regex', '', 3, 'function'),
(148, 'group_id', '图文', 'int(10) NULL', 'news', '', '', 1, '', 3, 0, 1, 1439204192, 1439195901, '', 3, '', 'regex', '', 3, 'function'),
(149, 'image_id', '上传图片', 'int(10) UNSIGNED NULL', 'picture', '', '', 1, '', 3, 0, 1, 1439195945, 1439195945, '', 3, '', 'regex', '', 3, 'function'),
(150, 'manager_id', '管理员ID', 'int(10) NULL', 'num', '', '', 0, '', 3, 0, 1, 1439203621, 1439203575, '', 3, '', 'regex', 'get_mid', 1, 'function'),
(151, 'token', 'Token', 'varchar(50) NULL', 'string', '', '', 0, '', 3, 0, 1, 1439203612, 1439203612, '', 3, '', 'regex', 'get_token', 1, 'function'),
(152, 'image_material', '素材图片id', 'int(10) NULL', 'num', '', '', 0, '', 3, 0, 1, 1447738833, 1447738833, '', 3, '', 'regex', '', 3, 'function'),
(153, 'keyword', '关键词', 'varchar(255) NULL', 'string', '', '多个关键词可以用空格分开，如“高富帅 白富美”', 1, '', 3, 1, 1, 1439194858, 1439194849, '', 3, '', 'regex', '', 3, 'function'),
(154, 'msg_type', '消息类型', 'char(50) NULL', 'select', 'text', '', 0, 'text:文本|content@show,group_id@hide,image_id@hide\r\nnews:图文|content@hide,group_id@show,image_id@hide\r\nimage:图片|content@hide,group_id@hide,image_id@show', 3, 1, 1, 1439204529, 1439194979, '', 3, '', 'regex', '', 3, 'function'),
(155, 'content', '文本内容', 'text NULL', 'textarea', '', '', 1, '', 3, 0, 1, 1439195826, 1439195091, '', 3, '', 'regex', '', 3, 'function'),
(156, 'group_id', '图文', 'int(10) NULL', 'news', '', '', 1, '', 3, 0, 1, 1439204192, 1439195901, '', 3, '', 'regex', '', 3, 'function'),
(157, 'image_id', '上传图片', 'int(10) UNSIGNED NULL', 'picture', '', '', 1, '', 3, 0, 1, 1439195945, 1439195945, '', 3, '', 'regex', '', 3, 'function'),
(158, 'manager_id', '管理员ID', 'int(10) NULL', 'num', '', '', 0, '', 3, 0, 1, 1439203621, 1439203575, '', 3, '', 'regex', 'get_mid', 1, 'function'),
(159, 'token', 'Token', 'varchar(50) NULL', 'string', '', '', 0, '', 3, 0, 1, 1439203612, 1439203612, '', 3, '', 'regex', 'get_token', 1, 'function'),
(160, 'image_material', '素材图片id', 'int(10) NULL', 'num', '', '', 0, '', 3, 0, 1, 1447738833, 1447738833, '', 3, '', 'regex', '', 3, 'function'),
(161, 'keyword', '关键词', 'varchar(255) NULL', 'string', '', '多个关键词可以用空格分开，如“高富帅 白富美”', 1, '', 3, 1, 1, 1439194858, 1439194849, '', 3, '', 'regex', '', 3, 'function'),
(162, 'msg_type', '消息类型', 'char(50) NULL', 'select', 'text', '', 0, 'text:文本|content@show,group_id@hide,image_id@hide\r\nnews:图文|content@hide,group_id@show,image_id@hide\r\nimage:图片|content@hide,group_id@hide,image_id@show', 3, 1, 1, 1439204529, 1439194979, '', 3, '', 'regex', '', 3, 'function'),
(163, 'content', '文本内容', 'text NULL', 'textarea', '', '', 1, '', 3, 0, 1, 1439195826, 1439195091, '', 3, '', 'regex', '', 3, 'function'),
(164, 'group_id', '图文', 'int(10) NULL', 'news', '', '', 1, '', 3, 0, 1, 1439204192, 1439195901, '', 3, '', 'regex', '', 3, 'function'),
(165, 'image_id', '上传图片', 'int(10) UNSIGNED NULL', 'picture', '', '', 1, '', 3, 0, 1, 1439195945, 1439195945, '', 3, '', 'regex', '', 3, 'function'),
(166, 'manager_id', '管理员ID', 'int(10) NULL', 'num', '', '', 0, '', 3, 0, 1, 1439203621, 1439203575, '', 3, '', 'regex', 'get_mid', 1, 'function'),
(167, 'token', 'Token', 'varchar(50) NULL', 'string', '', '', 0, '', 3, 0, 1, 1439203612, 1439203612, '', 3, '', 'regex', 'get_token', 1, 'function'),
(168, 'image_material', '素材图片id', 'int(10) NULL', 'num', '', '', 0, '', 3, 0, 1, 1447738833, 1447738833, '', 3, '', 'regex', '', 3, 'function'),
(169, 'keyword', '关键词', 'varchar(255) NULL', 'string', '', '多个关键词可以用空格分开，如“高富帅 白富美”', 1, '', 3, 1, 1, 1439194858, 1439194849, '', 3, '', 'regex', '', 3, 'function'),
(170, 'msg_type', '消息类型', 'char(50) NULL', 'select', 'text', '', 0, 'text:文本|content@show,group_id@hide,image_id@hide\r\nnews:图文|content@hide,group_id@show,image_id@hide\r\nimage:图片|content@hide,group_id@hide,image_id@show', 3, 1, 1, 1439204529, 1439194979, '', 3, '', 'regex', '', 3, 'function'),
(171, 'content', '文本内容', 'text NULL', 'textarea', '', '', 1, '', 3, 0, 1, 1439195826, 1439195091, '', 3, '', 'regex', '', 3, 'function'),
(172, 'group_id', '图文', 'int(10) NULL', 'news', '', '', 1, '', 3, 0, 1, 1439204192, 1439195901, '', 3, '', 'regex', '', 3, 'function'),
(173, 'image_id', '上传图片', 'int(10) UNSIGNED NULL', 'picture', '', '', 1, '', 3, 0, 1, 1439195945, 1439195945, '', 3, '', 'regex', '', 3, 'function'),
(174, 'manager_id', '管理员ID', 'int(10) NULL', 'num', '', '', 0, '', 3, 0, 1, 1439203621, 1439203575, '', 3, '', 'regex', 'get_mid', 1, 'function'),
(175, 'token', 'Token', 'varchar(50) NULL', 'string', '', '', 0, '', 3, 0, 1, 1439203612, 1439203612, '', 3, '', 'regex', 'get_token', 1, 'function'),
(176, 'image_material', '素材图片id', 'int(10) NULL', 'num', '', '', 0, '', 3, 0, 1, 1447738833, 1447738833, '', 3, '', 'regex', '', 3, 'function'),
(177, 'keyword', '关键词', 'varchar(255) NULL', 'string', '', '多个关键词可以用空格分开，如“高富帅 白富美”', 1, '', 3, 1, 1, 1439194858, 1439194849, '', 3, '', 'regex', '', 3, 'function'),
(178, 'msg_type', '消息类型', 'char(50) NULL', 'select', 'text', '', 0, 'text:文本|content@show,group_id@hide,image_id@hide\r\nnews:图文|content@hide,group_id@show,image_id@hide\r\nimage:图片|content@hide,group_id@hide,image_id@show', 3, 1, 1, 1439204529, 1439194979, '', 3, '', 'regex', '', 3, 'function'),
(179, 'content', '文本内容', 'text NULL', 'textarea', '', '', 1, '', 3, 0, 1, 1439195826, 1439195091, '', 3, '', 'regex', '', 3, 'function'),
(180, 'group_id', '图文', 'int(10) NULL', 'news', '', '', 1, '', 3, 0, 1, 1439204192, 1439195901, '', 3, '', 'regex', '', 3, 'function'),
(181, 'image_id', '上传图片', 'int(10) UNSIGNED NULL', 'picture', '', '', 1, '', 3, 0, 1, 1439195945, 1439195945, '', 3, '', 'regex', '', 3, 'function'),
(182, 'manager_id', '管理员ID', 'int(10) NULL', 'num', '', '', 0, '', 3, 0, 1, 1439203621, 1439203575, '', 3, '', 'regex', 'get_mid', 1, 'function'),
(183, 'token', 'Token', 'varchar(50) NULL', 'string', '', '', 0, '', 3, 0, 1, 1439203612, 1439203612, '', 3, '', 'regex', 'get_token', 1, 'function'),
(184, 'image_material', '素材图片id', 'int(10) NULL', 'num', '', '', 0, '', 3, 0, 1, 1447738833, 1447738833, '', 3, '', 'regex', '', 3, 'function'),
(185, 'keyword', '关键词', 'varchar(255) NULL', 'string', '', '多个关键词可以用空格分开，如“高富帅 白富美”', 1, '', 3, 1, 1, 1439194858, 1439194849, '', 3, '', 'regex', '', 3, 'function'),
(186, 'msg_type', '消息类型', 'char(50) NULL', 'select', 'text', '', 0, 'text:文本|content@show,group_id@hide,image_id@hide\r\nnews:图文|content@hide,group_id@show,image_id@hide\r\nimage:图片|content@hide,group_id@hide,image_id@show', 3, 1, 1, 1439204529, 1439194979, '', 3, '', 'regex', '', 3, 'function'),
(187, 'content', '文本内容', 'text NULL', 'textarea', '', '', 1, '', 3, 0, 1, 1439195826, 1439195091, '', 3, '', 'regex', '', 3, 'function'),
(188, 'group_id', '图文', 'int(10) NULL', 'news', '', '', 1, '', 3, 0, 1, 1439204192, 1439195901, '', 3, '', 'regex', '', 3, 'function'),
(189, 'image_id', '上传图片', 'int(10) UNSIGNED NULL', 'picture', '', '', 1, '', 3, 0, 1, 1439195945, 1439195945, '', 3, '', 'regex', '', 3, 'function'),
(190, 'manager_id', '管理员ID', 'int(10) NULL', 'num', '', '', 0, '', 3, 0, 1, 1439203621, 1439203575, '', 3, '', 'regex', 'get_mid', 1, 'function'),
(191, 'token', 'Token', 'varchar(50) NULL', 'string', '', '', 0, '', 3, 0, 1, 1439203612, 1439203612, '', 3, '', 'regex', 'get_token', 1, 'function'),
(192, 'image_material', '素材图片id', 'int(10) NULL', 'num', '', '', 0, '', 3, 0, 1, 1447738833, 1447738833, '', 3, '', 'regex', '', 3, 'function'),
(193, 'keyword', '关键词', 'varchar(255) NULL', 'string', '', '多个关键词可以用空格分开，如“高富帅 白富美”', 1, '', 3, 1, 1, 1439194858, 1439194849, '', 3, '', 'regex', '', 3, 'function'),
(194, 'msg_type', '消息类型', 'char(50) NULL', 'select', 'text', '', 0, 'text:文本|content@show,group_id@hide,image_id@hide\r\nnews:图文|content@hide,group_id@show,image_id@hide\r\nimage:图片|content@hide,group_id@hide,image_id@show', 3, 1, 1, 1439204529, 1439194979, '', 3, '', 'regex', '', 3, 'function'),
(195, 'content', '文本内容', 'text NULL', 'textarea', '', '', 1, '', 3, 0, 1, 1439195826, 1439195091, '', 3, '', 'regex', '', 3, 'function'),
(196, 'group_id', '图文', 'int(10) NULL', 'news', '', '', 1, '', 3, 0, 1, 1439204192, 1439195901, '', 3, '', 'regex', '', 3, 'function'),
(197, 'image_id', '上传图片', 'int(10) UNSIGNED NULL', 'picture', '', '', 1, '', 3, 0, 1, 1439195945, 1439195945, '', 3, '', 'regex', '', 3, 'function'),
(198, 'manager_id', '管理员ID', 'int(10) NULL', 'num', '', '', 0, '', 3, 0, 1, 1439203621, 1439203575, '', 3, '', 'regex', 'get_mid', 1, 'function'),
(199, 'token', 'Token', 'varchar(50) NULL', 'string', '', '', 0, '', 3, 0, 1, 1439203612, 1439203612, '', 3, '', 'regex', 'get_token', 1, 'function'),
(200, 'image_material', '素材图片id', 'int(10) NULL', 'num', '', '', 0, '', 3, 0, 1, 1447738833, 1447738833, '', 3, '', 'regex', '', 3, 'function'),
(201, 'keyword', '关键词', 'varchar(255) NULL', 'string', '', '多个关键词可以用空格分开，如“高富帅 白富美”', 1, '', 3, 1, 1, 1439194858, 1439194849, '', 3, '', 'regex', '', 3, 'function'),
(202, 'msg_type', '消息类型', 'char(50) NULL', 'select', 'text', '', 0, 'text:文本|content@show,group_id@hide,image_id@hide\r\nnews:图文|content@hide,group_id@show,image_id@hide\r\nimage:图片|content@hide,group_id@hide,image_id@show', 3, 1, 1, 1439204529, 1439194979, '', 3, '', 'regex', '', 3, 'function'),
(203, 'content', '文本内容', 'text NULL', 'textarea', '', '', 1, '', 3, 0, 1, 1439195826, 1439195091, '', 3, '', 'regex', '', 3, 'function'),
(204, 'group_id', '图文', 'int(10) NULL', 'news', '', '', 1, '', 3, 0, 1, 1439204192, 1439195901, '', 3, '', 'regex', '', 3, 'function'),
(205, 'image_id', '上传图片', 'int(10) UNSIGNED NULL', 'picture', '', '', 1, '', 3, 0, 1, 1439195945, 1439195945, '', 3, '', 'regex', '', 3, 'function'),
(206, 'manager_id', '管理员ID', 'int(10) NULL', 'num', '', '', 0, '', 3, 0, 1, 1439203621, 1439203575, '', 3, '', 'regex', 'get_mid', 1, 'function'),
(207, 'token', 'Token', 'varchar(50) NULL', 'string', '', '', 0, '', 3, 0, 1, 1439203612, 1439203612, '', 3, '', 'regex', 'get_token', 1, 'function'),
(208, 'image_material', '素材图片id', 'int(10) NULL', 'num', '', '', 0, '', 3, 0, 1, 1447738833, 1447738833, '', 3, '', 'regex', '', 3, 'function'),
(209, 'keyword', '关键词', 'varchar(255) NULL', 'string', '', '多个关键词可以用空格分开，如“高富帅 白富美”', 1, '', 3, 1, 1, 1439194858, 1439194849, '', 3, '', 'regex', '', 3, 'function'),
(210, 'msg_type', '消息类型', 'char(50) NULL', 'select', 'text', '', 0, 'text:文本|content@show,group_id@hide,image_id@hide\r\nnews:图文|content@hide,group_id@show,image_id@hide\r\nimage:图片|content@hide,group_id@hide,image_id@show', 3, 1, 1, 1439204529, 1439194979, '', 3, '', 'regex', '', 3, 'function'),
(211, 'content', '文本内容', 'text NULL', 'textarea', '', '', 1, '', 3, 0, 1, 1439195826, 1439195091, '', 3, '', 'regex', '', 3, 'function'),
(212, 'group_id', '图文', 'int(10) NULL', 'news', '', '', 1, '', 3, 0, 1, 1439204192, 1439195901, '', 3, '', 'regex', '', 3, 'function'),
(213, 'image_id', '上传图片', 'int(10) UNSIGNED NULL', 'picture', '', '', 1, '', 3, 0, 1, 1439195945, 1439195945, '', 3, '', 'regex', '', 3, 'function'),
(214, 'manager_id', '管理员ID', 'int(10) NULL', 'num', '', '', 0, '', 3, 0, 1, 1439203621, 1439203575, '', 3, '', 'regex', 'get_mid', 1, 'function'),
(215, 'token', 'Token', 'varchar(50) NULL', 'string', '', '', 0, '', 3, 0, 1, 1439203612, 1439203612, '', 3, '', 'regex', 'get_token', 1, 'function'),
(216, 'image_material', '素材图片id', 'int(10) NULL', 'num', '', '', 0, '', 3, 0, 1, 1447738833, 1447738833, '', 3, '', 'regex', '', 3, 'function'),
(217, 'keyword', '关键词', 'varchar(255) NULL', 'string', '', '多个关键词可以用空格分开，如“高富帅 白富美”', 1, '', 3, 1, 1, 1439194858, 1439194849, '', 3, '', 'regex', '', 3, 'function'),
(218, 'msg_type', '消息类型', 'char(50) NULL', 'select', 'text', '', 0, 'text:文本|content@show,group_id@hide,image_id@hide\r\nnews:图文|content@hide,group_id@show,image_id@hide\r\nimage:图片|content@hide,group_id@hide,image_id@show', 3, 1, 1, 1439204529, 1439194979, '', 3, '', 'regex', '', 3, 'function'),
(219, 'content', '文本内容', 'text NULL', 'textarea', '', '', 1, '', 3, 0, 1, 1439195826, 1439195091, '', 3, '', 'regex', '', 3, 'function'),
(220, 'group_id', '图文', 'int(10) NULL', 'news', '', '', 1, '', 3, 0, 1, 1439204192, 1439195901, '', 3, '', 'regex', '', 3, 'function'),
(221, 'image_id', '上传图片', 'int(10) UNSIGNED NULL', 'picture', '', '', 1, '', 3, 0, 1, 1439195945, 1439195945, '', 3, '', 'regex', '', 3, 'function'),
(222, 'manager_id', '管理员ID', 'int(10) NULL', 'num', '', '', 0, '', 3, 0, 1, 1439203621, 1439203575, '', 3, '', 'regex', 'get_mid', 1, 'function'),
(223, 'token', 'Token', 'varchar(50) NULL', 'string', '', '', 0, '', 3, 0, 1, 1439203612, 1439203612, '', 3, '', 'regex', 'get_token', 1, 'function'),
(224, 'image_material', '素材图片id', 'int(10) NULL', 'num', '', '', 0, '', 3, 0, 1, 1447738833, 1447738833, '', 3, '', 'regex', '', 3, 'function'),
(225, 'keyword', '关键词', 'varchar(255) NULL', 'string', '', '多个关键词可以用空格分开，如“高富帅 白富美”', 1, '', 3, 1, 1, 1439194858, 1439194849, '', 3, '', 'regex', '', 3, 'function'),
(226, 'msg_type', '消息类型', 'char(50) NULL', 'select', 'text', '', 0, 'text:文本|content@show,group_id@hide,image_id@hide\r\nnews:图文|content@hide,group_id@show,image_id@hide\r\nimage:图片|content@hide,group_id@hide,image_id@show', 3, 1, 1, 1439204529, 1439194979, '', 3, '', 'regex', '', 3, 'function'),
(227, 'content', '文本内容', 'text NULL', 'textarea', '', '', 1, '', 3, 0, 1, 1439195826, 1439195091, '', 3, '', 'regex', '', 3, 'function'),
(228, 'group_id', '图文', 'int(10) NULL', 'news', '', '', 1, '', 3, 0, 1, 1439204192, 1439195901, '', 3, '', 'regex', '', 3, 'function'),
(229, 'image_id', '上传图片', 'int(10) UNSIGNED NULL', 'picture', '', '', 1, '', 3, 0, 1, 1439195945, 1439195945, '', 3, '', 'regex', '', 3, 'function'),
(230, 'manager_id', '管理员ID', 'int(10) NULL', 'num', '', '', 0, '', 3, 0, 1, 1439203621, 1439203575, '', 3, '', 'regex', 'get_mid', 1, 'function'),
(231, 'token', 'Token', 'varchar(50) NULL', 'string', '', '', 0, '', 3, 0, 1, 1439203612, 1439203612, '', 3, '', 'regex', 'get_token', 1, 'function'),
(232, 'image_material', '素材图片id', 'int(10) NULL', 'num', '', '', 0, '', 3, 0, 1, 1447738833, 1447738833, '', 3, '', 'regex', '', 3, 'function'),
(233, 'keyword', '关键词', 'varchar(255) NULL', 'string', '', '多个关键词可以用空格分开，如“高富帅 白富美”', 1, '', 3, 1, 1, 1439194858, 1439194849, '', 3, '', 'regex', '', 3, 'function'),
(234, 'msg_type', '消息类型', 'char(50) NULL', 'select', 'text', '', 0, 'text:文本|content@show,group_id@hide,image_id@hide\r\nnews:图文|content@hide,group_id@show,image_id@hide\r\nimage:图片|content@hide,group_id@hide,image_id@show', 3, 1, 1, 1439204529, 1439194979, '', 3, '', 'regex', '', 3, 'function'),
(235, 'content', '文本内容', 'text NULL', 'textarea', '', '', 1, '', 3, 0, 1, 1439195826, 1439195091, '', 3, '', 'regex', '', 3, 'function'),
(236, 'group_id', '图文', 'int(10) NULL', 'news', '', '', 1, '', 3, 0, 1, 1439204192, 1439195901, '', 3, '', 'regex', '', 3, 'function'),
(237, 'image_id', '上传图片', 'int(10) UNSIGNED NULL', 'picture', '', '', 1, '', 3, 0, 1, 1439195945, 1439195945, '', 3, '', 'regex', '', 3, 'function'),
(238, 'manager_id', '管理员ID', 'int(10) NULL', 'num', '', '', 0, '', 3, 0, 1, 1439203621, 1439203575, '', 3, '', 'regex', 'get_mid', 1, 'function'),
(239, 'token', 'Token', 'varchar(50) NULL', 'string', '', '', 0, '', 3, 0, 1, 1439203612, 1439203612, '', 3, '', 'regex', 'get_token', 1, 'function'),
(240, 'image_material', '素材图片id', 'int(10) NULL', 'num', '', '', 0, '', 3, 0, 1, 1447738833, 1447738833, '', 3, '', 'regex', '', 3, 'function');

-- --------------------------------------------------------

--
-- 表的结构 `wx_auth_extend`
--

CREATE TABLE `wx_auth_extend` (
  `group_id` mediumint(10) UNSIGNED NOT NULL COMMENT '用户id',
  `extend_id` mediumint(8) UNSIGNED NOT NULL COMMENT '扩展表中数据的id',
  `type` tinyint(1) UNSIGNED NOT NULL COMMENT '扩展类型标识 1:栏目分类权限;2:模型权限'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户组与分类的对应关系表';

--
-- 转存表中的数据 `wx_auth_extend`
--

INSERT INTO `wx_auth_extend` (`group_id`, `extend_id`, `type`) VALUES
(1, 1, 1),
(1, 1, 2),
(1, 2, 1),
(1, 2, 2),
(1, 3, 1),
(1, 3, 2),
(1, 4, 1),
(1, 37, 1);

-- --------------------------------------------------------

--
-- 表的结构 `wx_auth_group`
--

CREATE TABLE `wx_auth_group` (
  `id` mediumint(8) UNSIGNED NOT NULL COMMENT '用户组id,自增主键',
  `module` varchar(20) NOT NULL COMMENT '用户组所属模块',
  `type` tinyint(4) NOT NULL COMMENT '组类型',
  `title` char(20) NOT NULL DEFAULT '' COMMENT '用户组中文名称',
  `description` varchar(80) NOT NULL DEFAULT '' COMMENT '描述信息',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '用户组状态：为1正常，为0禁用,-1为删除',
  `rules` varchar(500) NOT NULL DEFAULT '' COMMENT '用户组拥有的规则id，多个规则 , 隔开'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `wx_auth_group`
--

INSERT INTO `wx_auth_group` (`id`, `module`, `type`, `title`, `description`, `status`, `rules`) VALUES
(1, 'admin', 1, '默认用户组', '', 1, '1,2,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70,71,72,73,74,79,80,81,82,83,84,86,87,88,89,90,91,92,93,94,95,96,97,100,102,103,105,106'),
(2, 'admin', 1, '测试用户', '测试用户', 1, '1,2,5,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70,71,72,73,74,79,80,82,83,84,88,89,90,91,92,93,100,102,103,195,217');

-- --------------------------------------------------------

--
-- 表的结构 `wx_auth_group_access`
--

CREATE TABLE `wx_auth_group_access` (
  `uid` int(10) UNSIGNED NOT NULL COMMENT '用户id',
  `group_id` mediumint(8) UNSIGNED NOT NULL COMMENT '用户组id'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `wx_auth_rule`
--

CREATE TABLE `wx_auth_rule` (
  `id` mediumint(8) UNSIGNED NOT NULL COMMENT '规则id,自增主键',
  `module` varchar(20) NOT NULL COMMENT '规则所属module',
  `type` tinyint(2) NOT NULL DEFAULT '1' COMMENT '1-url;2-主菜单',
  `name` char(80) NOT NULL DEFAULT '' COMMENT '规则唯一英文标识',
  `title` char(20) NOT NULL DEFAULT '' COMMENT '规则中文描述',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否有效(0:无效,1:有效)',
  `condition` varchar(300) NOT NULL DEFAULT '' COMMENT '规则附加条件'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `wx_auth_rule`
--

INSERT INTO `wx_auth_rule` (`id`, `module`, `type`, `name`, `title`, `status`, `condition`) VALUES
(1, 'admin', 2, 'Admin/Index/index', '首页', 1, ''),
(2, 'admin', 2, 'Admin/Article/mydocument', '内容', 1, ''),
(3, 'admin', 2, 'Admin/User/index', '用户', 1, ''),
(4, 'admin', 2, 'Admin/Addons/index', '扩展', 1, ''),
(5, 'admin', 2, 'Admin/Config/group', '系统', 1, ''),
(7, 'admin', 1, 'Admin/article/add', '新增', 1, ''),
(8, 'admin', 1, 'Admin/article/edit', '编辑', 1, ''),
(9, 'admin', 1, 'Admin/article/setStatus', '改变状态', 1, ''),
(10, 'admin', 1, 'Admin/article/update', '保存', 1, ''),
(11, 'admin', 1, 'Admin/article/autoSave', '保存草稿', 1, ''),
(12, 'admin', 1, 'Admin/article/move', '移动', 1, ''),
(13, 'admin', 1, 'Admin/article/copy', '复制', 1, ''),
(14, 'admin', 1, 'Admin/article/paste', '粘贴', 1, ''),
(15, 'admin', 1, 'Admin/article/permit', '还原', 1, ''),
(16, 'admin', 1, 'Admin/article/clear', '清空', 1, ''),
(17, 'admin', 1, 'Admin/article/index', '文档列表', 1, ''),
(18, 'admin', 1, 'Admin/article/recycle', '回收站', 1, ''),
(19, 'admin', 1, 'Admin/User/addaction', '新增用户行为', 1, ''),
(20, 'admin', 1, 'Admin/User/editaction', '编辑用户行为', 1, ''),
(21, 'admin', 1, 'Admin/User/saveAction', '保存用户行为', 1, ''),
(22, 'admin', 1, 'Admin/User/setStatus', '变更行为状态', 1, ''),
(23, 'admin', 1, 'Admin/User/changeStatus?method=forbidUser', '禁用会员', 1, ''),
(24, 'admin', 1, 'Admin/User/changeStatus?method=resumeUser', '启用会员', 1, ''),
(25, 'admin', 1, 'Admin/User/changeStatus?method=deleteUser', '删除会员', 1, ''),
(26, 'admin', 1, 'Admin/User/index', '用户信息', 1, ''),
(27, 'admin', 1, 'Admin/User/action', '用户行为', 1, ''),
(28, 'admin', 1, 'Admin/AuthManager/changeStatus?method=deleteGroup', '删除', 1, ''),
(29, 'admin', 1, 'Admin/AuthManager/changeStatus?method=forbidGroup', '禁用', 1, ''),
(30, 'admin', 1, 'Admin/AuthManager/changeStatus?method=resumeGroup', '恢复', 1, ''),
(31, 'admin', 1, 'Admin/AuthManager/createGroup', '新增', 1, ''),
(32, 'admin', 1, 'Admin/AuthManager/editGroup', '编辑', 1, ''),
(33, 'admin', 1, 'Admin/AuthManager/writeGroup', '保存用户组', 1, ''),
(34, 'admin', 1, 'Admin/AuthManager/group', '授权', 1, ''),
(35, 'admin', 1, 'Admin/AuthManager/access', '访问授权', 1, ''),
(36, 'admin', 1, 'Admin/AuthManager/user', '成员授权', 1, ''),
(37, 'admin', 1, 'Admin/AuthManager/removeFromGroup', '解除授权', 1, ''),
(38, 'admin', 1, 'Admin/AuthManager/addToGroup', '保存成员授权', 1, ''),
(39, 'admin', 1, 'Admin/AuthManager/category', '分类授权', 1, ''),
(40, 'admin', 1, 'Admin/AuthManager/addToCategory', '保存分类授权', 1, ''),
(41, 'admin', 1, 'Admin/AuthManager/index', '权限管理', 1, ''),
(42, 'admin', 1, 'Admin/Addons/create', '创建', 1, ''),
(43, 'admin', 1, 'Admin/Addons/checkForm', '检测创建', 1, ''),
(44, 'admin', 1, 'Admin/Addons/preview', '预览', 1, ''),
(45, 'admin', 1, 'Admin/Addons/build', '快速生成插件', 1, ''),
(46, 'admin', 1, 'Admin/Addons/config', '设置', 1, ''),
(47, 'admin', 1, 'Admin/Addons/disable', '禁用', 1, ''),
(48, 'admin', 1, 'Admin/Addons/enable', '启用', 1, ''),
(49, 'admin', 1, 'Admin/Addons/install', '安装', 1, ''),
(50, 'admin', 1, 'Admin/Addons/uninstall', '卸载', 1, ''),
(51, 'admin', 1, 'Admin/Addons/saveconfig', '更新配置', 1, ''),
(52, 'admin', 1, 'Admin/Addons/adminList', '插件后台列表', 1, ''),
(53, 'admin', 1, 'Admin/Addons/execute', 'URL方式访问插件', 1, ''),
(54, 'admin', 1, 'Admin/Addons/index', '插件管理', 1, ''),
(55, 'admin', 1, 'Admin/Addons/hooks', '钩子管理', 1, ''),
(56, 'admin', 1, 'Admin/model/add', '新增', 1, ''),
(57, 'admin', 1, 'Admin/model/edit', '编辑', 1, ''),
(58, 'admin', 1, 'Admin/model/setStatus', '改变状态', 1, ''),
(59, 'admin', 1, 'Admin/model/update', '保存数据', 1, ''),
(60, 'admin', 1, 'Admin/Model/index', '模型管理', 1, ''),
(61, 'admin', 1, 'Admin/Config/edit', '编辑', 1, ''),
(62, 'admin', 1, 'Admin/Config/del', '删除', 1, ''),
(63, 'admin', 1, 'Admin/Config/add', '新增', 1, ''),
(64, 'admin', 1, 'Admin/Config/save', '保存', 1, ''),
(65, 'admin', 1, 'Admin/Config/group', '网站设置', 1, ''),
(66, 'admin', 1, 'Admin/Config/index', '配置管理', 1, ''),
(67, 'admin', 1, 'Admin/Channel/add', '新增', 1, ''),
(68, 'admin', 1, 'Admin/Channel/edit', '编辑', 1, ''),
(69, 'admin', 1, 'Admin/Channel/del', '删除', 1, ''),
(70, 'admin', 1, 'Admin/Channel/index', '导航管理', 1, ''),
(71, 'admin', 1, 'Admin/Category/edit', '编辑', 1, ''),
(72, 'admin', 1, 'Admin/Category/add', '新增', 1, ''),
(73, 'admin', 1, 'Admin/Category/remove', '删除', 1, ''),
(74, 'admin', 1, 'Admin/Category/index', '分类管理', 1, ''),
(75, 'admin', 1, 'Admin/file/upload', '上传控件', -1, ''),
(76, 'admin', 1, 'Admin/file/uploadPicture', '上传图片', -1, ''),
(77, 'admin', 1, 'Admin/file/download', '下载', -1, ''),
(94, 'admin', 1, 'Admin/AuthManager/modelauth', '模型授权', 1, ''),
(79, 'admin', 1, 'Admin/article/batchOperate', '导入', 1, ''),
(80, 'admin', 1, 'Admin/Database/index?type=export', '备份数据库', 1, ''),
(81, 'admin', 1, 'Admin/Database/index?type=import', '还原数据库', 1, ''),
(82, 'admin', 1, 'Admin/Database/export', '备份', 1, ''),
(83, 'admin', 1, 'Admin/Database/optimize', '优化表', 1, ''),
(84, 'admin', 1, 'Admin/Database/repair', '修复表', 1, ''),
(86, 'admin', 1, 'Admin/Database/import', '恢复', 1, ''),
(87, 'admin', 1, 'Admin/Database/del', '删除', 1, ''),
(88, 'admin', 1, 'Admin/User/add', '新增用户', 1, ''),
(89, 'admin', 1, 'Admin/Attribute/index', '属性管理', 1, ''),
(90, 'admin', 1, 'Admin/Attribute/add', '新增', 1, ''),
(91, 'admin', 1, 'Admin/Attribute/edit', '编辑', 1, ''),
(92, 'admin', 1, 'Admin/Attribute/setStatus', '改变状态', 1, ''),
(93, 'admin', 1, 'Admin/Attribute/update', '保存数据', 1, ''),
(95, 'admin', 1, 'Admin/AuthManager/addToModel', '保存模型授权', 1, ''),
(96, 'admin', 1, 'Admin/Category/move', '移动', -1, ''),
(97, 'admin', 1, 'Admin/Category/merge', '合并', -1, ''),
(98, 'admin', 1, 'Admin/Config/menu', '后台菜单管理', -1, ''),
(99, 'admin', 1, 'Admin/Article/mydocument', '内容', -1, ''),
(100, 'admin', 1, 'Admin/Menu/index', '菜单管理', 1, ''),
(101, 'admin', 1, 'Admin/other', '其他', -1, ''),
(102, 'admin', 1, 'Admin/Menu/add', '新增', 1, ''),
(103, 'admin', 1, 'Admin/Menu/edit', '编辑', 1, ''),
(104, 'admin', 1, 'Admin/Think/lists?model=article', '文章管理', -1, ''),
(105, 'admin', 1, 'Admin/Think/lists?model=download', '下载管理', 1, ''),
(106, 'admin', 1, 'Admin/Think/lists?model=config', '配置管理', 1, ''),
(107, 'admin', 1, 'Admin/Action/actionlog', '行为日志', 1, ''),
(108, 'admin', 1, 'Admin/User/updatePassword', '修改密码', 1, ''),
(109, 'admin', 1, 'Admin/User/updateNickname', '修改昵称', 1, ''),
(110, 'admin', 1, 'Admin/action/edit', '查看行为日志', 1, ''),
(205, 'admin', 1, 'Admin/think/add', '新增数据', 1, ''),
(111, 'admin', 2, 'Admin/article/index', '文档列表', -1, ''),
(112, 'admin', 2, 'Admin/article/add', '新增', -1, ''),
(113, 'admin', 2, 'Admin/article/edit', '编辑', -1, ''),
(114, 'admin', 2, 'Admin/article/setStatus', '改变状态', -1, ''),
(115, 'admin', 2, 'Admin/article/update', '保存', -1, ''),
(116, 'admin', 2, 'Admin/article/autoSave', '保存草稿', -1, ''),
(117, 'admin', 2, 'Admin/article/move', '移动', -1, ''),
(118, 'admin', 2, 'Admin/article/copy', '复制', -1, ''),
(119, 'admin', 2, 'Admin/article/paste', '粘贴', -1, ''),
(120, 'admin', 2, 'Admin/article/batchOperate', '导入', -1, ''),
(121, 'admin', 2, 'Admin/article/recycle', '回收站', -1, ''),
(122, 'admin', 2, 'Admin/article/permit', '还原', -1, ''),
(123, 'admin', 2, 'Admin/article/clear', '清空', -1, ''),
(124, 'admin', 2, 'Admin/User/add', '新增用户', -1, ''),
(125, 'admin', 2, 'Admin/User/action', '用户行为', -1, ''),
(126, 'admin', 2, 'Admin/User/addAction', '新增用户行为', -1, ''),
(127, 'admin', 2, 'Admin/User/editAction', '编辑用户行为', -1, ''),
(128, 'admin', 2, 'Admin/User/saveAction', '保存用户行为', -1, ''),
(129, 'admin', 2, 'Admin/User/setStatus', '变更行为状态', -1, ''),
(130, 'admin', 2, 'Admin/User/changeStatus?method=forbidUser', '禁用会员', -1, ''),
(131, 'admin', 2, 'Admin/User/changeStatus?method=resumeUser', '启用会员', -1, ''),
(132, 'admin', 2, 'Admin/User/changeStatus?method=deleteUser', '删除会员', -1, ''),
(133, 'admin', 2, 'Admin/AuthManager/index', '权限管理', -1, ''),
(134, 'admin', 2, 'Admin/AuthManager/changeStatus?method=deleteGroup', '删除', -1, ''),
(135, 'admin', 2, 'Admin/AuthManager/changeStatus?method=forbidGroup', '禁用', -1, ''),
(136, 'admin', 2, 'Admin/AuthManager/changeStatus?method=resumeGroup', '恢复', -1, ''),
(137, 'admin', 2, 'Admin/AuthManager/createGroup', '新增', -1, ''),
(138, 'admin', 2, 'Admin/AuthManager/editGroup', '编辑', -1, ''),
(139, 'admin', 2, 'Admin/AuthManager/writeGroup', '保存用户组', -1, ''),
(140, 'admin', 2, 'Admin/AuthManager/group', '授权', -1, ''),
(141, 'admin', 2, 'Admin/AuthManager/access', '访问授权', -1, ''),
(142, 'admin', 2, 'Admin/AuthManager/user', '成员授权', -1, ''),
(143, 'admin', 2, 'Admin/AuthManager/removeFromGroup', '解除授权', -1, ''),
(144, 'admin', 2, 'Admin/AuthManager/addToGroup', '保存成员授权', -1, ''),
(145, 'admin', 2, 'Admin/AuthManager/category', '分类授权', -1, ''),
(146, 'admin', 2, 'Admin/AuthManager/addToCategory', '保存分类授权', -1, ''),
(147, 'admin', 2, 'Admin/AuthManager/modelauth', '模型授权', -1, ''),
(148, 'admin', 2, 'Admin/AuthManager/addToModel', '保存模型授权', -1, ''),
(149, 'admin', 2, 'Admin/Addons/create', '创建', -1, ''),
(150, 'admin', 2, 'Admin/Addons/checkForm', '检测创建', -1, ''),
(151, 'admin', 2, 'Admin/Addons/preview', '预览', -1, ''),
(152, 'admin', 2, 'Admin/Addons/build', '快速生成插件', -1, ''),
(153, 'admin', 2, 'Admin/Addons/config', '设置', -1, ''),
(154, 'admin', 2, 'Admin/Addons/disable', '禁用', -1, ''),
(155, 'admin', 2, 'Admin/Addons/enable', '启用', -1, ''),
(156, 'admin', 2, 'Admin/Addons/install', '安装', -1, ''),
(157, 'admin', 2, 'Admin/Addons/uninstall', '卸载', -1, ''),
(158, 'admin', 2, 'Admin/Addons/saveconfig', '更新配置', -1, ''),
(159, 'admin', 2, 'Admin/Addons/adminList', '插件后台列表', -1, ''),
(160, 'admin', 2, 'Admin/Addons/execute', 'URL方式访问插件', -1, ''),
(161, 'admin', 2, 'Admin/Addons/hooks', '钩子管理', -1, ''),
(162, 'admin', 2, 'Admin/Model/index', '模型管理', -1, ''),
(163, 'admin', 2, 'Admin/model/add', '新增', -1, ''),
(164, 'admin', 2, 'Admin/model/edit', '编辑', -1, ''),
(165, 'admin', 2, 'Admin/model/setStatus', '改变状态', -1, ''),
(166, 'admin', 2, 'Admin/model/update', '保存数据', -1, ''),
(167, 'admin', 2, 'Admin/Attribute/index', '属性管理', -1, ''),
(168, 'admin', 2, 'Admin/Attribute/add', '新增', -1, ''),
(169, 'admin', 2, 'Admin/Attribute/edit', '编辑', -1, ''),
(170, 'admin', 2, 'Admin/Attribute/setStatus', '改变状态', -1, ''),
(171, 'admin', 2, 'Admin/Attribute/update', '保存数据', -1, ''),
(172, 'admin', 2, 'Admin/Config/index', '配置管理', -1, ''),
(173, 'admin', 2, 'Admin/Config/edit', '编辑', -1, ''),
(174, 'admin', 2, 'Admin/Config/del', '删除', -1, ''),
(175, 'admin', 2, 'Admin/Config/add', '新增', -1, ''),
(176, 'admin', 2, 'Admin/Config/save', '保存', -1, ''),
(177, 'admin', 2, 'Admin/Menu/index', '菜单管理', -1, ''),
(178, 'admin', 2, 'Admin/Channel/index', '导航管理', -1, ''),
(179, 'admin', 2, 'Admin/Channel/add', '新增', -1, ''),
(180, 'admin', 2, 'Admin/Channel/edit', '编辑', -1, ''),
(181, 'admin', 2, 'Admin/Channel/del', '删除', -1, ''),
(182, 'admin', 2, 'Admin/Category/index', '分类管理', -1, ''),
(183, 'admin', 2, 'Admin/Category/edit', '编辑', -1, ''),
(184, 'admin', 2, 'Admin/Category/add', '新增', -1, ''),
(185, 'admin', 2, 'Admin/Category/remove', '删除', -1, ''),
(186, 'admin', 2, 'Admin/Category/move', '移动', -1, ''),
(187, 'admin', 2, 'Admin/Category/merge', '合并', -1, ''),
(188, 'admin', 2, 'Admin/Database/index?type=export', '备份数据库', -1, ''),
(189, 'admin', 2, 'Admin/Database/export', '备份', -1, ''),
(190, 'admin', 2, 'Admin/Database/optimize', '优化表', -1, ''),
(191, 'admin', 2, 'Admin/Database/repair', '修复表', -1, ''),
(192, 'admin', 2, 'Admin/Database/index?type=import', '还原数据库', -1, ''),
(193, 'admin', 2, 'Admin/Database/import', '恢复', -1, ''),
(194, 'admin', 2, 'Admin/Database/del', '删除', -1, ''),
(195, 'admin', 2, 'Admin/other', '其他', 1, ''),
(196, 'admin', 2, 'Admin/Menu/add', '新增', -1, ''),
(197, 'admin', 2, 'Admin/Menu/edit', '编辑', -1, ''),
(198, 'admin', 2, 'Admin/Think/lists?model=article', '应用', -1, ''),
(199, 'admin', 2, 'Admin/Think/lists?model=download', '下载管理', -1, ''),
(200, 'admin', 2, 'Admin/Think/lists?model=config', '应用', -1, ''),
(201, 'admin', 2, 'Admin/Action/actionlog', '行为日志', -1, ''),
(202, 'admin', 2, 'Admin/User/updatePassword', '修改密码', -1, ''),
(203, 'admin', 2, 'Admin/User/updateNickname', '修改昵称', -1, ''),
(204, 'admin', 2, 'Admin/action/edit', '查看行为日志', -1, ''),
(206, 'admin', 1, 'Admin/think/edit', '编辑数据', 1, ''),
(207, 'admin', 1, 'Admin/Menu/import', '导入', 1, ''),
(208, 'admin', 1, 'Admin/Model/generate', '生成', 1, ''),
(209, 'admin', 1, 'Admin/Addons/addHook', '新增钩子', 1, ''),
(210, 'admin', 1, 'Admin/Addons/edithook', '编辑钩子', 1, ''),
(211, 'admin', 1, 'Admin/Article/sort', '文档排序', 1, ''),
(212, 'admin', 1, 'Admin/Config/sort', '排序', 1, ''),
(213, 'admin', 1, 'Admin/Menu/sort', '排序', 1, ''),
(214, 'admin', 1, 'Admin/Channel/sort', '排序', 1, ''),
(215, 'admin', 1, 'Admin/Category/operate/type/move', '移动', 1, ''),
(216, 'admin', 1, 'Admin/Category/operate/type/merge', '合并', 1, ''),
(217, 'admin', 2, 'Admin/wechat/index', '公众号管理', 1, ''),
(218, 'admin', 2, 'Admin/Wechat/index', '微信管理首页', -1, '');

-- --------------------------------------------------------

--
-- 表的结构 `wx_auto_reply`
--

CREATE TABLE `wx_auto_reply` (
  `id` int(10) UNSIGNED NOT NULL COMMENT '主键',
  `keyword` varchar(255) DEFAULT NULL COMMENT '关键词',
  `msg_type` char(50) DEFAULT 'text' COMMENT '消息类型',
  `content` text COMMENT '文本内容',
  `group_id` int(10) DEFAULT NULL COMMENT '图文',
  `image_id` int(10) UNSIGNED DEFAULT NULL COMMENT '上传图片',
  `manager_id` int(10) DEFAULT NULL COMMENT '管理员ID',
  `token` varchar(50) DEFAULT NULL COMMENT 'Token',
  `image_material` int(10) DEFAULT NULL COMMENT '素材图片id'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- 表的结构 `wx_category`
--

CREATE TABLE `wx_category` (
  `id` int(10) UNSIGNED NOT NULL COMMENT '分类ID',
  `name` varchar(30) NOT NULL COMMENT '标志',
  `title` varchar(50) NOT NULL COMMENT '标题',
  `pid` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '上级分类ID',
  `sort` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '排序（同级有效）',
  `list_row` tinyint(3) UNSIGNED NOT NULL DEFAULT '10' COMMENT '列表每页行数',
  `meta_title` varchar(50) NOT NULL DEFAULT '' COMMENT 'SEO的网页标题',
  `keywords` varchar(255) NOT NULL DEFAULT '' COMMENT '关键字',
  `description` varchar(255) NOT NULL DEFAULT '' COMMENT '描述',
  `template_index` varchar(100) NOT NULL COMMENT '频道页模板',
  `template_lists` varchar(100) NOT NULL COMMENT '列表页模板',
  `template_detail` varchar(100) NOT NULL COMMENT '详情页模板',
  `template_edit` varchar(100) NOT NULL COMMENT '编辑页模板',
  `model` varchar(100) NOT NULL DEFAULT '' COMMENT '关联模型',
  `type` varchar(100) NOT NULL DEFAULT '' COMMENT '允许发布的内容类型',
  `link_id` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '外链',
  `allow_publish` tinyint(3) UNSIGNED NOT NULL DEFAULT '0' COMMENT '是否允许发布内容',
  `display` tinyint(3) UNSIGNED NOT NULL DEFAULT '0' COMMENT '可见性',
  `reply` tinyint(3) UNSIGNED NOT NULL DEFAULT '0' COMMENT '是否允许回复',
  `check` tinyint(3) UNSIGNED NOT NULL DEFAULT '0' COMMENT '发布的文章是否需要审核',
  `reply_model` varchar(100) NOT NULL DEFAULT '',
  `extend` text NOT NULL COMMENT '扩展设置',
  `create_time` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '更新时间',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '数据状态',
  `icon` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '分类图标'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='分类表';

--
-- 转存表中的数据 `wx_category`
--

INSERT INTO `wx_category` (`id`, `name`, `title`, `pid`, `sort`, `list_row`, `meta_title`, `keywords`, `description`, `template_index`, `template_lists`, `template_detail`, `template_edit`, `model`, `type`, `link_id`, `allow_publish`, `display`, `reply`, `check`, `reply_model`, `extend`, `create_time`, `update_time`, `status`, `icon`) VALUES
(1, 'blog', '博客', 0, 0, 10, '', '', '', '', '', '', '', '2', '2,1', 0, 0, 1, 0, 0, '1', '', 1379474947, 1382701539, 1, 0),
(2, 'default_blog', '默认分类', 1, 1, 10, '', '', '', '', '', '', '', '2', '2,1,3', 0, 1, 1, 0, 1, '1', '', 1379475028, 1386839751, 1, 31);

-- --------------------------------------------------------

--
-- 表的结构 `wx_channel`
--

CREATE TABLE `wx_channel` (
  `id` int(10) UNSIGNED NOT NULL COMMENT '频道ID',
  `pid` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '上级频道ID',
  `title` char(30) NOT NULL COMMENT '频道标题',
  `url` char(100) NOT NULL COMMENT '频道连接',
  `sort` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '导航排序',
  `create_time` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '更新时间',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '状态',
  `target` tinyint(2) UNSIGNED NOT NULL DEFAULT '0' COMMENT '新窗口打开'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `wx_channel`
--

INSERT INTO `wx_channel` (`id`, `pid`, `title`, `url`, `sort`, `create_time`, `update_time`, `status`, `target`) VALUES
(1, 0, '首页', 'Index/index', 1, 1379475111, 1379923177, 1, 0),
(2, 0, '博客', 'Article/index?category=blog', 2, 1379475131, 1379483713, 1, 0),
(3, 0, '官网', 'http://www.onethink.cn', 3, 1379475154, 1387163458, 1, 0);

-- --------------------------------------------------------

--
-- 表的结构 `wx_config`
--

CREATE TABLE `wx_config` (
  `id` int(10) UNSIGNED NOT NULL COMMENT '配置ID',
  `name` varchar(30) NOT NULL DEFAULT '' COMMENT '配置名称',
  `type` tinyint(3) UNSIGNED NOT NULL DEFAULT '0' COMMENT '配置类型',
  `title` varchar(50) NOT NULL DEFAULT '' COMMENT '配置说明',
  `group` tinyint(3) UNSIGNED NOT NULL DEFAULT '0' COMMENT '配置分组',
  `extra` varchar(255) NOT NULL DEFAULT '' COMMENT '配置值',
  `remark` varchar(100) NOT NULL COMMENT '配置说明',
  `create_time` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '更新时间',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '状态',
  `value` text NOT NULL COMMENT '配置值',
  `sort` smallint(3) UNSIGNED NOT NULL DEFAULT '0' COMMENT '排序'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `wx_config`
--

INSERT INTO `wx_config` (`id`, `name`, `type`, `title`, `group`, `extra`, `remark`, `create_time`, `update_time`, `status`, `value`, `sort`) VALUES
(1, 'WEB_SITE_TITLE', 1, '网站标题', 1, '', '网站标题前台显示标题', 1378898976, 1379235274, 1, 'OneThink内容管理框架', 0),
(2, 'WEB_SITE_DESCRIPTION', 2, '网站描述', 1, '', '网站搜索引擎描述', 1378898976, 1379235841, 1, 'OneThink内容管理框架', 1),
(3, 'WEB_SITE_KEYWORD', 2, '网站关键字', 1, '', '网站搜索引擎关键字', 1378898976, 1381390100, 1, 'ThinkPHP,OneThink', 8),
(4, 'WEB_SITE_CLOSE', 4, '关闭站点', 1, '0:关闭,1:开启', '站点关闭后其他用户不能访问，管理员可以正常访问', 1378898976, 1379235296, 1, '1', 1),
(9, 'CONFIG_TYPE_LIST', 3, '配置类型列表', 4, '', '主要用于数据解析和页面表单的生成', 1378898976, 1379235348, 1, '0:数字\r\n1:字符\r\n2:文本\r\n3:数组\r\n4:枚举', 2),
(10, 'WEB_SITE_ICP', 1, '网站备案号', 1, '', '设置在网站底部显示的备案号，如“沪ICP备12007941号-2', 1378900335, 1379235859, 1, '', 9),
(11, 'DOCUMENT_POSITION', 3, '文档推荐位', 2, '', '文档推荐位，推荐到多个位置KEY值相加即可', 1379053380, 1379235329, 1, '1:列表页推荐\r\n2:频道页推荐\r\n4:网站首页推荐', 3),
(12, 'DOCUMENT_DISPLAY', 3, '文档可见性', 2, '', '文章可见性仅影响前台显示，后台不收影响', 1379056370, 1379235322, 1, '0:所有人可见\r\n1:仅注册会员可见\r\n2:仅管理员可见', 4),
(13, 'COLOR_STYLE', 4, '后台色系', 1, 'default_color:默认\r\nblue_color:紫罗兰', '后台颜色风格', 1379122533, 1379235904, 1, 'default_color', 10),
(20, 'CONFIG_GROUP_LIST', 3, '配置分组', 4, '', '配置分组', 1379228036, 1384418383, 1, '1:基本\r\n2:内容\r\n3:用户\r\n4:系统', 4),
(21, 'HOOKS_TYPE', 3, '钩子的类型', 4, '', '类型 1-用于扩展显示内容，2-用于扩展业务处理', 1379313397, 1379313407, 1, '1:视图\r\n2:控制器', 6),
(22, 'AUTH_CONFIG', 3, 'Auth配置', 4, '', '自定义Auth.class.php类配置', 1379409310, 1379409564, 1, 'AUTH_ON:1\r\nAUTH_TYPE:2', 8),
(23, 'OPEN_DRAFTBOX', 4, '是否开启草稿功能', 2, '0:关闭草稿功能\r\n1:开启草稿功能\r\n', '新增文章时的草稿功能配置', 1379484332, 1379484591, 1, '1', 1),
(24, 'DRAFT_AOTOSAVE_INTERVAL', 0, '自动保存草稿时间', 2, '', '自动保存草稿的时间间隔，单位：秒', 1379484574, 1386143323, 1, '60', 2),
(25, 'LIST_ROWS', 0, '后台每页记录数', 2, '', '后台数据每页显示记录数', 1379503896, 1380427745, 1, '10', 10),
(26, 'USER_ALLOW_REGISTER', 4, '是否允许用户注册', 3, '0:关闭注册\r\n1:允许注册', '是否开放用户注册', 1379504487, 1379504580, 1, '1', 3),
(27, 'CODEMIRROR_THEME', 4, '预览插件的CodeMirror主题', 4, '3024-day:3024 day\r\n3024-night:3024 night\r\nambiance:ambiance\r\nbase16-dark:base16 dark\r\nbase16-light:base16 light\r\nblackboard:blackboard\r\ncobalt:cobalt\r\neclipse:eclipse\r\nelegant:elegant\r\nerlang-dark:erlang-dark\r\nlesser-dark:lesser-dark\r\nmidnight:midnight', '详情见CodeMirror官网', 1379814385, 1384740813, 1, 'ambiance', 3),
(28, 'DATA_BACKUP_PATH', 1, '数据库备份根路径', 4, '', '路径必须以 / 结尾', 1381482411, 1381482411, 1, './Data/', 5),
(29, 'DATA_BACKUP_PART_SIZE', 0, '数据库备份卷大小', 4, '', '该值用于限制压缩后的分卷最大长度。单位：B；建议设置20M', 1381482488, 1381729564, 1, '20971520', 7),
(30, 'DATA_BACKUP_COMPRESS', 4, '数据库备份文件是否启用压缩', 4, '0:不压缩\r\n1:启用压缩', '压缩备份文件需要PHP环境支持gzopen,gzwrite函数', 1381713345, 1381729544, 1, '1', 9),
(31, 'DATA_BACKUP_COMPRESS_LEVEL', 4, '数据库备份文件压缩级别', 4, '1:普通\r\n4:一般\r\n9:最高', '数据库备份文件的压缩级别，该配置在开启压缩时生效', 1381713408, 1381713408, 1, '9', 10),
(32, 'DEVELOP_MODE', 4, '开启开发者模式', 4, '0:关闭\r\n1:开启', '是否开启开发者模式', 1383105995, 1383291877, 1, '1', 11),
(33, 'ALLOW_VISIT', 3, '不受限控制器方法', 0, '', '', 1386644047, 1386644741, 1, '0:article/draftbox\r\n1:article/mydocument\r\n2:Category/tree\r\n3:Index/verify\r\n4:file/upload\r\n5:file/download\r\n6:user/updatePassword\r\n7:user/updateNickname\r\n8:user/submitPassword\r\n9:user/submitNickname\r\n10:file/uploadpicture', 0),
(34, 'DENY_VISIT', 3, '超管专限控制器方法', 0, '', '仅超级管理员可访问的控制器方法', 1386644141, 1386644659, 1, '0:Addons/addhook\r\n1:Addons/edithook\r\n2:Addons/delhook\r\n3:Addons/updateHook\r\n4:Admin/getMenus\r\n5:Admin/recordList\r\n6:AuthManager/updateRules\r\n7:AuthManager/tree', 0),
(35, 'REPLY_LIST_ROWS', 0, '回复列表每页条数', 2, '', '', 1386645376, 1387178083, 1, '10', 0),
(36, 'ADMIN_ALLOW_IP', 2, '后台允许访问IP', 4, '', '多个用逗号分隔，如果不配置表示不限制IP访问', 1387165454, 1387165553, 1, '', 12),
(37, 'SHOW_PAGE_TRACE', 4, '是否显示页面Trace', 4, '0:关闭\r\n1:开启', '是否显示页面Trace信息', 1387165685, 1387165685, 1, '0', 1);

-- --------------------------------------------------------

--
-- 表的结构 `wx_document`
--

CREATE TABLE `wx_document` (
  `id` int(10) UNSIGNED NOT NULL COMMENT '文档ID',
  `uid` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '用户ID',
  `name` char(40) NOT NULL DEFAULT '' COMMENT '标识',
  `title` char(80) NOT NULL DEFAULT '' COMMENT '标题',
  `category_id` int(10) UNSIGNED NOT NULL COMMENT '所属分类',
  `description` char(140) NOT NULL DEFAULT '' COMMENT '描述',
  `root` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '根节点',
  `pid` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '所属ID',
  `model_id` tinyint(3) UNSIGNED NOT NULL DEFAULT '0' COMMENT '内容模型ID',
  `type` tinyint(3) UNSIGNED NOT NULL DEFAULT '2' COMMENT '内容类型',
  `position` smallint(5) UNSIGNED NOT NULL DEFAULT '0' COMMENT '推荐位',
  `link_id` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '外链',
  `cover_id` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '封面',
  `display` tinyint(3) UNSIGNED NOT NULL DEFAULT '1' COMMENT '可见性',
  `deadline` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '截至时间',
  `attach` tinyint(3) UNSIGNED NOT NULL DEFAULT '0' COMMENT '附件数量',
  `view` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '浏览量',
  `comment` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '评论数',
  `extend` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '扩展统计字段',
  `level` int(10) NOT NULL DEFAULT '0' COMMENT '优先级',
  `create_time` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '更新时间',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '数据状态'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='文档模型基础表';

--
-- 转存表中的数据 `wx_document`
--

INSERT INTO `wx_document` (`id`, `uid`, `name`, `title`, `category_id`, `description`, `root`, `pid`, `model_id`, `type`, `position`, `link_id`, `cover_id`, `display`, `deadline`, `attach`, `view`, `comment`, `extend`, `level`, `create_time`, `update_time`, `status`) VALUES
(1, 1, '', 'OneThink1.0正式版发布', 2, '大家期待的OneThink正式版发布', 0, 0, 2, 2, 0, 0, 0, 1, 0, 0, 8, 0, 0, 0, 1387260660, 1387263112, 1);

-- --------------------------------------------------------

--
-- 表的结构 `wx_document_article`
--

CREATE TABLE `wx_document_article` (
  `id` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '文档ID',
  `parse` tinyint(3) UNSIGNED NOT NULL DEFAULT '0' COMMENT '内容解析类型',
  `content` text NOT NULL COMMENT '文章内容',
  `template` varchar(100) NOT NULL DEFAULT '' COMMENT '详情页显示模板',
  `bookmark` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '收藏数'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='文档模型文章表';

--
-- 转存表中的数据 `wx_document_article`
--

INSERT INTO `wx_document_article` (`id`, `parse`, `content`, `template`, `bookmark`) VALUES
(1, 0, '<h1>\r\n	OneThink1.0正式版发布&nbsp;\r\n</h1>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<strong>OneThink是一个开源的内容管理框架，基于最新的ThinkPHP3.2版本开发，提供更方便、更安全的WEB应用开发体验，采用了全新的架构设计和命名空间机制，融合了模块化、驱动化和插件化的设计理念于一体，开启了国内WEB应用傻瓜式开发的新潮流。&nbsp;</strong> \r\n</p>\r\n<h2>\r\n	主要特性：\r\n</h2>\r\n<p>\r\n	1. 基于ThinkPHP最新3.2版本。\r\n</p>\r\n<p>\r\n	2. 模块化：全新的架构和模块化的开发机制，便于灵活扩展和二次开发。&nbsp;\r\n</p>\r\n<p>\r\n	3. 文档模型/分类体系：通过和文档模型绑定，以及不同的文档类型，不同分类可以实现差异化的功能，轻松实现诸如资讯、下载、讨论和图片等功能。\r\n</p>\r\n<p>\r\n	4. 开源免费：OneThink遵循Apache2开源协议,免费提供使用。&nbsp;\r\n</p>\r\n<p>\r\n	5. 用户行为：支持自定义用户行为，可以对单个用户或者群体用户的行为进行记录及分享，为您的运营决策提供有效参考数据。\r\n</p>\r\n<p>\r\n	6. 云端部署：通过驱动的方式可以轻松支持平台的部署，让您的网站无缝迁移，内置已经支持SAE和BAE3.0。\r\n</p>\r\n<p>\r\n	7. 云服务支持：即将启动支持云存储、云安全、云过滤和云统计等服务，更多贴心的服务让您的网站更安心。\r\n</p>\r\n<p>\r\n	8. 安全稳健：提供稳健的安全策略，包括备份恢复、容错、防止恶意攻击登录，网页防篡改等多项安全管理功能，保证系统安全，可靠、稳定的运行。&nbsp;\r\n</p>\r\n<p>\r\n	9. 应用仓库：官方应用仓库拥有大量来自第三方插件和应用模块、模板主题，有众多来自开源社区的贡献，让您的网站“One”美无缺。&nbsp;\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<strong>&nbsp;OneThink集成了一个完善的后台管理体系和前台模板标签系统，让你轻松管理数据和进行前台网站的标签式开发。&nbsp;</strong> \r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<h2>\r\n	后台主要功能：\r\n</h2>\r\n<p>\r\n	1. 用户Passport系统\r\n</p>\r\n<p>\r\n	2. 配置管理系统&nbsp;\r\n</p>\r\n<p>\r\n	3. 权限控制系统\r\n</p>\r\n<p>\r\n	4. 后台建模系统&nbsp;\r\n</p>\r\n<p>\r\n	5. 多级分类系统&nbsp;\r\n</p>\r\n<p>\r\n	6. 用户行为系统&nbsp;\r\n</p>\r\n<p>\r\n	7. 钩子和插件系统\r\n</p>\r\n<p>\r\n	8. 系统日志系统&nbsp;\r\n</p>\r\n<p>\r\n	9. 数据备份和还原\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	&nbsp;[ 官方下载：&nbsp;<a href="http://www.onethink.cn/download.html" target="_blank">http://www.onethink.cn/download.html</a>&nbsp;&nbsp;开发手册：<a href="http://document.onethink.cn/" target="_blank">http://document.onethink.cn/</a>&nbsp;]&nbsp;\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<strong>OneThink开发团队 2013</strong> \r\n</p>', '', 0);

-- --------------------------------------------------------

--
-- 表的结构 `wx_document_download`
--

CREATE TABLE `wx_document_download` (
  `id` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '文档ID',
  `parse` tinyint(3) UNSIGNED NOT NULL DEFAULT '0' COMMENT '内容解析类型',
  `content` text NOT NULL COMMENT '下载详细描述',
  `template` varchar(100) NOT NULL DEFAULT '' COMMENT '详情页显示模板',
  `file_id` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '文件ID',
  `download` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '下载次数',
  `size` bigint(20) UNSIGNED NOT NULL DEFAULT '0' COMMENT '文件大小'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='文档模型下载表';

-- --------------------------------------------------------

--
-- 表的结构 `wx_file`
--

CREATE TABLE `wx_file` (
  `id` int(10) UNSIGNED NOT NULL COMMENT '文件ID',
  `name` char(30) NOT NULL DEFAULT '' COMMENT '原始文件名',
  `savename` char(20) NOT NULL DEFAULT '' COMMENT '保存名称',
  `savepath` char(30) NOT NULL DEFAULT '' COMMENT '文件保存路径',
  `ext` char(5) NOT NULL DEFAULT '' COMMENT '文件后缀',
  `mime` char(40) NOT NULL DEFAULT '' COMMENT '文件mime类型',
  `size` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '文件大小',
  `md5` char(32) NOT NULL DEFAULT '' COMMENT '文件md5',
  `sha1` char(40) NOT NULL DEFAULT '' COMMENT '文件 sha1编码',
  `location` tinyint(3) UNSIGNED NOT NULL DEFAULT '0' COMMENT '文件保存位置',
  `create_time` int(10) UNSIGNED NOT NULL COMMENT '上传时间'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='文件表';

-- --------------------------------------------------------

--
-- 表的结构 `wx_hooks`
--

CREATE TABLE `wx_hooks` (
  `id` int(10) UNSIGNED NOT NULL COMMENT '主键',
  `name` varchar(40) NOT NULL DEFAULT '' COMMENT '钩子名称',
  `description` text NOT NULL COMMENT '描述',
  `type` tinyint(1) UNSIGNED NOT NULL DEFAULT '1' COMMENT '类型',
  `update_time` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '更新时间',
  `addons` varchar(255) NOT NULL DEFAULT '' COMMENT '钩子挂载的插件 ''，''分割'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `wx_hooks`
--

INSERT INTO `wx_hooks` (`id`, `name`, `description`, `type`, `update_time`, `addons`) VALUES
(1, 'pageHeader', '页面header钩子，一般用于加载插件CSS文件和代码', 1, 0, ''),
(2, 'pageFooter', '页面footer钩子，一般用于加载插件JS文件和JS代码', 1, 0, 'ReturnTop'),
(3, 'documentEditForm', '添加编辑表单的 扩展内容钩子', 1, 0, 'Attachment'),
(4, 'documentDetailAfter', '文档末尾显示', 1, 0, 'Attachment,SocialComment'),
(5, 'documentDetailBefore', '页面内容前显示用钩子', 1, 0, ''),
(6, 'documentSaveComplete', '保存文档数据后的扩展钩子', 2, 0, 'Attachment'),
(7, 'documentEditFormContent', '添加编辑表单的内容显示钩子', 1, 0, 'Editor'),
(8, 'adminArticleEdit', '后台内容编辑页编辑器', 1, 1378982734, 'EditorForAdmin'),
(13, 'AdminIndex', '首页小格子个性化显示', 1, 1382596073, 'SiteStat,SystemInfo,DevTeam'),
(14, 'topicComment', '评论提交方式扩展钩子。', 1, 1380163518, 'Editor'),
(16, 'app_begin', '应用开始', 2, 1384481614, ''),
(17, 'weixin', '微信插件必须加载的钩子', 1, 1388810858, 'Hitegg,Diy,RedBag,WeMedia,ShopCoupon,Card,SingIn,Seckill,CustomMenu,CustomReply,WeiSite,UserCenter,Exam,Draw,Extensions,Forms,Coupon,Guess,Comment,Game,ConfigureAccount,Chat,CardVouchers,Ask,BusinessCard,HelloWorld,Invite,Tongji,Test,Vote,Sms,Survey,Shop,');

-- --------------------------------------------------------

--
-- 表的结构 `wx_member`
--

CREATE TABLE `wx_member` (
  `uid` int(10) UNSIGNED NOT NULL COMMENT '用户ID',
  `nickname` char(16) NOT NULL DEFAULT '' COMMENT '昵称',
  `sex` tinyint(3) UNSIGNED NOT NULL DEFAULT '0' COMMENT '性别',
  `birthday` date NOT NULL DEFAULT '0000-00-00' COMMENT '生日',
  `qq` char(10) NOT NULL DEFAULT '' COMMENT 'qq号',
  `score` mediumint(8) NOT NULL DEFAULT '0' COMMENT '用户积分',
  `login` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '登录次数',
  `reg_ip` bigint(20) NOT NULL DEFAULT '0' COMMENT '注册IP',
  `reg_time` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '注册时间',
  `last_login_ip` bigint(20) NOT NULL DEFAULT '0' COMMENT '最后登录IP',
  `last_login_time` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '最后登录时间',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '会员状态'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='会员表';

--
-- 转存表中的数据 `wx_member`
--

INSERT INTO `wx_member` (`uid`, `nickname`, `sex`, `birthday`, `qq`, `score`, `login`, `reg_ip`, `reg_time`, `last_login_ip`, `last_login_time`, `status`) VALUES
(1, 'admin', 0, '0000-00-00', '', 10, 3, 0, 1467276433, 0, 1467338593, 1);

-- --------------------------------------------------------

--
-- 表的结构 `wx_menu`
--

CREATE TABLE `wx_menu` (
  `id` int(10) UNSIGNED NOT NULL COMMENT '文档ID',
  `title` varchar(50) NOT NULL DEFAULT '' COMMENT '标题',
  `pid` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '上级分类ID',
  `sort` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '排序（同级有效）',
  `url` char(255) NOT NULL DEFAULT '' COMMENT '链接地址',
  `hide` tinyint(1) UNSIGNED NOT NULL DEFAULT '0' COMMENT '是否隐藏',
  `tip` varchar(255) NOT NULL DEFAULT '' COMMENT '提示',
  `group` varchar(50) DEFAULT '' COMMENT '分组',
  `is_dev` tinyint(1) UNSIGNED NOT NULL DEFAULT '0' COMMENT '是否仅开发者模式可见'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `wx_menu`
--

INSERT INTO `wx_menu` (`id`, `title`, `pid`, `sort`, `url`, `hide`, `tip`, `group`, `is_dev`) VALUES
(1, '首页', 0, 1, 'Index/index', 0, '', '', 0),
(2, '内容', 0, 3, 'Article/mydocument', 0, '', '', 0),
(3, '文档列表', 2, 0, 'article/index', 1, '', '内容', 0),
(4, '新增', 3, 0, 'article/add', 0, '', '', 0),
(5, '编辑', 3, 0, 'article/edit', 0, '', '', 0),
(6, '改变状态', 3, 0, 'article/setStatus', 0, '', '', 0),
(7, '保存', 3, 0, 'article/update', 0, '', '', 0),
(8, '保存草稿', 3, 0, 'article/autoSave', 0, '', '', 0),
(9, '移动', 3, 0, 'article/move', 0, '', '', 0),
(10, '复制', 3, 0, 'article/copy', 0, '', '', 0),
(11, '粘贴', 3, 0, 'article/paste', 0, '', '', 0),
(12, '导入', 3, 0, 'article/batchOperate', 0, '', '', 0),
(13, '回收站', 2, 0, 'article/recycle', 1, '', '内容', 0),
(14, '还原', 13, 0, 'article/permit', 0, '', '', 0),
(15, '清空', 13, 0, 'article/clear', 0, '', '', 0),
(16, '用户', 0, 4, 'User/index', 0, '', '', 0),
(17, '用户信息', 16, 0, 'User/index', 0, '', '用户管理', 0),
(18, '新增用户', 17, 0, 'User/add', 0, '添加新用户', '', 0),
(19, '用户行为', 16, 0, 'User/action', 0, '', '行为管理', 0),
(20, '新增用户行为', 19, 0, 'User/addaction', 0, '', '', 0),
(21, '编辑用户行为', 19, 0, 'User/editaction', 0, '', '', 0),
(22, '保存用户行为', 19, 0, 'User/saveAction', 0, '"用户->用户行为"保存编辑和新增的用户行为', '', 0),
(23, '变更行为状态', 19, 0, 'User/setStatus', 0, '"用户->用户行为"中的启用,禁用和删除权限', '', 0),
(24, '禁用会员', 19, 0, 'User/changeStatus?method=forbidUser', 0, '"用户->用户信息"中的禁用', '', 0),
(25, '启用会员', 19, 0, 'User/changeStatus?method=resumeUser', 0, '"用户->用户信息"中的启用', '', 0),
(26, '删除会员', 19, 0, 'User/changeStatus?method=deleteUser', 0, '"用户->用户信息"中的删除', '', 0),
(27, '权限管理', 16, 0, 'AuthManager/index', 0, '', '用户管理', 0),
(28, '删除', 27, 0, 'AuthManager/changeStatus?method=deleteGroup', 0, '删除用户组', '', 0),
(29, '禁用', 27, 0, 'AuthManager/changeStatus?method=forbidGroup', 0, '禁用用户组', '', 0),
(30, '恢复', 27, 0, 'AuthManager/changeStatus?method=resumeGroup', 0, '恢复已禁用的用户组', '', 0),
(31, '新增', 27, 0, 'AuthManager/createGroup', 0, '创建新的用户组', '', 0),
(32, '编辑', 27, 0, 'AuthManager/editGroup', 0, '编辑用户组名称和描述', '', 0),
(33, '保存用户组', 27, 0, 'AuthManager/writeGroup', 0, '新增和编辑用户组的"保存"按钮', '', 0),
(34, '授权', 27, 0, 'AuthManager/group', 0, '"后台 \\ 用户 \\ 用户信息"列表页的"授权"操作按钮,用于设置用户所属用户组', '', 0),
(35, '访问授权', 27, 0, 'AuthManager/access', 0, '"后台 \\ 用户 \\ 权限管理"列表页的"访问授权"操作按钮', '', 0),
(36, '成员授权', 27, 0, 'AuthManager/user', 0, '"后台 \\ 用户 \\ 权限管理"列表页的"成员授权"操作按钮', '', 0),
(37, '解除授权', 27, 0, 'AuthManager/removeFromGroup', 0, '"成员授权"列表页内的解除授权操作按钮', '', 0),
(38, '保存成员授权', 27, 0, 'AuthManager/addToGroup', 0, '"用户信息"列表页"授权"时的"保存"按钮和"成员授权"里右上角的"添加"按钮)', '', 0),
(39, '分类授权', 27, 0, 'AuthManager/category', 0, '"后台 \\ 用户 \\ 权限管理"列表页的"分类授权"操作按钮', '', 0),
(40, '保存分类授权', 27, 0, 'AuthManager/addToCategory', 0, '"分类授权"页面的"保存"按钮', '', 0),
(41, '模型授权', 27, 0, 'AuthManager/modelauth', 0, '"后台 \\ 用户 \\ 权限管理"列表页的"模型授权"操作按钮', '', 0),
(42, '保存模型授权', 27, 0, 'AuthManager/addToModel', 0, '"分类授权"页面的"保存"按钮', '', 0),
(43, '扩展', 0, 7, 'Addons/index', 0, '', '', 0),
(44, '插件管理', 43, 1, 'Addons/index', 0, '', '扩展', 0),
(45, '创建', 44, 0, 'Addons/create', 0, '服务器上创建插件结构向导', '', 0),
(46, '检测创建', 44, 0, 'Addons/checkForm', 0, '检测插件是否可以创建', '', 0),
(47, '预览', 44, 0, 'Addons/preview', 0, '预览插件定义类文件', '', 0),
(48, '快速生成插件', 44, 0, 'Addons/build', 0, '开始生成插件结构', '', 0),
(49, '设置', 44, 0, 'Addons/config', 0, '设置插件配置', '', 0),
(50, '禁用', 44, 0, 'Addons/disable', 0, '禁用插件', '', 0),
(51, '启用', 44, 0, 'Addons/enable', 0, '启用插件', '', 0),
(52, '安装', 44, 0, 'Addons/install', 0, '安装插件', '', 0),
(53, '卸载', 44, 0, 'Addons/uninstall', 0, '卸载插件', '', 0),
(54, '更新配置', 44, 0, 'Addons/saveconfig', 0, '更新插件配置处理', '', 0),
(55, '插件后台列表', 44, 0, 'Addons/adminList', 0, '', '', 0),
(56, 'URL方式访问插件', 44, 0, 'Addons/execute', 0, '控制是否有权限通过url访问插件控制器方法', '', 0),
(57, '钩子管理', 43, 2, 'Addons/hooks', 0, '', '扩展', 0),
(58, '模型管理', 68, 3, 'Model/index', 0, '', '系统设置', 0),
(59, '新增', 58, 0, 'model/add', 0, '', '', 0),
(60, '编辑', 58, 0, 'model/edit', 0, '', '', 0),
(61, '改变状态', 58, 0, 'model/setStatus', 0, '', '', 0),
(62, '保存数据', 58, 0, 'model/update', 0, '', '', 0),
(63, '属性管理', 68, 0, 'Attribute/index', 1, '网站属性配置。', '', 0),
(64, '新增', 63, 0, 'Attribute/add', 0, '', '', 0),
(65, '编辑', 63, 0, 'Attribute/edit', 0, '', '', 0),
(66, '改变状态', 63, 0, 'Attribute/setStatus', 0, '', '', 0),
(67, '保存数据', 63, 0, 'Attribute/update', 0, '', '', 0),
(68, '系统', 0, 5, 'Config/group', 0, '', '', 0),
(69, '网站设置', 68, 1, 'Config/group', 0, '', '系统设置', 0),
(70, '配置管理', 68, 4, 'Config/index', 0, '', '系统设置', 0),
(71, '编辑', 70, 0, 'Config/edit', 0, '新增编辑和保存配置', '', 0),
(72, '删除', 70, 0, 'Config/del', 0, '删除配置', '', 0),
(73, '新增', 70, 0, 'Config/add', 0, '新增配置', '', 0),
(74, '保存', 70, 0, 'Config/save', 0, '保存配置', '', 0),
(75, '菜单管理', 68, 5, 'Menu/index', 0, '', '系统设置', 0),
(76, '导航管理', 68, 6, 'Channel/index', 0, '', '系统设置', 0),
(77, '新增', 76, 0, 'Channel/add', 0, '', '', 0),
(78, '编辑', 76, 0, 'Channel/edit', 0, '', '', 0),
(79, '删除', 76, 0, 'Channel/del', 0, '', '', 0),
(80, '分类管理', 68, 2, 'Category/index', 0, '', '系统设置', 0),
(81, '编辑', 80, 0, 'Category/edit', 0, '编辑和保存栏目分类', '', 0),
(82, '新增', 80, 0, 'Category/add', 0, '新增栏目分类', '', 0),
(83, '删除', 80, 0, 'Category/remove', 0, '删除栏目分类', '', 0),
(84, '移动', 80, 0, 'Category/operate/type/move', 0, '移动栏目分类', '', 0),
(85, '合并', 80, 0, 'Category/operate/type/merge', 0, '合并栏目分类', '', 0),
(86, '备份数据库', 68, 0, 'Database/index?type=export', 0, '', '数据备份', 0),
(87, '备份', 86, 0, 'Database/export', 0, '备份数据库', '', 0),
(88, '优化表', 86, 0, 'Database/optimize', 0, '优化数据表', '', 0),
(89, '修复表', 86, 0, 'Database/repair', 0, '修复数据表', '', 0),
(90, '还原数据库', 68, 0, 'Database/index?type=import', 0, '', '数据备份', 0),
(91, '恢复', 90, 0, 'Database/import', 0, '数据库恢复', '', 0),
(92, '删除', 90, 0, 'Database/del', 0, '删除备份文件', '', 0),
(93, '其他', 0, 6, 'other', 1, '', '', 0),
(96, '新增', 75, 0, 'Menu/add', 0, '', '系统设置', 0),
(98, '编辑', 75, 0, 'Menu/edit', 0, '', '', 0),
(104, '下载管理', 102, 0, 'Think/lists?model=download', 0, '', '', 0),
(105, '配置管理', 102, 0, 'Think/lists?model=config', 0, '', '', 0),
(106, '行为日志', 16, 0, 'Action/actionlog', 0, '', '行为管理', 0),
(108, '修改密码', 16, 0, 'User/updatePassword', 1, '', '', 0),
(109, '修改昵称', 16, 0, 'User/updateNickname', 1, '', '', 0),
(110, '查看行为日志', 106, 0, 'action/edit', 1, '', '', 0),
(112, '新增数据', 58, 0, 'think/add', 1, '', '', 0),
(113, '编辑数据', 58, 0, 'think/edit', 1, '', '', 0),
(114, '导入', 75, 0, 'Menu/import', 0, '', '', 0),
(115, '生成', 58, 0, 'Model/generate', 0, '', '', 0),
(116, '新增钩子', 57, 0, 'Addons/addHook', 0, '', '', 0),
(117, '编辑钩子', 57, 0, 'Addons/edithook', 0, '', '', 0),
(118, '文档排序', 3, 0, 'Article/sort', 1, '', '', 0),
(119, '排序', 70, 0, 'Config/sort', 1, '', '', 0),
(120, '排序', 75, 0, 'Menu/sort', 1, '', '', 0),
(121, '排序', 76, 0, 'Channel/sort', 1, '', '', 0),
(122, '公众号管理', 0, 2, 'wechat/index', 0, '', '', 0),
(124, '管理', 68, 7, 'Menu/sub', 0, '', '系统设置', 0);

-- --------------------------------------------------------

--
-- 表的结构 `wx_model`
--

CREATE TABLE `wx_model` (
  `id` int(10) UNSIGNED NOT NULL COMMENT '模型ID',
  `name` char(30) NOT NULL DEFAULT '' COMMENT '模型标识',
  `title` char(30) NOT NULL DEFAULT '' COMMENT '模型名称',
  `extend` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '继承的模型',
  `relation` varchar(30) NOT NULL DEFAULT '' COMMENT '继承与被继承模型的关联字段',
  `need_pk` tinyint(1) UNSIGNED NOT NULL DEFAULT '1' COMMENT '新建表时是否需要主键字段',
  `field_sort` text NOT NULL COMMENT '表单字段排序',
  `field_group` varchar(255) NOT NULL DEFAULT '1:基础' COMMENT '字段分组',
  `attribute_list` text NOT NULL COMMENT '属性列表（表的字段）',
  `template_list` varchar(100) NOT NULL DEFAULT '' COMMENT '列表模板',
  `template_add` varchar(100) NOT NULL DEFAULT '' COMMENT '新增模板',
  `template_edit` varchar(100) NOT NULL DEFAULT '' COMMENT '编辑模板',
  `list_grid` text NOT NULL COMMENT '列表定义',
  `list_row` smallint(2) UNSIGNED NOT NULL DEFAULT '10' COMMENT '列表数据长度',
  `search_key` varchar(50) NOT NULL DEFAULT '' COMMENT '默认搜索字段',
  `search_list` varchar(255) NOT NULL DEFAULT '' COMMENT '高级搜索的字段',
  `create_time` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '更新时间',
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '0' COMMENT '状态',
  `engine_type` varchar(25) NOT NULL DEFAULT 'MyISAM' COMMENT '数据库引擎'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='文档模型表';

--
-- 转存表中的数据 `wx_model`
--

INSERT INTO `wx_model` (`id`, `name`, `title`, `extend`, `relation`, `need_pk`, `field_sort`, `field_group`, `attribute_list`, `template_list`, `template_add`, `template_edit`, `list_grid`, `list_row`, `search_key`, `search_list`, `create_time`, `update_time`, `status`, `engine_type`) VALUES
(1, 'document', '基础文档', 0, '', 1, '{"1":["1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22"]}', '1:基础', '', '', '', '', 'id:编号\r\ntitle:标题:article/index?cate_id=[category_id]&pid=[id]\r\ntype|get_document_type:类型\r\nlevel:优先级\r\nupdate_time|time_format:最后更新\r\nstatus_text:状态\r\nview:浏览\r\nid:操作:[EDIT]&cate_id=[category_id]|编辑,article/setstatus?status=-1&ids=[id]|删除', 0, '', '', 1383891233, 1384507827, 1, 'MyISAM'),
(2, 'article', '文章', 1, '', 1, '{"1":["3","24","2","5"],"2":["9","13","19","10","12","16","17","26","20","14","11","25"]}', '1:基础,2:扩展', '', '', '', '', 'id:编号\r\ntitle:标题:article/edit?cate_id=[category_id]&id=[id]\r\ncontent:内容', 0, '', '', 1383891243, 1387260622, 1, 'MyISAM'),
(3, 'download', '下载', 1, '', 1, '{"1":["3","28","30","32","2","5","31"],"2":["13","10","27","9","12","16","17","19","11","20","14","29"]}', '1:基础,2:扩展', '', '', '', '', 'id:编号\r\ntitle:标题', 0, '', '', 1383891252, 1387260449, 1, 'MyISAM');

-- --------------------------------------------------------

--
-- 表的结构 `wx_picture`
--

CREATE TABLE `wx_picture` (
  `id` int(10) UNSIGNED NOT NULL COMMENT '主键id自增',
  `path` varchar(255) NOT NULL DEFAULT '' COMMENT '路径',
  `url` varchar(255) NOT NULL DEFAULT '' COMMENT '图片链接',
  `md5` char(32) NOT NULL DEFAULT '' COMMENT '文件md5',
  `sha1` char(40) NOT NULL DEFAULT '' COMMENT '文件 sha1编码',
  `status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '状态',
  `create_time` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '创建时间'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `wx_ucenter_admin`
--

CREATE TABLE `wx_ucenter_admin` (
  `id` int(10) UNSIGNED NOT NULL COMMENT '管理员ID',
  `member_id` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '管理员用户ID',
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '0' COMMENT '管理员状态'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='管理员表';

-- --------------------------------------------------------

--
-- 表的结构 `wx_ucenter_app`
--

CREATE TABLE `wx_ucenter_app` (
  `id` int(10) UNSIGNED NOT NULL COMMENT '应用ID',
  `title` varchar(30) NOT NULL COMMENT '应用名称',
  `url` varchar(100) NOT NULL COMMENT '应用URL',
  `ip` char(15) NOT NULL COMMENT '应用IP',
  `auth_key` varchar(100) NOT NULL COMMENT '加密KEY',
  `sys_login` tinyint(1) UNSIGNED NOT NULL DEFAULT '0' COMMENT '同步登陆',
  `allow_ip` varchar(255) NOT NULL COMMENT '允许访问的IP',
  `create_time` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '更新时间',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '应用状态'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='应用表';

-- --------------------------------------------------------

--
-- 表的结构 `wx_ucenter_member`
--

CREATE TABLE `wx_ucenter_member` (
  `id` int(10) UNSIGNED NOT NULL COMMENT '用户ID',
  `username` char(16) NOT NULL COMMENT '用户名',
  `password` char(32) NOT NULL COMMENT '密码',
  `email` char(32) NOT NULL COMMENT '用户邮箱',
  `mobile` char(15) NOT NULL COMMENT '用户手机',
  `reg_time` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '注册时间',
  `reg_ip` bigint(20) NOT NULL DEFAULT '0' COMMENT '注册IP',
  `last_login_time` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '最后登录时间',
  `last_login_ip` bigint(20) NOT NULL DEFAULT '0' COMMENT '最后登录IP',
  `update_time` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '更新时间',
  `status` tinyint(4) DEFAULT '0' COMMENT '用户状态'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户表';

--
-- 转存表中的数据 `wx_ucenter_member`
--

INSERT INTO `wx_ucenter_member` (`id`, `username`, `password`, `email`, `mobile`, `reg_time`, `reg_ip`, `last_login_time`, `last_login_ip`, `update_time`, `status`) VALUES
(1, 'admin', '491bd28c88e4a91f8e182452da3a8083', '916826526@qq.com', '', 1467276433, 0, 1467338593, 0, 1467276433, 1);

-- --------------------------------------------------------

--
-- 表的结构 `wx_ucenter_setting`
--

CREATE TABLE `wx_ucenter_setting` (
  `id` int(10) UNSIGNED NOT NULL COMMENT '设置ID',
  `type` tinyint(3) UNSIGNED NOT NULL DEFAULT '0' COMMENT '配置类型（1-用户配置）',
  `value` text NOT NULL COMMENT '配置数据'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='设置表';

-- --------------------------------------------------------

--
-- 表的结构 `wx_url`
--

CREATE TABLE `wx_url` (
  `id` int(11) UNSIGNED NOT NULL COMMENT '链接唯一标识',
  `url` char(255) NOT NULL DEFAULT '' COMMENT '链接地址',
  `short` char(100) NOT NULL DEFAULT '' COMMENT '短网址',
  `status` tinyint(2) NOT NULL DEFAULT '2' COMMENT '状态',
  `create_time` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '创建时间'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='链接表';

-- --------------------------------------------------------

--
-- 表的结构 `wx_userdata`
--

CREATE TABLE `wx_userdata` (
  `uid` int(10) UNSIGNED NOT NULL COMMENT '用户id',
  `type` tinyint(3) UNSIGNED NOT NULL COMMENT '类型标识',
  `target_id` int(10) UNSIGNED NOT NULL COMMENT '目标id'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `wx_action`
--
ALTER TABLE `wx_action`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wx_action_log`
--
ALTER TABLE `wx_action_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `action_ip_ix` (`action_ip`),
  ADD KEY `action_id_ix` (`action_id`),
  ADD KEY `user_id_ix` (`user_id`);

--
-- Indexes for table `wx_addons`
--
ALTER TABLE `wx_addons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wx_attachment`
--
ALTER TABLE `wx_attachment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_record_status` (`record_id`,`status`);

--
-- Indexes for table `wx_attribute`
--
ALTER TABLE `wx_attribute`
  ADD PRIMARY KEY (`id`),
  ADD KEY `model_id` (`model_id`);

--
-- Indexes for table `wx_auth_extend`
--
ALTER TABLE `wx_auth_extend`
  ADD UNIQUE KEY `group_extend_type` (`group_id`,`extend_id`,`type`),
  ADD KEY `uid` (`group_id`),
  ADD KEY `group_id` (`extend_id`);

--
-- Indexes for table `wx_auth_group`
--
ALTER TABLE `wx_auth_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wx_auth_group_access`
--
ALTER TABLE `wx_auth_group_access`
  ADD UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  ADD KEY `uid` (`uid`),
  ADD KEY `group_id` (`group_id`);

--
-- Indexes for table `wx_auth_rule`
--
ALTER TABLE `wx_auth_rule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `module` (`module`,`status`,`type`);

--
-- Indexes for table `wx_auto_reply`
--
ALTER TABLE `wx_auto_reply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wx_category`
--
ALTER TABLE `wx_category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uk_name` (`name`),
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `wx_channel`
--
ALTER TABLE `wx_channel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `wx_config`
--
ALTER TABLE `wx_config`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uk_name` (`name`),
  ADD KEY `type` (`type`),
  ADD KEY `group` (`group`);

--
-- Indexes for table `wx_document`
--
ALTER TABLE `wx_document`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_category_status` (`category_id`,`status`),
  ADD KEY `idx_status_type_pid` (`status`,`uid`,`pid`);

--
-- Indexes for table `wx_document_article`
--
ALTER TABLE `wx_document_article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wx_document_download`
--
ALTER TABLE `wx_document_download`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wx_file`
--
ALTER TABLE `wx_file`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uk_md5` (`md5`);

--
-- Indexes for table `wx_hooks`
--
ALTER TABLE `wx_hooks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `wx_member`
--
ALTER TABLE `wx_member`
  ADD PRIMARY KEY (`uid`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `wx_menu`
--
ALTER TABLE `wx_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `wx_model`
--
ALTER TABLE `wx_model`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wx_picture`
--
ALTER TABLE `wx_picture`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wx_ucenter_admin`
--
ALTER TABLE `wx_ucenter_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wx_ucenter_app`
--
ALTER TABLE `wx_ucenter_app`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `wx_ucenter_member`
--
ALTER TABLE `wx_ucenter_member`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `wx_ucenter_setting`
--
ALTER TABLE `wx_ucenter_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wx_url`
--
ALTER TABLE `wx_url`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx_url` (`url`);

--
-- Indexes for table `wx_userdata`
--
ALTER TABLE `wx_userdata`
  ADD UNIQUE KEY `uid` (`uid`,`type`,`target_id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `wx_action`
--
ALTER TABLE `wx_action`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键', AUTO_INCREMENT=12;
--
-- 使用表AUTO_INCREMENT `wx_action_log`
--
ALTER TABLE `wx_action_log`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键', AUTO_INCREMENT=11;
--
-- 使用表AUTO_INCREMENT `wx_addons`
--
ALTER TABLE `wx_addons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键', AUTO_INCREMENT=39;
--
-- 使用表AUTO_INCREMENT `wx_attachment`
--
ALTER TABLE `wx_attachment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `wx_attribute`
--
ALTER TABLE `wx_attribute`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=241;
--
-- 使用表AUTO_INCREMENT `wx_auth_group`
--
ALTER TABLE `wx_auth_group`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '用户组id,自增主键', AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `wx_auth_rule`
--
ALTER TABLE `wx_auth_rule`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '规则id,自增主键', AUTO_INCREMENT=219;
--
-- 使用表AUTO_INCREMENT `wx_auto_reply`
--
ALTER TABLE `wx_auto_reply`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键';
--
-- 使用表AUTO_INCREMENT `wx_category`
--
ALTER TABLE `wx_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '分类ID', AUTO_INCREMENT=39;
--
-- 使用表AUTO_INCREMENT `wx_channel`
--
ALTER TABLE `wx_channel`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '频道ID', AUTO_INCREMENT=4;
--
-- 使用表AUTO_INCREMENT `wx_config`
--
ALTER TABLE `wx_config`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '配置ID', AUTO_INCREMENT=38;
--
-- 使用表AUTO_INCREMENT `wx_document`
--
ALTER TABLE `wx_document`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '文档ID', AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `wx_file`
--
ALTER TABLE `wx_file`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '文件ID';
--
-- 使用表AUTO_INCREMENT `wx_hooks`
--
ALTER TABLE `wx_hooks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键', AUTO_INCREMENT=18;
--
-- 使用表AUTO_INCREMENT `wx_member`
--
ALTER TABLE `wx_member`
  MODIFY `uid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '用户ID', AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `wx_menu`
--
ALTER TABLE `wx_menu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '文档ID', AUTO_INCREMENT=125;
--
-- 使用表AUTO_INCREMENT `wx_model`
--
ALTER TABLE `wx_model`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '模型ID', AUTO_INCREMENT=4;
--
-- 使用表AUTO_INCREMENT `wx_picture`
--
ALTER TABLE `wx_picture`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键id自增';
--
-- 使用表AUTO_INCREMENT `wx_ucenter_admin`
--
ALTER TABLE `wx_ucenter_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '管理员ID';
--
-- 使用表AUTO_INCREMENT `wx_ucenter_app`
--
ALTER TABLE `wx_ucenter_app`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '应用ID';
--
-- 使用表AUTO_INCREMENT `wx_ucenter_member`
--
ALTER TABLE `wx_ucenter_member`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '用户ID', AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `wx_ucenter_setting`
--
ALTER TABLE `wx_ucenter_setting`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '设置ID';
--
-- 使用表AUTO_INCREMENT `wx_url`
--
ALTER TABLE `wx_url`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '链接唯一标识';
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
