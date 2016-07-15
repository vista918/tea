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
		/*
		var datafromcontroller = <?php echo json_encode($totalgoods)?>;
		//console.trace(datafromcontroller.length);
		var countofgoods = datafromcontroller.length;// count(<?php echo ($totalgoods); ?>);
		var data = new Array(countofgoods);
		for(i = 0 ; i < countofgoods; ++i)
		{
			data[i] = new Array();			
			data[i][0] = datafromcontroller[i].goodsid;
			data[i][1] = datafromcontroller[i].name;
			data[i][2] = datafromcontroller[i].curprice;
			data[i][3] = datafromcontroller[i].stock;
			data[i][4] = datafromcontroller[i].sales;
			var newDate = new Date();
			newDate.setTime(datafromcontroller[i].createtime*1000);
			data[i][5] = newDate.format('yyyy-MM-dd hh:mm:ss');
			data[i][6] = statusStr[datafromcontroller[i].status];//验证阶段需要在数据库插入的时候做
			data[i][7] = datafromcontroller[i].priority;
			data[i][8] = 0;
		}*/
		var statusStr = ['已上架','待下架','已下架'];
		
		var ajaxObj = {
            dataType: "json",
            url: "<?php echo U('grid');?>", //for PHP
            //contentType: "application/json; charset=utf-8",//for ASP.NET
            type: "POST",
            async: true,
            beforeSend: function (jqXHR, settings) {                
                $grid.pqGrid("showLoading");
            }
        };

        //called when accept changes button is clicked.
        function acceptChanges() {
            //attempt to save editing cell.
            //debugger;
            if (grid.saveEditCell() === false) {
                return false;
            }
            var isDirty = grid.isDirty();
			//	console.trace(isDirty);
            if (isDirty) {
                //validate the new added rows.                
                var addList = grid.getChanges().addList;
                for (var i = 0; i < addList.length; i++) {
                    var rowData = addList[i];
                    var isValid = grid.isValid({ "rowData": rowData }).valid;
                    if (!isValid) {
                        return;
                    }
                }
				
                var changes = grid.getChanges({ format: "byVal" });
				//console.trace(changes);

                //post changes to server 
                $.ajax({
                    dataType: "json",
                    type: "POST",
                    async: true,
                    beforeSend: function (jqXHR, settings) {
                        grid.showLoading();
                    },
                    //url: "/pro/products/batch", //for ASP.NET, java                                                
					url: "<?php echo U('grid');?>",
                    data: { list: JSON.stringify(changes) },
                    success: function (changes) {
                        //debugger;
                        grid.commit({ type: 'add', rows: changes.addList });
                        grid.commit({ type: 'update', rows: changes.updateList });
                        grid.commit({ type: 'delete', rows: changes.deleteList });

                    },
                    complete: function () {
                        grid.hideLoading();
                    }
                });
            }
        }

        var obj = { 
			width: 1200,
			height: 600,
			title: "商品列表",
			resizable:false,
			draggable:false ,
            scrollModel: {
                autoFit: true
            },
            selectionModel: {
                type: 'cell'
            },
            track: true, //to turn on the track changes.
            hoverMode: 'cell',
            editModel: {
				clicksToEdit: 1, 
                saveKey: $.ui.keyCode.ENTER,
                select: false,
                keyUpDown: false,
                cellBorderWidth: 0  
            },
            editor: { type: "textbox" },
            pageModel: { type: "local", rPP: 10, rPPOptions: [10, 20, 50, 100] },
			toolbar:{
				items:[
					{
						type : "button",label: '新商品', /*style: 'margin:2px 0px;',*/ 
						listeners: [
							{ "click": function (evt, ui) {
								//append empty row at the end.                            
								var rowData = { status : 0 }; //empty row
								var rowIndx = $grid.pqGrid("addRow", { rowData: rowData });
								$grid.pqGrid("goToPage", { rowIndx: rowIndx });
								$grid.pqGrid("editCell", { rowIndx: rowIndx, dataIndx: "type" });
								}
							}
						],
						icon: 'ui-icon-plus', cls: 'ui-state-default'
					},
                    { type: 'button', icon: 'ui-icon-disk', label: '提交修改', style: 'margin:0px 5px;', listeners: [
                        { "click": function (evt, ui) {
                            acceptChanges();
                        }
                        }
                    ]
                    },
                    { type: 'button', icon: 'ui-icon-cancel', label: '取消修改', listeners: [
                        { "click": function (evt, ui) {
                            $grid.pqGrid("rollback");
                        }
                        }
                    ]
                    },
                    { type: 'separator' },
                    { type: 'button', icon: 'ui-icon-cart', label: '获得修改', style: 'margin:0px 5px;', listeners: [
                        { "click": function (evt, ui) {
                            var changes = $grid.pqGrid("getChanges");
                            try {
                                console.log(changes);
                            }
                            catch (ex) { }
                            alert("Please see the log of changes in your browser console.");
                        }
                        }
                    ]
                    }
				]
			},
            //save the cell when cell loses focus.
			//save the cell when cell loses focus.
            quitEditMode: function (evt, ui) {                
                if (evt.keyCode != $.ui.keyCode.ESCAPE && evt.keyCode != $.ui.keyCode.TAB) {
                    $grid.pqGrid("saveEditCell");
                }
            },
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
            cellBeforeSave: function (evt, ui) {	
				/*var validObj = $grid.pqGrid("isValid",{rowIndx:ui.rowIndx,dataIndx:ui.dataIndx,value:ui.newVal});				
                if (!validObj.valid) {
                    evt.preventDefault();
                    return false;
                }*/			
				//console.trace(ui.newVal);
				var isValid = grid.isValid(ui);	
				//console.trace(isValid);
                if (!isValid.valid) {
					//console.trace(grid);
					$grid.find(".pq-editor-focus").css({ "border-color": "red" });
                    //evt.preventDefault();
                    return false;
                }				
            }
		};
		
        obj.colModel = 
		[
			//{ title: "商品编号", width: 80, dataType: "integer" , dataIndx: 'goodsid', editable:false, align: "center" },
			{ title: "商品名称", width: 120, dataType: "string"  , dataIndx: 'name', align: "center"},
			{ title: "销售价(￥)", width: 100, dataType: "float", align: "center"  , dataIndx: 'curprice'},
			{ title: "库存", width: 80, dataType: "float", align: "center" , dataIndx: 'stock'},
			{ title: "销量", width: 80, dataType: "float", align: "center"  , dataIndx: 'sales'},
			{ title: "上架时间", width: 160, dataType: "string", align: "center" , dataIndx: 'createtime'},
			{ title: "商品状态", width: 80, dataType: "float", align: "center"  , dataIndx: 'status',
				render: function (ui) {
					var rowData = ui.rowData; 
					return statusStr[rowData[ui.dataIndx]];
				},
			},
			{ title: "优先级", width: 80, dataType: "float", align: "center" , dataIndx: 'priority'},
			{ title: "简介", width: 160, dataType: "string", align: "center" , dataIndx: 'brief',
				editModel: { keyUpDown: true },
				 validations: [
					{ type: 'minLen', value: 1, msg: 'length < 1' },
					{ type: 'maxLen', value: 100, msg: 'length > 100' }
                ],
			},
			{ title: "分类", width: 80, dataType: "float", align: "center"  , dataIndx: 'category'},
			{ title: "单位", width: 80, dataType: "string", align: "center" , dataIndx: 'unit'},
			{ title: "", editable: false, minWidth: 83, align: "center" , sortable: false, render: function (ui) {
				return "<button type='button' class='delete_btn'>Delete</button>";
				}
			}
		];
        obj.dataModel = //{ data: data0 };
		{                
			dataType: "JSON",
			location: "remote",
			recIndx: "goodsid",		//修改与否与此关键字有很大关系
			//url: "/pro/products/get", //for ASP.NET
			url: "<?php echo U('get_grid_data');?>", //for PHP
			getData: function (response) {
				return { data: response.data };
			}
		};
        var $grid = $("#grid_array").pqGrid(obj);
        var grid = $grid.data("paramquery-pqGrid");		//这里要注意一下官方的demo是错误的
		//var grid = $grid.data();
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