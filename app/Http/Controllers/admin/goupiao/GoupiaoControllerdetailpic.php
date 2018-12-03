<?php

namespace App\Http\Controllers\Admin\goupiao;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

use Symfony\Component\HttpFoundation\File\UploadedFile;

use Intervention\Image\ImageManagerStatic as Image;

class GoupiaoControllerdetailpic extends Controller
{
    public function index()
    {	$data=\DB::table("goupiaolist")->get();
		$list=\DB::table("goupiaodetailpic")->get(); 
        return view('admin.goupiaodetailpic.index',["list"=>$list,"data"=>$data]);
    }
    
	public function create()
    {
        return view('admin.goupiaodetailpic.add');
    }
	
	
	 //执行添加
	public function store(request $request)
	{
		//获取数据
		$data=$request->except("_token");
		//$file=$request->file("list_picname");
		//dd($file);
		for($i=1;$i<6;$i++){
			//判断是否有上传
			if($request->hasFile("detailpic_picname{$i}")){
				//获取上传信息
				$file = $request->file("detailpic_picname{$i}");
				//确认上传的文件是否成功
				if($file->isValid()){
					$picname = $file->getClientOriginalName(); //获取上传原文件名
					$ext = $file->getClientOriginalExtension(); //获取上传文件名的后缀名
					//执行移动上传文件	
					$name=time().rand(1000,9999).".".$ext;
					$file->move("./uploads/",$name);
					//$img = new Img();
					//$img->open("./uploads/".$name)->thumb(200,200)->aa("./uploads/s_".$name);
					$img=Image::make("./uploads/".$name)->resize(null,20,function ($constraint) {
										$constraint->aspectRatio();
										$constraint->upsize();
									});
					$img->save("./admins/uploads/s_".$name);
					$data["detailpic_picname{$i}"]=$name;
				}
			}
		}
		
		//var_dump($data);
		
		//执行添加
		$id=\DB::table("goupiaodetailpic")->insertGetId($data);
		if($id>0){
			echo "<script>alert('添加成功！')</script>";
		}else{
			echo "<script>alert('添加失败！')</script>";
		}
		return redirect('/admin/goupiaodetailpic');
		
	}
	
	
	//加载修改列表
	public function edit($id)
	{
		//获取数据
		$data=\DB::table("goupiaolist")->get();
		$list=\DB::table("goupiaodetailpic")->where("id",$id)->first();
		return view("admin.goupiaodetailpic.edit",["xx"=>$list,"data"=>$data]);
	}
	
	//执行修改
	public function update($id,request $request)
	{
		//获取数据
		$data=$request->except("_token","_method");
		$list=\DB::table("goupiaodetailpic")->where("id",$id)->first();
		$pic[1]=$list->tuangoudetail_picname1;
		$pic[2]=$list->tuangoudetail_picname2;
		$pic[3]=$list->tuangoudetail_picname3;
		$pic[4]=$list->tuangoudetail_picname4;
		$pic[5]=$list->tuangoudetail_picname5;
		
	for($i=1;$i<6;$i++){
		 //判断是否有上传
        if($request->hasFile("tuangoudetail_picname{$i}")){
            //获取上传信息
            $file = $request->file("tuangoudetail_picname{$i}");
            //确认上传的文件是否成功
            if($file->isValid()){
                $picname = $file->getClientOriginalName(); //获取上传原文件名
                $ext = $file->getClientOriginalExtension(); //获取上传文件名的后缀名
                //执行移动上传文件
				$name=time().rand(1000,9999).".".$ext;
                $file->move("./uploads/",$name);
				//$img = new Img();
				//$img->open("./uploads/".$name)->thumb(200,200)->aa("./uploads/s_".$name);
				$img=Image::make("./uploads/".$name)->resize(null,200,function ($constraint) {
                                    $constraint->aspectRatio();
                                    $constraint->upsize();
                                });
				$img->save("./uploads/s_".$name);
				$data["tuangoudetail_picname{$i}"]=$name;
				 @unlink("./uploads/".$pic["{$i}"]);
				 @unlink("./admins/uploads/s_".$pic["{$i}"]);
            }
        }else{
		$data["tuangoudetail_picname{$i}"]=$pic["{$i}"];	 
		}	
	}
	//var_dump($data);
	
		$id=\DB::table("goupiaodetailpic")->where("id",$id)->update($data);
			if($id){		
				echo "<script>alert('修改成功！')</script>";			
			}else{
				echo "<script>alert('修改失败！')</script>";
			}
			return redirect('/admin/goupiaodetailline');
	}
}
