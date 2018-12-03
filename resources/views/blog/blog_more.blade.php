
<!--@foreach($first as $more)
	标题：{{ $more->post_title }}<br/>
	图片：<img src="/blog_uploads/{{ $more->post_pic }}"><br/>
	内容：{{ $more->post_content }}<br/>
	@foreach($comment as $clist)
	{{ $clist->username }}：{{ $clist->comment_content }}<br/>
	@endforeach
@endforeach-->

<!--@if(empty($replayc))
	
@else
	@foreach($replayc as $replaycs)
	@endforeach
	@if("{{ $clist->username }}"=="{{ $replaycs->username }}" && "{{ $clist->username }}"=="{{ $replaycs->username }}")
	
		@foreach($replayp as $replayps)
		{{ $replayps->username }}回复：{{ $replayps->replay_content }}
		@endforeach
	@endif
@endif-->

<!--
@if(empty($comment))
		好可惜啊！还没有人评论...
			@else
				@foreach($comment as $clist)
					{{ $clist->username }}说：{{ $clist->comment_content }} <a href="javascript:;" onclick="Reply()"> 回复</a><br/>
					
					<!-------------------------------------------------------------------------->
							<!--@if(empty($replayc))
	
@else
	@foreach($replayc as $replaycs)
	@endforeach
	@if("{{ $clist->username }}"=="{{ $replaycs->username }}" && "{{ $clist->username }}"=="{{ $replaycs->username }}")
	
		@foreach($replayp as $replayps)
		&nbsp;&nbsp;&nbsp;&nbsp;{{ $replayps->username }}回复{{ $replaycs->username }}：{{ $replayps->replay_content }}<a href="javascript:;" onclick="Reply()"> 回复</a><br/>
		@endforeach
	@endif
@endif
					<!-------------------------------------------------------------------------->
			<!--	@endforeach 
@endif-->

<!DOCTYPE html>
<head>
    <!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
    
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
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>
  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="{{asset('blog_public/images/01.jpg')}}" alt="张家界">
      <div class="carousel-caption">
       欢迎光临张家界论坛
      </div>
    </div>
	@foreach( $pics as $pic )
    <div class="item">
      <img src="/blogpic_uploads/{{ $pic->pic_path }}" alt="...">
      <div class="carousel-caption">
		{{ $pic->pic_title }}
      </div>
    </div>
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
			<div id="logo"><a href="#"><img src="{{asset('blog_public/images/logo.png')}}" width="400"></a></div>
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
			<div id="main-content" class="wrap-col">
				<article class="single">
					<img src="/blog_uploads/{{ $more->post_pic }}" class="full">
					<div class="wrap-art">
						<div class="art-header">
							<h1 class="title">{{ $more->post_title }}</h1>
						</div>
						<div class="art-content" style="text-indent:2em;">
							{{ $more->post_content }}
						</div>
					</div>
				</article>
					<!-----------------------------分享--------------------------------------------------->
				<article class="single" style="float:right;margin-right:80px;">
					&nbsp;&nbsp;&nbsp;&nbsp;分享到
					&nbsp;&nbsp;<a href="javascript:void(0);" onclick="window.open('http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url='+encodeURIComponent(document.location.href));return false;" title="分享到QQ空间"><img src="{{asset('blog_public/images/qz_logo.png')}}" alt="分享到QQ空间" />&nbsp;QQ空间</a>
					&nbsp;&nbsp;<a href="javascript:void(0)" onclick="postToWb();" class="tmblog"><img src="{{asset('blog_public/images/weiboicon16.png')}}">&nbsp;腾讯微博</a> <script type="text/javascript">
 
function postToWb(){
 
var _t = encodeURI(document.title);
 
var _url = encodeURI(document.location);
 
var _appkey = encodeURI("appkey");//你从腾讯获得的appkey
 
var _pic = encodeURI('');//（列如：var _pic='图片url1|图片url2|图片url3....）
 
var _site = '';//你的网站地址
 
var _u = 'http://v.t.qq.com/share/share.php?title='+_t+'&url='+_url+'&appkey='+_appkey+'&site='+_site+'&pic='+_pic;
 
window.open( _u,'转播到腾讯微博', 'width=700, height=680, top=0, left=0, toolbar=no, menubar=no, scrollbars=no, location=yes, resizable=no, status=no' );
 
}
 
</script>
				</article>
<!---------------------------------------分享结束----------------------------------------------------->
				<article class="single">
					<div class="wrap-art">
						<div class="art-header">
							<h1 class="title">评论</h1>
						</div>
						<div class="art-conten" id="comments">
						@if(empty($comment))
								好可惜啊！还没有人评论...
							@else
							@foreach($comment as $clist)
								<b>{{ $clist->username }}</b>说：{{ $clist->comment_content }}&nbsp;&nbsp;&nbsp;&nbsp;<i>{{ $clist->comment_time }}</i> <!--<a href="javascript:;" onclick="Reply()"> 回复</a>--><br/><br/>
							@endforeach 
							@endif
						</div>
					</div>
				</article>
					<article class="single">
					<div class="wrap-art">
						<div class="art-header">
							我要评论
						</div>
						<div class="art-content" id="commentt">
						<!--<form action="/blog_comment" method="post">
							<input type="hidden" name="_method" value="post">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<input type="hidden" name="post_id" value="{{ $more->post_id }}">
							<input type="hidden" name="post_user_id" value="{{ $more->post_user_id }}">
							<textarea id="comment" name="comment_content" colos="10" rows="3">
								
							</textarea>-->
							<textarea id="comment" name="comment_content"></textarea>	
							<button id="sub" class="btn btn-primary" style="width:60px;height:30px;float:right">评论</button>
						</div>
					</div>
				</article>
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
				<p>© 2016 <a href="/blog" target="_blank" title="意象工作室">意象工作室</a> </p>
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
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
		});
	$("#sub").click(function(){
		if($("#comment").val()==""){
			alert("请输入评论信息");			
		}else{
			$.ajax({
				url:'/blog_comment',
				type:'post',
				async:false,
				data:{
							post_id:{{ $more->post_id }},
							post_user_id:{{ $more->post_user_id }},
							comment_content:$("#comment").val()
					},
				success:function(data){
					var comment = $('#comments');
					comment.load('/show_more{{ $more->post_id }} #comments');
				},
			});
		}
	});
</script>
</body></html>