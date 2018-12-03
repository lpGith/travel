<?php

namespace App\Http\Controllers\admin\zhoubian;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Org\Image;
class ZhuController extends Controller
{
    
    //浏览列表信息
    public function index(Request $request)
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
        return view("admin.zhoubian.zhu.index",["list"=>$list,"where"=>$where]);
    }
    
    //加载添加表单
     public function add()
    {
        return view("admin.zhoubian.zhu.add");
    }
    
    //执行添加
    public function insert(Request $request)
    {   
        $this->validate($request,[
            "zhu_name"=>"required",
            "zhu_phone"=>"required",
            "zhu_location"=>"required",
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
        $data = $request->only("zhu_name","zhu_location","zhu_phone","zhu_describe","zhu_type","zhu_content");
        $addtime = time();
        $data['id'] = null;
        $data['zhu_addtime'] = $addtime;
        $data['zhu_picname'] = $pname;
        $id = \DB::table("zhu")->insertGetId($data);  
        return redirect("/admin/zhoubian/zhu/index");
    }
    //在线编辑器图片上传
    
    public function upload(Request $request)
    {
        //判断是否有上传
        if($request->hasFile("upload")){
            //获取上传信息
            $file = $request->file("upload");
            //确认上传的文件是否成功
            if($file->isValid()){
                $ext = $file->getClientOriginalExtension(); //获取上传文件名的后缀名
                //执行移动上传文件
                $filename = time().rand(1000,9999).".".$ext;
                $file->move("./images/xq/",$filename);
                
       
                $str = "<script type=\"text/javascript\">
                            window.parent.CKEDITOR.tools.callFunction(".$request->input("CKEditorFuncNum").",'".URL("/")."/images/xq/".$filename."', '上传成功');
                        </script>";
                return response($str); //输出

            }
        }
    }
    
    //执行删除
    
    public function delete ($id)
    {   
        $list=\DB::table("zhu")->where("id",$id)->get();
        $zhu = get_object_vars($list[0]);
        $picname = $zhu['zhu_picname'];
        @unlink('./admin_zhoubian/'.$picname);
        @unlink('./admin_zhoubian/s_'.$picname);
        @unlink('./images/d_'.$picname);
        \DB::table("zhu")->where("id",$id)->delete();
        return redirect("/admin/zhoubian/zhu/index");
    }
    //加载修改表单
    public function edit($id)
    {
        $zhu = \DB::table("zhu")->where("id",$id)->first();
        return view("/admin/zhoubian/zhu/edit",["avo"=>$zhu]);
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
                $data = $request->only("zhu_name","zhu_location","zhu_content","zhu_phone","zhu_describe","zhu_type");
                $data['zhu_picname'] = $pname;
                $list=\DB::table("zhu")->where("id",$id)->get();
                $zhu = get_object_vars($list[0]);
                $zhu_pname = $zhu['zhu_picname'];
                @unlink('./admin_zhoubian/'.$zhu_pname);
                @unlink('./admin_zhoubian/s_'.$zhu_pname);
                @unlink('./images/d_'.$zhu_pname);
                \DB::table('zhu')->where("id",$id)->update($data);  
            }
            
        }else{
            $data = $request->only("zhu_name","zhu_location","zhu_phone","zhu_content","zhu_describe","zhu_type");
            \DB::table('zhu')->where("id",$id)->update($data);
        }
        
        return redirect("/admin/zhoubian/zhu/index");
    }
    
}
