<!DOCTYPE html>
<html>
<head>
	<meat charset="utf-8"/>
	<title>修改密码</title>
</head>
<body>
	<h1>修改密码</h1>
	<form action="/pass/{{$user['id']}}" method="post">
	<input type="hidden" name="id" value="{{$user['id']}}">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
		设置新密码:<input type="password" info="" name="password"/>
		<button type="submit">确认修改</button>
	</form>
</body>
</html>