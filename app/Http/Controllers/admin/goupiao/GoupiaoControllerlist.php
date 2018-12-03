<?php

namespace App\Http\Controllers\Admin\goupiao;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

use Symfony\Component\HttpFoundation\File\UploadedFile;

use Intervention\Image\ImageManagerStatic as Image;

class GoupiaoControllerlist extends Controller
{
    public function index()
    {
		$list=\DB::table("goupiaolist")->get(); 
        return view('admin.goupiaolist.index',["list"=>$list]);
    }
    
	public function create()
    {
        return view('admin.goupiaolist.add');
    }
	
	
	 //执行添加
	public function store(request $request)
	{
		//获取数据
		$data=$request->except("_token");
		//$file=$request->file("list_picname");
		//dd($file);
		
		//判断是否有上传
        if($request->hasFile("list_picname")){
            //获取上传信息
            $file = $request->file("list_picname");
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
		$data['list_picname']=$name;
		//var_dump($data);
		
		//执行添加
		$id=\DB::table("goupiaolist")->insertGetId($data);
		if($id>0){
			echo "<script>alert('添加成功！')</script>";
		}else{
			echo "<script>alert('添加失败！')</script>";
		}
		return redirect('/admin/goupiaolist');
		
	}
	
	
	//执行修改
	public function update($id,request $request)
	{
		//获取数据
		$data=$request->except("_token","_method");
		$list=\DB::table("goupiaolist")->where("id",$id)->first();
		$pic=$list->list_picname;
		 //判断是否有上传
        if($request->hasFile("list_picname")){
            //获取上传信息
            $file = $request->file("list_picname");
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
				$data["list_picname"]=$name;
				@unlink("./uploads/".$pic);
				@unlink("./admins/uploads/s_".$pic);
            }
        }else{
			$data["list_picname"]=$pic;	 
		}	
	
	//var_dump($data);
	
		$id=\DB::table("goupiaolist")->where("id",$id)->update($data);
			if($id){		
				echo "<script>alert('修改成功！')</script>";			
			}else{
				echo "<script>alert('修改失败！')</script>";
			}
			return redirect('/admin/goupiaolist');
	
	}
}
