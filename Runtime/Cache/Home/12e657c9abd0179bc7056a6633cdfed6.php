<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html>
  <head>
    <title>初意古茶商城后台管理系统</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <link href="/onethink/Public/Tea/resources/css/jquery-ui-themes.css" type="text/css" rel="stylesheet"/>
    <link href="/onethink/Public/Tea/resources/css/axure_rp_page.css" type="text/css" rel="stylesheet"/>
    <link href="/onethink/Public/Tea/data/styles.css" type="text/css" rel="stylesheet"/>
    <link href="/onethink/Public/Tea/files/初意古茶商城后台管理系统/styles.css" type="text/css" rel="stylesheet"/>	
    <script src="/onethink/Public/Tea/resources/scripts/jquery-1.7.1.min.js"></script>
	<script src="/onethink/Public/static/highcharts.js"></script>
    <script src="/onethink/Public/Tea/resources/scripts/jquery-ui-1.8.10.custom.min.js"></script>
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
    <script src="/onethink/Public/Tea/files/初意古茶商城后台管理系统/data.js"></script>
    <script src="/onethink/Public/Tea/resources/scripts/axure/legacy.js"></script>
    <script src="/onethink/Public/Tea/resources/scripts/axure/viewer.js"></script>
    <script src="/onethink/Public/Tea/resources/scripts/axure/math.js"></script>
    <script type="text/javascript">
      $axure.utils.getTransparentGifPath = function() { return '/onethink/Public/Tea/resources/images/transparent.gif'; };
      $axure.utils.getOtherPath = function() { return '/onethink/Public/Tea/resources/Other.html'; };
      $axure.utils.getReloadPath = function() { return '/onethink/Public/Tea/resources/reload.html'; };
	  
		var days = new Array()
		var today = new Date();

		function GetDateStr(AddDayCount) { 
			var dd = new Date(); 
			dd.setDate(dd.getDate()-AddDayCount);
			var y = dd.getFullYear(); 
			var m = dd.getMonth()+1;//获取当前月份的日期 
			var d = dd.getDate(); 
			return y+"."+m+"."+d; 
		}

		for (i=0;i<7;++i)
		{
			days[i] = GetDateStr(i+1);
		}
		
		$(function() {
			$('#container').highcharts({
				chart: {
					type: 'line'
				},

				title: {
					text: '近7天订单数'
				},

				xAxis: {					
					title: {
					text: '日期'
					},
					categories: [days[6],days[5],days[4],days[3],days[2],days[1],days[0]]
				},


				yAxis: {			
					title: {
					text: '订单数'
					},
		          tickInterval: 1,
				  //maxTickInterval:10,
				  minTickInterval:0, //刻度上允许显示的最小值
				},

				series: [{				
					name: 'order count',
					data: [<?php echo ($OrderCountRecentWeek[6]); ?>, <?php echo ($OrderCountRecentWeek[5]); ?>, <?php echo ($OrderCountRecentWeek[4]); ?>,<?php echo ($OrderCountRecentWeek[3]); ?>, <?php echo ($OrderCountRecentWeek[2]); ?>,<?php echo ($OrderCountRecentWeek[1]); ?>,<?php echo ($OrderCountRecentWeek[0]); ?>]
					}]

			});

		});
		
		$(function() {
			$('#container2').highcharts({
				chart: {
					type: 'line'
				},

				title: {
					text: '近7天销售额'
				},

				xAxis: {					
					title: {
					text: '日期'
					},
					categories: [days[6],days[5],days[4],days[3],days[2],days[1],days[0]]
				},


				yAxis: {			
					title: {
					text: '销售额（￥）'
					},
				},

				series: [{
					name: 'sales',
					data: [<?php echo ($SalesRecentWeek[6]); ?>, <?php echo ($SalesRecentWeek[5]); ?>, <?php echo ($SalesRecentWeek[4]); ?>,<?php echo ($SalesRecentWeek[3]); ?>, <?php echo ($SalesRecentWeek[2]); ?>,<?php echo ($SalesRecentWeek[1]); ?>,<?php echo ($SalesRecentWeek[0]); ?>]
					}]

			});

		});
    </script>
	<style type="text/css">	
	.concss {
	  position:absolute;
	  left:495px;
	  top:240px;
	  width:725px;
	  height:300px;
	}
	.concss2 {
	  position:absolute;
	  left:495px;
	  top:582px;
	  width:725px;
	  height:300px;
	}
	</style>
</head>
<body>
    <div id="base" class="">
	
      <!-- Unnamed (组合) -->
      <div id="u0" class="ax_default">

        <!-- Unnamed (矩形) -->
        <div id="u1" class="ax_default _形状">
          <div id="u1_div" class=""></div>
          <!-- Unnamed () -->
          <div id="u2" class="text" style="display: none; visibility: hidden">
            <p><span style="font-family:'应用字体 Regular', '应用字体';"></span></p>
          </div>
        </div>

        <!-- Unnamed (矩形) -->
        <div id="u3" class="ax_default _二级标题">
          <div id="u3_div" class=""></div>
          <!-- Unnamed () -->
          <div id="u4" class="text" style="visibility: visible;">
            <p><span style="font-family:'应用字体 Bold', '应用字体';">昨日销售额：</span></p>
          </div>
        </div>

        <!-- Unnamed (矩形) -->
        <div id="u5" class="ax_default _文本段落">
          <div id="u5_div" class=""></div>
          <!-- Unnamed () -->
          <div id="u6" class="text" style="visibility: visible;">
            <p><span style="font-family:'应用字体 Regular', '应用字体';text-decoration:underline;"><?php echo ($SalesRecentWeek[0]); ?>￥</span></p>
          </div>
        </div>
      </div>

      <!-- Unnamed (导航) -->

      <!-- Unnamed (组合) -->
      <div id="u8" class="ax_default">

        <!-- Unnamed (矩形) -->
        <div id="u9" class="ax_default _形状">
          <div id="u9_div" class=""></div>
          <!-- Unnamed () -->
          <div id="u10" class="text" style="display: none; visibility: hidden">
            <p><span style="font-family:'应用字体 Regular', '应用字体';"></span></p>
          </div>
        </div>

        <!-- 销售概况 (矩形) -->
        <div id="u11" class="ax_default _形状" data-label="销售概况">
          <div id="u11_div" class=""></div>
          <!-- Unnamed () -->
          <div id="u12" class="text" style="visibility: visible;">
            <p><span style="font-family:'应用字体 Regular', '应用字体';">销售概况</span></p>
          </div>
        </div>

        <!-- 订单管理 (矩形) -->
        <div id="u13" class="ax_default _形状" data-label="订单管理">
          <div id="u13_div" class=""></div>
          <!-- Unnamed () -->
          <div id="u14" class="text" style="visibility: visible;">
            <p><span style="font-family:'应用字体 Regular', '应用字体';">订单管理</span></p>
          </div>
        </div>

        <!-- 商品管理 (矩形) -->
        <div id="u15" class="ax_default _形状" data-label="商品管理">
          <div id="u15_div" class=""></div>
          <!-- Unnamed () -->
          <div id="u16" class="text" style="visibility: visible;">
            <p><span style="font-family:'应用字体 Regular', '应用字体';">商品管理</span></p>
          </div>
        </div>

        <!-- 财务管理 (矩形) -->
        <div id="u17" class="ax_default _形状" data-label="财务管理">
          <div id="u17_div" class=""></div>
          <!-- Unnamed () -->
          <div id="u18" class="text" style="visibility: visible;">
            <p><span style="font-family:'应用字体 Regular', '应用字体';">财务管理</span></p>
          </div>
        </div>

        <!-- 客户管理 (矩形) -->
        <div id="u19" class="ax_default _形状" data-label="客户管理">
          <div id="u19_div" class=""></div>
          <!-- Unnamed () -->
          <div id="u20" class="text" style="visibility: visible;">
            <p><span style="font-family:'应用字体 Regular', '应用字体';">客户管理</span></p>
          </div>
        </div>

        <!-- 评论管理 (矩形) -->
        <div id="u21" class="ax_default _形状" data-label="评论管理">
          <div id="u21_div" class=""></div>
          <!-- Unnamed () -->
          <div id="u22" class="text" style="visibility: visible;">
            <p><span style="font-family:'应用字体 Regular', '应用字体';">评论管理</span></p>
          </div>
        </div>

        <!-- 评论管理 (矩形) -->
        <div id="u23" class="ax_default _形状" data-label="评论管理">
          <div id="u23_div" class=""></div>
          <!-- Unnamed () -->
          <div id="u24" class="text" style="visibility: visible;">
            <p><span style="font-family:'应用字体 Regular', '应用字体';">优惠码管理</span></p>
          </div>
        </div>
      </div>

      <!-- Unnamed (矩形) -->
      <div id="u25" class="ax_default _形状">
        <div id="u25_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u26" class="text" style="display: none; visibility: hidden">
          <p><span style="font-family:'应用字体 Regular', '应用字体';"></span></p>
        </div>
      </div>

      <!-- Unnamed (矩形) -->
      <div id="u27" class="ax_default _文本段落">
        <div id="u27_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u28" class="text" style="visibility: visible;">
          <p><span style="font-family:'应用字体 Regular', '应用字体';">初意古茶商城后台管理系统</span></p>
        </div>
      </div>

      <!-- Unnamed (组合) -->
      <div id="u29" class="ax_default">

        <!-- Unnamed (图片) -->
        <div id="u30" class="ax_default _图片">
          <img id="u30_img" class="img " src="/onethink/Public/Tea/images/初意古茶商城后台管理系统/u30.png"/>
          <!-- Unnamed () -->
          <div id="u31" class="text" style="display: none; visibility: hidden">
            <p><span style="font-family:'应用字体 Regular', '应用字体';"></span></p>
          </div>
        </div>

        <!-- Unnamed (椭圆形) -->
        <div id="u32" class="ax_default _流程形状">
          <img id="u32_img" class="img " src="/onethink/Public/Tea/images/初意古茶商城后台管理系统/u32.png"/>
          <!-- Unnamed () -->
          <div id="u33" class="text" style="visibility: visible;">
            <p><span style="font-family:'应用字体 Regular', '应用字体';">3</span></p>
          </div>
        </div>

        <!-- Unnamed (椭圆形) [footnote] -->
        <div id="u32_ann" class="annotation"></div>

        <!-- 消息 (动态面板) -->
        <div id="u34" class="ax_default ax_default_hidden" data-label="消息" style="display: none; visibility: hidden">
          <div id="u34_state0" class="panel_state" data-label="消息列表">
            <div id="u34_state0_content" class="panel_state_content">

              <!-- Unnamed (矩形) -->
              <div id="u35" class="ax_default _形状">
                <div id="u35_div" class=""></div>
                <!-- Unnamed () -->
                <div id="u36" class="text" style="visibility: visible;">
                  <p><span style="font-family:'应用字体 Regular', '应用字体';">您有3条未读消息</span></p>
                </div>
              </div>

              <!-- 消息1 (矩形) -->
              <div id="u37" class="ax_default _形状" data-label="消息1">
                <div id="u37_div" class=""></div>
                <!-- Unnamed () -->
                <div id="u38" class="text" style="visibility: visible;">
                  <p><span style="font-family:'应用字体 Regular', '应用字体';">新订单*2</span></p>
                </div>
              </div>

              <!-- 消息1 (矩形) [footnote] -->
              <div id="u37_ann" class="annotation"></div>

              <!-- 消息2 (矩形) -->
              <div id="u39" class="ax_default _形状" data-label="消息2">
                <div id="u39_div" class=""></div>
                <!-- Unnamed () -->
                <div id="u40" class="text" style="visibility: visible;">
                  <p><span style="font-family:'应用字体 Regular', '应用字体';">取消交易申请*1</span></p>
                </div>
              </div>

              <!-- 消息2 (矩形) [footnote] -->
              <div id="u39_ann" class="annotation"></div>

              <!-- 消息3 (矩形) -->
              <div id="u41" class="ax_default _形状" data-label="消息3">
                <div id="u41_div" class=""></div>
                <!-- Unnamed () -->
                <div id="u42" class="text" style="visibility: visible;">
                  <p><span style="font-family:'应用字体 Regular', '应用字体';">提现申请*1</span></p>
                </div>
              </div>

              <!-- 消息3 (矩形) [footnote] -->
              <div id="u41_ann" class="annotation"></div>
            </div>
          </div>
        </div>
      </div>

      <!-- Unnamed (组合) -->
      <div id="u43" class="ax_default">

        <!-- Unnamed (图片) -->
        <div id="u44" class="ax_default _图片">
          <img id="u44_img" class="img " src="/onethink/Public/Tea/images/初意古茶商城后台管理系统/u44.png"/>
          <!-- Unnamed () -->
          <div id="u45" class="text" style="display: none; visibility: hidden">
            <p><span style="font-family:'应用字体 Regular', '应用字体';"></span></p>
          </div>
        </div>

        <!-- Unnamed (矩形) -->
        <div id="u46" class="ax_default _文本段落">
          <div id="u46_div" class=""></div>
          <!-- Unnamed () -->
          <div id="u47" class="text" style="visibility: visible;">
            <p style="font-size:14px;"><span style="font-family:'应用字体 Regular', '应用字体';">admin</span><span style="font-family:'应用字体 Regular', '应用字体';font-size:13px;"> </span></p>
          </div>
        </div>

        <!-- Unnamed (矩形) -->
        <div id="u48" class="ax_default _文本段落">
          <div id="u48_div" class=""></div>
          <!-- Unnamed () -->
          <div id="u49" class="text" style="visibility: visible;">
            <p><span style="font-family:'应用字体 Regular', '应用字体';">▼</span></p>
          </div>
        </div>

        <!-- Unnamed (动态面板) -->
        <div id="u50" class="ax_default">
          <div id="u50_state0" class="panel_state" data-label="点击前1">
            <div id="u50_state0_content" class="panel_state_content">
            </div>
          </div>
          <div id="u50_state1" class="panel_state" data-label="点击后2">
            <div id="u50_state1_content" class="panel_state_content">

              <!-- Unnamed (组合) -->
              <div id="u51" class="ax_default">

                <!-- Unnamed (矩形) -->
                <div id="u52" class="ax_default _形状">
                  <div id="u52_div" class=""></div>
                  <!-- Unnamed () -->
                  <div id="u53" class="text" style="visibility: visible;">
                    <p><span style="font-family:'应用字体 Regular', '应用字体';">退出</span></p>
                  </div>
                </div>

                <!-- Unnamed (矩形) -->
                <div id="u54" class="ax_default _形状">
                  <div id="u54_div" class=""></div>
                  <!-- Unnamed () -->
                  <div id="u55" class="text" style="visibility: visible;">
                    <p><span style="font-family:'应用字体 Regular', '应用字体';">设置</span></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Unnamed (组合) -->
      <div id="u56" class="ax_default">

        <!-- Unnamed (矩形) -->
        <div id="u57" class="ax_default _形状">
          <div id="u57_div" class=""></div>
          <!-- Unnamed () -->
          <div id="u58" class="text" style="display: none; visibility: hidden">
            <p><span style="font-family:'应用字体 Regular', '应用字体';"></span></p>
          </div>
        </div>

        <!-- Unnamed (矩形) -->
        <div id="u59" class="ax_default _二级标题">
          <div id="u59_div" class=""></div>
          <!-- Unnamed () -->
          <div id="u60" class="text" style="visibility: visible;">
            <p><span style="font-family:'应用字体 Bold', '应用字体';">昨日下单数：</span></p>
          </div>
        </div>

        <!-- Unnamed (矩形) -->
        <div id="u61" class="ax_default _文本段落">
          <div id="u61_div" class=""></div>
          <!-- Unnamed () -->
          <div id="u62" class="text" style="visibility: visible;">
            <p><span style="font-family:'应用字体 Regular', '应用字体';text-decoration:underline;"><?php echo ($OrderCountRecentWeek[0]); ?></span></p>
          </div>
        </div>
      </div>

      <!-- Unnamed (组合) -->
      <div id="u63" class="ax_default">

        <!-- Unnamed (矩形) -->
        <div id="u64" class="ax_default _形状">
          <div id="u64_div" class=""></div>
          <!-- Unnamed () -->
          <div id="u65" class="text" style="display: none; visibility: hidden">
            <p><span style="font-family:'应用字体 Regular', '应用字体';"></span></p>
          </div>
        </div>

        <!-- Unnamed (矩形) -->
        <div id="u66" class="ax_default _二级标题">
          <div id="u66_div" class=""></div>
          <!-- Unnamed () -->
          <div id="u67" class="text" style="visibility: visible;">
            <p><span style="font-family:'应用字体 Bold', '应用字体';">待发货数：</span></p>
          </div>
        </div>

        <!-- Unnamed (矩形) -->
        <div id="u68" class="ax_default _文本段落">
          <div id="u68_div" class=""></div>
          <!-- Unnamed () -->
          <div id="u69" class="text" style="visibility: visible;">
            <p><span style="font-family:'应用字体 Regular', '应用字体';text-decoration:underline;"><?php echo ($tobedelivered); ?></span></p>
          </div>
        </div>
      </div>

      <!-- 销售概况 (矩形) -->
      <div id="u70" class="ax_default _形状" data-label="销售概况">
        <div id="u70_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u71" class="text" style="visibility: visible;">
          <p><span style="font-family:'应用字体 Regular', '应用字体';">销售概况</span></p>
        </div>
      </div>
      
	  
      <!-- 近7天订单数 -->
	  <div class = "concss" id="container"></div>	  
	  
      <!-- 近7天销售额 -->
	  <div class = "concss2" id="container2"></div>
	  
      <!-- Unnamed (矩形) -->
      <div id="u144" class="ax_default _形状">
        <div id="u144_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u145" class="text" style="visibility: visible;">
          <p><span style="font-family:'应用字体 Regular', '应用字体';">1.点击待发货数，昨日下单数，昨日销售额可跳转到相应页面查看</span></p><p><span style="font-family:'应用字体 Regular', '应用字体';">2.图表显示日期为当前日期所在的星期</span></p><p><span style="font-family:'应用字体 Regular', '应用字体';">3.鼠标移动到图表上坐标点可显示具体数量</span></p>
        </div>
      </div>
    </div>
  </body>
</html>