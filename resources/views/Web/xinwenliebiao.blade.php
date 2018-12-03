@extends('base.base')
@section('title', '新闻首页')
@section('css_js')
	<script type="text/javascript" src="{{asset('xinwenliebiao_public/jquery-1.js')}}"></script>
	<script type="text/javascript" src="{{asset('xinwenliebiao_public/common.js')}}"></script>
	<link rel="stylesheet" href="{{asset('xinwenliebiao_public/base.css')}}" type="text/css">
	<link rel="stylesheet" href="{{asset('xinwenliebiao_public/style.css')}}" type="text/css">
@endsection	
@section('body')
<body>
@endsection	
@section('content')
	<div style="width:100%;height:1px;background:gray;"></div>

	<div class="container-content">
	<div class="crumbs marginTop">
		<p><a href="/">首页</a><span>&gt;</span><a href="#" class="cur">新闻动态</a></p>
	</div>
	<div class="news-rlBox clearfix marginTop">
		<div class="news-leftbox">
			<h3 class="news-title">今日头条</h3>
			<div class="news-travelWrap clearfix marginTop">
				<h3 class="news-travelTitle"><span>旅游资讯</span></h3>
				<div class="news-travelTop">
					<h2><a href="#"></a></h2>
					<span></span>
					<p></p>
				</div>
				<dl class="news-travelListWrap clearfix marginTop">
					<dt>
					<a href="#"><img src="{{asset('xinwenliebiao_public/041442170187.jpg')}}" style="width:270px;height:154px;"></a></dt><dd>
						@foreach($list as $xw)
						<a href="/xinwenxiangqing?id={{$xw->id}}">{{ $xw->xinwen_name}}</a>
						@endforeach
					</dd>
				</dl>
				<a href="/xinwenliebiao" class="moretxt">查看更多&gt;&gt;</a>
			</div>
			<div class="news-travelWrap clearfix marginTop">
				<h3 class="news-travelTitle"><span>景区动态</span></h3>

				<div class="news-travelTop">
					<h2><a href="#"></a></h2>
					<span> </span>
					<p></p></div>
				
				<dl class="news-travelListWrap clearfix marginTop">
					<dt>
					<a href="#"><img src="{{asset('xinwenliebiao_public/291431083759.jpg')}}" style="width:270px;height:154px;"></a></dt>
					<dd>
					@foreach($list1 as $xw1)
						<a href="/jingquxiangqing?id={{$xw1->id}}">{{ $xw1->xinwen_name}}</a>
					@endforeach	
					</dd>
				</dl>
				<a href="/jingquliebiao" class="moretxt">查看更多&gt;&gt;</a>
			</div>
			<div class="news-travelWrap clearfix marginTop" style="border-bottom: medium none;">
				<h3 class="news-travelTitle"><span>本地新闻</span></h3>

				<div class="news-travelTop">
					<h2><a href="#"></a></h2>
					<span> </span>
					<p></p></div>
				
				<dl class="news-travelListWrap clearfix marginTop">
					<dt>
					<a href="#"><img src="{{asset('xinwenliebiao_public/041443592442.jpg')}}" style="width:270px;height:154px;"></a></dt>					<dd>
						@foreach($list2 as $xw2)
						<a href="/bendixiangqing?id={{$xw2->id}}">{{ $xw2->xinwen_name}}</a>
						@endforeach
					</dd>
				</dl>
				<a href="/bendiliebiao" class="moretxt">查看更多&gt;&gt;</a>
			</div>
		</div>

		<div class="news-rightbox">

			<div class="news-rtopTxt">
				<h3>重要置顶</h3>
				<ul>

					<li><a href="#">国家旅游局肯定张家界市工商局旅游市场监管创新</a></li>

				</ul>
			</div>
		</div>
	</div>
	</div>
	<div style="width:100%;height:15px;background: #fff;"></div>
@endsection	