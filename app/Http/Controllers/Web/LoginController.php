<?php

namespace App\Http\Controllers\Web;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{

    //加载登录表单页
    public function login()
    {
        return view("dologin");
    }
     //执行登录验证
    public function doLogin(Request $request)
    {
        //执行正则验证
        $mycode = session()->get('code');
        if($request->input("code")!==$mycode){
            //session()->flash("errorinfo","验证码错误!");
            return back()->with("msg","验证码错误!");
        }
    
        //执行登录判断
        $name = $request->input("username");
        $password = $request->input("password");
        //获取对应用户信息
        $user = DB::table("users")->where("username",$name)->first();
        if(!empty($user)){
            //判断密码
            if(md5($password)==$user->password){
                //储存session跳转页面
                session(["user"=>$user]);
				//var_dump(session("user"));
                return redirect("/");
            }
        }
        return back()->with("msg","账号或密码错误!");
    }
    //执行退出方法
    public function logout(){
        session()->forget("user");
        return redirect("/Web/denglu");
    }
}
