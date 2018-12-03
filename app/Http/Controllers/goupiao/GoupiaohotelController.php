<?php

namespace App\Http\Controllers\goupiao;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;


class GoupiaohotelController extends Controller
{ 
	//浏览列表信息
	
	public function indexlist(request $request)
	{		
		//$list=\DB::table("goupiaolist")->get();
		$db=\DB::table("jiugou");
		$where = [];
			
		if(!empty($_GET['jiugou_address'])){
				$db->where('jiugou_address',"like","%{$_GET['jiugou_address']}%");
				$where['jiugou_address'] = $_GET['jiugou_address'];	
			}
			
		
		if(!empty($_GET['jiugou_pingji'])){
			$db->where('jiugou_pingji',"like","%{$_GET['jiugou_pingji']}%");
			$where['jiugou_pingji'] = $_GET['jiugou_pingji'];
		}
		
		if(!empty($_GET['jiugou_price1'])){
			//获取传过来的价格给每个后面添加'-'
			$price = $_GET['jiugou_price1'].'-';
			//以'-'分割字符串
			$pp = explode('-',$price);
			$db ->where('jiugou_price1','>',$pp[0])->where('jiugou_price1','<=',empty($pp[1])?100000:$pp[1]);
			$where['jiugou_price1'] = $_GET['jiugou_price1'];
		}
		//查询所有数据
		$list=$db->paginate($perPage = 6, $columns = ['*'], $pageName = 'page', $page = 1);
		$model=\DB::table("jiugou")->get();
		return view('goupiao.hotellist',["list"=>$list,"model"=>$model]);
	}	
	//第二页
	public function indexlist2(request $request)
	{		
		$db=\DB::table("jiugou");
		$where = [];
			
		if(!empty($_GET['jiugou_address'])){
				$db->where('jiugou_address',"like","%{$_GET['jiugou_address']}%");
				$where['jiugou_address'] = $_GET['jiugou_address'];	
			}
			
		
		if(!empty($_GET['jiugou_pingji'])){
			$db->where('jiugou_pingji',"like","%{$_GET['jiugou_pingji']}%");
			$where['jiugou_pingji'] = $_GET['jiugou_pingji'];
		}
		
		if(!empty($_GET['jiugou_price1'])){
			//获取传过来的价格给每个后面添加'-'
			$price = $_GET['jiugou_price1'].'-';
			//以'-'分割字符串
			$pp = explode('-',$price);
			$db ->where('jiugou_price1','>',$pp[0])->where('jiugou_price1','<=',empty($pp[1])?100000:$pp[1]);
			$where['jiugou_price1'] = $_GET['jiugou_price1'];
		}
		
		//查询所有数据
		$list=$db->paginate($perPage = 6, $columns = ['*'], $pageName = 'page', $page = 2);
		return view('goupiao.hotellist2',["list"=>$list]);
	}	
	public function indexdetail(request $request)
	{	 $id = $request->input("id");	
		$list=\DB::table("jiugou")->where("id",$id)->first();
		$data=\DB::table("jiugoudetail")->where("jiugoudetail_typeid",$id)->first();
		
		//var_dump($data);
		return view('goupiao.hoteldetail_goupiao',["list"=>$list,"data"=>$data]);
	}

	public function indexpay(request $request)
	{	
		
		$id = $request->input("id");	
		$list=\DB::table("jiugou")->where("id",$id)->first();
		$data=\DB::table("jiugoudetail")->where("jiugoudetail_typeid",$id)->first();
		//$pic=\DB::table("goupiaodetailpic")->where("detailpic_typeid",$id)->first();
		//var_dump($data);
		$model=[];
		for($i=0;$i<7;$i++){
			$model[$i]=date("Y-m-d",strtotime("+{$i} day"));
		}
		//var_dump($model);
		return view('goupiao.hotelorder',["list"=>$list,"data"=>$data,"model"=>$data]);
	}

	//酒店付款
	public function indexdopay(request $request)
	{	
		$data = $request->except("_token");
		//var_dump($data);
		$data['pay_addtime']=time();
		//执行添加数据
		//var_dump($data);
		$id=\DB::table("goupiaoorder")->insertGetId($data);
		$tid= $request->input("tid");
		//echo $tid;
		$list=\DB::table("jiugou")->where("id",$tid)->first();
		session(["list"=>$list]);
		$model=\DB::table("goupiaoorder")->where("id",$id)->first();
		session(["model"=>$model]);
		//var_dump(session("list"));
		//var_dump($model);
		return view('goupiao.hotelpay');
	}	
	
	
	//付款完成后的
	public function indexsendmail(request $request)
	{	
		$id = $request->get("id");
		$uid = $request->get("uid");
		//邮件发送
		
			$email=session('user')->email;
			$user = ["email"=>"{$email}","name"=>"hello"];
        \Mail::send('admin.goupiao.add', ['user' => $user], function ($m) use ($user) {
            $m->from('18236887153@163.com', 'admin');
            $m->to($user['email'], $user['name'])->subject('Your Reminder!');
        });
		
		\DB::select("update goupiaoorder set pay_state=2,pay_email='{$email}' where id={$uid}");
		$model=\DB::table("goupiaoorder")->where("id",$uid)->first();
		$list=\DB::table("jiugou")->where("id",$id)->first();
		$data=\DB::select("select * from jiugou limit 5");
		return view("goupiao.hotelorderdetail",["model"=>$model,"list"=>$list,"data"=>$data]);
	}	
	
	//订单中心付款
	public function orderpay(request $request)
	{	
		$tid= $request->get("tid");
		$id= $request->get("id");
		$list=\DB::table("jiugou")->where("id",$tid)->first();
		session(["list"=>$list]);
		$model=\DB::table("goupiaoorder")->where("id",$id)->first();
		session(["model"=>$model]);
		//var_dump($list);
		//var_dump($model);
		return view('goupiao.hotelpay');
	}	
}


