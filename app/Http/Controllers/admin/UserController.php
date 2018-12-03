<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;

class UserController extends CommonController
{
    //列表浏览
	public function index(Request $request)
	{
		//$list=\DB::table('admin')->get();
        //return view("admin.users.index",["list"=>$list]);
        $db = \DB::table("admin");
        //判断并封装搜索条件
        $where = [];
        if($request->has("name")){
            $name = $request->input("name");
            $db->where("name","like","%{$name}%");
            $where['name'] = $name;
        }
        $list = $db->paginate(5);//获取管理员信息条数
        return view('admin.users.index',["list"=>$list,"where"=>$where]);
	}
    //详情浏览 
	public function show($id)
	{
		return "详情".$id;
	}
    //加载添加表单
	public function create()
	{
		return view("admin.users.add");
	}
    //执行添加 
	public  function store(Request $request)
	{

        //获取指定部分的数据
        $data = $request->only("name","password","email");
        $data['password']=md5($request->input('password'));
        $data['created_at'] = time();
        $data['updated_at'] = time();   

        $id = \DB::table("admin")->insertGetId($data);
        if ($id>0) {
        	return redirect("admin/users");
            
        }else{
        	return back()->with("err","添加失败!");
        }
       
	}
    //执行删除
	public function destroy($id)
	{
		\DB::table("admin")->where("id",$id)->delete();
        //return "删除".$id;
        return redirect('admin/users');
	}
    //加载修改
	public function edit($id)
	{
		$user = \DB::table("admin")->where("id",$id)->first(); //获取要编辑的管理员信息
        return view("admin.users.edit",["vo"=>$user]);
	}
    //执行修改
	public function update(Request $request,$id)
	{
		$data = $request->only("name","email");
        //dd($data);
        $id = \DB::table("admin")->where("id",$id)->update($data);
        if($id){
            return redirect('admin/users');
        }else{
           return back()->with("err","修改失败!");
        }
	}
    //为当前用户准备分配角色信息
    public function loadRole($uid=0)
    {
        //获取所有角色信息
        $rolelist = \DB::table("role")->get();
        //获取当前用户的角色id
        $rids = \DB::table("user_role")->where("uid",$uid)->lists("rid");
        //加载模板
        return view("admin.users.rolelist",["uid"=>$uid,"rolelist"=>$rolelist,"rids"=>$rids]);
    }
    
    public function saveRole(Request $request){
        $uid = $request->input("uid");
        //清除数据
        \DB::table("user_role")->where("uid",$uid)->delete();
        
        $rids = $request->input("rids");
        if(!empty($rids)){
            //处理添加数据
            $data = [];
            foreach($rids as $v){
                $data[] = ["uid"=>$uid,"rid"=>$v];
            }
            //添加数据
            \DB::table("user_role")->insert($data);
        }
        return "角色保存成功!";
    }

}
