<?php
namespace App\Http\Controllers\goupiao;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class GoupiaoController extends Controller
{ 
	//浏览列表信息
	public function index()
	{
	    $list=DB::table("goupiao")->get();
		$data=DB::select("select p.*,g.* from goupiaopic p,goupiao g where p.pic_typeid=g.id");
//		var_dump($data);
		 $info=array();
		foreach($data as $v){
			for($i=0;$i<count($list);$i++){
				if($list[$i]->id==$v->pic_typeid){
					$info[$i][]=$v;
				}
			}
		}
		//var_dump($info);	
		return view('goupiao.index',["info"=>$info,"list"=>$list]);
	}	
	public function indexlist(request $request)
	{		
		//$list=\DB::table("goupiaolist")->get();
		$place=[0=>"",1=>"张家界",2=>"凤凰",3=>"长沙"];
		$umodel=[0=>"",1=>"AAAAA",2=>"AAAA",3=>"未评级"];
		$pmodel=[0=>"",1=>"100",2=>"200",3=>"300"];
		$db=DB::table("goupiaolist");
		
		if($request->has("id")){
			if(empty(session("uid"))){
				$list_pingji=$umodel[0];
				//$where['list_pingji']=$list_pingji;
				$list_address=$place[$request->input("id")];
				$db->where("list_address","like","%{$list_address}%");
				//$where['list_address']=$list_address;
				session(["id"=>$request->input("id")]);
			}else{
				$list_pingji=$umodel[session("uid")];
				//$where['list_pingji']=$list_pingji;
				if(session("uid")==0){
					$list_address=$place[$request->input("id")];
					$db->where("list_address","like","%{$list_address}%");
					//$where['list_address']=$list_address;
					session(["id"=>$request->input("id")]);
				}else{
					$list_address=$place[$request->input("id")];
					$db->where("list_address","like","%{$list_address}%")->where("list_pingji","=",$list_pingji);
					//$where['list_address']=$list_address;
					session(["id"=>$request->input("id")]);
				}
			}
		}
		if($request->has("uid")){
			if(empty(session("id"))){
				$list_address=$place[0];
				if($request->input("uid")==0){
					$list_pingji=$umodel[$request->input("uid")];
					$db->where("list_address","like","%{$list_address}%");
					//$where['list_pingji']=$list_pingji;
					session(["uid"=>$request->input("uid")]);
				}else{
					$list_pingji=$umodel[$request->input("uid")];
					$db->where("list_pingji","=",$list_pingji)->where("list_address","like","%{$list_address}%");
					//$where['list_pingji']=$list_pingji;
					session(["uid"=>$request->input("uid")]);
				}
				
			}else{
				$list_address=$place[session("id")];
				if($request->input("uid")==0){
					$list_pingji=$umodel[$request->input("uid")];
					$db->where("list_address","like","%{$list_address}%");
					//$where['list_pingji']=$list_pingji;
					session(["uid"=>$request->input("uid")]);
				}else{
					$list_pingji=$umodel[$request->input("uid")];
					$db->where("list_pingji","=",$list_pingji)->where("list_address","like","%{$list_address}%");
					//$where['list_pingji']=$list_pingji;
					session(["uid"=>$request->input("uid")]);
				}
				
			}
		}
		
//		var_dump($where);
		//查询所有数据
		$list=$db->paginate(9);
		$model=DB::table("goupiaolist")->get();
		return view('goupiao.list',["list"=>$list,"model"=>$model]);
	}	
	
	public function indexdetail(request $request)
	{
	    $id = $request->input("id");
		$list=DB::table("goupiaolist")->where("id",$id)->first();
		$data=DB::table("goupiaodetail")->where("detail_typeid",$id)->first();
		$pic=DB::table("goupiaodetailpic")->where("detailpic_typeid",$id)->first();
		//var_dump($data);
		return view('goupiao.detail_goupiao',["list"=>$list,"data"=>$data,"pic"=>$pic]);
	}

	public function indexpay(request $request)
	{	
		
		$id = $request->input("id");	
		$list=DB::table("goupiaolist")->where("id",$id)->first();
		$data=DB::table("goupiaodetail")->where("detail_typeid",$id)->first();
		//$pic=\DB::table("goupiaodetailpic")->where("detailpic_typeid",$id)->first();
		//var_dump($data);
		$model=[];
		for($i=0;$i<7;$i++){
			$model[$i]=date("Y-m-d",strtotime("+{$i} day"));
		}
//		var_dump($model);
		return view('goupiao.order',["list"=>$list,"data"=>$data,"model"=>$model]);
	}	
	//付款
	public function indexdopay(request $request)
	{	
		$data = $request->except("_token");
//		var_dump($data);
		$data['pay_addtime']=time();
		//执行添加数据
		$id=DB::table("goupiaoorder")->insertGetId($data);
		$tid= $request->input("tid");
		$list=DB::table("goupiaolist")->where("id",$tid)->first();
		session(["list"=>$list]);
		$model=DB::table("goupiaoorder")->where("id",$id)->first();
		session(["model"=>$model]);
		//var_dump($list);
		//var_dump($model);
		return view('goupiao.pay');
	}	
	//ajax验证
	public function indexajax(request $request)
	{	
		$password = $request->get("upass");
		//echo $password;
		//session("password");
		$pass=session("user")->password;
		if(Md5($password)==$pass){
			echo "yes";
		}else{
			echo "no";
		}
		
	}	
	
	
	//付款完成后的
	public function indexsendmail(request $request)
	{	

		$id = $request->get("id");
		$uid = $request->get("uid");
			//邮件发送
			$is_email = false; //关闭邮件
			$email = 'lpkingMail@163.com';
			if($is_email){
				$email=session('user')->email;
				$user = ["email"=>"{$email}","name"=>"hello"];
				\Mail::send('admin.goupiao.add', ['user' => $user], function ($m) use ($user) {
					$m->from('lpkingMail@163.com', '');
					$m->to($user['email'], $user['name'])->subject('Your Reminder!');
				});
			}
			DB::select("update goupiaoorder set pay_state=2,pay_email='{$email}' where id={$uid}");
			$model=DB::table("goupiaoorder")->where("id",$uid)->first();
			$list=DB::table("goupiaolist")->where("id",$id)->first();
			$data=DB::select("select * from goupiaolist limit 5");
			return view("goupiao.orderdetail",["model"=>$model,"list"=>$list,"data"=>$data]);
	}
	
	//订单中心订单
	public function centerorder()
	{	$id=session("user")->id;
		$list=DB::select("select * from goupiaoorder where pay_typeid={$id} order by id desc");
		return view("goupiao.centerorder",["list"=>$list]);
	}	
	//订单中心付款
	public function orderpay(request $request)
	{	
		$tid= $request->get("tid");
		$id= $request->get("id");
		$list=DB::table("goupiaolist")->where("id",$tid)->first();
		session(["list"=>$list]);
		$model=DB::table("goupiaoorder")->where("id",$id)->first();
		session(["model"=>$model]);
		//var_dump($list);
		//var_dump($model);
		return view('goupiao.pay');
	}	
}


