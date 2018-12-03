<?php

namespace App\Http\Controllers\admin\zhoubian;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Org\Image;
class You_typeController extends Controller
{
    
    //����б���Ϣ
    public function index(Request $request)
    {
        $db = \DB::table("you_type");
        //�жϲ���װ��������
        $where = [];
        if($request->has("you_typename")){
            $name = $request->input("you_typename");
            $db->where("you_typename","like","%{$name}%");
            $where['you_typename'] = $name;
        }  
        $list = $db->paginate(5);
        return view("admin.zhoubian.you_type.index",["list"=>$list,"where"=>$where]);
    }
    
    //������ӱ�
     public function add()
    {
        return view("admin.zhoubian.you_type.add");
    }
    
    //ִ�����
    public function insert(Request $request)
    {   
        $this->validate($request,[
            "you_typename"=>"required",
            "mypic"=>"required",
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
        $data = $request->only("you_typename","you_typedescribe","you_typetime");
        $addtime = time();
        $data['id'] = null;
        $data['you_typeaddtime'] = $addtime;
        $data['you_typepicname'] = $pname;
        $id = \DB::table("you_type")->insertGetId($data);  
        return redirect("/admin/zhoubian/you_type/index");
    }
    
    //ִ��ɾ��
    
    public function delete ($id)
    {   
        $list=\DB::table("you_type")->where("id",$id)->get();
        $you_type = get_object_vars($list[0]);
        $picname = $you_type['you_typepicname'];
        @unlink('./admin_zhoubian/'.$picname);
        @unlink('./admin_zhoubian/s_'.$picname);
        @unlink('./images/d_'.$picname);
        \DB::table("you_type")->where("id",$id)->delete();
        return redirect("/admin/zhoubian/you_type/index");
    }
    //�����޸ı�
    public function edit($id)
    {
        $you_type = \DB::table("you_type")->where("id",$id)->first();
        return view("/admin/zhoubian/you_type/edit",["avo"=>$you_type]);
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
                $data = $request->only("you_typename","you_typedescribe","you_typetime");
                $data['you_typepicname'] = $pname;
                $list=\DB::table("you_type")->where("id",$id)->get();
                $you_type = get_object_vars($list[0]);
                $you_pname = $you_type['you_typepicname'];
                @unlink('./admin_zhoubian/'.$zhu_pname);
                @unlink('./admin_zhoubian/s_'.$zhu_pname);
                @unlink('./images/d_'.$zhu_pname);
                \DB::table('you_type')->where("id",$id)->update($data);  
            }
            
        }else{
            $data = $request->only("you_typename","you_typedescribe","you_typetime");
            \DB::table('you_type')->where("id",$id)->update($data);
        }
        
        return redirect("/admin/zhoubian/you_type/index");
    }
    
}
