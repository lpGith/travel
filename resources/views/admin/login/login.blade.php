<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="{{asset('./admins/style/css/ch-ui.admin.css')}}">
	<link rel="stylesheet" href="{{asset('./admins/style/font/css/font-awesome.min.css')}}">
</head>
<body style="background:#F3F3F4;">
	<div class="login_box">
		<h1>青城山</h1>
		<h2>欢迎使用青城山管理平台</h2>
		<div class="form">
			@if(session("msg"))
				<p style="color:red;">{{session("msg")}}</p>
			@endif
			<form action="{{URl('admin/doLogin')}}" method="post">
				<input type="hidden" name="_token" value="<?php echo csrf_token();?>"></input>
				<ul>
					<li>
					<input type="email" name="email" class="text"/>
						<span><i class="fa fa-user"></i></span>
					</li>
					<li>
						<input type="password" name="password" class="text"/>
						<span><i class="fa fa-lock"></i></span>
					</li>
					<li>
						<input type="text" class="code" name="code"/>
						<span><i class="fa fa-check-square-o"></i></span>
						<img src="{{URL('admin/code/'.time())}}" onclick="this.src='{{URL('admin/code')}}/'+Math.random()" />
					</li>
					<li>
						<input type="submit" value="立即登陆"/>
					</li>
				</ul>
			</form>
			<p><a href="#">返回首页</a> &copy; 2018 ZLP.CC</p>
		</div>
	</div>
</body>
</html>