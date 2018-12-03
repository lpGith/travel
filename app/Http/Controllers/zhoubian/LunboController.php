<?php

namespace App\Http\Controllers\zhoubian;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

class LunboController extends Controller
{

    public function addlunbo(Request $request)
    {
        
    }
    
    public function lunbo(Request $request)
    {
        $db = \DB::table('zhoubian_lb');
        return view("admin.zhoubian.lb.index",["list"=>$db]);
    }  
}
