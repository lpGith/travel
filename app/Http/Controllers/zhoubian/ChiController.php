<?php

namespace App\Http\Controllers\zhoubian;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

class ChiController extends Controller
{
    
    //浏览列表信息
    public function chilist(Request $request)
    {
        $db = \DB::table("chi");
        //判断并封装搜索条件
        $where = [];
        if($request->has("zhu_name")){
            $name = $request->input("zhu_name");
            $db->where("zhu_name","like","%{$name}%");
            $where['zhu_name'] = $name;
        }  
        $list = $db->paginate(5);
        $aaa = \DB::table("zhoubian_lb")->get();
        return view("zhoubian.chilist")->with(["lunbo"=>$aaa])->with(["list"=>$list,"where"=>$where]);
        
    }
    //浏览列表信息
    public function chilistd(Request $request)
    {
        $db = \DB::table("chi")
             ->orderBy('chi_dianji', 'desc');;
        //判断并封装搜索条件
        $where = [];
        if($request->has("zhu_name")){
            $name = $request->input("zhu_name");
            $db->where("zhu_name","like","%{$name}%");
            $where['zhu_name'] = $name;
        }  
        $list = $db->paginate(5);
        $aaa = \DB::table("zhoubian_lb")->get();
        return view("zhoubian.chilist")->with(["lunbo"=>$aaa])->with(["list"=>$list,"where"=>$where]);
        
    }
    //浏览列表信息
    public function chilists(Request $request)
    {
        $db = \DB::table("chi")
             ->orderBy('chi_addtime', 'desc');;
        //判断并封装搜索条件
        $where = [];
        if($request->has("zhu_name")){
            $name = $request->input("zhu_name");
            $db->where("zhu_name","like","%{$name}%");
            $where['zhu_name'] = $name;
        }  
        $list = $db->paginate(5);
        $aaa = \DB::table("zhoubian_lb")->get();
        return view("zhoubian.chilist")->with(["lunbo"=>$aaa])->with(["list"=>$list,"where"=>$where]);
        
    }
    //浏览信息详情
    public function chixiangqing($id,Request $request)
    {
        $db = \DB::table("chi")
                   ->leftjoin('zb_pinglun', 'chi.id', '=', 'zb_pinglun.typeid')
                   ->select('chi.*','zb_pinglun.*')
                   ->where('chi.id',"{$id}")
                   ->get();
        $num = $db[0]->chi_dianji;
        $num++;
        \DB::table("chi")->where('id',"{$id}")->update(['chi_dianji' => "{$num}"]);
        //dd($db);
        return view("zhoubian.chixiangqing",["list"=>$db]);
    }
    
    
}
