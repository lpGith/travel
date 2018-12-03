<!DOCTYPE html>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>经典路线详情页</title>
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
    </form> 
    <div class="wrapper" style="background-color:#ddd; padding-left:8px;padding-right:8px">
      <p>当前位置:<a href="/zhoubian/youlist/">&nbsp;经典路线</a>&nbsp;>&nbsp;{{ $list[0]->you_typename }} <span style="font-size:15px;display:bload;float:right;margin-top:8px">发布日期:{{ date("Y年m月d日",$list[0]->you_addtime) }}</span></p>
      <hr>

      <h3 class="sub" style="display:blode;width:400px;height:60px;float:left">{{ $list[0]->you_typename }}</h3>
      <section class="container clearfix">   
        
        <div class="row">
          <div class="left-col">
            <img class="he_border2_img" src="/admin_zhoubian/{{ $list[0]->you_typepicname }}" alt="Image 01">
            <p style="text-indent:2em">{!! $list[0]->you_typedescribe !!}</p>
          </div>
           <div class="right-col">
          <p style="font-size:15px">点击次数{{ $list[0]->you_typedianji }}</p>
            <div class="pin-wrapper"><div style="width: 290px; left: 882.5px; top: 0px; position: fixed;" class="pinned note-container">
              <div class="note">
                <p style="text-align:center">沿途风景</p>
                @foreach($list as $you)
                <a href="/zhoubian/jingdian/{{ $you->id }}" ><p style="text-align:center">{{ $you->you_name }}</p></a>
                @endforeach
              </div>
            </div></div>
          </div>
        </div>
      </section>
      
      
    </div>
    <!-- Include jQuery and jquery.pin -->
    <script src="{{asset('jQuery%20Pin_files/jquery_002.js')}}"></script>
    <script src="{{asset('jQuery%20Pin_files/jquery.js')}}"></script>
    <script src="{{asset('jQuery%20Pin_files/projects.js')}}"></script>
    <script src="{{asset('jQuery%20Pin_files/h.js')}}" type="text/javascript"></script>
    <script src="{{asset('jQuery%20Pin_files/h_002.js')}}" type="text/javascript"></script>

    <!-- PIN ALL THE THINGS! -->
    <script>
      $(".pinned").pin({containerSelector: ".container", minWidth: 940});
    </script>

</body></html>