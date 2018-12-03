<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
class BendiController extends CommonController
{
   //分页列表浏览
    public function index(Request $request)
    {
    	//$list = \DB::table('bendi')->get();
    	//return view('admin.bendi.index',['list'=>$list]);
    	$db = \DB::table("bendi");
        //判断并封装搜索条件
        $where = [];
        if($request->has("xinwen_name")){
            $name = $request->input("xinwen_name");
            $db->where("xinwen_name","like","%{$name}%");
            $where['xinwen_name'] = $name;
        }
        
        $list = $db->paginate(3); //获取新闻信息
        return view("admin.bendi.index",["list"=>$list,"where"=>$where]);
    }
    //详情浏览
    public function show($id)
    {
    	return "详情";
    }
    //加载添加表单
    public function create()
    {
    	return view('admin.bendi.add');
    }
    //执行添加
    public function store(Request $request)
    {
    	//获取要添加的信息
    	$data = $request->only('xinwen_name','xinwen_address','xinwen_content');
    	$data['xinwen_addtime']=time();
    	$id = \DB::table('bendi')->insertGetId($data);
    	if ($id>0) {
    		echo "添加成功!";
    	}else{
    		echo "添加失败!";
    	}
    	return redirect('admin/bendi');
    }
    //加载修改表单
    public function edit($id)
    {
    	$bendi = \DB::table('bendi')->where('id',$id)->first();//获取要编辑的信息
    	return view('admin.bendi.edit',["vo"=>$bendi]);
    }
    //执行修改
    public function update(Request $request,$id)
    {
    	$data = $request->only("xinwen_name",'xinwen_address','xinwen_content');
    	$data['xinwen_addtime']=time();
    	$ip = \DB::table('bendi')->where("id",$id)->update($data);
    	if($ip){
    		return redirect('admin/bendi');
    	}else{
    		return "修改失败!";
    	}
    }
    //执行删除
    public function destroy($id)
    {
    	\DB::table('bendi')->where('id',$id)->delete();
    	return redirect('admin/bendi');
    }
}
