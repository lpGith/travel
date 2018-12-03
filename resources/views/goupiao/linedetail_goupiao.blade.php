@extends('base.base')

@section('title', '团游订票详情')
@section('css_js')
	<script type="text/javascript" src="{{asset('./tuangoudetail/jquery-1.11.3.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('./tuangoudetail/common.js')}}"></script>
	<link rel="stylesheet" href="{{asset('./tuangoudetail/base.css')}}" type="text/css">
	<link rel="stylesheet" href="{{asset('./tuangoudetail/style.css')}}" type="text/css">
	<link rel="stylesheet" href="http://www.travelzjj.com/styles/slider.css" type="text/javascript">
    <script type="text/javascript" src="{{asset('./tuangoudetail/slides.min.jquery.js')}}"></script>
@endsection	
@section('body')
<body>
@endsection	
@section('content')
	<div class="container-content">
  	<div style="width:100%;height:1px;background:gray;"></div>
	<div class="crumbs marginTop">
		<p><a href="http://www.travelzjj.com/">首页</a><span>&gt;</span><a href="http://www.travelzjj.com/book">旅游定制</a><span>&gt;</span><a href="{{URL('/goupiaolinelist')}}">跟团游</a><span>&gt;</span><a href="javascript:void(0);" class="cur">（豪华款）张家界2日1晚跟团游 ·美丽张家界新传奇 天门山</a></p>  
	</div>
	
	<div class="show-content clearfix">

		<div class="show-topLBox">

			<div class="show-focusWrap clearfix">
				<div id="play">
				  <ul class="img_ul">
				    <li><a class="img_a"><img id="tuangoudetail_mid" src="/uploads/{{$data->tuangoudetail_picname1}}" style="width: 535px;"></a></li>
				   
				    </ul>  
				  <a href="javascript:void(0)" class="prev_a change_a" title="上一张"> <span style="display: none;"></span></a>
				  <a href="javascript:void(0)" class="next_a change_a" title="下一张"> <span style="display: none;"></span> </a>
				  </div>
				  
				<div class="img_hd" id="tuangoudetail_did">
				  <ul class=" clearfix" style="height: 700px;">
				    <li class=""><a class="img_a"><img src="/uploads/{{$data->tuangoudetail_picname1}}"></a></li>
				    <li class=""><a class="img_a"><img src="/uploads/{{$data->tuangoudetail_picname2}}"></a></li>
				    <li class=""><a class="img_a"><img src="/uploads/{{$data->tuangoudetail_picname3}}"></a></li>
				    <li class="on"><a class="img_a"><img src="/uploads/{{$data->tuangoudetail_picname4}}"></a></li>
				    <li class=""><a class="img_a"><img src="/uploads/{{$data->tuangoudetail_picname5}}"></a></li>				    
				  </ul>
				</div>

			</div>
			
			<div class="show-datepicker clearfix ">
				<div id="ok"></div>
			</div>

			<script src="{{asset('./tuangoudetail/zlDate.js')}}" type="text/javascript"></script>
			<link rel="stylesheet" type="text/css" href="{{asset('./tuangoudetail/datepicker.css')}}">			
		</div>

		<div class="show-topRBox">
			<div class="show-tourInfos">
				<h2>{{$list->tuangou_name}}</h2>
				<p style="padding: 10px 0;">产品编号：{{$list->tuangou_bianhao}}<span>出发地：{{$list->tuangou_chufa}}</span></p>
				<dl class="show-pricesBox">
					<dt><span>{{$list->tuangou_price1}}</span><b>/人起</b></dt>
         <dd><span>活动</span>本产品暂时不参与任何活动</dd>				</dl>
				<span class="pro_manager">产品经理推荐：</span>
				<div class="pro_manager-content">
					<dl class="por_m-info clearfix">
						<dt><img src="{{asset('./uploads/show_pro_06.jpg')}}"></dt>
						<dd>
							{!!$list->tuangou_tuijian!!}
						</dd>
					</dl>
				</div>
			</div>

			<div class="show-yudingBox marginTop">
       
				
				<dl class="show-ydPriceBox clearfix marginTop">
					<dt style="font-size:20px;">票价</dt><input type="hidden" name="priceid" id="priceid" value="0"><br><br>
					<dd>
						<p class="clearfix" style="font-size:20px;">成人 <strong>¥<em id="cr">{{$list->tuangou_price1}}</em><b>/人起</b></strong></p>
						<p class="clearfix" style="font-size:20px;">儿童 <strong>¥<em id="rt">{{$list->tuangou_price2}}</em><b>/人起</b></strong></p>
					</dd>
				</dl>
				<dl class="show-allPrice clearfix marginTop">
					
					<a href="/goupiaopayline?id={{$list->id}}" class="show-yudingBtn">立即预订</a>
				</dl>
			</div>
		</div>
	</div>
	

	<!-- 编辑区 -->
	<div class="show-gtyContents">
		<dl class="show-gtyTopMenu clearfix" id="all3d-subNav" style="position: static; top: 993px; border-bottom-style: none;">
			<dt>
				<a href="javascript:;" class="">行程介绍</a>
				<a href="javascript:;" class="">费用说明</a>
				<a href="javascript:;">预订须知</a>
				<a href="javascript:;">温馨提示</a>
				<a href="javascript:;">用户点评</a>
				<a href="javascript:;" class="">常见问题</a>        
			</dt>
			<dd>
				<a href="javascript:;" id="yudingBtn" style="display: none;">立即预订</a>
			</dd>
		</dl>
		<div class="show-gtyInfoBox">
			<div class="show-gtyPror_tese clearfix">
				<div class="show-gtyIcon show-gtyIcon_bg1">
					<h3>产品特色</h3>
				</div>
				<div class="show-gtyProTxtInfos">
				{!! $data->tuangoudetail_tese !!}
				</div>
			</div>


			<div class="show-gtyPror_tese clearfix">
				<div class="show-gtyIcon show-gtyIcon_bg2">
					<h3>行程安排</h3>
				</div>
				<div class="show-gtyProTxtInfos">
					<div class="show-gtyProxcList">
						{!! $data->tuangoudetail_xingcheng !!}	
					</div>
					
				</div>
			</div>
			
			
			<div class="show-gtyPror_tese clearfix">
				<div class="show-gtyIcon show-gtyIcon_bg3">
					<h3>费用说明</h3>
				</div>
				<div class="show-gtyProTxtInfos">


					<div class="show-gtyProxcList">
						{!! $data->tuangoudetail_feiyong !!}
					</div>
				</div>
			</div>

			<div class="show-gtyPror_tese clearfix">
				<div class="show-gtyIcon show-gtyIcon_bg4">
					<h3>预订须知</h3>
				</div>
				<div class="show-gtyProTxtInfos">


					<div class="show-gtyProxcList">
						<h3 class="show-pricestxt">预订限制</h3>
						<p>
	<span style="line-height:1.5;">1.18岁以下未成年人需要至少一名家长或成年旅客全程陪同。</span> 
</p>
<p>
	<span style="line-height:1.5;">2.70周岁（含）以上老年人预订出行，需与我司签订《健康申报表》,并有18周岁以上家属或朋友（因服务能力所限无法接待及限制接待的人除外）全程陪同出行。</span> 
</p>
<p>
	<span style="line-height:1.5;">3.本团体报价是按照2成人入住1间房计算的价格，本产品不接受拼房,如您的订单产生单房，请在预订后续页面中选择单人房差，我司将向您收取相应的费用。由于12岁以下儿童费用为不占床、不含早餐之报价，若儿童需占床含早，请在后续预订页面的附加产品中选择单人房差可选项。</span> 
</p>
					</div>
					<div class="show-gtyProxcList">
						<h3 class="show-pricestxt">违约条款</h3>
						<p>
	<strong>旅行社违约：</strong> 
</p>
<p>
	行程前30日至8日，支付订单总费用的0%；
</p>
<p>
	行程前7日至4日，支付订单总费用的10%；
</p>
<p>
	行程前3日至1日，支付订单总费用的30%；
</p>
<p>
	行程开始当日，支付订单总费用的 100%。
</p>
<p>
	<strong>旅游者违约：</strong> 
</p>
<p>
	在行程前解除合同的，必要的费用扣除标准为：
</p>
<p>
	行程前30日至8日，收取订单总费用的10％。
</p>
<p>
	行程前7日至4日，收取订单总费用的10％。
</p>
<p>
	行程前3日至1日，收取订单总费用的30％。
</p>
<p>
	行程开始当日，收取订单总费用的100％。
</p>
					</div>
				</div>
			</div>

			<div class="show-gtyPror_tese clearfix">
				<div class="show-gtyIcon show-gtyIcon_bg5">
					<h3>温馨提示</h3>
				</div>
				<div class="show-gtyProTxtInfos">


					<div class="show-gtyProxcList">
						<h3 class="show-pricestxt">温馨提示</h3>
						<p>
	<span style="line-height:1.5;">1.出行前1天您将收到出团通知书或导游的确认电话，敬请留意，保持电话畅通。网上集合的时间仅供参考，具体时间请以出团通知书或导游通知为准。</span> 
</p>
<p>
	<span style="line-height:1.5;">2. 持军官证、老年证、学生证的游客可享受景区门票优惠政策，具体以出行当日景区公布政策为准，请具备条件的游客携带好相关证件并提前交给导游，届时由导游统一安排，按打包行程中客人已享的优惠价格，现场退还差价。</span> 
</p>
<p>
	<span style="line-height:1.5;">3. 张家界景区内野生猕猴较多，需小心，千万不要主动挑逗猕猴，尤其是不要挑衅猕猴，以免造成不必要的伤害。</span> 
</p>
<p>
	<span style="line-height:1.5;">4. “行程介绍”中涉及的交通时间、游览、停留时间、酒店住宿以当天实际游览为准</span> 
</p>
<p>
	<span style="line-height:1.5;">5.湖南实行环保，酒店不主动提供一次性洗漱用品（拖鞋、牙刷、牙膏、香皂、沐浴液等），请游客自备；</span> 
</p>
<p>
	<span style="line-height:1.5;">6.张家界山区多雨，每年逢5-10月为汛期，宜带雨具；若遇雨天游览，景区内外任何水流湍急区域，请不要靠近；另景区台阶较多，为防台阶打滑，请穿防滑的运动鞋；登山时穿舒适的衣服和轻便旅游鞋；早晚山上温度低，请自备好御寒衣物；</span> 
</p>
<p>
	<span style="line-height:1.5;">7.景区游览一定要思想集中，谨慎缓行，走路不观景，观景脚步要特别小心，要看得准，走得稳。鞋子要穿厚底防滑的运动鞋，不宜穿光底和硬底鞋。女士宜穿平底鞋，不宜穿长裙。</span> 
</p>
<p>
	<span style="line-height:1.5;">8.若有寺庙景点，进入庙宇请勿大声喧哗。烧香拜佛请愿捐功德需随自己意愿，切莫听旁人言语，以免上当受骗。（尤其不要让和尚、道士看相说道，除非你是行家，有足够的辨别能力）。不要相信小摊小贩的推销。购买本地特产时最好有行家指导；别相信“人形何首乌”，那是千年难遇。除非你是行家，认识药材你觉得价钱合适才购买。</span> 
</p>
<p>
	<span style="line-height:1.5;">9.湖南饮食口味较重，以辣出名，不同地区旅客可能一时难以适应，易引起水土不服，请旅客自备常用药。旅途中饮食宜清淡，多吃蔬菜水果。夏天不要吃太多冷饮，以便肠胃不适，影响游览行程。</span> 
</p>
<p>
	<span style="line-height:1.5;">10.湘西地区经济条件差，酒店规模较小，条件不能以大城市标准衡量，热水、空调会限时供应，入住时请向酒店前台或导游了解清楚供应时间。用电高峰可能出现停电跳闸现象，请客人有心理准备，请勿惊慌！目前四星标准以上的酒店条件尚可，热水空调会全天供应！</span> 
</p>
<p>
	<span style="line-height:1.5;">11. 凤凰古城节假日会根据客流情况作出城内车辆限行措施，届时可能旅游车不能送至酒店，需客人由古城外步行至酒店（步行时间根据酒店位置而有所不同，平均大约20分钟）。</span> 
</p>
<p>
	<span style="line-height:1.5;">12.旺季团队较多，一般团队都会出发的比较早。建议早一点出发、免得进门票站、到缆车都要排队。宁愿早起一小时也不要在门票站、缆车站排队等候几小时。请配合导游早起安排游览。</span> 
</p>
<p>
	<span style="line-height:1.5;">13.我司可根据实际情况，在证行程景点游览的前提下，有权对景点游览的先后顺序作合理的调整。</span> 
</p>
<p>
	<span style="line-height:1.5;">14. 武陵源景区必须换乘景区内环保车 ，旺季由于张家界旅游车资源紧张，车队统一调派用车。游客所乘坐的旅游车可能会轮换，游客私人贵重物品请随身携带（相机、钱包等），以免丢失。我司会本着“客人至上”的原则，尽量保证不让客人等车。</span> 
</p>
<p>
	<span style="line-height:1.5;">15.	湖南特产：湘绣、菊花石、红瓷、砂石画、湘莲、银鱼、益阳皮蛋、南岳腐乳、各式云雾茶、毛尖茶、君山银针茶、剁辣椒、各式腊鱼、腊肉、腊肠等、各式菇类菌类、各类麻辣熟食食品。</span> 
</p>
					</div>

					

				</div>
			</div>
			
			<div class="show-gtyPror_tese clearfix">
				<div class="show-gtyIcon show-gtyIcon_bg6">
					<h3>用户点评</h3>
				</div>
				<div class="show-gtyProTxtInfos">

					<div class="show-gtyProxcList clearfix">
						<span class="show-dp_Menu">满意度 </span>
						<span class="show-dp_Menu"><b>满意（0） </b></span>
						<span class="show-dp_Menu"><b>一般 （0） </b></span>
						<span class="show-dp_Menu"><b>不满意（0） </b></span>
					</div>
				</div>
			</div>
			
			<div class="show-gtyPror_tese clearfix">
				<div class="show-gtyIcon show-gtyIcon_bg7">
					<h3>常见问题</h3>
				</div>
				<div class="show-gtyProTxtInfos">


					<div class="show-gtyProxcList">
						<h3 class="show-pricestxt">预订限制 <span>以下问答结果仅供参考，可能因客人选择的资源、班期不同而有所变化。</span></h3>
					</div>


				</div>
			</div>


		</div>
	</div>
	
	<!-- 编辑区 -->


	</div> <!-- container-content end -->
	<script type="text/javascript">
	//获取小图并添加鼠标移入事件
	$("#tuangoudetail_did ul li img").click(function(){
		$("#tuangoudetail_mid").attr("src",$(this).attr('src'));
	});
    </script>
@endsection	