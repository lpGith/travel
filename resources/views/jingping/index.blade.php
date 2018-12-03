<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>JavaScript实例</title>
    </head>
    <body>
	@foreach($list as $aa)
		<div style="border:1px solid black;width:1200px;height:auto;"><div style="font-size:18px;font-weight:bold;float:left;border:2px solid black;height:auto;">{{(empty(session('user')))?'系统':session('user')->name}} : {{$aa->jingping_content}}     ---{{date("Y-m-d H:i:s",$aa->jingping_time)}}</div><br><br></div>
	@endforeach
	</body>
</html>