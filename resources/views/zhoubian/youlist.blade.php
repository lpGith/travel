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
<div class="container-fluid">
	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    @for($i=1;$i<count($lunbo);$i++)
        <li data-target="#carousel-example-generic" data-slide-to="i"></li>
    @endfor
  </ol>
    <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            @foreach($lunbo as $k=>$v)
                @if($k>0)
                    <div class="item">
                        <img src="/admin_zhoubian/{{$v->picname}}">
                        <div class="carousel-caption" style="margin-bottom:10px">
                            <span style='font:25px/1 微软雅黑'>{{ $v->name }}</span>
                        </div>
                    </div>
                @else
                    <div class="item active">
                    <img src="/admin_zhoubian/{{$v->picname}}">
                    <div class="carousel-caption"style="margin-bottom:10px">
                        <span style='font:25px/1 微软雅黑'>{{ $v->name }}</span>
                    </div>
                    </div>
                @endif
            @endforeach
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only"></span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only"></span>
    </a>
    </div>
</div>
<div style="width:30%;height:50px;margin-top:28px;">
    <ul style="display-list:none">
        <li style="float:left;margin-left:40px"><a href="/zhoubian/youlist" style="font:20px/50px 微软雅黑">全部</a></li>
        <li style="float:left;margin-left:40px"><a href="/zhoubian/youlists" style="font:20px/50px 微软雅黑">新开发路线</a></li>
        <li style="float:left;margin-left:40px"><a href="/zhoubian/youlistd" style="font:20px/50px 微软雅黑">热门路线</a></li>
    </ul>
</div>
    <div style="margin:17px">
	<div class="row-fluid" >
		<div class="col-md-3 daohang">
			<div class="mkeContentBox">
                <!--效果html开始-->
                <div class="box_1">
                    <div class="mar_bor"></div>
                    <!--正面-->
                    <div class="info1">
                        <div class="sm_img"></div>
                    </div>
                    <!--反面-->
                    <a href="/zhoubian/zhulist"><div class="ingo_fm">
                        <h3>酒店客栈</h3>
                    </div></a>
                </div>
                <!--效果html结束-->
            </div>
            <div class="mkeContentBox">
                <!--效果html开始-->
                <div class="box_1">
                    <div class="mar_bor"></div>
                    <!--正面-->
                    <div class="info2">
                        <div class="sm_img"></div>
                    </div>
                    <!--反面-->
                    <a href="/zhoubian/zoulist"><div class="ingo_fm">
                        <h3>出行指南</h3>
                    </div></a>
                </div>
                <!--效果html结束-->
            </div>
            <div class="mkeContentBox">
                <!--效果html开始-->
                <div class="box_1">
                    <div class="mar_bor"></div>
                    <!--正面-->
                    <div class="info3">
                        <div class="sm_img"></div>
                    </div>
                    <!--反面-->
                    <a href="/zhoubian/chilist"><div class="ingo_fm">
                        <h3>餐饮美食</h3>
                    </div></a>
                </div>
                <!--效果html结束-->
            </div>
            <div class="mkeContentBox">
                <!--效果html开始-->
                <div class="box_1">
                    <div class="mar_bor"></div>
                    <!--正面-->
                    <div class="info4">
                        <div class="sm_img"></div>
                    </div>
                    <!--反面-->
                    <a href="/zhoubian/wanlist"><div class="ingo_fm">
                        <h3>娱乐活动</h3>
                    </div></a>
                </div>
                <!--效果html结束-->
            </div>
            <div class="mkeContentBox">
                <!--效果html开始-->
                <div class="box_1">
                    <div class="mar_bor"></div>
                    <!--正面-->
                    <div class="info5">
                        <div class="sm_img"></div>
                    </div>
                    <!--反面-->
                    <a href="/zhoubian/youlist"><div class="ingo_fm">
                        <h3>经典路线</h3>
                    </div></a>
                </div>
                <!--效果html结束-->
            </div>
            <div class="mkeContentBox">
                <!--效果html开始-->
                <div class="box_1">
                    <div class="mar_bor"></div>
                    <!--正面-->
                    <div class="info6">
                        <div class="sm_img"></div>
                    </div>
                    <!--反面-->
                    <a href="/zhoubian/mailist"><div class="ingo_fm">
                        <h3>特产推荐</h3>
                    </div></a>
                </div>
                <!--效果html结束-->
            </div>
		</div>
        @foreach($list as $you)
		<div class="col-md-9" style="height:300px;border-radius:8px; border:5px solid #ddd;float:right">
			
            <div class="box" style="margin:22px;float:left">
                <div class="he_border2 col-md-6"> 
                    <img class="he_border2_img" src="/admin_zhoubian/{{ $you->you_typepicname }}" alt="Image 01">
                    <div class="he_border2_caption">
                    <h3 class="he_border2_caption_h" style="font: 2em 微软雅黑;">{{ $you->you_typename }}</h3>
                    <a class="he_border2_caption_a" href="/zhoubian/youxiangqing/{{ $you->id }}"></a> </div>
                </div>
            </div>
            <div class="col-md-6"style="margin:20px">
                
                <p>
                    <span class="text-danger" style="font:1.5em 微软雅黑;">{{ $you->you_typename }}</span>
                </p>
                
                <dl>
                    <dt>
                        </span>旅途时间:</span><span style="font:1em/3 微软雅黑;color:red">{{ $you->you_typetime }}</span>   
                    </dt>
                    <dt>
                        <span style="font:1em/3 微软雅黑;" title="{{ $you->you_typedescribe }}">{!! mb_substr($you->you_typedescribe,0,200) !!}...</span>   
                    </dt>
                    
                </dl>
                
                
                
                <p>
                    <a class="btn" href="#">查看详情</a>
                </p>
            </div>
        </div>
        <div class="col-md-9" style="height:20px;"></div>
        @endforeach
        <span style="display:block;margin-left:600px">{!! $list->appends($where)->render() !!}</span>
    </div>
    </div>
		
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- jQuery 2.1.4 -->
    <script src="{{asset('admins/plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="{{asset('admins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>     
    
    <!-- Slimscroll -->
    <script src="{{asset('admins/plugins/slimScroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
    <!-- FastClick -->
    <script src="{{asset('admins/plugins/fastclick/fastclick.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('admins/dist/js/app.min.js')}}" type="text/javascript"></script>    

    <!-- AdminLTE 用于演示目的 -->
    <script src="{{asset('admins/dist/js/demo.js')}}" type="text/javascript"></script>
    <script type="text/javascript" src="{{asset('zhoubian/scripts/jquery.min.js')}}"></script>
    <script src="{{asset('zhoubian/scripts/feedback_util.js')}}"></script>
    <script type="text/javascript" src="{{asset('zhoubian/scripts/onlineService.js')}}"></script>

		<div class="inner footer">
			<!-- Socials Media -->
			<div class="col-xs-12 footer-box animated" data-animation="tada" data-animation-delay="0">
				<!-- Social 1 -->
				<a class="footer-links"><i class="fa fa-facebook"></i></a>
				<a class="footer-links"><i class="fa fa-twitter"></i></a>	
				<a class="footer-links"><i class="fa fa-google-plus"></i></a>
				<a class="footer-links"><i class="fa fa-pinterest"></i></a>
				<p class="footer-text copyright">2016意象工作室</p> 
			</div>
			<div class="clear"></div>
		</div> 	

<!-- 页脚结束 -->
	<!--  该js导入看你自己是否导入，主要用来使用jquery -->
	
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
	</script>
</body>
</html>	