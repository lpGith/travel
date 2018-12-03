<?php

namespace App\Http\Controllers\admin\zhoubian;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Org\Image;
class YouController extends Controller
{
    
    //����б���Ϣ
    public function index(Request $request)
    {
        $db = \DB::table("you")
                   ->join('you_type', 'you.you_typeid', '=', 'you_type.id')
                   ->select('you.*','you_type.you_typename');
        //�жϲ���װ��������
        $where = [];
        if($request->has("you_name")){
            $name = $request->input("you_name");
            $db->where("you_name","like","%{$name}%");
            $where['you_name'] = $name;
        }  
        $list = $db->paginate(5);
        return view("admin.zhoubian.you.index",["list"=>$list,"where"=>$where]);
    }
    
    //������ӱ�
     public function add()
    {
        $list = \DB::table('you_type')->get();
        return view("admin.zhoubian.you.add",['list'=>$list]);
    }
    
    //ִ�����
    public function insert(Request $request)
    {   
        $this->validate($request,[
            "you_name"=>"required",
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
        $data = $request->only("you_name","you_price","you_content","you_typeid");
        $addtime = time();
        $data['id'] = null;
        $data['you_addtime'] = $addtime;
        $data['you_picname'] = $pname;
        $id = \DB::table("you")->insertGetId($data);  
        return redirect("/admin/zhoubian/you/index");
    }
    
    //ִ��ɾ��
    
    public function delete ($id)
    {   
        $list=\DB::table("you")->where("id",$id)->get();
        $you = get_object_vars($list[0]);
        $picname = $you['you_picname'];
        @unlink('./admin_zhoubian/'.$picname);
        @unlink('./admin_zhoubian/s_'.$picname);
        @unlink('./images/d_'.$picname);
        \DB::table("you")->where("id",$id)->delete();
        return redirect("/admin/zhoubian/you/index");
    }
    
     //�����޸ı�
    public function edit($id)
    {
        $you = \DB::table("you")->where("id",$id)->first();
        return view("/admin/zhoubian/you/edit",["avo"=>$you]);
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
                $data = $request->only("you_name","you_price","you_content");
                $data['you_picname'] = $pname;
                $list=\DB::table("you")->where("id",$id)->get();
                $you = get_object_vars($list[0]);
                $you_pname = $you['you_picname'];
                @unlink('./admin_zhoubian/'.$you_pname);
                @unlink('./admin_zhoubian/s_'.$you_pname);
                @unlink('./images/d_'.$mai_pname);
                \DB::table('you')->where("id",$id)->update($data);  
            }
            
        }else{
            $data = $request->only("you_name","you_price","you_content");
            \DB::table('you')->where("id",$id)->update($data);
        }
        
        return redirect("/admin/zhoubian/you/index");
    }
}
