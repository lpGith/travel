<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>张家界官网</title>
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
	#index_menu_id li .index_box a:hover{text-decoration:underline;color:#46bd01}
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
			<div class="slides-container">
			
			<!-- Slider Images -->
			 <div> <img src="{{asset('./images_index/1.jpg')}}" alt='loader' /></div>
			 <div><img src="{{asset('./images_index/2.jpg')}}" alt='loader' /></div>
			 <div><img src="{{asset('./images_index/3.jpg')}}" alt='loader' /></div>
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
				<ul class="home-slides">
					<li>We Are <span>Avalin</span></li>
					<li>Proudly <span>With Us</span></li>
					<li>Well Design <span>Teams</span></li>
				</ul>
				<!-- End Text Slides -->
				
				<div class="clear"></div>
				
			</div>

			<!-- Home Description -->
			<div class="home-p">中国第一界</div>
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
				
					<li class="active"><a class="scroll" href="/index">首页</a></li>
					<li>
						<a class="scroll" href="#about">全景张家界</a>
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
							<a href="/xinwenliebiao">新闻首页</a>
							<a href="/jingqulist">景区公告</a>
							<a href="/jingquliebiao">景区动态</a>
							<a href="/xinwenliebiao">旅游资讯</a>
							<a href="/bendiliebiao">本地新闻</a>	
						</div>
					</li>
					<li>
						<a class="scroll" href="#blog">票务信息</a>
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
					张家界美景鉴赏
				</div>				
				<!-- Second Header -->
				<div  class="description animated" data-animation="slideInLeft" data-animation-delay="0">
					奇山秀水聚宝盆，天上人间张家界
				</div>				
				<div class="works">				
					<div id="options" class="filter-menu inline animated" data-animation="slideInRight" data-animation-delay="0">
						<ul id="filters" class="filters option-set" data-option-key="filter">
							<li><a href="#filter" data-option-value="*" class="selected">绝美风景</a></li>
							<li><a href="#filter" data-option-value=".design">历史景观</a></li>
							<li><a href="#filter" data-option-value=".photography">文化艺术</a></li>
							<li><a href="#filter" data-option-value=".branding">户外休闲g</a></li>
							<li><a href="#filter" data-option-value=".web">本地生活</a></li>
						</ul>
					</div>
					<div class="row">
					<div class="items ">					
						<div class="work col-xs-4 web photography">
							<div class="portfolio-inner animated" data-animation="pulse" data-animation-delay="0">
								<div class="portfolio-img">
									<img src="{{asset('./images_index/portfolio/1.jpg')}}" alt="" />
									<div class="mask">
										<a class="button zoom" href="{{asset('./images_index/portfolio/big.jpg')}}" data-rel="prettyPhoto[gallery]"><i class="fa fa-plus"></i></a>
										<a class="button detail"><i class="fa fa-picture-o"></i></a>
									</div>
								</div>
								<div class="portfolio-desc">
									<h4>1111</h4>
									<p>Dolor sit amet maximi in agris Avalin humana</p>
								</div>
							</div>
						</div>						
						<div class="work col-xs-4 photography design">
							<div class="portfolio-inner animated" data-animation="pulse" data-animation-delay="50">
								<div class="portfolio-img">
									<img src="{{asset('./images_index/portfolio/2.jpg')}}" alt="" />
									<div class="mask">
										<a class="button zoom" href="{{asset('./images_index/portfolio/big.jpg')}}" data-rel="prettyPhoto[gallery]"><i class="fa fa-plus"></i></a>
										<a class="button detail"><i class="fa fa-picture-o"></i></a>
									</div>
								</div>
								<div class="portfolio-desc">
									<h4>222222</h4>
									<p>Dolor sit amet maximi in agris Avalin humana</p>
								</div>
							</div>
						</div>						
						<div class="work col-xs-4 web photography design ">
							<div class="portfolio-inner animated" data-animation="pulse" data-animation-delay="100">
								<div class="portfolio-img">
									<img src="{{asset('./images_index/portfolio/3.jpg')}}" alt="" />
									<div class="mask">
										<a class="button zoom" href="{{asset('./images_index/portfolio/big.jpg')}}" data-rel="prettyPhoto[gallery]"><i class="fa fa-plus"></i></a>
										<a class="button detail"><i class="fa fa-picture-o"></i></a>
									</div>
								</div>
								<div class="portfolio-desc">
									<h4>3333333</h4>
									<p>Dolor sit amet maximi in agris Avalin humana</p>
								</div>
							</div>
						</div>						
						<div class="work col-xs-4 design web ">
							<div class="portfolio-inner animated" data-animation="pulse" data-animation-delay="150">
								<div class="portfolio-img">
									<img src="{{asset('./images_index/portfolio/4.jpg')}}" alt="" />
									<div class="mask">
										<a class="button zoom" href="http://www.youtube.com/watch?v=abfeXDFegO8" data-rel="prettyPhoto[gallery]"><i class="fa fa-plus"></i></a>
										<a class="button detail"><i class="fa fa-film"></i></a>
									</div>
								</div>
								<div class="portfolio-desc">
									<h4>4444444</h4>
									<p>Dolor sit amet maximi in agris Avalin humana</p>
								</div>
							</div>
						</div>
						
						<div class="work col-xs-4 design photography ">
							<div class="portfolio-inner animated" data-animation="pulse" data-animation-delay="200">
								<div class="portfolio-img">
									<img src="{{asset('./images_index/portfolio/5.jpg')}}" alt="" />
									<div class="mask">
										<a class="button zoom" href="http://www.youtube.com/watch?v=abfeXDFegO8" data-rel="prettyPhoto[gallery]"><i class="fa fa-plus"></i></a>
										<a class="button detail"><i class="fa fa-film"></i></a>
									</div>
								</div>
								<div class="portfolio-desc">
									<h4>55555555</h4>
									<p>Dolor sit amet maximi in agris Avalin humana</p>
								</div>
							</div>
						</div>
						
						<div class="work col-xs-4 web branding ">
							<div class="portfolio-inner animated" data-animation="pulse" data-animation-delay="250">
								<div class="portfolio-img">
									<img src="{{asset('./images_index/portfolio/6.jpg')}}" alt="" />
									<div class="mask">
										<a class="button zoom" href="{{asset('./images_index/portfolio/big.jpg')}}" data-rel="prettyPhoto[gallery]"><i class="fa fa-plus"></i></a>
										<a class="button detail"><i class="fa fa-picture-o"></i></a>
									</div>
								</div>
								<div class="portfolio-desc">
									<h4>6666666666666</h4>
									<p>Dolor sit amet maximi in agris Avalin humana</p>
								</div>
							</div>
						</div>

						<div class="clear"></div>
					
					</div>
				</div>
				</div>
				
			</div>	
	
	</section>		
				<!-- Start Our Team Section -->
		<div class="first-section">
				<!-- Header -->
				<div class="header animated" data-animation="slideInRight" data-animation-delay="0">
					我们的团队
				</div>
				
				<!-- Second Header -->
				<div class="description animated" data-animation="slideInLeft" data-animation-delay="0">
					最棒的
				</div>
				<div class="row">
				<ul class="grid cs-style-1">
                            
                <li class="col-md-3 col-sm-6">
                    <div class="figure">
                        <img src="{{asset('./images_index/team/1.jpg')}}" alt="MyPassion" />
                        <div class="figcaption">
                            <span>Founder</span>
                            <p>这是什么</p>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-github"></i></a>
                            <a href="#"><i class="fa fa-skype"></i></a>
                        </div>
                        <h4>杨森林</h4>
                        <div class="hidden">
                        	<span>Founder</span>
                            <p>我是什么</p>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-github"></i></a>
                            <a href="#"><i class="fa fa-skype"></i></a>
                        </div>
                        
                    </div>
                </li>
                
                <li class="col-md-3 col-sm-6">
                    <div class="figure">
                        <img src="{{asset('./images_index/team/2.jpg')}}" alt="MyPassion" />
                        <div class="figcaption">
                            <span>第三</span>
                            <p>Dolor sit amet maximi in agris Avalin humana scientia. in humana resource administratione scientia habet</p>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-github"></i></a>
                            <a href="#"><i class="fa fa-skype"></i></a>
                        </div>
                        <h4>张强</h4>
                        <div class="hidden">
                        	<span>第三</span>
                            <p>Dolor sit amet maximi in agris Avalin humana scientia. in humana resource administratione scientia habet</p>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-github"></i></a>
                            <a href="#"><i class="fa fa-skype"></i></a>
                        </div>
                    </div>
                </li>
                
                <li class="col-md-3 col-sm-6">
                    <div class="figure">
                        <img src="{{asset('./images_index/team/3.jpg')}}" alt="MyPassion" />
                        <div class="figcaption">
                            <span>Web 第三</span>
                            <p>Dolor sit amet maximi in agris Avalin humana scientia. in humana resource administratione scientia habet</p>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-github"></i></a>
                            <a href="#"><i class="fa fa-skype"></i></a>
                        </div>
                        <h4>路文帅</h4>
                        <div class="hidden">
                        	<span>Web 第三</span>
                            <p>Dolor sit amet maximi in agris Avalin humana scientia. in humana resource administratione scientia habet</p>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-github"></i></a>
                            <a href="#"><i class="fa fa-skype"></i></a>
                        </div>
                    </div>
                </li>
                 <li class="col-md-3 col-sm-6">
                    <div class="figure">
                        <img src="{{asset('./images_index/team/4.jpg')}}" alt="MyPassion" />
                        <div class="figcaption">
                            <span>Consultant</span>
                            <p>Dolor sit amet maximi in agris Avalin humana scientia. in humana resource administratione scientia habet</p>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-github"></i></a>
                            <a href="#"><i class="fa fa-skype"></i></a>
                        </div>
                        <h4>李志超</h4>
                        <div class="hidden">
                        	<span>Consultant</span>
                            <p>Dolor sit amet maximi in agris Avalin humana scientia. in humana resource administratione scientia habet</p>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-github"></i></a>
                            <a href="#"><i class="fa fa-skype"></i></a>
                        </div>
                    </div>
                </li>
                
            </ul>
			</div>
			</div>
			</div><!-- End inner div -->
			
	</section><!-- End Our Team Section -->
	
	
	<!-- Start Services Section -->
	<section id="services" class="contain nav-link">
			<div class="inner services">
				<div class="contain-logo br">
					<i class="fa fa-chevron-down"></i>
				</div>
			
				<!-- Header -->
				<div class="header animated" data-animation="slideInRight" data-animation-delay="0">
					张家界=====
				</div>
				
				<!-- Second Header -->
				<div class="description animated" data-animation="slideInLeft" data-animation-delay="0">
					论团
				</div>
				
				<div class="row">
            <div class="col-md-4 col-sm-4 col-xs-6 animated" data-animation="rollIn" data-animation-delay="0">
              <div class="service-box">
                <div class="wrap">
                  <span class="fa fa-tag"></span>
                  <div class="content">
                    <h4>景点资讯</h4>
                    <p>aaaaaaaaaaaaaaaaaa</p>
                  </div><!-- End .content -->
                </div><!-- End .wrap -->
              </div><!-- End .service-box -->
            </div><!-- End .col-md-4 col-sm-4 col-xs-6 -->
            <div class="col-md-4 col-sm-4 col-xs-6 animated" data-animation="rollIn" data-animation-delay="0">
              <div class="service-box">
                <div class="wrap">
                  <span class="fa fa-umbrella"></span>
                  <div class="content">
                    <h4>互动论坛</h4>
                    <p>Dolor sit amet maximi in agris Avalin humana scientia. in humana resource administratione avalin dolor set amet</p>
                  </div><!-- End .content -->
                </div><!-- End .wrap -->
              </div><!-- End .service-box -->
            </div><!-- End .col-md-4 col-sm-4 col-xs-6-->
            <div class="col-md-4 col-sm-4 col-xs-6 animated" data-animation="rollIn" data-animation-delay="0">
              <div class="service-box">
                <div class="wrap">
                  <span class="fa fa-signal"></span>
                  <div class="content">
                    <h4>经典路线</h4>
                    <p>Dolor sit amet maximi in agris Avalin humana scientia. in humana resource administratione avalin dolor set amet</p>
                  </div><!-- End .content -->
                </div><!-- End .wrap -->
              </div><!-- End .service-box -->
            </div><!-- End .col-md-4 col-sm-4 col-xs-6 -->
           
            <div class="col-md-4 col-sm-4 col-xs-6 animated" data-animation="rollIn" data-animation-delay="0">
              <div class="service-box">
                <div class="wrap">
                  <span class="fa fa-gift"></span>
                  <div class="content">
                    <h4>经典评论</h4>
                    <p>Dolor sit amet maximi in agris Avalin humana scientia. in humana resource administratione avalin dolor set amet</p>
                  </div><!-- End .content -->
                </div><!-- End .wrap -->
              </div><!-- End .service-box -->
            </div><!-- End .col-md-4 col-sm-4 col-xs-6 -->
            <div class="col-md-4 col-sm-4 col-xs-6 animated" data-animation="rollIn" data-animation-delay="0">
              <div class="service-box">
                <div class="wrap">
                  <span class="fa fa-comments"></span>
                  <div class="content">
                    <h4>Project Management</h4>
                    <p>Dolor sit amet maximi in agris Avalin humana scientia. in humana resource administratione avalin dolor set amet</p>
                  </div><!-- End .content -->
                </div><!-- End .wrap -->
              </div><!-- End .service-box -->
            </div><!-- End .col-md-4 col-sm-4 col-xs-6-->
            <div class="col-md-4 col-sm-4 col-xs-6 animated" data-animation="rollIn" data-animation-delay="0">
              <div class="service-box">
                <div class="wrap">
                  <span class="fa fa-desktop"></span>
                  <div class="content">
                    <h4>Knowledge Management</h4>
                    <p>Dolor sit amet maximi in agris Avalin humana scientia. in humana resource administratione avalin dolor set amet</p>
                  </div><!-- End .content -->
                </div><!-- End .wrap -->
              </div><!-- End .service-box -->
            </div><!-- End .col-md-4 col-sm-4 col-xs-6 -->
        </div>
				
				
				
				
			</div><!-- End Services Inner 1 -->
			
			
	</section>	<!-- End Services Section -->
	
	<!-- Start Blog Section -->
		<section id="blog" class="contain nav-link">
			<div class="inner">
				<div class="contain-logo br-b">
					<i class="fa fa-chevron-down"></i>
				</div>
				<div class="header animated" data-animation="slideInRight" data-animation-delay="0">
					Our Blog
				</div>
				
				<!-- Second Header -->
				<div class="description animated" data-animation="slideInLeft" data-animation-delay="0">
					Dolor sit amet maximi in agris Avalin humana scientia. in humana resource administratione scientia habet multas inquisitiones de consilio est, et in Avalin. 
				</div>

				<div class="row">
							<div class="col-lg-4 col-md-4 post-item animated" data-animation="bounceIn" data-animation-delay="0">
							<div class="portfolio-img">
								<img src="{{asset('./images_index/post_img_1.jpg')}}" class="post-img" alt="">
							</div>
							
							<div class="post-content">
								<a href="#"><h5>Avalin Post Title</h5></a>
								<div class="entry">	
									<p>
										Donec non lacus a velit iaculis dignissim. Nam at lorem vitae enim vestibulum ullamcorper. In adipiscing, eros at venenatis mattis, erat purus tempus nisi, et tempor lectus nibh non dui. Nam bibendum est quis dolor elementum laoreet. Vestibulum ut fermentum augue.					
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
								<img src="{{asset('./images_index/post_img_2.jpg')}}" class="post-img" alt="">
							</div>
							
							<div class="post-content">
								<a href="#"><h5>Avalin Post Title</h5></a>
								<div class="entry">	
									<p>
										Donec non lacus a velit iaculis dignissim. Nam at lorem vitae enim vestibulum ullamcorper. In adipiscing, eros at venenatis mattis, erat purus tempus nisi, et tempor lectus nibh non dui. Nam bibendum est quis dolor elementum laoreet. Vestibulum ut fermentum augue.					
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
								<img src="{{asset('./images_index/post_img_3.jpg')}}" class="post-img" alt="">
							</div>
							<div class="post-content">
								<a href="#"><h5>Avalin Post Title</h5></a>
								<div class="entry">	
									<p>
										Donec non lacus a velit iaculis dignissim. Nam at lorem vitae enim vestibulum ullamcorper. In adipiscing, eros at venenatis mattis, erat purus tempus nisi, et tempor lectus nibh non dui. Nam bibendum est quis dolor elementum laoreet. Vestibulum ut fermentum augue.					
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
				<div class="header animated" data-animation="slideInRight" data-animation-delay="0">
					Our Pricing
				</div>
				
				<!-- Second Header -->
				<div class="description animated" data-animation="slideInLeft" data-animation-delay="0">
					Dolor sit amet maximi in agris Avalin humana scientia. in humana resource administratione scientia habet multas inquisitiones de consilio est, et in Avalin. 
				</div>
				
				<div class="row">
                  <div class="col-md-3 col-sm-6 animated" data-animation="fadeInUp" data-animation-delay="100">
                      <div class="price-pack text-center clearfix">
                          <div class="package-header"><h3>Personal</h3></div>
                             <div class="package-price">$20<p>monthly</p></div>
                              <div class="package-features clearfix">
                                  <ul>
                                      <li>Unlimited Users</li>
                                      <li>Unlimited Storage</li>
                                      <li>Unlimited Domain</li>
                                      <li>Unlimited Bandwidth</li>
                                      <li>Powerful Engine</li>
                                      <li>Lifetime Support</li>
                                  </ul>
                              </div>
                              <a href="#" class="btn border-btn">order now</a>
                       </div>
                  </div>
                  <div class="col-md-3 col-sm-6 animated" data-animation="fadeInUp" data-animation-delay="200">
                      <div class="price-pack text-center clearfix">
                          <div class="package-header"><h3>standard</h3></div>
                             <div class="package-price">$50<p>monthly</p></div>
                              <div class="package-features clearfix">
                                  <ul>
                                      <li>Unlimited Users</li>
                                      <li>Unlimited Storage</li>
                                      <li>Unlimited Domain</li>
                                      <li>Unlimited Bandwidth</li>
                                      <li>Powerful Engine</li>
                                      <li>Lifetime Support</li>
                                  </ul>
                              </div>
                              <a href="#" class="btn border-btn">order now</a>
                       </div>
                  </div>  
                  <div class="col-md-3 col-sm-6 animated" data-animation="fadeInUp" data-animation-delay="300">
                      <div class="price-pack-features text-center clearfix">
                          <div class="package-header-features"><h3>profssional</h3></div>
                             <div class="package-price-features">$90<p>monthly</p></div>
                              <div class="package-features clearfix">
                                  <ul>
                                      <li>Unlimited Users</li>
                                      <li>Unlimited Storage</li>
                                      <li>Unlimited Domain</li>
                                      <li>Unlimited Bandwidth</li>
                                      <li>Powerful Engine</li>
                                      <li>Lifetime Support</li>
                                  </ul>
                              </div>
                              <a href="#" class="btn border-btn-features">order now</a>
                       </div>
                  </div>
                  <div class="col-md-3 col-sm-6 animated" data-animation="fadeInUp" data-animation-delay="400">
                      <div class="price-pack text-center clearfix">
                          <div class="package-header"><h3>premium</h3></div>
                             <div class="package-price">$99<p>monthly</p></div>
                              <div class="package-features clearfix">
                                  <ul>
                                      <li>Unlimited Users</li>
                                      <li>Unlimited Storage</li>
                                      <li>Unlimited Domain</li>
                                      <li>Unlimited Bandwidth</li>
                                      <li>Powerful Engine</li>
                                      <li>Lifetime Support</li>
                                  </ul>
                              </div>
                              <a href="#" class="btn border-btn">order now</a>
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
				<p class="footer-text copyright">2016年制作于北京兄弟连lamp138 开拓者小组</p> 
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
	</script>

	 <!-- End JavaScript Files -->
</body>

</html>