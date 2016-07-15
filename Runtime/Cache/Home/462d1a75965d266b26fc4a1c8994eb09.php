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
    <script src="/onethink/Application/Home/Public/js/common.js"></script>
	
	<style type="text/css">	
	.gridcss {
	  position:absolute;
	  left:0px;
	  top:40px;
	}
	button.delete_btn
	{
		margin:-3px 0px;
	}
	tr.pq-row-delete
	{
		text-decoration:line-through;         
	}
	tr.pq-row-delete td
	{
		background-color:pink;   
	}
	</style>


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
		
    $(function () {
		var totaltopic = <?php echo json_encode($totaltopic)?>;	//待审核
		var countoftotaltopic = totaltopic.length;
		var data0 = new Array(countoftotaltopic);
		
		
		for(i = 0; i < countoftotaltopic; ++i)
		{
			var newDate = new Date();	
			newDate.setTime(totaltopic[i].topictime*1000);	
			data0[i] = new Array();		
			
			data0[i][0] = totaltopic[i].goodsid;
			data0[i][1] = totaltopic[i].buyerid;
			data0[i][2] = totaltopic[i].topiccontent;
			data0[i][3] = newDate.format('yyyy-MM-dd hh:mm:ss');
			data0[i][4] = totaltopic[i].isshow;
			data0[i][5] = "";
		}			
			
        function getRowIndx() {
            var arr = $grid.pqGrid("selection", { type: 'row', method: 'getSelection' });
            if (arr && arr.length > 0) {
                return arr[0].rowIndx;                                
            }
            else {
                alert("Select a row.");
                return null;
            }
        }

        var obj = { 
			width: 1200,
			height: 600,
			title: "评论列表",
			resizable:false,
			draggable:true ,
			refresh: function () {
                $("#grid_array").find("button.delete_btn").button({ icons: { primary: 'ui-icon-scissors'} })
                .unbind("click")
                .bind("click", function (evt) {
                    var $tr = $(this).closest("tr");
                    var obj = $grid.pqGrid("getRowIndx", { $tr: $tr });
                    var rowIndx = obj.rowIndx;
                    $grid.pqGrid("addClass", { rowIndx: rowIndx, cls: 'pq-row-delete' });

                    var ans = window.confirm("Are you sure to delete row No " + (rowIndx + 1) + "?");

                    if (ans) {
                        $grid.pqGrid("deleteRow", { rowIndx: rowIndx, effect: true, complete: function () {
                            $grid.pqGrid("removeClass", { rowIndx: rowIndx, cls: 'pq-row-delete' });
                        }
                        });
                    }
                    else {
                        $grid.pqGrid("removeClass", { rowIndx: rowIndx, cls: 'pq-row-delete' });
                    }
                });
            },
		};
        obj.colModel = 
		[
			{ title: "商品信息", width: 100, dataType: "string" , align: "center"},
			{ title: "客户", width: 100, dataType: "string" , align: "center"},
			{ title: "评论内容", width: 200, dataType: "string", align: "center" },
			{ title: "评价时间", width: 150, dataType: "string", align: "center"},
			{ title: "显示", width: 60, dataType: "string", align: "center" },
			{ title: "回复内容", width: 160, dataType: "string", align: "center"},
			{ title: "操作", editable: false, minWidth: 83, sortable: false, render: function (ui) {
				return "<button type='button' class='delete_btn'>Delete</button>";}
			}
		];
        obj.dataModel = { data: data0 };
        $grid = $("#grid_array").pqGrid(obj);
        var grid = $grid.data("paramqueryPqGrid");
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