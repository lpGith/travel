<?php

namespace App\Http\Controllers\admin\zhoubian;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Org\Image;
class ZouController extends Controller
{
    
    //浏览列表信息
    public function index(Request $request)
    {
        $db = \DB::table("zou");
        //判断并封装搜索条件
        $where = [];
        if($request->has("zou_name")){
            $name = $request->input("zou_name");
            $db->where("zou_name","like","%{$name}%");
            $where['zou_name'] = $name;
        }  
        $list = $db->paginate(5);
        return view("admin.zhoubian.zou.index",["list"=>$list,"where"=>$where]);
    }
    
    //加载添加表单
     public function add()
    {
        return view("admin.zhoubian.zou.add");
    }
    
    //执行添加
    public function insert(Request $request)
    {   
        $this->validate($request,[
            "zou_name"=>"required",
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
        $data = $request->only("zou_name","zou_describe","zou_content");
        $addtime = time();
        $data['id'] = null;
        $data['zou_addtime'] = $addtime;
        $data['zou_picname'] = $pname;
        $id = \DB::table("zou")->insertGetId($data);  
        return redirect("/admin/zhoubian/zou/index");
    }
    
    //执行删除
    
    public function delete ($id)
    {   
        $list=\DB::table("zou")->where("id",$id)->get();
        $zou = get_object_vars($list[0]);
        $picname = $zou['zou_picname'];
        
        @unlink('./admin_zhoubian/'.$picname);
        @unlink('./admin_zhoubian/s_'.$picname);
        @unlink('./images/d_'.$picname);
        \DB::table("zou")->where("id",$id)->delete();
        return redirect("/admin/zhoubian/zou/index");
    }
    //加载修改表单
    public function edit($id)
    {
        $zou = \DB::table("zou")->where("id",$id)->first();
        return view("/admin/zhoubian/zou/edit",["avo"=>$zou]);
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
               
                $data = $request->only("zou_name","zou_describe","zou_content");
                $data['zou_picname'] = $pname;
                $list=\DB::table("zou")->where("id",$id)->get();
                $zou = get_object_vars($list[0]);
                $zou_pname = $zou['zou_picname'];
           
                @unlink('./admin_zhoubian/'.$zou_pname);
                @unlink('./admin_zhoubian/s_'.$zou_pname);
                @unlink('./images/d_'.$zou_pname);
                \DB::table('zou')->where("id",$id)->update($data);  
            }
            
        }else{
            $data = $request->only("zou_name","zou_describe","zou_content");
            \DB::table('zou')->where("id",$id)->update($data);
        }
        
        return redirect("/admin/zhoubian/zou/index");
    }
    
}
