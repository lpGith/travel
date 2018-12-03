<?php

namespace App\Http\Controllers\Admin\goupiao;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

use Symfony\Component\HttpFoundation\File\UploadedFile;

use Intervention\Image\ImageManagerStatic as Image;

class GoupiaoController1 extends Controller
{
    public function index()
    {	$data=\DB::table("goupiao")->get();
		$list=\DB::table("goupiaopic")->get(); 
        return view('admin.goupiao1.index',["list"=>$list,"data"=>$data]);
    }
    
	 public function create()
    {
        return view('admin.goupiao1.add');
    }
	//执行添加
	public function store(request $request)
	{
		//获取数据
		$data=$request->except("_token");
		//$file=$request->file("pic_picname");
		//dd($file);
		
		//判断是否有上传
        if($request->hasFile("pic_picname")){
            //获取上传信息
            $file = $request->file("pic_picname");
            //确认上传的文件是否成功
            if($file->isValid()){
                $picname = $file->getClientOriginalName(); //获取上传原文件名
                $ext = $file->getClientOriginalExtension(); //获取上传文件名的后缀名
                //执行移动上传文件
				$name=time().rand(1000,9999).".".$ext;
                $file->move("./uploads/",$name);
				//$img = new Img();
				//$img->open("./uploads/".$name)->thumb(200,200)->aa("./uploads/s_".$name);
				$img=Image::make("./uploads/".$name)->resize(null,30,function ($constraint) {
                                    $constraint->aspectRatio();
                                    $constraint->upsize();
                                });
				$img->save("./admins/uploads/s_".$name);
            }
        }
		$data['pic_picname']=$name;
		//var_dump($data);
		//执行添加
		$id=\DB::table("goupiaopic")->insertGetId($data);
		if($id>0){
			echo "<script>alert('添加成功！')</script>";
		}else{
			echo "<script>alert('添加失败！')</script>";
		}
		return redirect('/admin/goupiao1');
		
	}
	
	 //加载修改列表
	public function edit($id,request $request)
	{
		//获取数据
		$tid=$request->get("tid");
		if($tid==1){
			$model=\DB::table("tuangou")->get();
		}elseif($tid==2){
			$model=\DB::table("goupiaolist")->get();
		}elseif($tid==3){
			$model=\DB::table("jiugou")->get();
		}
		$data=\DB::table("goupiao")->get();
		$list=\DB::table("goupiaopic")->where("id",$id)->first();
		//var_dump($list);
		return view("admin.goupiao1.edit",["xx"=>$list,"data"=>$data,"model"=>$model]);
	}
	
	//执行修改
	public function update($id,request $request)
	{
		//获取数据
		
		//获取描述
		$mid=$request->get("pic_miaoshu");
		//获取类别
		$tid=$request->get("pic_typeid");
		if($tid==1){
			$model=\DB::table("tuangou")->where("id",$mid)->first();
			$pic=$model->tuangou_picname;
			$data["pic_miaoshu"]=$model->tuangou_name;
			$data["pic_id"]=$model->id;
		}elseif($tid==2){
			$model=\DB::table("goupiaolist")->where("id",$mid)->first();
			$pic=$model->list_picname;
			$data["pic_miaoshu"]=$model->list_name;
			$data["pic_id"]=$model->id;
		}elseif($tid==3){
			$model=\DB::table("jiugou")->where("id",$mid)->first();
			$pic=$model->jiugou_picname;
			$data["pic_miaoshu"]=$model->jiugou_name;
			$data["pic_id"]=$model->id;
		}
		//获取价格
		$price=$request->get("pic_price");
		//获取活动
		$huodong=$request->get("pic_huodong");
		$data["pic_typeid"]=$tid;
		$data["pic_huodong"]=$huodong;
		$data["pic_price"]=$price;
		
		
		
		 //判断是否有上传
        if($request->hasFile("pic_picname")){
            //获取上传信息
            $file = $request->file("pic_picname");
            //确认上传的文件是否成功
            if($file->isValid()){
                $picname = $file->getClientOriginalName(); //获取上传原文件名
                $ext = $file->getClientOriginalExtension(); //获取上传文件名的后缀名
                //执行移动上传文件
				$name=time().rand(1000,9999).".".$ext;
                $file->move("./uploads/",$name);
				//$img = new Img();
				//$img->open("./uploads/".$name)->thumb(200,200)->aa("./uploads/s_".$name);
				$img=Image::make("./uploads/".$name)->resize(null,30,function ($constraint) {
                                    $constraint->aspectRatio();
                                    $constraint->upsize();
                                });
				$img->save("./admins/uploads/s_".$name);
				$data["pic_picname"]=$name;
				//@unlink("./uploads/".$pic);
				//@unlink("./uploads/s_".$pic);
            }
        }else{
			$data["pic_picname"]=$pic;	 
		}	
	
	//var_dump($data);
	
		$id=\DB::table("goupiaopic")->where("id",$id)->update($data);
			if($id){		
				echo "<script>alert('修改成功！')</script>";			
			}else{
				echo "<script>alert('修改失败！')</script>";
			}
			return redirect('/admin/goupiao1');
		
	}
}
