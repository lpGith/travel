<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

use Intervention\Image\ImageManagerStatic as Image;

class BlogAdminController extends Controller
{
    public function index(Request $request)
	{
		$db = \DB::table("post");
		$where = [];
        if($request->has("name")){
            $name = $request->input("name");
            $db->where("post_title","like","%{$name}%");
            $where['name'] = $name;
        }
		$list = $db->paginate(2);
		return view("admin.blog.admin_blogp")->with(['list'=>$list,"where"=>$where]);
	}
	public function del($id)
	{
		\DB::table("post")->where("post_id","=",$id)->delete();
		\DB::table("comment")->where("comment_pid","=",$id)->delete();
		return redirect('/admin_blogp');
	}
	public function blogc(Request $request)
	{
		$db = \DB::table("comment");
		$where = [];
        if($request->has("name")){
            $name = $request->input("name");
            $db->where("comment_content","like","%{$name}%");
            $where['name'] = $name;
        }
		$list = $db->paginate(5);
		return view("admin.blog.admin_blogc")->with(['list'=>$list,"where"=>$where]);
	}
	public function delc($id)
	{
		\DB::table("comment")->where("comment_id","=",$id)->delete();
		return redirect('/admin_blogc');
	}
	public function links(Request $request)
	{
		$db = \DB::table("links");
		$where = [];
        if($request->has("name")){
            $name = $request->input("name");
            $db->where("link_name","like","%{$name}%");
            $where['name'] = $name;
        }
		$list = $db->paginate(4);
		return view("admin.blog.admin_links")->with(['list'=>$list,"where"=>$where]);
	}
	public function linkadd()
	{
		return view("admin.blog.linkadd");
	}
	public function linkdoadd(Request $request)
	{
		$link_time = date("Y-m-d h:i:s");
		$link_title =  $request->input("link_title");
		$link_name =  $request->input("link_name");
		$link_url =  $request->input("link_url");
		$data = ['link_id'=>NULL,'link_title'=>"{$link_title}","link_name"=>"{$link_name}","link_url"=>"{$link_url}","link_time"=>"{$link_time}"];
		$id = \DB::table("links")->insertGetId($data);
		return redirect('/admin_links');
		
	}
	public function linkedit($id)
	{
		$edit = \DB::table("links")->where("link_id","=",$id)->get();
		return view("admin.blog.linkedit")->with(["edit"=>$edit]);
	}
	public function linkdoedit(Request $request)
	{
		$id =  $request->input("link_id");
		$link_time = date("Y-m-d h:i:s");
		$link_title =  $request->input("link_title");
		$link_name =  $request->input("link_name");
		$link_url =  $request->input("link_url");
		\DB::table('links')
				->where('link_id',$id)
				->update(['link_time' =>"{$link_time}",'link_title'=>"{$link_title}","link_name"=>"{$link_name}","link_url"=>"{$link_url}"]);
				return redirect('/admin_links');
				
	}
	public function linkdel($id)
	{
		\DB::table('links')->where("link_id","=",$id)->delete();
		return redirect('/admin_links');
	}
	public function admin_blogpic()
	{
		$list = \DB::table("blog_pic")->paginate(4);
		return view("admin.blog.admin_blogpic")->with(["list"=>$list]);
	}
	public function blogpic_add()
	{
		return view("admin.blog.blogpic_add");
	}
	public function blogpic_doadd(Request $request)
	{
		$pic_time = date("Y-m-d h:i:s");
		$pic_title =$request->input("pic_title");
		$file = $request->file("pic_path");	
		if($file->isValid()){
	    $name = $file->getClientOriginalName(); //获取上传原文件名
	    $ext = $file->getClientOriginalExtension(); //获取上传文件名的后缀名
	    $post_pic = time().rand(1000,9999).".".$ext;
	    //执行移动上传文件
	    $file->move("./blogpic_uploads/",$post_pic);
	      //使用第三插件执行图片缩放
        $img = Image::make("./blogpic_uploads/".$post_pic)->resize(400,400,function($constraint){
        	$constraint->aspectRatio();
            $constraint->upsize();
        });
        $img->save("./blogpic_uploads/s_".$post_pic); 
            }
	$data = (["pic_id"=>NULL,"pic_time"=>"{$pic_time}","pic_title"=>"{$pic_title}","pic_path"=>"{$post_pic}"]);
	$id = \DB::table("blog_pic")->insertGetId($data);
	return redirect('/admin_blogpic');
	}
	public function delpic($id)
	{
		$path = \DB::table('blog_pic')->where("pic_id","=",$id)->value('pic_path');
		@unlink('./blogpic_uploads/'.$path);
		@unlink('./blogpic_uploads/s_'.$path);
		\DB::table('blog_pic')->where("pic_id","=",$id)->delete();
		return redirect('/admin_blogpic');
	}
	public function blogpic_edit($id)
	{
		$pic_edit = \DB::table('blog_pic')->where("pic_id","=",$id)->get();
		return view("admin.blog.blogpic_edit")->with(["pic_edit"=>$pic_edit]);
		
	}
	public function blogpic_doedit(Request $request)
	{
		$id = $request->input("pic_id");
		$pic_time = date("Y-m-d h:i:s");
		$pic_title =$request->input("pic_title");
		if($file = $request->file("pic_path")){
			$path = \DB::table('blog_pic')->where("pic_id","=",$id)->value('pic_path');
			@unlink('./blogpic_uploads/'.$path);
			@unlink('./blogpic_uploads/s_'.$path);
			$file = $request->file("pic_path");	
		if($file->isValid()){
	    $name = $file->getClientOriginalName(); //获取上传原文件名
	    $ext = $file->getClientOriginalExtension(); //获取上传文件名的后缀名
	    $post_pic = time().rand(1000,9999).".".$ext;
	    //执行移动上传文件
	    $file->move("./blogpic_uploads/",$post_pic);
	      //使用第三插件执行图片缩放
        $img = Image::make("./blogpic_uploads/".$post_pic)->resize(400,400,function($constraint){
        	$constraint->aspectRatio();
            $constraint->upsize();
        });
        $img->save("./blogpic_uploads/s_".$post_pic); 
            }
		\DB::table('blog_pic')
				->where('pic_id',$id)
				->update(["pic_time"=>"{$pic_time}","pic_title"=>"{$pic_title}","pic_path"=>"{$post_pic}"]);
				return redirect('/admin_blogpic');
		}else{
			$data = (["pic_time"=>"{$pic_time}","pic_title"=>"{$pic_title}"]);
			\DB::table('blog_pic')
				->where('pic_id',$id)
				->update(["pic_time"=>"{$pic_time}","pic_title"=>"{$pic_title}"]);
				return redirect('/admin_blogpic');
		}
	}
}
