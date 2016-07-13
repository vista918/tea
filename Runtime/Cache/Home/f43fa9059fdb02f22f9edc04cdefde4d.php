<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html>
  <head>
    <title>客户管理</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
		
<!--    <link href="/onethink/Public/Tea/resources/css/jquery-ui-themes.css" type="text/css" rel="stylesheet"/> -->
    <link href="/onethink/Public/Tea/resources/css/axure_rp_page.css" type="text/css" rel="stylesheet"/>
    <link href="/onethink/Public/Tea/data/styles.css" type="text/css" rel="stylesheet"/>
    <link href="/onethink/Public/Tea/files/客户管理/styles.css" type="text/css" rel="stylesheet"/>
	
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
    <script src="/onethink/Public/Tea/files/客户管理/data.js"></script>
    <script src="/onethink/Public/Tea/resources/scripts/axure/legacy.js"></script>
    <script src="/onethink/Public/Tea/resources/scripts/axure/viewer.js"></script>
    <script src="/onethink/Public/Tea/resources/scripts/axure/math.js"></script>
    <script src="/onethink/Public/static/grid-2.0.4/pqgrid.min.js"></script>
    <script type="text/javascript">
		$axure.utils.getTransparentGifPath = function() { return '/onethink/Public/Tea/resources/images/transparent.gif'; };
		$axure.utils.getOtherPath = function() { return '/onethink/Public/Tea/resources/Other.html'; };
		$axure.utils.getReloadPath = function() { return '/onethink/Public/Tea/resources/reload.html'; };	  
    </script>
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
	
	<style type="text/css">	
	.gridcss {
	  position:absolute;
	  left:238px;
	  top:120px;
	}
	</style>
  </head>
  <body>
    <div id="base" class="">

      <!-- Unnamed (矩形) -->
      <div id="u1081" class="ax_default _形状">
        <div id="u1081_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u1082" class="text" style="visibility: visible;">
          <p><span style="font-family:'应用字体 Regular', '应用字体';">导出</span></p>
        </div>
      </div>

      <!-- Unnamed (导航) -->

      <!-- Unnamed (组合) -->
      <div id="u1084" class="ax_default">

        <!-- Unnamed (矩形) -->
        <div id="u1085" class="ax_default _形状">
          <div id="u1085_div" class=""></div>
          <!-- Unnamed () -->
          <div id="u1086" class="text" style="display: none; visibility: hidden">
            <p><span style="font-family:'应用字体 Regular', '应用字体';"></span></p>
          </div>
        </div>

        <!-- 销售概况 (矩形) -->
        <div id="u1087" class="ax_default _形状" data-label="销售概况">
          <div id="u1087_div" class=""></div>
          <!-- Unnamed () -->
          <div id="u1088" class="text" style="visibility: visible;">
            <p><span style="font-family:'应用字体 Regular', '应用字体';">销售概况</span></p>
          </div>
        </div>

        <!-- 订单管理 (矩形) -->
        <div id="u1089" class="ax_default _形状" data-label="订单管理">
          <div id="u1089_div" class=""></div>
          <!-- Unnamed () -->
          <div id="u1090" class="text" style="visibility: visible;">
            <p><span style="font-family:'应用字体 Regular', '应用字体';">订单管理</span></p>
          </div>
        </div>

        <!-- 商品管理 (矩形) -->
        <div id="u1091" class="ax_default _形状" data-label="商品管理">
          <div id="u1091_div" class=""></div>
          <!-- Unnamed () -->
          <div id="u1092" class="text" style="visibility: visible;">
            <p><span style="font-family:'应用字体 Regular', '应用字体';">商品管理</span></p>
          </div>
        </div>

        <!-- 财务管理 (矩形) -->
        <div id="u1093" class="ax_default _形状" data-label="财务管理">
          <div id="u1093_div" class=""></div>
          <!-- Unnamed () -->
          <div id="u1094" class="text" style="visibility: visible;">
            <p><span style="font-family:'应用字体 Regular', '应用字体';">财务管理</span></p>
          </div>
        </div>

        <!-- 客户管理 (矩形) -->
        <div id="u1095" class="ax_default _形状" data-label="客户管理">
          <div id="u1095_div" class=""></div>
          <!-- Unnamed () -->
          <div id="u1096" class="text" style="visibility: visible;">
            <p><span style="font-family:'应用字体 Regular', '应用字体';">客户管理</span></p>
          </div>
        </div>

        <!-- 评论管理 (矩形) -->
        <div id="u1097" class="ax_default _形状" data-label="评论管理">
          <div id="u1097_div" class=""></div>
          <!-- Unnamed () -->
          <div id="u1098" class="text" style="visibility: visible;">
            <p><span style="font-family:'应用字体 Regular', '应用字体';">评论管理</span></p>
          </div>
        </div>

        <!-- 评论管理 (矩形) -->
        <div id="u1099" class="ax_default _形状" data-label="评论管理">
          <div id="u1099_div" class=""></div>
          <!-- Unnamed () -->
          <div id="u1100" class="text" style="visibility: visible;">
            <p><span style="font-family:'应用字体 Regular', '应用字体';">优惠码管理</span></p>
          </div>
        </div>
      </div>

      <!-- Unnamed (矩形) -->
      <div id="u1101" class="ax_default _形状">
        <div id="u1101_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u1102" class="text" style="display: none; visibility: hidden">
          <p><span style="font-family:'应用字体 Regular', '应用字体';"></span></p>
        </div>
      </div>

      <!-- Unnamed (矩形) -->
      <div id="u1103" class="ax_default _文本段落">
        <div id="u1103_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u1104" class="text" style="visibility: visible;">
          <p><span style="font-family:'应用字体 Regular', '应用字体';">初意古茶商城后台管理系统</span></p>
        </div>
      </div>

      <!-- Unnamed (组合) -->
      <div id="u1105" class="ax_default">

        <!-- Unnamed (图片) -->
        <div id="u1106" class="ax_default _图片">
          <img id="u1106_img" class="img " src="/onethink/Public/Tea/images/初意古茶商城后台管理系统/u30.png"/>
          <!-- Unnamed () -->
          <div id="u1107" class="text" style="display: none; visibility: hidden">
            <p><span style="font-family:'应用字体 Regular', '应用字体';"></span></p>
          </div>
        </div>

        <!-- Unnamed (椭圆形) -->
        <div id="u1108" class="ax_default _流程形状">
          <img id="u1108_img" class="img " src="/onethink/Public/Tea/images/初意古茶商城后台管理系统/u32.png"/>
          <!-- Unnamed () -->
          <div id="u1109" class="text" style="visibility: visible;">
            <p><span style="font-family:'应用字体 Regular', '应用字体';">3</span></p>
          </div>
        </div>

        <!-- Unnamed (椭圆形) [footnote] -->
        <div id="u1108_ann" class="annotation"></div>

        <!-- 消息 (动态面板) -->
        <div id="u1110" class="ax_default ax_default_hidden" data-label="消息" style="display: none; visibility: hidden">
          <div id="u1110_state0" class="panel_state" data-label="消息列表">
            <div id="u1110_state0_content" class="panel_state_content">

              <!-- Unnamed (矩形) -->
              <div id="u1111" class="ax_default _形状">
                <div id="u1111_div" class=""></div>
                <!-- Unnamed () -->
                <div id="u1112" class="text" style="visibility: visible;">
                  <p><span style="font-family:'应用字体 Regular', '应用字体';">您有3条未读消息</span></p>
                </div>
              </div>

              <!-- 消息1 (矩形) -->
              <div id="u1113" class="ax_default _形状" data-label="消息1">
                <div id="u1113_div" class=""></div>
                <!-- Unnamed () -->
                <div id="u1114" class="text" style="visibility: visible;">
                  <p><span style="font-family:'应用字体 Regular', '应用字体';">新订单*2</span></p>
                </div>
              </div>

              <!-- 消息1 (矩形) [footnote] -->
              <div id="u1113_ann" class="annotation"></div>

              <!-- 消息2 (矩形) -->
              <div id="u1115" class="ax_default _形状" data-label="消息2">
                <div id="u1115_div" class=""></div>
                <!-- Unnamed () -->
                <div id="u1116" class="text" style="visibility: visible;">
                  <p><span style="font-family:'应用字体 Regular', '应用字体';">取消交易申请*1</span></p>
                </div>
              </div>

              <!-- 消息2 (矩形) [footnote] -->
              <div id="u1115_ann" class="annotation"></div>

              <!-- 消息3 (矩形) -->
              <div id="u1117" class="ax_default _形状" data-label="消息3">
                <div id="u1117_div" class=""></div>
                <!-- Unnamed () -->
                <div id="u1118" class="text" style="visibility: visible;">
                  <p><span style="font-family:'应用字体 Regular', '应用字体';">提现申请*1</span></p>
                </div>
              </div>

              <!-- 消息3 (矩形) [footnote] -->
              <div id="u1117_ann" class="annotation"></div>
            </div>
          </div>
        </div>
      </div>

      <!-- Unnamed (组合) -->
      <div id="u1119" class="ax_default">

        <!-- Unnamed (图片) -->
        <div id="u1120" class="ax_default _图片">
          <img id="u1120_img" class="img " src="/onethink/Public/Tea/images/初意古茶商城后台管理系统/u44.png"/>
          <!-- Unnamed () -->
          <div id="u1121" class="text" style="display: none; visibility: hidden">
            <p><span style="font-family:'应用字体 Regular', '应用字体';"></span></p>
          </div>
        </div>

        <!-- Unnamed (矩形) -->
        <div id="u1122" class="ax_default _文本段落">
          <div id="u1122_div" class=""></div>
          <!-- Unnamed () -->
          <div id="u1123" class="text" style="visibility: visible;">
            <p style="font-size:14px;"><span style="font-family:'应用字体 Regular', '应用字体';">admin</span><span style="font-family:'应用字体 Regular', '应用字体';font-size:13px;"> </span></p>
          </div>
        </div>

        <!-- Unnamed (矩形) -->
        <div id="u1124" class="ax_default _文本段落">
          <div id="u1124_div" class=""></div>
          <!-- Unnamed () -->
          <div id="u1125" class="text" style="visibility: visible;">
            <p><span style="font-family:'应用字体 Regular', '应用字体';">▼</span></p>
          </div>
        </div>

        <!-- Unnamed (动态面板) -->
        <div id="u1126" class="ax_default">
          <div id="u1126_state0" class="panel_state" data-label="点击前1">
            <div id="u1126_state0_content" class="panel_state_content">
            </div>
          </div>
          <div id="u1126_state1" class="panel_state" data-label="点击后2">
            <div id="u1126_state1_content" class="panel_state_content">

              <!-- Unnamed (组合) -->
              <div id="u1127" class="ax_default">

                <!-- Unnamed (矩形) -->
                <div id="u1128" class="ax_default _形状">
                  <div id="u1128_div" class=""></div>
                  <!-- Unnamed () -->
                  <div id="u1129" class="text" style="visibility: visible;">
                    <p><span style="font-family:'应用字体 Regular', '应用字体';">退出</span></p>
                  </div>
                </div>

                <!-- Unnamed (矩形) -->
                <div id="u1130" class="ax_default _形状">
                  <div id="u1130_div" class=""></div>
                  <!-- Unnamed () -->
                  <div id="u1131" class="text" style="visibility: visible;">
                    <p><span style="font-family:'应用字体 Regular', '应用字体';">设置</span></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- 销售概况 (矩形) -->
      <div id="u1132" class="ax_default _形状" data-label="销售概况">
        <div id="u1132_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u1133" class="text" style="visibility: visible;">
          <p><span style="font-family:'应用字体 Regular', '应用字体';">客户管理</span></p>
        </div>
      </div>

      <!-- Unnamed (组合) -->
      <div id="u1134" class="ax_default">

        <!-- Unnamed (矩形) -->
        <div id="u1135" class="ax_default _形状">
          <div id="u1135_div" class=""></div>
          <!-- Unnamed () -->
          <div id="u1136" class="text" style="visibility: visible;">
            <p><span style="font-family:'应用字体 Regular', '应用字体';">客户信息</span></p>
          </div>
        </div>

        <!-- Unnamed (矩形) -->
        <div id="u1137" class="ax_default _形状">
          <div id="u1137_div" class=""></div>
          <!-- Unnamed () -->
          <div id="u1138" class="text" style="visibility: visible;">
            <p><span style="font-family:'应用字体 Regular', '应用字体';">提现记录</span></p>
          </div>
        </div>

        <!-- Unnamed (矩形) -->
        <div id="u1139" class="ax_default _形状">
          <div id="u1139_div" class=""></div>
          <!-- Unnamed () -->
          <div id="u1140" class="text" style="visibility: visible;">
            <p><span style="font-family:'应用字体 Regular', '应用字体';">提现审批</span></p>
          </div>
        </div>
      </div>

      

      <!-- Unnamed (文本框) -->
      <div id="u1265" class="ax_default _文本框">
        <input id="u1265_input" type="date" value="" class="text_sketch"/>
      </div>

      <!-- Unnamed (组合) -->
      <div id="u1266" class="ax_default">

        <!-- Unnamed (矩形) -->
        <div id="u1267" class="ax_default _形状">
          <div id="u1267_div" class=""></div>
          <!-- Unnamed () -->
          <div id="u1268" class="text" style="display: none; visibility: hidden">
            <p><span style="font-family:'应用字体 Regular', '应用字体';"></span></p>
          </div>
        </div>

        <!-- Unnamed (图片) -->
        <div id="u1269" class="ax_default _图片">
          <img id="u1269_img" class="img " src="/onethink/Public/Tea/images/商品管理/u356.png"/>
          <!-- Unnamed () -->
          <div id="u1270" class="text" style="display: none; visibility: hidden">
            <p><span style="font-family:'应用字体 Regular', '应用字体';"></span></p>
          </div>
        </div>
      </div>

      <!-- Unnamed (组合) -->
      <div id="u1271" class="ax_default">

        <!-- Unnamed (文本框) -->
        <div id="u1272" class="ax_default _文本框">
          <input id="u1272_input" type="text" value="" class="text_sketch"/>
        </div>

        <!-- Unnamed (矩形) -->
        <div id="u1273" class="ax_default _形状">
          <div id="u1273_div" class=""></div>
          <!-- Unnamed () -->
          <div id="u1274" class="text" style="visibility: visible;">
            <p><span style="font-family:'应用字体 Regular', '应用字体';">客户</span></p>
          </div>
        </div>
      </div>
	  
		<div id="grid_array" class = "gridcss" style="margin:100px;"></div> 
		
    </div>
  </body>
</html>