<?php

namespace App\Http\Controllers\Admin\qiantai;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

use Symfony\Component\HttpFoundation\File\UploadedFile;

use Intervention\Image\ImageManagerStatic as Image;

class QiantaiController extends Controller
{
    public function index()
    {	
		$list=\DB::table("index_edit")->where("id",1)->first();
        return view('admin.qiantai_index.index',["list"=>$list]);
    }
	
	//执行修改
	public function edit(request $request)
	{
		$data = $request->except("_token");
        //dd($data);
        $id = \DB::table("index_edit")->where("id",1)->update($data);
        if($id){
          return $this->index();
        }else{
           echo  "修改失败！";
        }	
	}
	public function lunbo()
    {	
		$list=\DB::table("index_lunbo")->get();
        return view('admin.qiantai_index.indexlunbo',["list"=>$list]);
    }
	
	//执行轮播图片添加
	public function lunboadd(request $request)
	{
		//获取数据
		$data=$request->except("_token");
		//$file=$request->file("lunbo_picname");
		//dd($file);
		
		//判断是否有上传
        if($request->hasFile("lunbo_picname")){
            //获取上传信息
            $file = $request->file("lunbo_picname");
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
		$data['lunbo_picname']=$name;
		//var_dump($data);
		
		//执行添加
		$id=\DB::table("index_lunbo")->insertGetId($data);
		if($id>0){
			echo "<script>alert('添加成功！')</script>";
		}else{
			echo "<script>alert('添加失败！')</script>";
		}
		return redirect('/admin/indexlunbo');
		
	}
	
	//执行修改
	public function lunboedit($id,request $request)
	{
		
		//获取数据
		$data=$request->except("_token");
		
		$list=\DB::table("index_lunbo")->where("id",$id)->first();
		$pic=$list->lunbo_picname;
		 //判断是否有上传
        if($request->hasFile("lunbo_picname")){
            //获取上传信息
            $file = $request->file("lunbo_picname");
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
				$data["lunbo_picname"]=$name;
				@unlink("./uploads/".$pic);
				@unlink("./admins/uploads/s_".$pic);
            }
        }else{
			$data["lunbo_picname"]=$pic;	 
		}	
	
	//var_dump($data);
	
		$id=\DB::table("index_lunbo")->where("id",$id)->update($data);
			if($id){		
				echo "<script>alert('修改成功！')</script>";			
			}else{
				echo "<script>alert('修改失败！')</script>";
			}
			return redirect('/admin/indexlunbo');
	
	}
	
	public function lunbodelete($id,Request $request)
    {	
		$list=\DB::table("index_lunbo")->where("id",$id)->first();
		//var_dump($list);
		 $pic=$list->lunbo_picname;
		 
		@unlink("./uploads/".$pic);
		
		@unlink("./admins/uploads/s_".$pic);
        \DB::table("index_lunbo")->where("id",$id)->delete();
       
        return redirect("/admin/indexlunbo");
    }
	
	public function live()
    {	
		$list=\DB::table("index_live")->get();
        return view('admin.qiantai_index.live',["list"=>$list]);
    }
	
}
