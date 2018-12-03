<?php
namespace App\Http\Controllers\Vita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class VitaController extends Controller
{
    public function index()
	{
		return view('privat.vitahome');
	}
	//我的帖子
	public function post(Request $request)
	{
		$post_user_id = (session("user")->id);
		$vita_list = DB::table("post")
		->where('post_user_id',"=",$post_user_id)
		->paginate(2);
		return view('privat.vitapost')->with(["vita_list"=>$vita_list]);
	}
}
