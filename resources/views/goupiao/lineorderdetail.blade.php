@extends('base.base')

@section('title', '团游订单')
@section('css_js')
    <link rel="stylesheet" href="{{asset('./goupiaoorders/orderreset.css')}}"  type="text/css">
    <link rel="stylesheet" href="{{asset('./goupiaoorders/orderstyle.css')}}"  type="text/css">
@endsection	
@section('body')
<body>
@endsection	
@section('content')    
<div class="head2nd">
    <div class="content clearfix">
        <a id="logo" href="/" title="张家界旅游网"><img class="tn_logo" src="{{asset('./goupiaoorders/new_logo_v4.gif')}}" alt="途牛旅游网"></a>

        <div class="order_steps">
            <div class="flow_num">
                <ol class="clearfix">
                    <li class="grey">1</li>
                    <li class="grey_line"></li>
                    <li class="grey">2</li>
                    <li class="grey_line"></li>
                    <li class="green">3</li>
                    
                </ol>
            </div>
            <div class="flow_word">
                <ol class="clearfix">
                    <li class="grey">填写订单</li>
                    <li class="grey">付款</li>
                    <li class="green">预订成功</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="wrapper">
<div class="content clearfix">
<!--order box start-->
<div class="order_box" id="order_box">
    <h1 class="order_title " style="color:blue;text-align:center;">恭喜您，订票成功！</span></h1>
	<h3 style="color:blue;text-align:center;">我们已将您的订单信息发送至您的邮箱，请注意查收！</h3>
    <div class="order_form" style="background-color:#DDDDDD;">
        <div class="field J_departCity">
            <label>温馨提示：1.出行前1天您将收到出团通知书或导游的确认电话，敬请留意，保持电话畅通。网上集合的时间仅供参考，具体时间请以出团通知书或导游通知为准。
							2. 持军官证、老年证、学生证的游客可享受景区门票优惠政策，具体以出行当日景区公布政策为准，请具备条件的游客携带好相关证件并提前交给导游，届时由导游统一安排，按打包行程中客人已享的优惠价格，现场退还差价。
							3. 张家界景区内野生猕猴较多，需小心，千万不要主动挑逗猕猴，尤其是不要挑衅猕猴，以免造成不必要的伤害......<span id="read_more" style="color:blue;">查看更多∨</span>
							<p style="display:none;" id="more_id">
							4. “行程介绍”中涉及的交通时间、游览、停留时间、酒店住宿以当天实际游览为准
							5.湖南实行环保，酒店不主动提供一次性洗漱用品（拖鞋、牙刷、牙膏、香皂、沐浴液等），请游客自备；
							6.张家界山区多雨，每年逢5-10月为汛期，宜带雨具；若遇雨天游览，景区内外任何水流湍急区域，请不要靠近；另景区台阶较多，为防台阶打滑，请穿防滑的运动鞋；登山时穿舒适的衣服和轻便旅游鞋；早晚山上温度低，请自备好御寒衣物；
							7.景区游览一定要思想集中，谨慎缓行，走路不观景，观景脚步要特别小心，要看得准，走得稳。鞋子要穿厚底防滑的运动鞋，不宜穿光底和硬底鞋。女士宜穿平底鞋，不宜穿长裙。
							8.若有寺庙景点，进入庙宇请勿大声喧哗。烧香拜佛请愿捐功德需随自己意愿，切莫听旁人言语，以免上当受骗。（尤其不要让和尚、道士看相说道，除非你是行家，有足够的辨别能力）。不要相信小摊小贩的推销。购买本地特产时最好有行家指导；别相信“人形何首乌”，那是千年难遇。除非你是行家，认识药材你觉得价钱合适才购买。
							9.湖南饮食口味较重，以辣出名，不同地区旅客可能一时难以适应，易引起水土不服，请旅客自备常用药。旅途中饮食宜清淡，多吃蔬菜水果。夏天不要吃太多冷饮，以便肠胃不适，影响游览行程。
							10.湘西地区经济条件差，酒店规模较小，条件不能以大城市标准衡量，热水、空调会限时供应，入住时请向酒店前台或导游了解清楚供应时间。用电高峰可能出现停电跳闸现象，请客人有心理准备，请勿惊慌！目前四星标准以上的酒店条件尚可，热水空调会全天供应！
							11. 凤凰古城节假日会根据客流情况作出城内车辆限行措施，届时可能旅游车不能送至酒店，需客人由古城外步行至酒店（步行时间根据酒店位置而有所不同，平均大约20分钟）。
							12.旺季团队较多，一般团队都会出发的比较早。建议早一点出发、免得进门票站、到缆车都要排队。宁愿早起一小时也不要在门票站、缆车站排队等候几小时。请配合导游早起安排游览。
							13.我司可根据实际情况，在证行程景点游览的前提下，有权对景点游览的先后顺序作合理的调整。
							14. 武陵源景区必须换乘景区内环保车 ，旺季由于张家界旅游车资源紧张，车队统一调派用车。游客所乘坐的旅游车可能会轮换，游客私人贵重物品请随身携带（相机、钱包等），以免丢失。我司会本着“客人至上”的原则，尽量保证不让客人等车。
							15.	湖南特产：湘绣、菊花石、红瓷、砂石画、湘莲、银鱼、益阳皮蛋、南岳腐乳、各式云雾茶、毛尖茶、君山银针茶、剁辣椒、各式腊鱼、腊肉、腊肠等、各式菇类菌类、各类麻辣熟食食品。
							</p>
			</label>   
        </div>
       
		<div class="field J_departCity">
            <label  style="margin-left:40px;"><a href="/" style="color:blue;">返回首页</a></label>   
            <label id="orderdetail_id"  style="color:green;margin-left:530px;">查看订单详情∨</label>   
        </div>
		<div class="field J_departCity orderdetail" style="display:none;">
            <label  style="margin-left:40px;"><a href="/" style="color:blue;">团游名：{{$list->tuangou_name}}</a></label>   
            <label  style="color:green;margin-left:500px;">{{$model->pay_total}}.00元</label>   
        </div>
		<div class="field J_departCity orderdetail" style="display:none;">
            <label  style="margin-left:40px;">游览地址：{{$list->tuangou_chufa}}-->{{$list->tuangou_mudi}}</label>   
        </div>
		<div class="field J_departCity orderdetail" style="display:none;">
            <label  style="margin-left:40px;">姓名：{{mb_strcut($model->pay_name,0,4)}}**</label>   
        </div>
		<div class="field J_departCity orderdetail" style="display:none;">
            <label  style="margin-left:40px;">身份证号：{{mb_strcut($model->pay_ID,0,6)}}************</label>   
        </div>
		<div class="field J_departCity orderdetail" style="display:none;">
            <label  style="margin-left:40px;">成人数量：{{$model->pay_num}}</label>   
        </div>
		<div class="field J_departCity orderdetail" style="display:none;">
            <label  style="margin-left:40px;">儿童数来量：{{$model->pay_num1}}</label>   
        </div>
		<div class="field J_departCity orderdetail" style="display:none;">
            <label  style="margin-left:40px;">交易金额：{{$model->pay_total}}.00元</label>   
        </div>
		<div class="field J_departCity orderdetail" style="display:none;">
            <label  style="margin-left:40px;">出发日期：{{$model->pay_time}}</label>   
        </div>
		<div class="field J_departCity orderdetail" style="display:none;">
            <label  style="margin-left:40px;">交易号：{{$model->id}}</label>   
        </div>
		<div class="field J_departCity orderdetail" style="display:none;">
            <label  style="margin-left:40px;">交易类型：{{$model->pay_type}}</label>   
        </div>
		<div class="field J_departCity orderdetail" style="display:none;">
            <label  style="margin-left:40px;">交易日期：{{date("Y-m-d H:i:s",$model->pay_addtime)}}</label>   
        </div>
		<div class="field J_departCity orderdetail" style="display:none;">
            <label  style="margin-left:40px;color:green;">是否付款: {{$model->pay_state=='2'?"付款成功":"未付款"}}</label>   
        </div>
    </div>
</div>
<div class="order_box" id="order_box">
    <h1 class="order_title"></span>推荐你可能喜欢</span></h1>
	@foreach($data as $xx)
    <div class="order_form" style="background-color:#DDDDDD;">
       <a href="/goupiaolinedetail?id={{$xx->id}}" class="proimg"><img width="250" src="./uploads/{{$xx->tuangou_picname}}"></a>
	
		<div style="float:right;margin-right:0px;">
		<a>{{mb_strcut($xx->tuangou_name,0,80)}}...：团游名</a><br><br><br><br>
		<a>{{$xx->tuangou_bianhao}}：产品编号</a><br><br><br>
		<a>{{$xx->tuangou_price1}}/间起：票价<a/><br>
		
		</div>
    </div>
	@endforeach
</div>



<script type="text/javascript"  src="{{asset('./public_js/jquery-1.8.3.min.js')}}"></script>
<script type="text/javascript">
//判断点击人数减号时价格的控制

$("#orderdetail_id").click(function(){
	//alert("aa");
	$(".orderdetail").toggle();
});	
$("#read_more").click(function(){
	//alert("aa");
	$("#more_id").toggle();
});
</script>
@endsection	