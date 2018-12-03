<?php

namespace App\Http\Controllers\admin\zhoubian;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Org\Image;
class WanController extends Controller
{
    
    //浏览列表信息
    public function index(Request $request)
    {
        $db = \DB::table("wan");
        //判断并封装搜索条件
        $where = [];
        if($request->has("wan_name")){
            $name = $request->input("wan_name");
            $db->where("wan_name","like","%{$name}%");
            $where['wan_name'] = $name;
        }  
        $list = $db->paginate(5);
        return view("admin.zhoubian.wan.index",["list"=>$list,"where"=>$where]);
    }
    
    //加载添加表单
     public function add()
    {
        return view("admin.zhoubian.wan.add");
    }
    
    //执行添加
    public function insert(Request $request)
    {   
        $this->validate($request,[
            "wan_name"=>"required",
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
        $data = $request->only("wan_name","wan_location","wan_describe","wan_price","wan_content","wan_time");
        $addtime = time();
        $data['id'] = null;
        $data['wan_addtime'] = $addtime;
        $data['wan_picname'] = $pname;
        $id = \DB::table("wan")->insertGetId($data);  
        return redirect("/admin/zhoubian/wan/index");
    }
    
    //执行删除
    
    public function delete ($id)
    {   
        $list=\DB::table("wan")->where("id",$id)->get();
        $wan = get_object_vars($list[0]);
        $picname = $wan['wan_picname'];
        @unlink('./admin_zhoubian/'.$picname);
        @unlink('./admin_zhoubian/s_'.$picname);
        @unlink('./images/d_'.$picname);
        \DB::table("wan")->where("id",$id)->delete();
        return redirect("/admin/zhoubian/wan/index");
    }
    //加载修改表单
    public function edit($id)
    {
        $wan = \DB::table("wan")->where("id",$id)->first();
        return view("/admin/zhoubian/wan/edit",["avo"=>$wan]);
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
                $data = $request->only("wan_name","wan_location","wan_describe","wan_price","wan_content","wan_time");
                $data['wan_picname'] = $pname;
                $list=\DB::table("wan")->where("id",$id)->get();
                $wan = get_object_vars($list[0]);
                $wan_pname = $wan['wan_picname'];
                @unlink('./admin_zhoubian/'.$zhu_pname);
                @unlink('./admin_zhoubian/s_'.$zhu_pname);
                @unlink('./admin_zhoubian/'.$zhu_pname);
                @unlink('./admin_zhoubian/s_'.$zhu_pname);
                @unlink('./images/d_'.$zhu_pname);
                \DB::table('wan')->where("id",$id)->update($data);  
            }
            
        }else{
            $data = $request->only("wan_name","wan_location","wan_describe","wan_price","wan_content","wan_time");
            \DB::table('wan')->where("id",$id)->update($data);
        }
        
        return redirect("/admin/zhoubian/wan/index");
    }
    
}
