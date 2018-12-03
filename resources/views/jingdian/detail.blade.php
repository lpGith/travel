@extends('base.base')
@section('title', '景点详情页')
@section('css_js')
	<script type="text/javascript" src="{{asset('./jingdetails/jquery-1.11.3.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('./jingdetails/common.js')}}"></script>
	<link rel="stylesheet" href="{{asset('./jingdetails/base.css')}}" type="text/css">
	<link rel="stylesheet" href="{{asset('./jingdetails/style.css')}}" type="text/css">
	
@endsection	
@section('body')
<body>
@endsection	
@section('content')		
	<div class="all3d-selectWrap">
	@foreach($data as $yy)
		<div class="all3d-selectContent">
			<dl class="all3d-selectList clearfix">
				<dt>{{$yy[0]->jingdian_name}}</dt>
				<dd>
				@foreach($yy as $zz)
					<a href="/jingdiandetail?id={{$zz->id}}&uid={{$nn->id}}">{{$zz->jingdian_tuming}}</a>
					@endforeach
				</dd> 	
			</dl>	
		</div>
	@endforeach	
	</div>


	<div class="container-content">

  		<div style="margin-top:20px;"></div>

		<div class="crumbs marginTop">
			<p><a href="/">首页</a><span>&gt;
			</span><a href="/jingdianlist?id={{$nn->id}}">{{$nn->jingdian_name}}</a><span>&gt;
			</span><a href="/jingdianlist?id={{$nn->id}}">{{$mm->jingdian_name}}</a><span>&gt;
			</span><a href="/jingdiandetail?id=33&uid=20" class="cur">{{$model->jingdian_tuming}}</a></p>  
		</div>
		<div style="margin-top:20px;"></div>
		<div class="all3d-focusWrap">
			<ul id="all3d-Content">
				<li id="img_id" >
				<img src="{{asset('./jingdetails/011151238534.jpg')}}" >
				<img src="{{asset('./jingdetails/011151410007.jpg')}}" style="display:none;" >
				<img src="{{asset('./jingdetails/081724206924.jpg')}}" style="display:none;" >
				</li>
			</ul>
			<div id="Numbtn" class="Numbtn">
				<a href="#" class="on"></a>
				<a href="#" ></a>
				<a href="#" ></a>
			</div>
		</div>		
		<div class="all3d-infoWrap clearfix marginTop">
			<div class="all3d-subMenu">
				<ul id="all3d-subNav">
					<li class="menuCur"><span>360°全景</span></li>			
					<li><span>山水画卷</span></li>				
					<li><span>美景风光</span></li>				
					<li><span>推荐理由</span></li>					
					<li><span>交通路线</span></li>					
					<li><span>游览须知</span></li>				
				</ul>
			</div>
			<div class="all3d-lBox">				
				{!! $model->jingdian_detail !!}
	
			</div>
			<div style="border:1px solid white;float:right;width:250px;height:auto;margin-top:120px;">
				<h1 style="color:blue;font-size:20px;">热点推荐</h1>
				@foreach($totalnum as $num)
				<li style="border:1px solid white;float:right;width:250px;height:auto;list-style:none;}">
				<a href="/jingdiandetail?id={{$num->id}}&uid={{$nn->id}}">
				<img src="./uploads/{{$num->jingdian_picname}}">
				</a>
				<center style="font-size:20px;">{{$num->jingdian_tuming}}</center>
				</li>
				@endforeach
			</div>
		</div>
		<div style="border:1px solid black;width:900px;height:30px;">	
			<li  style="float:left;font-size:20px; list-style:none;">分享
			<a href="#"><i class="fa fa-facebook"></i></a>
			<a href="#"><i class="fa fa-twitter"></i></a>
			<a href="#"><i class="fa fa-pinterest"></i></a>
			<a href="#"><i class="fa fa-google-plus"></i></a>
			
			</li>
			<li style="float:right;margin-right:50px;font-size:20px;">点赞&nbsp;&nbsp;<a  id="num_id"><i style="color:red;height:30px;" class="fa fa-github"></i></a></li>			
			<li id="pinglun_id" style="float:right;font-size:20px;">评论</li>
			<li id="chakan_pinglun" style="float:right;font-size:20px;" onclick="doload();">{{(empty(session('user')))?'':'查看我的评论'}}</li>
		</div>
		<textarea id="content_id" class="pinglun" style="border:1px solid black;width:900px;height:100px;display:none;">	
			
		</textarea>
		<button id="fasong_id" class="pinglun" style="float:right;margin-right:300px;display:none;"><a href="{{(empty(session('user')))?'/Web/denglu':'#'}}" style="font-size:20px;">发送</a></button>
		<div  id="shuxin_id" value="aa" href="/jingdianpinglun1?id={{(empty(session('user')))?'10000':session('user')->id}}&uid={{$model->id}}" width="900" height="auto"></div>
		
	</div>
	
	<script  type="text/javascript">
	//图片轮播
           var mytime=null;
           var m=1;
           function running(){
               if(mytime==null){
                    mytime = setInterval(function(){
                        $("#img_id img").hide().eq(m).fadeIn(2000);
						$("#Numbtn a").removeClass("on");
                        $("#Numbtn a").eq(m).addClass("on");
                        m++;
                        if(m>=$("#img_id img").length){
                            m=0;
                        }
                    },4000);
               }
           }
           running();
	//评论	 
		$("#pinglun_id").click(function(){
			
			$(".pinglun").toggle();
		});
		$("#fasong_id").click(function(){
				$.ajax({
				url:"/jingdianpinglun",
				type:"get",
				data:{content:$("#content_id").val(),uid:{{$model->id}}},
				dataType:"text",
				async:true,
				success:function(data){
					alert("评论成功！");
					$("#content_id").html();
					$(".pinglun").hide();
					$("#content_id").html("");
					$("#shuxin_id").load('/jingdianpinglun1?id={{(empty(session('user')))?'10000':session('user')->id}}&uid={{$model->id}}');
				},error:function(){
					//alert("加载失败！");
				}
				
			});	
		});
		
		//setInterval(function(){
		//$("#shuxin_id").attr("src","/jingdianpinglun1?id={{(empty(session('user')))?'10000':session('user')->id}}");
	//},3000);
	//加载查看评论
	function doload(){
		$("#shuxin_id").load('/jingdianpinglun1?id={{(empty(session('user')))?'10000':session('user')->id}}&uid={{$model->id}}');
	}
	
	//点赞
	
	var num={{$model->jingdian_num}};
	$("#num_id").click(function(){
		num+=1;
		$.ajax({
			url:"/jingdiannum/{{$model->id}}",
			type:"get",
			data:{jingdian_num:num},
			dataType:"text",
			async:true,
			success:function(data){
				alert(data);
				},error:function(){
				//alert("加载失败！");
			}
				
			});
	});
        </script>
@endsection		
