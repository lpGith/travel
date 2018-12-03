<?php

namespace App\Http\Controllers\Admin\jingdian;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

class TypeController extends Controller
{
    public function index()
    {	
		$list=\DB::select("select * from jingdian_type order by concat(path,id)"); 
        return view('admin.jingdian.index',["list"=>$list]);
    }
	
	public function create()
    {	
		
        return view('admin.jingdian.add');
    }
	
	//执行添加
    public function store(Request $request)
    {
        //获取表单信息
		$data=$request->except("_token");
		//执行添加
		$id=\DB::table("jingdian_type")->insertGetId($data);
		if($id>0){
			echo "<script>alert('添加成功！')</script>";
		}else{
			echo "<script>alert('添加失败！')</script>";
		}
		return $this->index();
    }
    
	public function add(Request $request)
	{
		$id=$request->get("id");
		$data=\DB::table("jingdian_type")->where("id",$id)->first();
		
		return view('admin.jingdian.add1',["xx"=>$data]);
	}
	
	public function insert(Request $request)
	{
		//获取表单信息
		$data=$request->all();
		//执行添加
		$id=\DB::table("jingdian_type")->insertGetId($data);
		if($id>0){
			echo "<script>alert('添加成功！')</script>";
		}else{
			echo "<script>alert('添加失败！')</script>";
		}
		return $this->index();
	}
	
	 //加载修改列表
	public function edit($id)
	{
		//获取数据
		$list=\DB::table("jingdian_type")->where("id",$id)->first();
		return view("admin.jingdian.edit",["xx"=>$list]);
	}
	
	//执行修改
	public function update($id,request $request)
	{
		//获取数据
		$data=$request->except("_token","_method");
		
		$id=\DB::table("jingdian_type")->where("id",$id)->update($data);
			if($id){		
				echo "<script>alert('修改成功！')</script>";			
			}else{
				echo "<script>alert('修改失败！')</script>";
			}
			return redirect('/admin/jingdiantype');
	
	}
	
}
