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
	.pq-grid div.pq-tabs
	{
		width:650px;    
	}    
	.pq-grid div.pq-tabs *
	{
		white-space:normal;    
	}
	.pq-grid p
	{
		margin:10px;
	}
	.pq-grid .pq-tabs b
	{
		font-weight:bold;
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

           	
	<div id="grid_md" style="margin:5px auto;"></div>

	<!--script tag used to define detail template-->
	<script type="text/pq-template" id="tmpl">
		<div class="pq-tabs" style="width:700px;">
			<ul>
				<li><a href="#tabs-1">Address</a></li>
				<li><a href="#tabs-2">Products</a></li>            
				<li><a href="#tabs-3">Dates</a></li>
			</ul>
			<div id="tabs-1">
				<p><b>Shipping Address:</b> <#=ShipAddress#></p>
				<p><b>Shipping City:</b> <#=ShipCity#></p>
				<p><b>Shipping Region:</b> <#=ShipRegion#></p>
				<p><b>Shipping Postal Code:</b> <#=ShipPostalCode#></p>
			</div>
			<div id="tabs-2">
			</div>
			<div id="tabs-3">
				<p><b>Order Date:</b> <#=OrderDate#></p>
				<p><b>Required Date:</b> <#=RequiredDate#></p>
				<p><b>Shipped Date:</b> <#=ShippedDate#></p>
			</div>
		</div>
	</script>
	<!-- <div id="grid_array" class = "gridcss" ></div>    -->

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
		//document.write(<?php echo ($totalgoods[3]['goodsid']); ?>);
		var datafromcontroller = <?php echo json_encode($totalorder)?>;
		var ordermoneyfromcontroller = <?php echo json_encode($ordermoney)?>;
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
			data[i][0] = "订单编号："+(datafromcontroller[i].orderid)+" 下单时间："+newDate.format('yyyy-MM-dd hh:mm:ss');
			data[i][1] = typeStr[datafromcontroller[i].type];
			data[i][2] = 0;
			data[i][3] = datafromcontroller[i].couponid;
			data[i][4] = ordermoneyfromcontroller[i];
			data[i][5] = datafromcontroller[i].buyerid;
			data[i][6] = statusStr[datafromcontroller[i].status];//验证阶段需要在数据库插入的时候做
			data[i][7] = datafromcontroller[i].deliverymoney;
			data[i][8] = "to be done...";
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
		
		var dateEditor = function (ui) {
            var $cell = ui.$cell,
                rowData = ui.rowData,
                dataIndx = ui.dataIndx,
                cls = ui.cls,
                dc = $.trim(rowData[dataIndx]);
            $cell.css('padding', '0');

            var $inp = $("<input type='text' id = 'datapickerinput' name='" + dataIndx + "' class='" + cls + " pq-date-editor' />")
            .appendTo($cell)
            .val(dc).datepicker({
				regional: "zh" ,
                changeMonth: true,
                changeYear: true,
				showButtonPanel:true,//是否显示按钮面板 
				//yearSuffix: '年', //年的后缀 
				dateFormat: 'yy-mm-dd',//日期格式
				showMonthAfterYear:true,//是否把月放在年的后面 
				//defaultDate: dc,//默认日期
				minDate:'-1Y', //最小日期 
				maxDate:"+1Y +0M +0D",//最大日期 
                onClose: function () {
                    $inp.focus();
                }
            });
            //.focus();
		}
		
        var obj = { 
			width: 1200,
			height: 600,
			title: "订单列表",
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
				{type : "button",label: '新订单', /*style: 'margin:2px 0px;',*/ listeners: [
                        { "click": function (evt, ui) {
                            //append empty row at the end.                            
                            var rowData = { identify: generateMixed(20) , type : 0, disprice : 20, status : 0,
								discount : 90, starttime: getDateStr(0) , deadline: getDateStr(30), overprice: 100, usetime: '0000-00-00' , user: "" }; //empty row
                            var rowIndx = $grid.pqGrid("addRow", { rowData: rowData });
                            $grid.pqGrid("goToPage", { rowIndx: rowIndx });
                            $grid.pqGrid("editCell", { rowIndx: rowIndx, dataIndx: "type" });
                        }
                        }
                    ], icon: 'ui-icon-plus', cls: 'ui-state-default'},
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
			{ title: "", minWidth: 27, width: 27, type: "detail", resizable: false, editable: false /* no need to mention dataIndx */ },
			{ title: "订单编号",editable: false, width: 100, dataType: "integer", dataIndx:'orderid' , align: "center"},
			{ title: "订单类别", width: 80, dataType: "string" ,dataIndx:'type', align: "center",
				render: function (ui) {
					var rowData = ui.rowData; 
					return typeStr[rowData[ui.dataIndx]];
				},
			},
			{ title: "金额(￥)", editable: false, width: 100, dataType: "float" , dataIndx:'ordermoney', align: "center" },
			{ title: "优惠码", editable: false, width: 200, dataType: "string", dataIndx:'couponidentify', align: "center"},
			{ title: "实付款(￥)", editable: false, width: 80, dataType: "float" , dataIndx:'finalmoney', align: "center" },
			{ title: "客户", width: 120, dataType: "string", dataIndx:'buyername', align: "center"},
			{ title: "状态", width: 80, dataType: "string",  dataIndx:'status' , align: "center" ,
				render: function (ui) {
					var rowData = ui.rowData; 
					return statusStr[rowData[ui.dataIndx]];
				},
			},
			{ title: "物流费", width: 80, dataType: "float", dataIndx:'deliverymoney', align: "center"},
			//{ title: "", editable: false, minWidth: 83, align: "center" , sortable: false, render: function (ui) {
			//	return "<button type='button' class='delete_btn'>Delete</button>";
			//	}
			//}
		];
		
        obj.dataModel = //{ data: data0 };
		{                
			dataType: "JSON",
			location: "remote",
			recIndx: "orderid",
			//url: "/pro/products/get", //for ASP.NET
			url: "<?php echo U('get_grid_data');?>", //for PHP
			getData: function (response) {
				var data = response.data ;				
                //expand the first row
                data[0]['pq_detail'] = { 'show': true };
                //return { curPage: response.curPage, totalRecords: response.totalRecords, data: data };
				return { /*curPage: 1, totalRecords: 1,*/ data: data };
			}
		};
		
		//details grid
        var gridDetailModel = {
            pageModel: { type: "local", rPP: 5, strRpp: "" },
            dataModel: {
				dataType: "JSON",
				location: "remote",
                method: "GET",
                sortIndx: "ogid",
				url: "<?php echo U('get_order_goods');?>", //for PHP
                getData: function (dataJSON) {
                    return { data: dataJSON.data };
                }
            },
            colModel: [
                { title: "----", width: 70, dataIndx: "ogid" },
                { title: "商品编号", width: 70, dataIndx: "goodsid" },
                { title: "商品数量", width: 90, dataType: "integer", dataIndx: "goodscount" },
		    ],
            editable: false,
            /*groupModel: {
                dataIndx: ["ogid"],
                dir: ["up"],
                title: ["product(s)"],
                icon: [["ui-icon-triangle-1-se", "ui-icon-triangle-1-e"]]
            },*/
            flexHeight: true,
            width: "100%",
            numberCell: { show: false },
            showTop: false,
            showBottom: false
        };
		
		console.trace(gridDetailModel);
		
		obj.detailModel = { init: function (ui) {
                //debugger;                
                var rowData = ui.rowData,
                    orderid = ui.rowData["orderid"],
                //get markup of the detail template.
                    $tmpl = $("#tmpl"),
                    html = $tmpl.html();
				//	console.trace(html);
				//	console.trace(rowData);
                for (var key in rowData) {
                    var cellData = (rowData[key] == null) ? "" : rowData[key];
                    html = html.replace("<#=" + key + "#>", cellData);
                }
				//	console.trace(html);
                //create detail place holder
                var $detail = $("<div></div>");
                $detail.html(html);
                $detail.find(".pq-tabs").tabs().on("tabsactivate", function (evt, ui) {
                    if (ui.newPanel.is("#tabs-2")) {
                        $grid.pqGrid("refresh");
                    }
                });

                //make a deep copy of gridDetailModel
                var objCopy = $.extend(true, {}, gridDetailModel);

                //objCopy.dataModel.url = "/pro/orderdetails/get?orderId=" + orderid;
                //objCopy.dataModel.url = "/pro/orderdetails.php?orderId=" + orderID;//for PHP
				//objCopy.dataModel.url = "<?php echo U('get_order_goods');?>";//+"?orderid="+orderid;

                //append pqGrid in the 2nd tab.
                var $grid = $("<div></div>").appendTo($("#tabs-2", $detail)).pqGrid(objCopy);

                return $detail;
            }
		};	
		
		
        var $grid = $("div#grid_md").pqGrid(obj);
        var grid = $grid.data("paramquery-pqGrid");		//这里要注意一下官方的demo是错误的
		//var grid = $grid.data();
		//console.trace(grid);		
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