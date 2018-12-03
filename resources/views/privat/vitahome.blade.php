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
			<h1 class="logo-right hidden-xs margin-bottom-60">信息</h1>		
			<div class="tm-right-inner-container">
				<h1 class="templatemo-header">我的个人中心</h1>
				<img src="{{asset('vita_public/images/wooden-desk.jpg')}}" alt="Wooden Desk" class="img-thumbnail">
			</div>	
		</div> <!-- right section -->
	</div>	
</body>
</html>