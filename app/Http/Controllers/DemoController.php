<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
//use Request;
use Illuminate\Http\Response;
use Session;
use DB;
class DemoController extends Controller
{
    //
    
   public function index()
   {
	   return view("login");
	   
   }
   
    //执行登陆验证
    public function doLogin(Request $request)
    {
        //执行正则验证
        $mycode = session("code");
		//echo $mycode;
       if($request->input("captcha")==$mycode){
           // session()->flash("msg","验证码错误!");
           // return redirect("admin/login");
            
		return back()->with("msg","验证码正确");
        }
	}
}
