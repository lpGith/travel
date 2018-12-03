<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	@yield('css_js')
	<!-- 必须导入的两个css文件 -->
	<link rel="stylesheet" href="{{asset('./jingdianlists/style1.css')}}" type="text/css">
	<link rel="stylesheet" href="{{asset('./css_index/font-awesome.css')}}" />
	<style>
	ul{list-style:none;}
	#daohang_id li.active{display:block;border:1px solid white;width:100px;height:40px;float:left;margin:20px 5px;}
	#daohang_id li.active a{font-size:15px;line-height:30px;}
	#daohang_id li .index_box{width:1200px;height:60px;position:absolute;top:80px;left:0;margin-left:350px;background-color:rgba(0,0,0,0.15);display:none;z-index:1000;}
	#daohang_id li .index_box a{display:block;height:30px;float:left;color:#fff;line-height:60px;border:none;background:none;margin-left:30px;}
	#daohang_id li .index_box a:hover{text-decoration:underline;color:#46bd01}
	</style>
	
	<!-- end -->
</head>
@yield('body')
	<div id="top">
	<div id="izl_rmenu" class="izl-rmenu">
	<a href="http://bizapp.qq.com/webc.htm?new=0&sid=800160111&o=b.qq.com&q=7" class="btn btn-qq" target="_blank"></a>
	<div id="weixin_id" class="btn btn-wx">
	<img class="pic" id="weixin_id1"  src="./goupiaoorders/erweima.png" style="display: none;">
	</div>
	<div id="phone_id" class="btn btn-phone">
	<div class="phone" id="phone_id1" style="display: none;">400-1111-1111</div>
	</div>
	<div class="btn btn-top" onclick="window.scrollTo(0,0);" style="display: block;"></div>
	</div>
	</div>
	<!-- 导航栏开始 -->
	<div style="border:1px solid white;height:75px;width:100%;background-color:white;">
			<!-- Logo -->
			<div >
				<a class="scroll" href="#home">
				<img style="padding:20px 50px;float:left;"src="{{asset('./images_index/logo.png')}}" alt="Logo" />
				</a>
			</div>
		
				<ul id="daohang_id" style="float:right;width:auto;display:block;height:82px;">
					<li class="active" style ="margin-left:20px;"><a class="scroll"  href="/">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;首页</a></li>
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
							<a href="/xinwenhome">新闻首页</a>
							<a href="/jingquliebiao">景区动态</a>
							<a href="/xinwenliebiao">旅游资讯</a>
							<a href="/bendiliebiao">本地新闻</a>	
						</div>
					</li>
					<li class="active">
						<a class="scroll" href="#goupiao">票务信息</a>
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
						<li class="active"><a class="scroll" >亲爱的<span style="color:blue;">{{session('user')->name}}</span>,您好！</a></li>
						<li class="active"><a class="scroll" href="aa/{{session('user')->id}}/edit">个人中心</a></li>
						<li class="active"><a class="scroll" href="/Web/logout">退出登录</a></li>
					@endif			
				</ul>
			
	</div>	
<!-- end 导航栏 -->

	@yield('content')
	
<!-- 页脚 -->	
	<section id="footer">
		<div class="inner footer">
			<!-- Socials Media -->
			<div class="col-xs-12 footer-box animated" data-animation="tada" data-animation-delay="0">
				<!-- Social 1 -->
				<a class="footer-links"><i class="fa fa-facebook"></i></a>
				<a class="footer-links"><i class="fa fa-twitter"></i></a>	
				<a class="footer-links"><i class="fa fa-google-plus"></i></a>
				<a class="footer-links"><i class="fa fa-pinterest"></i></a>
				<a><img style="float:right;margin-right:30px;" onclick="window.scrollTo(0,0);"  src="./uploads/directional_up.png"></a>
				<p class="footer-text copyright">2018 @ ZYE.CC</p> 
			</div>
			<div class="clear"></div>
		</div> 	
	</section>
<!-- 页脚结束 -->
	<!--  该js导入看你自己是否导入，主要用来使用jquery -->
	<script type="text/javascript" src="{{asset('./js_index/jquery-1.11.1.min.js')}}"></script>
	@section('bianji')
	@show
	<script>
	
	//导航栏的js
	$(function () {
		var navLi=$("#daohang_id li");
		navLi.mouseover(function () {
			//$(this).find("a").addClass("current");
			$(this).find(".index_box").stop().slideDown();
		})
		navLi.mouseleave(function(){
			//$(this).find("a").removeClass("current");
			$(this).find(".index_box").stop().slideUp();
		})
	})
	$("#weixin_id").mouseover(function(){
		$("#weixin_id1").show();
	}).mouseout(function(){
		$("#weixin_id1").hide();
	});
	$("#phone_id").mouseover(function(){
		$("#phone_id1").show();
	}).mouseout(function(){
		$("#phone_id1").hide();
	});
	</script>
</body>
</html>	