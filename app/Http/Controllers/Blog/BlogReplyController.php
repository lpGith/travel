<?php

namespace App\Http\Controllers\blog;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BlogReplyController extends Controller
{
	public function index(Request $request)
	{
		return "404页面不见！";
	}
    public function store(Request $request)
	{
		if(empty($request)){
			die();
		}
		$replay_content = $request->input('replay_content');
		$replay_pid = $request->input('replay_pid');
		$replay_uid = (session("user")->id);
		$replay_time = date("Y-m-d h:i:s");
		$data = ["replay_time"=>"{$replay_time}","replay_content"=>"{$replay_content}","replay_uid"=>"{$replay_uid}","replay_pid"=>"{$replay_pid}"];
		$id = \DB::table("replay")->insertGetId($data);
	}
}

