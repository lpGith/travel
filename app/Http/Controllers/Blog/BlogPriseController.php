<?php

namespace App\Http\Controllers\blog;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BlogPriseController extends Controller
{
	public function stroe(Request $request)
	{
		$id = $request->input("post_id");
		\DB::table('post')->where('post.post_id','=',$id)->increment('post_prise');
	}
}

