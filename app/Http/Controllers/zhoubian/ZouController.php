<?php

namespace App\Http\Controllers\zhoubian;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

class ZouController extends Controller
{
    
    //浏览列表信息
    public function zoulist(Request $request)
    {
        $db = \DB::table("zou");
        //判断并封装搜索条件
        $where = [];
        if($request->has("zou_name")){
            $name = $request->input("zou_name");
            $db->where("zou_name","like","%{$name}%");
            $where['zou_name'] = $name;
        }  
        $list = $db->paginate(5);
        $aaa = \DB::table("zhoubian_lb")->get();
        return view("zhoubian.zoulist")->with(["lunbo"=>$aaa])->with(["list"=>$list,"where"=>$where]);
    }
     //浏览列表信息
    public function zoulistd(Request $request)
    {
        $db = \DB::table("zou")
            ->orderBy('zou_dianji', 'desc');;
        //判断并封装搜索条件
        $where = [];
        if($request->has("zou_name")){
            $name = $request->input("zou_name");
            $db->where("zou_name","like","%{$name}%");
            $where['zou_name'] = $name;
        }  
        $list = $db->paginate(5);
        $aaa = \DB::table("zhoubian_lb")->get();
        return view("zhoubian.zoulist")->with(["lunbo"=>$aaa])->with(["list"=>$list,"where"=>$where]);
    }
    
    //浏览信息详情
    public function zouxiangqing($id,Request $request)
    {
        $db = \DB::table("zou")
                   ->leftjoin('zb_pinglun', 'zou.id', '=', 'zb_pinglun.typeid')
                   ->select('zou.*','zb_pinglun.*')
                   ->where('zou.id',"{$id}")
                   ->get();
        $num = $db[0]->zou_dianji;
        $num++;
        \DB::table("zou")->where('id',"{$id}")->update(['zou_dianji' => "{$num}"]);
        //dd($db);
        return view("zhoubian.zouxiangqing",["list"=>$db]);
    }
}
