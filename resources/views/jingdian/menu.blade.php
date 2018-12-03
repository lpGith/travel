<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>index</title>
		<style>
*{margin:0;padding:0;}	
.menu{width:100%;height:80px;background-color:rgba(33,255,66,0.15);}
.menu .nav{width:100%;height:80px;margin:0 auto;}
.menu .nav li{float:left;list-style:none;margin-left:40px;}
.menu .nav li a{display:block;height:80px;padding:0 10px;line-height:90px;color:gray;text-decoration:none;position:relative;overflow:hidden;}
.menu .nav li a:hover,.menu .nav li a.current{background:#CCFF95;color:#fff;}
.menu .nav li .box{width:100%;height:50px;position:absolute;top:80px;left:0;padding-left:200px;background-color:rgba(0,0,0,0.15);display:none;}
.menu .nav li .box a{display:block;height:50px;float:left;color:#fff;line-height:50px;border:none;background:none;}
.menu .nav li .box a:hover{text-decoration:underline;color:#46bd01}
.menu .nav iframe{margin-top:15px;}
		</style>
	</head>
	<body>

	<div class="menu">
		<ul class="nav">
			<li>
				<img src="./images/logo.png" width="95">
			</li>
			<li><iframe width="200" scrolling="no" height="60" frameborder="0" allowtransparency="true"></iframe></li>
			<li>
				<a href="#">首页</a>
				<div class="box">
					<a href="#">简介</a>
					<a href="#">品牌历程</a>
				</div>
			</li>
			<li>
				<a href="#">景点欣赏</a>
				<div class="box">
					<a href="/jingdianlist?id=16">绝美风景</a>
					<a href="/jingdianlist?id=20">历史景观</a>
					<a href="/jingdianlist?id=47">文化艺术</a>
					<a href="/jingdianlist?id=51">户外休闲</a>
					<a href="/jingdianlist?id=54">多彩生物</a>
				</div>
			</li>
			<li>
				<a href="#">新闻</a>
				<div class="box">
					<a href="#"><img src="./images/01.jpg" width="100"></a>
					<a href="#"><img src="./images/01.jpg" width="100"></a>
					<a href="#"><img src="./images/01.jpg" width="100"></a>
					<a href="#"><img src="./images/01.jpg" width="100"></a>
				</div>
			</li>
			<li>
				<a href="#">景点</a>
				<div class="box">
					<a href="#"><img src="./images/01.jpg" width="100"></a>
					<a href="#"><img src="./images/01.jpg" width="100"></a>
					<a href="#"><img src="./images/01.jpg" width="100"></a>
					<a href="#"><img src="./images/01.jpg" width="100"></a>
				</div>
			</li>
			<li>
				<a href="/goupiao">我要购票</a>
			</li>
			<li>
				<a href="#">景点互动</a>
			</li>
			<li>
				<a href="#">关于我们</a>
			</li>
			<li>
				<a href="#">帮助</a>
			</li>
		</ul>
		</div>		
	</body>
	<script src="{{asset('./detail_goupiao/jquery-1.11.3.min.js')}}"></script>
	<script>
$(function () {
	var navLi=$(".menu .nav li");
	navLi.mouseover(function () {
		$(this).find("a").addClass("current");
		$(this).find(".box").stop().slideDown();
	})
	navLi.mouseleave(function(){
		$(this).find("a").removeClass("current");
		$(this).find(".box").stop().slideUp();
	})
})
	</script>
</html>