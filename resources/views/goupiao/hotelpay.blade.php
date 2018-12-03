@extends('base.base')

@section('title', '门票订单')
@section('css_js')
    <link rel="stylesheet" href="{{asset('./goupiaoorders/orderreset.css')}}"  type="text/css">
    <link rel="stylesheet" href="{{asset('./goupiaoorders/orderstyle.css')}}"  type="text/css">
@endsection	
@section('body')
<body>
@endsection	
@section('content')     
<div class="head2nd">
    <div class="content clearfix">
        <a id="logo" href="/" title="张家界旅游网"><img class="tn_logo" src="{{asset('./goupiaoorders/new_logo_v4.gif')}}" alt="途牛旅游网"></a>

        <div class="order_steps">
            <div class="flow_num">
                <ol class="clearfix">
                    <li class="grey">1</li>
                    <li class="grey_line"></li>
                    <li class="green">2</li>
                    <li class="green_line"></li>
                    <li class="grey">3</li>
                    
                </ol>
            </div>
            <div class="flow_word">
                <ol class="clearfix">
                    <li class="grey">填写订单</li>
                    <li class="green">付款</li>
                    <li class="grey">预订成功</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="wrapper">
<div class="content clearfix">
<!--order box start-->

<div class="insurance panel mt20" id="insurance_box">
    <h2>
        <span class="icon visa_icon mr10 vm"></span><span class="vm">订单</span>
    </h2>
    <div class="panel_body">
        <ul class="list">
        <li class="list_header">
            <span class="col2" style="padding-left:25px;width:70%;font-size:20px;color:blue;">酒店名：{{session("list")->jiugou_name}}</span>
            <span class="col5" style="width:15%;font-size:20px;color:red;">{{session('model')->pay_total}}.00元</span>
        </li>
		<li class="list_row ">
			<span class="col2" style="padding-left:25px;width:100%;">酒店地址：{{session("list")->jiugou_address}}</span> 
		</li> 
		<li class="list_row hide baoxian_detail"  style="display: none;">
			<span class="col2" style="padding-left:25px;width:100%;">姓名：{{mb_strcut(session('model')->pay_name,0,4)}}**</span> 
		</li>
		<li class="list_row hide baoxian_detail"  style="display: none;">
			<span class="col2" style="padding-left:25px;width:100%;">身份证号：{{mb_strcut(session('model')->pay_ID,0,6)}}************</span> 
		</li>
		<li class="list_row hide baoxian_detail"  style="display: none;">
			<span class="col2" style="padding-left:25px;width:100%;">房间数：{{session('model')->pay_num}}</span> 
		</li>
		<li class="list_row hide baoxian_detail"  style="display: none;">
			<span class="col2" style="padding-left:25px;width:100%;">天数：{{session('model')->pay_num1}}</span> 
		</li>
		<li class="list_row hide baoxian_detail"  style="display: none;">
			<span class="col2" style="padding-left:25px;width:100%;">交易金额：{{session('model')->pay_total}}.00元</span> 
		</li>
        <li class="list_row hide baoxian_detail"  style="display: none;">
			<span class="col2" style="padding-left:25px;width:100%;">出发日期：{{session('model')->pay_time}}</span> 
		</li>
		<li class="list_row hide baoxian_detail"  style="display: none;">
			<span class="col2" style="padding-left:25px;width:100%;">交易号：{{session('model')->id}}</span> 
		</li>
		<li class="list_row hide baoxian_detail"  style="display: none;">
			<span class="col2" style="padding-left:25px;width:100%;">交易日期：{{date("Y-m-d H:i:s",session('model')->pay_addtime)}}</span> 
		</li>
        </ul>
        <a class="show_more J_more_btn" id="baoxian1" href="javascript:;">订单详情</a>
    </div>
</div>
<div class="insurance panel mt25" id="contact_box">
    <h2><span class="icon place_icon mr10 vm"></span><span class="vm">*支付方式</span></h2>
    <div class="panel_body">
	    <ul class="list">
			<li class="list_row ">
			<button style="width:170px;"><span class="col2" id="myprice_id" style="padding-left:55px;line-height:30px;">账户余额</span></button> 
			
			<button style="width:170px;"><span class="col2" id="zhifubao_id" style="padding-left:45px;line-height:30px;">支付宝支付</span></button> 
			
			<button style="width:170px;"><span class="co12" id="weixin_id" style="padding-right:15px;line-height:30px;">微信支付</span></button> 
			</li>
			<!--   余额支付隐藏 -->		
			<li class="list_row hide myprice mt20"   style="display: block;">
				<span class="col2 " style="padding-left:25px;width:20%;font-size:15px;">请输入您的密码</span> 
			</li>
			<li class="list_row hide myprice mt15"   style="display: block;">
				<span class="col2" style="padding-left:25px;">
				<input class="kong upass" info="密码" type="password" onblur="checkupass()" name="upass" style="height:30px;border:1px solid black;" placeholder="请输入您的密码" value=""/>
				</form>
				</span> 				
			</li>
			<li class="list_row hide myprice"   style="display: block;">
				<span class="col2" style="padding-left:25px;"><a href="{{URL('/email')}}" style="color:blue;">&nbsp;忘记密码？</a></span> 
			</li>
			</li>
			<li class="list_row hide myprice mt15"   style="display: block;">
				<button id="dopay_id" style="width:100px;margin-left:25px;"><span class="col2" style="padding-left:25px;"><a onclick="return dosubmit();" id="dopay_id" href="/goupiaohotelmail?id={{session('list')->id}}&uid={{session('model')->id}}">确认支付</a></span></button> 
			</li>
			<!--  end -->
		 </ul>
		 <!--  支付宝 -->
		 <li class="hide zhifubao mt15" style="display: none;">
			<div style="width:200px;height:200px;border:1px solid black;margin-left:180px;"><img  src="./goupiaoorders/erweima.png" /></div>
		</li>
		<!--  end -->
    </div>       
    </div>   
</div>


<script type="text/javascript"  src="{{asset('./public_js/jquery-1.8.3.min.js')}}"></script>
<script type="text/javascript">

$("#baoxian1").click(function(){
	//alert("aa");
	$(".baoxian_detail").toggle();
});	
$("#myprice_id").click(function(){
	//alert("aa");
	$(".zhifubao").hide();
	$(".myprice").toggle();
});
//密码判断
 function checkupass(){
	 ob=$("input[name='upass']");
	 ob.next("a").remove();
              if(ob.val().length<1){
					$("<a>"+ob.attr("info")+"不能为空</a>").insertAfter(ob).css("color","red");
					return false;
				}else{
					$.ajax({
						type:"get",
						url:"/goupiaoajax",
						data:{upass:ob.val()},
						dataType:"text",
						async:true,
						success:function(data){
							//alert(data);
							if(data=='no'){
								$("<a style='width:5px'> 密码不正确！</a>").insertAfter("input[name='upass']").css("color","red");
								return false;
							}else if(data=='yes'){
								$("<a style='width:5px'> 密码正确！</a>").insertAfter("input[name='upass']").css("color","blue");	
								return true;
							}
						},
					});			
				}
			}
function dosubmit(){

	return checkupass();
}			
/*
$("input[name='upass']").blur(function(){
	$(this).next("a").remove();
	
	if($(this).hasClass("kong")){
		if($(this).val().length<1){
			$("<a>"+$(this).attr("info")+"不能为空！</a>").insertAfter($(this)).css("color","red");
			return false;
		}
	}
	
	if($(this).hasClass("upass")){	
		$.ajax({
			type:"get",
			url:"/goupiaoajax",
			data:{upass:$(this).val()},
			dataType:"text",
			async:true,
			success:function(data){
				//alert(data);
				if(data=='yes'){
					$("<a style='width:10%'> 密码正确！</a>").insertAfter("input[name='upass']").css("color","blue");							
				}else if(data=='no'){
					$("<a style='width:10%'> 密码不正确！</a>").insertAfter("input[name='upass']").css("color","red");
					return false;
				}
	
			},error:function(){
				alert("加载失败！");
			}
			
		});
	}
});	
*/	
$("#zhifubao_id").click(function(){
	//alert("aa");
	$(".myprice").hide();
	$(".zhifubao").toggle();
});

</script>
@endsection	