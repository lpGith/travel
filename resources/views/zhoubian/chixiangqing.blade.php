<!DOCTYPE html>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>餐饮详情页</title>
    <link href="{{asset('jQuery%20Pin_files/css.css')}}" rel="stylesheet">
    <link href="{{asset('jQuery%20Pin_files/css_002.css')}}" rel="stylesheet">
    <link href="{{asset('jQuery%20Pin_files/css_004.css')}}" rel="stylesheet">
    <link href="{{asset('jQuery%20Pin_files/css_003.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('jQuery%20Pin_files/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('jQuery%20Pin_files/style.css')}}" rel="stylesheet">
    <style>
    
    body
    {
      font-family: 'Microsoft yahei', 'Neuton', serif;
    }
    p{font:15px/1.5 微软雅黑;style:#ddd}
    </style>
    
    <!-- This is an example of jQuery.pin in use. Check the very bottom for the javascript. -->

  </head>
  <body style="background:url('/images/123456789.jpg') no-repeat;background-color:#1d1d11">
    <form>
    <input id="userName" type="hidden" value="{{ isset(session('user')->username)?session('user')->username:'游客' }}" />
    <input id="userPicname" type="hidden" value="{{ isset(session('user')->picname)?session('user')->picname:'321=0.jpg' }}" />
    </form> 
    <div class="wrapper" style="background-color:#ddd; padding-left:8px;padding-right:8px">
      <p>当前位置:<a href="/zhoubian/zhulist/">&nbsp;餐饮美食</a>&nbsp;>&nbsp;{{ $list[0]->chi_name }} <span style="font-size:15px;display:bload;float:right;margin-top:8px">发布日期:{{ date("Y年m月d日",$list[0]->chi_addtime) }}</span></p>
      <hr>
      <h2 class="sub" style="display:blode;width:400px;height:60px;float:left">{{ $list[0]->chi_name }}</h2>
      <section class="container clearfix">
        <ul id="abc" style="list-style:none;width:500px;height:120px;float:right;background-color:rgba(200,200,200,0.5);filter;overflow:hidden;">
            @if(!empty($list[0]->typeid))
                @foreach ($list as $pinglun)
                    <li style="display:bload;width:500px;height:120px;line-height: 110px;">
                        <img src="/images/d_{{isset($pinglun->userpicname)?$pinglun->userpicname:'321=0.jpg'}}" style="width:70px;height:70px; border-radius:50%; overflow:hidden;margin:20px;float:left">
                        <span style="display:bload;width:300px;heighe:110px; font:20px;padding-top:20px 微软雅黑"> {{ isset($pinglun->user)?$pinglun->user:"游客" }} :{{ $pinglun->content }}</span>
                    </li>
                @endforeach
            @else
                <li style="display:bload;width:500px;height:120px;line-height: 110px;">
                    <img src="/images/d_321=0.jpg" style="width:70px;height:70px; border-radius:50%; overflow:hidden;margin:20px;float:left">
                    <span style="display:bload;width:300px;heighe:110px; font:20px;padding-top:20px 微软雅黑">暂无评论 </span>
                </li>
            @endif
        </ul> 
        <div class="row">
          <div class="left-col">
            <img class="he_border2_img" src="/admin_zhoubian/{{ $list[0]->chi_picname }}" alt="Image 01">
            <p style="text-indent:2em">{{ $list[0]->chi_describe }}</p>
          </div>
          <div class="right-col">
            <span style="font-size:15px">此餐厅{{$list[0]->chi_dianji}}次被旅客查询</span>
            <div style="height: 282px;" class="pin-wrapper"><div style="width: 290px; left: 882.5px; top: 0px; position: fixed;" class="pinned note-container">
              <div class="note">
                <p>{{ $list[0]->chi_name }}</p>
                <p>{{ $list[0]->chi_location }}</p>
                <h4>☏ {{ $list[0]->chi_phone }}(联系我们)</h4>
                <h4><span">营业时间:{{ $list[0]->chi_time }}</span><img src="{{asset('/images/pl.png')}}" id="liuyan" title="点击评论" style="float:right;width:70px;cursor:pointer;"></h4>
              </div>
              <p>&nbsp;</p>
                <div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more"></a><a title="分享到QQ空间" href="#" class="bds_qzone" data-cmd="qzone"></a><a title="分享到新浪微博" href="#" class="bds_tsina" data-cmd="tsina"></a><a title="分享到腾讯微博" href="#" class="bds_tqq" data-cmd="tqq"></a><a title="分享到人人网" href="#" class="bds_renren" data-cmd="renren"></a><a title="分享到微信" href="#" class="bds_weixin" data-cmd="weixin"></a></div>
<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdPic":"","bdStyle":"0","bdSize":"16"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
            </div></div>
          </div>
        </div>
      </section>
      <section class="gallery">
        <div class="container clearfix">
          <div class="row">
            <div class="left-col">
              <figure class="cat">
                    {!! $list[0]->chi_content !!}
                </div>
              </figure>              
            </div>
            <div class="right-col">
              <div style="height: 165px;" class="pin-wrapper"><div style="width: 261px;" class="pinned">
                <div class="panel">
                  <h4><img src="{{asset('/images/sx.png')}}" style="width:250px"></h4>
                  <p>详情请店内或电话咨询</p>
                </div>
              </div></div>
            </div>
          </div>
        </div>

      </section>
    </div>

    
    

    


    <!-- Include jQuery and jquery.pin -->
    <script src="{{asset('admins/plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
    <script src="{{asset('admins/layer-v2.3/layer/layer.js')}}"></script>
    <script src="{{asset('jQuery%20Pin_files/jquery_002.js')}}"></script>
    <script src="{{asset('jQuery%20Pin_files/jquery.js')}}"></script>
    <script src="{{asset('jQuery%20Pin_files/projects.js')}}"></script>
    <script src="{{asset('jQuery%20Pin_files/h.js')}}" type="text/javascript"></script>
    <script src="{{asset('jQuery%20Pin_files/h_002.js')}}" type="text/javascript"></script>

    <!-- PIN ALL THE THINGS! -->
    <script>
      $(".pinned").pin({containerSelector: ".container", minWidth: 940});
    </script>
    <!-- That's all - pretty easy, right? -->
    <script  type="text/javascript">
        $(function(){
            setInterval(function(){
                //上滚动
                $("#abc li:first").slideUp(1000,function(){
                    $(this).appendTo("#abc").show();
                });
            },3000);
        });
       
        $('#liuyan').on('click', function(){
            var aaa = {{ $list[0]->id }};     
            var name = $("#userName").val();
            var picname = $("#userPicname").val();
            layer.prompt({ formType: 2}, function(text){
                $ .ajax({
                    type:"get",
                    url:"/zhoubian/pinglun",
                    data:{content:text,typeid:aaa,user:name,userpicname:picname},
                    datatype:'json',
                    cache:true,   
                    success:function(data){
                        var comment = $('#abc');
                        comment.load('/zhoubian/chixiangqing/{{ $list[0]->id }} #abc');

                    }  
                })
                //document.write(aaa);
                layer.msg('评论成功!');
               
            });
        });
    </script>
  
</body></html>