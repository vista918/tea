<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html>
  <head>
    <title>评论管理</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
		
<!--    <link href="/onethink/Public/Tea/resources/css/jquery-ui-themes.css" type="text/css" rel="stylesheet"/> -->
    <link href="/onethink/Public/Tea/resources/css/axure_rp_page.css" type="text/css" rel="stylesheet"/>
    <link href="/onethink/Public/Tea/data/styles.css" type="text/css" rel="stylesheet"/>
    <link href="/onethink/Public/Tea/files/评论管理/styles.css" type="text/css" rel="stylesheet"/>
	
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
    <script src="/onethink/Public/Tea/files/评论管理/data.js"></script>
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
			width: 1000,
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
	
  </head>
  <body>
    <div id="base" class="">

      <!-- 销售概况 (矩形) -->
      <div id="u1557" class="ax_default _形状" data-label="销售概况">
        <div id="u1557_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u1558" class="text" style="visibility: visible;">
          <p><span style="font-family:'应用字体 Regular', '应用字体';">评论管理</span></p>
        </div>
      </div>

      <!-- 销售概况 (矩形) -->
      <div id="u1559" class="ax_default _形状" data-label="销售概况">
        <div id="u1559_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u1560" class="text" style="visibility: visible;">
          <p><span style="font-family:'应用字体 Regular', '应用字体';">财务管理</span></p>
        </div>
      </div>

      

      <!-- Unnamed (导航) -->

      <!-- Unnamed (组合) -->
      <div id="u1615" class="ax_default">

        <!-- Unnamed (矩形) -->
        <div id="u1616" class="ax_default _形状">
          <div id="u1616_div" class=""></div>
          <!-- Unnamed () -->
          <div id="u1617" class="text" style="display: none; visibility: hidden">
            <p><span style="font-family:'应用字体 Regular', '应用字体';"></span></p>
          </div>
        </div>

        <!-- 销售概况 (矩形) -->
        <div id="u1618" class="ax_default _形状" data-label="销售概况">
          <div id="u1618_div" class=""></div>
          <!-- Unnamed () -->
          <div id="u1619" class="text" style="visibility: visible;">
            <p><span style="font-family:'应用字体 Regular', '应用字体';">销售概况</span></p>
          </div>
        </div>

        <!-- 订单管理 (矩形) -->
        <div id="u1620" class="ax_default _形状" data-label="订单管理">
          <div id="u1620_div" class=""></div>
          <!-- Unnamed () -->
          <div id="u1621" class="text" style="visibility: visible;">
            <p><span style="font-family:'应用字体 Regular', '应用字体';">订单管理</span></p>
          </div>
        </div>

        <!-- 商品管理 (矩形) -->
        <div id="u1622" class="ax_default _形状" data-label="商品管理">
          <div id="u1622_div" class=""></div>
          <!-- Unnamed () -->
          <div id="u1623" class="text" style="visibility: visible;">
            <p><span style="font-family:'应用字体 Regular', '应用字体';">商品管理</span></p>
          </div>
        </div>

        <!-- 财务管理 (矩形) -->
        <div id="u1624" class="ax_default _形状" data-label="财务管理">
          <div id="u1624_div" class=""></div>
          <!-- Unnamed () -->
          <div id="u1625" class="text" style="visibility: visible;">
            <p><span style="font-family:'应用字体 Regular', '应用字体';">财务管理</span></p>
          </div>
        </div>

        <!-- 客户管理 (矩形) -->
        <div id="u1626" class="ax_default _形状" data-label="客户管理">
          <div id="u1626_div" class=""></div>
          <!-- Unnamed () -->
          <div id="u1627" class="text" style="visibility: visible;">
            <p><span style="font-family:'应用字体 Regular', '应用字体';">客户管理</span></p>
          </div>
        </div>

        <!-- 评论管理 (矩形) -->
        <div id="u1628" class="ax_default _形状" data-label="评论管理">
          <div id="u1628_div" class=""></div>
          <!-- Unnamed () -->
          <div id="u1629" class="text" style="visibility: visible;">
            <p><span style="font-family:'应用字体 Regular', '应用字体';">评论管理</span></p>
          </div>
        </div>

        <!-- 评论管理 (矩形) -->
        <div id="u1630" class="ax_default _形状" data-label="评论管理">
          <div id="u1630_div" class=""></div>
          <!-- Unnamed () -->
          <div id="u1631" class="text" style="visibility: visible;">
            <p><span style="font-family:'应用字体 Regular', '应用字体';">优惠码管理</span></p>
          </div>
        </div>
      </div>

      <!-- Unnamed (矩形) -->
      <div id="u1632" class="ax_default _形状">
        <div id="u1632_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u1633" class="text" style="display: none; visibility: hidden">
          <p><span style="font-family:'应用字体 Regular', '应用字体';"></span></p>
        </div>
      </div>

      <!-- Unnamed (矩形) -->
      <div id="u1634" class="ax_default _文本段落">
        <div id="u1634_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u1635" class="text" style="visibility: visible;">
          <p><span style="font-family:'应用字体 Regular', '应用字体';">初意古茶商城后台管理系统</span></p>
        </div>
      </div>

      <!-- Unnamed (组合) -->
      <div id="u1636" class="ax_default">

        <!-- Unnamed (图片) -->
        <div id="u1637" class="ax_default _图片">
          <img id="u1637_img" class="img " src="images/初意古茶商城后台管理系统/u30.png"/>
          <!-- Unnamed () -->
          <div id="u1638" class="text" style="display: none; visibility: hidden">
            <p><span style="font-family:'应用字体 Regular', '应用字体';"></span></p>
          </div>
        </div>

        <!-- Unnamed (椭圆形) -->
        <div id="u1639" class="ax_default _流程形状">
          <img id="u1639_img" class="img " src="images/初意古茶商城后台管理系统/u32.png"/>
          <!-- Unnamed () -->
          <div id="u1640" class="text" style="visibility: visible;">
            <p><span style="font-family:'应用字体 Regular', '应用字体';">3</span></p>
          </div>
        </div>

        <!-- Unnamed (椭圆形) [footnote] -->
        <div id="u1639_ann" class="annotation"></div>

        <!-- 消息 (动态面板) -->
        <div id="u1641" class="ax_default ax_default_hidden" data-label="消息" style="display: none; visibility: hidden">
          <div id="u1641_state0" class="panel_state" data-label="消息列表">
            <div id="u1641_state0_content" class="panel_state_content">

              <!-- Unnamed (矩形) -->
              <div id="u1642" class="ax_default _形状">
                <div id="u1642_div" class=""></div>
                <!-- Unnamed () -->
                <div id="u1643" class="text" style="visibility: visible;">
                  <p><span style="font-family:'应用字体 Regular', '应用字体';">您有3条未读消息</span></p>
                </div>
              </div>

              <!-- 消息1 (矩形) -->
              <div id="u1644" class="ax_default _形状" data-label="消息1">
                <div id="u1644_div" class=""></div>
                <!-- Unnamed () -->
                <div id="u1645" class="text" style="visibility: visible;">
                  <p><span style="font-family:'应用字体 Regular', '应用字体';">新订单*2</span></p>
                </div>
              </div>

              <!-- 消息1 (矩形) [footnote] -->
              <div id="u1644_ann" class="annotation"></div>

              <!-- 消息2 (矩形) -->
              <div id="u1646" class="ax_default _形状" data-label="消息2">
                <div id="u1646_div" class=""></div>
                <!-- Unnamed () -->
                <div id="u1647" class="text" style="visibility: visible;">
                  <p><span style="font-family:'应用字体 Regular', '应用字体';">取消交易申请*1</span></p>
                </div>
              </div>

              <!-- 消息2 (矩形) [footnote] -->
              <div id="u1646_ann" class="annotation"></div>

              <!-- 消息3 (矩形) -->
              <div id="u1648" class="ax_default _形状" data-label="消息3">
                <div id="u1648_div" class=""></div>
                <!-- Unnamed () -->
                <div id="u1649" class="text" style="visibility: visible;">
                  <p><span style="font-family:'应用字体 Regular', '应用字体';">提现申请*1</span></p>
                </div>
              </div>

              <!-- 消息3 (矩形) [footnote] -->
              <div id="u1648_ann" class="annotation"></div>
            </div>
          </div>
        </div>
      </div>

      <!-- Unnamed (组合) -->
      <div id="u1650" class="ax_default">

        <!-- Unnamed (图片) -->
        <div id="u1651" class="ax_default _图片">
          <img id="u1651_img" class="img " src="images/初意古茶商城后台管理系统/u44.png"/>
          <!-- Unnamed () -->
          <div id="u1652" class="text" style="display: none; visibility: hidden">
            <p><span style="font-family:'应用字体 Regular', '应用字体';"></span></p>
          </div>
        </div>

        <!-- Unnamed (矩形) -->
        <div id="u1653" class="ax_default _文本段落">
          <div id="u1653_div" class=""></div>
          <!-- Unnamed () -->
          <div id="u1654" class="text" style="visibility: visible;">
            <p style="font-size:14px;"><span style="font-family:'应用字体 Regular', '应用字体';">admin</span><span style="font-family:'应用字体 Regular', '应用字体';font-size:13px;"> </span></p>
          </div>
        </div>

        <!-- Unnamed (矩形) -->
        <div id="u1655" class="ax_default _文本段落">
          <div id="u1655_div" class=""></div>
          <!-- Unnamed () -->
          <div id="u1656" class="text" style="visibility: visible;">
            <p><span style="font-family:'应用字体 Regular', '应用字体';">▼</span></p>
          </div>
        </div>

        <!-- Unnamed (动态面板) -->
        <div id="u1657" class="ax_default">
          <div id="u1657_state0" class="panel_state" data-label="点击前1">
            <div id="u1657_state0_content" class="panel_state_content">
            </div>
          </div>
          <div id="u1657_state1" class="panel_state" data-label="点击后2">
            <div id="u1657_state1_content" class="panel_state_content">

              <!-- Unnamed (组合) -->
              <div id="u1658" class="ax_default">

                <!-- Unnamed (矩形) -->
                <div id="u1659" class="ax_default _形状">
                  <div id="u1659_div" class=""></div>
                  <!-- Unnamed () -->
                  <div id="u1660" class="text" style="visibility: visible;">
                    <p><span style="font-family:'应用字体 Regular', '应用字体';">退出</span></p>
                  </div>
                </div>

                <!-- Unnamed (矩形) -->
                <div id="u1661" class="ax_default _形状">
                  <div id="u1661_div" class=""></div>
                  <!-- Unnamed () -->
                  <div id="u1662" class="text" style="visibility: visible;">
                    <p><span style="font-family:'应用字体 Regular', '应用字体';">设置</span></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- 销售概况 (矩形) -->
      <div id="u1663" class="ax_default _形状" data-label="销售概况">
        <div id="u1663_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u1664" class="text" style="visibility: visible;">
          <p><span style="font-family:'应用字体 Regular', '应用字体';">评论管理</span></p>
        </div>
      </div>

      	  
		<div id="grid_array" class = "gridcss" style="margin:100px;"></div> 
		<!--<div id="container" class = "gridcss" style="margin:100px;"></div> -->
		
    </div>
  </body>
</html>