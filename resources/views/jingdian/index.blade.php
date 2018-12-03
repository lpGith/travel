<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>青城山官网</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	
	<!-- CSS Files -->
	<link rel="stylesheet" href="{{asset('./css_index/animate.min.css')}}" />
	<link rel="stylesheet" href="{{asset('./css_index/bootstrap.css')}}" />
	<link rel="stylesheet" href="{{asset('./css_index/style.css')}}" />
	<link rel="stylesheet" href="{{asset('./css_index/flexslider.css')}}" />
	<link rel="stylesheet" href="{{asset('./css_index/font-awesome.css')}}" />
	<link rel="stylesheet" href="{{asset('./css_index/prettyPhoto.css')}}" />
	<link rel="stylesheet" href="{{asset('./css_index/responsive.css')}}" />
	<style>
	#index_menu_id li .index_box{width:1200px;height:60px;position:absolute;top:80px;left:0;margin-left:-300px;background-color:rgba(0,0,0,0.15);display:none;}
	#index_menu_id li .index_box a{display:block;height:30px;float:left;color:#fff;line-height:0px;border:none;background:none;}
	#index_menu_id li .index_box a:hover{text-decoration:underline;color:#46bd01;}
	
	.xinwen a:hover{color:#FEA200;text-decoration:underline;}
	</style>
	<!-- End CSS Files -->
	</head>
<body data-spy="scroll" data-target=".nav-menu" data-offset="50">

		<div id="pageloader">   
            <div class="loader">
              <img src="{{asset('./images_index/load.gif')}}" alt='loader' />
            </div>
        </div>
	<!-- Home Section -->
	<section id="home" class="nav-link">
		<!-- Slider -->
		<div id="slides">
			<div class="slides-container" >
			
			<!-- Slider Images -->
			@foreach($lunbo as $lunbo1)
			 <div><img id="{{$lunbo1->id}}" src="./uploads/{{$lunbo1->lunbo_picname}}" alt='loader' /></div>
			@endforeach
			 <!-- End Slider Images -->
			 
			</div>
			
			<!-- Slider Controls -->
			
			<nav class="slides-navigation">
			  <a href="#" class="next"></a>
			  <a href="#" class="prev"></a>
			</nav>
			 
			<!-- End Slider Controls -->
			
		</div>
		<!-- End Slider Images -->
	
		<!-- Main - Text Slide -->
		<div class=" main">
			<!-- Text Slider -->
			<div id="main" class="flexslider home-slider">
			
				<!-- Text Slides -->
				
				<ul class="home-slides" id="lunboid">
				@foreach($lunbo as $lunbo1)
					<li><span>{{$lunbo1->lunbo_wenzi}}</span></li>
				@endforeach
				</ul>
				
				<!-- End Text Slides -->
				
				<div class="clear"></div>
				
			</div>

			<!-- Home Description -->
			<div class="home-p">青城天下幽</div>
			<!-- End Home Description -->
			
			<!-- Home Button -->
			<a class="scroll button-ready" href="#about">Are You Ready?</a>
			<!-- End Home Button -->
			
		</div>
		<!-- End Main -->
		
	</section>
	<!-- End Home Section -->
	
	<!-- 导航栏开始 -->
	<section id="navigation">
	
		<div class="inner navigation">
			
			<!-- Logo -->
			<div class="logo">
				<a class="scroll" href="#home"><img src="{{asset('./images_index/logo.png')}}" alt="Logo" /></a>
			</div>
	
			<!-- Nav Menu -->
			
			<nav class="nav-menu">
				
				<ul id="index_menu_id" class="nav main-nav">
				
					<li class="active"><a class="scroll" href="/">首页</a></li>
					<li>
						<a class="scroll" href="#about">全景青城山</a>
						<div class="index_box">
							<a href="/jingdianlist?id=16">绝美风景</a>
							<a href="/jingdianlist?id=20">历史景观</a>
							<a href="/jingdianlist?id=47">文化艺术</a>
							<a href="/jingdianlist?id=51">户外休闲</a>
							<a href="/jingdianlist?id=54">多彩生物</a>
						</div>
					</li>
					
					<li>
						<a class="scroll" href="#services">景区资讯</a>
						<div class="index_box">
							<a href="/xinwenhome">新闻首页</a>
							<a href="/jingquliebiao">景区动态</a>
							<a href="/xinwenliebiao">旅游资讯</a>
							<a href="/bendiliebiao">本地新闻</a>	
						</div>
					</li>
					<li>
						<a class="scroll" href="#goupiao">票务信息</a>
						<div class="index_box">
							<a href="/goupiaolist">景点门票</a>
							<a href="/goupiaohotellist">酒店订票</a>
							<a href="/goupiaolinelist">团游订票</a>
						</div>
					</li>
					<li>
						<a class="scroll" href="#prices">精彩周边</a>
						<div class="index_box">
							<a href="/zhoubian/zhulist">酒店客栈</a>
							<a href="/zhoubian/zoulist">出行指南</a>
							<a href="/zhoubian/chilist">餐饮美食</a>
							<a href="/zhoubian/wanlist">娱乐活动</a>
							<a href="/zhoubian/youlist">经典路线</a>
							<a href="/zhoubian/mailist">特产推荐</a>
							
						</div>
					</li>
					<li><a class="scroll" href="/blog">互动论坛</a></li>
					
					@if(session("user")==null)
						<li><a class="scroll" href="/Web/denglu">登录</a></li>
						<li><a class="scroll" href="/Web/add">注册</a></li>
					@else
						<li><a class="scroll" href="#">亲爱的<span style="color:blue;">{{session('user')->name}}</span>,您好！</a></li>
						<li><a class="scroll" href="aa/{{session('user')->id}}/edit">个人中心</a></li>
						<li><a class="scroll" href="/Web/logout">退出登录</a></li>
					@endif		
				</ul>
			</nav>
		</div>
	</section>
	<!-- End 导航栏 -->
	
	<!-- About Section -->
	<section id="about" class="contain nav-link">
		<div class="about inner">	
				<!-- Second Header -->
				<div class="clear"></div>
				
		<section id="portfolio" class="contain nav-link">
			
			<div class="inner">	
				<!-- Portfolio -->				
				<!-- Header -->
				<div style="color:white;" class="header animated" data-animation="slideInRight" data-animation-delay="0">
					{{$model[0]->edit_title}}
				</div>				
				<!-- Second Header -->
				<div  style="color:white;" class="description animated" data-animation="slideInLeft" data-animation-delay="0">
				{{$model[0]->edit_content}}
				</div>				
				<div class="works">				
						<div id="options" class="filter-menu inline animated" data-animation="slideInRight" data-animation-delay="0">
							<ul id="filters" class="filters option-set" data-option-key="filter">
								<li><a href="#filter" id="index_click_id1" class="selected">{{$data[0]->jingdian_name}}</a></li>
								<li><a href="#filter" id="index_click_id2" >{{$data[1]->jingdian_name}}</a></li>
								<li><a href="#filter" id="index_click_id3" >{{$data[2]->jingdian_name}}</a></li>
								
							</ul>
						</div>
					<div class="row" id="click_id1" style="display:block;">
						<div class="items ">
						@foreach($list1 as $aa)
							<div class="work col-xs-4 web photography">
								<div class="portfolio-inner animated" data-animation="pulse" data-animation-delay="0">
									<div class="portfolio-img">
										<a href="/jingdiandetail?id={{$aa->id}}&uid={{$model[0]->pid}}">
										<img class="min" id="img" src="./uploads/{{$aa->jingdian_picname}}" alt="{{$aa->jingdian_tuming}}" />
										</a>
										
									</div>
									<div class="portfolio-desc">
										<h4><a href="/jingdiandetail?id={{$aa->id}}&uid={{$model[0]->pid}}">{{$aa->jingdian_tuming}}</a></h4>
										<p>图片来源于网络</p>
									</div>
								</div>
							</div>						
						@endforeach							
							<div class="clear"></div>
						</div>
					</div>
					<div class="row" id="click_id2" style="display:none;">
						<div class="items ">
						@foreach($list2 as $bb)
							<div class="work col-xs-4 web photography">
								<div class="portfolio-inner animated" data-animation="pulse" data-animation-delay="0">
									<div class="portfolio-img">
									<a href="/jingdiandetail?id={{$bb->id}}&uid={{$model[0]->pid}}">
										<img src="./uploads/{{$bb->jingdian_picname}}" alt="{{$bb->jingdian_tuming}}" />
									</a>
										
									</div>
									<div class="portfolio-desc">
										<h4><a href="/jingdiandetail?id={{$bb->id}}&uid={{$model[0]->pid}}">{{$bb->jingdian_tuming}}</a></h4>
										<p>图片来源于网络</p>
									</div>
								</div>
							</div>						
						@endforeach							
							<div class="clear"></div>
						</div>
					</div>
					<div class="row" id="click_id3" style="display:none;">
						<div class="items ">
						@foreach($list3 as $cc)
							<div class="work col-xs-4 web photography">
								<div class="portfolio-inner animated" data-animation="pulse" data-animation-delay="0">
									<div class="portfolio-img">
										<a href="/jingdiandetail?id={{$cc->id}}&uid={{$model[0]->pid}}">
										<img src="./uploads/{{$cc->jingdian_picname}}" alt="{{$cc->jingdian_tuming}}" />
										</a>
										
									</div>
									<div class="portfolio-desc">
										<h4><a href="/jingdiandetail?id={{$cc->id}}&uid={{$model[0]->pid}}">{{$cc->jingdian_tuming}}</a></h4>
										<p>图片来源于网络</p>
									</div>
								</div>
							</div>						
						@endforeach							
							<div class="clear"></div>
						</div>
					</div>
				</div>
				
			</div>	
	
	</section>		
				<!-- Start Our Team Section -->
		<div class="first-section">
				<!-- Header -->
				<div style="color:white;" class="header animated" data-animation="slideInRight" data-animation-delay="0">
					不一样的青城山
				</div>
				
				<!-- Second Header -->
				<div style="color:white;" class="description animated" data-animation="slideInLeft" data-animation-delay="0">
					山美水美人更美
				</div>
				<div class="row">
				<ul class="grid cs-style-1">
                 @foreach($live as $live1)           
                <li class="col-md-3 col-sm-6">
                    <div class="figure">
                        <img src="./uploads/{{$live1->live_picname}}" height="270" alt="MyPassion" />
                        <div class="figcaption">
                            <span>{{$live1->live_title}}</span>
                            <a href="{{$live1->live_href}}" style="display:block;float:left;width:250px;height:150px;text-decoration:underline;">{{$live1->live_content}}</a>
                            
                        </div>
                        <h4>{{$live1->live_name}}</h4>
                    </div>
                </li>
                @endforeach
            </ul>
			</div>
			</div>
			</div><!-- End inner div -->
	</section><!-- End Our Team Section -->
	<!-- Start Services Section -->
	<!-- Start Blog Section -->
		<section id="blog" class="contain nav-link">
			<div class="inner">
				<div class="contain-logo br-b">
					<i class="fa fa-chevron-down"></i>
				</div>
				<div  style="color:white;" class="header animated" data-animation="slideInRight" data-animation-delay="0">
					视屏展示区域
				</div>
				
				<!-- Second Header -->
				<div  style="color:white;" class="description animated" data-animation="slideInLeft" data-animation-delay="0">
					魅力张家界
				</div>

				<div class="row">
							<div class="col-lg-4 col-md-4 post-item animated" data-animation="bounceIn" data-animation-delay="0">
							<div class="portfolio-img">
								<video controls="controls" style="width:400px;height:250px;" poster="./images/bg-services.jpg">
									
									<source src="./images/fun.mp4" type="video/mp4" />
									你的浏览器不支持视频播放
								</video>
								</div>
							<div class="post-content">
								<a href="#"><h5>张家界版江南STYLE</h5></a>
								<div class="entry">	
									<p>
										《张家界新版江南STYLE》由《张家界版江南STYLE》原班人马打造，全长8分32秒，与2012年11月份“上市”的《张家界版江南STYLE》相比增加3分38秒，新增部分包括祝贺蛇年新春微电影《谁说法海不懂爱》，还包括航母STYLE、黄石寨索道、森林公园、天门山等场景，所有演员均为《张家界版江南STYLE》原班人马。				
									</p>
								</div>
								<div class="post-meta">
									<ul>
										<li><a href="#"><i class="fa fa-clock-o"></i>Feb 02, 2014</a></li>
										<li><a href="#"><i class="fa fa-comment"></i>2 Comments</a></li>
										<li><a href="#"><i class="fa fa-user"></i>John</a></li>
									</ul>
								</div>
							</div>
							</div>

							<div class="col-lg-4 col-md-4 post-item animated" data-animation="bounceIn" data-animation-delay="150">
							<div class="portfolio-img">
								<video controls="controls" style="width:400px;height:250px;" poster="./images/bg-services.jpg">
								
									<source src="./images/fun.mp4" type="video/mp4" />
									你的浏览器不支持视频播放
								</video>
							</div>
							
							<div class="post-content">
								<a href="#"><h5>永远的张家界</h5></a>
								<div class="entry">	
									<p>
										帅气十足的美国男孩，在张家界这个神秘而又美丽的山水间，邂逅了一位美丽善良的土家少女，他们演绎了一段动人的爱情故事～，阴差阳错的别离，却成为了一个永久凄美的等待～此情可待成追忆，只是当时已惘然。问世间情为何物，直教人以身死相许。					
									</p>
								</div>
								<div class="post-meta">
									<ul>
										<li><a href="#"><i class="fa fa-clock-o"></i>Feb 02, 2014</a></li>
										<li><a href="#"><i class="fa fa-comment"></i>2 Comments</a></li>
										<li><a href="#"><i class="fa fa-user"></i>John</a></li>
									</ul>
								</div>
							</div>
							</div>	

							<div class="col-lg-4 col-md-4 post-item animated" data-animation="bounceIn" data-animation-delay="300">
							<div class="portfolio-img">
								<video controls="controls" style="width:400px;height:250px;" poster="./images/bg-services.jpg">
									
									<source src="./images/fun.mp4" type="video/mp4" />
									你的浏览器不支持视频播放
								</video>
							</div>
							<div class="post-content">
								<a href="#"><h5>黄龙洞</h5></a>
								<div class="entry">	
									<p>
										黄龙洞位于湖南省张家界市核心景区武陵源风景名胜区内，是世界自然遗产、世界地质公园张家界的有机组成部分，属典型的喀斯特岩溶地貌，被列为国际旅游洞穴会员、全国35个王牌景点之一、中国首批AAAA级旅游区（点）、中国旅游首批知名品牌、湖南省最佳旅游景区、湖南省著名商标、张家界旅游精品线之一，享有绝世奇观之美誉。
									</p>
								</div>
								<div class="post-meta">
									<ul>
										<li><a href="#"><i class="fa fa-clock-o"></i>Feb 02, 2014</a></li>
										<li><a href="#"><i class="fa fa-comment"></i>2 Comments</a></li>
										<li><a href="#"><i class="fa fa-user"></i>John</a></li>
									</ul>
								</div>
							</div>
							</div>								
				</div>
							
		
		</div>
		</section>
	<!-- End Blog Section -->
	<section id="prices" class="contain nav-link">
		
			<div class="inner prices">
				<div class="contain-logo br">
					<i class="fa fa-chevron-down"></i>
				</div>
			
				<!-- Header -->
				<div  style="color:white;" class="header animated" data-animation="slideInRight" data-animation-delay="0">
					新闻公告界面
				</div>
				
				<!-- Second Header -->
				<div style="color:white;" class="description animated" data-animation="slideInLeft" data-animation-delay="0">
					资讯张家界
				</div>
				
				<div class="row">
                  <div class="col-md-3 col-sm-6 animated" data-animation="fadeInUp" data-animation-delay="100">
                      <div class="price-pack text-center clearfix">
                          <div class="package-header"><h3>notice</h3></div>
                             <div class="package-price">公<p>张家界</p></div>
                              <div class="package-features clearfix">
                                  <ul class="xinwen" id="huadong1">
                                    @foreach($gonggao as $gong)
                                       <li style="float:left;margin-left:10px;"><i style="color:#FEA200;float:left;"class="fa fa-clock-o"></i>.<a href="/bendixiangqing?id={{$gong->id}}" >{{mb_strcut($gong->xinwen_name,0,45)}}...</a></li>
									@endforeach
                                  </ul>
                              </div>
                              <a href="/bendiliebiao" class="btn border-btn">景区公告</a>
                       </div>
                  </div>  
                  <div class="col-md-3 col-sm-6 animated" data-animation="fadeInUp" data-animation-delay="200">
                      <div class="price-pack text-center clearfix">
                          <div class="package-header"><h3>dynamic</h3></div>
                             <div class="package-price" >动<p>张家界</p></div>
                              <div class="package-features clearfix">
                                  <ul class="xinwen" id="huadong2">
									@foreach($xinwen as $xin)
                                      <li  style="float:left;margin-left:10px;"><i style="color:#FEA200;float:left;"class="fa fa-clock-o"></i>.<a href="/xinwenxiangqing?id={{$xin->id}}" >{{mb_strcut($xin->xinwen_name,0,45)}}...</a></li>
									@endforeach 
                                  </ul>
                              </div>
                              <a href="/xinwenliebiao" class="btn border-btn">景区动态</a>
                       </div>
                  </div>  
                  <div class="col-md-3 col-sm-6 animated" data-animation="fadeInUp" data-animation-delay="300">
                      <div class="price-pack text-center clearfix">
                          <div class="package-header"><h3>information</h3></div>
                             <div class="package-price">资<p>张家界</p></div>
                              <div class="package-features clearfix">
                                  <ul class="xinwen" id="huadong3">
                                    @foreach($jingqu as $jing)
                                       <li style="float:left;margin-left:10px;"><i style="color:#FEA200;float:left;" class="fa fa-clock-o"></i>.<a href="/jingquxiangqing?id={{$jing->id}}" >{{mb_strcut($jing->xinwen_name,0,45)}}...</a></li>
									@endforeach 
                                  </ul>
                              </div>
                              <a href="/jingquliebiao" class="btn border-btn">旅游资讯</a>
                       </div>
                  </div>
                  <div class="col-md-3 col-sm-6 animated" data-animation="fadeInUp" data-animation-delay="400">
                      <div class="price-pack text-center clearfix">
                          <div class="package-header"><h3>news</h3></div>
                             <div class="package-price">闻<p>张家界</p></div>
                              <div class="package-features clearfix">
                                  <ul class="xinwen" id="huadong4">
                                    @foreach($bendi as $ben)
                                       <li  style="float:left;margin-left:10px;"><i style="color:#FEA200;float:left;"class="fa fa-clock-o"></i>.<a href="/bendixiangqing?id={{$ben->id}}" >{{mb_strcut($ben->xinwen_name,0,45)}}...</a></li>
									@endforeach 
                                  </ul>
                              </div>
                              <a href="/bendiliebiao" class="btn border-btn">本地新闻</a>
                       </div>
                  </div>                                                        
              </div>
			</div><!-- End inner div -->
	</section><!-- End Prices Section -->
	
	
	
	
	
	<div class="clear"></div>
	<!-- Footer Section -->
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
	<!-- End Footer Section -->
	
	<!-- JavaScript Files -->
	
	<script type="text/javascript" src="{{asset('./js_index/jquery-1.11.1.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('./js_index/bootstrap.js')}}"></script>
	<script type="text/javascript" src="{{asset('./js_index/jquery.appear.js')}}"></script>
	<script type="text/javascript" src="{{asset('./js_index/waypoints.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('./js_index/jquery.prettyPhoto.js')}}"></script>
	<script type="text/javascript" src="{{asset('./js_index/modernizr-latest.js')}}"></script>
	<script type="text/javascript" src="{{asset('./js_index/SmoothScroll.js')}}"></script>
	<script type="text/javascript" src="{{asset('./js_index/jquery.easing.1.3.js')}}"></script>
	<script type="text/javascript" src="{{asset('./js_index/jquery.superslides.js')}}"></script>
	<script type="text/javascript" src="{{asset('./js_index/jquery.flexslider.js')}}"></script>
	<script type="text/javascript" src="{{asset('./js_index/jquery.flexslider-min.js')}}"></script>
	<script type="text/javascript" src="{{asset('./js_index/jquery.sticky.js')}}"></script>
	<script type="text/javascript" src="{{asset('./js_index/jquery.isotope.js')}}"></script>
	<script type="text/javascript" src="{{asset('./js_index/scripts.js')}}"></script>
	<script type="text/javascript" src="{{asset('./js_index/toucheffects.js')}}"></script>
	<script>
	$(function () {
		var navLi=$("#index_menu_id li");
		navLi.mouseover(function () {
			//$(this).find("a").addClass("current");
			$(this).find(".index_box").stop().slideDown();
		})
		navLi.mouseleave(function(){
			//$(this).find("a").removeClass("current");
			$(this).find(".index_box").stop().slideUp();
		})
	})
	
	$("#index_click_id1").click(function(){
		//alert("aa");
		$("#click_id2").hide();
		$("#click_id3").hide();
		$("#click_id1").show();
	});
	$("#index_click_id2").click(function(){
		//alert("aa");
		$("#click_id1").hide();
		$("#click_id3").hide();
		$("#click_id2").show();
	});	
	$("#index_click_id3").click(function(){
		//alert("aa");
		$("#click_id1").hide();
		$("#click_id2").hide();
		$("#click_id3").show();
	});
	function doTogg(){
		//$("#mid").toggle(1000);
		$("#img").toggle(1000); //淡入和淡出
	}
	
	setInterval(function(){
	  //下滚动
	  $("#huadong1 li:last").hide().prependTo("#huadong1").slideDown(500);
	  $("#huadong2 li:last").hide().prependTo("#huadong2").slideDown(500);
	  $("#huadong3 li:last").hide().prependTo("#huadong3").slideDown(500);
	  $("#huadong4 li:last").hide().prependTo("#huadong4").slideDown(500);
	  
	  //上滚动
	  //$(".xinwen li:first").slideUp(500,function(){
		//	$(this).appendTo(".xinwen").show();
	 // });	  
   },2000);
   
   //图片轮播
   /*
           var mytime=null;
           var m=1;
           function running(){
               if(mytime==null){
                    mytime = setInterval(function(){
                        $("#lunboid li").hide().eq(m).show();
						//alert(m);
						 m++;
                        if(m>=$("#lunboid li").length){
                            m=0;
                        }
                    },2000);
               }
           }
           running();
		   
		   */
	</script>

	 <!-- End JavaScript Files -->
</body>

</html>