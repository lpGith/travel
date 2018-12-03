<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>注册</title>		
		<link type="text/css" rel="stylesheet" href="/css/bootstrap.min.css" />		
	</head>
	<body>
		
		<center>
		<h1>会员注册</h1>		
			<form action="/add" method="post"  onsubmit="return doCheck()" class="form-inline">
					<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
			账号：<input info="账号" class="kong username" 	type="text"  	name="username" class="form-control" ><br><br><br>										
			昵称：<input info="昵称" class="kong name" 		type="text" 	name="name"  class="form-control"><br><br><br>					
			密码：<input info="密码" class="kong upass" 	type="password" name="upass" class="form-control"><br><br><br>											
		重复密码：<input info="密码" class="kong upass1" 	type="password" name="upass1" class="form-control"><br><br><br>										
			电话：<input info="电话" class="kong phone" 	type="text" 	name="phone" class="form-control"><br><br><br>													
			邮箱：<input info="邮箱" class="kong email" 	type="text" 	name="email"class="form-control"><br><br><br>																			
						
				 						
				  <input   type="submit" value="注册" class="btn btn-primary">										
			</form>
		</center>	
		<script type="text/javascript" src="/js/jquery-1.8.3.min.js"></script>
		<script type="text/javascript">
		function doCheck(){
			
		}	
		$("input").focus(function(){
			//聚焦输入框后删除所有的span节点
			$(this).next("span").remove();
			 ob=$(this);
			 if(ob.attr("name")=='username'){ //判断name=uname时聚焦时输出的内容
				$("<span>请输入6~18位的"+ob.attr("info")+"</span>").insertAfter(ob).css("color","green");
			 }else if(ob.attr("name")=='upass'){//判断name=upass时聚焦时输出的内容
				$("<span>请输入6~18位的"+ob.attr("info")+"</span>").insertAfter(ob).css("color","green");
			 }else if(ob.attr("name")=='upass1'){//判断name=upass1时聚焦时输出的内容
				$("<span>请再次输入6~18位的密码"+ob.attr("info")+"</span>").insertAfter(ob).css("color","green");
			 }else if(ob.attr("name")=='phone'){//判断name=phone时聚焦时输出的内容
				$("<span>请输入正确格式的"+ob.attr("info")+"</span>").insertAfter(ob).css("color","green");
			 }else if(ob.attr("name")=='email'){//判断name=email时聚焦时输出的内容
				$("<span>请输入正确格式的"+ob.attr("info")+"</span>").insertAfter(ob).css("color","green");
			 
			 }else if(ob.attr("name")=='code'){//判断name=code时聚焦时输出的内容
				$("<span>请输入"+ob.attr("info")+"</span>").insertAfter(ob).css("color","green");
			 }
			
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
				if(ob.val().match(/^\w{6,18}$/)==null){
					$("<span>"+ob.attr("info")+"的格式不正确！</span>").insertAfter(ob).css("color","red");
					return false;
				}else{
					$.ajax({
						type:"get",
						url:"/ajax",
						data:{name:ob.val()},
						dataType:"text",
						async:true,					
						success:function(data){
							//alert(data);
					
							if(data=='yes'){
								$("<span> 账号已经存在！</span>").insertAfter("input[name='username']").css("color","red");
								return false;
							}else if(data=='no'){
								$("<span> 账号正确！</span>").insertAfter("input[name='username']").css("color","blue");
								
							}
							
						},
						error:function(){
							alert("加载失败！");
						}
					});
					//$("<span>"+ob.attr("info")+"正确！</span>").insertAfter(ob).css("color","green");
				}
			}
			//判断密码的格式
			if(ob.hasClass("upass")){
				if(ob.val().match(/^\w{6,18}$/)==null){
					$("<span>"+ob.attr("info")+"的格式不正确！</span>").insertAfter(ob).css("color","red");
					return false;
				}else{
					$("<span>"+ob.attr("info")+"正确！</span>").insertAfter(ob).css("color","green");
					
				}
			}
			//判断二次输入密码是否一致
			if(ob.hasClass("upass1")){
				if(ob.val()!=$("input[name='upass']").val()){
					$("<span>两次密码输出不一致！</span>").insertAfter(ob).css("color","red");
					return false;
				}else{
					$("<span>"+ob.attr("info")+"正确！</span>").insertAfter(ob).css("color","green");
					
				}
			}
			//判断手机的格式
			if(ob.hasClass("phone")){
				if(ob.val().match(/^[1][3-8][0-9]{9}$/)==null){
					$("<span>"+ob.attr("info")+"的格式不正确！</span>").insertAfter(ob).css("color","red");
					return false;
				}else{
					$("<span>"+ob.attr("info")+"正确！</span>").insertAfter(ob).css("color","green");
					
				}
			}
			//判断邮箱的格式
			if(ob.hasClass("email")){
				if(ob.val().match(/^\w+@\w+(\.\w+){1,2}$/)==null){
					$("<span>"+ob.attr("info")+"的格式不正确！</span>").insertAfter(ob).css("color","red");
					return false;
				}else{
					$("<span>"+ob.attr("info")+"正确！</span>").insertAfter(ob).css("color","green");
					
				}
			}
			
			//判断验证码的是否正确
			if(ob.hasClass("code")){				
					$.ajax({
						type:"post",
						url:"co.php",
						data:{code:ob.val()},
						dataType:"text",
						async:true,
						success:function(data){
							//alert(data);
					
							if(data=='yes'){
								$("<span> 验证码正确！</span>").insertAfter(ob).css("color","blue");								
							}else if(data=='no'){
								$("<span> 验证码不正确！</span>").insertAfter(ob).css("color","red");
								return false;
							}
							
						},
						error:function(){
							alert("加载失败！");
						}
					});
				}
		});
		
		
			function showImage(){ 
                var read = new FileReader();
                read.onload = function(e){
                    document.getElementById("a1").src = e.target.result;
                }
                if(document.getElementById("q1").files.length===0){
                    return;
                }
                var oFile = document.getElementById("q1").files[0];
                read.readAsDataURL(oFile);
             
            } 
	
		</script>		
	</body>
</html>