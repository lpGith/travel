<?php
namespace App\Http\Controllers\Admin\jingdian;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;

class GoodsController extends Controller
{
    public function index(Request $request)
    {	 $db = DB::table("jingdiandetail");
        //判断并封装搜索条件
        $where = [];
        if($request->has("jingdian_tuming")){
            $jingdian_tuming = $request->input("jingdian_tuming");
            $db->where("jingdian_tuming","like","%{$jingdian_tuming}%");
            $where['jingdian_tuming'] = $jingdian_tuming;
        }
		$list=$db->orderBy("id","asc")->paginate(9); 
        return view('admin.jingdiangoods.index',["list"=>$list,"where"=>$where]);
    }
	
	public function create()
    {	$list=\DB::select("select * from jingdian_type order by concat(path,id)"); 
		return view("admin.jingdiangoods.add",["list"=>$list]);
       
    }
	
	//执行添加
    public function store(Request $request)
    {
		//获取表单信息
		$data=$request->except("_token");
		
		//判断是否有上传
        if($request->hasFile("jingdian_picname")){
            //获取上传信息
            $file = $request->file("jingdian_picname");
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
		$data['jingdian_picname']=$name;
		//var_dump($data);
		
		//执行添加
		$id=\DB::table("jingdiandetail")->insertGetId($data);
		if($id>0){
			echo "<script>alert('添加成功！')</script>";
		}else{
			echo "<script>alert('添加失败！')</script>";
		}
		return redirect('/admin/jingdiandetail');
		
    }
	
	//加载修改列表
	public function edit($id)
	{
		//获取数据
		$data=\DB::table("jingdiandetail")->where("id",$id)->first();
		$list=\DB::select("select * from jingdian_type order by concat(path,id)"); 
		//var_dump($list);
		//var_dump($data);
		return view("admin.jingdiangoods.edit",["xx"=>$data,"list"=>$list]);
	}
	
	//执行修改
	public function update($id,request $request)
	{
		//获取数据
		$data=$request->except("_token","_method");
		$list=\DB::table("jingdiandetail")->where("id",$id)->first();
		$pic=$list->jingdian_picname;
		 //判断是否有上传
        if($request->hasFile("jingdian_picname")){
            //获取上传信息
            $file = $request->file("jingdian_picname");
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
				$data["jingdian_picname"]=$name;
				@unlink("./uploads/".$pic);
				@unlink("./admins/uploads/s_".$pic);
            }
        }else{
			$data["jingdian_picname"]=$pic;	 
		}	
	
	//var_dump($data);
	
		$id=\DB::table("jingdiandetail")->where("id",$id)->update($data);
			if($id){		
				echo "<script>alert('修改成功！')</script>";			
			}else{
				echo "<script>alert('修改失败！')</script>";
			}
			return redirect('/admin/jingdiandetail');
	}

}
