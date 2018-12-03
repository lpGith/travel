@extends('base.base')

@section('title', '酒店列表')
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
		<p><a href="http://www.travelzjj.com/">首页</a><span>&gt;</span><a href="http://www.travelzjj.com/book">优惠预订</a><span>&gt;</span><a href="{{asset('./goupiaos1/门票 - 优惠预订 - 张家界旅游官网.html')}}" class="cur">酒店</a></p>  
	</div>
	
	<div class="gty-menuWrap marginTop">
		<div class="gty-menuList clearfix">
			<ul>
				<li><a href="{{URL('./goupiaolinelist')}}">跟团游</a></li>
				<li><a href="{{URL('./goupiaolist')}}" >门票</a></li>
				<li><a href="{{URL('./goupiaohotellist')}}" class="nowCur">酒店</a></li>
				
			</ul>
		</div>
		<div class="gty-searchBtn_box">
			<ul class="select">
				
				
				<li class="select-list">
					<dl id="select1">
						<dt>所属地区：</dt>
						<dd class="select-all selected"><a href="/goupiaohotellist">不限</a></dd>
						<dd><a href="javascript:void(0)" onclick="doclick(this,'jiugou_address')">张家界市区</a></dd>
						<dd><a href="javascript:void(0)" onclick="doclick(this,'jiugou_address')">张家界景区</a></dd>
						<dd><a href="javascript:void(0)" onclick="doclick(this,'jiugou_address')"> 凤凰古城</a></dd>
						<dd><a href="javascript:void(0)" onclick="doclick(this,'jiugou_address')">长沙韶山</a></dd>
					</dl>
				</li>
				
				<li class="select-list">
					<dl id="select2">
						<dt>级别评定：</dt>
						<dd class="select-all selected"><a href="/goupiaohotellist">不限</a></dd>
						<dd><a href="javascript:void(0)" onclick="doclick(this,'jiugou_pingji')">五星级</a></dd>
						<dd><a href="javascript:void(0)" onclick="doclick(this,'jiugou_pingji')">四星级</a></dd>
						<dd><a href="javascript:void(0)" onclick="doclick(this,'jiugou_pingji')">三星级</a></dd>
						<dd><a href="javascript:void(0)" onclick="doclick(this,'jiugou_pingji')">经济酒店</a></dd>
						<dd><a href="javascript:void(0)" onclick="doclick(this,'jiugou_pingji')">特色客栈</a></dd>
					</dl>
				</li>
				
				<li class="select-list">
					<dl id="select3">
						<dt>价格区间：</dt>
						<dd class="select-all selected"><a href="/goupiaohotellist">不限</a></dd>
						<dd><a href="javascript:void(0)" onclick="doclick(this,'jiugou_price1')">0-100</a></dd>
						<dd><a href="javascript:void(0)" onclick="doclick(this,'jiugou_price1')">101-200元</a></dd>
						<dd><a href="javascript:void(0)" onclick="doclick(this,'jiugou_price1')">201-500元</a></dd>
						<dd><a href="javascript:void(0)" onclick="doclick(this,'jiugou_price1')">500元以上</a></dd>
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
					<a href="/goupiaohoteldetail?id={{$xx->id}}" class="proimg"><img src="./uploads/{{$xx->jiugou_picname}}"></a>
					<div class="pro-listTxt">
						<h3><a href="/goupiaohoteldetail?id={{$xx->id}}">{{$xx->jiugou_name}}</a></h3>
						<p><em>地址：</em>{{$xx->jiugou_address}}</p>
						<p><em>简介：</em>{{$xx->jiugou_jianjie}}</p>
					</div>
					<div class="pro-listPrice">
						<span><em>￥</em>{{$xx->jiugou_price1}} <i>起</i></span>
						
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
									<td>{{$xx->jiugou_piaozhong}}</td>
									<td>￥{{$xx->jiugou_price1}}</td>
									<td><span>￥{{$xx->jiugou_price2}}</span></td>
									<td>{{$xx->jiugou_pay}}</td>
									<td><a href="/goupiaopayhotel?id={{$xx->id}}" >预订</a></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
 				
 			</div>
			@endforeach
			<div id="pageInfo" class="public-pageBox marginTop p_pageWrap">
				<div class="p_pageBox"><a href="/goupiaohotellist">首页</a><a href="/goupiaohotellist">上一页</a><a href="/goupiaohotellist">1</a><span class="nowcur">2</span><span>2/2页</span></div>
			</div>
		</div>
		<div class="pro-siderBarWrap">
			
			<div class="pro-siderInfo">
				<dl class="clearfix">
					<dt>热</dt>
					<dd>热卖推荐</dd>
				</dl>
				@foreach($list as $xx)
				<div class="pro-siderList clearfix">
					<h3><a href="/goupiaohoteldetail?id={{$xx->id}}">{{$xx->jiugou_name}}</a></h3>
					<p>入园保证</p>
					<span><i>￥</i>{{$xx->jiugou_price1}} <em>起</em></span>
				</div>
				@endforeach
			</div>
		</div>
	</div>
	<!--多次搜索开始-->
		<script type='text/javascript'>
			function addUrlPara(name, value) { 
				//获取当前的URL的值
				var currentUrl = window.location.href.split('#')[0];  
				if (/\?/g.test(currentUrl)) {  
					if (/name=[-\w]{4,25}/g.test(currentUrl)) {  
						currentUrl = currentUrl.replace(/name=[-\w]{4,25}/g, name + "=" + value);  
					}else {  
						//追加&a=b
						currentUrl += "&" + name + "=" + value;  
					}  
				}else {  
					//？a=b
					currentUrl += "?" + name + "=" + value;  
				}  
				if (window.location.href.split('#')[1]) {  
					window.location.href = currentUrl + '#' + window.location.href.split('#')[1];  
				}else {  
					window.location.href = currentUrl;  
				}  
			} 
			function doclick(a,b){
				var dd = a.innerHTML;
			//调用给URL添加值的函数
				addUrlPara(b,dd);
				//$("#select1 dd").addClass("selected");
			}
			
			
		</script>
	<!-- 产品列表  end -->
@endsection	