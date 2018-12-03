<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;


class typeController extends CommonController
{
    //浏览信息
    public function index()
    {
        $list = \DB::select('select * from type order by concat(path,id) asc'); //获取所有信息
        //遍历要输出的信息,进行缩进处理
        foreach($list as &$vo){
            $m = substr_count($vo->path,",")-1;
            $vo->nbsp = str_repeat("&nbsp; ",$m*4)."|--";
        }
        return view("admin.type.index",["list"=>$list]);
    }
    
    //浏览详情信息
    public function show($id)
    {
        return "详情".$id;
    }
    
    //添加表单
    public function create()
    {
        return view("admin.type.add");
    }
    
    //执行添加
    public function store(Request $request)
    {
        //return back()->with("err","就是不让成功!");
        //获取要添加的信息
        //$name = $request->input("name");
        //$data = $request->all(); //获取所有表单信息
        //unset($data['_token']); //移除多余信息
        //表单验证
        $this->validate($request, [
            'name' =>'required|max:16',
            'age'  =>'required|numeric|max:100|min:10',
        ]);
        
        
        //获取指定的部分数据
        $data = $request->only("name","sex","age","classid");
        //dd($data);
        $id = \DB::table("type")->insertGetId($data);
        if($id>0){
            return redirect('admin/type');
        }else{
            return back()->with("err","添加失败!");
        }
    }
    
    //执行删除
    public function destroy($id)
    {
        if(\DB::table("type")->where("pid",$id)->count()>0){
            return back()->with("err","禁止删除!");
        }
        \DB::table("type")->where("id",$id)->delete();
        //return "删除".$id;
        //return $this->index();
        return redirect('admin/type');
    }
    
    //加载修改表单
    public function edit($id)
    {
        $type = \DB::table("type")->where("id",$id)->first(); //获取要编辑的学生信息
        return view("admin.type.edit",["vo"=>$type]);
    }
    
    //执行修改
    public function update($id,Request $request)
    {
        $data = $request->only("name","sex","age","classid");
        //dd($data);
        $id = \DB::table("type")->where("id",$id)->update($data);
        /*
        if($id){
            return "修改成功！";
        }else{
            return "修改失败！";
        }
        */
        return redirect('admin/type');
    }
    
    //执行上传
    public function doUpload(Request $request)
    {
        //判断是否有上传
        if($request->hasFile("upload")){
            //获取上传信息
            $file = $request->file("upload");
            //确认上传的文件是否成功
            if($file->isValid()){
                //$picname = $file->getClientOriginalName(); //获取上传原文件名
                $ext = $file->getClientOriginalExtension(); //获取上传文件名的后缀名
                //执行移动上传文件
                $filename = time().rand(1000,9999).".".$ext;
                $file->move("./upload/",$filename);
                
       
                $str = "<script type=\"text/javascript\">
                            window.parent.CKEDITOR.tools.callFunction(".$request->input("CKEditorFuncNum").",'".URL("/")."/upload/".$filename."', '上传成功');
                        </script>";
                
                return response($str); //输出
                exit();
            }
        }
    }
}
