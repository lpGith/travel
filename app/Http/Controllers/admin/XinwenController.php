<?php
namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;

class XinwenController extends CommonController
{
	//列表浏览
    public function index(Request $request)
    {
    	$db = DB::table("xinwen");
        //判断并封装搜索条件
        $where = [];
        if($request->has("xinwen_name")){
            $name = $request->input("xinwen_name");
            $db->where("xinwen_name","like","%{$name}%");
            $where['xinwen_name'] = $name;
        }
        
        $list = $db->paginate(3); //获取新闻信息
        return view("admin.xinwen.index",["list"=>$list,"where"=>$where]);
    }
    //详情浏览
    public function show($id)
    {
    	return "详情";
    }
    //加载添加表单
    public function create()
    {
    	return view('admin.xinwen.add');
    }
    //执行添加
    public function store(Request $request)
    {
    	//获取要添加的信息
    	$data = $request->only('xinwen_name','xinwen_address','xinwen_content');
    	$data['xinwen_addtime']=time();
    	$id = DB::table('xinwen')->insertGetId($data);
    	if ($id>0) {
    		echo "添加成功!";
    	}else{
    		echo "添加失败!";
    	}
    	return redirect('admin/xinwen');
    }
    //加载修改页面
    public function edit($id)
    {
    	$xinwen = DB::table('xinwen')->where('id',$id)->first();//获取要编辑的信息
    	return view('admin.xinwen.edit',["vo"=>$xinwen]);
    }
    //执行修改
    public function update(Request $request,$id)
    {
        echo $id;
    	$data = $request->only("xinwen_name",'xinwen_address','xinwen_content');
    	$data['xinwen_addtime']=time();
    	$ip = DB::table('xinwen')->where("id",$id)->update($data);
    	if($ip){
    		return redirect('admin/xinwen');
    	}else{
    		return "修改失败!";
    	}
    }
    //执行删除
    public function destroy($id)
    {
        echo $id;
    	if(DB::table('xinwen')->where('id',$id)->delete()){
            return redirect('admin/xinwen');
        }else{
    	    return "删除失败";
        }
    }

}
