@extends('admin.base.base')

@section('content')
	
        <!--面包屑导航 开始-->
<div class="crumb_warp">
    <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
    <i class="fa fa-home"></i> <a href="{{url('admin/index')}}">首页</a> &raquo; 系统基本信息
</div>
<!--面包屑导航 结束-->

<!--结果集标题与导航组件 开始-->
<div class="result_wrap">
    <div class="result_title">
        <h3>快捷操作</h3>
    </div>
    <div class="result_content">
        <div class="short_wrap">
            <a href="#"><i class="fa fa-plus"></i>新增用户</a>
            <a href="#"><i class="fa fa-recycle"></i>删除用户</a>
        </div>
    </div>
</div>
<!--结果集标题与导航组件 结束-->


<div class="result_wrap">
    <div class="result_title">
        <h3>系统基本信息</h3>
    </div>
    <div class="result_content">
        <ul>
            <li>
                <label>操作系统</label><span>{{PHP_OS}}</span>
            </li>
            <li>
                <label>运行环境</label><span>{{$_SERVER['SERVER_SOFTWARE']}}</span>
            </li>
            <li>
                <label>版本</label><span>v-1.0</span>
            </li>
            <li>
                <label>上传附件限制</label><span><?php echo get_cfg_var ("upload_max_filesize")?get_cfg_var ("upload_max_filesize"):"不允许上传附件"; ?></span>
            </li>
            <li>
                <label>北京时间</label><span id="did"></span>
            </li>
            <li>
                <label>服务器域名/IP</label><span>{{$_SERVER['SERVER_NAME']}} [ {{$_SERVER['SERVER_ADDR']}} ]</span>
            </li>
            <li>
                <label>Host</label><span>{{$_SERVER['SERVER_ADDR']}}</span>
            </li>
        </ul>
    </div>
</div>


<div class="result_wrap">
    <div class="result_title">
        <h3>使用帮助</h3>
    </div>
    <div class="result_content">
        <ul>
            <li>
                <label>官方交流网站：</label><span><a href="http://yixiang.co">yixiang.co</a></span>
            </li>

        </ul>
    </div>
</div>
<script  type="text/javascript">
            setInterval(function(){
                 var date = new Date();
                 
                 //date.setTime();
                 var y = date.getFullYear();
                 var m = date.getMonth()+1; //获取月是0-11的值
                 var d = date.getDate(); //获取天数
                 
                 var h = date.getHours();
                 var i = date.getMinutes();
                 var s = date.getSeconds();
                 
                 var str = y+"-"+m+"-"+d+" "+h+":"+i+":"+(s<10?'0'+s:s);
                 
                 document.getElementById("did").innerHTML = str;
             },1000);
        </script>
<!--结果集列表组件 结束-->

@endsection