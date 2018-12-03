<?php

namespace App\Http\Controllers\Admin\goupiao;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

class GoupiaodeleteController extends Controller
{
    
	 public function delete1(Request $request)
    {	$id=$request->get("id");
		
		$list=\DB::table("goupiao")->where("id",$id)->first();
		//var_dump($list);
		 $pic=$list->goupiao_picname;
		 
		@unlink("./uploads/".$pic);
		
		@unlink("./uploads/s_".$pic);
        \DB::table("goupiao")->where("id",$id)->delete();
       
        return redirect("/admin/goupiao");
    }
	
	 public function delete2(Request $request)
    {	$id=$request->get("id");
	
		$list=\DB::table("goupiaopic")->where("id",$id)->first();
		//var_dump($list);
		 $pic=$list->pic_picname;
		 
		@unlink("./uploads/".$pic);
		
		@unlink("./uploads/s_".$pic);
        \DB::table("goupiaopic")->where("id",$id)->delete();
       
        return redirect("/admin/goupiao1");
    }
	public function delete3(Request $request)
    {	$id=$request->get("id");
		$list=\DB::table("goupiaolist")->where("id",$id)->first();
		//var_dump($list);
		 $pic=$list->list_picname;
		 
		@unlink("./uploads/".$pic);
		
		@unlink("./admins/uploads/s_".$pic);
        \DB::table("goupiaolist")->where("id",$id)->delete();
       
        return redirect("/admin/goupiaolist");
    }
	
	public function delete4(Request $request)
    {	$id=$request->get("id");
		$list=\DB::table("goupiaodetail")->where("id",$id)->first();
		//var_dump($list);
		$pic[1]=$list->detail_picname1;
		$pic[2]=$list->detail_picname2;
		$pic[3]=$list->detail_picname3;
		$pic[4]=$list->detail_picname4;
		$pic[5]=$list->detail_picname5;
		$pic[6]=$list->detail_picname6;
		for($i=1;$i<7;$i++){
			@unlink("./uploads/".$pic["{$i}"]);
			@unlink("./admins/uploads/s_".$pic["{$i}"]);
		}
		
        \DB::table("goupiaodetail")->where("id",$id)->delete();
       
        return redirect("/admin/goupiaodetail");
    }
	//酒店列表页删除
	public function delete5(Request $request)
    {	$id=$request->get("id");
		$list=\DB::table("jiugou")->where("id",$id)->first();
		//var_dump($list);
		$pic=$list->jiugou_picname;
	
		@unlink("./uploads/".$pic);
		@unlink("./admins/uploads/s_".$pic);
        \DB::table("jiugou")->where("id",$id)->delete();
       
        return redirect("/admin/goupiaolisthotel");
    }
	
	//酒店详情页删除
	public function delete6(Request $request)
    {	$id=$request->get("id");
		$list=\DB::table("jiugoudetail")->where("id",$id)->first();
		//var_dump($list);
		$pic1=$list->jiugoudetail_picname1;
		$pic2=$list->jiugoudetail_picname2;
	
		@unlink("./uploads/".$pic1);
		@unlink("./uploads/".$pic2);
		@unlink("./admins/uploads/s_".$pic1);
		@unlink("./admins/uploads/s_".$pic2);
        \DB::table("jiugoudetail")->where("id",$id)->delete();
       
        return redirect("/admin/goupiaodetailhotel");
    }
	
	//跟团游列表页页删除
	public function delete7(Request $request)
    {	$id=$request->get("id");
		$list=\DB::table("tuangou")->where("id",$id)->first();
		//var_dump($list);
		$pic1=$list->tuangou_picname;
		
	
		@unlink("./uploads/".$pic1);
		
		@unlink("./admins/uploads/s_".$pic1);
		
        \DB::table("tuangou")->where("id",$id)->delete();
       
        return redirect("/admin/goupiaolistline");
    }
	
	//跟团游详情页删除
	public function delete8(Request $request)
    {	$id=$request->get("id");
		$list=\DB::table("tuangoudetail")->where("id",$id)->first();
		//var_dump($list);
		$pic[1]=$list->tuangoudetail_picname1;
		$pic[2]=$list->tuangoudetail_picname2;
		$pic[3]=$list->tuangoudetail_picname3;
		$pic[4]=$list->tuangoudetail_picname4;
		$pic[5]=$list->tuangoudetail_picname5;
		for($i=1;$i<6;$i++){
			@unlink("./uploads/".$pic["{$i}"]);
			@unlink("./admins/uploads/s_".$pic["{$i}"]);
		}
		
        \DB::table("tuangoudetail")->where("id",$id)->delete();
       
        return redirect("/admin/goupiaodetailline");
    }
	//门票详情页图片删除
	public function delete9(Request $request)
    {	$id=$request->get("id");
		$list=\DB::table("goupiaodetailpic")->where("id",$id)->first();
		//var_dump($list);
		$pic[1]=$list->detailpic_picname1;
		$pic[2]=$list->detailpic_picname2;
		$pic[3]=$list->detailpic_picname3;
		$pic[4]=$list->detailpic_picname4;
		$pic[5]=$list->detailpic_picname5;
		for($i=1;$i<6;$i++){
			@unlink("./uploads/".$pic["{$i}"]);
			@unlink("./admins/uploads/s_".$pic["{$i}"]);
		}
		
        \DB::table("goupiaodetailpic")->where("id",$id)->delete();
       
        return redirect("/admin/goupiaodetailpic");
    }
	
	//景点删除页删除
	public function delete10(Request $request)
    {	$id=$request->get("id");
		//echo $id;
		
		$list=\DB::table("jingdiandetail")->where("id",$id)->first();
		//var_dump($list);
		$pic1=$list->jingdian_picname;
		
	
		@unlink("./uploads/".$pic1);
		
		@unlink("./admins/uploads/s_".$pic1);
		
        \DB::table("jingdiandetail")->where("id",$id)->delete();
       
        return redirect("/admin/jingdiandetail");
		
    }
	
	
	public function delete11(Request $request)
    {	$id=$request->get("id");
		$list=\DB::table("goupiaoorder")->where("id",$id)->first();
		//var_dump($list);
		
		
        \DB::table("goupiaoorder")->where("id",$id)->delete();
       
        return redirect("/admin/order");
    }
}
