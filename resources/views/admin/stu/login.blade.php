<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>登陆</title>		
		<style type="text/css">	
		#uid{display:none;}
		</style>		
	</head>
	<body>
		
		<center>
		<h1>会员登陆</h1>		
			<form action="#" method="post" >	
				<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
			账号：<input info="账号" class="kong username" 	type="text"  	name="username" aa="" ><br><br><br>																
			密码：<input info="密码" class="kong upass" 	type="password" name="upass" aa=""><br><br><br>	
			验证码：  <input info="验证码" type="text" class="kong captcha" name="captcha" size="6" aa="">
						<a onclick="javascript:re_captcha();" >
						<img src="{{ URL('code/1') }}"  alt="验证码" title="刷新图片" width="100" height="40" 
						id="c2c98f0de5a04167a9e427d883690ff6" border="0"></a><br><br>
				   <input   type="submit" value="登陆">	
			</form>
			<script type="text/javascript" src="/js/jquery-1.8.3.min.js"></script>
			<script type="text/javascript">
			function re_captcha() {
				$url = "{{ URL('/code') }}";
					$url = $url + "/" + Math.random();
					document.getElementById('c2c98f0de5a04167a9e427d883690ff6').src=$url;
					}
	//------------------------------------------------------------------------------------------------------
			$("input[aa]").focus(function(){
			//聚焦输入框后删除所有的span节点
			$(this).next("span").remove();
			 ob=$(this);
			 
				$("<span>请输入"+ob.attr("info")+"</span>").insertAfter(ob).css("color","green");
			
			
		}).blur(function(){
		//失去输入框后删除所有的span节点
		ob.next("span").remove();
			//var ob=$(this);
			//判断是否执行非空判断
			if(ob.hasClass("kong")){
				if(ob.val().length<1){
					$("<span>"+ob.attr("info")+"不能为空</span>").insertAfter(ob).css("color","red");
					return false;
				}
				
			}
			//判断账号格式和账号是否重复
			if(ob.hasClass("username")){				
					$.ajax({
						type:"get",
						url:"/ajax1",
						data:{username:ob.val()},
						dataType:"text",
						async:true,
						success:function(data){
							//alert(data);
					
							if(data=='yes'){
								$("<span> 账号正确！</span>").insertAfter("input[name='username']").css("color","blue");							
							}else if(data=='no'){
								$("<span> 账号不正确！</span>").insertAfter("input[name='username']").css("color","red");
								return false;
							}
						},
						error:function(){
							alert("加载失败！");
						}
					});
					
				
			}
			//判断密码
			if(ob.hasClass("upass")){
				$.ajax({
						type:"get",
						url:"/ajax2",
						data:{upass:ob.val()},
						dataType:"text",
						async:true,
						success:function(data){
							//alert(data);
					
							if(data=='yes'){
								$("<span> 密码正确！</span>").insertAfter("input[name='upass']").css("color","blue");							
							}else if(data=='no'){
								$("<span> 密码不正确！</span>").insertAfter("input[name='upass']").css("color","red");
								return false;
							}
						},
						error:function(){
							alert("加载失败！");
						}
					});
			}				
			//判断验证码的是否正确
			if(ob.hasClass("captcha")){				
					$.ajax({
						type:"get",
						url:"/ajax3",
						data:{code:ob.val()},
						dataType:"text",
						async:false,
						success:function(data){
							//alert(data);
					
							
							
							if(data=='yes'){
								$("<span> 验证码正确！</span>").insertAfter(ob).css("color","blue");
								
							}else if(data=='no'){
								$("<span> 验证码不正确？？？！</span>").insertAfter(ob).css("color","red");
								return false;
							}
							
						},
						error:function(){
							alert("加载失败！");
						}
					});
				}
		});
		
		
	
		</script>		
		</center>
	</body>
</html>