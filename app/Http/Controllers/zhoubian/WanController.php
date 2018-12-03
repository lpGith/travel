<?php

namespace App\Http\Controllers\zhoubian;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

class WanController extends Controller
{
    
    //浏览列表信息
    public function wanlist(Request $request)
    {
        $db = \DB::table("wan");
        //判断并封装搜索条件
        $where = [];
        if($request->has("wan_name")){
            $name = $request->input("wan_name");
            $db->where("wan_name","like","%{$name}%");
            $where['wan_name'] = $name;
        }  
        $list = $db->paginate(5);
        $aaa = \DB::table("zhoubian_lb")->get();
        return view("zhoubian.wanlist")->with(["lunbo"=>$aaa])->with(["list"=>$list,"where"=>$where]);
    }
    //浏览列表信息
    public function wanlistd(Request $request)
    {
        $db = \DB::table("wan")
            ->orderBy('wan_dianji', 'desc');
        //判断并封装搜索条件
        $where = [];
        if($request->has("wan_name")){
            $name = $request->input("wan_name");
            $db->where("wan_name","like","%{$name}%");
            $where['wan_name'] = $name;
        }  
        $list = $db->paginate(5);
        $aaa = \DB::table("zhoubian_lb")->get();
        return view("zhoubian.wanlist")->with(["lunbo"=>$aaa])->with(["list"=>$list,"where"=>$where]);
    }
    //浏览列表信息
    public function wanlists(Request $request)
    {
        $db = \DB::table("wan")
            ->orderBy('wan_addtime', 'desc');;
        //判断并封装搜索条件
        $where = [];
        if($request->has("wan_name")){
            $name = $request->input("wan_name");
            $db->where("wan_name","like","%{$name}%");
            $where['wan_name'] = $name;
        }  
        $list = $db->paginate(5);
        $aaa = \DB::table("zhoubian_lb")->get();
        return view("zhoubian.wanlist")->with(["lunbo"=>$aaa])->with(["list"=>$list,"where"=>$where]);
    }
    //浏览信息详情
    public function wanxiangqing($id,Request $request)
    {
        $db = \DB::table("wan")
                   ->leftjoin('zb_pinglun', 'wan.id', '=', 'zb_pinglun.typeid')
                   ->select('wan.*','zb_pinglun.*')
                   ->where('wan.id',"{$id}")
                   ->get();
        $num = $db[0]->wan_dianji;
        $num++;
        \DB::table("wan")->where('id',"{$id}")->update(['wan_dianji' => "{$num}"]);
        //dd($db);
        return view("zhoubian.wanxiangqing",["list"=>$db]);
    }
}
