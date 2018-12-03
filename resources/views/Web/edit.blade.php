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
			<h1 class="logo-right hidden-xs margin-bottom-60">信息</h1>
			<div class="tm-right-inner-container">
				<h1 class="templatemo-header">我的个人信息</h1>
				<div class="row">
                    <div class="col-sm-12 col-md-12">

                <form name="add_place_form" method="post" action="{{asset('aa')}}/{{ $vo->id }}" id="user_info_edit_form" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="common-w1 user_message">
                    <div class="user" id="avatar_area">
                        <div class="u-icon picture">
                            <div style="display: none;" class="hide" id="modifyheader">
                                <div class="upper fore" id="modUserImgbox"></div>
                            </div>
                            <img alt="用户头像" src="/users/s_{{ $vo->picname }}" id="userImg">
                        </div>
                        <input type="file" style="height:30px;width:90px;" name="picname" class="btn btn-primary btn-flat" id="inputPassword3" placeholder="图片">
                    </div>
                    <table class="form-table3 table" cellspacing="0" cellpadding="0" border="0">
                        <tbody><tr class="danger">
                            <td colspan="2" class="tit">联系方式</td>
                        </tr>
                        <tr class="success">
                            <td width="72">
                                <label>
                                    <span class="red">*</span>
                                    手机号：
                                </label>
                            </td>
                            <td width="500">
                            <input type="text" name="phone" value="{{ $vo->phone }}" placeholder="请输入你的手机号" />
                            </td>
                        </tr>
                        <tr class="success">
                            <td>
                                <label>
                                    <span class="red">*</span>
                                    邮箱：
                                </label>
                            </td>
                            <td>
                                <input type="text" name="email" value="{{ $vo->email }}" placeholder="请输入你的地址"/>
                            </td>
                        </tr>
                        <tr class="danger">
                            <td colspan="2" class="tit pt10">个人信息</td>
                        </tr>
                        <tr class="warning">
                            <td>
                                <label>会员号：</label>
                            </td>
                            <td>
                                <input type="text" name="username" value="{{ $vo->username }}" placeholder="请输入你的账号" />
                            </td>
                        </tr>
                        <tr class="warning">
                            <td>
                                <label>地址：</label>
                            </td>
                            <td>
                                <input type="text" name="address" value="{{ $vo->address }}" placeholder="请输入你的地址" />
                            </td>
                        </tr>
                        <tr class="warning">
                            <td>
                                <label>
                                    <span class="red">*</span>
                                    昵称：
                                </label>
                            </td>
                            <td>
                               <input type="text" name="name" value="{{ $vo->name }}" placeholder="请输入你的地址"/>                              
                            </td>
                        </tr>
                        <tr class="warning">
                            <td>
                                <label>
                                    <span class="red">*</span>性别：
                                </label>
                            </td>
                            <td>
                             <input type="radio" name="sex" {{ ($vo->sex=='1')?"checked":"" }} value="1" />男&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="radio" name="sex" {{ ($vo->sex=='2')?"checked":"" }} value="2" />女
                            </td>
                        </tr>
                                  
                        <tr class="warning">
                            <td>
                                <label>邮编：</label>
                            </td>
                            <td>
                             <input type="text" name="code" value="{{ $vo->code }}" placeholder="请输入你的邮编" onblur="checkcode()" required/>
                            </td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td height="36">
                                <input id="editBtn" class="yellow_btn" value="保 存" type="submit">
                                <a href="/Web" id="editBtn" class="yellow_btn" style="text-decoration: none">返回</a>
                            </td>
                        </tr>
                    </tbody></table>
                </div>
         </form>
                    </div>
                    <div class="clearfix"></div>
                </div>
			</div>	
		</div> <!-- right section -->
	</div>

</body>
</html>