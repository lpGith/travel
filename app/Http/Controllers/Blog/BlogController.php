<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Intervention\Image\ImageManagerStatic as Image;

class BlogController extends Controller
{
	//----------------------首页面------------------------------------------------------------
    public function index(Request $request){
		$db = \DB::table("post");
		$where = [];
        if($request->has("name")){
            $name = $request->input("name");
            $db->where("post_title","like","%{$name}%");
            $where['name'] = $name;
        };
		$blog_list = $db
		->join('users',function($join){
    			$join->on('post.post_user_id','=','users.id');
    		})->paginate(6);
		$look_title = \DB::table("post")->orderby("post_prise","desc")->paginate(8);
		$links = \DB::table("links")->get();
		$blog_pic = \DB::table("blog_pic")->get();
		//var_dump($blog_list);
		return view('blog.blog_index')->with(['blog'=>$blog_list,"where"=>$where])->with(['look_title'=>$look_title])->with(['links'=>$links])->with(['pics'=>$blog_pic]);
	}
	//---------------------查看更多----------------------------------------------------------------------
	/*public function more($id){
		$first = \DB::table('post')->where('post.post_id','=',$id)
		->join('comment',function($join){
    			$join->on('post.post_user_id','=','comment.comment_pid');
    		})->get();
			if($first){
				return view('blog.blog_more')->with(['first'=>$first]);
			}else{
				$first = \DB::table('post')->where('post.post_id','=',$id)->get();
				return view('blog.blog_more')->with(['first'=>$first]);
			}
		}*/
		//-----------------------查看更多-------------------------------------------------------
		public function more($id)
		{
				$links = \DB::table("links")->get();
				$blog_pic = \DB::table("blog_pic")->get();
				$first = \DB::table('post')->where('post.post_id','=',$id)->get();
				\DB::table('post')->where('post.post_id','=',$id)->increment('post_number');
				$clist = \DB::table('comment')->where('comment.comment_pid','=',$id)
				->join('users',function($join){
					$join->on('comment.comment_cid','=','users.id');
				})->get();
				$look_title = \DB::table("post")->orderby("post_prise","desc")->paginate(8);
				//-----------------------------回复查询--------------------------------------------
				/*$replayp = \DB::table('replay')->where('replay.replay_pid','=',$id)
				->join('users',function($join){
					$join->on('replay.replay_uid','=','users.id');
				})->orderby('replay_id','asc')->get();
				$replayc = \DB::table('replay')->where('replay.replay_pid','=',$id)
				->join('users',function($join){
					$join->on('replay.replay_cid','=','users.id');
				})->orderby('replay_id','asc')->get();
				$look_title = \DB::table("post")->orderby("post_prise","desc")->paginate(8);
				return view('blog.blog_more')->with(['first'=>$first])->with(['comment'=>$clist])->with(['look_title'=>$look_title])->with(['replayp'=>$replayp])->with(['replayc'=>$replayc]);*/
				return view('blog.blog_more')->with(['first'=>$first])->with(['comment'=>$clist])->with(['look_title'=>$look_title])->with(['pics'=>$blog_pic])->with(['links'=>$links]);
			}
		//-----------------------发帖------------------------------------------------------------
			public function create()
			{	
				$links = \DB::table("links")->get();
				$blog_pic = \DB::table("blog_pic")->get();
				$look_title = \DB::table("post")->orderby("post_prise","desc")->paginate(8);
				return view('blog.blog_add')->with(['look_title'=>$look_title])->with(['pics'=>$blog_pic])->with(['links'=>$links]);
			}
			public function store(Request $request)
			{
				$post_user_id = (session("user")->id);
				$post_time = date("Y-m-d h:i:s");
				$post_content = $request->input("post_content");
				$post_title = $request->input("post_title");
		//--------------------------帖子图片处理----------------------------------------------------------------	
		$file = $request->file("post_pic");	
		if($file->isValid()){
	    $name = $file->getClientOriginalName(); //获取上传原文件名
	    $ext = $file->getClientOriginalExtension(); //获取上传文件名的后缀名
	    $post_pic = time().rand(1000,9999).".".$ext;
	    //执行移动上传文件
	    $file->move("./blog_uploads/",$post_pic);
	      //使用第三插件执行图片缩放
        $img = Image::make("./blog_uploads/".$post_pic)->resize(400,400,function($constraint){
        	$constraint->aspectRatio();
            $constraint->upsize();
        });
        $img->save("./blog_uploads/s_".$post_pic); 
            }
        //echo $post_time.":".$post_pic.":".$post_content.":";
        $data = ["post_id"=>NULL,"post_title"=>"{$post_title}","post_pic"=>"{$post_pic}","post_content"=>"{$post_content}","post_time"=>"{$post_time}","post_user_id"=>"{$post_user_id}"];
        //var_dump($data);
        $id = \DB::table("post")->insertGetId($data);
		return redirect('/blog');
		}
		//-------------------------最新--------------------------------------------------------
		  public function news(Request $request)
		  {
			  $blog_pic = \DB::table("blog_pic")->get();
			$db = \DB::table("post");
		$where = [];
        if($request->has("name")){
            $name = $request->input("name");
            $db->where("post_title","like","%{$name}%");
            $where['name'] = $name;
        };
		$links = \DB::table("links")->get();
		$blog_list = $db
		->join('users',function($join){
    			$join->on('post.post_user_id','=','users.id');
    		})->orderby('post_time','desc')->paginate(6);
			$look_title = \DB::table("post")->orderby("post_prise","desc")->paginate(8);
		return view('blog.blog_index')->with(['blog'=>$blog_list,"where"=>$where])->with(['look_title'=>$look_title])->with(['links'=>$links])->with(['pics'=>$blog_pic]);
	}
	//-----------------------------最热-----------------------------------------------------------
	public function hot(Request $request)
		  {
		$blog_pic = \DB::table("blog_pic")->get();
		$links = \DB::table("links")->get();
		$db = \DB::table("post");
		$where = [];
        if($request->has("name")){
            $name = $request->input("name");
            $db->where("post_title","like","%{$name}%");
            $where['name'] = $name;
        };
		$blog_list = $db
		->join('users',function($join){
    			$join->on('post.post_user_id','=','users.id');
    		})->orderby('post_number','desc')->paginate(6);
			$look_title = \DB::table("post")->orderby("post_prise","desc")->paginate(8);
		return view('blog.blog_index')->with(['blog'=>$blog_list,"where"=>$where])->with(['look_title'=>$look_title])->with(['links'=>$links])->with(['pics'=>$blog_pic]);
	}
	
	}
