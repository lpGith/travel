<html>
<head>
    <link href="{{asset('admins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="{{asset('admins/bootstrap/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="{{asset('admins/bootstrap/css/ionicons.min.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{asset('/zhoubian/css/public_index.css')}}" />
    <link rel="stylesheet" href="{{asset('/zhoubian/css/list.css')}}" />
    <link rel="stylesheet" href="{{asset('./jingdianlists/style1.css')}}" type="text/css">
	<link rel="stylesheet" href="{{asset('./css_index/font-awesome.css')}}" />
    <!-- Theme style -->
    <style>
	#daohang_id li.active{display:block;border:1px solid white;width:100px;height:40px;float:left;margin:20px 5px;}
	#daohang_id li.active a{font-size:15px;line-height:30px;}
	#daohang_id li .index_box{width:1200px;height:60px;position:absolute;top:80px;left:0;margin-left:350px;background-color:rgba(0,0,0,0.15);display:none;z-index:1000;}
	#daohang_id li .index_box a{display:block;height:30px;float:left;color:#fff;line-height:60px;border:none;background:none;margin-left:30px;}
	#daohang_id li .index_box a:hover{text-decoration:underline;color:#46bd01}
	</style>
</head>

<body>
<!-- 导航栏开始 -->
	<div style="border:1px solid white;height:75px;width:100%;background-color:white;">
			<!-- Logo -->
			<div >
				<a class="scroll" href="#home">
				<img style="padding:20px 50px;float:left;"src="{{asset('./images_index/logo.png')}}" alt="Logo" />
				</a>
			</div>
		
				<ul id="daohang_id" style="float:right;width:auto;display:block;height:82px;">
					<li class="active" style ="margin-left:20px;"><a class="scroll"  href="/">首页</a></li>
					<li class="active">
						<a class="scroll" >全景张家界</a>
						<div class="index_box">
							<a href="/jingdianlist?id=16">绝美风景</a>
							<a href="/jingdianlist?id=20">历史景观</a>
							<a href="/jingdianlist?id=47">文化艺术</a>
							<a href="/jingdianlist?id=51">户外休闲</a>
							<a href="/jingdianlist?id=54">多彩生物</a>
						</div>
					</li >
					
					<li class="active">
						<a class="scroll" >景区资讯</a>
						<div class="index_box">
							<a href="/xinwenliebiao">新闻首页</a>
							<a href="/jingqulist">景区公告</a>
							<a href="/jingquliebiao">景区动态</a>
							<a href="/xinwenliebiao">旅游资讯</a>
							<a href="/bendiliebiao">本地新闻</a>	
						</div>
					</li>
					<li class="active">
						<a class="scroll" href="/goupiao">票务信息</a>
						<div class="index_box">
							<a href="/goupiaolist">景点门票</a>
							<a href="/goupiaohotellist">酒店订票</a>
							<a href="/goupiaolinelist">团游订票</a>
						</div>
					</li>
					<li class="active">
						<a class="scroll" >精彩周边</a>
						<div class="index_box">
							<a href="/zhoubian/zhulist">酒店客栈</a>
							<a href="/zhoubian/zoulist">出行指南</a>
							<a href="/zhoubian/chilist">餐饮美食</a>
							<a href="/zhoubian/wanlist">娱乐活动</a>
							<a href="/zhoubian/youlist">经典路线</a>
							<a href="/zhoubian/mailist">特产推荐</a>
						</div>
					</li>
					<li class="active"><a class="scroll" href="/blog">互动论坛</a></li>
					
					@if(session("user")==null)
						<li class="active"><a class="scroll" href="/Web/denglu">登录</a></li>
						<li class="active"><a class="scroll" href="/Web/add">注册</a></li>
					@else
						<li class="active" ><a class="scroll" >亲爱的<span style="color:blue;">{{session('user')->name}}</span>,您好！</a></li>
						<li class="active"><a class="scroll" href="aa/{{session('user')->id}}/edit">个人中心</a></li>
						<li class="active"><a class="scroll" href="/Web/logout">退出登录</a></li>
					@endif			
				</ul>
			
	</div>	
<!-- end 导航栏 -->
<div class="box_os" style="z-index:99">
	<div class="os_x"></div>
    <div class="osqq">
    <p><em>(工作日：9:30-18:30)</em></p>
    	<p><strong>在线QQ</strong></p>
        <p id="ico_onlineqq" class="qq"></p>
        <p><strong>客服电话</strong><span>15611111111</span></p>
    </div>
    <div class="acbox">
    	<a class="ico_pp" onclick="FeedbackUtil.feed('#');" href="javascript:void(0);" title=""></a>
        <a class="ico_gt" href="#" target="_self" title=""></a>
    </div>
</div>
@section('bianji')