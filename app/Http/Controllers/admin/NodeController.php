<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;

class NodeController extends CommonController
{
    //分页浏览信息
    public function index(Request $request)
    {
        $db = \DB::table("node");
        //判断并封装搜索条件
        $where = [];
        if($request->has("name")){
            $name = $request->input("name");
            $db->where("name","like","%{$name}%");
            $where['name'] = $name;
        }
       
        $list = $db->paginate(5); //获取所有信息
        return view("admin.node.index",["list"=>$list,"where"=>$where]);
    }
    
    //浏览详情信息
    public function show($id)
    {
        return "详情".$id;
    }
    
    //添加表单
    public function create()
    {
        return view("admin.node.add");
    }
    
    //执行添加
    public function store(Request $request)
    {
        //表单验证
        $this->validate($request, [
            'name' => 'required|max:16',
        ]);
       
        //获取指定的部分数据
        $data = $request->only("name","method","url");
        $data['created_at'] = time();
        $data['updated_at'] = time();
        //var_dump($data);
        //exit();
        $id = \DB::table("node")->insertGetId($data);
        
        if($id>0){
            return redirect('admin/node');
        }else{
           return back()->with("err","添加失败!");
        }
    }
    
    //执行删除
    public function destroy($id)
    {
        \DB::table("node")->where("id",$id)->delete();

        return redirect('admin/node');
    }
    
    //加载修改表单
    public function edit($id)
    {
        $node = \DB::table("node")->where("id",$id)->first(); //获取要编辑的信息
        return view("admin.node.edit",["vo"=>$node]);
    }
    
    //执行修改
    public function update($id,Request $request)
    {
        //表单验证
        $this->validate($request, [
            'name' => 'required|max:16',
        ]);
        $data = $request->only("name","method","url","state");
        $data['updated_at'] = time();
        $id = \DB::table("node")->where("id",$id)->update($data);
        
        if($id>0){
            return redirect('admin/node');
        }else{
            return back()->with("err","修改失败!");
        }
        
    }
}
