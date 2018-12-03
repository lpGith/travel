<!DOCTYPE html>
<head>
	<title>个人中心</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="{{asset('vita_public/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('vita_public/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('vita_public/css/templatemo_style.css')}}" rel="stylesheet" type="text/css">	
</head>
<body>
	<div class="templatemo-logo visible-xs-block">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 black-bg logo-left-container">
			<h1 class="logo-left">Black</h1>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 white-bg logo-right-container">
			<h1 class="logo-right">White</h1>
		</div>			
	</div>
	<div class="templatemo-container">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 black-bg left-container">
			<h1 class="logo-left hidden-xs margin-bottom-60">导航</h1>			
			<div class="tm-left-inner-container">
				<ul class="nav nav-stacked templatemo-nav">
				  <li><a href="/vita"><i class="fa fa-home fa-medium"></i>首页</a></li>
				  <li><a href="/aa/{{session('user')->id}}/edit"><i class="fa fa-shopping-cart fa-medium"></i>我的信息</a></li>
				  
				  <li><a href="/password"><i class="fa fa-comments-o fa-medium"></i>密码修改</a></li>
				  <li><a href="/vita_post" class="active"><i class="fa fa-send-o fa-medium"></i>我的帖子</a></li>
				  <li><a href="/centerorder"><i class="fa fa-gears fa-medium"></i>我的订单</a></li>
				  <li><a href="/blog"><i class="fa fa-envelope-o fa-medium"></i>返回论坛</a></li>
				  <li><a href="/"><i class="fa fa-envelope-o fa-medium"></i>返回旅游</a></li>
				</ul>
			</div>
		</div> <!-- left section -->
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 white-bg right-container">
			<h1 class="logo-right hidden-xs margin-bottom-60">我的帖子</h1>
			@foreach($vita_list as $vital)
			<div class="tm-right-inner-container">					
				<article class="templatemo-item">
					<h1 class="templatemo-header">{{ $vital->post_title }}</h1>
					<img src="/blog_uploads/s_{{ $vital->post_pic }}" class="img-thumbnail">
					<p style="height:3em;text-overflow:ellipsis;overflow:hidden;text-indent:2em;">{{ $vital->post_content }}</p>
					<a href="/show_more{{ $vital->post_id }}" class="btn btn-warning">查看更多</a>			
				</article><hr>
			</div>
			@endforeach
			<center><div id="page">{!! $vita_list->render() !!}</div></center>
		</div><!-- right section -->
	</div>	
</body>
</html>