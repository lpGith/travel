<?php

namespace App\Http\Controllers\admin\zhoubian;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Org\Image;
class ZouController extends Controller
{
    
    //����б���Ϣ
    public function index(Request $request)
    {
        $db = \DB::table("zou");
        //�жϲ���װ��������
        $where = [];
        if($request->has("zou_name")){
            $name = $request->input("zou_name");
            $db->where("zou_name","like","%{$name}%");
            $where['zou_name'] = $name;
        }  
        $list = $db->paginate(5);
        return view("admin.zhoubian.zou.index",["list"=>$list,"where"=>$where]);
    }
    
    //������ӱ�
     public function add()
    {
        return view("admin.zhoubian.zou.add");
    }
    
    //ִ�����
    public function insert(Request $request)
    {   
        $this->validate($request,[
            "zou_name"=>"required",
        ]);
        //�ж��Ƿ����ϴ�
        if($request->hasFile("mypic")){
            //��ȡ�ϴ���Ϣ
            $file = $request->file("mypic");
            //ȷ���ϴ����ļ��Ƿ�ɹ�
            if($file->isValid()){
                $picname = $file->getClientOriginalName(); //��ȡ�ϴ�ԭ�ļ���
                $ext = $file->getClientOriginalExtension(); //��ȡ�ϴ��ļ����ĺ�׺��
                //ִ���ƶ��ϴ��ļ�
                $pname = time().rand(1000,9999).".".$ext;
                $file->move("./admin_zhoubian/",$pname);
                $img = new Image();
                $img->open("./admin_zhoubian/".$pname)->thumb(100,100)->save("./admin_zhoubian/s_".$pname);
                $img->open("./admin_zhoubian/".$pname)->thumb(330,330)->save("./images/d_".$pname);
               
            }
        }
        $data = $request->only("zou_name","zou_describe","zou_content");
        $addtime = time();
        $data['id'] = null;
        $data['zou_addtime'] = $addtime;
        $data['zou_picname'] = $pname;
        $id = \DB::table("zou")->insertGetId($data);  
        return redirect("/admin/zhoubian/zou/index");
    }
    
    //ִ��ɾ��
    
    public function delete ($id)
    {   
        $list=\DB::table("zou")->where("id",$id)->get();
        $zou = get_object_vars($list[0]);
        $picname = $zou['zou_picname'];
        
        @unlink('./admin_zhoubian/'.$picname);
        @unlink('./admin_zhoubian/s_'.$picname);
        @unlink('./images/d_'.$picname);
        \DB::table("zou")->where("id",$id)->delete();
        return redirect("/admin/zhoubian/zou/index");
    }
    //�����޸ı�
    public function edit($id)
    {
        $zou = \DB::table("zou")->where("id",$id)->first();
        return view("/admin/zhoubian/zou/edit",["avo"=>$zou]);
    }
    
    //ִ���޸�
    public function update($id,Request $request)
    {   
      //�ж��Ƿ����ϴ�
        if($request->hasFile("mypic")){
            //��ȡ�ϴ���Ϣ
            $file = $request->file("mypic");
            //ȷ���ϴ����ļ��Ƿ�ɹ�
            if($file->isValid()){
                $picname = $file->getClientOriginalName(); //��ȡ�ϴ�ԭ�ļ���
                $ext = $file->getClientOriginalExtension(); //��ȡ�ϴ��ļ����ĺ�׺��
                //ִ���ƶ��ϴ��ļ�
                $pname = time().rand(1000,9999).".".$ext;
                $file->move("./admin_zhoubian/",$pname);
                $img = new Image();
                $img->open("./admin_zhoubian/".$pname)->thumb(100,100)->save("./admin_zhoubian/s_".$pname);
                $img->open("./admin_zhoubian/".$pname)->thumb(330,330)->save("./images/d_".$pname);
               
                $data = $request->only("zou_name","zou_describe","zou_content");
                $data['zou_picname'] = $pname;
                $list=\DB::table("zou")->where("id",$id)->get();
                $zou = get_object_vars($list[0]);
                $zou_pname = $zou['zou_picname'];
           
                @unlink('./admin_zhoubian/'.$zou_pname);
                @unlink('./admin_zhoubian/s_'.$zou_pname);
                @unlink('./images/d_'.$zou_pname);
                \DB::table('zou')->where("id",$id)->update($data);  
            }
            
        }else{
            $data = $request->only("zou_name","zou_describe","zou_content");
            \DB::table('zou')->where("id",$id)->update($data);
        }
        
        return redirect("/admin/zhoubian/zou/index");
    }
    
}
