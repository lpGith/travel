@extends('base.base')

@section('title', '旅游资讯')
@section('css_js')
	<script type="text/javascript" src="{{asset('./goupiaos/jquery-1.11.3.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('./goupiaos/common.js')}}"></script>
	<link rel="stylesheet" href="{{asset('./goupiaos/base.css')}}" type="text/css">
	<link rel="stylesheet" href="{{asset('./goupiaos/style.css')}}" type="text/css">
	<link rel="stylesheet" href="{{asset('./goupiaos/responsiveslides.css')}}">
	<link rel="stylesheet" href="{{asset('./goupiaos/slider.css')}}">

	<script type="text/javascript" src="{{asset('./goupiaos/responsiveslides.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('./goupiaos/slides.min.jquery.js')}}"></script>
@endsection	
@section('body')
<body>
@endsection	
@section('content')
		<div style="width:100%;height:1px;background:gray;"></div>

	<div class="container-content">

  		<div style="margin-top:40px;"></div>

		<div class="crumbs marginTop">
			<p><a href="/">首页</a><span>&gt;</span><a href="/news/">新闻动态</a><span>&gt;</span><a href="/news/7.html" class="cur">旅游资讯</a></p>  
		</div>
		<div style="margin-top:20px;"></div>
		<div class="news_list-wrap clearfix marginTop">
			<div class="news_show-lBox">
				<h1 class="news_show-title">{{ $list->xinwen_name}}</h1>
				<p class="news_show-ftitle">{{ date('y-m-d',$list->xinwen_addtime)}}  |  来源：{{$list->xinwen_address}} 本源码来自：ZYE.CC</p>
				<span class="news_show-view">阅读 <i>{{$list->xinwen_clicknum}}</i> 次</span>
				<span>{!! $list->xinwen_content !!}</span>
				


			</div>
			
		</div>
	</div>
	@endsection