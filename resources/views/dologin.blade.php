
<!DOCTYPE html>
<html lang="en" class="no-js">
    <head>
        <meta charset="utf-8">
        <title>Fullscreen Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- CSS -->
        <link rel="stylesheet" href="{{asset('assets/css/11.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/reset.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/supersized.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <script type="text/javascript">
            //验证JS
            $(function(){
                //获取所有的input标签
                $("input").focus(function(){
                    $(this).next("span").remove();
                    layer.msg("请输入正确的"+$(this).attr('info')+'信息');
                    //$("<span> 请输入正确的"+$(this).attr('info')+"信息!</span>").insertAfter(this).css('color',"blue");
                }).blur(function(){
                    var ob = $(this);
                    ob.next("span").remove();
                    //判断是否执行非空判断
                    if(ob.hasClass("required")){
                        if(ob.val().length<1){
                           //$("<span> "+ob.attr('info')+"信息不可为空！</span>").insertAfter(ob).css('color',"red"); 
                            layer.msg(ob.attr('info')+'不能为空');
                            return false;
                        }
                    }
                });
            });
        </script>
    </head>
    <body>
        <div class="page-container">
            <h1>用户登录</h1>
            <form action="{{url('Web/dologin')}}" method="post">
                <input type="hidden" name="_token" value="<?php echo csrf_token();?>">
                @if(session("msg"))
                <p style="color:red;">{{session("msg")}}</p>
                @endif
                <input type="text" name="username" class="username" placeholder="请输入账号">
                <input type="password" name="password" class="password" placeholder="请输入密码">
                <input type="text" style="width:190px;" class="code" placeholder="请输入验证码" name="code"/>
                <img src="{{URL('admin/code/'.time())}}" height="40" style="position:relative;top:13px;"onclick="this.src='{{URL('admin/code')}}/'+Math.random()" />
                <button type="submit">登&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp陆</button>
                <a href="/Web/add"></a>
                <div class="error"><span>+</span></div>
            </form>
            <div class="connect">
                <p>Welcome to Zhangjiajie</p>
               
            </div>
        </div>
        <div align="center">
            <a href="http://zye.cc/" style="color:#FEF663" target="_blank" title="张家界">张家界</a>&nbsp&nbsp&nbsp&nbsp
            <a style="color:#FEF663" href="/Web/add">注册</a>&nbsp&nbsp&nbsp&nbsp
            <a href="{{url('/email')}}" style="color:red">密码找回</a>
        </div>
        <!-- Javascript -->
        <script src="{{asset('assets/js/jquery-1.8.2.min.js')}}"></script>
        <script src="{{asset('assets/js/supersized.3.2.7.min.js')}}"></script>
        <script src="{{asset('assets/js/supersized-init.js')}}"></script>
        <script src="{{asset('assets/js/scripts.js')}}"></script>

    </body>

</html>

