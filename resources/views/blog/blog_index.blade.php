<!---<a href="/blog">论坛首页</a>||<a href="/blog_work/create">添加帖子</a><br/>
@foreach($blog as $list)
	标题：{{ $list->post_title }}<br/>
	图片：<img src="/blog_uploads/s_{{ $list->post_pic }}"><br/>
	内容：{{ $list->post_content }}<br/>
	作者：{{ $list->username }}
	<a href="/show_more{{ $list->post_id }}">查看更多</a><br/>
@endforeach
-->




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
	<link rel="stylesheet" href="{{asset('admins/bootstrap/css/bootstrap.min.css')}}">
	<script src="{{asset('blog_public/js/jquery.min.js')}}"></script>
	<script src="{{asset('admins/bootstrap/js/bootstrap.min.js')}}"></script>
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
				  <li><a href="/">返回旅游</a></li>
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
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>
  <!-- Wrapper for slides -->
  @foreach( $pics as $pic )
  @endforeach
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="/blogpic_uploads/{{ $pic->pic_path }}" alt="张家界">
      <div class="carousel-caption">
       {{ $pic->pic_title }}
      </div>
    </div>
	@foreach( $pics as $k=>$pic )
		@if($k!=2)
    <div class="item">
      <img src="/blogpic_uploads/{{ $pic->pic_path }}" alt="张家界">
      <div class="carousel-caption">
		{{ $pic->pic_title }}
      </div>
    </div>
		@endif
	@endforeach
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


<!--<div class="wrap-header">
		<div class="zerogrid">
			<div id="logo"><img src="{{asset('blog_public/images/logo.png')}}"></div>
			</div>
</div>-->
<!--<div class="header-search">
				<center><form method="get" action="/blog" id="search">
				  <input name="name" type="text" size="40" placeholder="输入标题" />
				</form></center>
	</div>-->
<!--------------Content--------------->
<section class="container">
	<div class="zerogrid">
		<div class="col-2-3">
			<div id="main-content">
				<div class="row">
					@foreach($blog as $list)
					<div class="col-1-2">
						<div class="wrap-col" >
							<article style="height:600px">
							<div class="imgs" style="height:200px;overflow:hidden;">
								<img class="full" src="/blog_uploads/s_{{ $list->post_pic }}" >
							</div>
								<div class="wrap-art">
									<div class="art-header">
										<h1 class="title"><a href="/show_more{{ $list->post_id }}">{{ $list->post_title }}</a></h1>
									</div>
									<div class="art-content" style="height:11em;text-overflow:ellipsis;overflow:hidden;text-indent:2em;">
										<p>{{ $list->post_content }}</p>
									</div>
										<center><a href="/show_more{{ $list->post_id }}" class="button">查看更多</a></center>
									<div class="art-footer">
										<div class="meta clearfix">
											<div class="comment">
											  <a href="/show_more{{ $list->post_id}}#com">评论</a>
											</div>
											<div class="user">
											  作者：{{ $list->username }}
											</div>
											<div class="user">
											  访问量：{{ $list->post_number }}
											</div>
											<div class="user">
												<img value="{{ $list->post_id}}" src="{{asset('/blog_public/images/prise1.png')}}" id="prise">{{ $list->post_prise }}
											</div>
										</div>
									</div>
								</div>
							</article>
						</div>
					</div>
					@endforeach
<!----------------------------------------主体结束---------------------------------------------------------->
				</div>
				<center><div id="page">{!! $blog->appends($where)->render() !!}</div></center>
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
				<p>© 2016. More Templates <a href="/blog" target="_blank" title="意象工作室">意象工作室</a> </p>
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
<script>
	$(".user #prise").click(
	function(){
			$.ajax({
				url:'/blog_prise',
				type:'get',
				async:true,
				cache:true,
				data:{
						post_id:$(this).attr("value"),	
					},
				success:function(data){
					alert("点赞成功！");
					window.location.reload();
				},
			});
		}
	);
</script>
</body>
</html>
