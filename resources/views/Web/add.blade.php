<!DOCTYPE html>
<html>
<head>
<title>用户注册</title>
<link rel="stylesheet" type="text/css" href="{{asset('webs/css/style.css')}}" />
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<script src="{{asset('webs/js/jquery-1.8.3.min.js')}}"></script>
<meta name="keywords" content="HTML,CSS,XML,JavaScript">
<meta charset="utf-8" />
<script type="text/javascript">
    function checkna(){
        na=form1.username.value;
        if( na.length <1 || na.length >12)  
        {  	
            divname.innerHTML='<font class="tips_false">长度是1~12个字符</font>';
             
        }else{  
            divname.innerHTML='<font class="tips_true">输入正确</font>';
           
        }  
    
  }
  //验证密码 
    function checkpsd1(){    
        psd1=form1.password.value;  
        var flagZM=false ;
        var flagSZ=false ; 
        var flagQT=false ;
        if(psd1.length<6 || psd1.length>12){   
            divpassword1.innerHTML='<font class="tips_false">长度错误</font>';
        }else
            {   
              for(i=0;i < psd1.length;i++)   
                {    
                    if((psd1.charAt(i) >= 'A' && psd1.charAt(i)<='Z') || (psd1.charAt(i)>='a' && psd1.charAt(i)<='z')) 
                    {   
                        flagZM=true;
                    }
                    else if(psd1.charAt(i)>='0' && psd1.charAt(i)<='9')    
                    { 
                        flagSZ=true;
                    }else    
                    { 
                        flagQT=true;
                    }   
                }   
                if(!flagZM||!flagSZ||flagQT){
                divpassword1.innerHTML='<font class="tips_false">密码必须是字母数字的组合</font>'; 
                 
                }else{
                    
                divpassword1.innerHTML='<font class="tips_true">输入正确</font>';
                 
                }  
             
            }	
    }
    //验证确认密码 
    function checkpsd2(){ 
            if(form1.password.value!=form1.yourpass2.value) { 
                 divpassword2.innerHTML='<font class="tips_false">您两次输入的密码不一样</font>';
            } else { 
                 divpassword2.innerHTML='<font class="tips_true">输入正确</font>';
            }
    }
    //验证邮箱
    function checkmail() {
        apos = form1.email.value.indexOf("@");
        dotpos = form1.email.value.lastIndexOf(".");
        if (apos < 1 || dotpos - apos < 2) {
            divmail.innerHTML = '<font class="tips_false">输入错误</font>';
        }
        else {
            divmail.innerHTML = '<font class="tips_true">输入正确</font>';
        }
    }
        //验证姓名是否输入
        function checknames() {
            names = form1.name.value;
            if (names.length==0) {
                myname.innerHTML = '<font class="tips_false">请输入你的昵称</font>';
            } else if(names.length<2 || names.length>8) {
                myname.innerHTML = '<font class="tips_false">长度为2-8位</font>';
            }else{
                myname.innerHTML = '<font class="tips_true">输入正确</font>';
            }
        }

</script>
</head>
<body class="keBody">
<h1 class="keTitle">用户注册</h1>
<div class="kePublic">
<!--效果html开始-->
<div class="contact" >
<form name="form1" method="post" action="{{URL('/aa')}}">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <ul>
    <li>
      <label>账号:</label>
      <input type="text" name="username" placeholder="请输入用户名"  onblur="checkna()" required/>
      <span class="tips" id="divname">长度1~12个字符</span> 
    </li>
    <li>
      <label>密码：</label>
      <input type="password" name="password" placeholder="请输入你的密码" onblur="checkpsd1()" required/>
      <span class="tips" id="divpassword1">密码必须由字母和数字组成</span> 
    </li>
    <li>
      <label>确认密码：</label>
      <input type="password" name="yourpass2" placeholder="请再次输入你的密码" onblur="checkpsd2()" required/>
      <span class="tips" id="divpassword2">两次密码需要相同</span> 
    </li>
    <li>
      <label>电子邮箱：</label>
      <input type="text" name="email" placeholder="请输入你的邮箱" onblur="checkmail()" required/>
      <span class="tips" id="divmail">请输入你的邮箱</span> 
    </li>
    <li>
      <label>昵称:</label>
      <input type="text" name="name" placeholder="请输入你的昵称" onblur="checknames()" required/>
      <span class="tips" id="myname">请输入你的昵称</span>
    </li>
  </ul>
  <b class="btn">
    <input style="width: 50px;height:30px;background: grey;color: white;margin-right: 10px;cursor: pointer" type="submit" value="提交"/>
    <input  style="width: 50px;height:30px;background: grey;color: white;cursor: pointer" type="reset" value="取消"/>
  </b>
</form>
</div>
<!--效果html结束-->
<div class="clear"></div>
</div>
</body>
</html>
