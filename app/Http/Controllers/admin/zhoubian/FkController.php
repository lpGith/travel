<?php

namespace App\Http\Controllers\admin\zhoubian;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

use Mail;

class FkController extends Controller
{

    public function addfankui(Request $request)
    {
        $fankui['content'] = $request->get('content');
        $fankui['email'] = $request->get('email');
        $fankui['addtime'] = time();
        \DB::table("zb_fankui")->insertGetId($fankui);  
        print_r($fankui);
    }
    public function fankui(Request $request)    
    {
        $db = \DB::table("zb_fankui");
        
        $where = [];
        if($request->has("zhuangtai")){
            $zhuangtai = $request->input("zhuangtai");
            $db->where("zhuangtai",'=',"{$zhuangtai}");
            $where['zhuangtai'] = $zhuangtai;
        }  
        //dd($db);
        $list = $db->paginate(5);
        return view("admin.zhoubian.fankui.index",["list"=>$list,"where"=>$where]);
    }
    public function edit($id)
    {
        $fankui = \DB::table("zb_fankui")->where("id",$id)->first();
        //dd($fankui);
        return view("/admin/zhoubian/fankui/edit",["avo"=>$fankui]);
    }
    public function update($id,Request $request)
    {
        $data = $request->only("huifu");
        $data['zhuangtai'] = '1';
        //dd($data);
        \DB::table('zb_fankui')->where("id",$id)->update($data);
        
        //发送邮件
        $db = \DB::table("zb_fankui")->where('id',"{$id}")->first();
        $list = $request->only('email','huifu');
        $list['title'] = '张家界反馈回复中心';
        //dd($list);
        $flag = Mail::send('zhoubian.mail',['list'=>$list],function($message)use($list){
            $to = $list['email'];
            $title= $list['title'];
            $message ->to($to)->subject($title);
        });
        //dd($db);
        return redirect("admin/zhoubian/ckfankui");
    }
}
