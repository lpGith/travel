<?php

namespace App\Http\Controllers\zhoubian;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

class PingController extends Controller
{
    
    //浏览列表信息
    public function pinglun(Request $request)
    {
        $pinglun['content'] = $request->get('content');
        $pinglun['user'] = $request->get('user');
        $pinglun['userpicname'] = $request->get('userpicname');
        $pinglun['typeid'] = $request->get('typeid');
        \DB::table("zb_pinglun")->insertGetId($pinglun);  
        print_r($pinglun);
    }
   
}
