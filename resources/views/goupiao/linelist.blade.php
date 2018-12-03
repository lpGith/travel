@extends('base.base')

@section('title', '团游列表')
@section('css_js')
	<script type="text/javascript" src="{{asset('./tuangoulist/jquery-1.11.3.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('./tuangoulist/common.js')}}"></script>
	<link rel="stylesheet" href="{{asset('./tuangoulist/base.css')}}" type="text/css">
	<link rel="stylesheet" href="{{asset('./tuangoulist/style.css')}}" type="text/css">
	<link rel="stylesheet" href="{{asset('./goupiaos1/goupiaolistslider.css')}}" type="text/css">
    <script type="text/javascript" src="{{asset('./tuangoulist/slides.min.jquery.js')}}"></script>
@endsection	
@section('body')
<body>
@endsection	
@section('content')
	<div class="container-content">
  	<div style="width:100%;height:2px;background:blue;"></div>
	<div class="crumbs marginTop">
		<p><a href="/">首页</a><span>&gt;</span><a href="/goupiao">优惠预订</a><span>&gt;</span><a href="/goupiaolinelist" class="cur">跟团游</a></p>  
	</div>
	
	<div class="gty-menuWrap marginTop">
		<div class="gty-menuList clearfix">
			<ul>
				<li><a href="{{URL('./goupiaolinelist')}}" class="nowCur">跟团游</a></li>
				<li><a href="{{URL('./goupiaolist')}}">门票</a></li>
				<li><a href="{{URL('./goupiaohotellist')}}">酒店</a></li>
				
			</ul>
		</div>
		<div class="gty-searchBtn_box">
			<ul class="select">
				
				<li class="select-list">
					<dl id="select1">
						<dt>目的地：</dt>
						<dd class="select-all selected"><a href="/goupiaolinelist">不限</a></dd>
						<dd><a href="javascript:void(0)" onclick="doclick(this,'tuangou_mudi')">张家界</a></dd>
						<dd><a href="javascript:void(0)" onclick="doclick(this,'tuangou_mudi')">韶山</a></dd>
						<dd><a href="javascript:void(0)" onclick="doclick(this,'tuangou_mudi')">凤凰</a></dd>
						<dd><a href="javascript:void(0)" onclick="doclick(this,'tuangou_mudi')">长沙</a></dd>
					</dl>
				</li>
				<li class="select-list">
					<dl id="select2">
						<dt>行程天数：</dt>
						<dd class="select-all selected"><a href="/goupiaolinelist">不限</a></dd>                               
						<dd><a href="javascript:void(0)" onclick="doclick(this,'tuangou_name')">1日</a></dd>
						<dd><a href="javascript:void(0)" onclick="doclick(this,'tuangou_name')">2日</a></dd>
						<dd><a href="javascript:void(0)" onclick="doclick(this,'tuangou_name')">3日</a></dd>
						<dd><a href="javascript:void(0)" onclick="doclick(this,'tuangou_name')">4日</a></dd>
						<dd><a href="javascript:void(0)" onclick="doclick(this,'tuangou_name')">5日</a></dd>
						<dd><a href="javascript:void(0)" onclick="doclick(this,'tuangou_name')">6日以上</a></dd>
					</dl>
				</li>
				<li class="select-list">
					<dl id="select3">   
						<dt>出发地点：</dt>
						<dd class="select-all selected"><a href="/goupiaolinelist">不限</a></dd>
						<dd><a href="javascript:void(0)" onclick="doclick(this,'tuangou_chufa')">张家界</a></dd>
						<dd><a href="javascript:void(0)" onclick="doclick(this,'tuangou_chufa')">长沙</a></dd>
						<dd><a href="javascript:void(0)" onclick="doclick(this,'tuangou_chufa')">凤凰</a></dd>
						<dd><a href="javascript:void(0)" onclick="doclick(this,'tuangou_chufa')">重庆</a></dd>
					</dl>
				</li>
				
			</ul>

		</div>
	</div>
	
	<!-- 产品列表  begin -->
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
					<a href="/goupiaolinedetail?id={{$xx->id}}" class="proimg"><img src="./uploads/{{$xx->tuangou_picname}}" alt="（豪华款）张家界2日1晚跟团游 ·美丽张家界新传奇 天门山"></a>
					<div class="pro-listTxt">
						<h3><a href="/goupiaolinedetail?id={{$xx->id}}">{{$xx->tuangou_name}}</a></h3>
						<p><b>产品编号：</b>{{$xx->tuangou_bianhao}}</p>
						<p><em>出发日期：</em>每天发团</p>
						<p><em>行程概要：</em>{{$xx->tuangou_gaiyao}}</p>
					</div>
					<div class="pro-listPrice">
						<span><em>￥</em>{{$xx->tuangou_price1}} <i>起</i></span>
						<p>1人出游</p>
						<p>0人点评</p>
						<a href="/goupiaolinedetail?id={{$xx->id}}">查看详情</a>
					</div>
				</div>	
			</div>
			@endforeach
			<div id="pageInfo" class="public-pageBox marginTop p_pageWrap">
				<div class="p_pageBox"><span class="nowcur">1</span><a href="/goupiaolinelist2">2</a><a href="/goupiaolinelist2">下一页</a><a href="/goupiaolinelist2">末页</a><span>1/2页</span></div>
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
					<h3><a href="/goupiaolinedetail?id={{$xx->id}}">{{$xx->tuangou_name}}</a></h3>
					<p>入园保证</p>
					<span><i>￥</i>{{$xx->tuangou_price1}} <em>起</em></span>
				</div>
				@endforeach
			</div>
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
@endsection	