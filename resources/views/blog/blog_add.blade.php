<!DOCTYPE html>
<head>

    <!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title>blog_index
	</title>    
    <!-- CSS
  ================================================== -->
  	<link rel="stylesheet" href="{{asset('blog_public/css/zerogrid.css')}}">
	<link rel="stylesheet" href="{{asset('blog_public/css/style.css')}}">
	<link rel="stylesheet" href="{{asset('blog_public/css/component.css')}}">
	<link rel="stylesheet" href="{{asset('blog_public/css/responsive.css')}}">
	<link rel="stylesheet" href="{{asset('blog_public/css/addstyle.css')}}">
</head>
<body>
<div class="wrap-body">
<!--------------Header--------------->
<div class="top-header">
	<div class="zerogrid">
		<div class="row">
			<nav>
			  <a class="toggleMenu" href="#">Menu</a>
			  <ul class="menu">
				  <li><a href="/blog">论坛主页</a></li>
				  <li>
					  <a href="/blog/new">最新</a>
				  </li>
					<li><a href="/blog/hot">最热</a></li>
				  <li><a href="/blog_work/create">我要发帖</a></li>
				  <li><a href="/vita">个人中心</a></li>
				  <li><a href="/index">返回旅游</a></li>
				   <div class="header-search">
					<form method="get" action="/blog" id="search">
				  <input name="name" type="text" size="40" placeholder="输入标题" />
				</form>
				</div>
			  </ul>
			</nav>
		</div>
	</div>
</div>
<div class="wrap-header">
		<div class="zerogrid">
			<div id="logo"><a href="#"><img src="{{asset('blog_public/images/logo.png')}}" width="400"></a></div>
			</div>
</div>
<!--<div class="header-search">
				<center><form method="get" action="/blog" id="search">
				  <input name="name" type="text" size="40" placeholder="输入标题" />
				</form></center>
	</div>-->
<!--------------Content--------------->
<section class="container ">
	<div class="zerogrid">
		<div class="col-2-3">
			<div id="main-content" class="wrap-col">
				<div class="wrap-content">
					<article class="single">
						<div class="wrap-art">
							<div class="art-header">
								<h1 class="title">我要发帖</h1>
							</div>
							<div class="art-content">
								<div id="contact_form">
									<h3>填写标题、内容并上传图片来发布你的帖子！</h3>
									<p>张家界旅游网论坛，分享你的心情、美图，不只是旅行</p>
									<form action="/blog_work" method="post" enctype="multipart/form-data">
										<input type="hidden" name="_method" value="post">
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										 <label>
										 标题*:
										 <input type="text" placeholder="输入你的标题" name="post_title" required>
										 </label>
									 
										 <label>
										 上传图片*:
										 <input type="file" placeholder="youremail@gmail.com" name="post_pic" required>
										 </label>
											
										 <label>
										 帖子内容*:
										 <textarea name="post_content" required placeholder="请输入帖子主题内容"></textarea>
										 </label>
									 
										 <input class="sendButton" type="submit" value="发帖">
										 
									</form>
								</div>
							</div>
						</div>
					</article>
				</div>
			</div>
		</div>
		<div class="col-1-3">
			<div id="sidebar" class="wrap-col">
				<div class="wrap-slidebar">
					<div class="widget">
						<div class="wid-about" style="font-size:24px;color:#fff;">编辑推荐</div>
					</div>
					
					<div class="widget wid-posts">
						<div class="wid-header">
						<h4>看贴</h4>
							<div class="clear"></div>
						</div>
						<div class="wid-content">
						@foreach($look_title as $look)
							<a href="/show_more{{ $look->post_id }}">{{ $look->post_title }}&nbsp;&nbsp;</a>
						@endforeach
						@foreach($look_title as $look)
							<div class="row post">
								<a href="/show_more{{ $look->post_id }}"><img src="/blog_uploads/s_{{ $look->post_pic }}"></a>
								<div class="resent">
								  <h6><a href="/show_more{{ $look->post_id }}">{{ $look->post_title }}</a></h6><br>
								</div>
							</div>
						@endforeach
						</div>
						<div class="wid-header">
							<h4>友情链接</h4>
							<div class="clear"></div>
						</div>
							@foreach($links as $link)
							<h1 class="title"><a href="{{ $link->link_url }}" title="{{ $link->link_title }}">{{ $link->link_name }}</a></h1>
							@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--------------Footer--------------->
<footer>
	<div class="zerogrid">
	   <div class="col-1-3">
			<div class="copyright">
				<p>© 2015 zAvada. More Templates <a href="/blog" target="_blank" title="138开拓者">138开拓者</a> </p>
			</div>
	   </div>
	   <div class="col-1-3">
			<div class="back-to-top">
				<a href="#">返回顶部</a>
			</div>
	   </div>
	   <div class="col-1-3">
						<div class="row">
				<div class="footer-social">
					<a href="#"><img src="{{asset('blog_public/images/facebook.png')}}" title="facebook"/></a>
					<a href="#"><img src="{{asset('blog_public/images/twitter.png')}}" title="twitter"/></a>
					<a href="#"><img src="{{asset('blog_public/images/google.png')}}" title="google"/></a>
					<a href="#"><img src="{{asset('blog_public/images/pinterest.png')}}" title="pinterest"/></a>
					<a href="#"><img src="{{asset('blog_public/images/instagram.png')}}" title="instagram"/></a>
				</div>
			</div>
	   </div>
	</div>
</footer>

</div>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/navigation.js"></script>
</body></html>