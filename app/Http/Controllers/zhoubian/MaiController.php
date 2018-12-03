<?php

namespace App\Http\Controllers\zhoubian;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

class MaiController extends Controller
{
    
    //浏览列表信息
    public function mailist(Request $request)
    {
        $db = \DB::table("mai");
        //判断并封装搜索条件
        $where = [];
        if($request->has("mai_name")){
            $name = $request->input("mai_name");
            $db->where("mai_name","like","%{$name}%");
            $where['mai_name'] = $name;
        }  
        $list = $db->paginate(5);
        $aaa = \DB::table("zhoubian_lb")->get();
        return view("zhoubian.mailist")->with(["lunbo"=>$aaa])->with(["list"=>$list,"where"=>$where]);
    }
    //浏览列表信息
    public function mailistd(Request $request)
    {
        $db = \DB::table("mai")
            ->orderBy('mai_dianji', 'desc');;
        //判断并封装搜索条件
        $where = [];
        if($request->has("mai_name")){
            $name = $request->input("mai_name");
            $db->where("mai_name","like","%{$name}%");
            $where['mai_name'] = $name;
        }  
        $list = $db->paginate(5);
        $aaa = \DB::table("zhoubian_lb")->get();
        return view("zhoubian.mailist")->with(["lunbo"=>$aaa])->with(["list"=>$list,"where"=>$where]);
    }
    //浏览列表信息
    public function mailists(Request $request)
    {
        $db = \DB::table("mai")
            ->orderBy('mai_addtime', 'desc');;
        //判断并封装搜索条件
        $where = [];
        if($request->has("mai_name")){
            $name = $request->input("mai_name");
            $db->where("mai_name","like","%{$name}%");
            $where['mai_name'] = $name;
        }  
        $list = $db->paginate(5);
        $aaa = \DB::table("zhoubian_lb")->get();
        return view("zhoubian.mailist")->with(["lunbo"=>$aaa])->with(["list"=>$list,"where"=>$where]);
    }
    //浏览信息详情
    public function maixiangqing($id,Request $request)
    {
        $db = \DB::table("mai")
                   ->leftjoin('zb_pinglun', 'mai.id', '=', 'zb_pinglun.typeid')
                   ->select('mai.*','zb_pinglun.*')
                   ->where('mai.id',"{$id}")
                   ->get();
        $num = $db[0]->mai_dianji;
        $num++;
        \DB::table("mai")->where('id',"{$id}")->update(['mai_dianji' => "{$num}"]);
        //dd($db);
        return view("zhoubian.maixiangqing",["list"=>$db]);
    }
}
