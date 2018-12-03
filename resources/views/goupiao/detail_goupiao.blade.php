@extends('base.base')
@section('title', '门票详情')
@section('css_js')
	<script type="text/javascript" src="{{asset('./detail_goupiao/jquery-1.11.3.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('./detail_goupiao/common.js')}}"></script>
	<link rel="stylesheet" href="{{asset('./detail_goupiao/base.css')}}" type="text/css">
	<link rel="stylesheet" href="{{asset('./detail_goupiao/style.css')}}" type="text/css">
	<link rel="stylesheet" href="{{asset('./detail_goupiao/detail_slider.css')}}" type="text/javascript">
	<link rel="stylesheet" href="{{asset('./detail_goupiao/detail_1.css')}}" type="text/javascript">
@endsection	
@section('body')
<body>
@endsection	
@section('content')
	<div class="container-content">
  	<div style="width:100%;height:2px;background:gray;"></div>
	<div class="crumbs marginTop">
		<p><a href="http://www.travelzjj.com/">首页</a><span>&gt;</span><a href="{{URL('/goupiaolist')}}">优惠预订</a><span>&gt;</span><a href="{{URL('/goupiaolist')}}">门票</a><span>&gt;</span><a href="javascript:void(0);" class="cur">天门山国家森林公园</a></p>  
	</div>
	
	<div class="show-content clearfix">

		<div class="show-topLBox">

			<div class="show-focusWrap clearfix">
				<div id="play">
				  <ul class="img_ul">
				    <li style="display: list-item;"><a class="img_a"><img id="detail_mid" src="/uploads/{{$pic->detailpic_picname1}}" style="width: 535px;"></a></li>		    
				  </ul>  
				  <a href="javascript:void(0)" class="prev_a change_a" title="上一张"> <span style="display: none;"></span></a>
				  <a href="javascript:void(0)" class="next_a change_a" title="下一张"> <span style="display: none;"></span> </a>
				  </div>
				  
				<div class="img_hd" id="detail_did">
				  <ul class=" clearfix" style="height: 600px;">
				    
				    <li><a class="img_a"><img src="/uploads/{{$pic->detailpic_picname1}}"></a></li>
				    <li><a class="img_a"><img src="/uploads/{{$pic->detailpic_picname2}}"></a></li>
				    <li><a class="img_a"><img src="/uploads/{{$pic->detailpic_picname3}}"></a></li>
				    <li><a class="img_a"><img src="/uploads/{{$pic->detailpic_picname4}}"></a></li>
				    <li><a class="img_a"><img src="/uploads/{{$pic->detailpic_picname5}}"></a></li>
				  </ul>
				</div>

			</div>

		</div>
		
		<div class="show-topRBox">
			<div class="ticket-rBox">
				<h2>{{$list->list_name}}</h2>
				<span class="dengji"><i>{{$list->list_pingji}}</i> 景区</span>
				<p class="ticket-topInfo"><strong>景区地址：</strong>{{$list->list_address}}</p>
				<p class="ticket-topInfo"><strong>开放时间：</strong>08:30 - 17:00。（门票当日有效）</p>
				<p class="ticket-topInfo"><strong>景区特色：</strong>{{$list->list_jianjie}}</p>
				<p class="ticket-topInfo"><strong>服务承诺：</strong>入园保证</p>
				<a class="ticket-ydBtn">¥{{$list->list_shichangprice}}<b>/人起</b></a>
			</div>
		</div>
	
	</div>
	
 	<div class="ticket-contentInfoWrap">


 		<div class="ticket-tableWrap">
 			<h3>门票预订</h3>
 			<table id="ticket-tablesId">
 				<thead>
 					<tr>
 						<th>名称</th>
 						<th>提前预订时间</th>
 						<th>市场价</th>
 						<th>优惠价</th>
 						<th>支付方式</th>
 						<th></th>
 					</tr>
 				</thead>
 				<tbody>
  					<tr>
 						<td class="tableInfo_txt" title="点击查看详情" rel="1">{{$list->list_piaozhong}}</td>
 						<td>前1天预订</td>
 						<td>¥ {{$list->list_shichangprice}}</td>
 						<td class="table_sale">¥ {{$list->list_youhuiprice}}</td>
 						<td>{{$list->list_style}}</td>
 						<td><a href="/goupiaopay?id={{$list->id}}">预订</a></td>
 					</tr>
 					
 				</tbody>
 			</table>
 		</div>
		
		<div class="ticket-moreWrapBox">
			<div class="ticket-moreBtns" id="ticket-Btns" style="position: static; top: 784px; border-bottom-style: none;">
				<a href="javascript:;" title="" class="addCur">预订须知</a>
				<a href="javascript:;" title="" class="">景区介绍</a>
				<a href="javascript:;" title="" class="">交通指南</a>
				<a href="javascript:;" title="" style="border-right-width: 1px; border-right-color: rgb(221, 221, 221); border-right-style: solid;">用户点评</a>
			</div>
			<div class="ticket-ProListWrap">

				<div class="ticket-ProList clearfix">
					<div class="ticket-ProList_lBox">
						<span>预订须知</span>
					</div>
					<div class="ticket-ProList_rBox">
					<p>{!!$data->detail_xuzhi!!}</p>	
					</div>
				</div>

				<div class="ticket-ProList clearfix">
					<div class="ticket-ProList_lBox">
						<span>景区介绍</span>
					</div>
					<div class="ticket-ProList_rBox">
						<p>{!!$data->detail_jieshao!!}</p>
						&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
						<img alt="" src="./uploads/{{$data->detail_picname1}}">&nbsp; 
						<img alt="" src="./uploads/{{$data->detail_picname2}}">&nbsp; 
						<img alt="" src="./uploads/{{$data->detail_picname3}}">&nbsp; 
						<p>{!!$data->detail_jieshao1!!}</p>	
						&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
						<img alt="" src="./uploads/{{$data->detail_picname4}}">&nbsp;
						<img alt="" src="./uploads/{{$data->detail_picname5}}">&nbsp;
						<img alt="" src="./uploads/{{$data->detail_picname6}}">
						
					</div>
				</div>
				<div class="ticket-ProList clearfix">
					<div class="ticket-ProList_lBox">
						<span>交通指南</span>
					</div>
					<div class="ticket-ProList_rBox">
						 <script type="text/javascript" src="{{asset('./detail_goupiao/api')}}"></script>
						 <script type="text/javascript" src="{{asset('./detail_goupiao/getscript')}}"></script>
							<div id="allmap" style="overflow: hidden; position: relative; z-index: 0; color: rgb(0, 0, 0); text-align: left; background-color: rgb(243, 241, 236);">
							<div style="overflow: visible; position: absolute; z-index: 0; left: 0px; top: 0px; cursor: url(http://api0.map.bdimg.com/images/openhand.cur) 8 8, default;">
							<div class="BMap_mask" style="position: absolute; left: 0px; top: 0px; z-index: 9; overflow: hidden; -webkit-user-select: none; width: 1008px; height: 470px;"></div>
							<div style="position: absolute; height: 0px; width: 0px; left: 0px; top: 0px; z-index: 200;">
							<div style="position: absolute; height: 0px; width: 0px; left: 0px; top: 0px; z-index: 800;"></div>
							<div style="position: absolute; height: 0px; width: 0px; left: 0px; top: 0px; z-index: 700;">
							<span class="BMap_Marker BMap_noprint" unselectable="on" "="" style="position: absolute; padding: 0px; margin: 0px; border: 0px; cursor: pointer; width: 19px; height: 25px; left: 494px; top: 210px; z-index: -5823610; background: url(http://api0.map.bdimg.com/images/blank.gif);" title=""></span>
							</div>
							<div style="position: absolute; height: 0px; width: 0px; left: 0px; top: 0px; z-index: 600;"></div>
							<div style="position: absolute; height: 0px; width: 0px; left: 0px; top: 0px; z-index: 500;">
							<label class="BMapLabel" unselectable="on" style="position: absolute; display: none; cursor: inherit; border: 1px solid rgb(190, 190, 190); padding: 1px; white-space: nowrap; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 12px; line-height: normal; font-family: arial, sans-serif; z-index: -20000; color: rgb(190, 190, 190); background-color: rgb(190, 190, 190);">shadow</label></div>
							<div style="position: absolute; height: 0px; width: 0px; left: 0px; top: 0px; z-index: 400;">
							<span class="BMap_Marker" unselectable="on" style="position: absolute; padding: 0px; margin: 0px; border: 0px; width: 0px; height: 0px; left: 494px; top: 210px; z-index: -5823610;">
							<div style="position: absolute; margin: 0px; padding: 0px; width: 19px; height: 25px; overflow: hidden;"><img src="{{asset('./detail_goupiao/marker_red_sprite.png')}}" style="display: block; border:none;margin-left:0px; margin-top:0px; "></div>
							</span>
							</div>
							<div style="position: absolute; height: 0px; width: 0px; left: 0px; top: 0px; z-index: 300;"><span unselectable="on" style="position: absolute; padding: 0px; margin: 0px; border: 0px; width: 20px; height: 11px; left: 498px; top: 224px;"><div style="position: absolute; margin: 0px; padding: 0px; width: 20px; height: 11px; overflow: hidden;"><img src="{{asset('./detail_goupiao/marker_red_sprite.png')}}" style="display: block; border:none;margin-left:-19px; margin-top:-13px; "></div></span></div>
							<div style="position: absolute; height: 0px; width: 0px; left: 0px; top: 0px; z-index: 201;"></div>
							<div style="position: absolute; height: 0px; width: 0px; left: 0px; top: 0px; z-index: 200;"></div>
							</div>
							<div style="position: absolute; overflow: visible; top: 0px; left: 0px; z-index: 1;">
							<div style="position: absolute; overflow: visible; z-index: -100; left: 504px; top: 235px; display: block; -webkit-transform: translate3d(0px, 0px, 0px);"><img src="{{asset('./detail_goupiao/saved_resource')}}" style="position: absolute; border: none; width: 256px; height: 256px; left: -198px; top: -163px; max-width: none; opacity: 1;">
							<img src="{{asset('./detail_goupiao/saved_resource(1)')}}" style="position: absolute; border: none; width: 256px; height: 256px; left: -454px; top: -163px; max-width: none; opacity: 1;">
							<img src="{{asset('./detail_goupiao/saved_resource(2)')}}" style="position: absolute; border: none; width: 256px; height: 256px; left: 58px; top: -163px; max-width: none; opacity: 1;">
							<img src="{{asset('./detail_goupiao/saved_resource(3)')}}" style="position: absolute; border: none; width: 256px; height: 256px; left: -198px; top: 93px; max-width: none; opacity: 1;">
							<img src="{{asset('./detail_goupiao/saved_resource(4)')}}" style="position: absolute; border: none; width: 256px; height: 256px; left: -198px; top: -419px; max-width: none; opacity: 1;">
							<img src="{{asset('./detail_goupiao/saved_resource(5)')}}" style="position: absolute; border: none; width: 256px; height: 256px; left: 314px; top: -163px; max-width: none; opacity: 1;">
							<img src="{{asset('./detail_goupiao/saved_resource(6)')}}" style="position: absolute; border: none; width: 256px; height: 256px; left: -710px; top: -163px; max-width: none; opacity: 1;">
							<img src="{{asset('./detail_goupiao/saved_resource(7)')}}" style="position: absolute; border: none; width: 256px; height: 256px; left: -454px; top: 93px; max-width: none; opacity: 1;">
							<img src="{{asset('./detail_goupiao/saved_resource(8)')}}" style="position: absolute; border: none; width: 256px; height: 256px; left: 58px; top: 93px; max-width: none; opacity: 1;">
							<img src="{{asset('./detail_goupiao/saved_resource(9)')}}" style="position: absolute; border: none; width: 256px; height: 256px; left: -454px; top: -419px; max-width: none; opacity: 1;">
							<img src="{{asset('./detail_goupiao/saved_resource(10)')}}" style="position: absolute; border: none; width: 256px; height: 256px; left: 58px; top: -419px; max-width: none; opacity: 1;">
							<img src="{{asset('./detail_goupiao/saved_resource(11)')}}" style="position: absolute; border: none; width: 256px; height: 256px; left: -710px; top: 93px; max-width: none; opacity: 1;">
							<img src="{{asset('./detail_goupiao/saved_resource(12)')}}" style="position: absolute; border: none; width: 256px; height: 256px; left: 314px; top: 93px; max-width: none; opacity: 1;">
							<img src="{{asset('./detail_goupiao/saved_resource(13)')}}" style="position: absolute; border: none; width: 256px; height: 256px; left: -710px; top: -419px; max-width: none; opacity: 1;">
							<img src="{{asset('./detail_goupiao/saved_resource(14)')}}" style="position: absolute; border: none; width: 256px; height: 256px; left: 314px; top: -419px; max-width: none; opacity: 1;"></div></div>
							<div style="position: absolute; overflow: visible; top: 0px; left: 0px; z-index: 2; display: none;"><div style="position: absolute; overflow: visible; top: 0px; left: 0px; z-index: 0; display: none;"></div></div>
							<div style="position: absolute; overflow: visible; top: 0px; left: 0px; z-index: 3;"></div></div>
							<div class="pano_close" title="退出全景" style="z-index: 1201; display: none;"></div><a class="pano_pc_indoor_exit" title="退出室内景" style="z-index: 1201; display: none;"><span style="float:right;margin-right:12px;">出口</span></a>
							<div class=" anchorBL" style="height: 32px; position: absolute; z-index: 30; bottom: 0px; right: auto; top: auto; left: 1px;"><a title="到百度地图查看此区域" target="_blank" href="http://map.baidu.com/?sr=1" style="outline: none;">
							<img style="border:none;width:77px;height:32px" src="{{asset('./detail_goupiao/copyright_logo.png')}}"></a></div>
							<div id="zoomer" style="position:absolute;z-index:0;top:0px;left:0px;overflow:hidden;visibility:hidden;cursor:url(http://api0.map.bdimg.com/images/openhand.cur) 8 8,default">
							<div class="BMap_zoomer" style="top:0;left:0;"></div>
							<div class="BMap_zoomer" style="top:0;right:0;"></div>
							<div class="BMap_zoomer" style="bottom:0;left:0;"></div>
							<div class="BMap_zoomer" style="bottom:0;right:0;"></div></div>
							<div unselectable="on" class=" BMap_stdMpCtrl BMap_stdMpType0 BMap_noprint anchorTL" style="width: 62px; height: 192px; bottom: auto; right: auto; top: 10px; left: 10px; position: absolute; z-index: 1100;">
							<div class="BMap_stdMpPan"><div class="BMap_button BMap_panN" title="向上平移"></div>
							<div class="BMap_button BMap_panW" title="向左平移"></div><div class="BMap_button BMap_panE" title="向右平移"></div>
							<div class="BMap_button BMap_panS" title="向下平移"></div><div class="BMap_stdMpPanBg BMap_smcbg"></div></div>
							<div class="BMap_stdMpZoom" style="height: 147px; width: 62px;">
							<div class="BMap_button BMap_stdMpZoomIn" title="放大一级">
							<div class="BMap_smcbg"></div></div>
							<div class="BMap_button BMap_stdMpZoomOut" title="缩小一级" style="top: 126px;">
							<div class="BMap_smcbg"></div></div><div class="BMap_stdMpSlider" style="height: 108px;">
							<div class="BMap_stdMpSliderBgTop" style="height: 108px;"><div class="BMap_smcbg"></div></div>
							<div class="BMap_stdMpSliderBgBot" style="top: 25px; height: 87px;"></div>
							<div class="BMap_stdMpSliderMask" title="放置到此级别"></div>
							<div class="BMap_stdMpSliderBar" title="拖动缩放" style="cursor: url(http://api0.map.bdimg.com/images/openhand.cur) 8 8, default; top: 25px;">
							<div class="BMap_smcbg"></div></div></div>
							<div class="BMap_zlHolder"><div class="BMap_zlSt">
							<div class="BMap_smcbg"></div></div><div class="BMap_zlCity">
							<div class="BMap_smcbg"></div></div><div class="BMap_zlProv">
							<div class="BMap_smcbg"></div></div><div class="BMap_zlCountry">
							<div class="BMap_smcbg"></div></div></div></div>
							<div class="BMap_stdMpGeolocation" style="position: initial; display: none; margin-top: 43px; margin-left: 10px;">
							<div class="BMap_geolocationContainer" style="position: initial; width: 24px; height: 24px; overflow: hidden; margin: 0px; box-sizing: border-box;">
							<div class="BMap_geolocationIconBackground" style="width: 24px; height: 24px; background-image: url(http://api0.map.bdimg.com/images/navigation-control/geolocation-control/pc/bg-20x20.png); background-size: 20px 20px; background-position: 3px 3px; background-repeat: no-repeat;">
							<div class="BMap_geolocationIcon" style="position: initial; width: 24px; height: 24px; cursor: pointer; background-image: url(&#39;http://api0.map.bdimg.com/images/navigation-control/geolocation-control/pc/success-10x10.png&#39;); background-size: 10px 10px; background-repeat: no-repeat; background-position: center;"></div></div></div></div></div>
							<div unselectable="on" class=" BMap_scaleCtrl BMap_noprint anchorBL" style="bottom: 18px; right: auto; top: auto; left: 81px; width: 75px; position: absolute; z-index: 10;">
							<div class="BMap_scaleTxt" unselectable="on" style="color: black; background-color: transparent;">500&nbsp;米</div>
							<div class="BMap_scaleBar BMap_scaleHBar" style="background-color: black;">
							<img style="border:none" src="{{asset('./detail_goupiao/mapctrls.png')}}"></div>
							<div class="BMap_scaleBar BMap_scaleLBar" style="background-color: black;">
							<img style="border:none" src="{{asset('./detail_goupiao/mapctrls.png')}}"></div>
							<div class="BMap_scaleBar BMap_scaleRBar" style="background-color: black;">
							<img style="border:none" src="{{asset('./detail_goupiao/mapctrls.png')}}"></div></div>	
							<div unselectable="on" class=" BMap_omCtrl BMap_ieundefined BMap_noprint anchorBR quad4" style="width: 13px; height: 13px; bottom: 0px; right: 0px; top: auto; left: auto; position: absolute; z-index: 10;">
							<div class="BMap_omOutFrame" style="width: 149px; height: 149px;">
							<div class="BMap_omInnFrame" style="bottom: auto; right: auto; top: 5px; left: 5px; width: 142px; height: 142px;">
							<div class="BMap_omMapContainer"></div>
							<div class="BMap_omViewMv" style="cursor: url(http://api0.map.bdimg.com/images/openhand.cur) 8 8, default;">
							<div class="BMap_omViewInnFrame"><div></div></div></div></div></div>
							<div class="BMap_omBtn BMap_omBtnClosed" style="bottom: 0px; right: 0px; top: auto; left: auto;"></div></div>
							<div unselectable="on" class=" BMap_noprint anchorTR" style="bottom: auto; right: 10px; top: 10px; left: auto; white-space: nowrap; cursor: pointer; position: absolute; z-index: 10;">
							<div style="float: left;">
							<div title="显示普通地图" style="box-shadow: rgba(0, 0, 0, 0.34902) 2px 2px 3px; border-left-width: 1px; border-left-style: solid; border-left-color: rgb(139, 164, 220); border-top-width: 1px; border-top-style: solid; border-top-color: rgb(139, 164, 220); border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(139, 164, 220); padding: 2px 6px; font-style: normal; font-variant: normal; font-weight: bold; font-stretch: normal; font-size: 12px; line-height: 1.3em; font-family: arial, sans-serif; text-align: center; white-space: nowrap; border-radius: 3px 0px 0px 3px; color: rgb(255, 255, 255); background: rgb(142, 168, 224);">地图</div></div>
							<div style="float: left;"><div title="显示卫星影像" style="box-shadow: rgba(0, 0, 0, 0.34902) 2px 2px 3px; border-left-width: 1px; border-left-style: solid; border-left-color: rgb(139, 164, 220); border-top-width: 1px; border-top-style: solid; border-top-color: rgb(139, 164, 220); border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(139, 164, 220); padding: 2px 6px; font-style: normal; font-variant: normal; font-stretch: normal; font-size: 12px; line-height: 1.3em; font-family: arial, sans-serif; text-align: center; white-space: nowrap; color: rgb(0, 0, 0); background: rgb(255, 255, 255);">卫星</div>
							<div style="position: absolute; top: 21px; left: 37px; z-index: -1; display: none;">
							<div title="显示带有街道的卫星影像" style="border-right:1px solid #8ba4dc;border-bottom:1px solid #8ba4dc;border-left:1px solid #8ba4dc;background:white;font:12px arial,sans-serif;padding:0 8px 0 6px;line-height:1.6em;box-shadow:2px 2px 3px rgba(0, 0, 0, 0.35)"><span checked="checked" "="" class="BMap_checkbox"></span>
							<label style="vertical-align: middle; cursor: pointer;">混合</label></div></div></div>
							<div style="float: left;">
							<div title="显示三维地图" style="box-shadow: rgba(0, 0, 0, 0.34902) 2px 2px 3px; border: 1px solid rgb(139, 164, 220); padding: 2px 6px; font-style: normal; font-variant: normal; font-stretch: normal; font-size: 12px; line-height: 1.3em; font-family: arial, sans-serif; text-align: center; white-space: nowrap; border-radius: 0px 3px 3px 0px; color: rgb(0, 0, 0); background: rgb(255, 255, 255);">三维</div></div></div>
							<div unselectable="on" class=" BMap_cpyCtrl BMap_noprint anchorBL" style="cursor: default; white-space: nowrap; color: black; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 11px; line-height: 15px; font-family: arial, sans-serif; bottom: 2px; right: auto; top: auto; left: 81px; position: absolute; z-index: 10; background: none;"><span _cid="1" style="display: inline;">
							<span style="font-size:11px">© 2016 Baidu&nbsp;- Data © <a target="_blank" href="http://www.navinfo.com/" style="display:inline;">NavInfo</a> &amp; <a target="_blank" href="http://www.cennavi.com.cn/" style="display:inline;">CenNavi</a> &amp; <a target="_blank" href="http://www.365ditu.com/" style="display:inline;">道道通</a></span></span></div></div>
		                    <script type="text/javascript">
		                        var map = new BMap.Map("allmap");
		                        map.centerAndZoom(new BMap.Point(110.490006, 29.118054), 15);
		                        map.addControl(new BMap.NavigationControl());
		                        map.addControl(new BMap.ScaleControl());
		                        map.addControl(new BMap.OverviewMapControl());
		                        map.enableScrollWheelZoom();
		                        map.addControl(new BMap.MapTypeControl());
		                        var point = new BMap.Point(110.490006, 29.118054);
		                        var marker = new BMap.Marker(point);
		                        map.addOverlay(marker);
		                        var infoWindow = new BMap.InfoWindow("<h3>天门山国家森林公园</h3><p>张家界市区官黎坪天门山索道下站（纬地酒店对面）</p>");
		                        marker.addEventListener("click", function () { this.openInfoWindow(infoWindow); });
							</script>
					</div>
				</div>
				

				
			</div>

 		</div>

	</div>
	</div>

	<script type="text/javascript">
	//获取小图并添加鼠标移入事件
	$("#detail_did ul li img").click(function(){
		$("#detail_mid").attr("src",$(this).attr('src'));
	});
        </script>
        </script>
	        
	</script>
@endsection	