@extends('base.base')
@section('title', '门票购买列表')
@section('css_js')
	<script type="text/javascript" src="{{asset('./goupiaos1/jquery-1.11.3.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('./goupiaos1/common.js')}}"></script>
	<link rel="stylesheet" href="{{asset('./goupiaos1/base.css')}}" type="text/css">
	<link rel="stylesheet" href="{{asset('./goupiaos1/style.css')}}" type="text/css">
	<link rel="stylesheet" href="{{asset('./goupiaos1/goupiaolistslider.css')}}" type="text/css">
    <script type="text/javascript" src="{{asset('./goupiaos1/slides.min.jquery.js')}}"></script>
@endsection	
@section('body')
<body>
@endsection	
@section('content')

	<div class="container-content">
  	<div style="width:100%;height:2px;background:blue;"></div>
	<div class="crumbs marginTop">
		<p><a href="/">首页</a><span>&gt;</span><a href="/goupiao">优惠预订</a><span>&gt;</span><a href="/goupiaolist" class="cur">门票</a></p>  
	</div>
	
	<div class="gty-menuWrap marginTop">
		<div class="gty-menuList clearfix">
			<ul>
				<li><a href="{{URL('./goupiaolinelist')}}">跟团游</a></li>
				<li><a href="{{URL('./goupiaolist')}}" class="nowCur">门票</a></li>
				<li><a href="{{URL('./goupiaohotellist')}}">酒店</a></li>
				
			</ul>
		</div>
		<div class="gty-searchBtn_box">
			<ul class="select">
				
				<li class="select-list">
					<dl id="select1">
						<dt>所属地区：</dt>
						<dd class="select-all selected"><a href="/goupiaolist?id=0">不限</a></dd>
						<dd><a href="/goupiaolist?id=1">张家界</a></dd>
						<dd><a href="/goupiaolist?id=2">凤凰</a></dd>
						<dd><a href="/goupiaolist?id=3">长沙</a></dd>
					</dl>
				</li>
				
				<li class="select-list">
					<dl id="select2">
						<dt>级别评定：</dt>
						<dd class="select-all selected"><a href="/goupiaolist?uid=0">不限</a></dd>
						<dd><a href="/goupiaolist?uid=1">AAAAA</a></dd>
						<dd><a href="/goupiaolist?uid=2">AAAA</a></dd>
						<dd><a href="/goupiaolist?uid=3">未评级</a></dd>
					</dl>
				</li>
				
			
			</ul>
		</div>
	</div>	
	<div class="pro-contenter clearfix marginTop">
		<div class="pro-liestWrap">
			<div class="pro-leftTop">
				<dl class="clearfix">					
					<dd></dd>
				</dl>
			</div>
			@foreach($list as $xx)
			<div class="pro-listContent marginTop" id="contentinfo">
 				<div class="pro-list clearfix">
					<a href="/goupiaodetail?id={{$xx->id}}" class="proimg"><img src="./uploads/{{$xx->list_picname}}"></a>
					<div class="pro-listTxt">
						<h3><a href="/goupiaodetail?id={{$xx->id}}">{{$xx->list_name}}</a></h3>
						<p><em>地址：</em>{{$xx->list_address}}</p>
						<p><em>简介：</em>{{$xx->list_jianjie}}</p>
					</div>
					<div class="pro-listPrice">
						<span><em>￥</em>{{$xx->list_shichangprice}} <i>起</i></span>
						
					</div>

					<div class="tabInfo" style="clear: both">
						<table class="ticket-tab">
							<thead>
								<tr>
									<th>票种</th>
									<th>市场价</th>
									<th>优惠价</th>
									<th>兑换方式</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>{{$xx->list_piaozhong}}</td>
									<td>￥{{$xx->list_shichangprice}}</td>
									<td><span>￥{{$xx->list_youhuiprice}}</span></td>
									<td>{{$xx->list_style}}</td>
									<td><a href="/goupiaopay?id={{$xx->id}}" >预订</a></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
 				
 			</div>
			@endforeach
			<div id="pageInfo" class="public-pageBox marginTop p_pageWrap">
				<div class="p_pageBox"><span class="nowcur">1</span><span>1/1页</span></div>
			</div>
			
		</div>
		<div class="pro-siderBarWrap">
			
			<div class="pro-siderInfo">
				<dl class="clearfix">
					<dt>热</dt>
					<dd>热卖推荐</dd>
				</dl>
				@foreach($model as $xx)
				<div class="pro-siderList clearfix">
					<h3><a href="/goupiaodetail?id={{$xx->id}}">{{$xx->list_name}}</a></h3>
					<p>入园保证</p>
					<span><i>￥</i>{{$xx->list_shichangprice}} <em>起</em></span>
				</div>
				@endforeach
			</div>
		</div>

	</div>
	<!-- 产品列表  end -->
	</div>
	<script type="text/javascript">
		
			$("#select1 dd").removeClass("selected").eq({{session("id")}}).addClass("selected");
		
		
			$("#select2 dd").removeClass("selected").eq({{session("uid")}}).addClass("selected");
		
	</script>
	<!-- 产品列表  end -->
@endsection	
