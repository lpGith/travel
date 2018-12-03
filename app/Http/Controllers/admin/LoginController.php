<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Http\Requests;

class LoginController extends CommonController
{
    //加载登录表单页
    public function login()
    {
        return view("admin.login.login");
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
	    $email = $request->input("email");
	    $password = $request->input("password");
	    //获取对应用户信息
	    $user = DB::table("admin")->where("email",$email)->first();
	    if(!empty($user)){
	    	//判断密码
	    	if(md5($password)==$user->password){
	    		//储存session跳转页面
	    		session(["adminuser"=>$user]);
	    		//获取当前登录者的权限
	    		$res = DB::select('select n.name,n.method,n.url from user_role ur,role_node rn,node n where ur.rid = rn.rid and rn.nid = n.id and ur.uid =:id',['id'=> $user->id]);
	    		$nodelist = array(array("name"=>"网站首页","method"=>"get","url"=>"admin"));
	    		foreach($res as $ob){
	    			$nodelist[] = [
	    				"name"=>$ob->name,
	    				"method"=>$ob->method,
	    				"url"=>$ob->url
	    			];
	    		//判断当前是否有添加权限,若有就追加执行添加
	    			if(preg_match("/^.*?\/create$/",$ob->url) && $ob->method=="get"){
	    				$nodelist[] = [
	    					"name"=>"执行添加",
	    					"method"=>"post",
	    					"url"=>preg_replace("/^(.*?)\/create$/","\\1",$ob->url)
	    				];
		    		}
	    		//判断当前是否有修改权限,若有就追加执行修改
	    			if(preg_match("/^.*?\/\*\/edit$/",$ob->url) && $ob->method=="get"){
	    				$nodelist[] = [
	    					"name"=>"执行修改",
	    					"method"=>"put",
	    					"url"=>preg_replace("/^(.*?)\/\*\/edit$/","\\1/*",$ob->url)
	    				];
	    			}
	    		}

	    		//将获取的权限放入到session中
	    		session()->set("nodelist",$nodelist);
	    		
	    		return redirect("admin/index");
	    	}
	    }
	    return back()->with("msg","账号或密码错误!");
	}
	//执行退出方法
	public function logout(){
		session()->forget("adminuser");
		return redirect("admin");
	}
}
