@extends('base.base')

@section('title', '门票订单')
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
        <a id="logo" href="http://www.tuniu.com/" title="张家界旅游网"><img class="tn_logo" src="{{asset('./goupiaoorders/new_logo_v4.gif')}}" alt="途牛旅游网"></a>

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
            <label>温馨提示：本产品仅限成人预订
					优惠票请自行前往张家界天门山国家森林公园景区购买。				
					需在游玩日期前七天16:30前预订。
					退订或修改订单需在订单日期前七天16:00前申请，逾期不作更改及退款。如订单发起退款，将扣除订单金额5%作为手续费。
					如订单为多人订单，不可对订单进行部分修改或退订，需取消订单后重新预订。
					对于已兑换门票，不支持退换票服务。（春节假期期间不退不改）
			</label>   
        </div>
       
		<div class="field J_departCity">
            <label  style="margin-left:40px;"><a href="/" style="color:blue;">返回首页</a></label>   
            <label id="orderdetail_id"  style="color:green;margin-left:530px;">查看订单详情∨</label>   
        </div>
		<div class="field J_departCity orderdetail" style="display:none;">
            <label  style="margin-left:40px;"><a href="#" style="color:blue;">景点名：{{$list->list_name}}</a></label>   
            <label  style="color:green;margin-left:500px;">{{$model->pay_total}}.00元</label>   
        </div>
		<div class="field J_departCity orderdetail" style="display:none;">
            <label  style="margin-left:40px;">景点地址：{{$list->list_address}}</label>   
        </div>
		<div class="field J_departCity orderdetail" style="display:none;">
            <label  style="margin-left:40px;">姓名：{{mb_strcut($model->pay_name,0,4)}}**</label>   
        </div>
		<div class="field J_departCity orderdetail" style="display:none;">
            <label  style="margin-left:40px;">身份证号：{{mb_strcut($model->pay_ID,0,6)}}************</label>   
        </div>
		<div class="field J_departCity orderdetail" style="display:none;">
            <label  style="margin-left:40px;">票种：{{$list->list_piaozhong}}</label>   
        </div>
		<div class="field J_departCity orderdetail" style="display:none;">
            <label  style="margin-left:40px;">票数：{{$model->pay_num}}</label>   
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
       <a href="/goupiaodetail?id={{$xx->id}}" class="proimg"><img src="./uploads/{{$xx->list_picname}}"></a>
	
		<div style="float:right;margin-right:40px;">
		<a>{{$xx->list_name}}：景点名</a><br><br><br><br>
		<a>{{$xx->list_address}}：地址</a><br><br><br><br><br>
		<a>{{$xx->list_shichangprice}}/人起：票价<a/><br><br><br>
		
		</div>
    </div>
	@endforeach
</div>



<script type="text/javascript"  src="{{asset('./public_js/jquery-1.8.3.min.js')}}"></script>
<script type="text/javascript">

$("#orderdetail_id").click(function(){
	//alert("aa");
	$(".orderdetail").toggle();
});		
</script>
@endsection	