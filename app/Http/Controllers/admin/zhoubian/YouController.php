<?php

namespace App\Http\Controllers\admin\zhoubian;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Org\Image;
class YouController extends Controller
{
    
    //浏览列表信息
    public function index(Request $request)
    {
        $db = \DB::table("you")
                   ->join('you_type', 'you.you_typeid', '=', 'you_type.id')
                   ->select('you.*','you_type.you_typename');
        //判断并封装搜索条件
        $where = [];
        if($request->has("you_name")){
            $name = $request->input("you_name");
            $db->where("you_name","like","%{$name}%");
            $where['you_name'] = $name;
        }  
        $list = $db->paginate(5);
        return view("admin.zhoubian.you.index",["list"=>$list,"where"=>$where]);
    }
    
    //加载添加表单
     public function add()
    {
        $list = \DB::table('you_type')->get();
        return view("admin.zhoubian.you.add",['list'=>$list]);
    }
    
    //执行添加
    public function insert(Request $request)
    {   
        $this->validate($request,[
            "you_name"=>"required",
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
        $data = $request->only("you_name","you_price","you_content","you_typeid");
        $addtime = time();
        $data['id'] = null;
        $data['you_addtime'] = $addtime;
        $data['you_picname'] = $pname;
        $id = \DB::table("you")->insertGetId($data);  
        return redirect("/admin/zhoubian/you/index");
    }
    
    //执行删除
    
    public function delete ($id)
    {   
        $list=\DB::table("you")->where("id",$id)->get();
        $you = get_object_vars($list[0]);
        $picname = $you['you_picname'];
        @unlink('./admin_zhoubian/'.$picname);
        @unlink('./admin_zhoubian/s_'.$picname);
        @unlink('./images/d_'.$picname);
        \DB::table("you")->where("id",$id)->delete();
        return redirect("/admin/zhoubian/you/index");
    }
    
     //加载修改表单
    public function edit($id)
    {
        $you = \DB::table("you")->where("id",$id)->first();
        return view("/admin/zhoubian/you/edit",["avo"=>$you]);
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
                $data = $request->only("you_name","you_price","you_content");
                $data['you_picname'] = $pname;
                $list=\DB::table("you")->where("id",$id)->get();
                $you = get_object_vars($list[0]);
                $you_pname = $you['you_picname'];
                @unlink('./admin_zhoubian/'.$you_pname);
                @unlink('./admin_zhoubian/s_'.$you_pname);
                @unlink('./images/d_'.$mai_pname);
                \DB::table('you')->where("id",$id)->update($data);  
            }
            
        }else{
            $data = $request->only("you_name","you_price","you_content");
            \DB::table('you')->where("id",$id)->update($data);
        }
        
        return redirect("/admin/zhoubian/you/index");
    }
}
