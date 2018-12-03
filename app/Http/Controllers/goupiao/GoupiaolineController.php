<?php

namespace App\Http\Controllers\goupiao;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;


class GoupiaolineController extends Controller
{ 
	//浏览列表信息
	
	public function indexlist(request $request)
	{		
		$db=\DB::table("tuangou");
		$where = [];
		//目的地	
		if(!empty($_GET['tuangou_mudi'])){
				$db->where('tuangou_mudi',"like","%{$_GET['tuangou_mudi']}%");
				//$where['tuangou_mudi'] = $_GET['tuangou_mudi'];	
			}
		//行程天数	
		if(!empty($_GET['tuangou_name'])){
			$db->where('tuangou_name',"like","%{$_GET['tuangou_name']}%");
			//$where['tuangou_name'] = $_GET['tuangou_name'];
		}
		//出发地点	
		if(!empty($_GET['tuangou_chufa'])){
			$db->where('tuangou_chufa',"like","%{$_GET['tuangou_chufa']}%");
			//$where['tuangou_chufa'] = $_GET['tuangou_chufa'];
		}
		
		//查询所有数据
		$list=$db->paginate($perPage = 6, $columns = ['*'], $pageName = 'page', $page = 1);
		$model=\DB::table("tuangou")->get();
		return view('goupiao.linelist',["list"=>$list,"model"=>$model]);
	}
	//第二页
	public function indexlist2(request $request)
	{		
		$db=\DB::table("tuangou");
		$where = [];
		//目的地	
		if(!empty($_GET['tuangou_mudi'])){
				$db->where('tuangou_mudi',"like","%{$_GET['tuangou_mudi']}%");
				//$where['tuangou_mudi'] = $_GET['tuangou_mudi'];	
			}
		//行程天数	
		if(!empty($_GET['tuangou_name'])){
			$db->where('tuangou_name',"like","%{$_GET['tuangou_name']}%");
			//$where['tuangou_name'] = $_GET['tuangou_name'];
		}
		//出发地点	
		if(!empty($_GET['tuangou_chufa'])){
			$db->where('tuangou_chufa',"like","%{$_GET['tuangou_chufa']}%");
			//$where['tuangou_chufa'] = $_GET['tuangou_chufa'];
		}
		//查询所有数据
		$list=$db->paginate($perPage = 6, $columns = ['*'], $pageName = 'page', $page = 2);
		return view('goupiao.linelist2',["list"=>$list]);
	}
	public function indexdetail(request $request)
	{	 $id = $request->input("id");	
		$list=\DB::table("tuangou")->where("id",$id)->first();
		$data=\DB::table("tuangoudetail")->where("tuangoudetail_typeid",$id)->first();
		
		//var_dump($data);
		return view('goupiao.linedetail_goupiao',["list"=>$list,"data"=>$data]);
		//return view('goupiao.linedetail_goupiao',["list"=>$list]);
	}	
	
	public function indexpay(request $request)
	{	
		
		$id = $request->input("id");	
		$list=\DB::table("tuangou")->where("id",$id)->first();
		$data=\DB::table("tuangoudetail")->where("tuangoudetail_typeid",$id)->first();
		//$pic=\DB::table("goupiaodetailpic")->where("detailpic_typeid",$id)->first();
		//var_dump($data);
		$model=[];
		for($i=0;$i<7;$i++){
			$model[$i]=date("Y-m-d",strtotime("+{$i} day"));
		}
		//var_dump($model);
		return view('goupiao.lineorder',["list"=>$list,"data"=>$data,"model"=>$data]);
	}

	//团游付款
	public function indexdopay(request $request)
	{	
		$data = $request->except("_token");
		//var_dump($data);
		$data['pay_addtime']=time();
		//执行添加数据
		//var_dump($data);
		$id=\DB::table("goupiaoorder")->insertGetId($data);
		$tid= $request->input("tid");
		
		$list=\DB::table("tuangou")->where("id",$tid)->first();
		session(["list"=>$list]);
		$model=\DB::table("goupiaoorder")->where("id",$id)->first();
		session(["model"=>$model]);
		//var_dump($list);
		//var_dump($model);
		return view('goupiao.linepay');
	}	
	
	
	//付款完成后的
	public function indexsendmail(request $request)
	{	
		
		//邮件发送
		$email=session('user')->email;
		$user = ["email"=>"{$email}","name"=>"hello"];
		
		$user = ["email"=>"qq505945875@163.com","name"=>"hello"];
        \Mail::send('admin.goupiao.add', ['user' => $user], function ($m) use ($user) {
            $m->from('18236887153@163.com', 'admin');
            $m->to($user['email'], $user['name'])->subject('Your Reminder!');
        });
		
		$id = $request->get("id");
		$uid = $request->get("uid");
		\DB::select("update goupiaoorder set pay_state=2,pay_email='{$email}' where id={$uid}");
		$model=\DB::table("goupiaoorder")->where("id",$uid)->first();
		$list=\DB::table("tuangou")->where("id",$id)->first();
		$data=\DB::select("select * from tuangou limit 5");
		return view("goupiao.lineorderdetail",["model"=>$model,"list"=>$list,"data"=>$data]);
		
	}	
	
	
	//订单中心付款
	public function orderpay(request $request)
	{	
		$tid= $request->get("tid");
		$id= $request->get("id");
		$list=\DB::table("tuangou")->where("id",$tid)->first();
		session(["list"=>$list]);
		$model=\DB::table("goupiaoorder")->where("id",$id)->first();
		session(["model"=>$model]);
		//var_dump($list);
		//var_dump($model);
		return view('goupiao.linepay');
	}	
}


