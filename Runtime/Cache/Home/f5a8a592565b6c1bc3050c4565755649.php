<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html>
  <head>
    <title>订单管理</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
		
<!--    <link href="/onethink/Public/Tea/resources/css/jquery-ui-themes.css" type="text/css" rel="stylesheet"/> -->
    <link href="/onethink/Public/Tea/resources/css/axure_rp_page.css" type="text/css" rel="stylesheet"/>
    <link href="/onethink/Public/Tea/data/styles.css" type="text/css" rel="stylesheet"/>
    <link href="/onethink/Public/Tea/files/订单管理/styles.css" type="text/css" rel="stylesheet"/>
	
<!--jQuery dependencies-->
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/themes/base/jquery-ui.css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>    
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
	
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
    <script src="/onethink/Public/Tea/files/订单管理/data.js"></script>
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
			{ title: "商品信息", width: 200, dataType: "string" , align: "center"},
			{ title: "订单类别", width: 80, dataType: "string" , align: "center"},
			{ title: "金额(￥)", width: 100, dataType: "float", align: "center" },
			{ title: "优惠码", width: 80, dataType: "string", align: "center"},
			{ title: "实付款(￥)", width: 80, dataType: "float", align: "center" },
			{ title: "客户", width: 120, dataType: "string", align: "center"},
			{ title: "状态", width: 80, dataType: "string", align: "center" },
			{ title: "物流费", width: 80, dataType: "float", align: "center"},
			{ title: "操作", width: 150, dataType: "string", align: "center"}
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

      <!-- Unnamed (组合) -->
      <div id="u690" class="ax_default">

        <!-- Unnamed (矩形) -->
        <div id="u691" class="ax_default _形状">
          <div id="u691_div" class=""></div>
          <!-- Unnamed () -->
          <div id="u692" class="text" style="display: none; visibility: hidden">
            <p><span style="font-family:'应用字体 Regular', '应用字体';"></span></p>
          </div>
        </div>

        <!-- Unnamed (图片) -->
        <div id="u693" class="ax_default _图片">
          <img id="u693_img" class="img " src="/onethink/Public/Tea/images/商品管理/u356.png"/>
          <!-- Unnamed () -->
          <div id="u694" class="text" style="display: none; visibility: hidden">
            <p><span style="font-family:'应用字体 Regular', '应用字体';"></span></p>
          </div>
        </div>
      </div>
	  
	  
      <!-- Unnamed (组合) -->
      <div id="u863" class="ax_default">

        <!-- Unnamed (文本框) -->
        <div id="u864" class="ax_default _文本框">
          <input id="u864_input" type="text" value="" class="text_sketch"/>
        </div>

        <!-- Unnamed (矩形) -->
        <div id="u865" class="ax_default _形状">
          <div id="u865_div" class=""></div>
          <!-- Unnamed () -->
          <div id="u866" class="text" style="visibility: visible;">
            <p><span style="font-family:'应用字体 Regular', '应用字体';">客户</span></p>
          </div>
        </div>
      </div>

      <!-- Unnamed (组合) -->
      <div id="u695" class="ax_default">

        <!-- Unnamed (文本框) -->
        <div id="u696" class="ax_default _文本框">
          <input id="u696_input" type="text" value="" class="text_sketch"/>
        </div>

        <!-- Unnamed (矩形) -->
        <div id="u697" class="ax_default _形状">
          <div id="u697_div" class=""></div>
          <!-- Unnamed () -->
          <div id="u698" class="text" style="visibility: visible;">
            <p><span style="font-family:'应用字体 Regular', '应用字体';">订单编号</span></p>
          </div>
        </div>
      </div>


      <!-- Unnamed (导航) -->

      <!-- Unnamed (组合) -->
      <div id="u706" class="ax_default">

        <!-- Unnamed (矩形) -->
        <div id="u707" class="ax_default _形状">
          <div id="u707_div" class=""></div>
          <!-- Unnamed () -->
          <div id="u708" class="text" style="display: none; visibility: hidden">
            <p><span style="font-family:'应用字体 Regular', '应用字体';"></span></p>
          </div>
        </div>

        <!-- 销售概况 (矩形) -->
        <div id="u709" class="ax_default _形状" data-label="销售概况">
          <div id="u709_div" class=""></div>
          <!-- Unnamed () -->
          <div id="u710" class="text" style="visibility: visible;">
            <p><span style="font-family:'应用字体 Regular', '应用字体';">销售概况</span></p>
          </div>
        </div>

        <!-- 订单管理 (矩形) -->
        <div id="u711" class="ax_default _形状" data-label="订单管理">
          <div id="u711_div" class=""></div>
          <!-- Unnamed () -->
          <div id="u712" class="text" style="visibility: visible;">
            <p><span style="font-family:'应用字体 Regular', '应用字体';">订单管理</span></p>
          </div>
        </div>

        <!-- 商品管理 (矩形) -->
        <div id="u713" class="ax_default _形状" data-label="商品管理">
          <div id="u713_div" class=""></div>
          <!-- Unnamed () -->
          <div id="u714" class="text" style="visibility: visible;">
            <p><span style="font-family:'应用字体 Regular', '应用字体';">商品管理</span></p>
          </div>
        </div>

        <!-- 财务管理 (矩形) -->
        <div id="u715" class="ax_default _形状" data-label="财务管理">
          <div id="u715_div" class=""></div>
          <!-- Unnamed () -->
          <div id="u716" class="text" style="visibility: visible;">
            <p><span style="font-family:'应用字体 Regular', '应用字体';">财务管理</span></p>
          </div>
        </div>

        <!-- 客户管理 (矩形) -->
        <div id="u717" class="ax_default _形状" data-label="客户管理">
          <div id="u717_div" class=""></div>
          <!-- Unnamed () -->
          <div id="u718" class="text" style="visibility: visible;">
            <p><span style="font-family:'应用字体 Regular', '应用字体';">客户管理</span></p>
          </div>
        </div>

        <!-- 评论管理 (矩形) -->
        <div id="u719" class="ax_default _形状" data-label="评论管理">
          <div id="u719_div" class=""></div>
          <!-- Unnamed () -->
          <div id="u720" class="text" style="visibility: visible;">
            <p><span style="font-family:'应用字体 Regular', '应用字体';">评论管理</span></p>
          </div>
        </div>

        <!-- 评论管理 (矩形) -->
        <div id="u721" class="ax_default _形状" data-label="评论管理">
          <div id="u721_div" class=""></div>
          <!-- Unnamed () -->
          <div id="u722" class="text" style="visibility: visible;">
            <p><span style="font-family:'应用字体 Regular', '应用字体';">优惠码管理</span></p>
          </div>
        </div>
      </div>

      <!-- Unnamed (矩形) -->
      <div id="u723" class="ax_default _形状">
        <div id="u723_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u724" class="text" style="display: none; visibility: hidden">
          <p><span style="font-family:'应用字体 Regular', '应用字体';"></span></p>
        </div>
      </div>

      <!-- Unnamed (矩形) -->
      <div id="u725" class="ax_default _文本段落">
        <div id="u725_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u726" class="text" style="visibility: visible;">
          <p><span style="font-family:'应用字体 Regular', '应用字体';">初意古茶商城后台管理系统</span></p>
        </div>
      </div>

      <!-- Unnamed (组合) -->
      <div id="u727" class="ax_default">

        <!-- Unnamed (图片) -->
        <div id="u728" class="ax_default _图片">
          <img id="u728_img" class="img " src="/onethink/Public/Tea/images/初意古茶商城后台管理系统/u30.png"/>
          <!-- Unnamed () -->
          <div id="u729" class="text" style="display: none; visibility: hidden">
            <p><span style="font-family:'应用字体 Regular', '应用字体';"></span></p>
          </div>
        </div>

        <!-- Unnamed (椭圆形) -->
        <div id="u730" class="ax_default _流程形状">
          <img id="u730_img" class="img " src="/onethink/Public/Tea/images/初意古茶商城后台管理系统/u32.png"/>
          <!-- Unnamed () -->
          <div id="u731" class="text" style="visibility: visible;">
            <p><span style="font-family:'应用字体 Regular', '应用字体';">3</span></p>
          </div>
        </div>

        <!-- Unnamed (椭圆形) [footnote] -->
        <div id="u730_ann" class="annotation"></div>

        <!-- 消息 (动态面板) -->
        <div id="u732" class="ax_default ax_default_hidden" data-label="消息" style="display: none; visibility: hidden">
          <div id="u732_state0" class="panel_state" data-label="消息列表">
            <div id="u732_state0_content" class="panel_state_content">

              <!-- Unnamed (矩形) -->
              <div id="u733" class="ax_default _形状">
                <div id="u733_div" class=""></div>
                <!-- Unnamed () -->
                <div id="u734" class="text" style="visibility: visible;">
                  <p><span style="font-family:'应用字体 Regular', '应用字体';">您有3条未读消息</span></p>
                </div>
              </div>

              <!-- 消息1 (矩形) -->
              <div id="u735" class="ax_default _形状" data-label="消息1">
                <div id="u735_div" class=""></div>
                <!-- Unnamed () -->
                <div id="u736" class="text" style="visibility: visible;">
                  <p><span style="font-family:'应用字体 Regular', '应用字体';">新订单*2</span></p>
                </div>
              </div>

              <!-- 消息1 (矩形) [footnote] -->
              <div id="u735_ann" class="annotation"></div>

              <!-- 消息2 (矩形) -->
              <div id="u737" class="ax_default _形状" data-label="消息2">
                <div id="u737_div" class=""></div>
                <!-- Unnamed () -->
                <div id="u738" class="text" style="visibility: visible;">
                  <p><span style="font-family:'应用字体 Regular', '应用字体';">取消交易申请*1</span></p>
                </div>
              </div>

              <!-- 消息2 (矩形) [footnote] -->
              <div id="u737_ann" class="annotation"></div>

              <!-- 消息3 (矩形) -->
              <div id="u739" class="ax_default _形状" data-label="消息3">
                <div id="u739_div" class=""></div>
                <!-- Unnamed () -->
                <div id="u740" class="text" style="visibility: visible;">
                  <p><span style="font-family:'应用字体 Regular', '应用字体';">提现申请*1</span></p>
                </div>
              </div>

              <!-- 消息3 (矩形) [footnote] -->
              <div id="u739_ann" class="annotation"></div>
            </div>
          </div>
        </div>
      </div>

      <!-- Unnamed (组合) -->
      <div id="u741" class="ax_default">

        <!-- Unnamed (图片) -->
        <div id="u742" class="ax_default _图片">
          <img id="u742_img" class="img " src="/onethink/Public/Tea/images/初意古茶商城后台管理系统/u44.png"/>
          <!-- Unnamed () -->
          <div id="u743" class="text" style="display: none; visibility: hidden">
            <p><span style="font-family:'应用字体 Regular', '应用字体';"></span></p>
          </div>
        </div>

        <!-- Unnamed (矩形) -->
        <div id="u744" class="ax_default _文本段落">
          <div id="u744_div" class=""></div>
          <!-- Unnamed () -->
          <div id="u745" class="text" style="visibility: visible;">
            <p style="font-size:14px;"><span style="font-family:'应用字体 Regular', '应用字体';">admin</span><span style="font-family:'应用字体 Regular', '应用字体';font-size:13px;"> </span></p>
          </div>
        </div>

        <!-- Unnamed (矩形) -->
        <div id="u746" class="ax_default _文本段落">
          <div id="u746_div" class=""></div>
          <!-- Unnamed () -->
          <div id="u747" class="text" style="visibility: visible;">
            <p><span style="font-family:'应用字体 Regular', '应用字体';">▼</span></p>
          </div>
        </div>

        <!-- Unnamed (动态面板) -->
        <div id="u748" class="ax_default">
          <div id="u748_state0" class="panel_state" data-label="点击前1">
            <div id="u748_state0_content" class="panel_state_content">
            </div>
          </div>
          <div id="u748_state1" class="panel_state" data-label="点击后2">
            <div id="u748_state1_content" class="panel_state_content">

              <!-- Unnamed (组合) -->
              <div id="u749" class="ax_default">

                <!-- Unnamed (矩形) -->
                <div id="u750" class="ax_default _形状">
                  <div id="u750_div" class=""></div>
                  <!-- Unnamed () -->
                  <div id="u751" class="text" style="visibility: visible;">
                    <p><span style="font-family:'应用字体 Regular', '应用字体';">退出</span></p>
                  </div>
                </div>

                <!-- Unnamed (矩形) -->
                <div id="u752" class="ax_default _形状">
                  <div id="u752_div" class=""></div>
                  <!-- Unnamed () -->
                  <div id="u753" class="text" style="visibility: visible;">
                    <p><span style="font-family:'应用字体 Regular', '应用字体';">设置</span></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- 销售概况 (矩形) -->
      <div id="u754" class="ax_default _形状" data-label="销售概况">
        <div id="u754_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u755" class="text" style="visibility: visible;">
          <p><span style="font-family:'应用字体 Regular', '应用字体';">订单管理</span></p>
        </div>
      </div>    

      <!-- Unnamed (下拉列表框) -->
      <div id="u879" class="ax_default _下拉列表框">
        <select id="u879_input" class="text_sketch">
          <option value="订单状态">订单状态</option>
          <option value="待发货">待发货</option>
          <option value="已发货">已发货</option>
          <option value="交易完成">交易完成</option>
          <option value="交易取消">交易取消</option>
        </select>
      </div>

      <!-- Unnamed (下拉列表框) -->
      <div id="u880" class="ax_default _下拉列表框">
        <select id="u880_input" class="text_sketch">
          <option value="订单类别">订单类别</option>
          <option value="线上">线上</option>
          <option value="线下">线下</option>
        </select>
      </div>	  
  
		<div id="grid_array" class = "gridcss" style="margin:100px;"></div>   	  
    </div>	
  </body>
</html>