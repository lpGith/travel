<?php
namespace App\Http\Controllers\Web;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class NewslistController extends Controller
{
	public function index()
	{

    	$list=DB::table('xinwen')->paginate(5);
    	$list1=DB::table("jingqu")->paginate(5);
    	$list2=DB::table("bendi")->paginate(5);
		return view('Web.xinwenliebiao',["list"=>$list],["list1"=>$list1])->with(["list2"=>$list2]);
	}
   
}
