<!DOCTYPE html>
<head>
	
	<title>Contact - Black White HTML5 Template</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="{{asset('1_files/site_nav.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('1_files/mail.css')}}">
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
				  <li><a href="/password"><i class="fa fa-send-o fa-medium"></i>密码修改</a></li>
				  <li><a href="/vita_post"><i class="fa fa-comments-o fa-medium"></i>我的帖子</a></li>
				  <li><a href="#"><i class="fa fa-gears fa-medium"></i>我的订单</a></li>
				
                  <li><a href="/blog"><i class="fa fa-envelope-o fa-medium"></i>返回论坛</a></li>
                  <li><a href="/"><i class="fa fa-envelope-o fa-medium"></i>返回旅游</a></li>
				</ul>
			</div>
		</div> <!-- left section -->
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 white-bg right-container">
			<h1 class="logo-right hidden-xs margin-bottom-60">订单</h1>
			<div class="tm-right-inner-container">
				<h1 class="templatemo-header">订单详情</h1>
				<div class="row">
                    <div class="col-sm-12 col-md-12">	
					<div class="box-body" style="border:1px solid red;margin-top:10px;">
					  <table class="table table-bordered">
						<tr>
						  <th style="width:60px">订单号</th>
						 
						  <th>订单类型id</th>
						   <th>景点名称</th>
						  <th>姓名</th>
						 
						  <th>身份证号</th>
						  <th>手机号</th>
						  <th>总金额</th>
						  <th>是否付款</th>
						  <th>出发日期</th>
						  <th>交易时间</th>
						  <th style="width: 100px">操作</th>
						</tr>                   
						  @foreach ($list as $xx)
						<tr>
							<td>{{$xx->id}}</td>
							
							<td>{{$xx->pay_type}}</td>
							<td>{{$xx->pay_jingdianname}}</td>
							<td>{{$xx->pay_name}}</td>
							<td>{{mb_strcut($xx->pay_ID,0,3)}}***</td>
							
							<td>{{mb_strcut($xx->pay_phone,0,7)}}****</td>
							<td>{{$xx->pay_total}}</td>
							<td>{{($xx->pay_state==1)?"未付款":"已经付款"}}</td>
							<td>{{$xx->pay_time}}</td>
							<td>{{date("Y-m-d",$xx->pay_addtime)}}</td>
							<td>
								
								
								<?php 
									
									
										if($xx->pay_state==1){
											$a = $xx->pay_time;
											if(strtotime("{$a} 00:12:12")<time()){
												echo "订单已过期";
											}else{
												if($xx->pay_type=="景点门票"){
													echo "<a href=\"/orderpay?id={$xx->id}&tid={$xx->tid}\">去付款</a>";
												}elseif($xx->pay_type=="酒店订票"){
													echo "<a href=\"/orderpay1?id={$xx->id}&tid={$xx->tid}\">去付款</a>";
												}elseif($xx->pay_type=="跟团游订票"){
													echo "<a href=\"/orderpay2?id={$xx->id}&tid={$xx->tid}\">去付款</a>";
												}
											}
												
											
										}else{
											echo "交易完成";
										}
									
								?>
								
							</td>
						</tr>
					@endforeach                 
					  </table>
					</div><!-- /.box-body -->
				</div>
                   
                   
   
                    <div class="clearfix"></div>
                </div>
			</div>	
		</div> <!-- right section -->
	
					
	</body>
</html>