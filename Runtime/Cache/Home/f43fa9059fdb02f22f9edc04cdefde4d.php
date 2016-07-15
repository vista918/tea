<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
<title><?php echo C('WEB_SITE_TITLE');?></title>
<link href="/onethink/Public/static/bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="/onethink/Public/static/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
<link href="/onethink/Public/static/bootstrap/css/docs.css" rel="stylesheet">
<link href="/onethink/Public/static/bootstrap/css/onethink.css" rel="stylesheet">

<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
<script src="/onethink/Public/static/bootstrap/js/html5shiv.js"></script>
<![endif]-->
	
	<style type="text/css">	
	.gridcss {
	  position:absolute;
	  left:100px;
	  top:40px;
	}
	</style>

<!--[if lt IE 9]>
<script type="text/javascript" src="/onethink/Public/static/jquery-1.10.2.min.js"></script>
<![endif]-->
<!--[if gte IE 9]><!-->
<script type="text/javascript" src="/onethink/Public/static/jquery-2.0.3.min.js"></script>
<script type="text/javascript" src="/onethink/Public/static/bootstrap/js/bootstrap.min.js"></script>
<!--jQuery dependencies
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/themes/base/jquery-ui.css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>    
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
	<link rel="stylesheet" href="/onethink/Public/static/jquery-ui-1.12.0/jquery-ui.css" />
    <script src="/onethink/Public/static/jquery-ui-1.12.0/jquery-ui.min.js"></script>	-->
	<link rel="stylesheet" href="/onethink/Public/static/jquery-ui-1.9.2/themes/base/jquery-ui.css" />
    <script src="/onethink/Public/static/jquery-ui-1.9.2/ui/minified/jquery-ui.min.js"></script>	
    <!--<script src="/onethink/Public/static/jquery.min.js"></script>    -->
	
    <link href="/onethink/Public/static/grid-2.0.4/pqgrid.min.css" type="text/css" rel="stylesheet"/>
<!--PQ Grid Office theme-->
    <link rel="stylesheet" href="/onethink/Public/static/grid-2.0.4/themes/office/pqgrid.css" />
	
    <script src="/onethink/Public/static/grid-2.0.4/pqgrid.min.js"></script>


<!--<![endif]-->
<!-- 页面header钩子，一般用于加载插件CSS文件和代码 -->
<?php echo hook('pageHeader');?>

</head>
<body>
	<!-- 头部 -->
	<!-- 导航条
================================================== -->
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="brand" href="<?php echo U('index/index');?>">初意古茶商城后台管理</a>
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="nav-collapse collapse">
                <ul class="nav">
                    <?php $__NAV__ = M('Channel')->field(true)->where("status=1")->order("sort")->select(); if(is_array($__NAV__)): $i = 0; $__LIST__ = $__NAV__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nav): $mod = ($i % 2 );++$i; if(($nav["pid"]) == "0"): ?><li>
                            <a href="<?php echo (get_nav_url($nav["url"])); ?>" target="<?php if(($nav["target"]) == "1"): ?>_blank<?php else: ?>_self<?php endif; ?>"><?php echo ($nav["title"]); ?></a>
                        </li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
            <div class="nav-collapse collapse pull-right">
                <?php if(is_login()): ?><ul class="nav" style="margin-right:0">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="padding-left:0;padding-right:0"><?php echo get_username();?> <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo U('User/profile');?>">修改密码</a></li>
                                <li><a href="<?php echo U('User/logout');?>">退出</a></li>
                            </ul>
                        </li>
                    </ul>
                <?php else: ?>
                    <ul class="nav" style="margin-right:0">
                        <li>
                            <a href="<?php echo U('User/login');?>">登录</a>
                        </li>
                        <li>
                            <a href="<?php echo U('User/register');?>" style="padding-left:0;padding-right:0">注册</a>
                        </li>
                    </ul><?php endif; ?>
            </div>
        </div>
    </div>
</div>

	<!-- /头部 -->
	
	<!-- 主体 -->
	
<div id="main-container" class="container">
    <div class="row">
        
<!-- 左侧 nav
==================================================
    <div class="span3 bs-docs-sidebar">
        <ul class="nav nav-list bs-docs-sidenav">
            <?php echo W('Category/lists', array(1, true));?>
        </ul>
    </div> -->

           	
	<div id="grid_array" class = "gridcss" ></div>   

    </div>
</div>

<script type="text/javascript">
    $(function(){
        $(window).resize(function(){
            $("#main-container").css("min-height", $(window).height() - 343);
        }).resize();
    })
</script>
	<!-- /主体 -->

	<!-- 底部 -->
	
    <!-- 底部
    ================================================== 
    <footer class="footer">
      <div class="container">
          <p> 本站由 <strong><a href="http://www.onethink.cn" target="_blank">OneThink</a></strong> 强力驱动</p>
      </div>
    </footer>-->

<script type="text/javascript">
(function(){
	var ThinkPHP = window.Think = {
		"ROOT"   : "/onethink", //当前网站地址
		"APP"    : "/onethink/index.php?s=", //当前项目地址
		"PUBLIC" : "/onethink/Public", //项目公共目录地址
		"DEEP"   : "<?php echo C('URL_PATHINFO_DEPR');?>", //PATHINFO分割符
		"MODEL"  : ["<?php echo C('URL_MODEL');?>", "<?php echo C('URL_CASE_INSENSITIVE');?>", "<?php echo C('URL_HTML_SUFFIX');?>"],
		"VAR"    : ["<?php echo C('VAR_MODULE');?>", "<?php echo C('VAR_CONTROLLER');?>", "<?php echo C('VAR_ACTION');?>"]
	}
})();
</script>

    <script type="text/javascript">	  
	// 对Date的扩展，将 Date 转化为指定格式的String
	// 月(M)、日(d)、小时(h)、分(m)、秒(s)、季度(q) 可以用 1-2 个占位符， 
	// 年(y)可以用 1-4 个占位符，毫秒(S)只能用 1 个占位符(是 1-3 位的数字) 
	// 例子： 
	// (new Date()).Format("yyyy-MM-dd hh:mm:ss.S") ==> 2006-07-02 08:09:04.423 
	// (new Date()).Format("yyyy-M-d h:m:s.S")      ==> 2006-7-2 8:9:4.18 
	Date.prototype.format = function (fmt) { //author: meizz 
		var o = {
			"M+": this.getMonth() + 1, //月份 
			"d+": this.getDate(), //日 
			"h+": this.getHours(), //小时 
			"m+": this.getMinutes(), //分 
			"s+": this.getSeconds(), //秒 
			"q+": Math.floor((this.getMonth() + 3) / 3), //季度 
			"S": this.getMilliseconds() //毫秒 
		};
		if (/(y+)/.test(fmt)) fmt = fmt.replace(RegExp.$1, (this.getFullYear() + "").substr(4 - RegExp.$1.length));
		for (var k in o)
		if (new RegExp("(" + k + ")").test(fmt)) fmt = fmt.replace(RegExp.$1, (RegExp.$1.length == 1) ? (o[k]) : (("00" + o[k]).substr(("" + o[k]).length)));
		return fmt;
	}
	
    $(function () {
		//document.write(<?php echo ($totalgoods[3]['goodsid']); ?>);
		var datafromcontroller = <?php echo json_encode($totalbuyer)?>;
		//console.trace(datafromcontroller.length);
		var countoforder = datafromcontroller.length;// count(<?php echo ($totalgoods); ?>);
		var data = new Array(countoforder);
		var typeStr = ['线上','线下'];
		var statusStr = ['等待付款','等待发货','发货中','已收货待确认收货','确认收货待评价','已确认评价'];
		for(i = 0 ; i < countoforder; ++i)
		{
			var newDate = new Date();
			data[i] = new Array();			
			newDate.setTime(datafromcontroller[i].createtime*1000);
			data[i][0] = datafromcontroller[i].name;
			data[i][1] = datafromcontroller[i].phone;
			data[i][2] = datafromcontroller[i].address;
			data[i][3] = 0;
			data[i][4] = datafromcontroller[i].gold;
			data[i][5] = datafromcontroller[i].level;
		}
		//data[0].push(1, 'Exxon Mobil', '339,938.0', '36,130.0');
		//data[1] = new array();
		//data[1] = [1, 'Exxon Mobil', '339,938.0', '36,130.0'];
        //var data = [[1, 'Exxon Mobil', '339,938.0', '36,130.0'],
        //    [2, 'Wal-Mart Stores', '315,654.0', '11,231.0']];

        var obj = { 
			width: 1000,
			height: 600,
			title: "订单列表",
			resizable:false,
			draggable:false 
		};
		
        obj.colModel = 
		[
			{ title: "姓名", width: 140, dataType: "string" , align: "center"},
			{ title: "联系方式", width: 120, dataType: "string" , align: "center"},
			{ title: "收货地址", width: 100, dataType: "string", align: "center" },
			{ title: "成交订单数", width: 80, dataType: "integer", align: "center"},
			{ title: "金币数", width: 80, dataType: "integer", align: "center" },
			{ title: "账号等级", width: 120, dataType: "string", align: "center"},
		];
        obj.dataModel = { data: data };
        $("#grid_array").pqGrid(obj);

    });       
    </script>
 <!-- 用于加载js代码 -->
<!-- 页面footer钩子，一般用于加载插件JS文件和JS代码 -->
<?php echo hook('pageFooter', 'widget');?>
<div class="hidden"><!-- 用于加载统计代码等隐藏元素 -->
	
</div>

	<!-- /底部 -->
</body>
</html>