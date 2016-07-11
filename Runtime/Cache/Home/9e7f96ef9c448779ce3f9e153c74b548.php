<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html>
  <head>
    <title>商品管理</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
		
<!--    <link href="/onethink/Public/Tea/resources/css/jquery-ui-themes.css" type="text/css" rel="stylesheet"/> -->
    <link href="/onethink/Public/Tea/resources/css/axure_rp_page.css" type="text/css" rel="stylesheet"/>
    <link href="/onethink/Public/Tea/data/styles.css" type="text/css" rel="stylesheet"/>
    <link href="/onethink/Public/Tea/files/商品管理/styles.css" type="text/css" rel="stylesheet"/>
	
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
    <script src="/onethink/Public/Tea/files/商品管理/data.js"></script>
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
		var datafromcontroller = <?php echo json_encode($totalgoods)?>;
		//console.trace(datafromcontroller.length);
		var countofgoods = datafromcontroller.length;// count(<?php echo ($totalgoods); ?>);
		var data = new Array(countofgoods);
		var statusStr = ['已上架','待下架','已下架'];
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
		}
		//data[0].push(1, 'Exxon Mobil', '339,938.0', '36,130.0');
		//data[1] = new array();
		//data[1] = [1, 'Exxon Mobil', '339,938.0', '36,130.0'];
        //var data = [[1, 'Exxon Mobil', '339,938.0', '36,130.0'],
        //    [2, 'Wal-Mart Stores', '315,654.0', '11,231.0']];

        var obj = { 
			width: 1000,
			height: 600,
			title: "商品列表",
			resizable:false,
			draggable:false 
		};
		
        obj.colModel = 
		[
			{ title: "商品编号", width: 80, dataType: "integer" },
			{ title: "商品名称", width: 120, dataType: "string" },
			{ title: "销售价(￥)", width: 100, dataType: "float", align: "right" },
			{ title: "库存", width: 80, dataType: "float", align: "right"},
			{ title: "销量", width: 80, dataType: "float", align: "right" },
			{ title: "上架时间", width: 160, dataType: "string", align: "right"},
			{ title: "商品状态", width: 80, dataType: "float", align: "right" },
			{ title: "优先级", width: 80, dataType: "float", align: "right"},
			{ title: "操作", width: 150, dataType: "float", align: "right"}
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
      <div id="u292" class="ax_default _形状">
        <div id="u292_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u293" class="text" style="visibility: visible;">
          <p style="font-size:16px;"><span style="font-family:'应用字体 Bold', '应用字体';font-weight:700;">+</span><span style="font-family:'应用字体 Regular', '应用字体';font-weight:400;font-size:13px;"> 新增商品</span></p>
        </div>
      </div>

      <!-- Unnamed (导航) -->

      <!-- Unnamed (组合) -->
      <div id="u299" class="ax_default">

        <!-- Unnamed (矩形) -->
        <div id="u300" class="ax_default _形状">
          <div id="u300_div" class=""></div>
          <!-- Unnamed () -->
          <div id="u301" class="text" style="display: none; visibility: hidden">
            <p><span style="font-family:'应用字体 Regular', '应用字体';"></span></p>
          </div>
        </div>

        <!-- 销售概况 (矩形) -->
        <div id="u302" class="ax_default _形状" data-label="销售概况">
          <div id="u302_div" class=""></div>
          <!-- Unnamed () -->
          <div id="u303" class="text" style="visibility: visible;">
            <p><span style="font-family:'应用字体 Regular', '应用字体';">销售概况</span></p>
          </div>
        </div>

        <!-- 订单管理 (矩形) -->
        <div id="u304" class="ax_default _形状" data-label="订单管理">
          <div id="u304_div" class=""></div>
          <!-- Unnamed () -->
          <div id="u305" class="text" style="visibility: visible;">
            <p><span style="font-family:'应用字体 Regular', '应用字体';">订单管理</span></p>
          </div>
        </div>

        <!-- 商品管理 (矩形) -->
        <div id="u306" class="ax_default _形状" data-label="商品管理">
          <div id="u306_div" class=""></div>
          <!-- Unnamed () -->
          <div id="u307" class="text" style="visibility: visible;">
            <p><span style="font-family:'应用字体 Regular', '应用字体';">商品管理</span></p>
          </div>
        </div>

        <!-- 财务管理 (矩形) -->
        <div id="u308" class="ax_default _形状" data-label="财务管理">
          <div id="u308_div" class=""></div>
          <!-- Unnamed () -->
          <div id="u309" class="text" style="visibility: visible;">
            <p><span style="font-family:'应用字体 Regular', '应用字体';">财务管理</span></p>
          </div>
        </div>

        <!-- 客户管理 (矩形) -->
        <div id="u310" class="ax_default _形状" data-label="客户管理">
          <div id="u310_div" class=""></div>
          <!-- Unnamed () -->
          <div id="u311" class="text" style="visibility: visible;">
            <p><span style="font-family:'应用字体 Regular', '应用字体';">客户管理</span></p>
          </div>
        </div>

        <!-- 评论管理 (矩形) -->
        <div id="u312" class="ax_default _形状" data-label="评论管理">
          <div id="u312_div" class=""></div>
          <!-- Unnamed () -->
          <div id="u313" class="text" style="visibility: visible;">
            <p><span style="font-family:'应用字体 Regular', '应用字体';">评论管理</span></p>
          </div>
        </div>

        <!-- 评论管理 (矩形) -->
        <div id="u314" class="ax_default _形状" data-label="评论管理">
          <div id="u314_div" class=""></div>
          <!-- Unnamed () -->
          <div id="u315" class="text" style="visibility: visible;">
            <p><span style="font-family:'应用字体 Regular', '应用字体';">优惠码管理</span></p>
          </div>
        </div>
      </div>

      <!-- Unnamed (矩形) -->
      <div id="u316" class="ax_default _形状">
        <div id="u316_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u317" class="text" style="display: none; visibility: hidden">
          <p><span style="font-family:'应用字体 Regular', '应用字体';"></span></p>
        </div>
      </div>

      <!-- Unnamed (矩形) -->
      <div id="u318" class="ax_default _文本段落">
        <div id="u318_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u319" class="text" style="visibility: visible;">
          <p><span style="font-family:'应用字体 Regular', '应用字体';">初意古茶商城后台管理系统</span></p>
        </div>
      </div>

      <!-- Unnamed (组合) -->
      <div id="u320" class="ax_default">

        <!-- Unnamed (图片) -->
        <div id="u321" class="ax_default _图片">
          <img id="u321_img" class="img " src="/onethink/Public/Tea/images/初意古茶商城后台管理系统/u30.png"/>
          <!-- Unnamed () -->
          <div id="u322" class="text" style="display: none; visibility: hidden">
            <p><span style="font-family:'应用字体 Regular', '应用字体';"></span></p>
          </div>
        </div>

        <!-- Unnamed (椭圆形) -->
        <div id="u323" class="ax_default _流程形状">
          <img id="u323_img" class="img " src="/onethink/Public/Tea/images/初意古茶商城后台管理系统/u32.png"/>
          <!-- Unnamed () -->
          <div id="u324" class="text" style="visibility: visible;">
            <p><span style="font-family:'应用字体 Regular', '应用字体';">3</span></p>
          </div>
        </div>

        <!-- Unnamed (椭圆形) [footnote] -->
        <div id="u323_ann" class="annotation"></div>

        <!-- 消息 (动态面板) -->
        <div id="u325" class="ax_default ax_default_hidden" data-label="消息" style="display: none; visibility: hidden">
          <div id="u325_state0" class="panel_state" data-label="消息列表">
            <div id="u325_state0_content" class="panel_state_content">

              <!-- Unnamed (矩形) -->
              <div id="u326" class="ax_default _形状">
                <div id="u326_div" class=""></div>
                <!-- Unnamed () -->
                <div id="u327" class="text" style="visibility: visible;">
                  <p><span style="font-family:'应用字体 Regular', '应用字体';">您有3条未读消息</span></p>
                </div>
              </div>

              <!-- 消息1 (矩形) -->
              <div id="u328" class="ax_default _形状" data-label="消息1">
                <div id="u328_div" class=""></div>
                <!-- Unnamed () -->
                <div id="u329" class="text" style="visibility: visible;">
                  <p><span style="font-family:'应用字体 Regular', '应用字体';">新订单*2</span></p>
                </div>
              </div>

              <!-- 消息1 (矩形) [footnote] -->
              <div id="u328_ann" class="annotation"></div>

              <!-- 消息2 (矩形) -->
              <div id="u330" class="ax_default _形状" data-label="消息2">
                <div id="u330_div" class=""></div>
                <!-- Unnamed () -->
                <div id="u331" class="text" style="visibility: visible;">
                  <p><span style="font-family:'应用字体 Regular', '应用字体';">取消交易申请*1</span></p>
                </div>
              </div>

              <!-- 消息2 (矩形) [footnote] -->
              <div id="u330_ann" class="annotation"></div>

              <!-- 消息3 (矩形) -->
              <div id="u332" class="ax_default _形状" data-label="消息3">
                <div id="u332_div" class=""></div>
                <!-- Unnamed () -->
                <div id="u333" class="text" style="visibility: visible;">
                  <p><span style="font-family:'应用字体 Regular', '应用字体';">提现申请*1</span></p>
                </div>
              </div>

              <!-- 消息3 (矩形) [footnote] -->
              <div id="u332_ann" class="annotation"></div>
            </div>
          </div>
        </div>
      </div>

      <!-- Unnamed (组合) -->
      <div id="u334" class="ax_default">

        <!-- Unnamed (图片) -->
        <div id="u335" class="ax_default _图片">
          <img id="u335_img" class="img " src="/onethink/Public/Tea/images/初意古茶商城后台管理系统/u44.png"/>
          <!-- Unnamed () -->
          <div id="u336" class="text" style="display: none; visibility: hidden">
            <p><span style="font-family:'应用字体 Regular', '应用字体';"></span></p>
          </div>
        </div>

        <!-- Unnamed (矩形) -->
        <div id="u337" class="ax_default _文本段落">
          <div id="u337_div" class=""></div>
          <!-- Unnamed () -->
          <div id="u338" class="text" style="visibility: visible;">
            <p style="font-size:14px;"><span style="font-family:'应用字体 Regular', '应用字体';">admin</span><span style="font-family:'应用字体 Regular', '应用字体';font-size:13px;"> </span></p>
          </div>
        </div>

        <!-- Unnamed (矩形) -->
        <div id="u339" class="ax_default _文本段落">
          <div id="u339_div" class=""></div>
          <!-- Unnamed () -->
          <div id="u340" class="text" style="visibility: visible;">
            <p><span style="font-family:'应用字体 Regular', '应用字体';">▼</span></p>
          </div>
        </div>

        <!-- Unnamed (动态面板) -->
        <div id="u341" class="ax_default">
          <div id="u341_state0" class="panel_state" data-label="点击前1">
            <div id="u341_state0_content" class="panel_state_content">
            </div>
          </div>
          <div id="u341_state1" class="panel_state" data-label="点击后2">
            <div id="u341_state1_content" class="panel_state_content">

              <!-- Unnamed (组合) -->
              <div id="u342" class="ax_default">

                <!-- Unnamed (矩形) -->
                <div id="u343" class="ax_default _形状">
                  <div id="u343_div" class=""></div>
                  <!-- Unnamed () -->
                  <div id="u344" class="text" style="visibility: visible;">
                    <p><span style="font-family:'应用字体 Regular', '应用字体';">退出</span></p>
                  </div>
                </div>

                <!-- Unnamed (矩形) -->
                <div id="u345" class="ax_default _形状">
                  <div id="u345_div" class=""></div>
                  <!-- Unnamed () -->
                  <div id="u346" class="text" style="visibility: visible;">
                    <p><span style="font-family:'应用字体 Regular', '应用字体';">设置</span></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- 销售概况 (矩形) -->
      <div id="u347" class="ax_default _形状" data-label="销售概况">
        <div id="u347_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u348" class="text" style="visibility: visible;">
          <p><span style="font-family:'应用字体 Regular', '应用字体';">商品管理</span></p>
        </div>
      </div>

      <!-- Unnamed (下拉列表框) -->
      <div id="u349" class="ax_default _下拉列表框">
        <select id="u349_input" class="text_sketch">
          <option value="全部商品">全部商品</option>
          <option value="已上架">已上架</option>
          <option value="已下架">已下架</option>
          <option value="待上架">待上架</option>
        </select>
      </div>

      <!-- Unnamed (文本框) -->
      <div id="u350" class="ax_default _文本框">
        <input id="u350_input" type="text" value="" class="text_sketch"/>
      </div>

      <!-- Unnamed (矩形) -->
      <div id="u351" class="ax_default _形状">
        <div id="u351_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u352" class="text" style="visibility: visible;">
          <p><span style="font-family:'应用字体 Regular', '应用字体';">商品名称</span></p>
        </div>
      </div>

      <!-- Unnamed (下拉列表框) -->
      <div id="u377" class="ax_default _下拉列表框">
        <select id="u377_input" class="text_sketch">
          <option value="批量操作">批量操作</option>
          <option value="上架">上架</option>
          <option value="下架">下架</option>
          <option value="删除">删除</option>
        </select>
      </div>

      <!-- Unnamed (文本框) -->
      <div id="u479" class="ax_default _文本框">
        <input id="u479_input" type="date" value="" class="text_sketch"/>
      </div>
	  
      <!-- Unnamed (矩形) -->
      <div id="u480" class="ax_default box_1">
        <div id="u480_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u481" class="text" style="visibility: visible;">
          <p><span style="font-family:'应用字体 Regular', '应用字体';color:#FF0000;">1.列表页显示数量为每页20条；</span></p><p><span style="font-family:'应用字体 Regular', '应用字体';color:#FF0000;">2.优先级一列为商品排序优先级，按数字大小进行排列，数字越大优先级越高，即可以显示到更前的位置；</span></p><p><span style="font-family:'应用字体 Regular', '应用字体';color:#FF0000;">3.选择“上架”操作可将在前端显示商品信息，“下架”操作则将商品从前端页面中删去；</span></p><p><span style="font-family:'应用字体 Regular', '应用字体';color:#FF0000;">4.选择“导出”可导出商品的所有信息；</span></p><p><span style="font-family:'应用字体 Regular', '应用字体';"><br></span></p>
        </div>
      </div>   
	  
		<div id="grid_array" class = "gridcss" style="margin:100px;"></div>   
	  
    </div>	
  </body>
</html>