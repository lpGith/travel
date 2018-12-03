<?php

namespace App\Http\Controllers\Admin\zhoubian;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

class ZbController extends Controller
{
    //在线编辑器图片上传
    
    public function upload(Request $request)
    {
        //判断是否有上传
        if($request->hasFile("upload")){
            //获取上传信息
            $file = $request->file("upload");
            //确认上传的文件是否成功
            if($file->isValid()){
                $ext = $file->getClientOriginalExtension(); //获取上传文件名的后缀名
                //执行移动上传文件
                $filename = time().rand(1000,9999).".".$ext;
                $file->move("./images/xq/",$filename);
                
       
                $str = "<script type=\"text/javascript\">
                            window.parent.CKEDITOR.tools.callFunction(".$request->input("CKEditorFuncNum").",'".URL("/")."/images/xq/".$filename."', '上传成功');
                        </script>";
                return response($str);

            }
        }
    }
    
    
}
