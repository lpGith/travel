@extends('base.base')

@section('title', '绝美风景列表页')
@section('css_js')
	<script type="text/javascript" src="{{asset('./jingdianlists/jquery-1.11.3.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('./jingdianlists/common.js')}}"></script>
	<link rel="stylesheet" href="{{asset('./jingdianlists/base.css')}}" type="text/css">
	<link rel="stylesheet" href="{{asset('./jingdianlists/style.css')}}" type="text/css">
@endsection	
@section('body')
<body class="all-body_bg2">
@endsection	
@section('content')	
	<div class="all-publicBox all-footer_bg2">
		
		<div class="container-content">
		
			<div class="all-listBox marginTop600">
				@foreach($data as $yy)	
				<h2 class="all-titles1">{{$yy[0]->jingdian_name}}</h2>	
				<ul class="all-list cl">
					@foreach($yy as $zz)
				<li><a href="/jingdiandetail?id={{$zz->id}}&uid={{$mm->id}}" target="_blank"><img src="./uploads/{{$zz->jingdian_picname}}"><p>{{$zz->jingdian_tuming}}</p></a></li>
					@endforeach
				</ul>
				@endforeach	
			</div>	
		</div>
	</div>
@endsection		
	