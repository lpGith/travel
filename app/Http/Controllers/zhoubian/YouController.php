<?php

namespace App\Http\Controllers\zhoubian;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

class YouController extends Controller
{
    
    //浏览列表信息
    public function youlist(Request $request)
    {
        $db = \DB::table("you_type");
        //判断并封装搜索条件
        $where = [];
        if($request->has("you_typename")){
            $name = $request->input("you_typename");
            $db->where("you_typename","like","%{$name}%");
            $where['you_typename'] = $name;
        }  
        $list = $db->paginate(5);
        $aaa = \DB::table("zhoubian_lb")->get();
        return view("zhoubian.youlist")->with(["lunbo"=>$aaa])->with(["list"=>$list,"where"=>$where]);
    }
    //浏览列表信息
    public function youlists(Request $request)
    {
        $db = \DB::table("you_type")
                ->orderBy('you_typeaddtime', 'desc');
        //判断并封装搜索条件
        $where = [];
        if($request->has("you_typename")){
            $name = $request->input("you_typename");
            $db->where("you_typename","like","%{$name}%");
            $where['you_typename'] = $name;
        }  
        $list = $db->paginate(5);
        $aaa = \DB::table("zhoubian_lb")->get();
        return view("zhoubian.youlist")->with(["lunbo"=>$aaa])->with(["list"=>$list,"where"=>$where]);
    }
    //浏览列表信息
    public function youlistd(Request $request)
    {
        $db = \DB::table("you_type")
            ->orderBy('you_typedianji', 'desc');;
        //判断并封装搜索条件
        $where = [];
        if($request->has("you_typename")){
            $name = $request->input("you_typename");
            $db->where("you_typename","like","%{$name}%");
            $where['you_typename'] = $name;
        }  
        $list = $db->paginate(5);
        $aaa = \DB::table("zhoubian_lb")->get();
        return view("zhoubian.youlist")->with(["lunbo"=>$aaa])->with(["list"=>$list,"where"=>$where]);
    }
    //路线详情
    public function youxiangqing($id,Request $request)
    {
        $db = \DB::table("you")
                   ->rightjoin('you_type', 'you.you_typeid', '=', 'you_type.id')
                   ->select('you_type.*','you.*')
                   ->where('you_type.id',"{$id}")
                   ->get(); 
        $num = $db[0]->you_typedianji;
        $num++;
        \DB::table("you_type")->where('id',"{$id}")->update(['you_typedianji' => "{$num}"]);
        //dd($db);
        return view("zhoubian.youxiangqing",["list"=>$db]);
    }
    //景点详情
    public function jingdian($id,Request $request)
    {
        $db = \DB::table("you")
                   ->join('you_type', 'you.you_typeid', '=', 'you_type.id')
                   ->leftjoin('zb_pinglun', 'you.id', '=', 'zb_pinglun.typeid')
                   ->select('you_type.you_typename','you.*','zb_pinglun.*')
                   ->where('you.id',"{$id}")
                   ->get();
        //dd($db);
        $num = $db[0]->you_dianji;
        $num++;
        \DB::table("you")->where('id',"{$id}")->update(['you_dianji' => "{$num}"]);
        return view("zhoubian.jingdian",["list"=>$db]);
    }
    
}
