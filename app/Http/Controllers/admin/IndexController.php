<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class IndexController extends CommonController
{
    //后台主页
    public function index()
    {
        return view("admin.index.index");
    }
    //旅游列表页
    public function index1(Request $request)
    {
    	$db=DB::table("xinwen");
    	$list=$db->paginate(5);
    	return view("web.xinwen",["list"=>$list]);
    }
    //旅游详情页
    public function index2(Request $request)
    {
    	$id = $request->get('id');
    	$list = DB::table("xinwen")->where("id",$id)->first();//获取和id相等的信息
    	$num = $list->xinwen_clicknum;
    	$num++;
    	DB::update('update xinwen set xinwen_clicknum='.$num.' where id='.$id);

    	return view("web.xinwen1",["list"=>$list]);
    }
    //景区列表页
    public function index3(Request $request)
    {
    	$db=DB::table("jingqu");
    	$list=$db->paginate(5);
    	return view("web.jingqu",["list"=>$list]);
    }
    //景区详情页
    public function index4(Request $request)
    {
    	$id = $request->get('id');
    	$list = DB::table("jingqu")->where("id",$id)->first();//获取和id相等的信息
    	$num = $list->xinwen_clicknum;
    	$num++;
    	DB::update('update jingqu set xinwen_clicknum='.$num.' where id='.$id);

    	return view("web.jingqu1",["list"=>$list]);
    }
    //本地新闻列表页
    public function index5(Request $request)
    {
    	$db=DB::table("bendi");
    	$list=$db->paginate(5);
    	return view("web.bendi",["list"=>$list]);
    }
    //本地新闻详情页
    public function index6(Request $request)
    {
    	$id = $request->get('id');
    	$list = DB::table("bendi")->where("id",$id)->first();//获取和id相等的信息
    	//点击量
        $num = $list->xinwen_clicknum;
    	$num++;
    	DB::update('update bendi set xinwen_clicknum='.$num.' where id='.$id);

    	return view("web.bendi1",["list"=>$list]);
    }
}