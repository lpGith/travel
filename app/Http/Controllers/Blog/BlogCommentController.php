<?php

namespace App\Http\Controllers\blog;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BlogCommentController extends Controller
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
		$comment_pid = $request->input('post_id');
		$comment_uid = $request->input('post_user_id');
		//$comment_cid = $request->session()->get('userid');
		$uid = (session("user")->id);
		$comment_cid = $uid;//(session("user")->id
		$comment_content = $request->input('comment_content');
		$comment_time = date("Y-m-d h:i:s");
		$data = ["comment_id"=>NULL,"comment_uid"=>"{$comment_uid}","comment_cid"=>"{$comment_cid}","comment_content"=>"{$comment_content}","comment_time"=>"{$comment_time}","comment_pid"=>"{$comment_pid}"];
		//var_dump($data);
		$id = \DB::table("comment")->insertGetId($data);
		//return redirect('/show_more'.$comment_pid);
	}
}
