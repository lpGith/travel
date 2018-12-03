@extends('base.base')

@section('title', '酒店票订单')
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
                    <li class="green">1</li>
                    <li class="green_line"></li>
                    <li class="grey">2</li>
                    <li class="grey_line"></li>
                    <li class="grey">3</li>
                    
                </ol>
            </div>
            <div class="flow_word">
                <ol class="clearfix">
                    <li class="green">填写订单</li>
                    <li class="grey">付款</li>
                    <li class="grey">预订成功</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="wrapper">
<div class="content clearfix">
<!--order box start-->
<div class="order_box" id="order_box">
    <h1 class="order_title " style="color:blue"><span class="icon heart_icon mr10 vm"></span>{{$list->jiugou_name}}</h1>
    <div class="order_form">
        <div class="field J_departCity">
            <label>酒店地址：{{$list->jiugou_address}}</label>   
        </div>
       
		<div class="field J_departCity">
            <label  style="color:red;">酒店票价：<span id="one_price">{{$list->jiugou_price1}}</span>元/间/天起/</label>   
        </div>
        <div class="field J_touristCount">
			<label>预定房间数：</label>
			<div class="input_number J_adultCount">	
				<label>房间数</label><button  id="button_num_id1" >-</button>
									<span id="num_id">0</span>
									<button  id="button_num_id2">+</button>
				<label>天数</label><button  id="button_num_id3" >-</button>
									<span id="num_id1">0</span>
									<button  id="button_num_id4">+</button>					
			</div>
        </div>
		 <div class="field J_departDate">
            <label>出发日期：</label>
            <div class="input_select w_350">
               
                <div class="s_cnum">
                    <span class="sc_arrow"></span>
				<form class="J_form" id="form_id" onsubmit="return doCheck()" action="/goupiaodopayhotel" method="post">
                    <select style="width:390px;" name="pay_time">
						<option disabled value="">{{date("Y-m-d",strtotime("+0 day"))}}</option>
						<option  value="{{date("Y-m-d",strtotime("+1 day"))}}">{{date("Y-m-d",strtotime("+1 day"))}}</option>
						<option value="{{date("Y-m-d",strtotime("+2 day"))}}">{{date("Y-m-d",strtotime("+2 day"))}}</option>
						<option value="{{date("Y-m-d",strtotime("+3 day"))}}">{{date("Y-m-d",strtotime("+3 day"))}}</option>
						<option value="{{date("Y-m-d",strtotime("+4 day"))}}">{{date("Y-m-d",strtotime("+4 day"))}}</option>
						<option value="{{date("Y-m-d",strtotime("+5 day"))}}">{{date("Y-m-d",strtotime("+5 day"))}}</option>
						<option value="{{date("Y-m-d",strtotime("+6 day"))}}">{{date("Y-m-d",strtotime("+6 day"))}}</option>
					</select>
                </div>
            </div>
		</div>
         <div class="field">
            <label>酒店星级：</label>
            <span>{{$list->jiugou_pingji}}</span>
		</div>
            </div>
   
</div>
<!--order box end-->

<!--hotel boxes start-->
<div class="" id="J_hotel_boxes"></div>
<!--hotel boxes end-->

<!--contact box start-->
<div class="contact panel mt20" id="contact_box">
    <h2><span class="icon contact_icon mr10 vm"></span><span class="vm">联系人信息</span></h2>
    <div class="panel_body">
	<div class="field email_tips ">       
         <p>· 为了保障您的合法权益，请准确、完整地填写游客证件信息，错误的身份信息可能造成额外的退、改费用</p>       
         <p>· 出游人信息不完整会延误你的正常出游；因信息不完整、不准确造成的保险拒赔等问题，我司不承担相应责任。</p>       
     </div>
			<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
			<input class="field_input" type="hidden" name="pay_type" value="酒店订票">
			<input class="field_input" type="hidden" name="pay_jingdianname" value="{{$list->jiugou_name}}">
			<input class="field_input" type="hidden" name="pay_typeid" value="{{session('user')->id}}">
			<input class="field_input" type="hidden" name="tid" value="{{$list->id}}">
			<input class="field_input" id="pay_total_id" type="hidden" name="pay_total" value="">
			<input class="field_input" id="pay_num_id" type="hidden" name="pay_num" value="">
			<input class="field_input" id="pay_num_id1" type="hidden" name="pay_num1" value="">
            <div class="field J_name mt15">
                <label class="field_label">姓名：</label>
                <input class="field_input kong pay_name" type="text" onblur="checkname()" name="pay_name" info="姓名" placeholder="姓名" value="">
			</div>
			 <div class="field J_name mt15">
                <label class="field_label">身份证：</label>
                <input class="field_input kong pay_ID" type="text" onblur="checkID()" name="pay_ID" info="身份证" placeholder="身份证" value="">
			</div>
             <div class="field J_mobile mt15">
                <label class="field_label">手机号码：</label>
                  <input class="field_input kong pay_phone" type="text" onblur="checkphone()" name="pay_phone" info="手机号码" placeholder="手机号码" value="">
			</div>
           
           
			<div class="field email_tips mt15">
                <p>付款完成后,您的邮箱将收到加盖公章的合同,您也可以在个人中心查看和下载您的合同。</p>       
               </div>
        </form>
    </div>
</div>

<div class="contact panel mt25" id="contact_box">
    <h2><span class="icon notice_icon mr10 vm"></span><span class="vm">*预订须知</span></h2>
    <div class="panel_body">
	<div class="field email_tips ">       
         <p>1.本产品的预定跟张家界旅游官网无关。<br>
			2.请您先打电话确认酒店相关信息，谨防诈骗。	
		 </p>       
    </div>       
    </div>   
</div>
<div class="contact panel mt25" id="insurance_box">
	<div class="panel_body">
		<div style="border:1px solid yellow;width:180px;height:30px;margin:20px 50px;float:left;background-color:yellow;">
		<a style="font-size:22px;line-height:-10px;">总价：<span id="total_price">0</span></a>
		</div>
		<div style="border:1px solid yellow;width:290px;height:30px;margin:20px 50px;float:right;background-color:yellow;">
		<button onclick="dosubmit();"><a style="font-size:22px;line-height:-10px;" >我已阅读预订须知，提交订单</a></button>
		</div>
	</div>
</div>

<script type="text/javascript"  src="{{asset('./public_js/jquery-1.8.3.min.js')}}"></script>
<script type="text/javascript">
//判断点击房间数减号时价格的控制
$("#button_num_id1").click(function(){
	
	var num=$("#num_id").html();
	num--;
	if(num<1){
		$("#num_id").html(0);
		var num2 = $("#num_id1").html();
		if(num2<1){
			$("#total_price").html(0);
			$("#pay_total_id").val(0);
		}else{
			var price = $("#one_price").html();
			$("#total_price").html(price*num2);
			$("#pay_total_id").val(price*num2);
		}
		
	}else{
		$("#num_id").html(num);
		$("#pay_num_id").val(num);
		var price = $("#one_price").html();
		var num2 = $("#num_id1").html();
		$("#total_price").html(price * num+price*num2);
		$("#pay_total_id").val(price * num+price*num2);		
	}
	
});
//判断点击房间数加号时价格的控制
$("#button_num_id2").click(function(){
	
	var num=$("#num_id").html();
	num++;
	$("#num_id").html(num);
	$("#pay_num_id").val(num);
	var price = $("#one_price").html();
	var num2 = $("#num_id1").html();
	$("#total_price").html(price * num+price*num2);
	$("#pay_total_id").val(price * num+price*num2);
	//$("#pay_total_id").val(price * num);
});
//判断点击天数加号时价格的控制
$("#button_num_id4").click(function(){
	var num=$("#num_id1").html();
	num++;
	$("#num_id1").html(num);
	$("#pay_num_id1").val(num);
	var price = $("#one_price").html();
	var num2 = $("#num_id").html();
	$("#total_price").html(price * num+price*num2);
	$("#pay_total_id").val(price * num+price*num2);
});
//判断点击天数减号时价格的控制
$("#button_num_id3").click(function(){
	var num=$("#num_id1").html();
	num--;
	if(num<1){
		$("#num_id1").html(0);
		var num2 = $("#num_id").html();
		if(num2<1){
			$("#total_price").html(0);
			$("#pay_total_id").val(0);
		}else{
			var price = $("#one_price").html();
			$("#total_price").html(price*num2);
			$("#pay_total_id").val(price*num2);
		}
	}else{
		$("#num_id1").html(num);
		$("#pay_num_id1").val(num);
		var price = $("#one_price").html();
		var num2 = $("#num_id").html();
		$("#total_price").html(price * num+price*num2);
		$("#pay_total_id").val(price * num+price*num2);
	}
	
});

//$("#total_price").html(Number($("#total_price1").html())+Number($("#total_price2").html()));
//表单js验证

//姓名判断
 function checkname(){
	 ob=$("input[name='pay_name']");
	 ob.next("span").remove();
              if(ob.val().length<1){
					$("<span>"+ob.attr("info")+"不能为空</span>").insertAfter(ob).css("color","red");
					return false;
				}else{
					if(ob.val().match(/^(.*?)$/)==null){
					$("<span>"+ob.attr("info")+"的格式不正确！</span>").insertAfter(ob).css("color","red");
					return false;
				}else{
					$("<span>"+ob.attr("info")+"正确！</span>").insertAfter(ob).css("color","green");
					return true;
				}
			}	
        }
//身份证号验证
function checkID(){
	 ob=$("input[name='pay_ID']");
	 ob.next("span").remove();
              if(ob.val().length<1){
					$("<span>"+ob.attr("info")+"不能为空</span>").insertAfter(ob).css("color","red");
					return false;
				}else{
					if(ob.val().match(/^[1-9]\d{5}[1-9]\d{3}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}([0-9]|X)$/)==null){
					$("<span>"+ob.attr("info")+"的格式不正确！</span>").insertAfter(ob).css("color","red");
					return false;
				}else{
					$("<span>"+ob.attr("info")+"正确！</span>").insertAfter(ob).css("color","green");
					return true;
				}
			}	
        }
//手机号验证
function checkphone(){
	 ob=$("input[name='pay_phone']");
	 ob.next("span").remove();
              if(ob.val().length<1){
					$("<span>"+ob.attr("info")+"不能为空</span>").insertAfter(ob).css("color","red");
					return false;
				}else{
					if(ob.val().match(/^[1][3-8][0-9]{9}$/)==null){
					$("<span>"+ob.attr("info")+"的格式不正确！</span>").insertAfter(ob).css("color","red");
					return false;
				}else{
					$("<span>"+ob.attr("info")+"正确！</span>").insertAfter(ob).css("color","green");
				    return true;
				}
			}	
        }

function doCheck(){
			return checkname() && checkID() && checkphone();
			
		}
function dosubmit(){
	$("#form_id").submit();
}		
//聚焦输入框后删除所有的span节点 

		$("input").focus(function(){
			$(this).next("span").remove();
			 ob=$(this);
			 if(ob.attr("name")=='pay_name'){ //判断pay_name时聚焦时输出的内容
				$("<span>请输入您的"+ob.attr("info")+"</span>").insertAfter(ob).css("color","green");
			 }else if(ob.attr("name")=='pay_ID'){//判断name=pay_ID
				$("<span>请输入您的"+ob.attr("info")+"</span>").insertAfter(ob).css("color","green");
			 }else if(ob.attr("name")=='pay_phone'){//判断pay_phone时聚焦时输出的内容
				$("<span>请输入您的"+ob.attr("info")+"</span>").insertAfter(ob).css("color","green");
			 }else if(ob.attr("name")=='pay_email'){//判断pay_email时聚焦时输出的内容
				$("<span>请输入您的"+ob.attr("info")+"</span>").insertAfter(ob).css("color","green");
			 }
			
		});
</script>
@endsection	