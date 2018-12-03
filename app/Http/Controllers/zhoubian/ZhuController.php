<?php

namespace App\Http\Controllers\zhoubian;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

class ZhuController extends Controller
{
    
    //浏览列表信息
    public function zhulist(Request $request)
    {
        $db = \DB::table("zhu");
        //判断并封装搜索条件
        $where = [];
        if($request->has("zhu_name")){
            $name = $request->input("zhu_name");
            $db->where("zhu_name","like","%{$name}%");
            $where['zhu_name'] = $name;
        }  
        $list = $db->paginate(5);
        $aaa = \DB::table("zhoubian_lb")->get();
        return view("zhoubian.zhulist")->with(["lunbo"=>$aaa])->with(["list"=>$list,"where"=>$where]);
    }
    //浏览列表信息
    public function zhulists(Request $request)
    {
        $db = \DB::table("zhu")
              ->orderBy('zhu_addtime', 'desc');
        //判断并封装搜索条件
        $where = [];
        if($request->has("zhu_name")){
            $name = $request->input("zhu_name");
            $db->where("zhu_name","like","%{$name}%");
            $where['zhu_name'] = $name;
        }  
        $list = $db->paginate(5);
        $aaa = \DB::table("zhoubian_lb")->get();
        return view("zhoubian.zhulist")->with(["lunbo"=>$aaa])->with(["list"=>$list,"where"=>$where]);
    }
    //浏览列表信息
    public function zhulistd(Request $request)
    {
        $db = \DB::table("zhu")
              ->orderBy('zhu_dianji', 'desc');
        //判断并封装搜索条件
        $where = [];
        if($request->has("zhu_name")){
            $name = $request->input("zhu_name");
            $db->where("zhu_name","like","%{$name}%");
            $where['zhu_name'] = $name;
        }  
        $list = $db->paginate(5);
        $aaa = \DB::table("zhoubian_lb")->get();
        return view("zhoubian.zhulist")->with(["lunbo"=>$aaa])->with(["list"=>$list,"where"=>$where]);
    }
    //浏览信息详情
    public function zhuxiangqing($id,Request $request)
    {
        $db = \DB::table("zhu")
                   ->leftjoin('zb_pinglun', 'zhu.id', '=', 'zb_pinglun.typeid')
                   ->select('zhu.*','zb_pinglun.*')
                   ->where('zhu.id',"{$id}")
                   ->get();
        $num = $db[0]->zhu_dianji;
        $num++;
        \DB::table("zhu")->where('id',"{$id}")->update(['zhu_dianji' => "{$num}"]);
        //dd($db);
        return view("zhoubian.zhuxiangqing",["list"=>$db]);
    }
}
