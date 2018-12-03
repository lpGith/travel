<?php

namespace App\Http\Controllers\jingdianpinglun;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;


class JingpingController extends Controller
{ 
	//添加评论
	public function pinglun(request $request)
	{	
		date_default_timezone_set("PRC");
		$data['jingping_content']=$request->get("content");
		//echo $data['jingping_content'];
		$data['user_typeid']=session("user")->id;
		$data['jingdian_typeid']=$request->get("uid");
		$data['jingping_time']=time();
		
		$id=\DB::table("jingping")->insertGetId($data);
	
		
	}
	public function pinglun1(request $request)
	{	
		$id=$request->get("id");
		$uid=$request->get("uid");
		$list=\DB::select("select * from jingping where user_typeid={$id} and jingdian_typeid={$uid}");
		return view("jingping.index",["list"=>$list]);
	}
	
	
	//添加点赞
	public function jingdiannum($id,request $request)
	{	
		
		$num=$request->get("jingdian_num");
		
		
		\DB::update("update jingdiandetail set jingdian_num={$num} where id={$id}");
	
		echo "点赞成功！";
	}
}


