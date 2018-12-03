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
        <a id="logo" href="http://www.tuniu.com/" title="张家界旅游网"><img class="tn_logo" src="{{asset('./goupiaoorders/new_logo_v4.gif')}}" alt="途牛旅游网"></a>

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
    <h1 class="order_title " style="color:blue"><span class="icon heart_icon mr10 vm"></span>{{$list->list_name}}</h1>
    <div class="order_form">
        <div class="field J_departCity">
            <label>景区地址：{{$list->list_address}}</label>   
        </div>
       
		<div class="field J_departCity">
            <label  style="color:red;">景区票价：<span id="one_price">{{$list->list_shichangprice}}</span>元/人起</label>   
        </div>
        <div class="field J_touristCount">
			<label>出游人数：</label>
			<div class="input_number J_adultCount">	
				<label>成人</label><button  id="button_num_id1" >-</button>
									<span id="num_id">0</span>
									<button  id="button_num_id2">+</button>
			</div>
        </div>
		 <div class="field J_departDate">
            <label>出发日期：</label>
            <div class="input_select w_350">
               
                <div class="s_cnum">
                    <span class="sc_arrow"></span>
				<form class="J_form" id="form_id" onsubmit="return doCheck()" action="/goupiaodopay" method="post">
                    <select style="width:390px;border: none" name="pay_time">
                       @foreach($model as $v)
						<option  value="{{$v}}">{{$v}}</option>
                       @endforeach
					</select>
                </div>
            </div>
		</div>
         <div class="field">
            <label>景区特色：</label>
            <span>{{$list->list_jianjie}}</span>
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
			<input class="field_input" type="hidden" name="pay_jingdianname" value="{{$list->list_name}}">
			<input class="field_input" type="hidden" name="pay_type" value="景点门票">
			<input class="field_input" type="hidden" name="pay_typeid" value="{{session('user')->id}}">
			<input class="field_input" type="hidden" name="tid" value="{{$list->id}}">
			<input class="field_input" id="pay_total_id" type="hidden" name="pay_total" value="">
			<input class="field_input" id="pay_num_id" type="hidden" name="pay_num" value="">
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
<div class="insurance panel mt20" id="insurance_box">
    <h2>
        <span class="icon security_icon mr10 vm"></span><span class="vm">保险方案</span>
        <span class="sub_title" style="display: none;">购买保险可以为您的旅途提供意外风险保障，建议您至少购买一项旅游保险</span>
    </h2>
    <div class="panel_body">
        <ul class="list">
        <li class="list_header">
            <span class="col2" style="padding-left:25px;width:15%;">险种</span>
            <span class="col1" style="width:50%;">名称</span>
            <span class="col4" style="width:10%;">单价</span>
            <span class="col5" style="width:10%;">选择</span>
        </li>
            <li class="list_row ">
                <span class="col2" style="padding-left:25px;width:15%;">意外险</span>
                <span class="col1" style="width:50%;"><label class="text" title="平安出游至尊型(全程)" id="baoxian1">平安出游至尊型(全程)</label><label class="tn_fontface"></label></span>
                <span class="col4" style="width:10%;">￥100/人</span><span id="baoxian_id1" style="display:none;">100</span>
                <span class="col5" style="width:10%;"><label class="input_checkbox enabled"><span id="panduan_id1" class="tn_fontface"></span></label></span>
            </li> 
			<li class="list_detail hide" id="baoxian_detail" style="display: none;">
                <span class="icon arrow_up_icon" style="left:260px;"></span>
                <p class="mt20"></p>
                <dl class="mt10">
                    <dt>保险类型</dt>
                    <dd class="mt10">意外险</dd>
                </dl>
                <dl class="mt10">
                    <dt>保险描述</dt>
                    <dd class="mt10">
						1、意外伤害（意外身故、烧伤及残疾保障）:2.00万元
						2、突发急性病身故:1.00万元
						3、医疗保障（意外医疗、急性病医疗共用保额）:3.00万元
						4、医疗垫付:3.00万元
						5、紧急医疗运送和送返:4.00万元
						6、身故遗体送返（其中丧葬保险金限额15000元）:20.00万元
						7、亲属慰问探访费用补偿:8000.00元
						8、未成年人送返费用补偿（一张经济舱机票）:0.00null
						9、行李延误（1000元/每8小时）:1000.00元
						10、航班延误（300元/每5小时，600元/10小时）:600.00元
						11、飞机意外:80.00万元
						12、火车意外:20.00万元
						13、轮船意外:20.00万元
						14、汽车意外（含旅游大巴）:20.00万元
						15、紧急电话翻译/护照遗失援助/行李延误、遗失援助:110
						16、24小时电话医疗咨询:120
					</dd>
                </dl>
                <dl class="mt10">
                    <dt>投保须知</dt>
                    <dd class="mt10">
						<div>
							<div>特别说明：</div>

							<div>保险责任：1、意外伤害保险承担烧烫伤责任2、意外身故、残疾、意外伤害医疗承保跳伞、潜水、滑雪、攀岩、探险等非职业高风险运动3、医疗保险金承担意外医疗责任、急性病医疗责任,共用保额10万元，无免赔，100%赔付4、被保险人每次因遭受意外事故或突发急性病(自急性病发作之日起必须在3日内在医院进行治疗），本公司就意外事故发生或罹患突发急性病之日起90日内发生的、符合当地社会基本医疗保险规定的合理医疗费用给付医疗保险金；5、对于父母为其未成年子女投保的人身保险，在被保险人成年之前，各保险合同约定的被保险人死亡给付的保险金额总和、被保险人死亡时各保险公司实际给付的保险金总和按以下限额执行：（一）对于被保险人不满10周岁的，不得超过人民币20万元；（二）对于被保险人已满10周岁但未满18周岁的，不得超过人民币50万元。；（航空意外险不受此限）；6、75至80周岁的被保险人，其“意外身故、烧伤及残疾保障”和“公共交通工具飞机/火车/轮船/汽车意外伤害”的保险金额为保单所载金额的一半，81至90周岁的被保险人，其“意外身故、烧伤及残疾保障”和“公共交通工具飞机/火车/轮船/汽车意外伤害”的保险金额为保单所载金额的四分之一。</div>

							<div>服务内容：1、单次飞机航班延误（不包含航班取消）每5小时，并乘坐原航班或航空公司安排的替代航班者，补偿RMB 300元，封顶600；2、行李延误：旅行期间，因其随行托运行李在其抵达所乘航班班机的预定目的地(不包含原出发地或常居住地)8小时后仍未送抵，一次性补偿RMB1000元； 3、慰问探访费用：负担一名家属前往处理事故的交通费和5天内的住宿费，标准为经济舱往返机票、火车硬卧车票及最高1,500元/天的住宿费，且上述费用累计不超出8,000元；4、安排未成年子女返回常居住地：提供1张往返经济舱机票5、紧急电话翻译服务/介绍当地翻译服务和其他援助服务均为协助性服务。</div>

							<div>以上保险责任适用《平安旅行意外伤害保险条款》（平保养发〔2013〕204号，2013年11月呈报中国保监会备案）和《平安交通意外伤害保险条款（2013版）（A款）》（平保养发〔2013〕204号，2013年11月呈报中国保监会备案）。以上条款仅承担保单约定保险责任，不承担条款中所列其他保险责任。</div>

							<div>&nbsp;</div>

							<div>以上紧急救援和医疗服务，被保险人须在事故发生后24小时内拨打紧急救援热线：010-59104999进行报案并获取相关帮助服务。</div>	
						</div>
					</dd>
                </dl>
                
                <dl class="mt10 mt10-float">
                    <dt>详细信息请阅读</dt>
                    <dd><a href="#" target="_blank">保险条款</a></dd>
                </dl>
                
            </li>
        
        </ul>
        <a class="show_more J_more_btn" href="javascript:;">更多保险</a>
    </div>
</div>
<div class="contact panel mt25" id="contact_box">
    <h2><span class="icon notice_icon mr10 vm"></span><span class="vm">*预订须知</span></h2>
    <div class="panel_body">
	<div class="field email_tips ">       
         <p>{!!$data->detail_xuzhi!!}</p>       
    </div>       
    </div>   
</div>
<div class="contact panel mt100" id="insurance_box">
	<div class="panel_body">
		<div style="width:180px;height:30px;margin:20px 50px;float:left;">
		<a style="font-size:22px;line-height:-10px;">总价：<span id="total_price">0</span>元</a>
		</div>
		<div style="border:1px solid white;width:290px;height:30px;margin:20px 50px;float:right;background-color:yellow;">
		<button onclick="dosubmit();"><a style="font-size:22px;line-height:-10px;" >我已阅读预订须知，提交订单</a></button>
		</div>
	</div>
</div>

<script type="text/javascript"  src="{{asset('./public_js/jquery-1.8.3.min.js')}}"></script>
<script type="text/javascript">
//判断点击人数减号时价格的控制
$("#button_num_id1").click(function(){
	$("#panduan_id1").html("");
	var num=$("#num_id").html();
	num--;
	if(num<1){
		$("#num_id").html(0);
		$("#pay_num_id").val(0);
		$("#total_price").html(0);
	}else{
		$("#num_id").html(num);
		$("#pay_num_id").val(num);
		var price = $("#one_price").html();
		$("#total_price").html(price * num);
		$("#pay_total_id").val(price * num);		
	}
	
});
//判断点击人数加号时价格的控制
$("#button_num_id2").click(function(){
	$("#panduan_id1").html("");
	var num=$("#num_id").html();
	num++;
	$("#num_id").html(num);
	$("#pay_num_id").val(num);
	var price = $("#one_price").html();
	$("#total_price").html(price * num);
	$("#pay_total_id").val(price * num);
});
//判断点击保险时价格的控制
$("#panduan_id1").click(function(){
	
	//alert($(this).html());
	if($(this).html()==""){
		$(this).html("√");
		var aa_id=$("#total_price").html();
		var bb_id=$("#baoxian_id1").html();
		var num=$("#num_id").html();
		//alert(bb_id);
		$("#total_price").html(Number(aa_id)+Number(num*bb_id));		
		$("#pay_total_id").val(Number(aa_id)+Number(num*bb_id));		
	}else{
		$(this).html("");
		var aa_id=$("#total_price").html();
		var bb_id=$("#baoxian_id1").html();
		var num=$("#num_id").html();
		//alert(bb_id);
		$("#total_price").html(Number(aa_id)-Number(num*bb_id));
		$("#pay_total_id").val(Number(aa_id)+Number(num*bb_id));		
	}
});
$("#baoxian1").click(function(){
	//alert("aa");
	$("#baoxian_detail").toggle();
});	
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