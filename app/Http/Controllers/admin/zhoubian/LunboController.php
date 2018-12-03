<?php

namespace App\Http\Controllers\admin\zhoubian;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

class LunboController extends Controller
{
    //加载添加
    public function add()
    {
        return view("admin.zhoubian.lb.add");
    }
    //删除
     public function delete ($id)
    {   
        $list=\DB::table("zhoubian_lb")->where("id",$id)->get();
        $lb = get_object_vars($list[0]);
        $picname = $lb['picname'];

      
        @unlink('./admin_zhoubian/'.$picname);
        \DB::table("zhoubian_lb")->where("id",$id)->delete();
        return redirect("/admin/zhoubian/lb/index");
    }
    
    //执行添加
    public function insert(Request $request)
    {   
        $this->validate($request,[
            "mypic"=>"required",
        ]);

        //获取上传信息
        $file = $request->file("mypic");
        //确认上传的文件是否成功
        if($file->isValid()){
            $picname = $file->getClientOriginalName(); //获取上传原文件名
            $ext = $file->getClientOriginalExtension(); //获取上传文件名的后缀名
            //执行移动上传文件
            $pname = time().rand(1000,9999).".".$ext;

            $file->move("./admin_zhoubian/",$pname);
        }

        $data = $request->only("name","path");
        $addtime = time();
        $data['id'] = null;
        $data['addtime'] = $addtime;
        $data['picname'] = $pname;
        $id = \DB::table("zhoubian_lb")->insertGetId($data);  
        return redirect("/admin/zhoubian/lb/index");
    }
    
    
    public function lunbo(Request $request)
    {
        $db = \DB::table('zhoubian_lb')->get();
        //dd($db);
        return view("admin.zhoubian.lb.index",["list"=>$db]);
    } 
    
    //加载修改表单
    public function edit($id)
    {
        $lunbo = \DB::table("zhoubian_lb")->where("id",$id)->first();
        return view("/admin/zhoubian/lb/edit",["avo"=>$lunbo]);
    }
    
    //执行修改
    public function update($id,Request $request)
    {   
      //判断是否有上传
        if($request->hasFile("mypic")){
            //获取上传信息
            $file = $request->file("mypic");
            //确认上传的文件是否成功
            if($file->isValid()){
                $picname = $file->getClientOriginalName(); //获取上传原文件名
                $ext = $file->getClientOriginalExtension(); //获取上传文件名的后缀名
                //执行移动上传文件
                $pname = time().rand(1000,9999).".".$ext;
                $file->move("./admin_zhoubian/",$pname);
                $data = $request->only("name","path");
                $data['picname'] = $pname;
                $list=\DB::table("zhoubian_lb")->where("id",$id)->get();
                $zhoubian_lb = get_object_vars($list[0]);
                $picnamename = $zhoubian_lb['picname'];
              
                @unlink('./admin_zhoubian/'.$chi_pname);
                \DB::table('zhoubian_lb')->where("id",$id)->update($data);  
            }
            
        }else{
            $data = $request->only("name","path");
            \DB::table('zhoubian_lb')->where("id",$id)->update($data);
        }
        
        return redirect("/admin/zhoubian/lb/index");
    }
}
