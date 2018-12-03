<?php

namespace App\Http\Controllers\zhoubian;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

class FkController extends Controller
{
    
    
    
    public function addfankui(Request $request)
    {
        $fankui['content'] = $request->get('content');
        $fanh=kui['email'] = $request->get('email');
        \DB::table("zb_fankui")->insertGetId($fankui);  
        print_r($fankui);
    }    
}
