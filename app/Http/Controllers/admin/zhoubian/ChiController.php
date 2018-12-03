<?php

namespace App\Http\Controllers\admin\zhoubian;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Org\Image;

class ChiController extends Controller
{
    //浏览列表信息
    public function index(Request $request)
    {
        $db = \DB::table("chi");
        //判断并封装搜索条件
        $where = [];
        if($request->has("chi_name")){
            $name = $request->input("chi_name");
            $db->where("chi_name","like","%{$name}%");
            $where['chi_name'] = $name;
        }
       
        $list = $db->paginate(5);
        
        return view("admin.zhoubian.chi.index",["list"=>$list,"where"=>$where]);
    }
    //加载添加表单
     public function add()
    {
        return view("admin.zhoubian.chi.add");
    }
    
    //执行添加
    public function insert(Request $request)
    {   
        $this->validate($request,[
            "chi_name"=>"required",
            "chi_phone"=>"required",
            "chi_location"=>"required",
            "mypic"=>"required",
        ]);
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
                $img = new Image();
                $img->open("./admin_zhoubian/".$pname)->thumb(100,100)->save("./admin_zhoubian/s_".$pname);
                $img->open("./admin_zhoubian/".$pname)->thumb(330,330)->save("./images/d_".$pname);
               


            }
        }
        $data = $request->only("chi_name","chi_location","chi_phone","chi_describe","chi_time","chi_content");
        $addtime = time();
        $data['id'] = null;
        $data['chi_addtime'] = $addtime;
        $data['chi_picname'] = $pname;
        $id = \DB::table("chi")->insertGetId($data);  
        return redirect("/admin/zhoubian/chi/index");
    }
    
    //执行删除
    
    public function delete ($id)
    {   
        $list=\DB::table("chi")->where("id",$id)->get();
        $chi = get_object_vars($list[0]);
        $picname = $chi['chi_picname'];

      
        @unlink('./admin_zhoubian/'.$picname);
        @unlink('./admin_zhoubian/s_'.$picname);
        @unlink('./images/d_'.$picname);
        \DB::table("chi")->where("id",$id)->delete();
        return redirect("/admin/zhoubian/chi/index");
    }
    
    //加载修改表单
    public function edit($id)
    {
        $chi = \DB::table("chi")->where("id",$id)->first();
        return view("/admin/zhoubian/chi/edit",["avo"=>$chi]);
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
                $img = new Image();
                $img->open("./admin_zhoubian/".$pname)->thumb(100,100)->save("./admin_zhoubian/s_".$pname);
                $img->open("./admin_zhoubian/".$pname)->thumb(330,330)->save("./images/d_".$pname);
               
                $data = $request->only("chi_name","chi_location","chi_phone","chi_describe","chi_time","chi_content");
                $data['chi_picname'] = $pname;
                $list=\DB::table("chi")->where("id",$id)->get();
                $chi = get_object_vars($list[0]);
                $chi_pname = $chi['chi_picname'];
              
                @unlink('./admin_zhoubian/'.$chi_pname);
                @unlink('./admin_zhoubian/s_'.$chi_pname);
                @unlink('./images/d_'.$chi_pname);
                \DB::table('chi')->where("id",$id)->update($data);  
            }
            
        }else{
            $data = $request->only("chi_name","chi_location","chi_phone","chi_describe","chi_time","chi_content");
            \DB::table('chi')->where("id",$id)->update($data);
        }
        
        return redirect("/admin/zhoubian/chi/index");
    }
}
