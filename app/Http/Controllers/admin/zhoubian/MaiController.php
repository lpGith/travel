<?php

namespace App\Http\Controllers\admin\zhoubian;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Org\Image;
class MaiController extends Controller
{
    
    //浏览列表信息
    public function index(Request $request)
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
        return view("admin.zhoubian.mai.index",["list"=>$list,"where"=>$where]);
    }
    
    //加载添加表单
     public function add()
    {
        return view("admin.zhoubian.mai.add");
    }
    
    //执行添加
    public function insert(Request $request)
    {   
        $this->validate($request,[
            "mai_name"=>"required",
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
        $data = $request->only("mai_name","mai_describe","mai_content");
        $addtime = time();
        $data['id'] = null;
        $data['mai_addtime'] = $addtime;
        $data['mai_picname'] = $pname;
        $id = \DB::table("mai")->insertGetId($data);  
        return redirect("/admin/zhoubian/mai/index");
    }
    
    //执行删除
    
    public function delete ($id)
    {   
        $list=\DB::table("mai")->where("id",$id)->get();
        $mai = get_object_vars($list[0]);
        $picname = $mai['mai_picname'];
        @unlink('./admin_zhoubian/'.$picname);
        @unlink('./admin_zhoubian/s_'.$picname);
        @unlink('./images/d_'.$picname);
        \DB::table("mai")->where("id",$id)->delete();
        return redirect("/admin/zhoubian/mai/index");
    }
    //加载修改表单
    public function edit($id)
    {
        $mai = \DB::table("mai")->where("id",$id)->first();
        return view("/admin/zhoubian/mai/edit",["avo"=>$mai]);
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
                $data = $request->only("mai_name","mai_describe","mai_content");
                $data['mai_picname'] = $pname;
                $list=\DB::table("mai")->where("id",$id)->get();
                $mai = get_object_vars($list[0]);
                $mai_pname = $mai['mai_picname'];
                @unlink('./admin_zhoubian/'.$mai_pname);
                @unlink('./admin_zhoubian/s_'.$mai_pname);
                @unlink('./images/d_'.$mai_pname);
                \DB::table('mai')->where("id",$id)->update($data);  
            }
            
        }else{
            $data = $request->only("mai_name","mai_describe","mai_content");
            \DB::table('mai')->where("id",$id)->update($data);
        }
        
        return redirect("/admin/zhoubian/mai/index");
    }
    
}
