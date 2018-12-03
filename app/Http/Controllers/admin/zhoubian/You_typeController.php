<?php

namespace App\Http\Controllers\admin\zhoubian;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Org\Image;
class You_typeController extends Controller
{
    
    //浏览列表信息
    public function index(Request $request)
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
        return view("admin.zhoubian.you_type.index",["list"=>$list,"where"=>$where]);
    }
    
    //加载添加表单
     public function add()
    {
        return view("admin.zhoubian.you_type.add");
    }
    
    //执行添加
    public function insert(Request $request)
    {   
        $this->validate($request,[
            "you_typename"=>"required",
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
        $data = $request->only("you_typename","you_typedescribe","you_typetime");
        $addtime = time();
        $data['id'] = null;
        $data['you_typeaddtime'] = $addtime;
        $data['you_typepicname'] = $pname;
        $id = \DB::table("you_type")->insertGetId($data);  
        return redirect("/admin/zhoubian/you_type/index");
    }
    
    //执行删除
    
    public function delete ($id)
    {   
        $list=\DB::table("you_type")->where("id",$id)->get();
        $you_type = get_object_vars($list[0]);
        $picname = $you_type['you_typepicname'];
        @unlink('./admin_zhoubian/'.$picname);
        @unlink('./admin_zhoubian/s_'.$picname);
        @unlink('./images/d_'.$picname);
        \DB::table("you_type")->where("id",$id)->delete();
        return redirect("/admin/zhoubian/you_type/index");
    }
    //加载修改表单
    public function edit($id)
    {
        $you_type = \DB::table("you_type")->where("id",$id)->first();
        return view("/admin/zhoubian/you_type/edit",["avo"=>$you_type]);
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
                $data = $request->only("you_typename","you_typedescribe","you_typetime");
                $data['you_typepicname'] = $pname;
                $list=\DB::table("you_type")->where("id",$id)->get();
                $you_type = get_object_vars($list[0]);
                $you_pname = $you_type['you_typepicname'];
                @unlink('./admin_zhoubian/'.$zhu_pname);
                @unlink('./admin_zhoubian/s_'.$zhu_pname);
                @unlink('./images/d_'.$zhu_pname);
                \DB::table('you_type')->where("id",$id)->update($data);  
            }
            
        }else{
            $data = $request->only("you_typename","you_typedescribe","you_typetime");
            \DB::table('you_type')->where("id",$id)->update($data);
        }
        
        return redirect("/admin/zhoubian/you_type/index");
    }
    
}
