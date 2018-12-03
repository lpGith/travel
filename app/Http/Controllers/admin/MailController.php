<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests;

class MailController extends CommonController
{
    //发送邮件
    public function index()
    {
        $id = DB::table('users')->where('email',"497584995@qq.com")->get();
        $user = ["email"=>"497584995@qq.com","name"=>"admin",'id'=>$id[0]->id];
        \Mail::send('emailss',['user'=>$user],function($m) use ($user){
            
            $m->from('lpkingMail@163.com');

            $m->to($user['email'],$user['name'])->subject('随便的');
        });
		return "您的信息已经发送到您的邮箱，请注意查收！";
    }
    public function index2()
    {
        $id = \DB::table('users')->where('email',"497584995@qq.com")->get();
        $user = ["email"=>"497584995@qq.com","name"=>"admin",'id'=>$id[0]->id];
        return view('emails',['user'=>$user,'id'=>$id[0]->id]);
    }
}
