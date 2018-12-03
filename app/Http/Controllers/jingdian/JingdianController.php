<?php
namespace App\Http\Controllers\jingdian;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class JingdianController extends Controller
{ 
	//浏览列表信息
	public function index()
	{	
		//图片轮播
		$lunbo=DB::table("index_lunbo")->get();
		//风景展示
		$list=DB::select("select * from index_edit where id=1");
		$data=DB::select("select * from jingdian_type where pid={$list[0]->pid} order by id asc");
		$data1=DB::select("select * from jingdiandetail where jingdian_typeid={$data[0]->id}");
		$data2=DB::select("select * from jingdiandetail where jingdian_typeid={$data[1]->id}");
		$data3=DB::select("select * from jingdiandetail where jingdian_typeid={$data[2]->id}");
		//$list=\DB::select("select * from jingdiandetail where jingdian_typeid in(17,18,19)");
		//生活图片展示
		$live=DB::table("index_live")->get();
		//景区新闻资讯公告展示
		$gonggao=DB::select("select * from bendi order by xinwen_clicknum desc limit 6");
		$xinwen=DB::select("select * from xinwen limit 6");
		$bendi=DB::select("select * from bendi limit 6");
		$jingqu=DB::select("select * from jingqu limit 6");
		//var_dump($xinwen);
		return view("jingdian.index",["list1"=>$data1,"data"=>$data,"list2"=>$data2,"list3"=>$data3,"model"=>$list,"lunbo"=>$lunbo,"live"=>$live,"xinwen"=>$xinwen,"bendi"=>$bendi,"jingqu"=>$jingqu,"gonggao"=>$gonggao]);	
	}	
	public function indexlist(request $request)
	{
		//id传值分别有 16（绝美风光） ，20（历史景观），47（文化艺术），51（户外休闲） 54（多彩生物）
		$id=$request->get("id");
		$list=DB::table("jingdian_type")->where("pid",$id)->get();
		//var_dump($list);
		//联表查询（获取详情表的所有和类别表的类别名）
		$data=DB::select(" select jingdiandetail.*,jingdian_type.jingdian_name from jingdiandetail,jingdian_type where jingdiandetail.jingdian_typeid=jingdian_type.id");
			//var_dump($data);
		//定义一个空数组	
		$info = array();
		//遍历
			foreach($data as $v){
				//循环同时获取类别的个数
				for($i=0;$i<count($list);$i++){
					//判断当详情表中的typeid等于类别表中的id时
					if($v->jingdian_typeid==$list[$i]->id){
						//以类别的个数作为下标（主要是为了游几个类别就循环几次）
						$info[$v->jingdian_typeid][]=$v;
					}
				}
			}
			//var_dump($info);
		$model=DB::table("jingdian_type")->where("pid",0)->get();
		for($i=0;$i<count($model);$i++){
			if($model[$i]->id==$id){
				$xx=$model[$i];
			}
		}

			//加载视图
			if($id==16){
				return view('jingdian.list16',["data"=>$info,"mm"=>$xx]);
			}elseif($id==20){
				return view('jingdian.list20',["data"=>$info,"mm"=>$xx]);
			}elseif($id==47){
				return view('jingdian.list47',["data"=>$info,"mm"=>$xx]);
			}elseif($id==51){
				return view('jingdian.list51',["data"=>$info,"mm"=>$xx]);
			}elseif($id==54){
				return view('jingdian.list54',["data"=>$info,"mm"=>$xx]);
			}
			
		
	}	
	
	public function indexdetail(request $request)
	{	 
		$id = $request->get("id");
		$uid = $request->get("uid");

		$model=DB::table("jingdiandetail")->where("id",$id)->first();
		$list=DB::table("jingdian_type")->where("pid",$uid)->get();
		//var_dump($list);
		//联表查询（获取详情表的所有和类别表的类别名）
		$data=DB::select(" select jingdiandetail.*,jingdian_type.jingdian_name from jingdiandetail,jingdian_type where jingdiandetail.jingdian_typeid=jingdian_type.id");
			//var_dump($data);
		//定义一个空数组	
		$info = array();
		//遍历
			foreach($data as $v){
				//循环同时获取类别的个数
				for($i=0;$i<count($list);$i++){
					//判断当详情表中的typeid等于类别表中的id时
					if($v->jingdian_typeid==$list[$i]->id){
						//以类别的个数作为下标（主要是为了游几个类别就循环几次）
						$info[$v->jingdian_typeid][]=$v;
					}
				}
			}
			
			//控制被选中的景点名
			$data1=DB::table("jingdian_type")->where("pid",0)->get();
			for($i=0;$i<count($data1);$i++){
				if($data1[$i]->id==$uid){
					$aa=$data1[$i];
				}
			}
			
			//控制被选择的类别名
			for($i=0;$i<count($list);$i++){
				if($list[$i]->id==$model->jingdian_typeid){
					$bb=$list[$i];
				}
			}
			
			//查询点赞次数最多的
			$totalnum = DB::select("select * from jingdiandetail where jingdian_typeid in (select id from jingdian_type where pid={$uid}) order by jingdian_num desc limit 8");
//		var_dump($totalnum);
		return view('jingdian.detail',["model"=>$model,"data"=>$info,"nn"=>$aa,"mm"=>$bb,"totalnum"=>$totalnum]);
		//return view('jingdian.detail');
		
	}
	
}


