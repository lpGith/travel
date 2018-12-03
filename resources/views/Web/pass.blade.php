<!DOCTYPE html>
<head>
	<title>Contact - Black White HTML5 Template</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="{{asset('1_files/site_nav.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('1_files/mail.css')}}">
	<link href="{{asset('vita_public/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('vita_public/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('vita_public/css/templatemo_style.css')}}" rel="stylesheet" type="text/css">	
</head>
<body>
	<div class="templatemo-logo visible-xs-block">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 black-bg logo-left-container">
			<h1 class="logo-left">Black</h1>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 white-bg logo-right-container">
			<h1 class="logo-right">White</h1>
		</div>			
	</div>
	<div class="templatemo-container">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 black-bg left-container">
			<h1 class="logo-left hidden-xs margin-bottom-60">导航</h1>	
			<div class="tm-left-inner-container">
				<ul class="nav nav-stacked templatemo-nav">
				  <li><a href="/vita"><i class="fa fa-home fa-medium"></i>首页</a></li>
				  <li><a href="/aa/{{session('user')->id}}/edit"><i class="fa fa-shopping-cart fa-medium"></i>我的信息</a></li>
				  <li><a href="/password"><i class="fa fa-send-o fa-medium"></i>密码修改</a></li>
				  <li><a href="/vita_post"><i class="fa fa-comments-o fa-medium"></i>我的帖子</a></li>
				  <li><a href="/centerorder"><i class="fa fa-gears fa-medium"></i>我的订单</a></li>
				
                  <li><a href="/blog"><i class="fa fa-envelope-o fa-medium"></i>返回论坛</a></li>
                  <li><a href="/"><i class="fa fa-envelope-o fa-medium"></i>返回旅游</a></li>
				</ul>
			</div>
		</div> <!-- left section -->
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 white-bg right-container">
			<h1 class="logo-right hidden-xs margin-bottom-60">密码</h1>
			<div class="tm-right-inner-container">
				<h1 class="templatemo-header">修改密码</h1>
				<div class="row">
                    <div class="col-sm-12 col-md-12">

                <form name="add_place_form" method="post" action="/pass/{{$vo->id}}" id="user_info_edit_form" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="common-w1 user_message">
                    <table class="form-table3 table" cellspacing="0" cellpadding="0" border="0">
                        <tbody><tr class="danger">
                            <td colspan="2" class="tit">修改密码</td>
                        </tr>
                        <tr class="success">
                            <td width="72">
                                <label>
                                    <span class="red">*</span>
                                    原密码：
                                </label>
                            </td>
                            <td width="500">
                            <input type="password" name="password" info="原密码" placeholder="请输入原密码" />
                            </td>
                        </tr>
                        <tr class="success">
                            <td>
                                <label>
                                    <span class="red">*</span>
                                    新密码：
                                </label>
                            </td>
                            <td>
                                <input type="password" info="新密码" name="password1"  placeholder="请输入要修改的密码"/>
                            </td>
                        </tr>
                        <tr class="success">
                            <td>
                                <label>确认密码：</label>
                            </td>
                            <td>
                                <input type="password" info="再输入一次" name="password2" placeholder="请在输入一次密码" />
                            </td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td height="36">
                                <input id="editBtn" class="yellow_btn" value="保 存" type="submit">
                            </td>
                        </tr>
                    </tbody></table>
                </div>
         </form>
                </div>
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                    @endif
    <script src="{{asset('admins/plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
        <script type="text/javascript">
            $("input[info]").focus(function(){
                //获取输入框后删除所有的span节点
            $(this).next("span").remove();
                ob=$(this);
                $("<span>请输入"+ob.attr("info")+"</span>").insertAfter(ob).css("color","green");
            }).blur(function(){
                //失去输入框后删除所有的span节点
                ob.next("span").remove();
                //判断是否执行非空判断
                if(ob.hasClass("kong")){
                    if(ob.val().lenght<1){
                        $("<span>"+ob.attr("info")+"不能为空</span>").insertAfter(ob).css("color","red");
                        return false;
                    }
                }
                //判断密码
                if(ob.hasClass("password")){
                    $.ajax({
                        type:"post",
                        url:"passajax",
                        data:{password:ob.val()},
                        dataType:"text",
                        async:true,
                        success:function(data){
                            if(data==0){
                                $("<span> 密码正确！</span>").insertAfter("input[name='password']").css("color","blue");
                            }else if(data==1){
                                $("<span> 密码不正确！</span>").insertAfter("input[name='password']").css("color","red");
                                return false;
                            }
                        },
                        error:function(){
                            alert("加载失败!");
                        }
                    });
                }
            //判断二次输入密码是否一致
            if(ob.hasClass("password1")){
                if(ob.val()!=$("input[name='password']").val()){
                    $("<span>两次密码输出不一致！</span>").insertAfter(ob).css("color","red");
                    return false;
                }else{
                    $("<span>"+ob.attr("info")+"正确！</span>").insertAfter(ob).css("color","green");
                    
                }
            }
            });

        </script>
                    <div class="clearfix"></div>
                </div>
			</div>	
		</div> <!-- right section -->
	</div>
</body>
</html>