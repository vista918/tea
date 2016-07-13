<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html>
  <head>
    <title>提现管理</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
		
<!--    <link href="/onethink/Public/Tea/resources/css/jquery-ui-themes.css" type="text/css" rel="stylesheet"/> -->
    <link href="/onethink/Public/Tea/resources/css/axure_rp_page.css" type="text/css" rel="stylesheet"/>
    <link href="/onethink/Public/Tea/data/styles.css" type="text/css" rel="stylesheet"/>
    <link href="/onethink/Public/Tea/files/财务管理/styles.css" type="text/css" rel="stylesheet"/>
	
<!--jQuery dependencies
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/themes/base/jquery-ui.css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>    
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>-->
	<link rel="stylesheet" href="/onethink/Public/static/jquery-ui.css" />
    <script src="/onethink/Public/static/jquery.min.js"></script>    
    <script src="/onethink/Public/static/jquery-ui.min.js"></script>
	
    <link href="/onethink/Public/static/grid-2.0.4/pqgrid.min.css" type="text/css" rel="stylesheet"/>
<!--PQ Grid Office theme-->
    <link rel="stylesheet" href="/onethink/Public/static/grid-2.0.4/themes/office/pqgrid.css" />
	
 <!--   <script src="/onethink/Public/Tea/resources/scripts/jquery-1.7.1.min.js"></script> 
    <script src="/onethink/Public/Tea/resources/scripts/jquery-ui-1.8.10.custom.min.js"></script> -->	
	
	<script src="/onethink/Public/static/highcharts.js"></script>	
	
    <script src="/onethink/Public/Tea/resources/scripts/axure/axQuery.js"></script>
    <script src="/onethink/Public/Tea/resources/scripts/axure/globals.js"></script>
    <script src="/onethink/Public/Tea/resources/scripts/axutils.js"></script>
    <script src="/onethink/Public/Tea/resources/scripts/axure/annotation.js"></script>
    <script src="/onethink/Public/Tea/resources/scripts/axure/axQuery.std.js"></script>
    <script src="/onethink/Public/Tea/resources/scripts/axure/doc.js"></script>
    <script src="/onethink/Public/Tea/data/document.js"></script>
    <script src="/onethink/Public/Tea/resources/scripts/messagecenter.js"></script>
    <script src="/onethink/Public/Tea/resources/scripts/axure/events.js"></script>
    <script src="/onethink/Public/Tea/resources/scripts/axure/recording.js"></script>
    <script src="/onethink/Public/Tea/resources/scripts/axure/action.js"></script>
    <script src="/onethink/Public/Tea/resources/scripts/axure/expr.js"></script>
    <script src="/onethink/Public/Tea/resources/scripts/axure/geometry.js"></script>
    <script src="/onethink/Public/Tea/resources/scripts/axure/flyout.js"></script>
    <script src="/onethink/Public/Tea/resources/scripts/axure/ie.js"></script>
    <script src="/onethink/Public/Tea/resources/scripts/axure/model.js"></script>
    <script src="/onethink/Public/Tea/resources/scripts/axure/repeater.js"></script>
    <script src="/onethink/Public/Tea/resources/scripts/axure/sto.js"></script>
    <script src="/onethink/Public/Tea/resources/scripts/axure/utils.temp.js"></script>
    <script src="/onethink/Public/Tea/resources/scripts/axure/variables.js"></script>
    <script src="/onethink/Public/Tea/resources/scripts/axure/drag.js"></script>
    <script src="/onethink/Public/Tea/resources/scripts/axure/move.js"></script>
    <script src="/onethink/Public/Tea/resources/scripts/axure/visibility.js"></script>
    <script src="/onethink/Public/Tea/resources/scripts/axure/style.js"></script>
    <script src="/onethink/Public/Tea/resources/scripts/axure/adaptive.js"></script>
    <script src="/onethink/Public/Tea/resources/scripts/axure/tree.js"></script>
    <script src="/onethink/Public/Tea/resources/scripts/axure/init.temp.js"></script>
    <script src="/onethink/Public/Tea/files/财务管理/data.js"></script>
    <script src="/onethink/Public/Tea/resources/scripts/axure/legacy.js"></script>
    <script src="/onethink/Public/Tea/resources/scripts/axure/viewer.js"></script>
    <script src="/onethink/Public/Tea/resources/scripts/axure/math.js"></script>
    <script src="/onethink/Public/static/grid-2.0.4/pqgrid.min.js"></script>
    <script type="text/javascript">
		$axure.utils.getTransparentGifPath = function() { return '/onethink/Public/Tea/resources/images/transparent.gif'; };
		$axure.utils.getOtherPath = function() { return '/onethink/Public/Tea/resources/Other.html'; };
		$axure.utils.getReloadPath = function() { return '/onethink/Public/Tea/resources/reload.html'; };	  
    </script>
	
	<style type="text/css">	
	.gridcss {
	  position:absolute;
	  left:238px;
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
	
	<script>
	
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
		var withdrawtobeverify = <?php echo json_encode($withdrawtobeverify)?>;	//待审核
		var withdrawverifyed = <?php echo json_encode($withdrawverifyed)?>;	//已审核
		//console.trace(datafromcontroller.length);
		var countofwithdrawtobeverify = withdrawtobeverify.length;
		var countofwithdrawverifyed = withdrawverifyed.length;
		var data0 = new Array(countofwithdrawtobeverify);
		var data1 = new Array(countofwithdrawverifyed);
		var statusStr = ['待审核','审核通过','审核不通过'];		
		
		var withdrawbyday = <?php echo json_encode($withdrawbyday)?>;	//
		var data2 = new Array(withdrawbyday.length);
		for(i = 0; i < withdrawbyday.length; ++i)
		{
			data2[i] = new Array();
			data2[i][0] = withdrawbyday[i].datetime;
			data2[i][1] = withdrawbyday[i].count;
			data2[i][2] = parseFloat(withdrawbyday[i].summoney);
		}
		
		//填充待审核表数据
		for(i = 0 ; i < countofwithdrawtobeverify; ++i)
		{
			var newDate = new Date();
			data0[i] = new Array();			
			newDate.setTime(withdrawtobeverify[i].applytime*1000);
			data0[i][0] = withdrawtobeverify[i].buyerid;
			data0[i][1] = newDate.format('yyyy-MM-dd hh:mm:ss');
			data0[i][2] = withdrawtobeverify[i].sharecount;
			data0[i][3] = withdrawtobeverify[i].money;
			data0[i][4] = statusStr[withdrawtobeverify[i].status];
		}
		
		//填充已审核表数据
		for(i = 0 ; i < countofwithdrawverifyed; ++i)
		{
			var newDate = new Date();
			data1[i] = new Array();			
			newDate.setTime(withdrawverifyed[i].applytime*1000);
			data1[i][0] = withdrawverifyed[i].buyerid;
			data1[i][1] = newDate.format('yyyy-MM-dd hh:mm:ss');
			data1[i][2] = withdrawverifyed[i].money;
			newDate.setTime(withdrawverifyed[i].approvaltime*1000);			
			data1[i][3] = newDate.format('yyyy-MM-dd hh:mm:ss');
			data1[i][4] = withdrawverifyed[i].approval_id;
		}
		console.trace(data1);
		
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
			width: 1000,
			height: 600,
			title: "提现审核列表",
			resizable:false,
			draggable:true ,
			toolbar:{
				items:[
				{type : "button",label: '待审核', listeners: [{ click: tobeverify }], icon: 'ui-icon-pencil'},
				{type : "button",label: '提现记录', style: 'margin:0px 5px;', listeners: [{ click: verifyed}], icon: 'ui-icon-pencil'},
				{type : "button",label: '提现支出', style: 'margin:0px 5px;', listeners: [{ click: byday}], icon: 'ui-icon-pencil'}
				]
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
		};
        obj.colModel = 
		[
			{ title: "提现人", width: 100, dataType: "string" , align: "center"},
			{ title: "申请提现时间", width: 160, dataType: "string" , align: "center"},
			{ title: "成功分享人数", width: 120, dataType: "string", align: "center" },
			{ title: "申请提现金额（￥）", width: 150, dataType: "float", align: "center"},
			{ title: "提现状态", width: 100, dataType: "string", align: "center" },
			//{ title: "操作", editable: false, minWidth: 83, sortable: false, render: function (ui) {
			//	return "<label bgcolor='#00ff00'><a href='#'>通过</a></label> <label bgcolor='#00ff00'><a href='#'>不通过</a></label>";
			//	}
			//}			
			{ title: "", editable: false, minWidth: 83, sortable: false, render: function (ui) {
				return "<button type='button' class='delete_btn'>Delete</button>";}
			}
		];
        obj.dataModel = { data: data0 };
        $grid = $("#grid_array").pqGrid(obj);
        var grid = $grid.data("paramqueryPqGrid");
		
		//tobeverify
        function tobeverify() {    
			obj.title = "提现审核列表";        
			obj.colModel = [
				{ title: "提现人", width: 100, dataType: "string" , align: "center"},
				{ title: "申请提现时间", width: 160, dataType: "string" , align: "center"},
				{ title: "成功分享人数", width: 120, dataType: "string", align: "center" },
				{ title: "申请提现金额（￥）", width: 150, dataType: "float", align: "center"},
				{ title: "提现状态", width: 100, dataType: "string", align: "center" },	
				{ title: "", editable: false, minWidth: 83, sortable: false, render: function (ui) {
					return "<button type='button' class='delete_btn'>Delete</button>";}
				}
			];
			obj.dataModel = { data: data0 };
			$("#grid_array").pqGrid("destroy");
			$grid = $("#grid_array").pqGrid(obj);
        }
		
        //verifyed
        function verifyed() {
			obj.title = "提现记录列表";
			obj.colModel = 
			[
				{ title: "提现人", width: 100, dataType: "string" , align: "center"},
				{ title: "申请提现时间", width: 160, dataType: "string" , align: "center"},
				{ title: "成功提现金额（￥）", width: 150, dataType: "float", align: "center"},
				{ title: "申请通过时间", width: 160, dataType: "string" , align: "center"},
				{ title: "审核员", width: 100, dataType: "string", align: "center" }
			];
			
			obj.dataModel = { data: data1 };
			
			$("#grid_array").pqGrid("destroy");
			$grid = $("#grid_array").pqGrid(obj);
        }
		
        //delete Row.
        function byday() {
			obj.title = "提现支出列表";
			obj.colModel = 
			[
				{ title: "提现时间", width: 160, dataType: "string" , align: "center"},
				{ title: "提现笔数", width: 160, dataType: "int" , align: "center"},
				{ title: "提现金额（￥）", width: 150, dataType: "float", align: "center"},
			];
			
			obj.dataModel = { data: data2 };
			
			$("#grid_array").pqGrid("destroy");
			$grid = $("#grid_array").pqGrid(obj);
        }
    });        
	</script>
	
  </head>
  <body>
    <div id="base" class="">

      <!-- Unnamed (导航) -->

      <!-- Unnamed (组合) -->
      <div id="u1276" class="ax_default">

        <!-- Unnamed (矩形) -->
        <div id="u1277" class="ax_default _形状">
          <div id="u1277_div" class=""></div>
          <!-- Unnamed () -->
          <div id="u1278" class="text" style="display: none; visibility: hidden">
            <p><span style="font-family:'应用字体 Regular', '应用字体';"></span></p>
          </div>
        </div>

        <!-- 销售概况 (矩形) -->
        <div id="u1279" class="ax_default _形状" data-label="销售概况">
          <div id="u1279_div" class=""></div>
          <!-- Unnamed () -->
          <div id="u1280" class="text" style="visibility: visible;">
            <p><span style="font-family:'应用字体 Regular', '应用字体';">销售概况</span></p>
          </div>
        </div>

        <!-- 订单管理 (矩形) -->
        <div id="u1281" class="ax_default _形状" data-label="订单管理">
          <div id="u1281_div" class=""></div>
          <!-- Unnamed () -->
          <div id="u1282" class="text" style="visibility: visible;">
            <p><span style="font-family:'应用字体 Regular', '应用字体';">订单管理</span></p>
          </div>
        </div>

        <!-- 商品管理 (矩形) -->
        <div id="u1283" class="ax_default _形状" data-label="商品管理">
          <div id="u1283_div" class=""></div>
          <!-- Unnamed () -->
          <div id="u1284" class="text" style="visibility: visible;">
            <p><span style="font-family:'应用字体 Regular', '应用字体';">商品管理</span></p>
          </div>
        </div>

        <!-- 财务管理 (矩形) -->
        <div id="u1285" class="ax_default _形状" data-label="财务管理">
          <div id="u1285_div" class=""></div>
          <!-- Unnamed () -->
          <div id="u1286" class="text" style="visibility: visible;">
            <p><span style="font-family:'应用字体 Regular', '应用字体';">财务管理</span></p>
          </div>
        </div>

        <!-- 客户管理 (矩形) -->
        <div id="u1287" class="ax_default _形状" data-label="客户管理">
          <div id="u1287_div" class=""></div>
          <!-- Unnamed () -->
          <div id="u1288" class="text" style="visibility: visible;">
            <p><span style="font-family:'应用字体 Regular', '应用字体';">客户管理</span></p>
          </div>
        </div>

        <!-- 评论管理 (矩形) -->
        <div id="u1289" class="ax_default _形状" data-label="评论管理">
          <div id="u1289_div" class=""></div>
          <!-- Unnamed () -->
          <div id="u1290" class="text" style="visibility: visible;">
            <p><span style="font-family:'应用字体 Regular', '应用字体';">评论管理</span></p>
          </div>
        </div>

        <!-- 评论管理 (矩形) -->
        <div id="u1291" class="ax_default _形状" data-label="评论管理">
          <div id="u1291_div" class=""></div>
          <!-- Unnamed () -->
          <div id="u1292" class="text" style="visibility: visible;">
            <p><span style="font-family:'应用字体 Regular', '应用字体';">优惠码管理</span></p>
          </div>
        </div>
      </div>

      <!-- Unnamed (矩形) -->
      <div id="u1293" class="ax_default _形状">
        <div id="u1293_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u1294" class="text" style="display: none; visibility: hidden">
          <p><span style="font-family:'应用字体 Regular', '应用字体';"></span></p>
        </div>
      </div>

      <!-- Unnamed (矩形) -->
      <div id="u1295" class="ax_default _文本段落">
        <div id="u1295_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u1296" class="text" style="visibility: visible;">
          <p><span style="font-family:'应用字体 Regular', '应用字体';">初意古茶商城后台管理系统</span></p>
        </div>
      </div>

      <!-- Unnamed (组合) -->
      <div id="u1297" class="ax_default">

        <!-- Unnamed (图片) -->
        <div id="u1298" class="ax_default _图片">
          <img id="u1298_img" class="img " src="/onethink/Public/Tea/images/初意古茶商城后台管理系统/u30.png"/>
          <!-- Unnamed () -->
          <div id="u1299" class="text" style="display: none; visibility: hidden">
            <p><span style="font-family:'应用字体 Regular', '应用字体';"></span></p>
          </div>
        </div>

        <!-- Unnamed (椭圆形) -->
        <div id="u1300" class="ax_default _流程形状">
          <img id="u1300_img" class="img " src="images/初意古茶商城后台管理系统/u32.png"/>
          <!-- Unnamed () -->
          <div id="u1301" class="text" style="visibility: visible;">
            <p><span style="font-family:'应用字体 Regular', '应用字体';">3</span></p>
          </div>
        </div>

        <!-- Unnamed (椭圆形) [footnote] -->
        <div id="u1300_ann" class="annotation"></div>

        <!-- 消息 (动态面板) -->
        <div id="u1302" class="ax_default ax_default_hidden" data-label="消息" style="display: none; visibility: hidden">
          <div id="u1302_state0" class="panel_state" data-label="消息列表">
            <div id="u1302_state0_content" class="panel_state_content">

              <!-- Unnamed (矩形) -->
              <div id="u1303" class="ax_default _形状">
                <div id="u1303_div" class=""></div>
                <!-- Unnamed () -->
                <div id="u1304" class="text" style="visibility: visible;">
                  <p><span style="font-family:'应用字体 Regular', '应用字体';">您有3条未读消息</span></p>
                </div>
              </div>

              <!-- 消息1 (矩形) -->
              <div id="u1305" class="ax_default _形状" data-label="消息1">
                <div id="u1305_div" class=""></div>
                <!-- Unnamed () -->
                <div id="u1306" class="text" style="visibility: visible;">
                  <p><span style="font-family:'应用字体 Regular', '应用字体';">新订单*2</span></p>
                </div>
              </div>

              <!-- 消息1 (矩形) [footnote] -->
              <div id="u1305_ann" class="annotation"></div>

              <!-- 消息2 (矩形) -->
              <div id="u1307" class="ax_default _形状" data-label="消息2">
                <div id="u1307_div" class=""></div>
                <!-- Unnamed () -->
                <div id="u1308" class="text" style="visibility: visible;">
                  <p><span style="font-family:'应用字体 Regular', '应用字体';">取消交易申请*1</span></p>
                </div>
              </div>

              <!-- 消息2 (矩形) [footnote] -->
              <div id="u1307_ann" class="annotation"></div>

              <!-- 消息3 (矩形) -->
              <div id="u1309" class="ax_default _形状" data-label="消息3">
                <div id="u1309_div" class=""></div>
                <!-- Unnamed () -->
                <div id="u1310" class="text" style="visibility: visible;">
                  <p><span style="font-family:'应用字体 Regular', '应用字体';">提现申请*1</span></p>
                </div>
              </div>

              <!-- 消息3 (矩形) [footnote] -->
              <div id="u1309_ann" class="annotation"></div>
            </div>
          </div>
        </div>
      </div>

      <!-- Unnamed (组合) -->
      <div id="u1311" class="ax_default">

        <!-- Unnamed (图片) -->
        <div id="u1312" class="ax_default _图片">
          <img id="u1312_img" class="img " src="/onethink/Public/Tea/images/初意古茶商城后台管理系统/u44.png"/>
          <!-- Unnamed () -->
          <div id="u1313" class="text" style="display: none; visibility: hidden">
            <p><span style="font-family:'应用字体 Regular', '应用字体';"></span></p>
          </div>
        </div>

        <!-- Unnamed (矩形) -->
        <div id="u1314" class="ax_default _文本段落">
          <div id="u1314_div" class=""></div>
          <!-- Unnamed () -->
          <div id="u1315" class="text" style="visibility: visible;">
            <p style="font-size:14px;"><span style="font-family:'应用字体 Regular', '应用字体';">admin</span><span style="font-family:'应用字体 Regular', '应用字体';font-size:13px;"> </span></p>
          </div>
        </div>

        <!-- Unnamed (矩形) -->
        <div id="u1316" class="ax_default _文本段落">
          <div id="u1316_div" class=""></div>
          <!-- Unnamed () -->
          <div id="u1317" class="text" style="visibility: visible;">
            <p><span style="font-family:'应用字体 Regular', '应用字体';">▼</span></p>
          </div>
        </div>

        <!-- Unnamed (动态面板) -->
        <div id="u1318" class="ax_default">
          <div id="u1318_state0" class="panel_state" data-label="点击前1">
            <div id="u1318_state0_content" class="panel_state_content">
            </div>
          </div>
          <div id="u1318_state1" class="panel_state" data-label="点击后2">
            <div id="u1318_state1_content" class="panel_state_content">

              <!-- Unnamed (组合) -->
              <div id="u1319" class="ax_default">

                <!-- Unnamed (矩形) -->
                <div id="u1320" class="ax_default _形状">
                  <div id="u1320_div" class=""></div>
                  <!-- Unnamed () -->
                  <div id="u1321" class="text" style="visibility: visible;">
                    <p><span style="font-family:'应用字体 Regular', '应用字体';">退出</span></p>
                  </div>
                </div>

                <!-- Unnamed (矩形) -->
                <div id="u1322" class="ax_default _形状">
                  <div id="u1322_div" class=""></div>
                  <!-- Unnamed () -->
                  <div id="u1323" class="text" style="visibility: visible;">
                    <p><span style="font-family:'应用字体 Regular', '应用字体';">设置</span></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>      

      <!-- 销售概况 (矩形) -->
      <div id="u1359" class="ax_default _形状" data-label="销售概况">
        <div id="u1359_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u1360" class="text" style="visibility: visible;">
          <p><span style="font-family:'应用字体 Regular', '应用字体';">财务管理</span></p>
        </div>
      </div>
	  
		<div id="grid_array" class = "gridcss" style="margin:100px;"></div> 
		<!--<div id="container" class = "gridcss" style="margin:100px;"></div> -->
		
    </div>
  </body>
</html>