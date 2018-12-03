<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Model\code;
use Session;
class CodeController extends Controller
{	
	public function code($tmp)
    {
		//调用方法如下
		//实例化类的时候自动调用构造函数		
        //生成验证码图片的Builder对象，配置相应属性
       $cc = new code(150, 80, 4);       
         //获取验证码的内容
         $cc->getCode();
		//$a="vvv";
		//session(["code"=>$m]);
        //生成图片
       $cc->getCheckCode();
	   //exit();
	  
    }
	
	

}
