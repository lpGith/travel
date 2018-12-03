@extends('base.base')

@section('title', '购票主页')
@section('css_js')
	<script type="text/javascript" src="{{asset('./goupiaos/jquery-1.11.3.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('./goupiaos/common.js')}}"></script>
	<link rel="stylesheet" href="{{asset('./goupiaos/base.css')}}" type="text/css">
	<link rel="stylesheet" href="{{asset('./goupiaos/style.css')}}" type="text/css">
	<link rel="stylesheet" href="{{asset('./goupiaos/responsiveslides.css')}}">
	

	<script type="text/javascript" src="{{asset('./goupiaos/responsiveslides.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('./goupiaos/slides.min.jquery.js')}}"></script>
@endsection	
@section('body')
<body>
@endsection	
@section('content')
	<div class="main-contenter cl">

	
		
			<div id="brandalslider">
  				<div id="slides">  				 
				<div class="slides_container" style="overflow: hidden; position: relative; display: block;">
					<div class="slides_control" style="position: relative; width: 2850px; height: 420px; left: -1258.09695856136px;">
					<div class="slide" style="position: absolute; top: 0px; left: 1200px; z-index: 5; display: block;">
						<a id="img_id" href="#" target="_blank">
						<img src="./uploads/goupiao_1.jpg" width="1300" height="420" style="display:block;">
						<img src="./uploads/goupiao_2.jpg" width="1300" height="420" style="display:none;">
						<img src="./uploads/goupiao_3.jpg" width="1300" height="420" style="display:none;">
						<img src="./uploads/goupiao_4.jpg" width="1300" height="420" style="display:none;">
						</a>
						
	  				</div>
					</div>					
				</div>
			
				</div>
			</div>
	
	
</div>
	
	@foreach($info as $aa)	
	<div class="main-contenters cl" >
		<div style="border:1px solid red;width:250px;height:515px;float:right;margin-top:60px;">
		<a href="http://{{$aa[0]->goupiao_url}}">
		<img src="./uploads/{{$aa[0]->goupiao_picname}}" width="250" height="515" >
		</a>
		</div>
		<div class="home-gtyWrap">
		
			<div class="home-gtyTContent">
				<div class="home-gtyTitleBox">
					<dl class="home-gtyTitle cl">
						<dt>{{$aa[0]->goupiao_model}}</dt>
						<dd>	
							<?php if($aa[0]->goupiao_model=="门票"){
										echo "<a href=\"\/zye.cc\goupiaolist\">更多</a>";
									}elseif($aa[0]->goupiao_model=="跟团游"){
										echo "<a href=\"\/zye.cc\goupiaolinelist\">更多</a>";
									}elseif($aa[0]->goupiao_model=="酒店订票"){
										echo "<a href=\"\/zye.cc\goupiaohotellist\">更多</a>";
									}  
							?>
						</dd>
					</dl>
				</div>
				
				<div class="home-gtyContent cl" >
 					<div class="home-gtyTourList">
						<ul>
						@foreach($aa as $bb)
						<li>
								
							<?php if($aa[0]->goupiao_model=="门票"){
										echo "<a href=\"\/zye.cc\goupiaodetail?id={$bb->pic_id}\">";
									}elseif($aa[0]->goupiao_model=="跟团游"){
										echo "<a href=\"\/zye.cc\goupiaolinedetail?id={$bb->pic_id}\">";
									}elseif($aa[0]->goupiao_model=="酒店订票"){
										echo "<a href=\"\/zye.cc\goupiaohoteldetail?id={$bb->pic_id}\">";
									}  
							
							?>
									<img src="./uploads/{{$bb->pic_picname}}">
									<div class="home-gtyListInfos">
										<dl class="home-gtyInfoTitle cl" style="bottom: 0px;">
											<dt>{{$bb->pic_miaoshu}}</dt>
											<dd>{{$bb->pic_huodong}}</dd>
										</dl>
										<dl class="home-gtyPriceInfos cl">
											<dt>已有0人参团</dt>
											<dd>¥ {{$bb->pic_price}}<i>起</i></dd>
										</dl>
									</div>
								</a>
							</li>
						@endforeach	
							
						</ul>
					</div>
				</div>
			</div>	
		</div>
	</div>
	@endforeach
	<script  type="text/javascript">
	//图片轮播
           var mytime=null;
           var m=1;
           function running(){
               if(mytime==null){
                    mytime = setInterval(function(){
                        $("#img_id img").hide().eq(m).fadeIn(2000);
						 m++;
                        if(m>=$("#img_id img").length){
                            m=0;
                        }
                    },4000);
               }
           }
           running();
	</script>
@endsection	