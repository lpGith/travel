<?php

namespace App\Http\Controllers\Admin\goupiao;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

use Symfony\Component\HttpFoundation\File\UploadedFile;

use Intervention\Image\ImageManagerStatic as Image;

class GoupiaoControllerdetailhotel extends Controller
{
    public function index(request $request)
    {	$list=\DB::table("jiugou")->get();
		 
		//var_dump($data);
		$db = \DB::table("jiugoudetail");
        //判断并封装搜索条件
        $where = [];
        if($request->has("jiugoudetail_sheshi")){
            $jiugoudetail_sheshi = $request->input("jiugoudetail_sheshi");
            $db->where("jiugoudetail_sheshi","like","%{$jiugoudetail_sheshi}%");
            $where['jiugoudetail_sheshi'] = $jiugoudetail_sheshi;
        }
		$data=$db->paginate(4);
        return view('admin.goupiaodetail.hotelindex',["data"=>$data,"list"=>$list,"where"=>$where]);
    }
    
	public function create()
    {
        return view('admin.goupiaodetail.hoteladd');
    }
	
	
	 //执行添加
	public function store(request $request)
	{
		//获取数据
		$data=$request->except("_token");
		//$file=$request->file("jiugoudetail_picname");
		//dd($file);
		for($i=1;$i<3;$i++){
			//判断是否有上传
			if($request->hasFile("jiugoudetail_picname{$i}")){
				//获取上传信息
				$file = $request->file("jiugoudetail_picname{$i}");
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
					$data["jiugoudetail_picname{$i}"]=$name;
				}
			}
		}
		
		//var_dump($data);
		
		//执行添加
		$id=\DB::table("jiugoudetail")->insertGetId($data);
		if($id>0){
			echo "<script>alert('添加成功！')</script>";
		}else{
			echo "<script>alert('添加失败！')</script>";
		}
		return redirect('/admin/goupiaodetailhotel');
		
	}
	
	//加载修改列表
	public function edit($id)
	{
		//获取数据
		$data=\DB::table("jiugou")->get();
		$list=\DB::table("jiugoudetail")->where("id",$id)->first();
		return view("admin.goupiaodetail.hoteledit",["xx"=>$list,"data"=>$data]);
	}
	
	//执行修改
	public function update($id,request $request)
	{
		//获取数据
		$data=$request->except("_token","_method");
		$list=\DB::table("jiugoudetail")->where("id",$id)->first();
		$pic[1]=$list->jiugoudetail_picname1;
		$pic[2]=$list->jiugoudetail_picname2;
	for($i=1;$i<3;$i++){
		 //判断是否有上传
        if($request->hasFile("jiugoudetail_picname{$i}")){
            //获取上传信息
            $file = $request->file("jiugoudetail_picname{$i}");
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
				$data["jiugoudetail_picname{$i}"]=$name;
				 @unlink("./uploads/".$pic["{$i}"]);
				 @unlink("./admins/uploads/s_".$pic["{$i}"]);
            }
        }else{
		$data["jiugoudetail_picname{$i}"]=$pic["{$i}"];	 
		}	
	}
	//var_dump($data);
	
		$id=\DB::table("jiugoudetail")->where("id",$id)->update($data);
			if($id){		
				echo "<script>alert('修改成功！')</script>";			
			}else{
				echo "<script>alert('修改失败！')</script>";
			}
			return redirect('/admin/goupiaodetailhotel');
	}
}
