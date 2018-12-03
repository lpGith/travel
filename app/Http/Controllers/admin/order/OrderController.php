<?php

namespace App\Http\Controllers\admin\order;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;


class OrderController extends Controller
{ 
	//浏览列表信息
	public function index(request $request)
	{	
	
		$db = \DB::table("goupiaoorder");
        //判断并封装搜索条件
        $where = [];
        if($request->has("pay_typeid")){
            $pay_typeid = $request->input("pay_typeid");
            $db->where("pay_typeid","like","%{$pay_typeid}%");
            $where['pay_typeid'] = $pay_typeid;
        }
		$list=$db->paginate(4);
		
		return view("admin.order.index",["list"=>$list,"where"=>$where]);
	}	
	
	
}


