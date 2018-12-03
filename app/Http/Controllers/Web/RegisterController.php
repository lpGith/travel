<?php

namespace App\Http\Controllers\Web;
use Illuminate\Http\Request;
use App\Org\Image;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    //列表浏览
	public function index(Request $request)
	{
        $db = DB::table("users");
        //判断并封装搜索条件
        $where = [];
        if($request->has("name")){
            $name = $request->input("name");
            $db->where("name","like","%{$name}%");
            $where['name'] = $name;
        }
        $list =$db->paginate(5);//获取用户信息
        return view('Web.index',["list"=>$list,"where"=>$where]);
	}
    //详情浏览 
	public function show($id)
	{
		return "详情".$id;
	}
    //加载注册页面
	public function create()
	{
		return view("Web.add");
	}
    //执行添加 
	public  function store(Request $request)
	{ 
        //获取指定部分的数据
        $data = $request->only("username","name","password","sex","address","code","phone","email","addtime");
        $data['password']=md5($request->input('password'));
        $data['addtime'] = time();
        $id = DB::table("users")->insertGetId($data);
        if ($id>0) {
        	echo "添加成功!";
            
        }else{
        	echo "添加失败!";
        }
       return redirect("/Web/denglu");
	}
    //执行删除
	public function destroy($id)
	{
		DB::table("users")->where("id",$id)->delete();
        //return "删除".$id;
        return redirect('Web');
	}
    //加载修改
	public function edit($id)
	{
		$user = DB::table("users")->where("id",$id)->first(); //获取要编辑的管理员信息
        return view('Web.edit',["vo"=>$user]);
	}
    //执行修改
    public function update(Request $request,$id)
    {
        //判断是否有上传
        if($request->hasFile("picname")){
            //获取上传信息
            $file = $request->file("picname");
            //确认上传的文件是否成功
            if($file->isValid()){
                $picname = $file->getClientOriginalName(); //获取上传原文件名
                $ext = $file->getClientOriginalExtension(); //获取上传文件名的后缀名
                //执行移动上传文件
                $pname = time().rand(1000,9999).".".$ext;
                $file->move("./users/",$pname);
                $img = new Image();
                $img->open("./users/".$pname)->thumb(100,100)->save("./users/s_".$pname);
                $img->open("./users/".$pname)->thumb(330,330)->save("./images/d_".$pname);
                $data = $request->only("name","sex","email","address","code","phone");
                $data['picname'] = $pname;
                $list=DB::table("users")->where("id",$id)->get();
                $users = get_object_vars($list[0]);
                $users_pname = $users['picname'];
                @unlink('./users/'.$users_pname);
                @unlink('./users/s_'.$users_pname);
                @unlink('./images/d_'.$users_pname);
                DB::table('users')->where("id",$id)->update($data);
            }
        }else{
            $data = $request->only("name","sex","email","address","code","phone");
            DB::table('users')->where("id",$id)->update($data);
        }
        return back();
    }
    //执行修改密码
    public function pass(Request $request,$id)
    {
        $data = $request->only("password");
        $data['password'] = md5($request->input('password1'));
        $id = DB::table("users")->where("id",$id)->update($data);
        if($id){
            return back();
        }else{
            return back()->with("err","修改失败!");
        }
    }
    //加载修改密码的模板
    public function password(){
		$id=session("user")->id;
        $user = DB::table("users")->where("id",$id)->first();
        //获取要编辑的管理员信息
        return view('Web.pass',["vo"=>$user]);
    }
    public function ajax(Request $request)
    {
       $upass=$request->input("password");
        $b = DB::table("users")->lists("password");
        if(in_array(Md5($upass),$b)){
            echo 0;
        }else{
            echo 1;
        }
    }
}
