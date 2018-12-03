@extends('base.base')

@section('title', '旅游咨询')
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
			<div class="news_list-lBox" style="width:100%;">
				@foreach($list as $xx)
				<ul>
					<li>
						<h3><a href="/xinwenxiangqing?id={{$xx->id}}">{{ $xx->xinwen_name}}</a></h3>
						<p>发布方:{{ $xx->xinwen_address }}</p>
						<span>发布时间:{{ date('y-m-d',$xx->xinwen_addtime) }}</span>
					</li>
					
				</ul>
				@endforeach

				@endsection	