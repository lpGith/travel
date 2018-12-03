<?php

namespace App\Http\Controllers\admin\zhoubian;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

use App\Org\Image;
class BiaoController extends Controller
{
    
    //浏览列表信息
    public function index(Request $request)
    {
        $list[0] = ['11','22',];
        $db = \DB::table('chi')->lists('chi_dianji');
        $list[1] = [array_sum($db),1];
        $db = \DB::table('zhu')->lists('zhu_dianji');
        $list[2] = [array_sum($db),1];
        $db = \DB::table('zou')->lists('zou_dianji');
        $list[3] = [array_sum($db),1];
        $db = \DB::table('wan')->lists('wan_dianji');
        $list[4] = [array_sum($db),1];
        $db = \DB::table('mai')->lists('mai_dianji');
        $list[5] = [array_sum($db),1];
        $db = \DB::table('you')->lists('you_dianji');
        $list[6] = [array_sum($db),1];
        //dd($list);
        return view("admin.zhoubian.biao.biao",["list"=>$list]);
    }
}
