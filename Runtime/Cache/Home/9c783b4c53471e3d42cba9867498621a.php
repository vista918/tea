<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html>
  <head>
    <title>优惠券管理</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
		
<!--    <link href="/onethink/Public/Tea/resources/css/jquery-ui-themes.css" type="text/css" rel="stylesheet"/> -->
    <link href="/onethink/Public/Tea/resources/css/axure_rp_page.css" type="text/css" rel="stylesheet"/>
    <link href="/onethink/Public/Tea/data/styles.css" type="text/css" rel="stylesheet"/>
    <link href="/onethink/Public/Tea/files/优惠码管理/styles.css" type="text/css" rel="stylesheet"/>
	
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
    <script src="/onethink/Public/Tea/files/优惠码管理/data.js"></script>
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
		var totalcoupon = <?php echo json_encode($totalcoupon)?>;	//待审核
		var data0 = new Array(totalcoupon.length);
		var typeStr = ['折扣型','金额型'];
		var statusStr = ['未使用','已使用'];
				
		//填充待审核表数据
		for(i = 0 ; i < totalcoupon.length; ++i)
		{
			var newDate = new Date();
			data0[i] = new Array();			
			data0[i][0] = totalcoupon[i].identify;
			data0[i][1] = typeStr[totalcoupon[i].type];
			data0[i][2] = totalcoupon[i].discount;
			data0[i][3] = totalcoupon[i].disprice;
			newDate.setTime(totalcoupon[i].starttime *1000);
			data0[i][4] = newDate.format('yyyy-MM-dd hh:mm:ss');
			newDate.setTime(totalcoupon[i].deadline *1000);
			data0[i][5] = newDate.format('yyyy-MM-dd hh:mm:ss');
			data0[i][6] = statusStr[totalcoupon[i].status];
			newDate.setTime(totalcoupon[i].usetime *1000);
			data0[i][7] = newDate.format('yyyy-MM-dd hh:mm:ss');
			data0[i][8] = totalcoupon[i].overprice;
			data0[i][9] = "";
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
			width: 1000,
			height: 600,
			title: "提现审核列表",
			resizable:false,
			draggable:true ,
			toolbar:{
				items:[
				{type : "button",label: '1', listeners: [{ click: tobeverify }], icon: 'ui-icon-pencil'},
				{type : "button",label: '2', style: 'margin:0px 5px;', listeners: [{ click: verifyed}], icon: 'ui-icon-pencil'},
				{type : "button",label: '3', style: 'margin:0px 5px;', listeners: [{ click: byday}], icon: 'ui-icon-pencil'}
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
			{ title: "优惠码", width: 150, dataType: "string" , align: "center"},
			{ title: "类型", width: 70, dataType: "string" , align: "center"},
			{ title: "优惠折扣", width: 70, dataType: "integer", align: "center"},
			{ title: "优惠金额", width: 70, dataType: "integer", align: "center" },
			{ title: "起用时间", width: 120, dataType: "string", align: "center" },
			{ title: "截止时间", width: 120, dataType: "string", align: "center" },
			{ title: "状态", width: 70, dataType: "string", align: "center" },
			{ title: "使用时间", width: 100, dataType: "string", align: "center" },
			{ title: "起用金额", width: 100, dataType: "string", align: "center" },
			{ title: "使用者", width: 100, dataType: "float", align: "center"},
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
      <div id="u1681" class="ax_default">

        <!-- Unnamed (矩形) -->
        <div id="u1682" class="ax_default _形状">
          <div id="u1682_div" class=""></div>
          <!-- Unnamed () -->
          <div id="u1683" class="text" style="display: none; visibility: hidden">
            <p><span style="font-family:'应用字体 Regular', '应用字体';"></span></p>
          </div>
        </div>

        <!-- 销售概况 (矩形) -->
        <div id="u1684" class="ax_default _形状" data-label="销售概况">
          <div id="u1684_div" class=""></div>
          <!-- Unnamed () -->
          <div id="u1685" class="text" style="visibility: visible;">
            <p><span style="font-family:'应用字体 Regular', '应用字体';">销售概况</span></p>
          </div>
        </div>

        <!-- 订单管理 (矩形) -->
        <div id="u1686" class="ax_default _形状" data-label="订单管理">
          <div id="u1686_div" class=""></div>
          <!-- Unnamed () -->
          <div id="u1687" class="text" style="visibility: visible;">
            <p><span style="font-family:'应用字体 Regular', '应用字体';">订单管理</span></p>
          </div>
        </div>

        <!-- 商品管理 (矩形) -->
        <div id="u1688" class="ax_default _形状" data-label="商品管理">
          <div id="u1688_div" class=""></div>
          <!-- Unnamed () -->
          <div id="u1689" class="text" style="visibility: visible;">
            <p><span style="font-family:'应用字体 Regular', '应用字体';">商品管理</span></p>
          </div>
        </div>

        <!-- 财务管理 (矩形) -->
        <div id="u1690" class="ax_default _形状" data-label="财务管理">
          <div id="u1690_div" class=""></div>
          <!-- Unnamed () -->
          <div id="u1691" class="text" style="visibility: visible;">
            <p><span style="font-family:'应用字体 Regular', '应用字体';">财务管理</span></p>
          </div>
        </div>

        <!-- 客户管理 (矩形) -->
        <div id="u1692" class="ax_default _形状" data-label="客户管理">
          <div id="u1692_div" class=""></div>
          <!-- Unnamed () -->
          <div id="u1693" class="text" style="visibility: visible;">
            <p><span style="font-family:'应用字体 Regular', '应用字体';">客户管理</span></p>
          </div>
        </div>

        <!-- 评论管理 (矩形) -->
        <div id="u1694" class="ax_default _形状" data-label="评论管理">
          <div id="u1694_div" class=""></div>
          <!-- Unnamed () -->
          <div id="u1695" class="text" style="visibility: visible;">
            <p><span style="font-family:'应用字体 Regular', '应用字体';">评论管理</span></p>
          </div>
        </div>

        <!-- 评论管理 (矩形) -->
        <div id="u1696" class="ax_default _形状" data-label="评论管理">
          <div id="u1696_div" class=""></div>
          <!-- Unnamed () -->
          <div id="u1697" class="text" style="visibility: visible;">
            <p><span style="font-family:'应用字体 Regular', '应用字体';">优惠码管理</span></p>
          </div>
        </div>
      </div>

      <!-- Unnamed (矩形) -->
      <div id="u1698" class="ax_default _形状">
        <div id="u1698_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u1699" class="text" style="display: none; visibility: hidden">
          <p><span style="font-family:'应用字体 Regular', '应用字体';"></span></p>
        </div>
      </div>

      <!-- Unnamed (矩形) -->
      <div id="u1700" class="ax_default _文本段落">
        <div id="u1700_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u1701" class="text" style="visibility: visible;">
          <p><span style="font-family:'应用字体 Regular', '应用字体';">初意古茶商城后台管理系统</span></p>
        </div>
      </div>

      <!-- Unnamed (组合) -->
      <div id="u1702" class="ax_default">

        <!-- Unnamed (图片) -->
        <div id="u1703" class="ax_default _图片">
          <img id="u1703_img" class="img " src="images/初意古茶商城后台管理系统/u30.png"/>
          <!-- Unnamed () -->
          <div id="u1704" class="text" style="display: none; visibility: hidden">
            <p><span style="font-family:'应用字体 Regular', '应用字体';"></span></p>
          </div>
        </div>

        <!-- Unnamed (椭圆形) -->
        <div id="u1705" class="ax_default _流程形状">
          <img id="u1705_img" class="img " src="images/初意古茶商城后台管理系统/u32.png"/>
          <!-- Unnamed () -->
          <div id="u1706" class="text" style="visibility: visible;">
            <p><span style="font-family:'应用字体 Regular', '应用字体';">3</span></p>
          </div>
        </div>

        <!-- Unnamed (椭圆形) [footnote] -->
        <div id="u1705_ann" class="annotation"></div>

        <!-- 消息 (动态面板) -->
        <div id="u1707" class="ax_default ax_default_hidden" data-label="消息" style="display: none; visibility: hidden">
          <div id="u1707_state0" class="panel_state" data-label="消息列表">
            <div id="u1707_state0_content" class="panel_state_content">

              <!-- Unnamed (矩形) -->
              <div id="u1708" class="ax_default _形状">
                <div id="u1708_div" class=""></div>
                <!-- Unnamed () -->
                <div id="u1709" class="text" style="visibility: visible;">
                  <p><span style="font-family:'应用字体 Regular', '应用字体';">您有3条未读消息</span></p>
                </div>
              </div>

              <!-- 消息1 (矩形) -->
              <div id="u1710" class="ax_default _形状" data-label="消息1">
                <div id="u1710_div" class=""></div>
                <!-- Unnamed () -->
                <div id="u1711" class="text" style="visibility: visible;">
                  <p><span style="font-family:'应用字体 Regular', '应用字体';">新订单*2</span></p>
                </div>
              </div>

              <!-- 消息1 (矩形) [footnote] -->
              <div id="u1710_ann" class="annotation"></div>

              <!-- 消息2 (矩形) -->
              <div id="u1712" class="ax_default _形状" data-label="消息2">
                <div id="u1712_div" class=""></div>
                <!-- Unnamed () -->
                <div id="u1713" class="text" style="visibility: visible;">
                  <p><span style="font-family:'应用字体 Regular', '应用字体';">取消交易申请*1</span></p>
                </div>
              </div>

              <!-- 消息2 (矩形) [footnote] -->
              <div id="u1712_ann" class="annotation"></div>

              <!-- 消息3 (矩形) -->
              <div id="u1714" class="ax_default _形状" data-label="消息3">
                <div id="u1714_div" class=""></div>
                <!-- Unnamed () -->
                <div id="u1715" class="text" style="visibility: visible;">
                  <p><span style="font-family:'应用字体 Regular', '应用字体';">提现申请*1</span></p>
                </div>
              </div>

              <!-- 消息3 (矩形) [footnote] -->
              <div id="u1714_ann" class="annotation"></div>
            </div>
          </div>
        </div>
      </div>

      <!-- Unnamed (组合) -->
      <div id="u1716" class="ax_default">

        <!-- Unnamed (图片) -->
        <div id="u1717" class="ax_default _图片">
          <img id="u1717_img" class="img " src="images/初意古茶商城后台管理系统/u44.png"/>
          <!-- Unnamed () -->
          <div id="u1718" class="text" style="display: none; visibility: hidden">
            <p><span style="font-family:'应用字体 Regular', '应用字体';"></span></p>
          </div>
        </div>

        <!-- Unnamed (矩形) -->
        <div id="u1719" class="ax_default _文本段落">
          <div id="u1719_div" class=""></div>
          <!-- Unnamed () -->
          <div id="u1720" class="text" style="visibility: visible;">
            <p style="font-size:14px;"><span style="font-family:'应用字体 Regular', '应用字体';">admin</span><span style="font-family:'应用字体 Regular', '应用字体';font-size:13px;"> </span></p>
          </div>
        </div>

        <!-- Unnamed (矩形) -->
        <div id="u1721" class="ax_default _文本段落">
          <div id="u1721_div" class=""></div>
          <!-- Unnamed () -->
          <div id="u1722" class="text" style="visibility: visible;">
            <p><span style="font-family:'应用字体 Regular', '应用字体';">▼</span></p>
          </div>
        </div>

        <!-- Unnamed (动态面板) -->
        <div id="u1723" class="ax_default">
          <div id="u1723_state0" class="panel_state" data-label="点击前1">
            <div id="u1723_state0_content" class="panel_state_content">
            </div>
          </div>
          <div id="u1723_state1" class="panel_state" data-label="点击后2">
            <div id="u1723_state1_content" class="panel_state_content">

              <!-- Unnamed (组合) -->
              <div id="u1724" class="ax_default">

                <!-- Unnamed (矩形) -->
                <div id="u1725" class="ax_default _形状">
                  <div id="u1725_div" class=""></div>
                  <!-- Unnamed () -->
                  <div id="u1726" class="text" style="visibility: visible;">
                    <p><span style="font-family:'应用字体 Regular', '应用字体';">退出</span></p>
                  </div>
                </div>

                <!-- Unnamed (矩形) -->
                <div id="u1727" class="ax_default _形状">
                  <div id="u1727_div" class=""></div>
                  <!-- Unnamed () -->
                  <div id="u1728" class="text" style="visibility: visible;">
                    <p><span style="font-family:'应用字体 Regular', '应用字体';">设置</span></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- 销售概况 (矩形) -->
      <div id="u1729" class="ax_default _形状" data-label="销售概况">
        <div id="u1729_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u1730" class="text" style="visibility: visible;">
          <p><span style="font-family:'应用字体 Regular', '应用字体';">优惠码管理</span></p>
        </div>
      </div>

      	  
		<div id="grid_array" class = "gridcss" style="margin:100px;"></div> 
		<!--<div id="container" class = "gridcss" style="margin:100px;"></div> -->
		
    </div>
  </body>
</html>