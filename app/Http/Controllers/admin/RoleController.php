<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;

class RoleController extends CommonController
{
    //分页浏览信息
    public function index(Request $request)
    {
        $db = \DB::table("role");
        //判断并封装搜索条件
        $where = [];
        if($request->has("name")){
            $name = $request->input("name");
            $db->where("name","like","%{$name}%");
            $where['name'] = $name;
        }
       
        
        $list = $db->paginate(5); //获取所有信息
        return view("admin.role.index",["list"=>$list,"where"=>$where]);
    }
    
    //浏览详情信息
    public function show($id)
    {
        return "详情".$id;
    }
    
    //添加表单
    public function create()
    {
        return view("admin.role.add");
    }
    
    //执行添加
    public function store(Request $request)
    {
        //表单验证
        $this->validate($request, [
            'name' => 'required|max:16',
        ]);
       
        //获取指定的部分数据
        $data = $request->only("name","state");
        $data['created_at'] = time();
        $data['updated_at'] = time();
        $id = \DB::table("role")->insertGetId($data);
        
        if($id>0){
            return redirect('admin/role');
        }else{
           return back()->with("err","添加失败!");
        }
    }
    
    //执行删除
    public function destroy($id)
    {
        \DB::table("role")->where("id",$id)->delete();

        return redirect('admin/role');
    }
    
    //加载修改表单
    public function edit($id)
    {
        $role = \DB::table("role")->where("id",$id)->first(); //获取要编辑的信息
        return view("admin.role.edit",["vo"=>$role]);
    }
    
    //执行修改
    public function update($id,Request $request)
    {
        //表单验证
        $this->validate($request, [
            'name' => 'required|max:16',
        ]);
        $data = $request->only("name","state");
        $data['updated_at'] = time();
        $id = \DB::table("role")->where("id",$id)->update($data);
        
        if($id>0){
            return redirect('admin/role');
        }else{
            return back()->with("err","修改失败!");
        }
        
    }
    
    //为当前角色准备分配节点信息
    public function loadNode($rid=0)
    {
        //获取所有节点信息
        $nodelist = \DB::table("node")->get();
        //获取当前角色的节点id
        $nids = \DB::table("role_node")->where("rid",$rid)->lists("nid");
        //加载模板
        return view("admin.role.nodelist",["rid"=>$rid,"nodelist"=>$nodelist,"nids"=>$nids]);
    }
    
    public function saveNode(Request $request){
        $rid = $request->input("rid");
        //清除数据
        \DB::table("role_node")->where("rid",$rid)->delete();
        
        $nids = $request->input("nids");
        if(!empty($nids)){
            //处理添加数据
            $data = [];
            foreach($nids as $v){
                $data[] = ["rid"=>$rid,"nid"=>$v];
            }
            //添加数据
            \DB::table("role_node")->insert($data);
        }
        return "节点保存成功!";
    }
}
